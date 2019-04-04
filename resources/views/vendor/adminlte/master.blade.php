<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel='shortcut icon' type='image/x-icon' href="{{ route('image',['link'=>\App\Helpers\Helper::config('favicon-aplicacao')]) }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
    @yield('title_prefix', config('adminlte.title_prefix', 'Concriart'))
    @yield('title', config('adminlte.title', 'Concriart'))
    @yield('title_postfix', config('adminlte.title_postfix', 'Concriart'))
    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link href="{{ asset('dashboard/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard/css/metismenu.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard/css/style.css') }}" rel="stylesheet" type="text/css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" type="text/css" />

    @if(config('adminlte.plugins.select2'))
        <!-- Select2 -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css">
    @endif

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.css" />
    <!-- date picker (required if you need date picker & date range filters) -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
    <!-- grid's css (required) -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/leantony/grid/css/grid.css') }}" />

    @yield('adminlte_css')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition @yield('body_class')">

@yield('body')

<script src="{{ asset('dashboard/js/jquery.min.js') }}"></script>
<script src="{{ asset('dashboard/js/popper.min.js') }}"></script>
<script src="{{ asset('dashboard/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('dashboard/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('dashboard/js/waves.js') }}"></script>
<script src="{{ asset('dashboard/js/jquery.slimscroll.js') }}"></script>

<script src="{{ asset('dashboard/js/jquery.core.js') }}"></script>
<script src="{{ asset('dashboard/js/jquery.app.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.2/dist/sweetalert2.all.min.js"></script>

@if(config('adminlte.plugins.select2'))
    <!-- Select2 -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
@endif

@if(config('adminlte.plugins.chartjs'))
    <!-- ChartJS -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
@endif

<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js"></script>

<script>

$(".alert").delay(4000).slideUp(200, function() {
    $(this).alert('close');
});

</script>

<script>

  $("body").on('click', '.btnRemoveItem', function(e) {
      var self = $(this);
      var element = self.data('target-element');

      swal({
        title: 'Remover este item?',
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
              _method: 'DELETE'
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
              if($(element).length){
                $(element).hide();
                self.hide();
              } else {
                self.parents('.card-box-images').hide();
                self.parents('tr').hide();
              }
            }


          });


        }
      });

  });

</script>

@yield('adminlte_js')

</body>
</html>
