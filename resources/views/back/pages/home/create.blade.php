@extends('back.layout.master')

@section('title') {{ __('menus.home') }} @endsection

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
                            <form action="{{ route('home.store') }}" id="home-form" method="POST" enctype="multipart/form-data" onsubmit="return false">
                                @csrf
                                <div class="form-group mb-3 " style="border: 1px dotted grey">
                                    Video Banner <span style="position: absolute;float: right;top: 39px;right: 10px;width: 30px;cursor: pointer"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg></span>
                                    <span class="avatar avatar-xl mb-3 image-change cursor-pointer" id="image-change" style="display: block !important;width: 100% !important;height: 300px;background-image: url();"><img id="change-image" src="{{ asset('back/images/add-image.png') }}" alt="Şəkili dəyiş" style="position: absolute;float: right;bottom: 0;right: 0;width: 30px;cursor: pointer">
                                    <video playsinline="playsinline" id="videoBanner" autoplay="autoplay" muted="muted" loop="loop" width="100%" style="display: block;height: -webkit-fill-available !important;">
                                        <source src="{{ asset('files/video-banner/'.\App\Helpers\Options::getOption('video_banner')) }}" id="video_here" type="video/mp4">
                                    </video>
                                    </span>
                                    <input type="file" name="video_banner" id="video_banner" style="display: none">
                                    <div class="progress" style="display: none" id="imageProgress">
                                        <div class="progress-bar progress-bar-indeterminate bg-green"></div>
                                    </div>
                                    <small class="text-danger" id="image-error"></small>
                                </div>

                                <div style="border: 1px dotted grey;padding-bottom: 40px">
                                    <span style="position: absolute;float: right;top: 392px;right: 10px;width: 30px;cursor: pointer"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg></span>
                                    <div class="form-group mb-3">
                                        1780x665
                                        <span class="avatar avatar-xl mb-3 image-change2 cursor-pointer" id="image-change2" style="display: block !important;width: 100% !important;height: 300px;background-image: url({{ asset('files/about/'.$upload_left_side_image) }});"><img id="change-image" src="{{ asset('back/images/add-image.png') }}" alt="Şəkili dəyiş" style="position: absolute;float: right;bottom: 0;right: 0;width: 30px;cursor: pointer"></span>
                                        <input type="file" name="upload_left_side_image" id="upload_left_side_image" style="display: none">
                                        <div class="progress" style="display: none" id="imageProgress2">
                                            <div class="progress-bar progress-bar-indeterminate bg-green"></div>
                                        </div>
                                        <small class="text-danger" id="image-error"></small>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="title_az">{{ __('static.title_az') }}</label>
                                        <input type="text" name="title_az" placeholder="Dinçer və Carçıoğlu BM 1997-ci ildə təsis edilmiş və bu gün Azərbaycanda biznesin müxtəlif sahələrində təmsil olunan iri şirkətlər qrupundan biridir." id="title_az" class="form-control w-100 @error('title_az') is-invalid  @enderror" value="{{ $title_az }}">
                                        <small class="text-danger" id="title_az-error"></small>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-label" for="title_en">{{ __('static.title_en') }}</label>
                                        <input type="text" name="title_en" placeholder="Dincer and Jarchioglu JV was established in 1997 and today is one of the largest groups of companies represented in various fields of business in Azerbaijan." id="title_en" class="form-control w-100 @error('title_en') is-invalid  @enderror" value="{{ $title_en }}">
                                        <small class="text-danger" id="title_en-error"></small>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-label" for="title_ru">{{ __('static.title_ru') }}</label>
                                        <input type="text" name="title_ru" placeholder="СП Динсер и Джарчиоглу было создано в 1997 году и на сегодняшний день является одной из крупнейших групп компаний, представленных в различных сферах бизнеса в Азербайджане." id="title_ru" class="form-control w-100 @error('title_ru') is-invalid  @enderror" value="{{ $title_ru }}">
                                        <small class="text-danger" id="title_ru-error"></small>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-label" for="about_us_az">{{ __('static.about_us_az') }}</label>
                                        <textarea name="about_us_az" id="about_us_az" class="form-control w-100 @error('about_us_az') is-invalid  @enderror" rows="10" placeholder="{{ __('static.about_us_az') }} ...">{{ old('about_us_az',$about_us_az) }}</textarea>
                                        <small class="text-danger" id="about_us_az-error"></small>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-label" for="about_us_en">{{ __('static.about_us_en') }}</label>
                                        <textarea name="about_us_en" id="about_us_en" class="form-control w-100 @error('about_us_en') is-invalid  @enderror" rows="10" placeholder="{{ __('static.about_us_en') }} ...">{{ old('about_us_en',$about_us_en) }}</textarea>
                                        <small class="text-danger" id="about_us_en-error"></small>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-label" for="about_us_ru">{{ __('static.about_us_ru') }}</label>
                                        <textarea name="about_us_ru" id="about_us_ru" class="form-control w-100 @error('about_us_ru') is-invalid  @enderror" rows="10" placeholder="{{ __('static.about_us_ru') }} ...">{{ old('about_us_ru',$about_us_ru) }}</textarea>
                                        <small class="text-danger" id="about_us_ru-error"></small>
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-primary float-end" type="button" id="add">{{ __('static.elave_et') }}</button>
                                    </div>
                                </div>

                                <div style="border: 1px dotted grey;margin-top: 20px">
                                    <span style="position: absolute;float: right;top: 2073px;right: 10px;width: 30px;cursor: pointer"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg></span>
                                    <div class="form-group mb-3">
                                        ABUNƏ OL -un solundakı şəkil
                                        <span class="avatar avatar-xl mb-3 image-change3 cursor-pointer" id="image-change3" style="display: block !important;width: 100% !important;height: 300px;background-image: url({{ asset('files/about/'.$upload_left_side_image_subscribe) }});"><img id="change-image" src="{{ asset('back/images/add-image.png') }}" alt="Şəkili dəyiş" style="position: absolute;float: right;bottom: 0;right: 0;width: 30px;cursor: pointer"></span>
                                        <input type="file" name="upload_left_side_image_subscribe" id="upload_left_side_image_subscribe" style="display: none">
                                        <div class="progress" style="display: none" id="imageProgress3">
                                            <div class="progress-bar progress-bar-indeterminate bg-green"></div>
                                        </div>
                                        <small class="text-danger" id="image-error"></small>
                                    </div>
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
    <script src="{{ asset('back/js/home-banner.js') }}"></script>
    <script src="{{ asset('back/js/home-left-side-image.js') }}"></script>
    <script src="{{ asset('back/js/home-left-side-image-subscribe.js') }}"></script>

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        $(document).ready(function () {
            CKEDITOR.replace(about_us_az,{
                language: '{{ app()->getLocale() }}',
                filebrowserImageBrowseUrl: $('#rootUrl').val()+'/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: $('#rootUrl').val()+'/laravel-filemanager/upload?type=Images&_token={!! csrf_token() !!}',
                filebrowserBrowseUrl: $('#rootUrl').val()+'/laravel-filemanager?type=Files',
                filebrowserUploadUrl: $('#rootUrl').val()+'/laravel-filemanager/upload?type=Files&_token={!! csrf_token() !!}',
                toolbarGroups :[
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
                    { name: 'insert' },
                    { name: 'forms' },
                    { name: 'styles' },
                    { name: 'colors' },
                    { name: 'tools'}
                ],
            });

            CKEDITOR.replace(about_us_en,{
                language: '{{ app()->getLocale() }}',
                filebrowserImageBrowseUrl: $('#rootUrl').val()+'/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: $('#rootUrl').val()+'/laravel-filemanager/upload?type=Images&_token={!! csrf_token() !!}',
                filebrowserBrowseUrl: $('#rootUrl').val()+'/laravel-filemanager?type=Files',
                filebrowserUploadUrl: $('#rootUrl').val()+'/laravel-filemanager/upload?type=Files&_token={!! csrf_token() !!}',
                toolbarGroups :[
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
                    { name: 'insert' },
                    { name: 'forms' },
                    { name: 'styles' },
                    { name: 'colors' },
                    { name: 'tools'}
                ],
            });

            CKEDITOR.replace(about_us_ru,{
                language: '{{ app()->getLocale() }}',
                filebrowserImageBrowseUrl: $('#rootUrl').val()+'/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: $('#rootUrl').val()+'/laravel-filemanager/upload?type=Images&_token={!! csrf_token() !!}',
                filebrowserBrowseUrl: $('#rootUrl').val()+'/laravel-filemanager?type=Files',
                filebrowserUploadUrl: $('#rootUrl').val()+'/laravel-filemanager/upload?type=Files&_token={!! csrf_token() !!}',
                toolbarGroups :[
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
                    { name: 'insert' },
                    { name: 'forms' },
                    { name: 'styles' },
                    { name: 'colors' },
                    { name: 'tools'}
                ],
            });
        });
    </script>
@endsection
