@extends('layouts.master')

@section('content')
<header class="page-header">
    <h2>Laporan Transaksi</h2>
        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li><a href="/"><i class="fa fa-home"></i></a></li>
                <li><a href="/"><span>Laporan</span></a></li>
                <li><a href="/laporan/transaksi"><span>Transaksi</span></a></li>
            </ol>
            <a class="sidebar-right-toggle"><i class="fa fa-chevron-left"></i></a>
        </div>
</header>

<div class="row">
    <div class="col-md-6">
		<section class="panel panel-featured panel-featured-primary">
            <header class="panel-heading">
                <div class="panel-actions">
                  <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                  <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                </div>

            <h2 class="panel-title">Laporan Transaksi</h2>
            <p class="panel-subtitle">
				Export Laporan Transaksi Berdasarkan
			</p>
            </header>
            <div class="panel-body">
            	<h4><b>PDF</b></h4>
                <a href="{{url('laporan/transaksi/pdf')}}" class="mb-xs mt-xs mr-xs btn btn-danger">
                <b><i class="fa fa-download"></i> Export Semua Transaksi</a></b>
                <a href="{{url('laporan/transaksi/pdf?status=pinjam')}}" class="mb-xs mt-xs mr-xs btn btn-danger">
                <b><i class="fa fa-download"></i> Export Pinjam</a></b>
                <a href="{{url('laporan/transaksi/pdf?status=kembali')}}" class="mb-xs mt-xs mr-xs btn btn-danger">
                <b><i class="fa fa-download"></i> Export Kembali</a></b>
				
				<h4><b>Excel</b></h4>
                <a href="{{url('laporan/transaksi/excel')}}" class="mb-xs mt-xs mr-xs btn btn-success">
                <b><i class="fa fa-download"></i> Export Semua Transaksi</a></b>
                <a href="{{url('laporan/transaksi/excel?status=pinjam')}}" class="mb-xs mt-xs mr-xs btn btn-success">
                <b><i class="fa fa-download"></i> Export Pinjam</a></b>
                <a href="{{url('laporan/transaksi/excel?status=kembali')}}" class="mb-xs mt-xs mr-xs btn btn-success">
                <b><i class="fa fa-download"></i> Export Kembali</a></b>
            </div>
        </section>
    </div>
</div>
@endsection