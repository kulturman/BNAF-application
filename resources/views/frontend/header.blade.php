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
                                    <a href="{{ url('/') }}" class="dropdown-toggle"  aria-haspopup="true" aria-expanded="false">Accueil</a>
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