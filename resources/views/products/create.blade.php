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
                <a class="nav-link text-white active" style="background: #9ADCFF;" href="{{ url('brands') }}">
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
                        <h3 class="text-white  text-capitalize ps-3"> <i>Agregar Nuevo Producto</i></h3>
                    </div>
                </div>
                <div class="">
                    {{-- Inicio Formulario --}}
                    <form action="{{ url('/products') }}" method="post" enctype="multipart/form-data"
                        class="row g-3 row g-3 needs-validation" novalidate style="margin: 10px;">
                        @csrf
                        <div class="col-md-6">
                            <label class="form-label text-white"><b>Nombre</b></label>
                            <input style="background: white" type="text" class="form-control" id="name"
                                name="name" minlength="4" required>
                            <div class="valid-feedback text-white">
                                Buen nombre!!
                            </div>
                            <div class="invalid-feedback">
                                Escribe un nombre
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-white"><b>Descripcion</b></label>
                            <input style="background: white" type="text" class="form-control" id="description"
                                name="description" minlength="10" required>
                            <div class="valid-feedback text-white">
                                Muy buena descripcion!
                            </div>
                            <div class="invalid-feedback">
                                Ingrese una descripcion mayor a 10 caracteres
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="inputZip" class="form-label text-white"><b>Imagen</b> </label><br>
                            <input style="background: white" type="file" class="form-control" id="image"
                                name="image" required>
                            <div class="valid-feedback text-white">
                                Buena foto!!
                            </div>
                            <div class="invalid-feedback">
                                Seleccione una foto
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="inputZip" class="form-label text-white"><b>Precio</b> </label><br>
                            <input style="background: white" type="tel" class="form-control" id="price"
                                name="price" minlength="1" maxlength="2" required>
                            <div class="valid-feedback text-white">
                                Que baratoo!!
                            </div>
                            <div class="invalid-feedback">
                                Escriba el precio
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="inputZip" class="form-label text-white"><b>Stock</b> </label><br>
                            <input style="background: white" type="tel" class="form-control" id="stock"
                                name="stock" minlength="1" maxlength="2" required>
                            <div class="valid-feedback text-white">
                                Tantooos?!!
                            </div>
                            <div class="invalid-feedback">
                                Escriba una cantidad de stock
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="inputState" class="form-label text-white">Marca</label>
                            <select style="background: white" id="inputState" class="form-select" id="brand_id" name="brand_id" required>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name}}</option>
                                @endforeach
                            </select>
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
