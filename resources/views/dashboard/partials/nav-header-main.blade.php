<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="{{ route('home') }}">Organic</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">            
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                CRUD
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('post.index') }}">Articulos para blog</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('post-comment.index') }}">Comentarios</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('category.index') }}">Categorias blog</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('vendor.index') }}">Tiendas</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('product.index') }}">Productos</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('user.index') }}">Usuarios</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('contact.index') }}">Contactos</a>
                <div class="dropdown-divider"></div>
            </div>
            </li>        
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}
             </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
             </form>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Perfil
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Perfil</a>
                        <div class="dropdown-divider"></div>
                </div>
            </li>        
        </ul>
      
    </div>
</nav>