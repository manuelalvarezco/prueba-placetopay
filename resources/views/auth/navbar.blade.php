<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="{{url('/products')}}">
    <img src="https://placetopay.github.io/web-checkout-api-docs/images/logo.png" height="70" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/products')}}">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/orders')}}">Mis Ordenes</a>
      </li>
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      
      <a href="#" class="btn btn-outline-success my-2 my-sm-0 text-success">Login</a>
    </form>
  </div>
</nav>