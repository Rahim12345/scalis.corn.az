@extends('back.layout.master')

@section('title') {{ __('menus.about') }} @endsection

@section('css')

@endsection

@section('content')
    <div class="page">
        @include('back.includes.menu')
        <div class="container-xl mt-3" style="min-height: 70vh">
            <div class="row row-cards">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="content p-3">
                            <form action="{{ route('contact.store') }}" id="contact-form" method="POST" enctype="multipart/form-data" onsubmit="return false">
                                @csrf
                                <div class="form-group mb-3">
                                    1780x665
                                    <span class="avatar avatar-xl mb-3 image-change cursor-pointer" id="image-change" style="display: block !important;width: 100% !important;height: 300px;background-image: url({{ asset('files/contact/'.\App\Helpers\Options::getOption('contact_image')) }});"><img id="change-image" src="{{ asset('back/images/add-image.png') }}" alt="Şəkili dəyiş" style="position: absolute;float: right;bottom: 0;right: 0;width: 30px;cursor: pointer"></span>
                                    <input type="file" name="image" id="image" style="display: none">
                                    <div class="progress" style="display: none" id="imageProgress">
                                        <div class="progress-bar progress-bar-indeterminate bg-green"></div>
                                    </div>
                                    <small class="text-danger" id="image-error"></small>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('back.includes.footer')
    </div>
@endsection

@section('js')
    <script src="{{ asset('back/js/contact-banner.js') }}"></script>
@endsection
