@extends('back.layout.master')

@section('title')  @endsection
@section('css')

@endsection

@section('content')
    <div class="page">
        @include('back.includes.menu')

        <div class="content">
            <div class="mb-3 col-md-8 offset-md-2">
                <table class="table">
                    <thead>
                    <tr>
                        <th>{{ __('static.cv') }}</th>
                        <th>{{ __('static.xasiyyetname') }}</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cvs as $cv)
                        <tr>
                            <td><embed class="embed-responsive embed-responsive-1by1" name="plugin" src="{{ asset('back/cvs/'.$cv->cv) }}" type="application/pdf">
                                <a href="{{ asset('back/cvs/'.$cv->cv) }}" class="btn btn-primary" download="{{ $cv->cv }}"><i class="fa fa-download"></i></a>
                            </td>
                            <td>
                                @if(!$cv->characteristics)
{{--                                    'Xasiyyətnamə '--}}
                                @else
                                    <embed class="embed-responsive embed-responsive-1by1" name="plugin" src="{{ asset('back/cvs/'.$cv->characteristics) }}" type="application/pdf">
                                    <a href="{{ asset('back/cvs/'.$cv->characteristics) }}" class="btn btn-primary" download="{{ $cv->characteristics }}"><i class="fa fa-download"></i></a>
                                @endif

                            </td>
                            <td>
                                <div class="btn-list flex-nowrap">
                                    <div class="dropdown">
                                        <form action="{{ route('career.destroy',$cv->id) }}" method="POST">
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
                        <td colspan="3" align="center">
                            @if($cvs->count() == 0)
                                Data tapılmadı
                            @else
                                {{ $cvs->links('vendor.pagination.bootstrap-4') }}
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
