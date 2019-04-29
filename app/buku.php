<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    //
    protected $table = 'buku';
    protected $fillable = ['judul', 'isbn', 'penerbit', 'pengarang', 'thn_terbit', 'jmlh_buku', 'lokasi', 'deskripsi', 'cover'];

    public function getPhoto()
    {
    	if(!$this->cover){
    		return asset('img/coba.png');
    	}

    	return asset('img/'.$this->cover);
    }

    public function transaksi(){
        return $this->hasMany(transaksi::class);
    }
}
