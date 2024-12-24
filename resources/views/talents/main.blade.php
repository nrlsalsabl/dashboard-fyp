@extends('layouts.main')

@section('container')

@if (session()->has('success') || request()->has('delete_success'))
    <div class="flex sm:ml-72 sm:mr-8 mt-4 mitems-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div>
        <span class="font-medium">{{ session('success', 'Data berhasil dihapus') }}
        </div>
    </div>
@endif

{{-- Untuk bulk delete --}}
<div id="error-alert"></div>

<div class="flex flex-col sm:ml-64 ">
    <div class="overflow-x-auto">
        <div class="inline-block min-w-full align-middle">
            <div class="overflow-hidden shadow">
                <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    <input id="select_all_ids" aria-describedby="checkbox-1" type="checkbox" class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all" class="sr-only">checkbox</label>
                                </div>
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                <a class="flex justify-between" href="{{ route('talent.index', ['sort' => 'name', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    Nama
                                    @if (request('sort') == 'name')
                                        @if (request('direction') == 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                <a class="flex justify-between" href="{{ route('talent.index', ['sort' => 'phone', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    Nomor HP
                                    @if (request('sort') == 'phone')
                                        @if (request('direction') == 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                <a class="flex justify-between" href="{{ route('talent.index', ['sort' => 'date', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    Tempat, Tanggal Lahir
                                    @if (request('sort') == 'date')
                                        @if (request('direction') == 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                <a class="flex justify-between" href="{{ route('talent.index', ['sort' => 'village_id', 'direction' => request('sort') == 'village_id' && request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    Domisili
                                    @if (request('sort') == 'village_id')
                                        @if (request('direction') == 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                <a class="flex justify-between" href="{{ route('talent.index', ['sort' => 'category', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    Kategori
                                    @if (request('sort') == 'category')
                                        @if (request('direction') == 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                <a class="flex justify-between" href="{{ route('talent.index', ['sort' => 'engagement', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    Engagement Rate
                                    @if (request('sort') == 'engagement')
                                        @if (request('direction') == 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                Social Media
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                <a class="flex justify-between" href="{{ route('talent.index', ['sort' => 'finstagram', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    Instagram Followers
                                    @if (request('sort') == 'finstagram')
                                        @if (request('direction') == 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                <a class="flex justify-between" href="{{ route('talent.index', ['sort' => 'rate_igs', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    Rate Instagram Story
                                    @if (request('sort') == 'rate_igs')
                                        @if (request('direction') == 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                <a class="flex justify-between" href="{{ route('talent.index', ['sort' => 'rate_igf', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    Rate Instagram Feed
                                    @if (request('sort') == 'rate_igf')
                                        @if (request('direction') == 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                <a class="flex justify-between" href="{{ route('talent.index', ['sort' => 'rate_igr', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    Rate Instagram Reels
                                    @if (request('sort') == 'rate_igr')
                                        @if (request('direction') == 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                <a class="flex justify-between" href="{{ route('talent.index', ['sort' => 'rate_igl', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    Rate Instagram Live
                                    @if (request('sort') == 'rate_igl')
                                        @if (request('direction') == 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                <a class="flex justify-between" href="{{ route('talent.index', ['sort' => 'ftiktok', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    Tiktok Followers
                                    @if (request('sort') == 'ftiktok')
                                        @if (request('direction') == 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                <a class="flex justify-between" href="{{ route('talent.index', ['sort' => 'rate_ttf', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    Rate Tiktok Feed
                                    @if (request('sort') == 'rate_ttf')
                                        @if (request('direction') == 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                <a class="flex justify-between" href="{{ route('talent.index', ['sort' => 'rate_ttl', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    Rate Tiktok Live
                                    @if (request('sort') == 'rate_ttl')
                                        @if (request('direction') == 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                <a class="flex justify-between" href="{{ route('talent.index', ['sort' => 'syoutube', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    Youtube Subscribers
                                    @if (request('sort') == 'syoutube')
                                        @if (request('direction') == 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                <a class="flex justify-between" href="{{ route('talent.index', ['sort' => 'rate_yt', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    Rate Youtube
                                    @if (request('sort') == 'rate_yt')
                                        @if (request('direction') == 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                <a class="flex justify-between" href="{{ route('talent.index', ['sort' => 'rate_event', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    Rate Event Attendance
                                    @if (request('sort') == 'rate_event')
                                        @if (request('direction') == 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                <a class="flex justify-between" href="{{ route('talent.index', ['sort' => 'talent_exclusive', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    Talent Exclusive
                                    @if (request('sort') == 'talent_exclusive')
                                        @if (request('direction') == 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                <a class="flex justify-between" href="{{ route('talent.index', ['sort' => 'staff_id', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    PIC
                                    @if (request('sort') == 'staff_id')
                                        @if (request('direction') == 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                <a class="flex justify-between" href="{{ route('talent.index', ['sort' => 'account_name', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    Nama Penerima Rekening
                                    @if (request('sort') == 'account_name')
                                        @if (request('direction') == 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                <a class="flex justify-between" href="{{ route('talent.index', ['sort' => 'account_number', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    No Rekening
                                    @if (request('sort') == 'account_number')
                                        @if (request('direction') == 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                <a class="flex justify-between" href="{{ route('talent.index', ['sort' => 'bank_name', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    Nama Bank
                                    @if (request('sort') == 'bank_name')
                                        @if (request('direction') == 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                <a class="flex justify-between" href="{{ route('talent.index', ['sort' => 'npwp', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    NPWP
                                    @if (request('sort') == 'npwp')
                                        @if (request('direction') == 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                <a class="flex justify-between" href="{{ route('talent.index', ['sort' => 'nik', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    NIK
                                    @if (request('sort') == 'nik')
                                        @if (request('direction') == 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                <a class="flex justify-between" href="{{ route('talent.index', ['sort' => 'shopee_affiliate', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    Shopee Affiliate
                                    @if (request('sort') == 'shopee_affiliate')
                                        @if (request('direction') == 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                <a class="flex justify-between" href="{{ route('talent.index', ['sort' => 'tiktok_affiliate', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    Personal Branding
                                    @if (request('sort') == 'tiktok_affiliate')
                                        @if (request('direction') == 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                <a class="flex justify-between" href="{{ route('talent.index', ['sort' => 'mcn_tiktok', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    MCN Tiktok
                                    @if (request('sort') == 'mcn_tiktok')
                                        @if (request('direction') == 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                <a class="flex justify-between" href="{{ route('talent.index', ['sort' => 'status', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    Status
                                    @if (request('sort') == 'status')
                                        @if (request('direction') == 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                Aksi
                            </th>
                        </tr>
                    </thead>                    
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                        @foreach ($tables as $talent)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input id="" name="ids" aria-describedby="checkbox-1" type="checkbox" class="checkbox_ids w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600" value="{{ $talent->id }}">
                                        <label for="checkbox" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <td class="flex items-center p-4 mr-12 space-x-6 whitespace-nowrap">
                                    <img class="w-10 h-10 rounded-full" src="{{ asset('storage/' . $talent->photo) }}" alt="{{ $talent->name }}">
                                    <div class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                        <div class="text-base font-semibold text-gray-900 dark:text-white">{{ $talent->name }}</div>
                                        <div class="text-sm font-normal text-gray-500 dark:text-gray-400">{{ $talent->email }}</div>
                                    </div>
                                </td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $talent->phone }}</td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $talent->place }}, {{ \Carbon\Carbon::parse($talent->date)->format('d F Y') }}</td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $talent->village?->province?->name }}</td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    @foreach ($talent->categories as $index => $category)
                                        @if ($index > 0)
                                            ,
                                        @endif
                                        {{ $category->name }}
                                    @endforeach
                                </td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $talent->engagement }}</td>
                                <td class="flex items-center gap-2 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="">
                                        <a href="https://www.instagram.com/{{ $talent->instagram }}" class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 50 50">
                                                <path d="M 16 3 C 8.8324839 3 3 8.8324839 3 16 L 3 34 C 3 41.167516 8.8324839 47 16 47 L 34 47 C 41.167516 47 47 41.167516 47 34 L 47 16 C 47 8.8324839 41.167516 3 34 3 L 16 3 z M 16 5 L 34 5 C 40.086484 5 45 9.9135161 45 16 L 45 34 C 45 40.086484 40.086484 45 34 45 L 16 45 C 9.9135161 45 5 40.086484 5 34 L 5 16 C 5 9.9135161 9.9135161 5 16 5 z M 37 11 A 2 2 0 0 0 35 13 A 2 2 0 0 0 37 15 A 2 2 0 0 0 39 13 A 2 2 0 0 0 37 11 z M 25 14 C 18.936712 14 14 18.936712 14 25 C 14 31.063288 18.936712 36 25 36 C 31.063288 36 36 31.063288 36 25 C 36 18.936712 31.063288 14 25 14 z M 25 16 C 29.982407 16 34 20.017593 34 25 C 34 29.982407 29.982407 34 25 34 C 20.017593 34 16 29.982407 16 25 C 16 20.017593 20.017593 16 25 16 z"></path>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="">
                                        <a href="https://www.tiktok.com/@<?= $talent->tiktok ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 50 50">
                                                <path d="M 9 4 C 6.2495759 4 4 6.2495759 4 9 L 4 41 C 4 43.750424 6.2495759 46 9 46 L 41 46 C 43.750424 46 46 43.750424 46 41 L 46 9 C 46 6.2495759 43.750424 4 41 4 L 9 4 z M 9 6 L 41 6 C 42.671576 6 44 7.3284241 44 9 L 44 41 C 44 42.671576 42.671576 44 41 44 L 9 44 C 7.3284241 44 6 42.671576 6 41 L 6 9 C 6 7.3284241 7.3284241 6 9 6 z M 26.042969 10 A 1.0001 1.0001 0 0 0 25.042969 10.998047 C 25.042969 10.998047 25.031984 15.873262 25.021484 20.759766 C 25.016184 23.203017 25.009799 25.64879 25.005859 27.490234 C 25.001922 29.331679 25 30.496833 25 30.59375 C 25 32.409009 23.351421 33.892578 21.472656 33.892578 C 19.608867 33.892578 18.121094 32.402853 18.121094 30.539062 C 18.121094 28.675273 19.608867 27.1875 21.472656 27.1875 C 21.535796 27.1875 21.663054 27.208245 21.880859 27.234375 A 1.0001 1.0001 0 0 0 23 26.240234 L 23 22.039062 A 1.0001 1.0001 0 0 0 22.0625 21.041016 C 21.906673 21.031216 21.710581 21.011719 21.472656 21.011719 C 16.223131 21.011719 11.945313 25.289537 11.945312 30.539062 C 11.945312 35.788589 16.223131 40.066406 21.472656 40.066406 C 26.72204 40.066409 31 35.788588 31 30.539062 L 31 21.490234 C 32.454611 22.653646 34.267517 23.390625 36.269531 23.390625 C 36.542588 23.390625 36.802305 23.374442 37.050781 23.351562 A 1.0001 1.0001 0 0 0 37.958984 22.355469 L 37.958984 17.685547 A 1.0001 1.0001 0 0 0 37.03125 16.6875 C 33.886609 16.461891 31.379838 14.012216 31.052734 10.896484 A 1.0001 1.0001 0 0 0 30.058594 10 L 26.042969 10 z M 27.041016 12 L 29.322266 12 C 30.049047 15.2987 32.626734 17.814404 35.958984 18.445312 L 35.958984 21.310547 C 33.820114 21.201935 31.941489 20.134948 30.835938 18.453125 A 1.0001 1.0001 0 0 0 29 19.003906 L 29 30.539062 C 29 34.707538 25.641273 38.066406 21.472656 38.066406 C 17.304181 38.066406 13.945312 34.707538 13.945312 30.539062 C 13.945312 26.538539 17.066083 23.363182 21 23.107422 L 21 25.283203 C 18.286416 25.535721 16.121094 27.762246 16.121094 30.539062 C 16.121094 33.483274 18.528445 35.892578 21.472656 35.892578 C 24.401892 35.892578 27 33.586491 27 30.59375 C 27 30.64267 27.001859 29.335571 27.005859 27.494141 C 27.009759 25.65271 27.016224 23.20692 27.021484 20.763672 C 27.030884 16.376775 27.039186 12.849206 27.041016 12 z"></path>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="">
                                        <a href="https://www.youtube.com/{{ $talent->youtube }}">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M21.7 8.037a4.26 4.26 0 0 0-.789-1.964 2.84 2.84 0 0 0-1.984-.839c-2.767-.2-6.926-.2-6.926-.2s-4.157 0-6.928.2a2.836 2.836 0 0 0-1.983.839 4.225 4.225 0 0 0-.79 1.965 30.146 30.146 0 0 0-.2 3.206v1.5a30.12 30.12 0 0 0 .2 3.206c.094.712.364 1.39.784 1.972.604.536 1.38.837 2.187.848 1.583.151 6.731.2 6.731.2s4.161 0 6.928-.2a2.844 2.844 0 0 0 1.985-.84 4.27 4.27 0 0 0 .787-1.965 30.12 30.12 0 0 0 .2-3.206v-1.516a30.672 30.672 0 0 0-.202-3.206Zm-11.692 6.554v-5.62l5.4 2.819-5.4 2.801Z" clip-rule="evenodd"/>
                                            </svg>                                          
                                        </a>
                                    </div>
                                </td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $talent->finstagram }}</td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ 'Rp' . number_format($talent->rate_igs, 2, ',', '.') }}</td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ 'Rp' . number_format($talent->rate_igf, 2, ',', '.') }}</td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ 'Rp' . number_format($talent->rate_igr, 2, ',', '.') }}</td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ 'Rp' . number_format($talent->rate_igl, 2, ',', '.') }}</td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $talent->ftiktok }}</td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ 'Rp' . number_format($talent->rate_ttf, 2, ',', '.') }}</td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ 'Rp' . number_format($talent->rate_ttl, 2, ',', '.') }}</td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $talent->syoutube }}</td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ 'Rp' . number_format($talent->rate_yt, 2, ',', '.') }}</td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ 'Rp' . number_format($talent->rate_event, 2, ',', '.') }}</td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    @if($talent->talent_exclusive == 1)
                                        <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-emerald-500 bg-emerald-100/60 dark:bg-gray-800">
                                            <h2 class="text-sm font-normal">Ya</h2>
                                        </div>
                                    @elseif($talent->talent_exclusive == 0)
                                        <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-pink-500 bg-pink-100/60 dark:bg-gray-800">
                                            <h2 class="text-sm font-normal">Tidak</h2>
                                        </div>
                                    @endif
                                </td>
                                <td class="p-4 text-base font-bold text-gray-900 whitespace-nowrap dark:text-white">{{ $talent->staff?->name }}</td>
                                <td class="p-4 text-base text-gray-900 whitespace-nowrap dark:text-white">{{ $talent->account_name }}</td>
                                <td class="p-4 text-base text-gray-900 whitespace-nowrap dark:text-white">{{ $talent->account_number }}</td>
                                <td class="p-4 text-base text-gray-900 whitespace-nowrap dark:text-white">{{ $talent->bank_name }}</td>
                                <td class="p-4 text-base text-gray-900 whitespace-nowrap dark:text-white">{{ $talent->npwp }}</td>
                                <td class="p-4 text-base text-gray-900 whitespace-nowrap dark:text-white">{{ $talent->nik }}</td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    @if($talent->shopee_affiliate == 1)
                                        <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-emerald-500 bg-emerald-100/60 dark:bg-gray-800">
                                            <h2 class="text-sm font-normal">Ya</h2>
                                        </div>
                                    @elseif($talent->shopee_affiliate == 0)
                                        <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-pink-500 bg-pink-100/60 dark:bg-gray-800">
                                            <h2 class="text-sm font-normal">Tidak</h2>
                                        </div>
                                    @endif
                                </td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    @if($talent->tiktok_affiliate == 1)
                                        <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-emerald-500 bg-emerald-100/60 dark:bg-gray-800">
                                            <h2 class="text-sm font-normal">Ya</h2>
                                        </div>
                                    @elseif($talent->tiktok_affiliate == 0)
                                        <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-pink-500 bg-pink-100/60 dark:bg-gray-800">
                                            <h2 class="text-sm font-normal">Tidak</h2>
                                        </div>
                                    @endif
                                </td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    @if($talent->mcn_tiktok == 1)
                                        <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-emerald-500 bg-emerald-100/60 dark:bg-gray-800">
                                            <h2 class="text-sm font-normal">Ya</h2>
                                        </div>
                                    @elseif($talent->mcn_tiktok == 0)
                                        <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-pink-500 bg-pink-100/60 dark:bg-gray-800">
                                            <h2 class="text-sm font-normal">Tidak</h2>
                                        </div>
                                    @endif
                                </td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    @if($talent->status == 1)
                                        <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-emerald-500 bg-emerald-100/60 dark:bg-gray-800">
                                            <h2 class="text-sm font-normal">Aktif</h2>
                                        </div>
                                    @else
                                        <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-pink-500 bg-pink-100/60 dark:bg-gray-800">
                                            <h2 class="text-sm font-normal">Tidak Aktif</h2>
                                        </div>
                                    @endif
                                </td>
                                <td class="p-4 space-x-2 whitespace-nowrap">
                                    <!-- Edit User Modal -->
                                    @include('talents.edit')
                                    @can('delete data')
                                    <form action="/talent/{{ $talent->id }}" method="POST" class="inline-flex">
                                        @method('DELETE')
                                        @csrf
                                        <!-- Delete User Modal -->
                                        @include('talents.delete')
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('talents.import')

