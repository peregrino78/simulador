@extends('dashboard.templates.index')

@section('title', 'Usuários')

@section('content')

@permission('create.usuarios')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
          <a href="{{ route('users.create') }}" class="btn btn-success">Novo</a>
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
                        <th style="min-width: 95px;">
                        </th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Ativo</th>
                        <th>#</th>
                    </tr>
                    </thead>

                    <tbody>
                      @foreach($users as $user)

                        @php

                          $role = "";

                          if($user->roles->isNotEmpty()) {
                            $role = $user->roles->first()->name;
                          }

                        @endphp

                        <tr>
                            <td>
                                <img src="{{ route('avatar',['user'=>$user->id]) }}" alt="" title="contact-img" class="rounded-circle thumb-sm">
                            </td>

                            <td>
                                {{ $user->name }}
                            </td>

                            <td>
                                <a href="#" class="text-muted">{{ $user->email }}</a>
                            </td>

                            <td>
                                <b><a class="text-dark"><b>{{ $role }}</b></a> </b>
                            </td>

                            <td>
                              @if($user->active)
                                  <span class="badge badge-success">Ativo</span>
                              @else
                                  <span class="badge badge-danger">Inativo</span>
                              @endif
                            </td>

                            <td>
                              @permission('edit.usuarios')
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                              @endpermission
                            </td>

                        </tr>
                      @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
