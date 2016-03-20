@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="dashboard">
            <form action="{{ route('project_submit') }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="{{ !is_null($project) ? $project->id : null }}" />
                <input name="name" value="{{ !is_null($project) ? $project->name : '' }}">
                <input name="category_id" value="{{ !is_null($project) ? $project->category_id : '' }}">
                <input type="file" name="images[]" multiple>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Submit</button>
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <div class="images">
                    @foreach($images as $image)
                        <div class="image">
                            <img id="{{ $image->id }}" src="{{ $url.$image->path }}" alt="">
                            <a class="delete-btn">delete</a>
                        </div>
                    @endforeach 
                </div>
            </form>
        </div>
    </div>
@stop