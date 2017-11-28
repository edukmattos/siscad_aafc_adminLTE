<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-dialog.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-theme.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-submenu.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-table.css') }}" rel="stylesheet">
    <link href="{{ asset('css/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">
    

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <div class="container-fluid">
            <nav class="navbar navbar-inverse">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a href="{{ url('/home') }}" class="navbar-brand">{{ config('app.name', 'Laravel') }}</a>
                </div>

                @if (Auth::guest())
                           
                @else
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="{{ url('/members/search') }}" tabindex="0">Sócios</a></li>
                            <li><a href="{{ url('/partners/search') }}" tabindex="0">Parceiros</a></li>
                            <li><a href="{{ url('/meetings/') }}" tabindex="0">Eventos</a></li>
                            <li><a href="{{ url('/management_units/') }}">Unidades Gestoras</a></li>
                            <li><a href="{{ url('/providers/') }}" tabindex="0">Fornecedores</a></li>
                            
                            <li class="dropdown">
                                <a tabindex="0" data-toggle="dropdown" data-submenu>
                                    Patrimônios<span class="caret"></span>
                                </a>
                                
                                <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                                    <li class="dropdown">
                                        <a tabindex="-1" href="{{ url('/patrimonials/') }}">Pesquisa</a>
                                        <a tabindex="-1" href="{{ url('/patrimonial_requests/') }}">Requisições</a>
                                        <li class="dropdown-submenu">
                                            <a tabindex="-1" href="#">Relatórios</a>
                                            <ul class="dropdown-menu">
                                                <li class="dropdown-submenu">
                                                    <a href="#">Posição</a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="{{ url('/patrimonials/reports/employee') }}">Responsável</a></li>
                                                        <li><a href="{{ url('/patrimonials/reports/company_sector') }}">Setor/Sub-setor</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </li>
                                </ul>
                            </li>

                            <li><a href="{{ url('/materials/') }}" tabindex="0">Materiais</a></li>
                            <li><a href="{{ url('/employees/search') }}" tabindex="0">Funcionários</a></li>

                            <li class="dropdown">
                                <a tabindex="0" data-toggle="dropdown" data-submenu>
                                    Administração<span class="caret"></span>
                                </a>
                                
                                <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                                    <li class="dropdown-submenu">
                                        <a tabindex="-1" href="#">Sócios</a>
                                        <ul class="dropdown-menu">
                                            <li><a tabindex="-1" href="{{ url('/plans/') }}">Planos</a></li>
                                            <li><a tabindex="-1" href="{{ url('/member_statuses/') }}">Situações</a></li>
                                            <li><a tabindex="-1" href="{{ url('/member_status_reasons/') }}">Desligamentos - Motivos</a></li>
                                            <li><a tabindex="-1" href="{{ url('/genders/') }}">Sexo</a></li>
                                        </ul>
                                    </li>
                                    
                                    <li class="dropdown-submenu">
                                        <a tabindex="-1" href="#">Patrimônios</a>
                                        <ul class="dropdown-menu">
                                            <li><a tabindex="-1" href="{{ url('/patrimonial_statuses/') }}">Situações</a></li>
                                            <li><a tabindex="-1" href="{{ url('/patrimonial_types/') }}">Tipos</a></li>
                                            <li><a tabindex="-1" href="{{ url('/patrimonial_sub_types/') }}">Sub-tipos</a></li>
                                            <li><a tabindex="-1" href="{{ url('/patrimonial_brands/') }}">Marcas</a></li>
                                            <li><a tabindex="-1" href="{{ url('/patrimonial_models/') }}">Modelos</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a tabindex="-1" href="#">Materiais</a>
                                        <ul class="dropdown-menu">
                                            <li><a tabindex="-1" href="{{ url('/material_units/') }}">Unidades</a></li>
                                        </ul>
                                    </li>
                                    
                                    <li class="dropdown-submenu">
                                        <a tabindex="-1" href="#">Parceiros</a>
                                        <ul class="dropdown-menu">
                                            <li><a tabindex="-1" href="{{ url('/partner_sectors/') }}">Setores</a></li>
                                            <li><a tabindex="-1" href="{{ url('/partner_types/') }}">Tipos</a></li>
                                        </ul>
                                    </li>

                                    <li class="dropdown-submenu">
                                        <a tabindex="-1" href="#">Empresa</a>
                                        <ul class="dropdown-menu">
                                            <li><a tabindex="-1" href="{{ url('/company_positions/') }}">Cargos</a></li>
                                            <li><a tabindex="-1" href="{{ url('/company_responsibilities/') }}">Funções</a></li>
                                            <li><a tabindex="-1" href="{{ url('/company_sectors/') }}">Setores</a></li>
                                            <li><a tabindex="-1" href="{{ url('/company_sub_sectors/') }}">Sub-setores</a></li>
                                        </ul>
                                    </li>
                                    
                                    <li class="dropdown-submenu">
                                        <a tabindex="-1" href="#">Localidades</a>
                                        <ul class="dropdown-menu">
                                            <li><a tabindex="-1" href="{{ url('/regions/') }}">Regiões</a></li>
                                            <li><a tabindex="-1" href="{{ url('/states/') }}">Estados</a></li>
                                            <li><a tabindex="-1" href="{{ url('/cities/') }}">Cidades</a></li>
                                            <li class="dropdown-submenu">
                                                <a href="#">Even More..</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#">3rd level</a></li>
                                                    <li><a href="#">3rd level</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    
                                    <li class="dropdown-submenu">
                                        <a tabindex="-1" href="#">Eventos</a>
                                        <ul class="dropdown-menu">
                                            <li><a tabindex="-1" href="{{ url('/meeting_types/') }}">Tipos</a></li>
                                        </ul>
                                    </li>
                                    
                                    <li class="dropdown-submenu">
                                        <a tabindex="-1" href="#">Financeiro</a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-submenu">
                                                <a href="#">Pagamentos</a>
                                                <ul class="dropdown-menu">
                                                    <li><a tabindex="-1" href="{{ url('/payment_statuses/') }}">Situação</a></li>
                                                    <li><a tabindex="-1" href="{{ url('/payment_reasons/') }}">Finalidades</a></li>
                                                    <li><a tabindex="-1" href="{{ url('/payment_methods/') }}">Métodos</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown-submenu">
                                                <a href="#">Contabilidade</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{ url('/accounting_accounts/') }}">Plano Contas</a></li>
                                                    <li><a href="{{ url('/balance_sheets/') }}">Balancetes</a></li>
                                                    <li><a href="{{ url('/balance_sheet_previouses/') }}">Saldos iniciais</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                   
                                    <li class="dropdown-submenu">
                                        <a tabindex="-1" href="#">Acessibilidade</a>
                                        <ul class="dropdown-menu">
                                            <li><a tabindex="-1" href="{{ url('/users/') }}">Usuários</a></li>
                                            <li><a tabindex="-1" href="{{ url('/roles/') }}">Grupos</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">                                
                                <a tabindex="0" data-toggle="dropdown" data-submenu style="position:relative; padding-left:50px">
                                    <img src="/uploads/avatars/users/{{ Auth::user()->avatar }}" style="widht:32px; height:32px; position:absolute; top:10px; left:10px; border-radius:50%">
                                    {{ Auth::user()->name }}
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                                    <li>
                                        <a tabindex="-1" href="{{ url('/users/profile') }}"><i class="fa fa-user"></i> Perfil</a>
                                    </li>

                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa fa-power-off"></i> Sair
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                @endif
            </nav>

            @include('common.flash')

            @yield('content')
        </div> 

        <div class="text-center">
            <p>
                © 2017<a href="www.aafcorsan.com.br"> AAFCorsan</a>, Todos os direitos reservados.
            </p>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-table.js') }}"></script>
    <script src="{{ asset('js/bootstrap-table-toolbar.js') }}"></script>
    <script src="{{ asset('js/bootstrap-table-filter.js') }}"></script>
    <script src="{{ asset('js/bootstrap-table-filter-control.js') }}"></script>
    <script src="{{ asset('js/bootstrap-table-multiple-search.js') }}"></script>
    <script src="{{ asset('js/bootstrap-table-export.js') }}"></script>
    <script src="{{ asset('js/bootstrap-table-pt-BR.js') }}"></script>
    <script src="{{ asset('js/tableExport.js') }}"></script>

    <script src="{{ asset('js/daterangepicker.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function ($) {
            $.datepicker.setDefaults
            ({
                dateFormat: 'dd/mm/yy',
                dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
                dayNamesMin: ['D','S','T','Q','Q','S','S'],
                dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb'],
                monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
                nextText: 'Próximo',
                prevText: 'Anterior',
                changeMonth: 'true',
                changeYear: 'true'
            });

            $.moment.locale('pt-br', {
            });
        });
    </script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>    
    <script src="{{ asset('js/price_format.js') }}"></script>
    
    <script src="{{ asset('js/bootstrap-dialog.js') }}"></script>
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


    @yield('js_scripts')
    
</body>
</html>
