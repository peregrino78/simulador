@extends('dashboard.templates.index')

@section('title', 'Coeficientes')

@section('content')

@permission('create.coefficients')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <a href="{{ route('coeficientes.create') }}" class="btn btn-success">Novo</a>
        </div>
    </div>
</div>
@endpermission

<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h6 class="m-t-0">Lista</h6>
            <div class="table-responsive">
                <table class="table table-hover mails m-0 table table-actions-bar">
                    <thead>
                    <tr>
                        <th>Operação</th>
                        <th>Convênio</th>
                        <th>Prazo</th>
                        <th>Taxa</th>
                        <th>Fator</th>
                        <th>Data</th>
                        <th style="width:150px">Ações</th>
                    </tr>
                    </thead>

                    <tbody>
                      @foreach($coefficients as $coefficient)
                        <tr>
                            <td> {{ $coefficient->agreement->name }} </td>
                            <td> {{ $coefficient->Operation->name }} </td>
                            <td> {{ $coefficient->term }} </td>
                            <td> {{ $coefficient->rate }} </td>
                            <td> {{ $coefficient->factor }} </td>
                            <td> {{ $coefficient->date->format('d/m/Y') }} </td>
                            <td>
                                @permission('view.agreements')
                                    <a href="{{ route('coeficientes.show', $coefficient->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                @endpermission
                                @permission('edit.agreements')
                                    <a href="{{ route('coeficientes.edit', $coefficient->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                @endpermission
                                @permission('delete.agreements')
                                    <a class="btn btn-danger btn-sm btnRemoveItem" data-route="{{ route('coeficientes.destroy', $coefficient->id) }}"><i class="fa fa-trash"></i></a>
                                @endpermission
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
                {{ $coefficients->links() }}
            </div>
        </div>
    </div>
</div>

@stop