<header id="header">
    <div id="nav">
        <div id="nav-fixed">
            <div class="container">
                <div class="nav-logo">
                    <a href="/" class="logo">Blog-LCKM</a>
                </div>


                <ul class="nav-menu nav navbar-nav">
                    <li><a href="/">Inicio</a></li>
                    @foreach($categories as $category)
                    <li class="cat-{{$category->id}}"><a href="{{route('posts.category', $category)}}">{{$category->name}}</a></li>
                    @endforeach
                    <!--
                    <li class="cat-2"><a href="category.html">JavaScript</a></li>
                    <li class="cat-3"><a href="category.html">Css</a></li>
                    <li class="cat-4"><a href="category.html">Jquery</a></li>
                    -->
                </ul>


                <div class="nav-btns">
                    <button class="aside-btn"><i class="fa fa-bars"></i></button>
                    <button class="search-btn"><i class="fa fa-search"></i></button>
                    <div class="search-form">
                        <input class="search-input" type="text" name="search" placeholder="Enter Your Search ...">
                        <button class="search-close"><i class="fa fa-times"></i></button>
                    </div>
                </div>

            </div>
        </div>


        <div id="nav-aside">
            @auth
                <div class="section-row">
                    <ul class="nav-aside-menu">
                        <li><a href="/">Inicio</a></li>
                        @can('admin.home')
                        <li><a href="{{route('admin.home')}}">Dashboard</a></li>
                        @endcan
                        <li><a href="{{route('profile.show')}}">Configuración</a></li>
                        <li><a href="#">Sobre nosotros</a></li>
                        <li><a href="#">Contactos</a></li>
                    </ul>
                </div>
                <div class="section-row">
                    <h3>Siguenos</h3>
                    <ul class="nav-aside-social">
                        <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-google"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                    </ul>
                </div>

                <div class="section-row">
                    <ul class="nav-aside-menu">
                        <form action="{{route('logout')}}" method="post" id="sesion-cerrar">
                            @csrf
                        </form>
                        <li><a onclick="document.getElementById('sesion-cerrar').submit()">Cerrar sesión</a></li>
                    </ul>
                </div>
                <button class="nav-aside-close"><i class="fa fa-times"></i></button>
            @else
            <div class="section-row">
                <ul class="nav-aside-menu">
                    <li><a href="/">Inicio</a></li>
                    <li><a href="{{route('login')}}">Iniciar Sesión</a></li>
                    <li><a href="{{route('register')}}">Registrarse</a></li>
                    <li><a href="#">Sobre nosotros</a></li>
                    <li><a href="#">Contactos</a></li>
                </ul>
            </div>
            <div class="section-row">
                <h3>Síganos</h3>
                <ul class="nav-aside-social mt-3">
                    <li><a href="#" class="text-white"><i class="fa-brands fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-google"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                </ul>
            </div>
            <button class="nav-aside-close"><i class="fa fa-times"></i></button>
            @endauth
        </div>

    </div>

</header>

