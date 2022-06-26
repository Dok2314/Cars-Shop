<li class="nav-item">
    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
</li>
@if(Route::current()->getName() != 'home')
    <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('home') }}" class="nav-link">Главная</a>
    </li>
@endif
@if(Route::current()->getName() != 'user.admin')
    <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('user.admin') }}" class="nav-link">Админка</a>
    </li>
@endif
