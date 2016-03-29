@extends('layouts.master')
@section('title', 'Aetecnet')
@section('content')
@include('partials.header')

<div id="fullpage">

            

            <div class="section" id="section1">
                <div class="slide-container">
                    <div class="slide" id="slide1">
                        <div class="project-info">
                            <div class="row">
                                <div class="col-xs-12"><p class="title">{{ $project->name }}</p></div>
                                <div class="image col-xs-12"><img src="{{ $url.$project->cover_path }}" alt=""></div>
                                <div class="col-xs-12"><p class="description">{{ $project->description }}</p></div>
                            </div>
                        </div>
                    </div>
                @foreach($project->images as $image)
                	<div class="slide" id="slide1">
                        <div class="project-image">
                            <img src="{{ $url.$image->path }}" alt="">  
                        </div>
                    </div>
                @endforeach
                </div>
                <div class="slide-navigation">
                    <ul>
                    @foreach($project->images as $index => $image)
                        @if($index === 0)
                        <li><a class="active" href="#firstPage{{$index > 0 ? '/'.$index : '' }}">{{ $index }}</a></li>
                        @else
                        <li><a href="#firstPage{{$index > 0 ? '/'.$index : '' }}">{{ $index }}</a></li>
                        @endif
                    @endforeach
                    </ul>
                </div>
            </div>

        </div>

@stop