@include('include.head')
<aside style="background-color:  #FF8AAE;"
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3"
    id="sidenav-main">

    <div class="sidenav-header text-center">
        <a class="m-0" href="{{ url('/') }}">
            <img src="{{ asset('img/logo2.png') }}" alt="logo" style="height: 90%; padding:5px;">
        </a>
    </div>
    <div class="" id="sidenav-collapse-main">
        <style>
            .barra:hover {
                transform: scale(1.1);
                transition: 1s;
            }

            .barra {
                transition: 1s;
            }
        </style>
        <ul class="navbar-nav">
            <li class="barra">
                <a class="nav-link text-white" href="{{ url('/') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Inicio</span>
                </a>
            </li>
            <li class="barra">
                <a class="nav-link text-white active" style="background: #9ADCFF;" href="{{ url('entries') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Entradas</span>
                </a>
            </li>
            <li class="barra">
                <a class="nav-link text-white" href="{{ url('entries_details') }}">
                    <span>---</span>
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Detalle Entradas</span>
                </a>
            </li>
            <li class="barra">
                <a class="nav-link text-white" href="{{ url('outputs') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Salidas</span>
                </a>
            </li>
            <li class="barra">
                <a class="nav-link text-white" href="{{ url('outputs_details') }}">
                    <span>---</span>
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Detalle Salidas</span>
                </a>
            </li>
            <li class="barra">
                <a class="nav-link text-white" href="{{ url('products') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Productos</span>
                </a>
            </li>
            <li class="barra">
                <a class="nav-link text-white" href="{{ url('brands') }}">
                    <span>---</span>
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Marcas</span>
                </a>
            </li>
            <li class="barra">
                <a class="nav-link text-white" href="{{ url('employees') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Empleados</span>
                </a>
            </li>
            <li class="barra">
                <a class="nav-link text-white" href="{{ url('clients') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Clientes</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    @include('include.header')
    {{-- Inicio tabal --}}
    <div class="" style="padding:10px">
        <div class="col-12">
            <div class="card my-4" style="background: #9ADCFF;">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class=" shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-content-center"
                        style="background-color:  #FF8AAE;">
                        <h3 class="text-white  text-capitalize ps-3"> <i>E n t r a d a s</i></h3>
                        <form class="d-inline" action="{{ url('/entries') }}"
                            method="post">
                            @csrf
                            <input type="hidden" name="id">
                            <button  class="text-secondary font-weidght-bol text-xs enlace btn barra"
                                type="submit"><img style="height: 30px"
                                    src="{{ asset('img/crear.png') }}" alt="">
                            </button>
                        </form>
                       {{--  <a style="height: 50px" class="btn barra" href="{{ url('brands/create') }}"> <img
                                style="height: 100%" src="{{ asset('img/crear.png') }}" alt=""> </a> --}}
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr class="text-center">
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID
                                    </th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <style>
                                    .tabla:hover {
                                        background: #FFB2A6;
                                        transition: 1s;
                                    }

                                    .tabla {
                                        transition: 1s;
                                    }
                                </style>
                                @foreach ($entries as $entri)
                                    <tr class="tabla text-center">
                                        <td>
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $entri->id }}</span>
                                        </td>
                                        <td class="align-middle align-content-center  ">
                                            <form class="d-inline" action="{{ url('/entries/' . $entri->id) }}"
                                                method="post">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button class="text-secondary font-weidght-bol text-xs enlace btn barra"
                                                    type="submit"><img style="height: 20px; opacity: .6"
                                                        src="{{ asset('img/eliminar.png') }}" alt="">
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                    {{-- Fin Formulario --}}
            </div>
        </div>
    </div>
    {{-- Fin tabla --}}
</main>
@include('include.footer')

</html>
