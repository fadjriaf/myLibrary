@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table-trans').DataTable({
        "order": [[ 0, 6, "desc" ]]
    });
  
} );
</script>
@stop

@extends('layouts.master')
@section('content')
<header class="page-header">
    <h2>Dashboard Transaksi</h2>
                    
        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li><a href="/"><i class="fa fa-home"></i></a></li>
                <li><a href="/transaksi"><span>Transaksi</span></a></li>
            </ol>
                    
            <a class="sidebar-right-toggle"><i class="fa fa-chevron-left"></i></a>
        </div>
</header>

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
                      <th>Action</th>
                      <th>Status</th>
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
                              <div class="btn-group">
                              <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                                <ul class="dropdown-menu" role="menu">
                                  @if(Auth::user()->level == 'admin')
                                  @if($transaksi->status == 'pinjam')
                                  <li><a href="{{ route('transaksi.update', $transaksi->id) }}">Sudah Kembali</a></li>
                                  @endif
                                  <li><a href="{{ route('transaksi.delete', $transaksi->id) }}">Delete</a></li>
                                  @else
                                  @if($transaksi->status == 'pinjam')
                                  <li><a href="{{ route('transaksi.update', $transaksi->id) }}">Sudah Kembali</a></li>
                                  @else
                                  &nbsp -
                                @endif
                              @endif
                                </ul>
                              </div>
                            </td>

                            <td>
                              @if($transaksi->status == 'pinjam')
                                <button type="button" class="btn btn-warning btn-xs">Pinjam</button>
                              @else
                                <button type="button" class="btn btn-success btn-xs">Kembali</button>
                              @endif</td>
                          </tr>
                              @endforeach
                        </tbody>
                      </table>
                    </div>
                  </section>




            <section class="panel panel-featured panel-featured-primary">
              <header class="panel-heading">
                <div class="panel-actions">
                  <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                  <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                </div>

                <h2 class="panel-title">Tambah Transaksi</h2>
              </header>
              <div class="panel-body">
                  <div class="col-lg-2">
                    <a href="{{ route('transaksi.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah</a>
                  </div>
              </div>
            </section>
@endsection

