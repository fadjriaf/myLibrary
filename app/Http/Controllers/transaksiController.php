<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\buku;
use App\member;
use App\transaksi;
use Carbon\Carbon;
use Auth;
use DB;
use Alert;

class transaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
         if(Auth::user()->level == 'user')
        {
            $transaksi = transaksi::where('member_id', Auth::user()->member->id)
                                ->get();
        } else {
            $transaksi = transaksi::get();
        }

        return view('transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $getRow = transaksi::orderBy('id', 'DESC')->get();
        $rowCount = $getRow->count();

        $lastId = $getRow->first();

        $kode = "TR00001";
        
        if ($rowCount > 0) {
            if ($lastId->id < 9) {
                    $kode = "TR0000".''.($lastId->id + 1);
            } else if ($lastId->id < 99) {
                    $kode = "TR000".''.($lastId->id + 1);
            } else if ($lastId->id < 999) {
                    $kode = "TR00".''.($lastId->id + 1);
            } else if ($lastId->id < 9999) {
                    $kode = "TR0".''.($lastId->id + 1);
            } else {
                    $kode = "TR".''.($lastId->id + 1);
            }
        }
        
        $buku = buku::where('jmlh_buku', '>', 0)->get();
        $member = member::get();
        return view('transaksi.create', compact('buku', 'kode', 'member'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'kd_trans' => 'required|string|max:50',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
            'buku_id' => 'required',
            'member_id' => 'required',
        ]);

        $transaksi = transaksi::create([
            'kd_trans' => $request->get('kd_trans'),
            'tgl_pinjam' => $request->get('tgl_pinjam'),
            'tgl_kembali' => $request->get('tgl_kembali'),
            'buku_id' => $request->get('buku_id'),
            'member_id' => $request->get('member_id'),
            'ket' => $request->get('ket'),
            'status' => 'pinjam'
        ]);

        $transaksi->buku->where('id', $transaksi->buku_id)
                        ->update([
                            'jmlh_buku' => ($transaksi->buku->jmlh_buku - 1),
                            ]);

        alert()->success('Data telah ditambahkan!','Berhasil');
        return redirect()->route('transaksi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $transaksi = transaksi::findorFail($id);

        if((Auth::user()->level == 'user') && (Auth::user()->member->id != $transaksi->member_id)) {
                Alert::error('Anda dilarang masuk ke area ini!', 'Oops..');
                return redirect()->to('/');
        }

        return view('transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $transaksi = transaksi::findOrFail($id);

        if((Auth::user()->level == 'User') && (Auth::user()->member->id != $transaksi->member_id)) {
                Alert::error('Anda dilarang masuk ke area ini!', 'Oops..');
                return redirect()->to('/');
        }

        return view('buku.edit', compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $transaksi = transaksi::find($id);

        $transaksi->update([
                'status' => 'kembali'
                ]);

        $transaksi->buku->where('id', $transaksi->buku->id)
                        ->update([
                            'jmlh_buku' => ($transaksi->buku->jmlh_buku + 1),
                            ]);

        alert()->success('Data telah diubah!','Berhasil');
        return redirect()->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        transaksi::find($id)->delete();
        
        alert()->success('Data telah dihapus!','Berhasil');
        return redirect()->route('transaksi.index');
    }
}
