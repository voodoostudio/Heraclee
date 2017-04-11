<header>
    <div class="container-fluid">
        <div class="logo">
            <img src="/img/logo.svg" alt="Heraclee logo">
        </div>
        <div class="navigation_container">
            <div class="row">
                <div class="col-6">
                    <p class="header_tel">+33 (0)4 94 54 20 01</p>
                </div>
                <div class="col-6">
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
            <nav>
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('results') }}">Achat</a>
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
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </nav>
            <div class="menu-icon">
                <span></span>
            </div>
        </div>
    </div>
</header>