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
            @yield('content')
            <footer class="home3 main-footer wf100" style="background: rgba(157, 13, 13, 0.89)">
                <div class="container">
                    <div class="row">
                        <!--Footer Widget Start-->
                        <div class="col-md-3 col-sm-6">
                            <div class="textwidget">
                                <address>
                                    <ul>
                                        <li> <i class="fas fa-university"></i> <strong>Addresse:</strong> {{ $config->address }}</li>
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
