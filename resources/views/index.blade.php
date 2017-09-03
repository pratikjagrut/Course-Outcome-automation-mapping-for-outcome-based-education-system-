<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'PROJECT-X') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css" />
    </head>
    <body>
        <div class="pimg1">
            <div id="app-name" class="ptext animated bounceInDown">
                <span class="border">
                    {{ config('app.name', 'PROJECT-X') }}
                </span>
            </div>
            <a id="first-arrow" href="#img2">
                <img class="down-arrow animated infinite swing" src="{{ asset('img/down-arrow.png') }}">
            </a>
        </div>

        <section id="navbar" class="section section-light">
            <div id="heading" class="heading">
                {{ config('app.name', 'PROJECT-X') }}
            </div>
            @if (Route::has('login'))
                <div id="rightLinks" class="top-right links">
                    @auth
                        <a href="/about">About</a>
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="/about">About</a>
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif
        </section>
        <div id="img2" class="pimg2">
            <div class="ptext">
                <span class="border trans">
                    PROJECT-X
                </span>
            </div>
            <a onclick="topFunction()" title="Go to top">
                <img class="up-arrow animated infinite jello" src="{{ asset('img/up-arrow.png') }}">
            </a>
        </div>
    </body>
   <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            $('#first-arrow').on('click', function(e) {
                e.preventDefault();
                $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top}, 500, 'linear');
                $('#rightLinks, #heading').delay(1500).addClass('animated bounceInUp');

          });
        });
    </script>
    <script type="text/javascript">
        function topFunction() {
            document.body.scrollTop = 0; // For Chrome, Safari and Opera 
            document.documentElement.scrollTop = 0; // For IE and Firefox
            $('#app-name').addClass('animated bounceInDown');
        }
    </script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script type="text/javascript">
        particlesJS.load('img2', '{{ asset('json/particles.json') }}', function(){
            console.log('particles.json loaded....');
        });
    </script>
</html>
