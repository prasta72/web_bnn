<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Beranda BNN</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
</head>
<style>
    .bg-home {
        background: url("{{ asset('/img/kantor-bnn.jpg') }}") no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    .section {
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        width: 100%
    }
</style>

<body class="bg-home">

    <nav class="bg-transparent border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="https://flowbite.com/" class="flex items-center">
                <img src="{{ asset('/img/bnn.png') }}" class="h-20 mr-3" alt="Flowbite Logo" />
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                {{-- {{ dd(Auth::guard('web')->user()) }} --}}
                <ul
                    class=" font-medium flex flex-col text-center mx-auto p-4 md:p-0 mt-4 md:border border-gray-100 rounded-full bg-transparent md:flex-row md:space-x-8 md:mt-0  md:bg-transparent  dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    @if (Auth::guard('admins')->user() != null)
                        <li>
                            <a href="{{ route('adminDashboard') }}">
                                <button type="button"
                                    class="text-white border rounded-full transparent-button hover:bg-transparent focus:ring-4 focus:outline-none focus:ring-white font-medium text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-transparent dark:hover:bg-transparent dark:focus:ring-white hover:bg-white hover:text-gray-900">Dashboard</button>
                            </a>
                        </li>
                    @elseif(Auth::guard('web')->user() != null)
                        <li>
                            <a href="{{ route('userDashboard') }}">
                                <button type="button"
                                    class="text-white border rounded-full transparent-button hover:bg-transparent focus:ring-4 focus:outline-none focus:ring-white font-medium text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-transparent dark:hover:bg-transparent dark:focus:ring-white hover:bg-white hover:text-gray-900">Dashboard</button>
                            </a>
                        </li>
                    @elseif(Auth::guard('web')->user() == null || Auth::guard('admins')->user() == null)
                        <li>
                            <a href="{{ route('login') }}">
                                <button type="button"
                                    class="text-white border rounded-full transparent-button hover:bg-transparent focus:ring-4 focus:outline-none focus:ring-white font-medium text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-transparent dark:hover:bg-transparent dark:focus:ring-white hover:bg-white hover:text-gray-900">Login</button>
                            </a>
                        </li>
                    @endif

                </ul>
            </div>
        </div>
    </nav>
    <div class="section">
        <section class="p-4 md:p-20 ">
            <div class="flex">
                <div class="flex flex-col justify-center items-center text-white p-4 w-full md:w-1/2">
                    <h5 class="text-5xl font-semibold">BNN Provinsi Bali</h5>
                    <p class="text-xl text-justify"> Selamat Datang di Website Pengelolaan Kegiatan Kerja Praktek </p>
                </div>
            </div>
        </section>
        @if (Auth::guard('admins')->user() != null)
        @elseif(Auth::guard('web')->user() != null)

        @elseif(Auth::guard('web')->user() == null || Auth::guard('admins')->user() == null)
            <section class="p-4 md:p-20">
                <div class="flex flex-col md:flex-row mx-auto my-0 justify-center text-center">
                    <button>
                        <a href="{{ route('daftarUser') }}">
                            <button type="button"
                                class="text-white bg-transparent border rounded-full hover:bg-white hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-white font-medium text-sm px-8 py-2 text-center mr-3 md:mr-0 dark:bg-white dark:hover:bg-white dark:focus:ring-white">Daftar
                                Kerja Praktek</button>
                        </a>
                    </button>
                </div>
            </section>
        @endif
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

</body>

</html>
