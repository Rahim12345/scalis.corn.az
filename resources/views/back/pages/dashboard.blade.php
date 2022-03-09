@extends('back.layout.master')

@section('title') {{ __('menus.home') }} @endsection

@section('css')

@endsection

@section('content')
    <div class="page">
        @include('back.includes.menu')

        <div class="content">

        </div>
        @include('back.includes.footer')
    </div>
@endsection

@section('js')

@endsection
