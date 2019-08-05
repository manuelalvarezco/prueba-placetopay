@extends('auth.app')
@extends('auth.navbar')
@section('content')

<div class="card mt-4">
  <div class="card-header">
    {{$response->status()->status()}}
  </div>
  <div class="card-body">
    <h5 class="card-title">{{$response->request->payment()->reference()}}</h5>
    <p class="card-text">{{$response->request->payment()->description()}}</p>
    @if( $response->status()->status() == 'PENDING')
    <a href="{{$processUrl}}" class="btn btn-warning">Terminar la compra</a>
    @elseif($response->status()->status() == 'REJECTED')
    <a href="{{url('/products')}}" class="btn btn-warning">Comprar nuevamente </a>
    @endif
  </div>
</div>



@endsection