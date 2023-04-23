@extends('rootPages.DashboardAdminApp')
@section('content')
    <!-- strat content -->
    <div class="bg-gray-100 flex-1 p-6 md:mt-16">

        <!-- strat Analytics -->
        <div class="mt-6 grid grid-cols- gap-6 xl:grid-cols-1">

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
                                    <label for="first_name"
                                        class="block mb-2  text-sm font-medium text-gray-900 dark:text-white">ID</label>
                                    <select name="admin_id" id="pembina"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="{{ $randadmin->id }}">
                                                {{ $randadmin->id }}</option>
                                        {{-- @foreach ($admin as $item)
                                            <option value="{{ $item->id }}" data-pembina="{{ $item->nama }}">
                                                {{ $item->id }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                                <div class="w-full mx-4">
                                    <label for="last_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                    <input type="text" id="last_name" name="alamat"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="2986 Kaden Tunnel Suite 373 Kuphalville, KS 28321" required>
                                </div>
                            </div>
                            <div class="flex flex-row md:flex-col my-2">
                                <div class="w-full mx-4">
                                    <label for="last_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                        Pembina</label>
                                    <input type="text"  name="nama_pembina"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Doe" >
                                </div>
                                <div class="w-full mx-4">
                                    <label for="last_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                                        Hp</label>
                                    <input type="number" id="last_name" name="no_hp"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="+1-253-728-1349" required>
                                </div>

                            </div>
                            <div class="flex flex-row md:flex-col my-2">
                                <div class="w-full mx-4">
                                    <label for="last_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bidang
                                        Kerja</label>
                                    <input type="text" id="last_name" name="bidang_kerja"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Bidang Kerja" required>
                                </div>
                                <div class="w-full mx-4">
                                    <label for="first_name"
                                        class="block mb-2  text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                    <select name="status"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="aktif">Aktif</option>
                                        <option value="nonaktif">Non Aktif</option>
                                    </select>
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
        @endsection
