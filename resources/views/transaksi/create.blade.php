@section('js')
<script type="text/javascript">
    $(document).on('click', '.pilih', function (e) {
        document.getElementById("buku_judul").value = $(this).attr('data-buku_judul');
        document.getElementById("buku_id").value = $(this).attr('data-buku_id');
        $('#myModal').modal('hide');
    });

    $(document).on('click', '.pilih_member', function (e) {
        document.getElementById("member_id").value = $(this).attr('data-member_id');
        document.getElementById("member_nama").value = $(this).attr('data-member_nama');
        $('#myModal2').modal('hide');
    });
          
    $(function () {
        $("#lookup, #lookup2").dataTable();
    });
</script>
@stop

@extends('layouts.master')
@section('content')
<header class="page-header">
    <h2>Create Transaksi</h2>
                    
        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li><a href="/"><i class="fa fa-home"></i></a></li>
                <li><a href="/transaksi"><span>Transaksi</span></a></li>
                <li><a href="/transaksi/create"><span>Create</span></a></li>
            </ol>
                    
            <a class="sidebar-right-toggle"><i class="fa fa-chevron-left"></i></a>
        </div>
</header>

<div class="row">
    <div class="col-md-6">
        <form id="form1" class="form-horizontal" method="POST" action="{{ route('transaksi.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <section class="panel panel-featured panel-featured-primary">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                    </div>

                <h2 class="panel-title">Tambah Transaksi</h2>
                </header>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Kode Transaksi : </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control{{ $errors->has('kd_trans') ? ' is-invalid' : '' }}" name="kd_trans" value="{{ $kode }}" required>
                                
                                @if ($errors->has('kd_trans'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kd_trans') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Tanggal Pinjam : </label>
                            <div class="col-sm-8">
                                <input class="form-control{{ $errors->has('tgl_pinjam') ? ' is-invalid' : '' }}" type="date" name="tgl_pinjam" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}" required @if(Auth::user()->level == 'user') readonly @endif>

                                @if ($errors->has('tgl_pinjam'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tgl_pinjam') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Tanggal Kembali : </label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control{{ $errors->has('tgl_kembali') ? ' is-invalid' : '' }}" name="tgl_kembali" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->addDays(3)->toDateString())) }}" required="" @if(Auth::user()->level == 'user') readonly @endif>

                                @if ($errors->has('tgl_kembali'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tgl_kembali') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Buku : </label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                <input id="buku_judul" type="text" class="form-control" readonly="" required>
                                <input id="buku_id" type="hidden" name="buku_id" value="{{ old('buku_id') }}" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal"><b>Search!</b></button>
                                </span>
                                </div>

                                @if ($errors->has('buku_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('buku_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div> 

                    @if(Auth::user()->level == 'admin')
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Member : </label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                <input id="member_nama" type="text" class="form-control" readonly="" required>
                                <input id="member_id" type="hidden" name="member_id" value="{{ old('member_id') }}" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-warning btn-secondary" data-toggle="modal" data-target="#myModal2"><b>Search!</b></button>
                                </span>
                                </div>
                                @if ($errors->has('member_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('member_id') }}</strong>
                                    </span>
                                @endif       
                            </div>
                    </div>
                    @else
                    <div class="form-group{{ $errors->has('member_id') ? ' has-error' : '' }}">
                            <label for="member_id" class="col-sm-4 control-label">Member</label>
                            <div class="col-sm-8">
                                <input id="member_nama" type="text" class="form-control" readonly="" value="{{Auth::user()->member->nama}}" required>
                                <input id="member_id" type="hidden" name="member_id" value="{{ Auth::user()->member->id }}" required readonly="">
                              
                                @if ($errors->has('member_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('member_id') }}</strong>
                                    </span>
                                @endif
                                 
                            </div>
                        </div>
                    @endif
                </div>



        <!-- Modal Buku-->
        <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
            <div class="modal-dialog modal-lg" role="document" >
                <div class="modal-content" style="background: #fff;">
                    <header class="panel-heading">
                        <h2 class="panel-title">Cari Buku</h2>
                    </header>
                    <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>ISBN</th>
                                    <th>Pengarang</th>
                                    <th>Tahun</th>
                                    <th>Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($buku as $buku)
                                <tr class="pilih" data-buku_id="<?php echo $buku->id; ?>" data-buku_judul="<?php echo $buku->judul; ?>" >
                                    <td>@if($buku->cover)
                                        <img src="{{url('img/buku/'. $buku->cover)}}" alt="image" style="margin-right: 10px; width: 25px; height: 25px;" />
                                    @else
                                        <img src="{{url('img/buku/default.png')}}" alt="image" style="margin-right: 10px; width: 25px; height: 25px;" />
                                    @endif
                                    {{$buku->judul}}</td>
                                    <td>{{$buku->isbn}}</td>
                                    <td>{{$buku->pengarang}}</td>
                                    <td>{{$buku->thn_terbit}}</td>
                                    <td>{{$buku->jmlh_buku}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
        

        <!-- Modal Member-->
        <div class="modal fade bd-example-modal-lg" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
            <div class="modal-dialog modal-lg" role="document" >
                <div class="modal-content" style="background: #fff;">
                    <header class="panel-heading">
                        <h2 class="panel-title">Cari Member</h2>
                    </header>
                    <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NIS</th>
                            <th>Jurusan</th>
                            <th>Jenis Kelamin</th>
                        </tr>
                      </thead>
                            <tbody>
                                @foreach($member as $data)
                                <tr class="pilih_member" data-member_id="<?php echo $data->id; ?>" data-member_nama="<?php echo $data->nama; ?>" >
                                    <td>{{$data->nama}}</td>
                                    <td>{{$data->nis}}</td>
                                    <td>
                                    @if($data->jurusan == 'AK')
                                        Analisis Kimia
                                    @elseif($data->jurusan == 'TKJ')
                                        Teknik Komputer Jaringan
                                    @else
                                        Rekayasa Perangkat Lunak
                                    @endif
                                    </td>
                                    <td>
                                        {{$data->jk === "L" ? "Laki - Laki" : "Perempuan"}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>

                <footer class="panel-footer center">
                    <a href="{{route('transaksi.index')}}" class="btn btn-primary">Back</a>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                </footer>
            </section>
        </form>
    </div>
</div>
@endsection
