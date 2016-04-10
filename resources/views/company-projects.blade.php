@extends('layouts.master')
@section('title', 'Aetecnet')
@section('content')
@include('partials.header-projects')

<div id="fullpage">
            <div class="section" id="section2">
                <div class="slide-container">
                @foreach($categories as $category => $projects)
                	<div class="slide" id="slide1">
                    	@include('partials.category')
                    </div>
                @endforeach
                </div>
                <div class="slide-navigation">
                    <ul>
                    @foreach($categoriesIndexes as $index => $categoryName)
                        @if($index === 0)
                        <li><a class="active" href="#firstPage{{$index > 0 ? '/'.$index : '' }}">{{ $categoryName }}</a></li>
                        @else
                        <li><a href="#firstPage{{$index > 0 ? '/'.$index : '' }}">{{ $categoryName }}</a></li>
                        @endif
                    @endforeach
                    </ul>
                </div>
            </div>

        </div>

@stop
