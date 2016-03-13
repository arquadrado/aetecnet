@extends('admin.layouts.master')

@section('content')
	<a href="{{ route('member') }}">Adicionar membro</a>
    @foreach($members as $member)
    <a href="{{ route('member', ['id' => $member->id]) }}">
    	<div class="row">
	    	<div class="col-sm-6"><p>{{ $member->name }}</p></div>
	    	<div class="col-sm-6"><p>{{ $member->function }}</p></div>
   		</div>
    </a>
    @endforeach
    <div class="multiply-container">
                <div class="row multiply">
                    <div class="col-xs-4 to-reset">
                        <div class="row">
                            <div class="col-xs-1 reorder-handle item-handle">
                                <span class="glyphicon glyphicon-menu-hamburger"></span>
                            </div>
                            <div class="col-xs-11">
                                <input type="text" name="field" value="" placeholder="placeholder">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 to-reset">
                        <input type="text" name="field" value="" placeholder="placeholder">
                    </div>
                    <div class="col-xs-2">
                        <div class="row-buttons">
                            <button title="Remover" type="button" class="with-tooltip btn btn-sm btn-danger remove-item">
                            <span class="glyphicon glyphicon-minus"></span>
                            </button>
                            <button title="Adicionar" type="button" class="with-tooltip btn btn-sm btn-success add-item">
                            <span class="glyphicon glyphicon-plus"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
@stop