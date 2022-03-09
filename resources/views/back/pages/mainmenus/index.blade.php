@extends('back.layout.master')

@section('title')  @endsection
@section('css')

@endsection

@section('content')
    <div class="page">
        @include('back.includes.menu')

        <div class="content">
            <div class="mb-3 col-md-8 offset-md-2">
                <a href="{{ route('esas-menu.create') }}" class="btn btn-primary w-100">Əlavə et</a>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Ad(AZ)</th>
                        <th>Ad(EN)</th>
                        <th>Ad(RU)</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($mainmenus as $mainmenu)
                        <tr>
                            <td>{{ $mainmenu->name_az }}</td>
                            <td>{{ $mainmenu->name_en }}</td>
                            <td>{{ $mainmenu->name_ru }}</td>
                            <td>
                                <div class="btn-list flex-nowrap">
                                    <a href="{{ route('esas-menu.edit',$mainmenu->main_menu_id) }}" class="btn btn-primary"><i class="fa fa-pen"></i></a>
                                    <div class="dropdown">
                                        <form action="{{ route('esas-menu.destroy',$mainmenu->main_menu_id) }}" method="POST">
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
                        <td colspan="4" align="center">
                            @if($mainmenus->count() == 0)
                                Data tapılmadı
                            @else
                                {{ $mainmenus->links('vendor.pagination.bootstrap-4') }}
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
