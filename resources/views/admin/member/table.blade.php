@extends('admin.layouts.master')

@section('content')
    <div class="item-list">
        <a class="add" href="{{ route('member') }}">Adicionar membro</a>
        @foreach($members as $member)
        <a class="list-item" href="{{ route('member', ['id' => $member->id]) }}">
            <div class="row">
                <div class="col-sm-6 name"><p>{{ $member->name }}</p></div>
                <div class="col-sm-6"><p>{{ $member->function }}</p></div>
            </div>
        </a>
        @endforeach
    </div>
@stop