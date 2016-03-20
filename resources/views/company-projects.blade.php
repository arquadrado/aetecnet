@extends('layouts.master')
@section('title', 'Aetecnet')
@section('content')
@include('partials.header')

<div id="fullpage">

            

            <div class="section" id="section1">
                <div class="slide-container">
                @foreach($categories as $category)
                	<div class="slide" id="slide1">
                    	@include('partials.category')
                    </div>
                @endforeach
                </div>
                <div class="slide-navigation">
                    <ul>
                    @foreach($categories as $index => $category)
                        <li><a class="active" href="#firstPage{{$index > 0 ? '/'.$index : '' }}">{{ $category->name }}</a></li>
                    @endforeach
                    </ul>
                </div>
            </div>

        </div>

@stop
