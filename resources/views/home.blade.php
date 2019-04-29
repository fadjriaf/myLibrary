@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table-trans').DataTable({
        "iDisplayLength": 10,
        "order": [[ 0, 5, "desc" ]]
    });
  
} );
</script>
@stop
@extends('layouts.master')
@section('content')
<header class="page-header">
    <h2>Dashboard myLibrary</h2>
                    
        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li><a href="/"><i class="fa fa-home"></i></a></li>
            </ol>
                    
            <a class="sidebar-right-toggle"><i class="fa fa-chevron-left"></i></a>
        </div>
</header>

                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-xl-3">
                                <section class="panel panel-featured-left panel-featured-primary">
                                    <div class="panel-body">
                                        <div class="widget-summary">
                                            <div class="widget-summary-col widget-summary-col-icon">
                                                <div class="summary-icon bg-primary">
                                                    <i class="fa fa-book"></i>
                                                </div>
                                            </div>
                                            <div class="widget-summary-col">
                                                <div class="summary">
                                                    <h4 class="title">Buku</h4>
                                                    <div class="info">
                                                        <strong class="amount">{{ $buku->count() }}</strong>
                                                    </div>
                                                </div>
                                                <div class="summary-footer">
                                                    <a class="text-muted text-uppercase">Total Buku</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>

                            <div class="col-md-6 col-lg-6 col-xl-3">
                                <section class="panel panel-featured-left panel-featured-tertiary">
                                    <div class="panel-body">
                                        <div class="widget-summary">
                                            <div class="widget-summary-col widget-summary-col-icon">
                                                <div class="summary-icon bg-tertiary">
                                                    <i class="fa fa-bars"></i>
                                                </div>
                                            </div>
                                            <div class="widget-summary-col">
                                                <div class="summary">
                                                    <h4 class="title">Sedang Dipinjam</h4>
                                                    <div class="info">
                                                        <strong class="amount">{{ $transaksi->where('status', 'pinjam')->count() }}</strong>
                                                    </div>
                                                </div>
                                                <div class="summary-footer">
                                                    <a class="text-muted text-uppercase">Sedang Dipinjam</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            
                            <div class="col-md-6 col-lg-6 col-xl-3">
                                <section class="panel panel-featured-left panel-featured-secondary">
                                    <div class="panel-body">
                                        <div class="widget-summary">
                                            <div class="widget-summary-col widget-summary-col-icon">
                                                <div class="summary-icon bg-secondary">
                                                    <i class="fa fa-bar-chart"></i>
                                                </div>
                                            </div>
                                            <div class="widget-summary-col">
                                                <div class="summary">
                                                    <h4 class="title">Transaksi</h4>
                                                    <div class="info">
                                                        <strong class="amount">{{ $transaksi->count() }}</strong>
                                                    </div>
                                                </div>
                                                <div class="summary-footer">
                                                    <a class="text-muted text-uppercase">Total Transaksi</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>

                            

                            <div class="col-md-6 col-lg-6 col-xl-3">
                                <section class="panel panel-featured-left panel-featured-quaternary">
                                    <div class="panel-body">
                                        <div class="widget-summary">
                                            <div class="widget-summary-col widget-summary-col-icon">
                                                <div class="summary-icon bg-quaternary">
                                                    <i class="fa fa-user-circle"></i>
                                                </div>
                                            </div>
                                            <div class="widget-summary-col">
                                                <div class="summary">
                                                    <h4 class="title">Member</h4>
                                                    <div class="info">
                                                        <strong class="amount">{{ $member->count() }}</strong>
                                                    </div>
                                                </div>
                                                <div class="summary-footer">
                                                    <a class="text-muted text-uppercase">Total Member</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                        
           <section class="panel panel-featured panel-featured-primary">
              <header class="panel-heading">
                <div class="panel-actions">
                  <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                  <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                </div>

                <h2 class="panel-title">Data Transaksi</h2>
              </header>
              <div class="panel-body">
                <table class="table table-striped table-bordered" id="table-trans">
                  <thead>
                    <tr>
                      <th>Kode Transaksi</th>
                      <th>Judul Buku</th>
                      <th>Nama Peminjam</th>
                      <th>Tanggal Pinjam</th>
                      <th>Tanggal Kembali</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                    <tbody>
                        @foreach($transaksi as $transaksi)
                        <tr>
                            <td>{{ $transaksi->kd_trans }}</td>
                            <td>
                              <a href="{{ route('transaksi.show', $transaksi->id) }}">
                                {{ $transaksi->buku->judul }}
                              </a>
                            </td>
                            <td>{{ $transaksi->member->nama }}</td>
                            <td>{{ date('d/m/y', strtotime($transaksi->tgl_pinjam)) }}</td>
                            <td>{{ date('d/m/y', strtotime($transaksi->tgl_kembali)) }}</td>
                            <td>
                              @if($transaksi->status == 'pinjam')
                                <button type="button" class="btn btn-warning btn-xs">Pinjam</button>
                              @else
                                <button type="button" class="btn btn-success btn-xs">Kembali</button>
                              @endif
                            </td>
                            <td>
                            @if($transaksi->status == 'pinjam')
                            <a class="btn btn-xs btn-info" href="{{ route('transaksi.update', $transaksi->id) }}">Sudah Kembali</a>
                            @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
@endsection
