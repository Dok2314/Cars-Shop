<div class="sidebar">
    @guest()
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="{{ route('user.login') }}" class="d-block">Вход</a>
            </div>
            <span class="mt-1">|</span>
            <div class="info">
                <a href="{{ route('user.registration') }}" class="d-block">Регистрация</a>
            </div>
        </div>
    @endguest
    @auth()
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <a href="{{ route('user.profile') }}" class="d-block">Профиль</a>
                </div>
                <span class="mt-1">|</span>
                <div class="info">
                    <a href="{{ route('user.logout') }}" class="d-block">Выйти</a>
                </div>
            </div>
    @endauth

{{--    <div class="form-inline">--}}
{{--        <div class="input-group" data-widget="sidebar-search">--}}
{{--            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">--}}
{{--            <div class="input-group-append">--}}
{{--                <button class="btn btn-sidebar">--}}
{{--                    <i class="fas fa-search fa-fw"></i>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('car.index') }}" class="nav-link">
                    <i class="fas fa-car"></i>
                    <p>
                        Автомобили
                    </p>
                </a>
            </li>
        </ul>
    </nav>
</div>
