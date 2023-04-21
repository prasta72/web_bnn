@extends('rootPages.DashboardUserApp')
@section('content')
    <!-- strat content -->
    <div class="bg-gray-100 flex-1 p-6 md:mt-16  w-[80%] overflow-scroll">
        <p>Halaman Kerja Praktek</p>

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-close mb-5">
                <button class="alert-btn-close">
                    <i class="fad fa-times"></i>
                </button>
                <span>{{ $message }}</span>
            </div>
        @endif
        <tbody class="bg-white">
            <div class="bg-gray-100 flex-1 p-6 md:mt-16">
                @foreach ($kerjapraktek as $key => $value)
                    <!-- strat Analytics -->
                    <div class="mt-6 grid grid-cols- gap-6 xl:grid-cols-1">
                        <!-- update section -->
                        <div class="flex flex-col mt-8">
                            <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                                <div class="p-8">
                                    <div class="flex flex-row md:flex-col my-2">
                                        <div class="w-full mx-4">
                                            <label for="first_name"
                                                class="block mb-2  text-sm font-medium text-gray-900 dark:text-white">Nama
                                                Mahasiswa</label>
                                            <input type="text" id="input_mahasiswa" name="nama_lengkap"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="2986 Kaden Tunnel Suite 373 Kuphalville, KS 28321"
                                                value="{{ $value->user->nama_lengkap }}">
                                        </div>
                                        <div class="w-full mx-4">
                                            <label for="last_name"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                            <input type="text" id="input_mahasiswa" name="email"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="2986 Kaden Tunnel Suite 373 Kuphalville, KS 28321"
                                                value="{{ $value->user->email }}">
                                        </div>
                                    </div>
                                    <div class="flex flex-row md:flex-col my-2">
                                        <div class="w-full mx-4">
                                            <label for="first_name"
                                                class="block mb-2  text-sm font-medium text-gray-900 dark:text-white">No
                                                Handphone</label>
                                            <input type="text" id="input_mahasiswa" name="no_hp"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="2986 Kaden Tunnel Suite 373 Kuphalville, KS 28321"
                                                value="{{ old('no_hp', $value->no_hp) }}">
                                        </div>
                                        <div class="w-full mx-4">
                                            <label for="last_name"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                            <input type="text" id="input_pembina" name="alamat"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Doe" value="{{ old('alamat', $value->alamat) }}">
                                        </div>

                                    </div>
                                    <div class="flex flex-row md:flex-col my-2">
                                        <div class="w-full mx-4">
                                            <label for="last_name"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instansi</label>
                                            <input type="text" id="input_bidang_kerja" name="instansi"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Bidang Kerja" value="{{ old('instansi', $value->instansi) }}">
                                        </div>
                                        <div class="w-full mx-4">
                                            <label for="first_name"
                                                class="block mb-2  text-sm font-medium text-gray-900 dark:text-white">Jurusan</label>
                                            <input type="text" name="jurusan" name="jurusan"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="jurusan" required
                                                value="{{ old('jurusan', $value->jurusan) }}">
                                        </div>
                                    </div>
                                    <div class="flex flex-row md:flex-col my-2">
                                        <div class="w-full mx-4">
                                            <label for="last_name"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mulai
                                                Kerja Praktek</label>
                                            <input type="text" id="input_bidang_kerja" name="mulai_kerja_praktek"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Bidang Kerja"
                                                value="{{ old('mulai_kerja_praktek', $value->mulai_kerja_praktek) }}">
                                        </div>
                                        <div class="w-full mx-4">
                                            <label for="first_name"
                                                class="block mb-2  text-sm font-medium text-gray-900 dark:text-white">Selesai
                                                Kerja Praktek</label>
                                            <input type="text" name="selesai_kerja_praktek" name="selesai_kerja_praktek"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="selesai_kerja_praktek" required
                                                value="{{ old('selesai_kerja_praktek', $value->selesai_kerja_praktek) }}">
                                        </div>
                                    </div>
                                    <div class="flex flex-row md:flex-col my-2">
                                        <div class="w-full mx-4">
                                            <label for="last_name"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pembina</label>
                                            <input type="text" id="input_bidang_kerja"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Bidang Kerja" readonly
                                                value="{{ old('pembina_id', $value->pembina->admin->nama) }}">
                                        </div>
                                        <div class="w-full mx-4">
                                            <label for="first_name"
                                                class="block mb-2  text-sm font-medium text-gray-900 dark:text-white">Bidang
                                                Kerja</label>
                                            <input type="text"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="selesai_kerja_praktek" required readonly
                                                value="{{ old('pembina_id', $value->pembina->bidang_kerja) }}">
                                        </div>
                                    </div>
                @endforeach

                <div class="flex flex-row md:flex-col my-2">
                    <div class="grow w-full mx-4">
                        <a href="{{ route('userKerjaPraktek.edit', $value->id) }}">
                            <button type="submit"
                                class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm w-full sm:my-2 p-2 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">Update
                                Biodata</button>
                        </a>
                    </div>
                </div>
            </div>
            <!-- end update section -->
    </div>
    <!-- end Analytics -->
    </div>
    </form>
    </div>
    </div>
    <!-- end update section -->
    </div>
    <!-- end Analytics -->
    </div>
    <!-- end content -->
@endsection
