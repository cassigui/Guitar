    <!-- Mobile menu -->
    <div class="cr-sidebar-overlay"></div>
    <div id="cr_mobile_menu" class="cr-side-cart cr-mobile-menu">
        <div class="cr-menu-title">
            <span class="menu-title">Menu</span>
            <button type="button" class="cr-close">×</button>
        </div>
        <div class="cr-menu-inner">
            <div class="cr-menu-content">
                <ul>
                    <li>
                        <a class="nav-link {{ Request::is('/') ? 'actived' : '' }}" href="{{ url('/') }}">Início</a>
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
                </ul>
            </div>
        </div>
    </div>
