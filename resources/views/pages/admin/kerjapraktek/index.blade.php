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
                    <form action="{{ route('adminKerjaPraktekCari') }}" class="px-8" method="GET">
                        <div class="pb-4 flex flex-row md:flex-col justify-between">
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
                                <input type="text" id="table-search" name="keyword" value="{{ request()->keyword }}"
                                    class="block p-2 pl-10 text-sm md:w-full text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Search for items">
                            </div>
                        </div>
                    </form>

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
                                        Pembina</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Instansi</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Mulai Kerja Praktek</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Selesai Kerja Praktek</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Bidang Kerja</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Status</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Alamat</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Show</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Edit</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Delete</th>
                                </tr>
                            </thead>

                            <tbody class="bg-white">
                                @foreach ($kerjapraktek as $key => $value)
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
                                                        {{ isset($value->user['nama_lengkap']) ?? $value->user['nama_lengkap'] }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-500"> {{ isset($value->pembina['nama_pembina']) ?? $value->pembina['nama_pembina'] }}
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-500"> {{ $value->instansi }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-500"> {{ $value->mulai_kerja_praktek }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-500">
                                                {{ $value->selesai_kerja_praktek }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-500"> {{ $value->bidang_kerja}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-500"> {{ $value->status }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-500"> {{ $value->alamat }}
                                            </div>
                                        </td>


                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                            <a href="{{ route('adminKerjaPraktek.show',$value->id) }}">
                                                <svg class="w-6 h-6 text-blue-400" fill="#FFC83D" version="1.1"
                                                    viewBox="0 0 442.04 442.04" xml:space="preserve"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="m221.02 341.3c-49.708 0-103.21-19.44-154.71-56.22-38.502-27.494-62.266-54.733-63.259-55.881-4.068-4.697-4.068-11.669 0-16.367 0.993-1.146 24.756-28.387 63.259-55.881 51.505-36.777 105-56.219 154.71-56.219 49.708 0 103.21 19.441 154.71 56.219 38.502 27.494 62.266 54.734 63.259 55.881 4.068 4.697 4.068 11.669 0 16.367-0.993 1.146-24.756 28.387-63.259 55.881-51.503 36.779-105 56.22-154.71 56.22zm-191.38-120.28c9.61 9.799 27.747 27.03 51.694 44.071 32.83 23.361 83.714 51.212 139.69 51.212s106.86-27.851 139.69-51.212c23.944-17.038 42.082-34.271 51.694-44.071-9.609-9.799-27.747-27.03-51.694-44.071-32.829-23.362-83.714-51.212-139.69-51.212s-106.86 27.85-139.69 51.212c-23.944 17.038-42.082 34.269-51.694 44.071z" />
                                                    <path
                                                        d="m221.02 298.52c-42.734 0-77.5-34.767-77.5-77.5s34.766-77.5 77.5-77.5c18.794 0 36.924 6.814 51.048 19.188 5.193 4.549 5.715 12.446 1.166 17.639s-12.447 5.714-17.639 1.166c-9.564-8.379-21.844-12.993-34.576-12.993-28.949 0-52.5 23.552-52.5 52.5s23.551 52.5 52.5 52.5c28.95 0 52.5-23.552 52.5-52.5 0-6.903 5.597-12.5 12.5-12.5s12.5 5.597 12.5 12.5c2e-3 42.733-34.765 77.5-77.499 77.5z" />
                                                    <path
                                                        d="m221.02 246.02c-13.785 0-25-11.215-25-25s11.215-25 25-25c13.786 0 25 11.215 25 25s-11.214 25-25 25z" />
                                                </svg>
                                            </a>
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                            <a href="{{ route('adminKerjaPraktek.edit', $value->id) }}">
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
                                                action="{{ route('adminKerjaPraktek.destroy', ["user_id" => $value->user_id, "id"=>$value->id]) }}" method="POST">
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

                    </div>
                </div>
                <!-- end update section -->
            </div>
            <!-- end Analytics -->
        </div>
        <!-- end content -->
        <div
                            class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                            <div class="min-w-full">
                                {{ $kerjapraktek->links() }}
                            </div>
                        </div>
    @endsection
