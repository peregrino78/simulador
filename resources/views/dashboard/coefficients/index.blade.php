@extends('dashboard.templates.index')

@section('title', 'Coeficientes')

@section('content')

@permission('create.coefficients')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <a href="{{ route('coeficientes.create') }}" class="btn btn-success">Novo</a>

            <button class="btn btn-danger delete_all" data-url="{{ url('coeficientes/delete') }}">Deletar Selecionados</button>

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
                        <th width="50px"><input type="checkbox" id="master"></th>
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
                        @if($coefficients->count())
                            @foreach($coefficients as $coefficient)
                                <tr id="tr_{{$coefficient->id}}">
                                    <td><input type="checkbox" class="sub_chk" data-id="{{$coefficient->id}}" name="delete_multiple"></td>
                                    <td> {{ $coefficient->agreement->name }} </td>
                                    <td> {{ $coefficient->Operation->name }} </td>
                                    <td> {{ $coefficient->term }} </td>
                                    <td> {{ $coefficient->rate }}% </td>
                                    <td> {{ $coefficient->factor }} </td>
                                    <td> {{ $coefficient->date->format('d/m/Y') }} </td>
                                    <td>
                                        @permission('edit.agreements')
                                            <a href="{{ route('coeficientes.edit', $coefficient->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        @endpermission
                                        @permission('delete.agreements')
                                            <a class="btn btn-danger btn-sm btnRemoveItem" data-route="{{ route('coeficientes.destroy', $coefficient->id) }}"><i class="fa fa-trash"></i></a>
                                        @endpermission
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                {{ $coefficients->links() }}
            </div>
        </div>
    </div>
</div>

@stop

@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#master').on('click', function(e) {
                if($(this).is(':checked', true))  
                {
                    $('input[name="delete_multiple]').prop('checked', true);  
                } else {  
                    $('input[name="delete_multiple]').prop('checked', false);  
                }  
            });
        
            $("body").on('click', '.btnRemoveAll', function(e) {
            var self = $(this);
            var checkboxes = $('input[name="delete_multiple]:checked');
            
            if(checkboxes.length <= 0)
            {
                alert("Please select row.");  
            }
            else{
                var checkboxes_value = [];
                $(checkboxes).each(function(){
                    checkboxes_value.push($(this).val());
                });
            }
    
            swal({
                title: 'Remover os itens selecionados?',
                text: "Não será possível recuperá-lo!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.value) {
    
                    e.preventDefault();
    
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            _method: 'DELETE',
                            ids: checkboxes_value
                        },
                        url: self.data('route'),
                        type: 'POST',
                        dataType: 'json',
    
                    }).done(function(data) {
    
                        const toast = swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });
    
                        toast({
                            type: data.type,
                            title: data.message
                        });
    
                        if(data.code == 200) {
                            checkboxes.parents("tr").remove();
                        }
                    });
                }
            });
    
        });
    
    });
    
    </script>
@stop