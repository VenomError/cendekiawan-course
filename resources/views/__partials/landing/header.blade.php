<header class="main-header-two">
    <nav class="main-menu">
        <div class="container">
            <div class="main-menu__logo">
                <a href="/">
                    <img
                        src="{{ asset('logo.png') }}"
                        width="183"
                        height="48"
                        alt="Eduact"
                    >
                </a>
            </div><!-- /.main-menu__logo -->
            <div class="main-menu__nav">
                <ul class="main-menu__list">
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li><a href="{{ route('landing.kursus.list') }}">Kursus</a></li>
                    @auth('web')
                        <li><a href="{{ route('landing.pendaftar.riwayat') }}">Riwayat</a></li>
                        <li><a href="{{ route('landing.jadwal.jadwal') }}">Jadwal</a></li>
                          <li>
                            <a href="{{ route('logout') }}"
                                class="btn btn-danger text-white"
                            >Logout</a>
                        </li>
                    @endauth
                    @guest()
                        <li>
                            <a href="{{ route('login') }}"
                                class="btn btn-primary text-white"
                            >Login</a>
                        </li>
                    @endguest
                </ul>
            </div><!-- /.main-menu__nav -->
            <div class="main-menu__right">
                <a href="#" class="main-menu__toggler mobile-nav__toggler">
                    <i class="fa fa-bars"></i>
                </a><!-- /.mobile menu btn -->

                <div class="main-menu__info">
                    <span class="icon-Call"></span>
                    <a href="https://wa.me/{{ getMetadata('metadata_phone_number') }}" target="__blank">{{ getMetadata('metadata_phone_number') }}</a>
                    WhatsApp
                </div>
                <!-- /.info -->
            </div><!-- /.main-menu__right -->
        </div><!-- /.container -->
    </nav>
    <!-- /.main-menu -->
</header>
