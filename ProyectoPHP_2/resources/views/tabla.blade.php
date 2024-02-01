
<div class="main">
    <h1 class="text-center text-white">@yield('nombre_tabla')</h1>

    <div class="table-container">
        <table class="table table-hover">
            <thead>
                <tr>
                    @yield('thead')
                </tr>
            </thead>
            <tbody>
                @yield('tbody')
            </tbody>
        </table>
    </div>

</div>
