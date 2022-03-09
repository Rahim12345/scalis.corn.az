@extends('back.layout.master')

@section('title') {{ __('static.profile') }}  @endsection

@section('meta')

@endsection

@section('css')

@endsection

@section('content')
    <div class="page">
        @include('back.includes.menu')
        <input type="hidden" value="{{ route('front.avatar.upload') }}" id="profile_avatar_upload">
        <div class="container-xl mt-3">
            <div class="row row-cards">
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-body p-4 text-center">
                            <form action="" id="profile-form" method="POST" enctype="multipart/form-data">
                            <span class="avatar avatar-xl mb-3 avatar-rounded" id="profile-image" style="background-image: url({{ asset('avatars/'.auth()->user()->avatar) }})"><img id="change-avatar" src="{{ asset('back/images/add-image.png') }}" alt="Şəkili dəyiş" style="position: absolute;float: right;bottom: 0;right: 0;width: 30px;cursor: pointer"></span>
                            <input type="file" name="avatar" id="profile-avatar" style="display: none">
                            <div class="progress" style="display: none" id="avatarProgress">
                                <div class="progress-bar progress-bar-indeterminate bg-green"></div>
                            </div>
                            <h3 class="m-0 mb-1"><a href="#" id="sidebar-name">{{ auth()->user()->name }}</a></h3>
                            <div class="text-muted">{{ auth()->user()->email }}</div>
                            <div class="mt-3">
                                <span class="badge bg-purple-lt">Admin</span>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-9">
                    <div class="card">
                        <div class="card-body p-4 text-center">
                            <form action="{{ route('front.profile.update') }}" id="profil-update-form" method="POST" onsubmit="return false">
                            @csrf
                            <label class="form-label">Hesab ayarları</label>
                            <fieldset class="form-fieldset">
                                <div class="mb-3">
                                    <input type="text" name="name" id="name" value="{{ old('name',auth()->user()->name) }}" class="form-control" autocomplete="off"/>
                                    <small class="text-danger float-start mb-1" id="name-error"></small>
                                </div>
                                <div class="mb-3">
                                    <input type="password" placeholder="Köhnə şifrəniz" name="password" id="password" class="form-control" autocomplete="off"/>
                                    <small class="text-danger float-start mb-1" id="password-error"></small>
                                </div>
                                <div class="mb-3">
                                    <input type="password" placeholder="Yeni şifrəniz" name="ypassword" id="ypassword" class="form-control" autocomplete="off"/>
                                    <small class="text-danger float-start mb-1" id="ypassword-error"></small>
                                </div>
                                <div class="mb-3 float-end">
                                    <button type="button" id="updateProfileBtn" class="btn btn-primary">Yadda saxla</button>
                                </div>
                            </fieldset>
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
    <script src="{{ asset('front/js/avatar.js') }}"></script>
    <script src="{{ asset('front/js/profile-update.js') }}"></script>
@endsection
