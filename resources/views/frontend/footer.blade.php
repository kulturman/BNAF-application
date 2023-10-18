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
                <p class="copyr">BNAF tous droits réservés © 2023</p>
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