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
                        <form action="{{ route('adminKerjaPraktek.update', $data->id) }}" method="post">
                            @method('PATCH')
                            @csrf
                            <div class="flex flex-row md:flex-col my-2">
                                <div class="w-full mx-4">
                                    <label for="first_name"
                                        class="block mb-2  text-sm font-medium text-gray-900 dark:text-white">ID
                                        User</label>
                                    <select name="user_id"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        readonly>

                                        <option value="{{ old('user_id', $data->user_id) }}">
                                            {{ old('user_id', $data->user_id) }}
                                        </option>
                                    </select>
                                </div>
                                <div class="w-full mx-4">
                                    <label for="first_name"
                                        class="block mb-2  text-sm font-medium text-gray-900 dark:text-white">ID
                                        Pembina</label>
                                    <select id="pembina"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                        <option value="{{ old('pembina_id', $data->pembina_id) }}">
                                            {{ old('pembina_id', $data->pembina_id) }}
                                        </option>
                                    </select>
                                </div>
                                <div class="w-full mx-4">
                                    <label for="last_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIM</label>
                                    <input type="text" id="last_name" name="NIM"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="2986 Kaden Tunnel Suite 373 Kuphalville, KS 28321" required
                                        value="{{ old('NIM', $data->NIM) }}">
                                </div>

                            </div>
                            <div class="flex flex-row md:flex-col my-2">
                                <div class="w-full mx-4">
                                    <label for="first_name"
                                        class="block mb-2  text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                    <select name="status" id="pembina"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="aktif" selected>Aktif</option>
                                        <option value="nonaktif">Non Aktif</option>
                                    </select>
                                </div>
                                <div class="w-full mx-4">

                                    <label for="first_name"
                                        class="block mb-2  text-sm font-medium text-gray-900 dark:text-white">Nama
                                        Pembina</label>
                                    <select name="pembina_id" id="pembina"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                        @foreach ($pembina as $item)
                                            <option value="{{ $item->id }} ">
                                                {{ $item->nama_pembina }}
                                            </option>
                                        @endforeach
                                    </select> 
                                </div>
                                <div class="w-full mx-4">
                                    <label for="last_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bidang
                                        kerja</label>
                                    <input type="text" name="bidang_kerja"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="2986 Kaden Tunnel Suite 373 Kuphalville, KS 28321" required "  value="{{ old('bidang_kerja', $data->bidang_kerja) }}">
                                    </div>

                                </div>
                                <div class="flex flex-row md:flex-col my-2">
                                    <div class="w-full mx-4">
                                        <label for="last_name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                        <input type="text" id="last_name" name="alamat"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="2986 Kaden Tunnel Suite 373 Kuphalville, KS 28321" required
                                            value="{{ old('alamat', $data->alamat) }}">
                                    </div>
                                    <div class="w-full mx-4">
                                        <label for="last_name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                                            Hp</label>
                                        <input type="number" id="last_name" name="no_hp"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="+1-253-728-1349" required value="{{ old('no_hp', $data->no_hp) }}">
                                    </div>

                                </div>
                                <div class="flex flex-row md:flex-col my-2">
                                    <div class="w-full mx-4">
                                        <label for="last_name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instansi</label>
                                        <input type="text" id="last_name" name="instansi"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Bidang Kerja" required value="{{ old('instansi', $data->instansi) }}">
                                    </div>
                                    <div class="w-full mx-4">
                                        <label for="last_name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">jurusan</label>
                                        <input type="text" id="last_name" name="jurusan"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Bidang Kerja" required value="{{ old('jurusan', $data->jurusan) }}">
                                    </div>

                                </div>
                                <div class="flex flex-row md:flex-col my-2">
                                    <div class="w-full mx-4">
                                        <label for="last_name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mulai Kerja
                                            Praktek</label>
                                        <input type="text" id="last_name" name="mulai_kerja_praktek"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Bidang Kerja" required
                                            value="{{ old('mulai_kerja_praktek', $data->mulai_kerja_praktek) }}">
                                    </div>
                                    <div class="w-full mx-4">
                                        <label for="last_name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selesai Kerja
                                            Praktek</label>
                                        <input type="text" id="last_name" name="selesai_kerja_praktek"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Bidang Kerja" required
                                            value="{{ old('selesai_kerja_praktek', $data->selesai_kerja_praktek) }}">
                                    </div>

                                </div>
                                <div class="flex flex-row md:flex-col my-2">
                                    <div class="grow w-full mx-4">
                                        <button type="submit"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:my-2 p-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                                    </div>
                                    <div class="grow w-full mx-4">
                                        <a href="{{ route('adminPembina') }}">
                                            <button type="button"
                                                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:my-2 p-2 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Back</button>
                                        </a>
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
                            const status = selected.data('status');
                            const bidang_kerja = selected.data('bidang-kerja');

                            $("#input_pembina").val(pembina);
                            $("#input_status").val(status);
                            $("#input_bidang_kerja").val(bidang_kerja);
                        });
                    });
                </script>
@endsection
