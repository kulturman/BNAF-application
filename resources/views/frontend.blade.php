<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>bnaf | Bâtir une solidatité</title>
        <link href="{{ url('frontend/css/custom.css') }}" rel="stylesheet">
        <link href="{{ url('frontend/css/prettyPhoto.css') }}" rel="stylesheet">
        <link href="{{ url('frontend/css/responsive.css') }}" rel="stylesheet">
        <link href="{{ url('frontend/css/color.css') }}" rel="stylesheet">
        <link href="{{ url('frontend/css/all.css') }}" rel="stylesheet">
        <link href="{{ url('frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ url('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
        <link rel="icon" href="images/bnaf1.png" type="image/png">
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    </head>
    <body>
    <!--Wrapper Start-->
    <div class="wrapper">
        <!--Header Start-->
        <header class="wf100 header">
            <div class="topbar">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <ul class="right-links">
                                <li> <a href="#"><i class="fas fa-phone"></i> <strong>{{ $config->phone }}</strong></a> </li>
                                <li> <a href="#"><i class="fas fa-envelope"></i> <strong>{{ $config->email }}</strong></a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="logo-nav-row">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <nav class="navbar">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                                    <a class="navbar-brand" href="index.old.html"><img src="images/bnaf.png" class="top-logo" alt=""></a> </div>
                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav">
                                        <li class="dropdown">
                                            <a href="index.html" class="dropdown-toggle"  aria-haspopup="true" aria-expanded="false">Accueil</a>
                                        </li>

                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mot du DG </a>
                                        </li>

                                        <li class="dropdown">
                                            <a href="" class="dropdown-toggle"  aria-haspopup="true" aria-expanded="false">Actualité </a>
                                        </li>

                                        <li class="dropdown">
                                            <a href="" class="dropdown-toggle"  aria-haspopup="true" aria-expanded="false">Services en ligne </a>
                                        </li>

                                        <li class="dropdown">
                                            <a href="" class="dropdown-toggle"  aria-haspopup="true" aria-expanded="false">Démarches administratives </a>
                                        </li>

                                        <li class="dropdown">
                                            <a href="" class="dropdown-toggle"  aria-haspopup="true" aria-expanded="false">Statistiques </a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="contact.html" class="dropdown-toggle"  aria-haspopup="true" aria-expanded="false">
                                                Contacts
                                            </a>
                                        </li>
                                    </ul>
                                    <div id="search">
                                        <button type="button" class="close">×</button>
                                        <form class="search-overlay-form">
                                            <input type="search" value="" placeholder="type keyword(s) here" />
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--Header End-->
        <!--Slider Start-->
        <div class="main-slider wf100">
            <div id="home-slider" class="owl-carousel owl-theme">
                <!--Item Start-->
                <div class="item slider-item">
                    <div class="slider-caption">
                    </div>
                    <img src="{{url ('frontend/images/h3-slide2.jpg')}}" alt="">
                </div>
                <div class="item slider-item">
                    <div class="slider-caption">
                    </div>
                    <img src="{{url ('frontend/images/h3-slide2.jpg')}}" alt="">
                </div>
                <!--Item End-->
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
                                        <img src="{{ $config->director_photo ? $config->director_photo : url('frontend/images/author.jpg') }}" alt="">
                                    </div>
                                    <div class="Mayor-txt">
                                        <strong>Le mot du Directeur</strong>
                                        <h4>{{ $config->director_name }}</h4>
                                        <p>{{ $config->director_word }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <!--Mayor Msg Start-->
                                <div class="city-tour gallery"> <strong> Spot lancement du site de la BNAF</strong> <a href="https://youtu.be/" data-rel="prettyPhoto" title="Lancement du site"><img src="{{ url('frontend/images/playicon.png') }}" alt=""></a> <img src="{{ url('frontend/images/visite.png') }}" alt=""> </div>
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
                                        <div class="deprt-icon-box"> <img src="{{ url('frontend/images/P3.png') }}" alt="">
                                            <h6> <a href="#">Dénonciation d'un contrevenant</a> </h6>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-4">
                                        <div class="deprt-icon-box"> <img src="{{url('frontend/images/P4.png')}}" alt="">
                                            <h6> <a href="#">Télédéclaration</a> </h6>
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
                            <div class="item">
                                <div class="ch-box">
                                    <div class="ch-thumb">
                                        <a href="#"><i class="fas fa-link"></i></a>
                                        <img src="{{ url('frontend/images/highlights-img1.jpg') }}" alt="">
                                    </div>
                                    <div class="ch-txt">
                                        <h5><a href="#">Lancement du site de la BNAF </a></h5>

                                        <p>L'inauguration du site de la BNAF s'est tenu le 12/12/2022 </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--Cityscapes & Highlights End-->
                <div class="container">
                    <div class="title-style-1 text-center white">
                        <h2>Quelques statistiques</h2>
                    </div>
                </div>
                <section class="wf100 p80 fact-newsletter" style="background: url(https://www.architecture.bf/wp-content/uploads/bureau-administratif-3.jpg); background-repeat: round">

                    <div class="container">

                        <div class="row">
                            <div class="col-md-8">
                                <div class="title-style-1 text-center white">
                                    <h2></h2>
                                </div>
                                <div class="row">
                                    <ul class="counter">
                                        <li class="col-md-4 col-sm-4">
                                            <div class="fact-box"> <i class="fas fa-flag"></i> <strong>25000</strong> <span>Fraudes prévenues</span> </div>
                                        </li>
                                        <li class="col-md-4 col-sm-4">
                                            <div class="fact-box"> <i class="fas fa-map-marked-alt"></i> <strong>985 M</strong> <span>Fraudes prévenues</span> </div>
                                        </li>
                                        <li class="col-md-4 col-sm-4">
                                            <div class="fact-box"> <i class="fas fa-map-marked-alt"></i> <strong>985 M</strong> <span>Fraudes prévenues</span> </div>
                                        </li>
                                        <li class="col-md-4 col-sm-4">
                                            <div class="fact-box"> <i class="fas fa-map-marked-alt"></i> <strong>985 M</strong> <span>Fraudes prévenues</span> </div>
                                        </li>
                                        <li class="col-md-4 col-sm-4">
                                            <div class="fact-box"> <i class="fas fa-map-marked-alt"></i> <strong>985 M</strong> <span>Fraudes prévenues</span> </div>
                                        </li>
                                        <li class="col-md-4 col-sm-4">
                                            <div class="fact-box"> <i class="fas fa-map-marked-alt"></i> <strong>985 M</strong> <span>Fraudes prévenues</span> </div>
                                        </li>

                                        <!--<li class="col-md-4 col-sm-4">
                                          <div class="fact-box"> <i class="fas fa-users"></i> <strong>3.27 M</strong> <span>Pension d'orphélin</span> </div>
                                        </li>
                                        <li class="col-md-4 col-sm-4">
                                          <div class="fact-box"> <i class="fas fa-building"></i> <strong>280</strong> <span>Rente d'incapacité</span> </div>
                                        </li>
                                       <li class="col-md-4 col-sm-4">
                                          <div class="fact-box"> <i class="fas fa-building"></i> <strong>2</strong> <span>Hopitaux construits</span> </div>
                                        </li>
                                        <li class="col-md-4 col-sm-4">
                                          <div class="fact-box"> <i class="fas fa-road"></i> <strong>39</strong> <span>Projects réalisés</span> </div>
                                        </li>-->
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
                            <a class="see-more" href="#">Téléchargez ici</a> <span><img src="images/ccc-icon1.png" alt=""></span> </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="community-box mb30">
                            <h6>Carte de vendeur d'or</h6>
                            <ul>
                                Vous souhaitez commercialiser de l'or...
                            </ul>
                            <a class="see-more" href="#">Téléchargez ici</a> <span><img src="images/ccc-icon1.png" alt=""></span> </div>
                    </div>

                </div>
            </div>
        </section>

        <!--Footer Start-->
        <footer class="home3 main-footer wf100" style="background: rgba(157, 13, 13, 0.89)">
            <div class="container">
                <div class="row">
                    <!--Footer Widget Start-->
                    <div class="col-md-3 col-sm-6">
                        <div class="textwidget"> <img style="width: 70px ;height: 60px" src="images/bnaf.png" alt="">
                            <address>
                                <ul>
                                    <li> <i class="fas fa-university"></i> <strong>Addresse:</strong> {{ $config->address }}
                                        Ouagadougou,</li>
                                    <li> <i class="fas fa-envelope"></i> <strong>Email:</strong> {{ $config->email }} </li>
                                    <li> <i class="fas fa-phone"></i> <strong>Téléphone:</strong> {{ $config->phone }} </li>
                                </ul>
                            </address>
                        </div>
                    </div>
                    <!--Footer Widget End-->
                    <!--Footer Widget Start-->
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-widget">
                            <h6>NOUS CONTACTER</h6>
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-star"></i> BNAF SIEGE OUAGA
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-star"></i> BNAF PASPANGA
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--Footer Widget End-->
                    <!--Footer Widget Start-->
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-widget">
                            <h6>Annuaire officiel</h6>
                            <ul>
                                <li><a href="#"><i class="fas fa-star"></i> Ministère des Mines</a></li>
                                <li><a href="#"><i class="fas fa-star"></i> Ministère des Finances</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <footer class="footer wf100">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-7">
                        <p class="copyr">bnaf tous droits réservés © 2023</p>
                    </div>
                    <div class="col-md-5 col-sm-5">
                        <ul class="footer-social">
                            <li><a href="{{ $config->facebook ?? '#' }}"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{ $config->twitter ?? '#' }}"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="{{ $config->linkedin ?? '#' }}"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="{{ $config->youtube ?? '#' }}"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <div class="overlay"></div>
    </div>
    <!--Wrapper End-->
    <!-- JS -->
    <script src="{{ url('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ url('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('frontend/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ url('frontend/js/custom.js') }}"></script>
    </body>
</html>
