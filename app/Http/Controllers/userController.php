<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;
use Alert;

class userController extends Controller
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
        if(Auth::user()->level == 'user') {
            Alert::error('Anda dilarang masuk ke area ini!', 'Oops..');
            return redirect()->to('/');
        }

        $user = User::get();

        return view('auth.user', compact('user'));
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

        return view('auth.register');
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
        $count = User::where('username', $request->input('username'))->count();

        if($count>0) {
            return redirect()->to('user');
        }

        User::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt(($request->input('password')))
        ]);

        alert()->success('Data telah ditambahkan!','Berhasil');
        return redirect()->route('user.index');
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
        if((Auth::user()->level == 'user') && (Auth::user()->id != $id)){
            Alert::error('Anda dilarang masuk ke area ini!', 'Oops..');
        }

        $user = User::findOrFail($id);

        return view('auth.show', compact('user'));
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
        if((Auth::user()->level == 'user') && (Auth::user()->id != $id)){
            Alert::error('Anda dilarang masuk ke area ini!', 'Oops..');
            return redirect()->to('/');
        }

        $user = User::findOrFail($id);

        return view('auth.edit', compact('user'));
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
        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->level = $request->input('level');

        if($request->input('password')){
            $user->level = $request->input('level');
        }

        if($request->input('password')){
            $user->password = bcrypt(($request->input('password')));
        }
        
        $user->update();

        alert()->success('Data telah diubah!','Berhasil');
        return redirect()->to('user');
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
        if(Auth::user()->id != $id) {
            $user = user::find($id);
            alert()->success('Data telah diubah!','Berhasil');
            $user->delete();
        } else {
            alert()->error(' ','Akun anda sendiri tidak bisa dihapus!');
        }

        return redirect()->to('user');
    }
}