{{-- Paginate --}}
{{ $tables->links('partials.paginate') }}
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            let talents = {{ Js::from($tables->toArray()) }};
            talents = talents.data;

            talents.forEach(talent => {
                $("button[data-modal-target='edit-data-modal-" + talent.id + "']").on("click", function () {
                    // Empty select options
                    emptySelectOptions('regency', talent.id);
                    emptySelectOptions('district', talent.id);
                    emptySelectOptions('village', talent.id);

                    // Return if village_id is null
                    if (talent.village == null) {
                        return;
                    }

                    let provinceId = talent.village.province.id;
                    let regencyId = talent.village.district.regency.id;
                    let districtId = talent.village.district.id;
                    let villageId = talent.village.id;
                    
                    // Populate select options
                    populateSelectOptions('regency', talent.id, provinceId, regencyId);
                    populateSelectOptions('district', talent.id, regencyId, districtId);
                    populateSelectOptions('village', talent.id, districtId, villageId);

                });
                
                // Initialize ajax on onchange event
                $(`.province-edit-${talent.id}`).on("change", function () {
                    populateSelectOptionsOnParentChange('regency', talent.id, $(this).val());
                });

                $(`.regency-edit-${talent.id}`).on("change", function () {
                    populateSelectOptionsOnParentChange('district', talent.id, $(this).val());
                });

                $(`.district-edit-${talent.id}`).on("change", function () {
                    populateSelectOptionsOnParentChange('village', talent.id, $(this).val());
                });
            });

            function emptySelectOptions(fieldName, dataId) {
                let name = '';
                switch (fieldName) {
                    case 'regency':
                        name = "Kabupaten/Kota";
                        break;
                    case 'district':
                        name = "Kecamatan";
                        break;
                    case 'village':
                        name = "Desa/Kelurahan";
                        break;
                    default:
                        break;
                }
                $(`.${fieldName}-edit-${dataId}`).html(
                    `<option value="">Pilih ${name}</option>`
                );
            }

            function disableSelectInput(fieldName, dataId) {
                $(`.${fieldName}-edit-${dataId}`).prop("disabled", true);
            }

            function enableSelectInput(fieldName, dataId) {
                $(`.${fieldName}-edit-${dataId}`).prop("disabled", false);
            }

            function populateSelectOptions(fieldName, dataId, parentFieldId, currentFieldId) {
                let url = '';
                switch (fieldName) {
                    case 'regency':
                        url = "/getRegencies/" + parentFieldId;
                        break;
                    case 'district':
                        url = "/getDistricts/" + parentFieldId;
                        break;
                    case 'village':
                        url = "/getVillages/" + parentFieldId;
                        break;
                    default:
                        break;
                }

                disableSelectInput(fieldName, dataId);
                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $.each(data, function(i, field) {
                            $(`.${fieldName}-edit-${dataId}`).append(
                                '<option ' + (field.id == currentFieldId ? 'selected' : '') + ' value="' +
                                field.id +
                                '">' +
                                field.name +
                                "</option>"
                            );
                        });
                        enableSelectInput(fieldName, dataId);
                    },
                });
            }

            function populateSelectOptionsOnParentChange(fieldName, dataId, parentFieldId) {
                let url = '';
                switch (fieldName) {
                    case 'regency':
                        url = "/getRegencies/" + parentFieldId;
                        emptySelectOptions('regency', dataId);
                        emptySelectOptions('district', dataId);
                        emptySelectOptions('village', dataId);
                        
                        disableSelectInput('regency', dataId);
                        disableSelectInput('district', dataId);
                        disableSelectInput('village', dataId);
                        break;
                    case 'district':
                        url = "/getDistricts/" + parentFieldId;
                        emptySelectOptions('district', dataId);
                        emptySelectOptions('village', dataId);

                        disableSelectInput('district', dataId);
                        disableSelectInput('village', dataId);
                        break;
                    case 'village':
                        url = "/getVillages/" + parentFieldId;
                        emptySelectOptions('village', dataId);
                        disableSelectInput('village', dataId);
                        break;
                    default:
                        break;
                }
                
                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $.each(data, function(i, field) {
                            $(`.${fieldName}-edit-${dataId}`).append(
                                '<option' + ' value="' + field.id + '">' + field.name + "</option>"
                            );
                        });
                        enableSelectInput(fieldName, dataId);
                    },
                });
            }
        });
    </script>
@endpush