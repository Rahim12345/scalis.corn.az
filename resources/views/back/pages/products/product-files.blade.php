@extends('back.layout.master')

@section('title') {{ __('menus.products') }} @endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .dropdown-toggle::after, a.dropdown-item.dropdown-toggle::after{
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="page">
        @include('back.includes.menu')

        <div class="container-xl mt-3" style="min-height: 70vh">
            <div class="row row-cards">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="content p-3">
                            <form action="{{ route('back.product.files.post') }}" id="contact-form" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                <input type="hidden" name="action" value="{{ $action }}">
                                @if($action == 'sertifikat')
                                <div class="form-group mb-3">
                                    <label class="form-label" for="name">Sertifikat Adı(ad***name***имя)</label>
                                    <input type="text" name="name" id="name" class="form-control">
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="name">İl</label>
                                    <select name="year" id="year" class="form-control">
                                        @for($i=2014;$i<=date('Y');$i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    @error('year')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label" for="sertifikat">Şəkil</label>
                                    <input type="file" name="sertifikat" id="sertifikat">
                                    @error('sertifikat')
                                    <div class="text-danger" id="name-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                @else
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="name">Faylin Adı(ad***name***имя)</label>
                                        <input type="text" name="name" id="name" class="form-control">
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-label" for="file">Şəkil</label>
                                        <input type="file" name="file" id="file">
                                        @error('file')
                                        <div class="text-danger" id="name-error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                @endif

                                <button class="btn btn-primary float-end" type="submit">Əlavə et</button>
                            </form>
                            <hr>
                            <div>
                                <table class="table">
                                    @if($action == 'sertifikat')
                                        @foreach($product->getSertifikatlar as $sertifikat)
                                            <tr>
                                                <td><img src="{{ asset('files/products/sertifikatlar/'.$sertifikat->src) }}" alt=""></td>
                                                <td><span>Ad : {{ $sertifikat->name }}</span></td>
                                                <td><span>İl :{{ $sertifikat->year }}</span></td>
                                                <td><a href="{{ route('back.product.files.delete',['action'=>$action,'id'=>$sertifikat->id]) }}" class="btn btn-danger">X</a></td>
                                            </tr>
                                        @endforeach
                                    @else
                                        @foreach($product->getFiles as $file)
                                            <tr>
                                                <td><a href="{{ asset('files/products/files/'.$file->src) }}">{{ $file->name }}</a></td>
                                                <td><a href="{{ route('back.product.files.delete',['action'=>$action,$file->id]) }}" class="btn btn-danger">X</a></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('back.includes.footer')
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#sub_menu_2').select2();
        });
    </script>
    <script src="{{ asset('back/js/product-details.js') }}"></script>

    <script type="text/javascript"  src="{{ asset('scalis') }}/js/plugins/owl.carousel.js"></script>

    <script type="text/javascript"  src="{{ asset('scalis') }}/js/script.js"></script>
@endsection
