@extends('auth.app')
@extends('auth.navbar')
@section('content')

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Producto</th>
      <th scope="col">Descripción</th>
      <th scope="col">Precio</th>
      <th>Estado</th>
    </tr>
  </thead>
  <tbody>
  @foreach($orders as $item)
    <tr>
      <td><a href="{{url('/orders/'.$item->id)}}" class="btn btn-outline-danger">Ver Compra</a></td>
      <td>{{$item->product_name}}</td>
      <td>{{$item->product_description}}</td>
      <td>US ${{$item->product_price}}</td>
      <td>{{$item->status}}</td>      
    </tr>
    @endforeach
  </tbody>
</table>


@endsection