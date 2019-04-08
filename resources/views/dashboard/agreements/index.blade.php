@extends('dashboard.templates.index')

@section('title', 'Convênios')

@section('content')

@permission('create.agreements')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <a href="{{ route('convenio.create') }}" class="btn btn-success">Novo</a>
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
                        <th>Nome</th>
                        <th style="width:150px">Ações</th>
                    </tr>
                    </thead>

                    <tbody>
                      @foreach($agreements as $agreement)
                        <tr>
                            <td> {{ $agreement->name }} </td>
                            <td>
                                @permission('view.agreements')
                                    <a href="{{ route('convenio.show', $agreement->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                @endpermission
                                @permission('edit.agreements')
                                    <a href="{{ route('convenio.edit', $agreement->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                @endpermission
                                @permission('delete.agreements')
                                    <a class="btn btn-danger btn-sm btnRemoveItem" data-route="{{ route('convenio.destroy', $agreement->id) }}"><i class="fa fa-trash"></i></a>
                                @endpermission
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
                {{ $agreements->links() }}
            </div>
        </div>
    </div>
</div>

@stop