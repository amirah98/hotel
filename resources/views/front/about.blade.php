@extends('layouts.front')

@section('content')

    <div class="inn-banner">
        <div class="container">
            <div class="row">
                <h4>{{ $page->title }}</h4>
                <p> </p>
                <ul>
                    <li><a href="{{ url('/') }}">Home</a>
                    </li>
                    <li><a href="{{ url($page->url_title) }}">{{  $page->title }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="inn-body-section">
        <div class="container">
            <div class="row">
                <div class="page-head">
                    <h2>{{ $page->title }}</h2>
                    <div class="head-title">
                        <div class="hl-1"></div>
                        <div class="hl-2"></div>
                        <div class="hl-3"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <p>{{ $page->description }}</p>
            </div>
        </div>
    </div>
@endsection
