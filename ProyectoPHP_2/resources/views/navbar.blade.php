<style>
    .navbar-brand {
        font-size: 24px;
        letter-spacing: 3px;
        font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        margin-right: 0px;
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

    .cs{
        position: absolute;
        right: 0px;
}
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            No se caen S.L
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('dashboard')}}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Operarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Tareas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Incidencias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Facturas</a>
                </li>
            </ul>

            <ul class="navbar-nav cs">
                <li class="nav-item">
                    <a class="nav-link" href="#"><button class="btn btn-outline-danger">Cerrar Sesión</button></a>
                </li>
            </ul>

        </div>
    </div>
</nav>
