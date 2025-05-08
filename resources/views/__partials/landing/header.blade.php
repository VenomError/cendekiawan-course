<header class="main-header-two">
    <nav class="main-menu">
        <div class="container">
            <div class="main-menu__logo">
                <a href="index.html">
                    <img
                        src="{{ asset('landing/assets/images/logo-two.png') }}"
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

                    {{-- <li class="dropdown">
                          <a href="#">Blog</a>
                          <ul class="sub-menu">
                              <li class="dropdown">
                                  <a href="#">Blog Grid</a>
                                  <ul class="sub-menu">
                                      <li><a href="blog-grid.html">No Sidebar</a></li>
                                      <li><a href="blog-grid-left.html">Left Sidebar</a></li>
                                      <li><a href="blog-grid-right.html">Right Sidebar</a></li>
                                  </ul>
                              </li>
                              <li class="dropdown">
                                  <a href="#">Blog List</a>
                                  <ul class="sub-menu">
                                      <li><a href="blog-list.html">No Sidebar</a></li>
                                      <li><a href="blog-list-left.html">Left Sidebar</a></li>
                                      <li><a href="blog-list-right.html">Right Sidebar</a></li>
                                  </ul>
                              </li>
                              <li><a href="blog-carousel.html">Blog Carousel</a></li>
                              <li class="dropdown">
                                  <a href="#">Blog Details</a>
                                  <ul class="sub-menu">
                                      <li><a href="blog-details.html">No Sidebar</a></li>
                                      <li><a href="blog-details-left.html">Left Sidebar</a></li>
                                      <li><a href="blog-details-right.html">Right Sidebar</a></li>
                                  </ul>
                              </li>
                          </ul>
                      </li> --}}
                </ul>
            </div><!-- /.main-menu__nav -->
            <div class="main-menu__right">
                <a href="#" class="main-menu__toggler mobile-nav__toggler">
                    <i class="fa fa-bars"></i>
                </a><!-- /.mobile menu btn -->

                <div class="main-menu__info">
                    <span class="icon-Call"></span>
                    <a href="tel:3035550105">(303) 555-0105</a>
                    Call to Questions
                </div>
                <!-- /.info -->
            </div><!-- /.main-menu__right -->
        </div><!-- /.container -->
    </nav>
    <!-- /.main-menu -->
</header>
