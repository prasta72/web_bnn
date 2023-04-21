  <!-- start sidebar -->
  <div id="sideBar"
  class="relative flex flex-col flex-wrap bg-white border-r border-gray-300 p-6 flex-none w-64 md:-ml-64 md:fixed md:top-0 md:z-30 md:h-screen md:shadow-xl animated faster">


  <!-- sidebar content -->
  <div class="flex flex-col">

      <!-- sidebar toggle -->
      <div class="text-right hidden md:block mb-4">
          <button id="sideBarHideBtn">
              <i class="fad fa-times-circle"></i>
          </button>
      </div>
      <!-- end sidebar toggle -->

      <p class="uppercase text-xs text-gray-600 mb-4 tracking-wider">homes</p>

      <!-- link -->
      <a href="{{ route('adminDashboard') }}"
          class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
          <i class="fad fa-chart-pie text-xs mr-2"></i>
          Home
      </a>
      <!-- end link -->

      <!-- link -->
      <a href="{{ route('adminPembina') }}"
          class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
          <i class="fa-solid fa-people-group"></i>
          Pembina
      </a>
      <!-- end link -->
      <!-- link -->
      <a href="{{ route('adminKerjaPraktek') }}"
          class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
          <i class="fad fa-box-open text-xs mr-2"></i>
          Kerja Praktek
      </a>
      <!-- end link -->
      <!-- link -->
      <a href="{{ route('adminAbsensi') }}"
          class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
          <i class="fad fa-calendar-edit text-xs mr-2"></i>
          Absensi
      </a>
      <!-- end link -->
      <!-- link -->
      <a href="{{ route('adminKegiatanKP') }}"
          class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
          <i class="fa-solid fa-calendar"></i>
          kegiatan KP
      </a>
      <!-- end link -->
      <!-- link -->
      <a href="{{ route('adminNilai') }}"
          class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
          <i class="fa-solid fa-pen"></i>
          Nilai
      </a>
      <!-- end link -->
  </div>
  <!-- end sidebar content -->

</div>
<!-- end sidbar -->