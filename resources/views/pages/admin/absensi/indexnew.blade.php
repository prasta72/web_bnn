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
                    {{-- <div class="pb-4 flex flex-row md:flex-col justify-between">
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
                                    <input type="month" name="date" value="{{ request()->date }}"
                                        class="block p-2 pl-10 text-sm md:w-full text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                    <select name="nama_mahasiswa"
                                        class="block p-2 pl-10 text-sm md:w-full text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="">Pilih Nama Mahasiswa</option>
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
                    </div> --}}
                    <div
                        class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                        <div>
                            <h1 class="flex text-3xl font-semibold">Daftar Absensi</h1>
                        </div>
                        <div class="flex gap-2 flex-wrap p-4" style="">
                           @foreach ($absensi as $absen) 
                           <a style="width: 20rem; height: 7rem" class="rounded shadow p-4 hover:bg-blue-500 hover:text-white " href="{{route('adminAbsensi.Detail', ['id' => $absen->kerjapraktek_id])}}">
                                <div class=" ">
                                    <div class="text-sm font-semibold text-center">{{\App\Models\User::where('id', $absen->kerjapraktek_id)->first()->nama_lengkap}}</div>
                                    <div class="text-sm text-center">Total Kehadiran</div>
                                    <div class="text-sm text-center">{{$absen->total_absensi}}</div>
                                </div>
                            </a>
                           @endforeach
                            <a style="width: 20rem; height: 7rem" class=" sm:w-full rounded shadow p-4 hover:bg-blue-500 hover:text-white flex justify-center items-center" href="{{route('adminAbsensi.all')}}">
                                <div class="font-semibold">
                                    Semua Mahasiswa
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end update section -->
            </div>
            <!-- end Analytics -->
        </div>
        <!-- end content -->
        <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
            <div class="min-w-full">
                {{ $absensi->withQueryString()->links() }}
            </div>
        </div>
        <script>
            function loadNextPage(url) {
              $.ajax({
                url: url,
                type: 'GET',
                success: function(data) {
                  $('#content-container').html(data);
                }
              });
            }
            </script>
    @endsection
