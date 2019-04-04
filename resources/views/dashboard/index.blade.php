@extends('adminlte::page')

@section('title', 'Painel Principal')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card-box widget-inline">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="widget-inline-box text-center">
                        <h3 class="m-t-10"><i class="text-primary mdi mdi-format-list-bulleted mdi-36px"></i> <b>0</b></h3>
                        <p class="text-muted">Nº Simulações</p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="widget-inline-box text-center">
                        <h3 class="m-t-10"><i class="text-success mdi mdi mdi-thumb-up mdi-36px"></i> <b>0</b></h3>
                        <p class="text-muted">Simulações Aprovadas</p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="widget-inline-box text-center">
                        <h3 class="m-t-10"><i class="text-danger mdi mdi-thumb-down mdi-36px"></i> <b>0</b></h3>
                        <p class="text-muted">Simulações Reprovadas</p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="widget-inline-box text-center b-0">
                        <h3 class="m-t-10"><i class="text-warning mdi mdi-account-group mdi-36px"></i> <b>3</b></h3>
                        <p class="text-muted">Clientes</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="card-box">
            <h6 class="m-t-0">Última Atualização das Taxas do Banco</h6>
            <div class="table-responsive">
                <p>19/02/2018 as 19:00</p>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')

<script src="{{ asset('dashboard/plugins/morris/morris.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/raphael/raphael-min.js') }}"></script>

<script>
$(document).ready(function() {
    setTimeout(function() {
        $('.loading').fadeOut('slow');
        $.Dashboard.init();
    }, 2000);
});

</script>

<script src="{{ asset('dashboard/pages/jquery.dashboard.js') }}"></script>
@stop