@extends('back.layout.master')

@section('title')  @endsection
@section('css')

@endsection

@section('content')
    <div class="page">
        @include('back.includes.menu')

        <div class="content">
            <div class="mb-3 col-md-8 offset-md-2">
                <a href="{{ route('sub-two-menu.index') }}" class="btn btn-primary w-100">Sub Menu 2</a>
                <form action="{{ route('sub-two-menu.update',['sub_two_menu'=>$sub_two_menu->sub_two_menu_id]) }}" id="from" method="POST">
                    @csrf
                    {!! method_field('PUT') !!}
                    <input type="hidden" value="{{  $sub_two_menu->sub_two_menu_id }}" name="sub_two_menu_id">
                    <div class="form-group mb-3">
                        <label class="form-label" for="sub_one_menu_id">Sub Menu 1</label>
                        <select class="form-control @error('sub_one_menu_id') is-invalid  @enderror" id="sub_one_menu_id" name="sub_one_menu_id">
                            @foreach($sub_one_menus as $sub_one_menu)
                                <option value="{{ $sub_one_menu->sub_one_menu_id }}" {{ old('sub_one_menu_id',$sub_two_menu->sub_one_menu_id)  == $sub_one_menu->sub_one_menu_id ? 'selected' : '' }}>{{ $sub_one_menu->name_az }}</option>
                            @endforeach
                        </select>
                        @error('sub_one_menu_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="name_az">Ad(AZ)</label>
                        <input type="text" class="form-control @error('name_az') is-invalid  @enderror" id="name_az" name="name_az" value="{{ old('name_az',$sub_two_menu->name_az) }}">
                        @error('name_az')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="name_en">Ad(EN)</label>
                        <input type="text" class="form-control @error('name_en') is-invalid  @enderror" id="name_en" name="name_en" value="{{ old('name_en',$sub_two_menu->name_en) }}">
                        @error('name_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="name_ru">Ad(RU)</label>
                        <input type="text" class="form-control @error('name_ru') is-invalid  @enderror" id="name_ru" name="name_ru" value="{{ old('name_ru',$sub_two_menu->name_ru) }}">
                        @error('name_ru')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary float-end" type="submit">Əlavə et</button>
                    </div>
                </form>
            </div>
        </div>
        @include('back.includes.footer')
    </div>
@endsection

@section('js')

@endsection
