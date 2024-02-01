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
        margin-left:5px;
    }

    .navbar-nav {
        margin: auto;
        text-align: center;
        /* Centrar los enlaces */
    }

    .nav-link {
        font-size: 18px;
        margin-right: 55px;
    }

    .cs {
        position: absolute;
        right: 0px;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('dashboard')}}">
            No se Caen S.L
        </a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('dashboard') }}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('clientes.index')}}">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('operarios.index')}}">Operarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="">Tareas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="">Incidencias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="">Facturas</a>
                </li>
            </ul>

            <ul class="navbar-nav cs">
                <li class="nav-item">
                    <a class="nav-link" href="#"><button class="btn btn-outline-warning">Cerrar Sesión</button></a>
                </li>
            </ul>

        </div>
    </div>
</nav>
