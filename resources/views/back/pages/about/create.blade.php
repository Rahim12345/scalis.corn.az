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
                            <form action="{{ route('about.store') }}" id="about-form" method="POST" enctype="multipart/form-data" onsubmit="return false">
                                @csrf
                                <div class="form-group mb-3">
                                    1780x665
                                    <span class="avatar avatar-xl mb-3 image-change cursor-pointer" id="image-change" style="display: block !important;width: 100% !important;height: 300px;background-image: url({{$image}});"><img id="change-image" src="{{ asset('back/images/add-image.png') }}" alt="Şəkili dəyiş" style="position: absolute;float: right;bottom: 0;right: 0;width: 30px;cursor: pointer"></span>
                                    <input type="file" name="image" id="image" style="display: none">
                                    <div class="progress" style="display: none" id="imageProgress">
                                        <div class="progress-bar progress-bar-indeterminate bg-green"></div>
                                    </div>
                                    <small class="text-danger" id="image-error"></small>
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
    <script src="{{ asset('back/js/about-banner.js') }}"></script>

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
