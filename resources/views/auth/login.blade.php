<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Dashboard HR | {{ $title }}</title>
    <link rel="icon" type="image/x-icon" href="https://media.licdn.com/dms/image/D4E0BAQFFpLZcUp0Qgg/company-logo_200_200/0/1694839430809?e=1726704000&v=beta&t=EQEkZ9MD2YCO-nxv0CX4j_W0Yd1vJ__T4W2a0NViqnA">
</head>
<body>
    <div class="w-full min-h-screen bg-black flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div class="w-full sm:max-w-md p-5 mx-auto">
            <img src="https://fypmedia.id/wp-content/themes/lmd-fypmedia/img/logo.png" class="mb-12 mx-auto" alt="FYP Logo" />
            @if(session()->has('loginError'))
                <div id="alert-2" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ms-3 text-sm font-medium">
                        {{ session('loginError') }}
                    </div>
                    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                </div>
            @endif

            <form action="/flogin" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block mb-1 text-white" for="email">Email-Address</label>
                    <input id="email" type="email" name="email" placeholder="Email Address" class="py-2 px-3 border border-gray-300 focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full @error('email') disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 @enderror" required="" autofocus value="{{ old('email') }} "/>
                    @error('email')
                        <p class="mt-2 peer-invalid:visible text-pink-600 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block mb-1 text-white" for="password">Password</label>
                    <input id="password" type="password" name="password" placeholder="••••••••" class="py-2 px-3 border border-gray-300 focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full" required=""/>
                    @error('password')
                        <p class="mt-2 peer-invalid text-pink-600 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mt-6 flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember_me" name="remember" value="1" type="checkbox" class="border border-gray-300 text-red-600 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50" />
                    <label for="remember_me" class="ml-2 block text-sm leading-5 text-white"> Remember me </label>
                </div>
                </div>
                <div class="mt-6">
                <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold capitalize text-white hover:bg-red-700 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 disabled:opacity-25 transition">Sign In</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>