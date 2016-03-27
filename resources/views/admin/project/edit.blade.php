@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="dashboard">
            <form action="{{ route('project_submit') }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{{ !is_null($project) ? $project->id : null }}" />
            <div class="row">
                <div class="col-xs-12">
                    <label for="name">Nome</label>
                    <input name="name" value="{{ !is_null($project) ? $project->name : '' }}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label for="description">Descrição</label>
                    <input name="description" value="{{ !is_null($project) ? $project->description : '' }}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label for="selected">Destaque</label>
                    <input type="checkbox" name="selected" value="1" {{ !is_null($project) ? ($project->selected ? 'checked' : '') : '' }}> 
                </div>
            </div>
             <div class="row">
                <div class="col-xs-6">
                <label for="category_id">Categoria</label>
                    <select name="category_id">
                        @foreach($categories as $category)
                        @if(!is_null($project) && $category->id === (int)$project->category_id)
                        <option selected="selected" value="{{ $category->id }}">{{ $category->name }}</option>
                        @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-xs-6">
                    <label for="company">Empresa</label>
                    <select name="company">
                        @foreach($companies as $key => $value)
                        @if(!is_null($project) && $value === $project->company)
                        <option selected="selected" value="{{ $value }}">{{ $key }}</option>
                        @else
                        <option value="{{ $value }}">{{ $key }}</option>
                        @endif
                        @endforeach
                    </select> 
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                   <input type="file" name="images[]" multiple>
                </div>
            </div>
             <div class="row">
                <div class="col-xs-4">
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Submit</button>
                </div>
            </div>
                
                
                    
                
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
            <form action="{{ route('project_delete') }}" method="post" onsubmit="return confirm('Tens a certeza que queres apagar este projecto?');">
                <div class="row">
                    <div class="col-sm-2">
                         <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Delete</button>
                    </div>
                </div>
                <input type="hidden" name="id" value="{{ !is_null($project) ? $project->id : null }}" />
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            </form>
        </div>
    </div>
@stop