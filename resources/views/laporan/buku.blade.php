@extends('layouts.master')

@section('content')
<header class="page-header">
    <h2>Laporan Buku</h2>
        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li><a href="/"><i class="fa fa-home"></i></a></li>
                <li><a href="/"><span>Laporan</span></a></li>
                <li><a href="/laporan/buku"><span>Buku</span></a></li>
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

            <h2 class="panel-title">Laporan Buku</h2>
            <p class="panel-subtitle">
				Export Laporan Buku Berdasarkan
			</p>
            </header>
            <div class="panel-body">
                <a href="{{ url('laporan/buku/pdf') }}" class="mb-xs mt-xs mr-xs btn btn-danger">
                <b><i class="fa fa-download"></i> Export PDF</a></b>

                <a href="{{ url('laporan/buku/excel') }}" class="mb-xs mt-xs mr-xs btn btn-success">
    			<b><i class="fa fa-download"></i> Export EXCEL</a></b>
            </div>
        </section>
    </div>
</div>
@endsection