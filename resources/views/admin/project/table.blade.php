@extends('admin.layouts.master')

@section('content')
    @foreach($projects as $project)
        <p>{{ $project->name }}</p>
    @endforeach
@stop