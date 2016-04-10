@extends('admin.layouts.master')

@section('content')
        <div class="dashboard">
            <form action="{{ route('project_submit') }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="{{ !is_null($project) ? $project->id : null }}" />
                <div class="row">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="row form-field">
                                    <div class="col-xs-12">
                                        <label for="name">Nome</label>
                                    </div>
                                </div>
                                <div class="row form-field">
                                    <div class="col-xs-12">
                                        <input class="form-control" name="name" value="{{ !is_null($project) ? $project->name : '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="row form-field">
                                    <div class="col-xs-12">
                                        <label for="name">Cliente</label>
                                    </div>
                                </div>
                                <div class="row form-field">
                                    <div class="col-xs-12">
                                        <input class="form-control" name="client" value="{{ !is_null($project) ? $project->client : '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="row form-field">
                                    <div class="col-xs-12">
                                        <label for="name">Localização</label>
                                    </div>
                                </div>
                                <div class="row form-field">
                                    <div class="col-xs-12">
                                        <input class="form-control" name="location" value="{{ !is_null($project) ? $project->location : '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="row form-field">
                                    <div class="col-xs-12">
                                        <label for="name">Area</label>
                                    </div>
                                </div>
                                <div class="row form-field">
                                    <div class="col-xs-12">
                                        <input class="form-control" name="area" value="{{ !is_null($project) ? $project->area : '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="row form-field">
                                    <div class="col-xs-12">
                                        <label for="name">Coordenador</label>
                                    </div>
                                </div>
                                <div class="row form-field">
                                    <div class="col-xs-12">
                                        <input class="form-control" name="coordinator" value="{{ !is_null($project) ? $project->coordinator : '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="row form-field">
                                    <div class="col-xs-12">
                                        <label for="name">Ano</label>
                                    </div>
                                </div>
                                <div class="row form-field">
                                    <div class="col-xs-12">
                                        <input class="form-control" name="year" value="{{ !is_null($project) ? $project->year : '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="row form-field">
                                    <div class="col-xs-12">
                                        <label for="name">Arquitectura</label>
                                    </div>
                                </div>
                                <div class="row form-field">
                                    <div class="col-xs-12">
                                        <input class="form-control" name="architecture" value="{{ !is_null($project) ? $project->architecture : '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                             <div class="col-xs-4">
                                <div class="row form-field">
                                    <div class="col-xs-12">
                                        <label for="category_id">Categoria</label>
                                    </div>
                                </div>
                                <div class="row form-field">
                                    <div class="col-xs-12">
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
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="row form-field">
                                    <div class="col-xs-12">
                                        <label for="company">Empresa</label>
                                    </div>
                                </div>
                                <div class="row form-field">
                                    <div class="col-xs-12">
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
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <label for="description">Descrição</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <textarea name="description">{{ !is_null($project) ? $project->description : '' }}</textarea>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <label for="selected">Destaque</label>
                                <input type="checkbox" name="selected" value="1" {{ !is_null($project) ? ($project->selected ? 'checked' : '') : '' }}> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                               <input type="file" name="images[]" multiple>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="images">
                                    @foreach($images as $image)
                                        <div class="image">
                                            <img id="{{ $image->id }}" src="{{ $url.$image->path }}" alt="">
                                            <a class="delete-btn">remover</a>
                                        </div>
                                    @endforeach 
                                </div>
                            </div>
                        </div>
                    </div>
                        
                </div>
                 <div class="row">
                    <div class="col-xs-4">
                        <button class="form-button" type="submit">Submeter</button>
                    </div>
                </div>
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            </form>
            <form action="{{ route('project_delete') }}" method="post" onsubmit="return confirm('Tens a certeza que queres apagar este projecto?');">
                <div class="row">
                    <div class="col-sm-2">
                         <button class="form-button" type="submit">Apagar</button>
                    </div>
                </div>
                <input type="hidden" name="id" value="{{ !is_null($project) ? $project->id : null }}" />
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            </form>
        </div>
@stop