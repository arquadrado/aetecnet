@extends('admin.layouts.master')

@section('content')
<div class="item-list">
	<a class="add" href="{{ route('project') }}">Adicionar projecto</a>
    @foreach($projects as $project)
    <a class="list-item" href="{{ route('project', ['id' => $project->id]) }}">
    	<div class="row">
	    	<div class="col-sm-4 name"><p>{{ $project->name }}</p></div>
	    	<div class="col-sm-4"><p>{{ $project->category->name }}</p></div>
	    	<div class="col-sm-4"><p>{{ $project->company }}</p></div>
   		</div>
    </a>
    @endforeach
</div>
@stop

