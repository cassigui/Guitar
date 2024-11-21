    <header id="inicio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="top-header">
                        <nav class="navbar navbar-expand-lg w-100">

                            <!-- Menu Hamburger -->
                            <div class="d-flex justify-content-between w-100 align-items-center d-lg-none">
                                <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <i class="ri-menu-3-line"></i>
                                </button>
                                <a href="/" class="cr-logo">
                                    <img src="{{asset('assets/img/logo/logo.svg')}}" alt="logo" class="logo">
                                    <img src="{{asset('assets/img/logo/dark-logo.png')}}" alt="logo" class="dark-logo">
                                </a>
                            </div>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav w-100 justify-content-between">
                                    <div>
                                        <a href="/" class="cr-logo d-flex align-items-center">
                                            <img src="{{asset('assets/img/logo/logo.svg')}}" alt="logo" class="logo">
                                            <img src="{{asset('assets/img/logo/dark-logo.png')}}" alt="logo" class="dark-logo">
                                        </a>
                                    </div>
                                    <div class="d-flex gap-3">
                                        <li>
                                            <a class="nav-link {{ Request::is('/') ? 'actived' : '' }}"
                                                href="{{ url('/') }}">Início</a>
                                        </li>
                                        <li>
                                            <a class="nav-link {{ Request::is('produtos') ? 'actived' : '' }}"
                                                href="{{ url('/produtos') }}">Produtos</a>
                                        </li>
                                        <li>
                                            <a class="nav-link {{ Request::is('#sobre') ? 'actived' : '' }}"
                                                href="{{ url('/#sobre') }}">Sobre Nós</a>
                                        </li>
                                        <li>
                                            <a class="nav-link {{ Request::is('contato') ? 'actived' : '' }}"
                                                href="{{ url('/contato') }}">Contate-nos</a>
                                        </li>
                                    </div>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
