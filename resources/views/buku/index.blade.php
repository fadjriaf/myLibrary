@section('js')
<script type="text/javascript">
  $(document).ready(function() {
  	$('#table-buku').DataTable({
        "order": [[ 0, "asc" ]]
    });
	
} );
</script>
@stop
@extends('layouts.master')
@section('content')
<header class="page-header">
    <h2>Dashboard Buku</h2>
                    
        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li><a href="/"><i class="fa fa-home"></i></a></li>
                <li><a href="/buku"><span>Buku</span></a></li>
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

                <h2 class="panel-title">Data Buku</h2>
              </header>
              <div class="panel-body">
					@if(Auth::user()->level == 'admin')
					<form action="{{ url('import_buku') }}" method="post" class="form-inline" enctype="multipart/form-data">
						@csrf
						<a href="{{url('format_buku')}}" class="btn btn-primary">Format Buku</a>
  						<div class="form-group {{ $errors->has('importBuku') ? 'has-error' : '' }}">
   							<input type="file" class="form-control" name="importBuku" required="">
   							<button type="submit" class="btn btn-primary">Import</button>
  						</div>
					</form>
					<br>
                    @endif
                <table class="table table-striped table-bordered" id="table-buku">
                  <thead>
                    <tr>
                      <th>Judul</th>
                      <th>ISBN</th>
                      <th>Pengarang</th>
                      <th>Penerbit</th>
                      <th>Tahun</th>
                      <th>Stock</th>
                      <th>Lokasi</th>
                      @if(Auth::user()->level == 'admin')
                      <th>Action</th>
                      @elseif(Auth::user()->level == 'user')
                      
                      @endif
                    </tr>
                  </thead>
                  <tbody>
                      	@foreach($buku as $buku)
                        <tr>
                        	<td>
                        		@if($buku->cover)
                            	<img src="{{url('img/buku/'. $buku->cover)}}" alt="image" style="margin-right: 10px; width: 25px; height: 25px;" />
                          		@else
                            	<img src="{{url('img/buku/default.png')}}" alt="image" style="margin-right: 10px; width: 25px; height: 25px;" />
                          		@endif
                        		<a href="{{ route('buku.show', $buku->id) }}">
                        			{{$buku->judul}}
                        		</a>
                        	</td>
                          	<td>{{ $buku->isbn }}</a></td>
                          	<td>{{$buku->pengarang}}</td>
                          	<td>{{$buku->penerbit}}</td>
                          	<td>{{$buku->thn_terbit}}</td>
                          	<td>{{$buku->jmlh_buku}}</td>
                          	<td>{{$buku->lokasi}}</td>
                          	@if(Auth::user()->level == 'admin')
                          	<td>
                          	  <a href="{{ route('buku.edit', $buku->id) }}"><i class="fa fa-edit fa-2x"></i>&nbsp;</a>
                          	  <a href="{{ url('buku/delete',$buku->id) }}"><i class="fa fa-trash fa-2x"></i></a>
                          	</td>
                          	@elseif(Auth::user()->level == 'user')

                     		@endif
                        </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
            </section>
			
			@if(Auth::user()->level == 'admin')
            <section class="panel panel-featured panel-featured-primary">
              <header class="panel-heading">
                <div class="panel-actions">
                  <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                  <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                </div>

                <h2 class="panel-title">Tambah Buku</h2>
              </header>
              <div class="panel-body">
                  <div class="col-lg-2">
                    <a href="{{ route('buku.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah</a>
                  </div>
              </div>
            </section>
            @endif
@endsection