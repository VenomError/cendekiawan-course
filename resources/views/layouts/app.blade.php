@extends('layouts.base-app')

@section('title' , $title ?? 'Cendekiawan Course')

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
