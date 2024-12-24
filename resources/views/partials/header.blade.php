<div
    class="p-4 bg-white max-w-full sm:ml-64 block sm:flex items-center justify-between border-b border-gray-200 mt-16 dark:bg-gray-800 dark:border-gray-700">
    <div class="w-full mb-1">
        <div class="mb-4">
            <nav class="flex mb-5" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                    <li class="inline-flex items-center">
                        <span
                            class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                            <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                </path>
                            </svg>
                            @if (request()->is(
                                    'talent',
                                    'staff',
                                    'intern',
                                    'brand',
                                    'agency',
                                    'edit-profile',
                                    'users-list',
                                    'kinerja-intern',
                                    'kinerja-staff',
                                    'position',
                                    'categories',
                                    'scope',
                                    'project'))
                                Administrator
                            @elseif (request()->is('earnings', 'spendings'))
                                Keuangan
                            @endif
                        </span>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            @if (request()->is('talent', 'staff', 'intern', 'brand', 'agency', 'categories', 'position', 'scope', 'project'))
                                <span
                                    class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">Data</span>
                            @elseif (request()->is('edit-profile', 'users-list'))
                                <span
                                    class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">Profile</span>
                            @elseif (request()->is('earnings', 'spendings'))
                                <span
                                    class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">Pengelolaan</span>
                            @elseif (request()->is('kinerja-intern', 'kinerja-staff'))
                                <span
                                    class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">Kinerja</span>
                            @endif
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500"
                                aria-current="page">{{ $title }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class="flex justify-between items-center">
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                    @if (!request()->is('edit-profile'))
                        Semua
                    @endif
                    {{ $title }}
                </h1>
                @if (!request()->is('edit-profile'))
                    <form id="searchFormTop" action="/{{ $search }}" method="GET">
                        <div class="relative sm:hidden mt-1">
                            <input type="search" name="search" id="searchTop"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Cari {{ $title }}" value="{{ request('search') }}">
                        </div>
                    </form>
                @endif
            </div>
        </div>
        @if (!request()->is('edit-profile'))
            <div class="sm:flex">
                <div
                    class="items-center hidden mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0 dark:divide-gray-700">
                    <form id="searchFormBottom" class="lg:pr-3 flex items-center" method="GET"
                        action="/{{ $search }}">
                        @if (request('intern'))
                            <input type="hidden" name="intern" value="{{ request('intern') }}">
                        @endif
                        @if (request('employee'))
                            <input type="hidden" name="employee" value="{{ request('employee') }}">
                        @endif
                        @if (request('talent'))
                            <input type="hidden" name="talent" value="{{ request('talent') }}">
                        @endif
                        <div class="relative mt-1 lg:w-52 xl:w-64">
                            <input type="search" name="search" id="searchBottom"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Cari {{ $title }}" value="{{ request('search') }}">
                        </div>
                        @if (request()->is('talent', 'staff', 'intern'))
                            <div class="relative mt-1 pl-3">
                                <select id="bulan" name="bulan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    aria-placeholder="Pilih Bulan">
                                    <option value="">Pilih Bulan</option>
                                    @foreach (range(1, 12) as $month)
                                        <option value="{{ $month }}"
                                            {{ request('bulan') == $month ? 'selected' : '' }}>
                                            {{ date('F', mktime(0, 0, 0, $month, 10)) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                        @if (isset($positions) && count($positions) > 0)
                            <div class="pl-3 mt-1">
                                <select name="position" id="position"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="">Pilih Posisi</option>
                                    @foreach ($positions as $position)
                                        <option value="{{ $position->name }}"
                                            {{ request('position') === $position->name ? 'selected' : '' }}>
                                            {{ $position->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                        @if (isset($categories) && count($categories) > 0)
                            <div class="pl-3 mt-1">
                                <select name="category" id="category"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->name }}"
                                            {{ request('category') === $category->name ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                        @if (request()->is('earnings', 'spendings', 'kinerja-intern', 'kinerja-staff'))
                            <div class="relative mt-1 pl-3">
                                <select id="bulan" name="bulan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    aria-placeholder="Pilih Bulan">
                                    <option value="">Pilih Bulan</option>
                                    @foreach (range(1, 12) as $month)
                                        <option value="{{ $month }}"
                                            {{ request('bulan') == $month ? 'selected' : '' }}>
                                            {{ date('F', mktime(0, 0, 0, $month, 10)) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="relative mt-1 pl-3">
                                <select id="tahun" name="tahun"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    aria-placeholder="Pilih Tahun">
                                    <option value="">Pilih Tahun</option>
                                    @php
                                        $currentYear = date('Y');
                                        $startYear = $currentYear - 4; // 5 years range, including current year
                                    @endphp
                                    @foreach (range($startYear, $currentYear) as $year)
                                        <option value="{{ $year }}"
                                            {{ request('tahun') == $year ? 'selected' : '' }}>{{ $year }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                        @if (request()->is('earnings'))
                            <div class="relative mt-1 pl-3">
                                <select id="talent" name="talent"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    aria-placeholder="Pilih Talent">
                                    <option value="">Pilih Talent</option>
                                    @foreach ($talents as $talent)
                                        <option value="{{ $talent->id }}"
                                            {{ request('talent') == $talent->id ? 'selected' : '' }}>
                                            {{ $talent->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="relative mt-1 pl-3">
                                <select id="tipe" name="tipe"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    aria-placeholder="Pilih Tipe">
                                    <option value="">Pilih Tipe</option>
                                    <option value="Brand" {{ request('tipe') == 'Brand' ? 'selected' : '' }}>Brand
                                    </option>
                                    <option value="Agency" {{ request('tipe') == 'Agency' ? 'selected' : '' }}>Agency
                                    </option>
                                </select>
                            </div>
                        @endif
                        @if (request()->is('talent'))
                            <div class="relative mt-1 pl-3">
                                <select id="mcn" name="mcn"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    aria-placeholder="Pilih MCN">
                                    <option value="">Pilih MCN</option>
                                    <option value="1" {{ request('mcn') == '1' ? 'selected' : '' }}>Ya</option>
                                    <option value="0" {{ request('mcn') == '0' ? 'selected' : '' }}>Tidak
                                    </option>
                                </select>
                            </div>
                            <div class="relative mt-1 pl-3">
                                <select id="staff" name="staff"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    aria-placeholder="Pilih PIC">
                                    <option value="">Pilih PIC</option>
                                    @foreach ($staffs as $pic)
                                        <option value="{{ $pic->id }}"
                                            {{ request('staff') == $pic->id ? 'selected' : '' }}>{{ $pic->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                        @if (request()->is('earnings', 'spendings'))
                            <div class="relative mt-1 pl-3">
                                <select id="status" name="status"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    aria-placeholder="Pilih Status">
                                    <option value="">Pilih Status</option>
                                    <option value="proses" {{ request('status') == 'proses' ? 'selected' : '' }}>
                                        Proses</option>
                                    <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>
                                        Selesai</option>
                                    <option value="gagal" {{ request('status') == 'gagal' ? 'selected' : '' }}>Gagal
                                    </option>
                                </select>
                            </div>
                        @endif
                        @if (request()->is('staff', 'intern'))
                            <div class="relative mt-1 pl-3">
                                <select id="status" name="status"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    aria-placeholder="Pilih Status">
                                    <option value="">Pilih Status</option>
                                    <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Aktif
                                    </option>
                                    <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Tidak
                                        Aktif</option>
                                </select>
                            </div>
                        @endif
                    </form>
                    {{-- <form class="lg:pr-3">
                    <div class="relative mt-1">
                        <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" aria-placeholder="Pilih Bulan">
                            <option disabled selected>Pilih Bulan</option>
                            <option value="1" selected>Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="4">Mei</option>
                            <option value="4">Juni</option>
                            <option value="4">Juli</option>
                            <option value="4">Agustus</option>
                            <option value="4">September</option>
                            <option value="4">Oktober</option>
                            <option value="4">November</option>
                            <option value="4">Desember</option>
                        </select>
                    </div>
                </form> --}}
                    {{-- <form class="lg:pr-3">
                    <div class="relative mt-1">
                        <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" aria-placeholder="Pilih Bulan">
                            <option disabled selected>Pilih Tahun</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                        </select>
                    </div>
                </form> --}}
                    {{-- @if (isset($positions) && count($positions) > 0)
                <div class="pl-3 mt-1">
                    <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction" class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" type="button">
                        <span class="sr-only">Action button</span>
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M10.8 5a3 3 0 0 0-5.6 0H4a1 1 0 1 0 0 2h1.2a3 3 0 0 0 5.6 0H20a1 1 0 1 0 0-2h-9.2ZM4 11h9.2a3 3 0 0 1 5.6 0H20a1 1 0 1 1 0 2h-1.2a3 3 0 0 1-5.6 0H4a1 1 0 1 1 0-2Zm1.2 6H4a1 1 0 1 0 0 2h1.2a3 3 0 0 0 5.6 0H20a1 1 0 1 0 0-2h-9.2a3 3 0 0 0-5.6 0Z"/>
                        </svg> 
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownAction" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownActionButton">
                            @foreach ($positions as $position)
                                <li>
                                    <a href="/{{ $search }}?position={{ $position->name }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $position->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif --}}
                    {{-- @if (isset($categories) && count($categories) > 0)
                <div class="pl-3 mt-1">
                    <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction" class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" type="button">
                        <span class="sr-only">Action button</span>
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M10.8 5a3 3 0 0 0-5.6 0H4a1 1 0 1 0 0 2h1.2a3 3 0 0 0 5.6 0H20a1 1 0 1 0 0-2h-9.2ZM4 11h9.2a3 3 0 0 1 5.6 0H20a1 1 0 1 1 0 2h-1.2a3 3 0 0 1-5.6 0H4a1 1 0 1 1 0-2Zm1.2 6H4a1 1 0 1 0 0 2h1.2a3 3 0 0 0 5.6 0H20a1 1 0 1 0 0-2h-9.2a3 3 0 0 0-5.6 0Z"/>
                        </svg> 
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownAction" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownActionButton">
                            @foreach ($categories as $category)
                                <li>
                                    <a href="/{{ $search }}?category={{ $category->name }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif --}}
                    @can('delete data')
                        <div class="flex pl-0 mt-3 space-x-1 sm:pl-2 sm:mt-0">
                            <a href="#" id="deleteAllSelectorRecord"
                                class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    @endcan
                </div>

                <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                    @if (!request()->is('talent'))
                        <button type="button" data-modal-target="add-user-modal" data-modal-toggle="add-user-modal"
                            class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 sm:w-auto dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Tambah
                        </button>
                    @endif



                    {{-- ---------------------------------------------
                    TOMBOL TAMBAH DATA TALENT
                    -----------------------------------------------
                    Tombol hanya muncul ketika user membuka page
                    atau endpoint '/talent' 
                ----------------------------------------------- --}}
                    @if (request()->is('talent'))
                        <a href="{{ route('registrasi-talent') }}" data-modal-target="add-user-modal"
                            data-modal-toggle="add-user-modal"
                            class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 sm:w-auto dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Tambah
                        </a>
                    @endif

                    @can('import data')
                        @if (
                            !request()->is(
                                'users-list',
                                'kinerja-intern',
                                'kinerja-staff',
                                'earnings',
                                'spendings',
                                'position',
                                'categories',
                                'scope',
                                'project'))
                            <button data-modal-target="import-modal" data-modal-toggle="import-modal"
                                class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-blue-300 sm:w-auto dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700"
                                type="button">
                                <svg class="w-5 h-5 mr-2 -ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M9 7V2.2a2 2 0 0 0-.5.4l-4 3.9a2 2 0 0 0-.3.5H9Zm2 0V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-5h7.6l-.3.3a1 1 0 0 0 1.4 1.4l2-2c.4-.4.4-1 0-1.4l-2-2a1 1 0 0 0-1.4 1.4l.3.3H4V9h5a2 2 0 0 0 2-2Z"
                                        clip-rule="evenodd" />
                                </svg>
                                Import
                            </button>
                        @endif
                    @endcan
                    @can('export data')
                        <a href="/{{ $export }}"
                            class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-blue-300 sm:w-auto dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700"
                            target="_blank">
                            <svg class="w-5 h-5 mr-2 -ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M9 7V2.2a2 2 0 0 0-.5.4l-4 3.9a2 2 0 0 0-.3.5H9Zm2 0V2h7a2 2 0 0 1 2 2v9.3l-2-2a1 1 0 0 0-1.4 1.4l.3.3h-6.6a1 1 0 1 0 0 2h6.6l-.3.3a1 1 0 0 0 1.4 1.4l2-2V20a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z"
                                    clip-rule="evenodd" />
                            </svg>
                            Export
                        </a>
                    @endcan
                </div>
            </div>
        @endif
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        function submitForm(formId) {
            var form = document.getElementById(formId);
            clearTimeout(form.dataset.timeoutId); // Clear the existing timeout, if any
            form.dataset.timeoutId = setTimeout(function() { // Set a new timeout
                form.submit();
            }, 0); // Delay in milliseconds before the form is submitted
        }

        // Function to handle changes and input for both forms
        function setupFormListeners(formId, inputId) {
            var selectElements = document.querySelectorAll(`#${formId} select`);
            selectElements.forEach(function(elem) {
                elem.addEventListener('change', function() {
                    submitForm(formId);
                });
            });

            var searchInput = document.getElementById(inputId);
            searchInput.addEventListener('input', function() {
                clearTimeout(searchInput.dataset.timeoutId); // Clear the existing timeout
                searchInput.dataset.timeoutId = setTimeout(function() {
                    submitForm(formId);
                }, 500); // Set a new timeout
            });
        }

        // Setup listeners for both forms
        setupFormListeners('searchFormTop', 'searchTop');
        setupFormListeners('searchFormBottom', 'searchBottom');
    });
</script>
