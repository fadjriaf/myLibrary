<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\carbon;
use App\User;
use App\buku;
use Auth;
use DB;
use Excel;
use Alert;

class bukuController extends Controller
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
        $buku = buku::all();

        return view('buku.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(Auth::user()->level == 'user') {
            Alert::error('Anda dilarang masuk ke area ini!', 'Oops..');
            return redirect()->to('/');
        }

        return view('buku.create');
    }

    public function format()
    {
        $buku = [['judul' => null, 'isbn' => null, 'pengarang' => null, 'penerbit' => null, 'thn_terbit' => null, 'jmlh_buku' => null, 'deskripsi' => null, 'lokasi' => 'Rak1/Rak2/Rak3/Rak4']];

        $filename = 'format-buku';

        $export = Excel::create($filename.date('Y-m-d-H-i-s'), function($excel) use ($buku){
            $excel->sheet('buku', function($sheet) use ($buku){
                $sheet->fromArray($buku);
            });
        });

        return $export->download('xlsx');
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'importBuku' => 'required'
        ]);

        if ($request->hasFile('importBuku')){
            $path = $request->file('importBuku')->getRealPath();

            $buku = Excel::load($path, function($reader){})->get();
            $data = collect($buku);

            if (!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    $insert[] = [
                        'judul' => $value->judul, 
                        'isbn' => $value->isbn, 
                        'pengarang' => $value->pengarang, 
                        'penerbit' => $value->penerbit,
                        'thn_terbit' => $value->thn_terbit, 
                        'jmlh_buku' => $value->jmlh_buku, 
                        'deskripsi' => $value->deskripsi, 
                        'lokasi' => $value->lokasi,
                        'cover' => NULL];

                    buku::create($insert[$key]);
                }
            };
        }

        alert()->success('Data telah diimport!','Berhasil');
        return back();
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
        if(Auth::user()->level == 'user') {
            return redirect()->to('/');
        }

        if($request->file('cover')) {
            $file = $request->file('cover');
            $datetime = Carbon::now();
            $random = $file->getClientOriginalExtension();
            $filename = rand(111,999).'-'.$datetime->format('Y-m-d-H-i-s').'.'.$random;
            $request->file('cover')->move("img/buku", $filename);
            $cover = $filename;
        }else{
            $cover = NULL;
        }

        buku::create([
            'judul' => $request->get('judul'),
            'isbn' => $request->get('isbn'),
            'pengarang' => $request->get('pengarang'),
            'penerbit' => $request->get('penerbit'),
            'thn_terbit' => $request->get('thn_terbit'),
            'jmlh_buku' => $request->get('jmlh_buku'),
            'deskripsi' => $request->get('deskripsi'),
            'lokasi' => $request->get('lokasi'),
            'cover' => $cover
        ]);

        alert()->success('Data telah ditambahkan!','Berhasil');
        return redirect()->route('buku.index');
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
        $buku = buku::findOrFail($id);

        return view('buku.show', compact('buku'));
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
        if(Auth::user()->level == 'user') {
            Alert::error('Anda dilarang masuk ke area ini!', 'Oops..');
            return redirect()->to('/');
        }

        $buku = buku::findOrFail($id);
        
        return view('buku.edit', compact('buku'));
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
        if(Auth::user()->level == 'user') {
            return redirect()->to('/');
        }

        if($request->file('cover')) {
            $file = $request->file('cover');
            $datetime = Carbon::now();
            $random = $file->getClientOriginalExtension();
            $filename = rand(111,999).'-'.$datetime->format('Y-m-d-H-i-s').'.'.$random;
            $request->file('cover')->move("img/buku", $filename);
            $cover = $filename;
        }else{
            $cover = NULL;
        }

        buku::find($id)->update([
            'judul' => $request->get('judul'),
            'isbn' => $request->get('isbn'),
            'pengarang' => $request->get('pengarang'),
            'penerbit' => $request->get('penerbit'),
            'thn_terbit' => $request->get('thn_terbit'),
            'jmlh_buku' => $request->get('jmlh_buku'),
            'deskripsi' => $request->get('deskripsi'),
            'lokasi' => $request->get('lokasi'),
            'cover' => $cover
        ]);

        alert()->success('Data telah diubah!','Berhasil');
        return redirect()->route('buku.index');
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
        Buku::find($id)->delete();

        alert()->success('Data telah dihapus!','Berhasil');
        return redirect()->route('buku.index');
    }
}
