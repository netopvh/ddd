<!-- Main sidebar -->
<div class="sidebar sidebar-main sidebar-default sidebar-fixed">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user-material">
            <div class="category-content">
                <div class="sidebar-user-material-content">
                    <a href="#"><img src="{{ asset('backend/images/placeholder.jpg') }}"
                                     class="img-circle img-responsive" alt=""></a>
                    <h6>{{ auth()->user()->name }}</h6>
                </div>

                <div class="sidebar-user-material-menu">
                    <a href="#user-nav" data-toggle="collapse"><span>Minha conta</span> <i class="caret"></i></a>
                </div>
            </div>

            <div class="navigation-wrapper collapse" id="user-nav">
                <ul class="navigation">
                    <li class="divider"></li>
                    <li><a href="{{ route('admin.account') }}"><i class="icon-cog5"></i> <span>Configurações de conta</span></a></li>
                    <li><a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                    class="icon-switch2"></i> <span>Sair do sistema</span></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">{{ csrf_field() }}</form>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Gerenciamento -->
                    <li class="navigation-header"><span>Gerenciamento</span> <i class="icon-menu"
                                                                                title="Gerenciamento"></i></li>
                    <li class="{{ active('dashboard') }}"><a href="{{ route('admin.home') }}"><i class="icon-home4"></i>
                            <span>Início</span></a></li>
                    <li>
                        <a href="#"><i class="icon-stack"></i> <span>Cadastros</span></a>
                        <ul>
                            <li><a href=""><i class="icon-address-book"></i> Diversos</a></li>
                            <li><a href=""><i class="icon-airplane4"></i> Teste</a></li>

                        </ul>
                    </li>
                    <!-- /gerenciamento -->

                    @permission('ver-administracao')
                <!-- Administração -->
                    <li class="navigation-header"><span>Administração</span> <i class="icon-menu"
                                                                                title="Administração"></i></li>
                    <li>
                        <a href="#"><i class="icon-stack"></i> <span>Gerenciamento de Acesso</span></a>
                        <ul>
                            <li class="{{ active(['admin.users','admin.users.*']) }}"><a
                                        href="{{ route('admin.users') }}"><i class="icon-user"></i> Usuários</a></li>
                            <li class="{{ active(['admin.roles','admin.roles.*']) }}"><a
                                        href="{{ route('admin.roles') }}"><i class="icon-users4"></i> Perfil de
                                    Acesso</a></li>
                        </ul>
                    </li>
                    <li><a href=""><i class="icon-cog"></i> Parâmetros do Sistema</a></li>
                    <li class="{{ active(['admin.auditor']) }}"><a href="{{ route('admin.auditor') }}"><i class="icon-stack-star"></i> Auditoria e Logs</a></li>
                    <!-- /administracao -->
                    @endpermission
                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>
<!-- /main sidebar -->