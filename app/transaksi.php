<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    //
    protected $table = 'transaksi';
	protected $fillable = ['kd_trans', 'member_id', 'buku_id', 'tgl_pinjam', 'tgl_kembali', 'status', 'ket'];

	public function member(){
		return $this->belongsTo(member::class);
	}

	public function buku(){
		return $this->belongsTo(buku::class);
	}
}
