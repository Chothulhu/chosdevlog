<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="https://kit.fontawesome.com/98cbbbb5fe.js" crossorigin="anonymous"></script>
    <title>Cho's Devlog</title>
    {{$head}}    
</head>
<body>

    <!--HEADER-->
    <nav>     
        <div class="flex p-6 w-full justify-between items-center bg-dark-red">
            <div class="flex justify-start text-3xl">
                <div class="mr-5">
                    <a href="{{ route('biography') }}"><b>BIO</b></a>
                </div>
                <div class="mr-5">
                    <a href="{{ route('games') }}"><b>GAMES</b></a>
                </div>
                <div class="mr-5">
                </div>      
            </div>
            <div class="justify-self-center -mb-8 -mt-8 -ml-4 -mr-4">
                <!--logo-->
                <a href="{{ route('games') }}"><img class="h-24 w-24" src="{{ asset('images/cho_logo_transparent.png') }}" alt=""></a>         
            </div>
            <div class="justify-end">
            @if (Route::has('login'))
                <div>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-black-700 dark:text-black-500">Dashboard</a>
                        <a href="{{ route('logout.perform') }}" class="text-sm text-black-700 dark:text-black-500">Logout</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-black-700 dark:text-black-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-black-700 dark:text-black-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            </div>
        </div>
    </nav>

    <!--BODY-->
    <div class="bg-[url('/images/background_bricks.png')] bg-repeat">
        {{$slot}}
    </div>
    
    

    <!--FOOTER-->
    <div class="flex justify-between px-2 bg-dark-red text-sm text-black items-center">
        <div>
            Created using Laravel and Tailwindcss
        </div>
        <div>
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </div>
    </div>
</body>
</html>