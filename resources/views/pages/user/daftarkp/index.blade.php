<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar KP Mahasiswa</title>
    <link rel="shortcut icon" href="./img/fav.png" type="image/x-icon">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/dashboard.css') }}">
</head>

<body>
    <form action="{{ route('user.daftarKP') }}" method="post">
        <!-- strat content -->
        <div class="flex-1 p-6 md:mt-16">

            <!-- strat Analytics -->
            <div class="mt-6 grid grid-cols- gap-6 xl:grid-cols-1">
                <h1 class="text-center text-xl">Pendaftaran Kerja Praktek</h1>

                <!-- update section -->
                <div class="flex flex-col mt-8">
                    <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                        <div class="p-8">
                            @if ($message = Session::get('errors'))
                                <div class="alert alert-error alert-close">
                                    <button class="alert-btn-close">
                                        <i class="fad fa-times"></i>
                                    </button>
                                    <span>{{ $message }}</span>
                                </div>
                            @endif
                            <form action="{{ route('adminPembina.store') }}" method="post">
                                @csrf
                                <div class="flex flex-row md:flex-col my-2">
                                    <div class="w-full mx-4">
                                        <label for="last_name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIM</label>
                                        <input type="text" name="NIM"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="1900668516" required>
                                    </div>
                                    <div class="w-full mx-4">
                                        <label for="last_name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                                            Hp</label>
                                        <input type="number" name="no_hp"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="+1-253-728-1349" required>
                                    </div>

                                </div>
                                <div class="flex flex-row md:flex-col my-2">
                                    <div class="w-full mx-4">
                                        <label for="last_name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                        <input type="text" name="alamat"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="2986 Kaden Tunnel Suite 373 Kuphalville, KS 28321" required>
                                    </div>
                                    <div class="w-full mx-4">
                                        <label for="last_name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">jurusan</label>
                                        <input type="text" name="jurusan"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Ekonomi" required>
                                    </div>
                                </div>
                                <div class="flex flex-row md:flex-col my-2">
                                    <div class="w-full mx-4">
                                        <label for="last_name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instansi</label>
                                        <input type="text" name="instansi"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Universitas Udayana" required>
                                    </div>
                                    <div class="w-full mx-4">
                                        <label for="last_name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mulai
                                            Kerja Praktek</label>
                                        <input type="date" name="mulai_kerja_praktek"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Bidang Kerja" required>
                                    </div>
                                    <div class="w-full mx-4">
                                        <label for="last_name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selesai
                                            Kerja Praktek</label>
                                        <input type="date" name="selesai_kerja_praktek"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Bidang Kerja" required>
                                    </div>
                                </div>
                                <div class="flex flex-row md:flex-col my-2">
                                    <div class="w-full mx-4">
                                        <button type="submit"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto p-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <!-- end update section -->
                    </div>
                    <!-- end Analytics -->
                </div>
                <!-- end content -->
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        // Ambil dari atribut data
        $(document).ready(function() {
            $('#pembina').on('change', function() {
                const selected = $(this).find('option:selected');
                const pembina = selected.data('pembina');

                $("#input_pembina").val(pembina);
            });
        });
    </script>
</body>

</html>
