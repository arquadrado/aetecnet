@extends('admin.layouts.master')

@section('content')
	<a href="{{ route('member') }}">Adicionar projecto</a>
    @foreach($projects as $project)
    <a href="{{ route('project', ['id' => $project->id]) }}">
    	<div class="row">
	    	<div class="col-sm-6"><p>{{ $project->name }}</p></div>
	    	<div class="col-sm-6"><p>{{ $project->category }}</p></div>
   		</div>
    </a>
    @endforeach
@stop