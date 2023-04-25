<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Beranda BNN</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
</head>

<body>

    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="https://flowbite.com/" class="flex items-center">
                <img src="{{ asset('/img/bnn.png') }}" class="h-8 mr-3" alt="Flowbite Logo" />
                <span
                    class=" md:block hidden self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Kantor
                    BNN Provinsi
                    Bali</span> 
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
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    @auth('admins')
                        <li>
                            <a href="{{ route('adminDashboard') }}">
                                <button type="button"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Dashboard</button>
                            </a>
                        </li>
                    @endauth

                    @auth('web')
                        <li>
                            <a href="{{ route('userDashboard') }}">
                                <button type="button"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Dashboard</button>
                            </a>
                        </li>
                    @endauth
                    @guest

                        <li>
                            <a href="{{ route('login') }}">
                                <button type="button"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
                            </a>
                        </li>

                    @endguest

                </ul>
            </div>
        </div>
    </nav>
    <section class="p-4 md:p-20">
        <div class="flex flex-col md:flex-row">
            <div class="flex p-4 w-full md:w-1/2">
                <img class="rounded-lg" src="{{ asset('/img/bnn-bali.jpg') }}" alt="">
            </div>
            <div class="flex p-4 w-full md:w-1/2">
                <p class="text-2xl text-justify"> Selain tugas sebagaimana diatas, BNN juga bertugas menyusun dan
                    melaksanakan kebijakan nasional mengenai pencegahan dan pemberantasan penyalahgunaan dan peredaran
                    gelap psikotropika, prekursor dan bahan adiktif lainnya kecuali bahan adiktif untuk tembakau dan
                    alkohol. </p>
            </div>
        </div>
    </section>
    <section class="p-4 md:p-20">
        <div class="flex flex-col md:flex-row mx-auto my-0 justify-center text-center">
            <button>
                <a href="{{ route('daftarUser') }}">
                    <button type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-8 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Pendaftaran</button>
                </a>
            </button>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

</body>

</html>
