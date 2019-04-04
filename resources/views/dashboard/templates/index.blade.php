@extends('adminlte::page')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
          @yield('links')
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="table-responsive">
                @isset($table)
                    {{ $table }}
                @endisset

                @isset($grid)
                    {!! $grid !!}
                @endisset
            </div>
        </div>
    </div>
</div>

@endsection
