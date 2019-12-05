@extends('auth.app')
@extends('auth.navbar')
@section('content')

<form method="POST" action="{{url('/orders')}}">
    @csrf

    <div class="row">
    
        <div class="mt-4 col-md-4">
            <div class="card">
                <img src="{{url('/img/'.$product->img)}}"  class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title" >{{$product->name}}</h5>
                <p class="card-text">{{$product->description}}</p>
                </div>

                <footer class="d-flex justify-content-around m-2">
                <h2>US ${{$product->price}}</h2>
                
            </footer>
            </div>

        </div>

        <div class="col-md-6 mt-4">

        <h2>Ingresar datos para la compra</h2>
        
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="customer_name" required name="customer_name" placeholder="Ingrese nombre">
        </div>
        
        <div class="form-group">
            <label for="exampleInputEmail1">Correo</label>
            <input type="email" class="form-control" id="customer_email" required name="customer_email" placeholder="Ingrese el correo">
        </div>

        <div class="form-group">
            <label for="name">Teléfono</label>
            <input type="text" class="form-control" id="customer_mobile" required name="customer_mobile" placeholder="Ingrese el teléfono">
        </div>
        
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
            Pagar ahora
        </button>

        </div>
    </div>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Resumen del pedido</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4>Producto</h4>
                <input type="text" name="product_name" value="{{$product->name}}" id="product_name" style="border:0px">
                <hr>
                <h4>Descripción</h4>
                <input type="text" name="product_description" value="{{$product->description}}" id="product_description" style="border:0px">                
                <hr>
                <h4>Precio</h4>
                <input type="text" name="product_price" value="{{$product->price}}" id="product_price" style="border:0px">                                
            </div>
            <div class="modal-footer">
                
                <button type="submit" class="btn btn-primary">Confirmar</button>
            </div>
            </div>
        </div>
    

</div>
    </form>


@endsection