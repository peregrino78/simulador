@extends('dashboard.templates.index')

@section('title', 'Níveis de Acesso')

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
                        <th>Slug</th>
                        <th>Descrição</th>
                        <th>Nível</th>
                        <th>Opções</th>
                    </tr>
                    </thead>

                    <tbody>
                      @foreach($roles as $role)
                        <tr>
                            <td>
                                {{ $role->name }}
                            </td>

                            <td>
                                {{ $role->slug }}
                            </td>

                            <td>
                                {{ $role->description }}
                            </td>

                            <td>
                                {{ $role->level }}
                            </td>

                            <td>
                                <a href="{{ route('role_permissoes', $role->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-key"></i></a>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@stop
