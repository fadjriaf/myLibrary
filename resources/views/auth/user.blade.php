@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table-user').DataTable({
      "iDisplayLength": 10
    });

} );
</script>
@stop

@extends('layouts.master')
@section('content')
<header class="page-header">
    <h2>Dashboard User</h2>
                    
        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li><a href="/"><i class="fa fa-home"></i></a></li>
                <li><a href="/user"><span>User</span></a></li>
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

                <h2 class="panel-title">Data User</h2>
              </header>
              <div class="panel-body">
                <table class="table table-striped table-bordered" id="table-user">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Username</th>
                      <th>Level</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($user as $user)
                        <tr>
                          <td>
                            <a href="{{ route('user.show', $user->id) }}">
                              {{$user->name}}
                            </a>
                          </td>
                          <td>{{$user->username}}</td>
                          <td>{{$user->level}}</td>
                          <td>{{$user->email}}</td>
                          <td>
                            <a href="{{ route('user.edit', $user->id) }}"><i class="fa fa-edit fa-2x"></i>&nbsp;</a>
                            <a href="{{ url('user/delete',$user->id) }}"><i class="fa fa-trash fa-2x"></i></a>
                          </td>
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

                <h2 class="panel-title">Tambah User</h2>
              </header>
              <div class="panel-body">
                  <div class="col-lg-2">
                    <a href="{{ route('user.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah</a>
                  </div>
              </div>
            </section>
@endsection

