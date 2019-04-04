@extends('dashboard.templates.index')

@section('title', 'Permissões')

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
                    </tr>
                    </thead>

                    <tbody>
                      @foreach($permissoes as $permissao)
                        <tr>
                            <td>
                                {{ $permissao->name }}
                            </td>

                            <td>
                                {{ $permissao->slug }}
                            </td>

                            <td>
                                {{ $permissao->description }}
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
