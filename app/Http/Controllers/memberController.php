<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\carbon;
use App\User;
use App\member;
use Auth;
use DB;
use Alert;

class memberController extends Controller
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
        if(Auth::user()->level == 'user'){
            Alert::error('Anda dilarang masuk ke area ini!', 'Oops..');
            return redirect()->to('/');
        }

        $member = member::get();
        return view('member.index', compact('member'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(Auth::user()->level == 'User'){
            Alert::error('Anda dilarang masuk ke area ini!', 'Oops..');
            return redirect()->to('/');
        }

        $user = User::WhereNotExists(function($query){
            $query->select(DB::raw(1))
                ->from('member')
                ->whereRaw('member.user_id = user_id');
        });

        $user = User::get();
        $member = member::get();

        return view('member.create', compact('member', 'user'));
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
        $count = member::where('nis', $request->input('nis'))->count();

        if($count>0){
            return redirect()->to('member');
        }

        member::create($request->all());

        alert()->success('Data telah ditambahkan!','Berhasil');
        return redirect()->route('member.index');
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
        if((Auth::user()->level == 'user') && (Auth::user()->id != $id)) {
            Alert::error('Anda dilarang masuk ke area ini!', 'Oops..');
            return redirect()->to('/');
        }

        $member = member::findOrFail($id);

        return view('member.show', compact('member'));
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
        if((Auth::user()->level == 'user') && (Auth::user()->id != $id)) {
            Alert::error('Anda dilarang masuk ke area ini!', 'Oops..');
            return redirect()->to('/');
        }

        $member = member::findOrFail($id);
        $user = User::get();
        return view('member.edit', compact('member', 'user'));
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
        member::find($id)->update($request->all());

        alert()->success('Data telah diubah!','Berhasil');
        return redirect()->to('member');
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
        member::find($id)->delete(); 
        
        alert()->success('Data telah dihapus!','Berhasil');
        return redirect()->route('member.index');
    }
}
