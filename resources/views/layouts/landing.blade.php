@extends('layouts.base-landing')

@section('title', $title ?? 'Cendekiawan Course')

@section('content')
    {{ $slot }}
@endsection
