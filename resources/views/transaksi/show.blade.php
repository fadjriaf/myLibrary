@extends('layouts.master')
@section('content')
<header class="page-header">
    <h2>Detail Transaksir</h2>
                    
        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li><a href="/"><i class="fa fa-home"></i></a></li>
                <li><a href="/transaksi"><span>Transaksi</span></a></li>
                <li><a href="{{ route('transaksi.show', $transaksi->id) }}"><span>Detail</span></a></li>
            </ol>
                    
            <a class="sidebar-right-toggle"><i class="fa fa-chevron-left"></i></a>
        </div>
</header>

<div class="row">
    <div class="col-md-6">
        <form id="form1" class="form-horizontal" method="post">
            <section class="panel panel-featured panel-featured-primary">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                    </div>

                <h2 class="panel-title">Detail <b>{{ $transaksi->buku->judul }}</b></h2>
                </header>
                <div class="panel-body">
					<div class="form-group">
						<label class="col-sm-4 control-label"></label>
                        <div class="col-sm-8">
                        	<img width="200" height="200" @if($transaksi->buku->cover) src="{{ asset('img/buku/'.$transaksi->buku->cover) }}" @endif />
                    	</div>
                    </div>

                	

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Kode Transaksi : </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control{{ $errors->has('kd_trans') ? ' is-invalid' : '' }}" name="kd_trans" value="{{ $transaksi->kd_trans }}" required readonly>
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Judul Buku : </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control{{ $errors->has('buku_id') ? ' is-invalid' : '' }}" name="buku_id" value="{{$transaksi->buku->judul}}" required readonly>
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Nama Peminjam : </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control{{ $errors->has('member_id') ? ' is-invalid' : '' }}" name="member_id" value="{{ $transaksi->member->nama }}" required readonly>
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Status : </label>
                            <div class="col-sm-8">
                                	@if($transaksi->status == 'pinjam')
                                	  	<button type="button" class="btn btn-warning btn-xs">Pinjam</button>
                                	@else
                                	  	<button type="button" class="btn btn-success btn-xs">Kembali</button>
                                	@endif
                            </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Tanggal Pinjam : </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control{{ $errors->has('tgl_pinjam') ? ' is-invalid' : '' }}" name="tgl_pinjam" value="{{ date('d/m/y', strtotime($transaksi->tgl_pinjam)) }}" required readonly>
                            </div>
                    </div>     
                
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Tanggal Kembali : </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control{{ $errors->has('tgl_kembali') ? ' is-invalid' : '' }}" name="tgl_kembali" value="{{ date('d/m/y', strtotime($transaksi->tgl_kembali)) }}" required readonly>
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Keterangan : </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control{{ $errors->has('ket') ? ' is-invalid' : '' }}" name="ket" value="{{ $transaksi->ket }}" required readonly>
                            </div>
                    </div>

                </div>

                <footer class="panel-footer center">
                    <a href="{{route('transaksi.index')}}" class="btn btn-primary">Back</a>
                </footer>
            </section>
        </form>
    </div>
</div>
@endsection