@extends('rootPages.DashboardUserApp')
@section('content')
     <!-- strat content -->
     <div class="bg-gray-100 flex-1 p-6 md:mt-16">

        <!-- strat Analytics -->
        <div class="mt-6 grid grid-cols-2 gap-6 xl:grid-cols-1">

            <!-- update section -->
            <div class="card bg-teal-400 border-teal-400 shadow-md text-white">
                <div class="card-body flex flex-row">

                    <!-- info -->
                    <div class="py-2 ml-10">
                        <h1 class="h6">hello {{ Auth::user()->nama_lengkap }}</h1>
                        <p class="text-white text-xs">Berikut rangkuman nilai anda selama kerja praktek</p>
                    </div>
                    <!-- end info -->

                </div>
            </div>
            <!-- end update section -->
        </div>
        <!-- end Analytics -->
        <!-- General Report -->
        <div class="grid grid-cols-4 gap-6 my-5 xl:grid-cols-1">
@if ($nilai == null)
     <!-- update section -->
     <div class="card bg-teal-400 border-teal-400 shadow-md text-white">
        <div class="card-body flex flex-row">

            <!-- info -->
            <div class="py-2 ml-10">
                <h1 class="h6">Maaf Nilai Anda Belum Keluar</h1>
            </div>
            <!-- end info -->

        </div>
    </div>
    <!-- end update section -->
@else
     <!-- card -->
     <div class="report-card">
        <div class="card">
            <div class="card-body flex flex-col">

                <!-- top -->
                <div class="flex flex-row justify-between items-center">
                    <div class="h6 text-green-700 fad fa-users"></div>
                </div>
                <!-- end top -->

                <!-- bottom -->
                <div class="mt-8">
                    <h1 class="h5 ">{{ $kerjapraktek->pembina->bidang_kerja}}</h1>
                    <p>Bidang Kerja</p>
                </div>
                <!-- end bottom -->

            </div>
        </div>
        <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
    </div>
     <!-- card -->
     <div class="report-card">
        <div class="card">
            <div class="card-body flex flex-col">

                <!-- top -->
                <div class="flex flex-row justify-between items-center">
                    <div class="h6 text-green-700 fad fa-users"></div>
                </div>
                <!-- end top -->

                <!-- bottom -->
                <div class="mt-8">
                    <h1 class="h5 ">{{ $nilai->nilai}}</h1>
                    <p>Nilai</p>
                </div>
                <!-- end bottom -->

            </div>
        </div>
        <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
    </div>
    <div class="report-card">
        <div class="card">
            <div class="card-body flex flex-col">

                <!-- top -->
                <div class="flex flex-row justify-between items-center">
                    <div class="h6 text-green-700 fad fa-users"></div>
                </div>
                <!-- end top -->

                <!-- bottom -->
                <div class="mt-8">
                    <h1 class="h5 ">{{ $nilai->keterangan }}</h1>
                    <p>Keterangan</p>
                </div>
                <!-- end bottom -->

            </div>
        </div>
        <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
    </div>
    <!-- end card -->
    <!-- card -->
    <div class="report-card">
        <div class="card">
            <div class="card-body flex flex-col">

                <!-- top -->
                <div class="flex flex-row justify-between items-center">
                    <div class="h6 text-blue-700 fad fa-users"></div>
                </div>
                <!-- end top -->

                <!-- bottom -->
                <div class="mt-8">
                    <h1 class="h5 ">{{ $nilai->admin->nama }}</h1>
                    <p>Nama Pembina</p>
                </div>
                <!-- end bottom -->

            </div>
        </div>
        <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
    </div>
    <!-- end card -->
    <!-- card -->
    <div class="report-card">
        <div class="card">
            <div class="card-body flex flex-col">

                <!-- top -->
                <div class="flex flex-row justify-between items-center">
                    <div class="h6 text-blue-700 fad fa-users"></div>
                </div>
                <!-- end top -->

                <!-- bottom -->
                <div class="mt-8">
                    <h1 class="h5 ">{{ $kerjapraktek->mulai_kerja_praktek }}</h1>
                    <p>Mulai Kerja Praktek</p>
                </div>
                <!-- end bottom -->

            </div>
        </div>
        <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
    </div>
    <!-- end card -->
    <!-- card -->
    <div class="report-card">
        <div class="card">
            <div class="card-body flex flex-col">

                <!-- top -->
                <div class="flex flex-row justify-between items-center">
                    <div class="h6 text-blue-700 fad fa-users"></div>
                </div>
                <!-- end top -->

                <!-- bottom -->
                <div class="mt-8">
                    <h1 class="h5 ">{{ $kerjapraktek->selesai_kerja_praktek}}</h1>
                    <p>Selesai Kerja Praktek</p>
                </div>
                <!-- end bottom -->

            </div>
        </div>
        <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
    </div>
    <!-- end card -->
@endif
           


        </div>
        <!-- End General Report -->
    </div>
    <!-- end content -->
@endsection
