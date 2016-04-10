@extends('layouts.master')
@section('title', 'Aetecnet')
@section('content')
@include('partials.header-projects')

<div id="fullpage">
            <div class="section" id="section1">
                <div class="slide-container">
                @foreach($project->images as $image)
                	<div class="slide" id="slide1">
                        <div class="project-image">
                            <img src="{{ $url.$image->path }}" alt="">
                        </div>
                    </div>
                @endforeach
                    <div class="slide" id="slide1">
                        <div class="project-info">
                             <div class="row">
                                <div class="col-sm-4 project-details">
                                    <p><strong>Project: </strong>{{ $project->name }}</p>
                                    <p><strong>Client: </strong>{{ $project->client }}</p>
                                    <p><strong>Architecture: </strong>{{ $project->coordinator }}</p>
                                    <p><strong>Location: </strong>{{ $project->location }}</p>
                                    <p><strong>Project Year: </strong>{{ $project->year }}</p>
                                    <p><strong>Area: </strong>{{ $project->area }}</p>
                                </div>
                                <div class="col-sm-8 description">
                                    <p>{{ $project->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide-navigation">
                    <ul>
                    @foreach($project->images as $index => $image)
                        @if($index === 0)
                        <li><a class="active" href="#firstPage{{$index > 0 ? '/'.$index : '' }}">{{ $index + 1 }}</a></li>
                        @else
                        <li><a href="#firstPage{{$index > 0 ? '/'.$index : '' }}">{{ $index + 1 }}</a></li>
                        @endif
                    @endforeach
                        <li><a href="#firstPage{{'/'.count($project->images) }}">{{ count($project->images) + 1 }}</a></li>
                    </ul>
                </div>
            </div>

        </div>

@stop