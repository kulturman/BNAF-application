@extends('frontend.layout')

@section('content')
<section class="wf100 subheader">
    <div class="container">
        <h2>{{ $title }}</h2>
        <ul>
            <li>
                <a href="{{ url('/') }}">Accueil</a>
            </li>
            <li> {{ $title }}</li>
        </ul>
    </div>
</section>
<!--Sub Header End-->
<!--Main Content Start-->
<div class="main-content p80">
    <div class="news-wrapper news-grid">
        <div class="container">
            <div class="row">
                <div class="col-md-12 content" style="text-align: justify">
                    {!! $content !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection