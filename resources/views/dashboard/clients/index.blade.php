@extends('dashboard.templates.index')

@section('title', 'Clientes')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h6 class="m-t-0">Lista</h6>
                <div class="table-responsive">
                    <table class="table table-hover mails m-0 table table-actions-bar">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Data Nascimento</th>
                            <th>Estado</th>
                            <th>Cidade</th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach($clients as $client)
                                <tr>
                                    <td> {{ $client->name }} </td>
                                    <td> {{ $client->cpf }} </td>
                                    <td> {{ $client->birthday->format('d/m/Y') }} </td>
                                    <td> {{ $client->state->initials }} </td>
                                    <td> {{ $client->city->name }} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $clients->links() }}
                </div>
            </div>
        </div>
    </div>

@stop