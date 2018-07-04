@php
$person_id = 23;
$user_id = 10;
@endphp

<div class="sidebar" data-color="black">
    <div class="logo">
        <a href="/" class="simple-text logo-mini">
            <img src="/img/logo_1.png">
        </a>

        <a href="/" class="simple-text logo-normal">
            <img src="/img/logo_2.png">
        </a>
    </div>

    <div class="sidebar-wrapper">
        <ul class="nav">            
            <h2 class="sidebar-group-title">Geral</h2>

            @php
                $route = "/dashboard";
                $route_name = "dashboard";
            @endphp
            <li class="{{ AppUtils::isActiveRoute($route_name) }}">
                <a href="{{ $route }}">
                    <i class="now-ui-icons design_app"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            <h2 class="sidebar-group-title">Administração</h2>           
         
            @php
                if (
                    !empty(AppUtils::isActiveRoute('person.manage.natural')) ||
                    !empty(AppUtils::isActiveRoute('person.manage.legal'))
                ) {
                    $active = 'active';
                } 
                else {
                    $active = null;
                }
            @endphp
            <li class="{{ $active }}">
                <a data-toggle="collapse" href="#menu_person_manage">
                    <i class="now-ui-icons business_briefcase-24"></i>
                    <p>
                        Gerenciar
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse " id="menu_person_manage">
                    <ul class="nav">
                        @php
                            $route = "/person/manage/natural";
                            $route_name = "person.manage.natural";
                        @endphp
                        <li class="{{ AppUtils::isActiveRoute($route_name) }}">
                            <a href="/person/manage/natural">
                                <span class="sidebar-mini-icon">PF</span>
                                <span class="sidebar-normal"> Pessoa Física </span>
                            </a>
                        </li>
                        @php
                            $route = "/person/manage/legal";
                            $route_name = "person.manage.legal";
                        @endphp
                        <li class="{{ AppUtils::isActiveRoute($route_name) }}">
                            <a href="/person/manage/legal">
                                <span class="sidebar-mini-icon">PJ</span>
                                <span class="sidebar-normal">Pessoa Jurídica</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            @php
                $route = "/person/new";
                $route_name = "person.new";
            @endphp
            <li class="{{ AppUtils::isActiveRoute($route_name) }}">
                <a href="{{ $route }}">
                    <i class="now-ui-icons ui-1_simple-add"></i>
                    <p>Cadastrar</p>
                </a>
            </li>

            <h2 class="sidebar-group-title">Configurações</h2>

            @php
                $route = "/settings/profile/$user_id";
                $route_name = "settings.profile";
            @endphp
            <li class="{{ AppUtils::isActiveRoute($route_name) }}">
                <a href="{{ $route }}">
                    <i class="now-ui-icons users_circle-08"></i>
                    <p>Perfil</p>
                </a>
            </li>

            @php
                $route = "/settings/users";
                $route_name = "settings.users";
            @endphp
            <li class="{{ AppUtils::isActiveRoute($route_name) }}">
                <a href="{{ $route }}">
                    <i class="now-ui-icons users_single-02"></i>
                    <p>Usuários</p>
                </a>
            </li>

            <!--
            @php
                $route = "/settings/preferences";
                $route_name = "settings.preferences";
            @endphp
            <li class="{{ AppUtils::isActiveRoute($route_name) }}">
                <a href="{{ $route }}">
                    <i class="now-ui-icons ui-1_settings-gear-63"></i>
                    <p>Preferências</p>
                </a>
            </li>   
            -->
            
            @php
                $route = "/login/out";
                $route_name = "login.out";
            @endphp
            <li class="{{ AppUtils::isActiveRoute($route_name) }}">
                <a href="{{ $route }}">
                    <i class="now-ui-icons media-1_button-power"></i>
                    <p>Sair</p>
                </a>
            </li>
            
            <h2 class="sidebar-group-title">Extra</h2>

            @php
                $route = "/";
                $route_name = "about";
            @endphp

            <li class="{{ AppUtils::isActiveRoute($route_name) }}">
                <a href="{{ $route }}">
                    <i class="now-ui-icons objects_planet"></i>
                    <p>Sobre</p>
                </a>
            </li>
        </ul>
    </div>
</div>