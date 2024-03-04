<style>
    .navbar {
        background-color: rgba(0, 0, 0, 0.3);
        backdrop-filter: blur(10px);
    }

    .navbar-brand {
        font-size: 24px;
        letter-spacing: 3px;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        margin-right: 0px;
        margin-left: 5px;
    }

    .navbar-nav {
        margin: auto;
        text-align: center;
    }

    .nav-link {
        font-size: 18px;
        margin-right: 55px;
    }

    .nav-item:hover .nav-link {
        color: rgb(197, 191, 35) !important;
    }

    .cs {
        position: absolute;
        right: 0px;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark mb-4 fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            No se Caen S.L
        </a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('dashboard') }}">Inicio</a>
                </li>
                @if (auth()->check() && auth()->user()->isAdmin())
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('clientes.index') }}">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('empleados.index') }}">Empleados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('cuotas.index') }}">Cuotas</a>
                </li>
                @endif
               
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('incidencias.index') }}">Incidencias</a>
                </li>
                
            </ul>

            <ul class="navbar-nav cs">
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <a class="nav-link" href="{{ route('logout') }}"><button class="btn btn-outline-warning">Cerrar
                                Sesión</button></a>
                    </form>
                </li>
            </ul>

        </div>
    </div>
</nav>
