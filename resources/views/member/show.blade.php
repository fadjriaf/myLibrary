@extends('layouts.master')
@section('content')
<header class="page-header">
    <h2>Detail Member</h2>
                    
        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li><a href="/"><i class="fa fa-home"></i></a></li>
                <li><a href="/member"><span>Member</span></a></li>
                <li><a href="{{ route('member.show', $member->id) }}"><span>Detail</span></a></li>
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

                <h2 class="panel-title">Detail <b>{{ $member->User['name'] }}</b></h2>
                </header>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Nama : </label>
                            <div class="col-sm-8">
                                <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ $member->nama }}" required readonly>

                                 
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
                                <input id="nis" type="text" class="form-control{{ $errors->has('nis') ? ' is-invalid' : '' }}" name="nis" value="{{ $member->nis }}" required readonly>

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
                                <input id="temlahir" type="text" class="form-control{{ $errors->has('temlahir') ? ' is-invalid' : '' }}" name="temlahir" value="{{ $member->temlahir }}" required readonly>

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
                                <input id="tanglahir" type="text" class="form-control{{ $errors->has('tanglahir') ? ' is-invalid' : '' }}" name="tanglahir" value="{{ $member->tanglahir }}" required readonly>

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
                                <input id="jk" type="text" class="form-control{{ $errors->has('jk') ? ' is-invalid' : '' }}" name="jk" value="{{ $member->jk }}" required readonly>

                                @if ($errors->has('jk'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('jk') }}</strong>
                                    </span>
                                @endif        
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Jurusan : </label>
                            <div class="col-sm-8">
                                <input id="jurusan" type="text" class="form-control{{ $errors->has('jurusan') ? ' is-invalid' : '' }}" name="jurusan" value="{{ $member->jurusan }}" required readonly>

                                @if ($errors->has('jurusan'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('jurusan') }}</strong>
                                    </span>
                                @endif         
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">User Login : </label>
                            <div class="col-sm-8">
                                <input id="user_id" type="text" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id" value="{{$member->user->username}}" required readonly>

                                @if ($errors->has('user_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                @endif        
                            </div>   
                    </div>
                </div>

                <footer class="panel-footer center">
                    <a href="{{route('member.index')}}" class="btn btn-primary">Back</a>
                </footer>
            </section>
        </form>
    </div>
</div>
@endsection