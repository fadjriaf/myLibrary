<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    //
    protected $table = 'member';
    protected $fillable = ['user_id', 'nis', 'nama', 'temlahir', 'tanglahir', 'jk', 'jurusan'];

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function transaksi() {
    	return $this->hasMany(transaksi::class);
    }
}
