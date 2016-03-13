@extends('admin.layouts.master')
@section('content')
	<form action="{{ route('member_submit') }}" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="{{ !is_null($member) ? $member->id : null }}" />
		<div class="row">
			<div class="col-sm-6">
				<label for="name">Nome</label>
        		<input name="name" value="{{ !is_null($member) ? $member->name : '' }}">
			</div>
			<div class="col-sm-6">
				<label for="function">Função</label>
        		<input name="function" value="{{ !is_null($member) ? $member->function : '' }}">	
			</div>
		</div>
        <input type="file" name="image" >
        <div class="row">
        	<div class="col-sm-2">
				 <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Submit</button>
			</div>
        </div>
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    </form>
    <form action="{{ route('member_delete') }}" method="post" onsubmit="return confirm('Tens a certeza que queres apagar este membro?');">
    	<div class="row">
        	<div class="col-sm-2">
				 <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Delete</button>
			</div>
        </div>
        <input type="hidden" name="id" value="{{ !is_null($member) ? $member->id : null }}" />
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    </form>
@stop