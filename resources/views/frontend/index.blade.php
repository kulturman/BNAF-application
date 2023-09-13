@extends('frontend.layout')

@section('content')
    <!--Header End-->
    <!--Slider Start-->
    <div class="main-slider wf100">
        <div id="home-slider" class="owl-carousel owl-theme">
            @foreach($sliders as $slider)
                <div class="item slider-item">
                    <div class="slider-caption">
                        {{ $slider->text }}
                    </div>
                    <img src="{{asset(($slider->image))}}" alt="">
                </div>
            @endforeach
        </div>
    </div>
    <!--Slider End-->
    <!--Main Content Start-->
    <div class="main-content">
        <section class="wf100 p80-0">
            <section class="wf100 p80-0">
                <div class="title-style-1 text-center white">
                    <h2>Le Directeur Général</h2>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-8">
                            <div class="h2-Mayor-msg">
                                <div class="Mayor-img">
                                    <span class="msig"></span>
                                    <img src="{{ $config->director_photo ? : url('frontend/images/author.jpg') }}"
                                         alt="">
                                </div>
                                <div class="Mayor-txt">
                                    <strong>Le mot du Directeur</strong>
                                    <h4>{{ $config->director_name }}</h4>
                                    <p>{!! $config->director_word !!}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <!--Mayor Msg Start-->
                            <div class="city-tour gallery"><strong> Spot lancement du site de la BNAF</strong> <a
                                        href="https://youtu.be/" data-rel="prettyPhoto" title="Lancement du site"><img
                                            src="{{ url('frontend/images/playicon.png') }}" alt=""></a> <img
                                        src="{{ url('frontend/images/visite.png') }}" alt=""></div>
                            <!--Mayor Msg End-->
                        </div>
                    </div>
                </div>
            </section>

            <section class="wf100 p75-50  depart-info" style="margin-top: 50px; background: #26922D">
                <div class="container">
                    <div class="row">
                        <div>
                            <div class="title-style-3" style="text-align: center">
                                <h3 style="color: white">Services en ligne</h3>
                            </div>
                            <div class="row">
                                <!--Icon Box Start-->
                                <div class="col-md-3 col-sm-4">
                                    <div class="deprt-icon-box"><img src="{{ url('frontend/images/P3.png') }}" alt="">
                                        <h6><a href="#">Dénonciation d'un contrevenant</a></h6>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="deprt-icon-box"><img src="{{url('frontend/images/P4.png')}}" alt="">
                                        <h6><a href="#">Télédéclaration</a></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="wf100 p80 city-highlights" style="margin-bottom: 10rem">
                <div class="container">
                    <div class="title-style-1 text-center white-text">
                        <h2>Actualités</h2>
                    </div>
                </div>
                <div class="container-fluid">
                    <div id="highlight-slider" class="owl-carousel owl-theme">
                        <!--Item Start-->
                        @foreach($articles as $article)
                            <div class="item">
                                <div class="ch-box">
                                    <div class="ch-thumb">
                                        <a href="{{ route('frontend.article', [$article->id]) }}"><i class="fas fa-link"></i></a>
                                        <img style="height: 300px;"
                                             src="{{ asset($article->cover_image) }}" alt="">
                                    </div>
                                    <div class="ch-txt">
                                        <h5>
                                            <a href="{{ route('frontend.article', [$article->id]) }}"> {{ $article->title }} </a>
                                        </h5>
                                        <p>
                                            {{ getArticleContentPreview($article->content, 100) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <!--Cityscapes & Highlights End-->
            <div class="container">
                <div class="title-style-1 text-center white">
                    <h2>Quelques statistiques</h2>
                </div>
            </div>
            <section class="wf100 p80 fact-newsletter"
                     style="background: url(https://www.architecture.bf/wp-content/uploads/bureau-administratif-3.jpg); background-repeat: round">

                <div class="container">

                    <div class="row">
                        <div class="col-md-8">
                            <div class="title-style-1 text-center white">
                                <h2></h2>
                            </div>
                            <div class="row">
                                <ul class="counter">
                                    @foreach($stats as $stat)
                                        <li class="col-md-4 col-sm-4">
                                            <div class="fact-box">
                                                {!! $stat->icon !!}
                                                <strong>
                                                    {{ $stat->chiffres }}
                                                </strong>
                                                <span>
                                                                        {{ $stat->text }}
                                                                    </span>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!--Stay Connected Start-->
                            <div class="stay-connected">
                                <h5>Newsletter</h5>
                                <ul>
                                    <li>
                                        <input type="text" class="form-control" placeholder="Nom complet">
                                    </li>
                                    <li>
                                        <input type="text" class="form-control" placeholder="Adresse email">
                                    </li>
                                    <li>
                                        <input type="submit" value="Souscrire">
                                    </li>
                                </ul>
                            </div>
                            <!--Stay Connected End-->
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </div>

    <section class="wf100 p80 community-links">
        <div class="container">
            <div class="section-title text-center">
                <h2>Démarches administratives</h2>
            </div>
            <div class="row">
                <!--Department Box Start-->
                <div class="col-md-3 col-sm-6">
                    <div class="community-box mb30">
                        <h6>Carte de vendeur d'or</h6>
                        <ul>
                            Vous souhaitez commercialiser de l'or...
                        </ul>
                        <a class="see-more" href="#">Téléchargez ici</a> <span><img src="images/ccc-icon1.png"
                                                                                    alt=""></span></div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="community-box mb30">
                        <h6>Carte de vendeur d'or</h6>
                        <ul>
                            Vous souhaitez commercialiser de l'or...
                        </ul>
                        <a class="see-more" href="#">Téléchargez ici</a> <span><img src="images/ccc-icon1.png"
                                                                                    alt=""></span></div>
                </div>

            </div>
        </div>
    </section>

    <!--Footer Start-->
@endsection