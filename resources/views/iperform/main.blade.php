@extends('layouts.main')

@section('container')
@if (session()->has('success'))
    <div class="flex sm:ml-72 sm:mr-8 mt-4 mitems-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div>
        <span class="font-medium">{{ session('success') }}
        </div>
    </div>
@endif

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
                                <a class="flex justify-between" href="{{ route('kinerja-intern.index', ['sort' => 'intern_id', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    Nama
                                    @if (request('sort') == 'intern_id')
                                        @if (request('direction') == 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                <a class="flex justify-between" href="{{ route('kinerja-intern.index', ['sort' => 'position', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    Posisi
                                    @if (request('sort') == 'position')
                                        @if (request('direction') == 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                <a class="flex justify-between" href="{{ route('kinerja-intern.index', ['sort' => 'date', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    Bulan, Tahun
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
                                Target
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                <a class="flex justify-between" href="{{ route('kinerja-intern.index', ['sort' => 'result', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    Capaian
                                    @if (request('sort') == 'result')
                                        @if (request('direction') == 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                <a class="flex justify-between" href="{{ route('kinerja-intern.index', ['sort' => 'description', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    Justifikasi
                                    @if (request('sort') == 'description')
                                        @if (request('direction') == 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                        @foreach ($tables as $performance)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700" id="{{ $search }}_ids{{ $performance->id }}">
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input id="" aria-describedby="checkbox-1" name="ids" type="checkbox" class="checkbox_ids w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600" value="{{ $performance->id }}">
                                        <label for="checkbox" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <td class="flex items-center p-4 mr-12 space-x-6 whitespace-nowrap">
                                    <div class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                        <div class="text-base font-semibold text-gray-900 dark:text-white">{{ $performance->intern->name }}</div>
                                        <div class="text-sm font-normal text-gray-500 dark:text-gray-400">{{ $performance->intern->email }}</div>
                                    </div>
                                </td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $performance->intern->position->name }}</td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ \Carbon\Carbon::parse($performance->date)->format('F, Y') }}</td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $performance->target }}.00</td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $performance->result }}</td>
                                <td class="p-4 text-base font-normal text-gray-500 whitespace-nowrap dark:text-white">{{ $performance->description }}</td>
                                <td class="p-4 space-x-2 whitespace-nowrap">
                                    <!-- Edit User Modal -->
                                    @include('iperform.edit')
                                    <form action="/kinerja-intern/{{ $performance->id }}" method="POST" class="inline-flex">
                                        @method('delete')
                                        @csrf
                                        <!-- Delete User Modal -->
                                        @include('iperform.delete')
                                    </form>
                                </td> 
                            </tr>    
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{ $tables->links('partials.paginate') }}

@include('iperform.create')

@endsection