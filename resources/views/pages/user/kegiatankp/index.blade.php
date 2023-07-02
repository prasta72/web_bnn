@extends('rootPages.DashboardUserApp')
@section('content')
    <!-- strat content -->
    <div class="bg-gray-100 flex-1 p-6 md:mt-16 first-letter w-[80%] overflow-scroll">
        <p>Halaman Kegiatan Kerja Praktek</p>

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
                        <form action="{{ route('userKegiatanKP.searchDate') }}" class="px-8 flex sm:flex-col flex-row"
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

                                <input type="month" name="date" value="{{ request()->date }}""
                                    class="block p-2 pl-10 text-sm md:w-full text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">


                            </div>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm sm:my-2 px-5 py-2 mr-2  md:p-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mx-8 my-auto">Cari
                            </button>
                            <button type="button"
                                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2 sm:my-2 mr-2 md:p-2  dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800 mx-8 my-auto">
                                <a href="{{ route('userKegiatanKP') }}">
                                    Clear
                                </a>
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
                                        Tanggal</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Waktu</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Kegiatan</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Status</th>

                                </tr>
                            </thead>

                            <tbody class="bg-white">
                                @foreach ($kegiatan as $key => $value)
                                {{-- @if ($value->kegiatan->user != null) --}}
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="flex items-center">

                                            <div class="ml-4">
                                                <div class="text-sm font-medium leading-5 text-gray-900">
                                                    {{ date('d-m-Y', strtotime($value->waktu)); }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 text-gray-500">
                                            {{ Carbon\Carbon::parse($value->waktu)->format('H:i:s')  }}
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 max-w-xs">
                                        <div class="text-sm leading-5 text-gray-500 overflow-scroll "> {{ $value->kegiatan }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 text-gray-500">
                                            <form action="{{ route('userKegiatanKP.update', $value->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <select name="status" class="ms-4 form-control"
                                                    onchange="this.form.submit()">
                                                    <option>Belum Dicek</option>
                                                    <option @if (old('status', $value->status) == 'selesai') selected @endif
                                                        value="selesai">Selesai</option>
                                                    <option @if (old('status', $value->status) == 'belum selesai') selected @endif
                                                        value="belum selesai">Belum Selesai</option>
                                                </select>
                                            </form>
                                        </div>
                                    </td>



                                </tr>
                                    {{-- @else
                                    @endif --}}
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
                {{ $kegiatan->withQueryString()->links() }}
            </div>
        </div>
    @endsection
