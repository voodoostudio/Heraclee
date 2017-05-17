<header>
    <div class="container-fluid">
        <div class="logo">
            <a href="{{ route('index') }}">
                <img src="/img/logo.svg" alt="Heraclee logo">
            </a>
        </div>
        <div class="navigation_container">
            <div class="navigation_block">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <p class="header_tel">+33 (0)4 94 54 20 01</p>
                    </div>
                    <div class="col-12 col-md-6">
                        <ul class="lang_currency_container">
                            <li>
                                <ul class="language_select">
                                    <li><a href="#" class="active">Fra</a></li>
                                    <li><a href="#">Eng</a></li>
                                </ul>
                            </li>
                            <li>
                                <select name="currency">
                                    <option value="chf">chf</option>
                                    <option value="eur">euro</option>
                                </select>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <?php
                $current_page = Route::getCurrentRoute()->getName();
            ?>

            <nav>
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link {{ ($current_page == 'index') ? 'active' : '' }}" href="{{ route('index') }}">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($current_page == 'results' || $current_page == 'details') ? 'active' : '' }}" href="{{ route('results') }}">Achat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Location</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Promotions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Locaux commerciaux</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Agence</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="menu-icon">
            <span></span>
        </div>

    </div>
</header>