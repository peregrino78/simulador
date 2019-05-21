@extends('adminlte::master')

@section('adminlte_css')

	<link rel="stylesheet" href="{{ asset('dashboard/plugins/morris/morris.css') }}">
	<link href="{{ asset('dashboard/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap2.min.css">

	<style>
		.skin-blue .main-header .logo
		{
			background-color: #fff;
		}
	</style>

	@stack('css')
	@yield('css')
@stop


@section('body')
	<div id="wrapper">
		<!-- LOGO -->
		<div class="topbar">
			<div class="topbar-left">
				<a href="{{route('admin.dashboard')}}" class="logo">
					@if ( \App\Helpers\Helper::configData('logo-aplicacao')->active )
						<span><img src="{{ route('image',['link'=>\App\Helpers\Helper::config('logo-aplicacao')]) }}" alt=""></span>
					@else
						<span><img src="{{ asset('/dashboard/images/pac_contact_logo.png') }}" alt=""></span>
					@endif
					<i>
						<img src="{{ route('image',['link'=>\App\Helpers\Helper::config('favicon-aplicacao')]) }}" alt="">
					</i>
				</a>
			</div>
			<!-- Menu Suspenso Usuário -->
			<nav class="navbar-custom">
				<ul class="list-unstyled topbar-right-menu float-right mb-0">
					@php $user = \Auth::user(); @endphp
					<li class="dropdown notification-list">
						<a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
							aria-haspopup="false" aria-expanded="false">
							<img src="{{ route('avatar') }}" alt="" class="rounded-circle"> <span class="ml-1">{{ $user->name }} <i class="mdi mdi-chevron-down"></i> </span>
						</a>
						<div class="dropdown-menu dropdown-menu-right profile-dropdown ">
							<a href="{{ route('users.edit', \Auth::user()->id) }}" class="dropdown-item notify-item">
								<i class="ti-user"></i> <span>Perfil</span>
							</a>
							@permission('view.aplicacao')
							<a href="{{ route('configs.index') }}" class="dropdown-item notify-item">
								<i class="ti-settings"></i> <span>Configurações</span>
							</a>
							@endpermission
							<a href="{{ route('lockscreen') }}" class="dropdown-item notify-item">
								<i class="ti-lock"></i> <span>Bloquear Tela</span>
							</a>
							<a href="javascript:void(0);" class="dropdown-item notify-item btnLogout">
								<i class="ti-power-off"></i> <span>{{ trans('adminlte::adminlte.log_out') }}</span>
							</a>
							<form id="logout-form" action="{{ url(config('adminlte.logout_url', 'auth/logout')) }}" method="POST" style="display: none;">
								@if(config('adminlte.logout_method'))
								{{ method_field(config('adminlte.logout_method')) }}
								@endif
								{{ csrf_field() }}
							</form>
						</div>
					</li>
				</ul>
				<ul class="list-inline menu-left mb-0">
					<li class="float-left">
						<button class="button-menu-mobile open-left waves-light waves-effect">
							<i class="mdi mdi-menu"></i>
						</button>
					</li>
				</ul>
			</nav>
		</div>

		<!-- MENU -->
		<div class="left side-menu">
			<!-- Imagem - Nome Usuário -->
			<div class="user-details">
				<div class="pull-left">
					<img src="{{ route('avatar') }}" alt="" class="thumb-md rounded-circle">
				</div>
				<div class="user-info">
					@php
						$role = "";
						$user = \Auth::user();
				
						if($user->roles->isNotEmpty())
						{
							$role = $user->roles->first()->name;
						}
					@endphp
					<a href="{{ route('users.edit', \Auth::user()->id) }}">{{ $user->name }}</a>
					<p class="text-muted m-0">{{ $role }}</p>
				</div>
			</div>

			<!--- MENU -->
			<div id="sidebar-menu">
				<ul class="metismenu" id="side-menu">
					<li class="menu-title">Navegação</li>

					<!-- MENU DASHBOARD -->
					<li>
						<a href="{{ route('admin.dashboard') }}">
							<i class="mdi mdi-view-dashboard"></i><span> Painel Principal </span>
						</a>
					</li>

					<!-- MENU SIMULAÇÃO -->
					@permission('view.simulations')
					<li>
						<a href="javascript: void(0);"><i class="mdi mdi-cached"></i><span> Simulações </span> <span class="menu-arrow"></span></a>
						<ul class="nav-second-level" aria-expanded="false">

							@permission('view.simulations')
							<li>
								<a href="{{ route('client_create', 1) }}">
									<i class="mdi mdi-arrow-right-thick"></i><span> Contrato Novo </span>
								</a>
							</li>
							@endpermission

							@permission('view.simulations')
							<li>
								<a href="{{ route('client_create', 2) }}">
									<i class="mdi mdi-arrow-right-thick"></i><span> Portabilidade </span>
								</a>
							</li>
							@endpermission
							@permission('view.simulations')
							<li>
								<a href="{{ route('client_create', 4) }}">
									<i class="mdi mdi-arrow-right-thick"></i><span> Refin Portabilidade</span>
								</a>
							</li>
							@endpermission
						</ul>
					</li>
					@endpermission

					<!-- MENU HISTÓRICO SIMULAÇÕES -->
					<li>
						<a href="#">
							<i class="mdi mdi-content-paste"></i><span> Histórico de Simulações </span>
						</a>
					</li>

					<!-- MENU COEFICIENTES -->
					@permission('view.coefficients')
					<li>
						<a href="{{ route('coeficientes.index') }}">
							<i class="mdi mdi-trending-up"></i><span> Coeficientes </span>
						</a>
					</li>
					@endpermission

					<!-- MENU CONVÊNIO -->
					@permission('view.agreements')
					<li>
						<a href="{{ route('convenio.index') }}">
							<i class="mdi mdi-file-document-box-multiple-outline"></i><span> Convênios </span>
						</a>
					</li>
					@endpermission
					
					<!-- MENU CLIENTES -->
					@permission('view.clients')
					<li>
						<a href="{{ route('clientes.index') }}">
							<i class="mdi mdi-account-multiple"></i><span> Clientes </span>
						</a>
					</li>
					@endpermission

					<!-- MENU ESTATÍSTICAS -->
					@permission('view.statistics')
					<li>
						<a href="#">
							<i class="mdi mdi-chart-bar"></i><span> Estatísticas </span>
						</a>
					</li>
					@endpermission

					<!-- MENU CONFIGURAÇÕES -->
					@permission('view.configuracoes')
					<li>
						<a href="javascript: void(0);"><i class="mdi mdi-dns"></i><span> Configurações </span> <span class="menu-arrow"></span></a>
						<ul class="nav-second-level" aria-expanded="false">

							@permission('view.aplicacao')
							<li>
								<a href="{{ route('configs.index') }}">
									<i class="mdi mdi-settings"></i><span>Aplicacao</span>
								</a>
							</li>
							@endpermission

							@permission('view.usuarios')
							<li>
								<a href="{{ route('users.index') }}">
									<i class="mdi mdi-account-multiple"></i><span>Usuários</span>
								</a>
							</li>
							@endpermission

							@if(\Auth::user()->isMaster())
							<li>
								<a href="{{ route('roles.index') }}">
									<i class="mdi mdi-account-key"></i><span>Níveis de Acesso</span>
								</a>
							</li>
							@endif

							@permission('view.permissoes')
							<li>
								<a href="{{ route('permissoes.index') }}">
									<i class="mdi mdi-key"></i><span>Permissões</span>
								</a>
							</li>
							@endpermission
						</ul>
					</li>
					@endpermission
				</ul>
			</div>

			<div class="clearfix"></div>
		</div>

		<!-- FOOTER -->
		<div class="content-page">
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12">
							<h4 class="header-title m-t-0 m-b-20">@yield('title', 'Titulo') </h4>
						</div>
					</div>

					@include('flash::message')

					@yield('content')
				</div>
				<div class="footer">
					<div class="pull-right hide-phone">
						{{ \Auth::user()->name }} <strong class="text-custom"></strong>
					</div>
					<div>
						<strong>{{ config('app.name') }}</strong> - Copyright © {{ now()->format('Y') }}
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('adminlte_js')
	<script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
	<script src="{{ asset('dashboard/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}" type="text/javascript"></script>
	<!-- progress bar js (not required, but cool) -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js"></script>
	<!-- moment js (required by datepicker library) -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
	<!-- popper js (required by bootstrap) -->
	<script src="https://unpkg.com/popper.js/dist/umd/popper.min.js"></script>
	<!-- pjax js (required) -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.pjax/2.0.1/jquery.pjax.min.js"></script>
	<!-- datepicker js (required for datepickers) -->
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
	<!-- required to supply js functionality for the grid -->
	<script src="{{ asset('vendor/leantony/grid/js/grid.js') }}"></script>

	<script>
		// send csrf token (see https://laravel.com/docs/5.6/csrf#csrf-x-csrf-token) - this is required
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		// for the progress bar (required for progress bar functionality)
		$(document).on('pjax:start', function () {
			NProgress.start();
		});
		$(document).on('pjax:end', function () {
			NProgress.done();
		});
		</script>

		<script src="{{ asset('dashboard/plugins/summernote/summernote-bs4.min.js') }}"></script>

		<script type="text/javascript">
			$(document).ready(function() {
				$('.summernote').summernote({
					height: 250,
					width:'100%',
					minHeight: null,
					maxHeight: null,
					focus: false
				});
			});
		</script>

		<script type="text/javascript">
			$(document).ready(function() {
				$('.summernoteDisable').summernote('disable', {
					shortcuts: false
				});
			});
		</script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/js/standalone/selectize.js"></script>

	<script>
		$('.money').mask('000.000.000.000.000,00', {reverse: true, placeholder: "0,00"});
		$('.date').mask('00/00/0000');
		$('.cep').mask('00000-000');
		$('.cpf').mask('000.000.000-00');

		$('.telefone').mask('(00) 0000-0000');
		$('.celular').mask('(00) 00000-0000');

		$('.select2').select2().on('select2:open', function() {
			$(".select2-results:not(:has(a))").append('<a href="#" style="padding: 6px;height: 20px;display: inline-table;">Create new item</a>')
		});

		$("input.inteiro").keypress(function(event) {
			return /\d/.test(String.fromCharCode(event.keyCode));
		});

		$(".formSubmitAjax").submit(function(e) {

			var self = $(this);
			var url = self.attr('action');
			var modal = self.data('parent-modal');
			var element = self.data('target-element');

			e.preventDefault();

			$.ajax(
			{
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				type: 'POST',
				url: url,
				data: self.serialize(),
				dataType: 'json',
				success: function(data) {

					$(modal).modal('hide');
					var id = data.data.id;
					var nome = data.data.first_name;
					var sobrenome = data.data.last_name;
					self.find(element).append('<option selected value="'+id+'">'+nome+' '+sobrenome+'</option>');

					$(element).append('<option selected value="'+id+'">'+nome+' '+sobrenome+'</option>');

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

				}
			});

		});

		$(".formGridSubmitAjax").submit(function(e) {

			var self = $(this);
			var url = self.attr('action');
			var modal = self.data('parent-modal');
			var element = self.data('target-element');
			var refresh = self.data('refresh');

			e.preventDefault();

			$.ajax(
			{
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				type: 'POST',
				url: url,
				data: self.serialize(),
				dataType: 'json',
				error: function (data){
					var error = data.responseJSON;
					const toast = swal.mixin({
						toast: true,
						position: 'top-end',
						showConfirmButton: false,
						timer: 3000
					});
					toast({
						type: 'error',
						title: error.message
					});
				},
				success: function(data) {

					$(modal).modal('hide');

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
					
					if(refresh == true){
						refreshTable();
					}
				}
			});

		});

		$("body").on('click', '.formGridSubmitAjaxBtn', function(e) {

			var self = $(this).parent().parent('form');
			var url = self.attr('action');
			var modal = self.data('parent-modal');
			var element = self.data('target-element');
			var refresh = self.data('refresh');

			e.preventDefault();

			$.ajax(
			{
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				type: 'POST',
				url: url,
				data: self.serialize(),
				dataType: 'json',
				error: function (data){
					var error = data.responseJSON;
					const toast = swal.mixin({
						toast: true,
						position: 'top-end',
						showConfirmButton: false,
						timer: 3000
					});
					toast({
						type: 'error',
						title: error.message
					});
				},
				success: function(data) {

					$(modal).modal('hide');

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
					
					if(refresh == true){
						refreshTable();
					}
				}
			});
		});

		$('.btnLogout').click(function() {

			swal({
				title: 'Finalizar Sessão?',
				text: "Esta sessão será finalizada!",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Sim',
				cancelButtonText: 'Cancelar'
			}).then((result) => {
				if (result.value) {

					document.getElementById('logout-form').submit();

					swal({
						title: 'Até logo!',
						text: 'Sua sessão será finalizada.',
						type: 'success',
						showConfirmButton: false,
					})
				}
			});

		});
	</script>

	@stack('js')
	@yield('js')
@stop