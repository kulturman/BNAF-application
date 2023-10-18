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
                            <a class="navbar-brand" href="#">
                                <img src="{{ url('frontend/images/logo_bnaf.jpg') }}" class="top-logo" alt="">
                            </a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="dropdown">
                                    <a href="{{ url('/') }}" class="dropdown-toggle"  aria-haspopup="true" aria-expanded="false">Accueil</a>
                                </li>

                                <li class="dropdown">
                                    <a href="{{url('/')}}#mot-du-dg" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mot du DG </a>
                                </li>

                                <li class="dropdown">
                                    <a href="#actualite" class="dropdown-toggle"  aria-haspopup="true" aria-expanded="false">Actualité </a>
                                </li>

                                <li class="dropdown">
                                    <a href="#services-en-ligne" class="dropdown-toggle"  aria-haspopup="true" aria-expanded="false">Services en ligne </a>
                                </li>

                                <li class="dropdown">
                                    <a href="#demarches" class="dropdown-toggle"  aria-haspopup="true" aria-expanded="false">Démarches administratives </a>
                                </li>

                                <li class="dropdown">
                                    <a href="#statistiques" class="dropdown-toggle"  aria-haspopup="true" aria-expanded="false">Statistiques </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>