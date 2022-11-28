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
                <a class="nav-link text-white" href="{{ url('entries') }}">
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
                <a class="nav-link text-white active" style="background: #9ADCFF;" href="{{ url('employees') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Empleados</span>
                </a>
            </li>
            <li class="barra">
                <a class="nav-link text-white"  href="{{ url('clients') }}">
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
                        <h3 class="text-white  text-capitalize ps-3"> <i>Editar cliente: "{{ $employe->name }}
                                {{ $employe->lastname }}"</i></h3>
                    </div>
                </div>
                <div class="">
                    {{-- Inicio Formulario --}}
                    <form action="{{ url('/employees/' . $employe->id) }}" method="post" enctype="multipart/form-data"
                        class="row g-3 row g-3 needs-validation" novalidate style="margin: 10px;">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="col-md-6">
                            <label class="form-label text-white"><b>Nombre</b></label>
                            <input style="background: white" type="text" class="form-control" id="name"
                                name="name" minlength="4" value="{{ $employe->name }}" required>
                            <div class="valid-feedback text-white">
                                Buen nombre!!
                            </div>
                            <div class="invalid-feedback">
                                Escribe un nombre
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-white"><b>Apellidos</b></label>
                            <input style="background: white" type="text" class="form-control" id="lastname"
                                name="lastname" minlength="4" value="{{ $employe->lastname }}" required>
                            <div class="valid-feedback text-white">
                                Buen apellido!
                            </div>
                            <div class="invalid-feedback">
                                Escriba los apellidos
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="inputZip" class="form-label text-white"><b>Imagen</b> </label><br>
                            <img style="height: 80px; border-radius:5px"
                                src="{{ asset('storage') . '/' . $employe->image }}" alt="imagen">
                            <input style="background: white" type="file" class="form-control" id="image"
                                name="image" value="{{ $employe->image }}">
                            <div class="valid-feedback text-white">
                                Buena foto!!
                            </div>
                            <div class="invalid-feedback">
                                Seleccione una foto
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="inputZip" class="form-label text-white"><b>Correo</b> </label><br>
                            <input style="background: white" type="email" class="form-control" id="email"
                                name="email" value="{{ $employe->email }}" required>
                            <div class="valid-feedback text-white">
                                Tu correo esta seguro con nosotros!
                            </div>
                            <div class="invalid-feedback">
                                Escriba el correo
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="inputState" class="form-label text-white">Contraseña</label>
                            <input style="background: white" type="password" class="form-control" id="password"
                                name="password" minlength="8" maxlength="20" value="{{ $employe->password }}"
                                required>
                            <div class="valid-feedback text-white">
                                Shhh, no le digas a nadie tu contraseña
                            </div>
                            <div class="invalid-feedback">
                                Escriba una contraseña de minimo 8 caracteres
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn barra text-white"
                                style="background: #FF8AAE">Enviar</button>
                        </div>
                    </form>
                    {{-- Fin Formulario --}}

                </div>
            </div>
        </div>
    </div>
    {{-- Fin tabla --}}
</main>
@include('include.footer')

</html>
