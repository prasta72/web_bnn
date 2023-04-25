@extends('rootPages.DashboardAdminApp')
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
                        <h1 class="h6">hello {{ Auth::user()->nama }}</h1>
                        <p class="text-white text-xs">Welcome to Admin Dashboard Kantor BNN Provinsi Bali</p>
                    </div>
                    <!-- end info -->
 
                </div>
            </div>
            <!-- end update section -->
        </div>
        <!-- end Analytics -->
        <!-- General Report -->
        <div class="grid grid-cols-4 gap-6 my-5 xl:grid-cols-1">

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
                            <h1 class="h5 ">{{ $countUser }}</h1>
                            <p>User</p>
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
                            <h1 class="h5 ">{{ $countAdmin }}</h1>
                            <p>Admin</p>
                        </div>
                        <!-- end bottom -->

                    </div>
                </div>
                <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
            </div>
            <!-- end card -->


        </div>
        <!-- End General Report -->
    </div>
    <!-- end content -->
@endsection
