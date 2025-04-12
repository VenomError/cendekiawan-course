@extends('layouts.base-app')

@section('title', $title ?? 'Cendekiawan Course')

@section('content')
    <!-- Begin page -->
    <div class="wrapper">


        @include('__partials.app.top-bar')

        @include('__partials.app.sidebar')

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                </div>
                                <h4 class="page-title"></h4>
                            </div>
                        </div>
                    </div>

                    {{ $slot }}

                </div> <!-- container -->

            </div> <!-- content -->
        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

@endsection
