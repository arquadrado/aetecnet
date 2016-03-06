@extends('layouts.master')
@section('title', 'Aetecnet')
@section('content')
@include('partials.header')

<div id="fullpage">

            <div class="section " id="section0">
                @include('partials.landing')
            </div>

            <div class="section" id="section1">
                <div class="slide-container">
                    <div class="slide" id="slide1">
                        <div class="about-wrapper">
                            @include('partials.about')
                        </div>
                    </div>
                    <div class="slide" id="slide2">
                        @include('partials.bio')    
                    </div>
                    <div class="slide" id="slide3">
                        @include('partials.team')   
                    </div>
                </div>
                <div class="slide-navigation">
                    <ul>
                        <li><a class="active" href="#secondPage">About</a></li>
                        <li><a href="#secondPage/1">Bio</a></li>
                        <li><a href="#secondPage/2">Team</a></li>
                    </ul>
                </div>
            </div>

            <div class="section" id="section2">
                <div class="slide-container">
                    <div class="slide" id="slide1">
                        @include('partials.projects')
                    </div>
                    <div class="slide" id="slide2">
                        <div class="container-fluid">
                            @include('partials.projects')
                        </div>
                    </div>
                    <div class="slide-navigation">
                        <ul>
                            <li><a class="active" href="#thirdPage">Selected</a></li>
                            <li><a href="#thirdPage/1">Housing</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="section" id="section3">
                <div class="slide-container">
                    <div class="slide" id="slide1">
                            @include('partials.contact-aetec')
                    </div>
                    <div class="slide" id="slide2">
                        @include('partials.contact-step')   
                    </div>
                </div>
                <div class="slide-navigation">
                    <ul>
                        <li><a href="#fourthPage">Aetec-mo</a></li>
                        <li><a href="#fourthPage/1">Stepaetec</a></li>
                    </ul>
                </div>
            </div>

        </div>

@stop
