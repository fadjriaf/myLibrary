@section('js')
<script type="text/javascript">
var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('submit').disabled = false;
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Password Match!';
  } else {
    document.getElementById('submit').disabled = true;
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Password Invalid!';
  }
}
</script>
@stop

@extends('layouts.master')
@section('content')
<header class="page-header">
    <h2>Edit User</h2>
                    
        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li><a href="/"><i class="fa fa-home"></i></a></li>
                <li><a href="/user"><span>User</span></a></li>
                <li><a href="{{ route('user.edit', $user->id) }}"><span>Edit</span></a></li>
            </ol>
                    
            <a class="sidebar-right-toggle"><i class="fa fa-chevron-left"></i></a>
        </div>
</header>

<div class="row">
    <div class="col-md-6">
        <form id="form1" class="form-horizontal" action="{{ route('user.update', $user->id) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('put') }}

            <section class="panel panel-featured panel-featured-primary">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                    </div>

                <h2 class="panel-title">Edit <b>{{ $user->name }}</b></h2>
                </header>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Nama : </label>
                            <div class="col-sm-8">
                                 <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Username : </label>
                            <div class="col-sm-8">
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ $user->username }}" required disabled>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Email: </label>
                            <div class="col-sm-8">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>    

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-sm-4 control-label">Password</label>
                        <div class="col-sm-8">
                            <input id="password" type="password" class="form-control" onkeyup='check();' name="password">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="col-sm-4 control-label">Confirm Password</label>
                        <div class="col-sm-8">
                            <input id="confirm_password" type="password" onkeyup="check()" class="form-control" name="password_confirmation">
                            <span id='message'></span>
                        </div>
                    </div> 

                    @if(Auth::user()->level == 'admin')
                         <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }} row">
                            <label for="level" class="col-sm-4 control-label">{{ __('Level') }}</label>
                            <div class="col-md-8">
                            <select class="form-control" name="level" required="">
                                <option value="admin" @if($user->level == 'admin') selected @endif>Admin</option>
                                <option value="user" @if($user->level == 'user') selected @endif>User</option>
                            </select>
                            </div>
                        </div>
                    @endif

                </div>
                <footer class="panel-footer center">
                    <a href="{{route('user.index')}}" class="btn btn-primary">Back</a>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                </footer>
            </section>
        </form>
    </div>
</div>
@endsection
