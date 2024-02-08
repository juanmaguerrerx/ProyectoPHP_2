<style>


</style>

<div class="container">
    <h2 class="marginTopTabla text-center pt-5">@yield('nombre_tabla')</h2>


    <div class="table-responsive custom-table-responsive">

        <table class="table custom-table">
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
