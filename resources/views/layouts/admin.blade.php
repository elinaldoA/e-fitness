<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Laravel SB Admin 2">
    <meta name="author" content="Elinaldo Agostinho">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'E-Fitness') }}</title>

    <!-- Fonts -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon" type="image/png">
</head>
<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-dumbbell"></i>
            </div>
            <div class="sidebar-brand-text mx-3">E-Fitness</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ Nav::isRoute('home') }}">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>{{ __('Dashboard') }}</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            {{ __('Definições') }}
        </div>

        <!-- Nav Item - Profile 
        <li class="nav-item {{ Nav::isRoute('profile') }}">
            <a class="nav-link" href="{{ route('efitness.administrativo.profile') }}">
                <i class="fas fa-fw fa-user"></i>
                <span>{{ __('Perfil') }}</span>
            </a>
        </li>

         Nav Item - About
        <li class="nav-item {{ Nav::isRoute('about') }}">
            <a class="nav-link" href="{{ route('about') }}">
                <i class="fas fa-fw fa-hands-helping"></i>
                <span>{{ __('Sobre') }}</span>
            </a>
        </li> -->
        
        <!-- Nav Item - Notificações -->
        <li class="nav-item {{ Nav::isRoute('notificacoes') }}">
            <a class="nav-link" href="{{ route('notificacoes') }}">
                <i class="fas fa-fw fa-bell"></i>
                <span>{{ __('Notificações') }}</span>
            </a>
        </li>
        <!-- Nav Item - Financeiro -->
        <li class="nav-item {{ Nav::isRoute('mensalidades') }}">
            <a class="nav-link" href="{{ route('mensalidades') }}">
                <i class="fas fa-fw fa-calendar"></i>
                <span>{{ __('Mensalidades') }}</span>
            </a>
        </li>
        <!-- Nav Item - Financeiro -->
        <li class="nav-item {{ Nav::isRoute('pagamentos') }}">
            <a class="nav-link" href="{{ route('pagamentos') }}">
                <i class="fas fa-fw fa-landmark"></i>
                <span>{{ __('Pagamentos') }}</span>
            </a>
        </li>

        <div class="sidebar-heading">
            {{__('Cadastros')}}
        </div>

        <!-- Nav Item - Cargos-->
        <li class="nav-item {{ Nav::isRoute('cargos') }}">
            <a class="nav-link" href="{{ route('cargos') }}">
                <i class="fas fa-fw fa-user"></i>
                <span>{{ __('Cargos') }}</span>
            </a>
        </li>
        <!-- Nav Item - Planos-->
        <li class="nav-item {{ Nav::isRoute('planos') }}">
            <a class="nav-link" href="{{ route('planos') }}">
                <i class="fas fa-fw fa-dumbbell"></i>
                <span>{{ __('Planos') }}</span>
            </a>
        </li>
        <!-- Nav Item - Funcionários-->
        <li class="nav-item {{ Nav::isRoute('funcionarios') }}">
            <a class="nav-link" href="{{ route('funcionarios') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>{{ __('Funcionários') }}</span>
            </a>
        </li>
        <!-- Nav Item - Professores-->
        <li class="nav-item {{ Nav::isRoute('recepcao') }}">
            <a class="nav-link" href="{{ route('recepcao') }}">
                <i class="fas fa-fw fa-folder"></i>
                <span>{{ __('Recepção') }}</span>
            </a>
        </li>
        <!-- Nav Item - Professores-->
        <li class="nav-item {{ Nav::isRoute('alunos') }}">
            <a class="nav-link" href="{{ route('alunos') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>{{ __('Alunos') }}</span>
            </a>
        </li>
        <!-- Nav Item - Professores-->
        <li class="nav-item {{ Nav::isRoute('professores') }}">
            <a class="nav-link" href="{{ route('professores') }}">
                <i class="fas fa-fw fa-user-graduate"></i>
                <span>{{ __('Professores') }}</span>
            </a>
        </li>
        <!--Nav Item - Professores -->
        <li class="nav-item {{ Nav::isRoute('nutricionistas') }}">
            <a class="nav-link" href="{{ route('nutricionistas') }}">
                <i class="fas fa-fw fa-user-nurse"></i>
                <span>{{ __('Nutricionistas') }}</span>
            </a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                            <figure class="img-profile rounded-circle avatar font-weight-bold" data-initial="{{ Auth::user()->name[0] }}"></figure>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ route('efitness.administrativo.profile') }}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('Perfil') }}
                            </a>
                            <a class="dropdown-item" href="javascript:void(0)">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('Definições') }}
                            </a>
                            <a class="dropdown-item" href="javascript:void(0)">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('Logs') }}
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('Sair') }}
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                @yield('main-content')

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Elinaldo Agostinho 2021</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Pronto para partir?') }}</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Selecione "Sair" abaixo se você estiver pronto para encerrar sua sessão atual.</div>
            <div class="modal-footer">
                <button class="btn btn-link" type="button" data-dismiss="modal">{{ __('Cancelar') }}</button>
                <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Sair') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
</body>
</html>
