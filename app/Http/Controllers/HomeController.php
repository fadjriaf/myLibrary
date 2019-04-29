<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transaksi;
use App\member;
use App\buku;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $transaksi = transaksi::get();
        $member = member::get();
        $buku = buku::get();
        $user = User::get();

        if(Auth::user()->level == 'user')
        {
            $transaksi = transaksi::where('status', 'pinjam')
                                    ->where('member_id', Auth::user()->member->id)
                                    ->get();
        } else {
            $transaksi = transaksi::get();
        }

        return view('home', compact('transaksi', 'member', 'buku', 'user'));
    }
}
