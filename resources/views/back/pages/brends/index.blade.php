@extends('back.layout.master')

@section('title') {{ __('menus.brends') }}  @endsection
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
                            <form action="{{ route('brend.store') }}" id="brend-form" method="POST" enctype="multipart/form-data" onsubmit="return false">
                                @csrf
                                <div style="border: 1px dotted grey;margin-top: 20px">
                                    <span style="position: absolute;float: right;top: 2073px;right: 10px;width: 30px;cursor: pointer"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg></span>
                                    <div class="form-group mb-3">
                                        Banner 1780x665
                                        <span class="avatar avatar-xl mb-3 image-change1 cursor-pointer" id="image-change1" style="display: block !important;width: 100% !important;height: 300px;background-image: url({{ asset('files/brends/'.$brend_banner) }});"><img id="change-image" src="{{ asset('back/images/add-image.png') }}" alt="Şəkili dəyiş" style="position: absolute;float: right;bottom: 0;right: 0;width: 30px;cursor: pointer"></span>
                                        <input type="file" name="brend_banner" id="brend_banner" style="display: none">
                                        <div class="progress" style="display: none" id="imageProgress1">
                                            <div class="progress-bar progress-bar-indeterminate bg-green"></div>
                                        </div>
                                        <small class="text-danger" id="image-error"></small>
                                    </div>
                                </div>

                                <div style="border: 1px dotted grey;margin-top: 20px">
                                    <span style="position: absolute;float: right;top: 2073px;right: 10px;width: 30px;cursor: pointer"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg></span>
                                    <div class="form-group mb-3">
                                        Brend şəkili 100x63
                                        <span class="avatar avatar-xl mb-3 image-change2 cursor-pointer" id="image-change2" style="display: block !important;width: 100% !important;height: 300px;background-image: url();"><img id="change-image" src="{{ asset('back/images/add-image.png') }}" alt="Şəkili dəyiş" style="position: absolute;float: right;bottom: 0;right: 0;width: 30px;cursor: pointer"></span>
                                        <input type="file" name="brend_image" id="brend_image" style="display: none">
                                        <div class="progress" style="display: none" id="imageProgress2">
                                            <div class="progress-bar progress-bar-indeterminate bg-green"></div>
                                        </div>
                                        <small class="text-danger" id="image-error"></small>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="mb-3 col-md-8 offset-md-2">
                    <table class="table">
                        <tbody id="brends"></tbody>
                    </table>
                </div>
            </div>
        </div>
        @include('back.includes.footer')
    </div>
@endsection

@section('js')
    <script src="{{ asset('back/js/brend-banner.js') }}"></script>
    <script src="{{ asset('back/js/brend-image.js') }}"></script>
@endsection
