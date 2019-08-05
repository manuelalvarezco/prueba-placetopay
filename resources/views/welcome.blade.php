@extends('auth.app')
@extends('auth.navbar')
@section('content')

<div class="container mt-4">

  <div class="card-columns">
    @foreach($products as $item)

    <div class="card">
        <img src="../public/img/{{$item->img}}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{$item->name}}</h5>
          <p class="card-text">{{$item->description}}</p>
        </div>

        <footer class="d-flex justify-content-around">
        <input type="text" class="text-center" value="US ${{$item->price}}">
        <a href="{{url('/products/'.$item->id)}}" class="btn btn-outline-success btn-block btn-sm">Comprar</a>
        
      </footer>
      </div>

    @endforeach
  </div>
</div>

@endsection