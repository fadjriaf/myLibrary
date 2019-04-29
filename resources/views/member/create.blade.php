@extends('layouts.master')
@section('content')
<header class="page-header">
    <h2>Create Member</h2>
                    
        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li><a href="/"><i class="fa fa-home"></i></a></li>
                <li><a href="/member"><span>Member</span></a></li>
                <li><a href="/member/create"><span>Create</span></a></li>
            </ol>
                    
            <a class="sidebar-right-toggle"><i class="fa fa-chevron-left"></i></a>
        </div>
</header>

<div class="row">
    <div class="col-md-6">
        <form id="form1" class="form-horizontal" action="{{ route('member.store') }}" method="post">
            {{ csrf_field() }}

            <section class="panel panel-featured panel-featured-primary">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                    </div>

                <h2 class="panel-title">Create Member</h2>
                </header>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Nama : </label>
                            <div class="col-sm-8">
                                <select data-plugin-selectTwo class="form-control mb-md" name="nama">
                                        <option value="">Pilih Nama</option>
                                        @foreach($user as $nama)
                                            <option value="{{$nama->name}}">{{$nama->name}}</option>
                                        @endforeach
                                </select>   
                                
                                @if ($errors->has('nama'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">NIS : </label>
                            <div class="col-sm-8">
                                <input id="nis" type="text" class="form-control{{ $errors->has('nis') ? ' is-invalid' : '' }}" name="nis" value="" required>

                                @if ($errors->has('nis'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nis') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Tempat Lahir : </label>
                            <div class="col-sm-8">
                                <input id="temlahir" type="text" class="form-control{{ $errors->has('temlahir') ? ' is-invalid' : '' }}" name="temlahir" value="" required>

                                @if ($errors->has('temlahir'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('temlahir') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Tanggal Lahir : </label>
                            <div class="col-sm-8">
                                <input id="tanglahir" type="date" class="form-control{{ $errors->has('tanglahir') ? ' is-invalid' : '' }}" name="tanglahir" value="" required>

                                @if ($errors->has('tanglahir'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tanglahir') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>     
                
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Jenis Kelamin : </label>
                            <div class="col-sm-8">
                                <select class="form-control mb-md" name="jk" required="">
                                    <option value="">Pilih Jenis</option>
                                    <option value="L">Laki - Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>          
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Jurusan : </label>
                            <div class="col-sm-8">
                                <select class="form-control mb-md" name="jurusan" required="">
                                    <option value="">Pilih Jurusan</option>
                                    <option value="AK">Analisis Kimia</option>
                                    <option value="TKJ">Teknik Komputer Jaringan</option>
                                    <option value="RPL">Rekayasa Perangkat Lunak</option>
                                </select>          
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">User Login : </label>
                            <div class="col-sm-8">
                                <select data-plugin-selectTwo class="form-control mb-md" name="user_id" required="">
                                        <option value="">Pilih User</option>
                                        @foreach($user as $user)
                                            <option value="{{$user->id}}">{{$user->username}}</option>
                                        @endforeach
                                </select>          
                            </div>
                    </div>
                </div>

                <footer class="panel-footer center">
                    <a href="{{route('member.index')}}" class="btn btn-primary">Back</a>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                </footer>
            </section>
        </form>
    </div>
</div>
@endsection
