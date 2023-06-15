@extends('rootPages.DashboardAdminApp')
@section('content')
    <!-- strat content -->
    <div class="bg-gray-100 flex-1 p-6 md:mt-16 first-letter w-[80%] overflow-scroll">

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-close mb-5">
                <button class="alert-btn-close">
                    <i class="fad fa-times"></i>
                </button>
                <span>{{ $message }}</span>
            </div>
        @endif
        <!-- strat Analytics -->
        <div class="mt-6 grid grid-cols- gap-6 xl:grid-cols-1">
            <!-- update section -->
            <div class="flex flex-col mt-8">
                <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                    <div class="pb-4 flex flex-row md:flex-col justify-between">
                        <form action="{{ route('adminAbsensi.searchDate') }}" class="px-8 flex sm:flex-col flex-row"
                            method="get">

                            <label for="table-search" class="sr-only">Search</label>
                            <div class="relative mt-1">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="flex md:flex-col gap-2">
                                    <input type="month" name="date" value="{{ request()->date }}""
                                        class="block p-2 pl-10 text-sm md:w-full text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                    <select name="nama_mahasiswa"
                                        class="block p-2 pl-10 text-sm md:w-full text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                        @foreach ($nama_mahasiswa as $key => $value)
                                            <option value="{{ $value->kerjapraktek->id }}" {{ app('request')->input('nama_mahasiswa') == $value->kerjapraktek->id ? 'selected': ''}}>
                                                {{ $value->kerjapraktek->user->nama_lengkap }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>

                            </div>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm sm:my-2 px-5 py-2 mr-2  md:p-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mx-8 my-auto">Cari
                            </button>
                            <button type="button"
                                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2 sm:my-2 mr-2 md:p-2  dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800 mx-8 my-auto">
                                <a href="{{ route('adminAbsensi') }}">
                                    Clear
                                </a>
                            </button>
                        </form>

                        <form action="{{ route('adminAbsensi.updateall') }}" class="px-8 sm:mx-auto my-0" method="post">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm  px-5 py-2 mr-2 mb-2 sm:px-8 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                Approve semua kehadiran
                            </button>
                        </form>
                    </div>

                    <div
                        class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                        <table class="min-w-full md:overflow-x-scroll overflow-visible">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Nama Mahasiswa</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Bidang Kerja</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Waktu</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Kehadiran</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Approve</th>

                                </tr>
                            </thead>

                            <tbody class="bg-white">
                                @foreach ($absensi as $key => $value)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 w-10 h-10">
                                                    <img class="w-10 h-10 rounded-full"
                                                        src="https://source.unsplash.com/user/erondu"
                                                        alt="admin dashboard ui">
                                                </div>

                                                <div class="ml-4">
                                                    <div class="text-sm font-medium leading-5 text-gray-900">
                                                        {{ $value->kerjapraktek->user->nama_lengkap }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-500">
                                                {{ $value->kerjapraktek->bidang_kerja }}
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-500"> {{ $value->waktu }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-500"> {{ $value->kehadiran }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-500">
                                                <form action="{{ route('adminAbsensi.update', $value->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <select name="approve" class="ms-4 form-control"
                                                        onchange="this.form.submit()">
                                                        <option>Belum Dicek</option>
                                                        <option @if (old('status', $value->status) == 'approved') selected @endif
                                                            value="approved">Approve</option>
                                                        <option @if (old('status', $value->status) == 'notapproved') selected @endif
                                                            value="notapproved">Tidak Approve</option>
                                                    </select>
                                                </form>


                                            </div>
                                        </td>


                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
                <!-- end update section -->
            </div>
            <!-- end Analytics -->
        </div>
        <!-- end content -->
        <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
            <div class="min-w-full">
                {{ $absensi->links() }}
            </div>
        </div>
    @endsection
