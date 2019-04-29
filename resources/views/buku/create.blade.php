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
    <h2>Create Buku</h2>
                    
        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li><a href="/"><i class="fa fa-home"></i></a></li>
                <li><a href="/buku"><span>Buku</span></a></li>
                <li><a href="/buku/create"><span>Create</span></a></li>
            </ol>
                    
            <a class="sidebar-right-toggle"><i class="fa fa-chevron-left"></i></a>
        </div>
</header>

<div class="row">
    <div class="col-md-6">
        <form action="{{ route('buku.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <section class="panel panel-featured panel-featured-primary">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                    </div>

                <h2 class="panel-title">Tambah Buku</h2>
                </header>
                <div class="panel-body">

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Judul : </label>
                            <div class="col-sm-8">
                                 <input id="judul" type="text" class="form-control{{ $errors->has('judul') ? ' is-invalid' : '' }}" name="judul" value="{{ old('judul') }}" required autofocus>

                                @if ($errors->has('judul'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('judul') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">ISBN : </label>
                            <div class="col-sm-8">
                                 <input id="isbn" type="text" class="form-control{{ $errors->has('isbn') ? ' is-invalid' : '' }}" name="isbn" value="{{ old('isbn') }}" required autofocus>

                                @if ($errors->has('isbn'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('isbn') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Pengarang : </label>
                            <div class="col-sm-8">
                                <input id="pengarang" type="text" class="form-control{{ $errors->has('pengarang') ? ' is-invalid' : '' }}" name="pengarang" value="{{ old('pengarang') }}" required autofocus>

                                @if ($errors->has('pengarang'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pengarang') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Penerbit : </label>
                            <div class="col-sm-8">
                                 <input id="penerbit" type="text" class="form-control{{ $errors->has('penerbit') ? ' is-invalid' : '' }}" name="penerbit" value="{{ old('penerbit') }}" required autofocus>

                                @if ($errors->has('penerbit'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('penerbit') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Tahun Terbit: </label>
                            <div class="col-sm-8">
                                <input id="thn_terbit" type="text" class="form-control{{ $errors->has('thn_terbit') ? ' is-invalid' : '' }}" name="thn_terbit" value="{{ old('thn_terbit') }}" required>

                                @if ($errors->has('thn_terbit'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('thn_terbit') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Jumlah Buku : </label>
                            <div class="col-sm-8">
                                 <input id="jmlh_buku" type="text" class="form-control{{ $errors->has('jmlh_buku') ? ' is-invalid' : '' }}" name="jmlh_buku" value="{{ old('jmlh_buku') }}" required autofocus>

                                @if ($errors->has('jmlh_buku'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('jmlh_buku') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Deskripsi : </label>
                            <div class="col-sm-8">
                                 <input id="deskripsi" type="text" class="form-control{{ $errors->has('deskripsi') ? ' is-invalid' : '' }}" name="deskripsi" value="{{ old('deskripsi') }}" required autofocus>

                                @if ($errors->has('deskripsi'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('deskripsi') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Lokasi : </label>
                            <div class="col-sm-8">
                                <select class="form-control mb-md" name="lokasi" required="">
                                    <option value="">=> Pilih Lokasi <=</option>
                                    <option value="Rak1">Rak 1</option>
                                    <option value="Rak2">Rak 2</option>
                                    <option value="Rak3">Rak 3</option>
                                    <option value="Rak4">Rak 4</option>
                                </select>          
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Cover : </label>
                            <div class="col-sm-8">
                                 <input type="file" class="form-control" name="cover" required="">

                                @if ($errors->has('cover'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cover') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>       
                </div>

                <footer class="panel-footer center">
                    <a href="{{route('buku.index')}}" class="btn btn-primary">Back</a>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                </footer>

            </section>
        </form>
    </div>
</div>
@endsection
