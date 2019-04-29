@section('js')
<script type="text/javascript">
function readURL() {
    var input = this;
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $(input).prev().attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@stop
@extends('layouts.master')
@section('content')
<header class="page-header">
    <h2>Detail Buku</h2>
                    
        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li><a href="/"><i class="fa fa-home"></i></a></li>
                <li><a href="/buku"><span>Member</span></a></li>
                <li><a href="{{ route('buku.show', $buku->id) }}"><span>Detail</span></a></li>
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

                <h2 class="panel-title">Detail <b>{{ $buku->judul }}</b></h2>
                </header>

                <div class="panel-body">

                    <div class="form-group">
                        <label class="col-sm-4 control-label"> </label>
                            <div class="col-sm-8">
                                <img width="200" height="200" @if($buku->cover) src="{{ asset('img/buku/'.$buku->cover) }}" @endif /><br>
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Judul : </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control{{ $errors->has('judul') ? ' is-invalid' : '' }}" name="judul" value="{{ $buku->judul }}" required readonly>
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">ISBN : </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control{{ $errors->has('isbn') ? ' is-invalid' : '' }}" name="isbn" value="{{ $buku->isbn }}" required readonly>
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Pengarang : </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control{{ $errors->has('pengarang') ? ' is-invalid' : '' }}" name="pengarang" value="{{ $buku->pengarang }}" required readonly>
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Penerbit : </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control{{ $errors->has('penerbit') ? ' is-invalid' : '' }}" name="penerbit" value="{{ $buku->penerbit }}" required readonly>
                            </div>
                    </div>     
                
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Tahun Terbit : </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control{{ $errors->has('thn_terbit') ? ' is-invalid' : '' }}" name="thn_terbit" value="{{ $buku->thn_terbit }}" required readonly>
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Jumlah : </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control{{ $errors->has('jmlh_buku') ? ' is-invalid' : '' }}" name="jmlh_buku" value="{{ $buku->jmlh_buku }}" required readonly>
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Deskripsi : </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control{{ $errors->has('user_iddeskripsi') ? ' is-invalid' : '' }}" name="user_iddeskripsi" value="{{$buku->deskripsi}}" required readonly>
                            </div>   
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Lokasi : </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control{{ $errors->has('lokasi') ? ' is-invalid' : '' }}" name="lokasi" value="{{$buku->lokasi}}" required readonly>
                            </div>   
                    </div>
                </div>

                <footer class="panel-footer center">
                    <a href="{{route('buku.index')}}" class="btn btn-primary">Back</a>
                </footer>
            </section>
        </form>
    </div>
</div>
@endsection