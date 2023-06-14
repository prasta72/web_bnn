@extends('rootPages.DashboardAdminApp')
@section('content')
    <!-- strat content -->
    <div class="bg-gray-100 flex-1 p-6 md:mt-16  w-[80%] overflow-scroll">

        <!-- strat Analytics -->
        <div class="mt-6 grid grid-cols- gap-6 xl:grid-cols-1">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-close mb-5">
                    <button class="alert-btn-close">
                        <i class="fad fa-times"></i>
                    </button>
                    <span>{{ $message }}</span>
                </div>
            @endif
            <!-- update section -->
            <div class="flex flex-col mt-8">
                <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                    <div class="pb-4 flex flex-row md:flex-col justify-between">
                    <form action="{{ route('adminKegiatanKPCari') }}" class="px-8" method="GET">
                        <div class="pb-4 flex flex-row md:flex-col ">
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
                                <input type="month" name="date" value="{{ request()->date }}""
                                    class="block p-2 pl-10 text-sm md:w-full text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                            </div>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm sm:my-2 px-5 py-2 mr-2  md:p-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mx-8 my-auto">Cari
                            </button>
                            <button type="button"
                                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2 sm:my-2 mr-2 md:p-2  dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800 mx-8 my-auto">
                                <a href="{{ route('adminKegiatanKP') }}">
                                    Clear
                                </a>
                            </button>
                        </div>
                    </form>
                    <a href="{{ route('adminKegiatanKP.create') }}">
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm  px-5 py-2 mr-2 mb-2 sm:px-8 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Tambah Kegiatan
                        </button>
                    </a>
                    </div>
                    <div
                        class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                        <table class="min-w-full md:overflow-x-scroll overflow-visible">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Name</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Kegiatan</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Bidang Kerja </th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Waktu</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Edit</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Delete</th>
                                </tr>
                            </thead>

                            <tbody class="bg-white">
                                @foreach ($kegiatankp as $key => $value)
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
                                                        {{ $value->user->nama_lengkap }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-500"> {{ \Illuminate\Support\Str::limit($value->kegiatan, 60, $end='...')}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-500"> {{ $value->bidang_kerja }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-500"> {{ $value->waktu }}
                                            </div>
                                        </td>

                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                            <a href="{{ route('adminKegiatanKP.edit', $value->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('adminKegiatanKP.destroy', $value->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div
                            class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                            <div class="min-w-full">
                                {{ $kegiatankp->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end update section -->
            </div>
            <!-- end Analytics -->
        </div>
        <!-- end content -->
    @endsection
