<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name')}}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


        @stack('css')

        <!-- Styles -->
        @vite('resources/css/app.css')
    </head>
    <body class="bg-[#FBFBFB]">
        <div class="flex justify-between items-center px-6 md:px-20 bg-white shadow py-2">

            <!-- รูป logo - Header bar -->
            <a href="/"><img style="height:75px" src="{{asset('dpanel/images/logo.png')}}" alt="">
            </a>
            
            <div class="text-2xl relative">
                <i class='bx bx-heart' ></i>
                <i class='bx bx-user' ></i>
                <i class='bx bx-cart-add' ></i>
                <span class="absolute top-0 -right-2.5 bg-indigo-600 rounded-full w-4 h-4 text-xs text-white text-center">0</span>
            </div>
        </div>

        <main>@yield('body_content')</main>

        <footer class="px-6 md:px-20 mt-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <div>
                    <img src="{{asset('dpanel/images/logo.png')}}" alt="">
                    <ul class="mt-3 text-gray-800">
                        <li><i class='bx bx-map' ></i> Ubon ratchathani</li>
                        <li><i class='bx bxs-phone' ></i> +66 48037076</li>
                        <li><i class='bx bxs-contact' ></i> naetisak@gmail.com</li>
                    </ul>
                </div>

                <div>
                    <h2 class="text-lf font-medium text-gray-800">Categories</h2>
                    <ul class="mt-1 text-gray-800">
                        <li>Category 1</li>
                        <li>Category 2</li>
                        <li>Category 3</li>
                        <li>Category 4</li>
                        <li>Category 5</li>
                    </ul>
                </div>

                <div>
                    <h2 class="text-lf font-medium text-gray-800">Further</h2>
                    <ul class="mt-1 text-gray-800">
                        <li>Home</li>
                        <li>About Us</li>
                        <li>Contact Us</li>
                        <li>Privacy Policy</li>
                        <li>Terms Of Use</li>

                    </ul>
                </div>
        </div>

            <p class="text-gray-400 text-center my-3">Copyright &copy;{{date('Y')}} OnlineShopping | Designed by <a 
               class="underline" href="https://OnlineShopping.com">Naetisak And Adittheph</a></p>

        </footer>

        <script src="{{asset('js/jquery-3.7.1.min.js')}}"></script>

        @stack('scripts')

    </body>
</html>
