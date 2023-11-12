@extends('frontend.layout')

@section('content')
<section class="wf100 subheader">
    <div class="container">
        <h2>{{ $article->title }}</h2>
        <ul>
            <li>
                <a href="{{ url('/') }}">Accueil</a>
            </li>
            <li> {{ $article->title }}</li>
        </ul>
    </div>
</section>
<!--Sub Header End-->
<!--Main Content Start-->
<div class="main-content p80">
    <!--News Details Page Start-->
    <div class="news-details">
        <div class="container">
            <div class="row">
                <!--Content Col Start-->
                <div class="col-md-9">
                    <div class="news-box">
                        <div class="new-thumb">
                            <a href="#"><i class="fas fa-link"></i></a>
                            <img style="max-height: 600px" src="{{ url($article->cover_image) }}"
                                 alt="Image de couverture">
                        </div>
                        <div class="new-txt">
                            <ul class="news-meta">
                                <li>{{ $article->created_at->format('d/m/Y') }}</li>
                            </ul>
                            <h4>
                                {{ $article->title }}
                            </h4>
                            {!! $article->content !!}
                        </div>
                    </div>
                </div>
                <!--Content Col End-->
                <!--Sidebar Start-->
                <div class="col-md-3">
                    <div class="sidebar">
                        <div class="widget">
                            <h4>Articles récents</h4>
                            <div class="recent-posts inner">
                                <ul>
                                    @foreach($relatedArticles as $article)
                                    <li>
                                        <img src="{{ url($article->cover_image) }}" alt="">
                                        <strong>{{ $article->created_at->format('d/m/Y') }}</strong>
                                        <h6>
                                            <a href="{{ route('frontend.article', [$article->id]) }}">
                                                {{ $article->title }}
                                            </a>
                                        </h6>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Sidebar End-->
            </div>
        </div>
    </div>
    <!--News Details Page End-->
</div>
@endsection