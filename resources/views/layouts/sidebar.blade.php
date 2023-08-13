<div class=" bg-dark border-right p3 text-white" id="sidebar">

    <h3 class="mt-2 text-center">Code Challenge</h3>
    <hr class="text-white">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'home' ? 'text-secondary' : 'text-white') }}" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'transactions' ? 'text-secondary' : 'text-white') }}  " href="{{ route('transactions') }}">Almacenar Transacciones</a>
        </li>
    </ul>
</div>
