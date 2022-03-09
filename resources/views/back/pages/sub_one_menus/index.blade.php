@extends('back.layout.master')

@section('title')  @endsection
@section('css')

@endsection

@section('content')
    <div class="page">
        @include('back.includes.menu')

        <div class="content">
            <div class="mb-3 col-md-8 offset-md-2">
                <a href="{{ route('sub-one-menu.create') }}" class="btn btn-primary w-100">Əlavə et</a>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Əsas Menu</th>
                        <th>Ad(AZ)</th>
                        <th>Ad(EN)</th>
                        <th>Ad(RU)</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sub_one_menus as $sub_one_menu)
                        <tr>
                            <td>{{ $sub_one_menu->mainMenus->name_az }}</td>
                            <td>{{ $sub_one_menu->name_az }}</td>
                            <td>{{ $sub_one_menu->name_en }}</td>
                            <td>{{ $sub_one_menu->name_ru }}</td>
                            <td>
                                <div class="btn-list flex-nowrap">
                                    <a href="{{ route('sub-one-menu.edit',$sub_one_menu->sub_one_menu_id) }}" class="btn btn-primary"><i class="fa fa-pen"></i></a>
                                    <div class="dropdown">
                                        <form action="{{ route('sub-one-menu.destroy',$sub_one_menu->sub_one_menu_id) }}" method="POST">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="5" align="center">
                            @if($sub_one_menus->count() == 0)
                                Data tapılmadı
                            @else
                                {{ $sub_one_menus->links('vendor.pagination.bootstrap-4') }}
                            @endif
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        @include('back.includes.footer')
    </div>
@endsection

@section('js')

@endsection
