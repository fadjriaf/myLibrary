@section('js')
<script type="text/javascript">
  $(document).ready(function() {
  	$('#table-member').DataTable({
        "order": [[ 1, "asc" ]]
    });
	
} );
</script>
@stop

@extends('layouts.master')
@section('content')
<header class="page-header">
    <h2>Dashboard Member</h2>
                    
        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li><a href="/"><i class="fa fa-home"></i></a></li>
                <li><a href="/member"><span>Member</span></a></li>
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

                <h2 class="panel-title">Data Member</h2>
              </header>
              <div class="panel-body">
                <table class="table table-striped table-bordered" id="table-member">
                  <thead>
                    <tr>
                      <th>NIS</th>
                      <th>Name</th>
                      <th>Tanggal Lahir</th>
                      <th>Jenis Kelamin</th>
                      <th>Jurusan</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($member as $member)
                        <tr>
                        <td>{{$member->nis}}</td>
                          	<td>
                          	  <a href="{{ route('member.show', $member->id) }}">
                          	    {{ $member->User['name'] }}
                          	  </a>
                          	</td>
                          	<td>{{$member->tanglahir}}</td>
                          	<td>@if($member->jk == 'L')
                            	Laki - Laki
                          	@else
                          	  	Perempuan
                          	@endif</td>
                          	
                          	<td>{{$member->jurusan}}</td>
                          	<td>
                          	  <a href="{{ route('member.edit', $member->id) }}"><i class="fa fa-edit fa-2x"></i>&nbsp;</a>
                          	  <a href="{{ url('member/delete',$member->id) }}"><i class="fa fa-trash fa-2x"></i></a>
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

                <h2 class="panel-title">Tambah Member</h2>
              </header>
              <div class="panel-body">
                  <div class="col-lg-2">
                    <a href="{{ route('member.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah</a>
                  </div>
              </div>
            </section>
@endsection

