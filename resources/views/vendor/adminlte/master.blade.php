<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title_prefix', config('adminlte.title_prefix', ''))
    @yield('title', config('adminlte.title', 'AdminLTE 2'))
    @yield('title_postfix', config('adminlte.title_postfix', ''))</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link href="{{ asset('assets/Bootstrap-3.3.7/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/Bootstrap-DatePicker/css/bootstrap-datepicker3.standalone.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/InputMask/css/inputmask.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/Bootstrap-Dialog/css/bootstrap-dialog.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/Ionicons/css/ionicons.min.css') }}">

    @if(config('adminlte.plugins.select2'))
        <!-- Select2 -->
        <link href="{{ asset('assets/select2/css/select2.min.css') }}" rel="stylesheet">
    @endif

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/AdminLTE.min.css') }}">

    @if(config('adminlte.plugins.datatables'))
        <!-- DataTables -->
        <link href="{{ asset('assets/DataTables-1.10.16/css/jquery.dataTables.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/DataTables-1.10.16/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/DataTables-1.10.16/css/jquery.dataTables.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/Buttons-1.4.2/css/buttons.dataTables.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/Responsive-2.2.0/css/responsive.dataTables.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/Select-1.2.3/css/select.dataTables.min.css') }}" rel="stylesheet">
    @endif

    @yield('adminlte_css')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition @yield('body_class')">

@yield('body')

<script src="{{ asset('assets/jQuery-3.2.1/jquery-3.2.1.js') }}"></script>
<script src="{{ asset('assets/Bootstrap-3.3.7/js/bootstrap.min.js') }}"></script>

@if(config('adminlte.plugins.select2'))
    <!-- Select2 -->
    <script src="{{ asset('assets/select2/js/select2.min.js') }}"></script>
@endif

@if(config('adminlte.plugins.datatables'))
    <!-- DataTables -->
    <script src="{{ asset('assets/DataTables-1.10.16/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/DataTables-1.10.16/js/jquery.dataTables.min.js') }}"></script>

    <script src="{{ asset('assets/Responsive-2.2.0/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/Select-1.2.3/js/dataTables.select.min.js') }}"></script>

    <script src="{{ asset('assets/Buttons-1.4.2/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/Buttons-1.4.2/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/JSZip-2.5.0/js/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/pdfmake-0.1.32/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/pdfmake-0.1.32/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/Buttons-1.4.2/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/Buttons-1.4.2/js/buttons.print.min.js') }}"></script>

    <script src="{{ asset('assets/Moment/js/moment.js') }}"></script>
    <script src="{{ asset('assets/Bootstrap-DatePicker/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/Bootstrap-DatePicker/locales/bootstrap-datepicker.pt-BR.min.js') }}" charset="UTF-8"></script>

    <script src="{{ asset('assets/InputMask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('assets/InputMask/jquery.inputmask.extensions.js') }}"></script>
    <script src="{{ asset('assets/InputMask/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('assets/InputMask/jquery.inputmask.numeric.extensions.js') }}"></script>

    <script src="{{ asset('assets/Bootstrap-Dialog/js/bootstrap-dialog.min.js') }}"></script>

    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Datemask dd/mm/yyyy
            $('.date_mask').inputmask('dd/mm/yyyy')

            $('.phone_mask').inputmask('(99)9999-9999')

            $(".datepicker").datepicker({
                language: 'pt-BR',
                todayHighlight: true,
                weekStart: 1,
                format: 'dd/mm/yyyy',
                startDate: '-50Y',
                endDate: '0d',
                todayBtn: true,
                autoclose: true
            })
        })
    </script>

    <script>
        $(document).ready(function(){
            $('.numeric_0_mask').inputmask('999.999.999', 
            { 
                rightAlignNumerics: false,
                numericInput: true, 
                radixPoint: ",",
                clearMaskOnLostFocus: true 
            });

            $('.numeric_2_mask').inputmask('999.999.999,99', 
            { 
                rightAlignNumerics: false,
                numericInput: true, 
                radixPoint: ",",
                clearMaskOnLostFocus: true 
            });
        });
    </script>     

    <script>
        function onDestroy(url)
            {
                BootstrapDialog.confirm(
                    {
                        title: 'CONFIRMAR EXCLUSÂO',
                        message: 'Deseja realmente EXCLUIR este registro ?\n\n\n\nNão se preocupe pois caso existam restrições, esta operação será cancelada informando os motivos.',
                        type: BootstrapDialog.TYPE_DANGER, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
                        closable: false, // <-- Default value is false
                        draggable: true, // <-- Default value is false
                        btnCancelLabel: 'Cancelar', // <-- Default value is 'Cancel',
                        btnOKLabel: 'SIM, quero EXCLUIR !', // <-- Default value is 'OK',
                        btnOKClass: 'btn-danger', // <-- If you didn't specify it, dialog type will be used,
                        callback: function(result) 
                        {
                            // result will be true if button was click, while it will be false if users close the dialog directly.
                            if(result) 
                            {
                                $(location).attr('href',url);
                            }
                        }
                    });
            }
    </script>

    <script type="text/javascript">
        $(document).ready(function() 
        {
            $('.dataTable').DataTable( 
            {
                responsive: true,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                language: {
                    "lengthMenu": "Display _MENU_ records per page",
                    "zeroRecords": "Ops ... Nenhum REGISTRO localizado !",
                    "info": "Showing page _PAGE_ of _PAGES_",
                    "infoEmpty": "No records available",
                    "infoFiltered": "(filtered from _MAX_ total records)"
                }
            });
        }); 
    </script>


@endif

@yield('adminlte_js')

</body>
</html>
