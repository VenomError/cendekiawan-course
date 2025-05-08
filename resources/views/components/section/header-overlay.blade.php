@props([ 
    'title' => ''
 ])
<section class="page-header page-header--bg-two" data-jarallax="" data-speed="0.3" data-imgposition="50% -100%"
    style="z-index: 0;" wire:ignore>
    <!-- /.page-header-bg -->
    <div class="page-header__overlay"></div><!-- /.page-header-overlay -->
    <div class="container text-center">
        <h2 class="page-header__title">{{ $title }}</h2><!-- /.page-title -->
        <ul class="page-header__breadcrumb list-unstyled">
         
        </ul><!-- /.page-breadcrumb list-unstyled -->
    </div><!-- /.container -->
    <div id="jarallax-container-0"
        style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; z-index: -100;">
        <div class="page-header__bg jarallax-img"
            style="object-fit: cover; object-position: 50% 50%; max-width: none; position: fixed; top: 0px; left: 0px; width: 483px; height: 536.9px; overflow: hidden; pointer-events: none; transform-style: preserve-3d; backface-visibility: hidden; will-change: transform, opacity; margin-top: 55.05px; transform: translate3d(0px, -25.05px, 0px);">
        </div>
    </div>
</section>
