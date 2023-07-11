<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Estilos template -->
        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="{{url('recursos/css/bootstrap.min.css')}}" />
        <link type="text/css" rel="stylesheet" href="{{url('recursos/css/style.css')}}" />

        <!-- Iconos -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />


        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .dropdown-toggle::after{
                display: none!important;
            }
            .img-users-nav{
                border-radius: 9999px;
                width: 35px;
                height: 35px;
            }
            .dropdown-config-style{
                margin-left: -92px;
            }
            .bg-body-nav{
                background-color: #712cf9;
                color: #ffffff;
            }
            .post-image{
                height: 20rem;
                background-repeat:no-repeat;
                background-size:cover;
                background-position: center;
            }
            .mas-img-post{

                height: 5rem;
                background-repeat:no-repeat;
                background-size:cover;
                background-position: center;
            }
            .posts-img-category-show{
                width: 100%;
                height: 15rem;
                background-repeat:no-repeat;
                background-size:cover;
                background-position: center;
            }
        </style>

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation')



            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <footer id="footer">

            <div class="container">

                <div class="row">
                    <div class="col-md-5">
                        <div class="footer-widget">
                            <div class="footer-logo">
                                <a href="/" class="logo">Blog-LCKM</a>
                            </div>
                            <ul class="footer-nav">
                                <li><a href="#">Anuncio de política de privacidad</a></li>

                            </ul>
                            <div class="footer-copyright">
<span>&copy;
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados <i class="fa-solid fa-heart"></i> Por <a href="https://www.linkedin.com/in/jcamilo-dev/" target="_blank">Camilo Rodriguez.</a>
</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="footer-widget">
                                    <h3 class="footer-title">Sobre Nosotros</h3>
                                    <ul class="footer-links">
                                        <li><a href="#">Acerca de</a></li>
                                        <li><a href="#">Contactanos</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="footer-widget">
                                    <h3 class="footer-title">Categorias</h3>
                                    <ul class="footer-links">
                                        <li><a href="category.html">Web Design</a></li>
                                        <li><a href="category.html">JavaScript</a></li>
                                        <li><a href="category.html">Css</a></li>
                                        <li><a href="category.html">Jquery</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="footer-widget">
                            <h3 class="footer-title">Suscribete</h3>
                            <div class="footer-newsletter">
                                <form>
                                    <input class="input" type="email" name="newsletter" placeholder="Ingresa tu Correo">
                                    <button class="newsletter-btn"><i class="fa fa-paper-plane"></i></button>
                                </form>
                            </div>
                            <ul class="footer-social">
                                <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-google"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

        </footer>
        @stack('modals')

        @livewireScripts
        <script src="{{url('recursos/js/jquery.min.js')}}"></script>
        <script src="{{url('recursos/js/bootstrap.min.js')}}"></script>
        <script src="{{url('recursos/js/main.js')}}"></script>
    </body>
</html>
