@extends('layouts.main')

@section('container')
    @if (session()->has('success') || request()->has('delete_success'))
        <div class="flex sm:ml-72 sm:mr-8 mt-4 mitems-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">{{ session('success', 'Data berhasil dihapus') }}
            </div>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="flex sm:ml-72 sm:mr-8 mt-4 mitems-center p-4 mb-4 text-sm text-pink-800 border border-pink-300 rounded-lg bg-pink-50 dark:bg-gray-800 dark:text-pink-400 dark:border-pink-800"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">{{ session('error') }}
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="flex sm:ml-72 sm:mr-8 mt-4 mitems-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Terjadi kesalahan saat membuat data projek</span>
                <ul class="mt-3 list-disc list-inside text-sm text-red-700 dark:text-red-400">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
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
                                {{-- <th scope="col" class="p-4">
                                    <div class="flex items-center">
                                        <input id="select_all_ids" name="ids" aria-describedby="checkbox-1"
                                            type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-all" class="sr-only">checkbox</label>
                                    </div>
                                </th> --}}
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-center text-gray-500 uppercase dark:text-gray-400 ">
                                    Nama Project
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-center text-gray-500 uppercase dark:text-gray-400">
                                    PIC
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-center text-gray-500 uppercase dark:text-gray-400">
                                    Brand
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-center text-gray-500 uppercase dark:text-gray-400">
                                    Talent
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-center text-gray-500 uppercase dark:text-gray-400">
                                    Agency
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-center text-gray-500 uppercase dark:text-gray-400">
                                    Scope
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-center text-gray-500 uppercase dark:text-gray-400">
                                    QTY
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-center text-gray-500 uppercase dark:text-gray-400">
                                    Rate Brand
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-center text-gray-500 uppercase dark:text-gray-400">
                                    Rate Talent
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-center text-gray-500 uppercase dark:text-gray-400">
                                    Tanggal Pelunasan Talent
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-center text-gray-500 uppercase dark:text-gray-400">
                                    Tanggal Pelunasan Brand
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-center text-gray-500 uppercase dark:text-gray-400">
                                    Keterangan
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-center text-gray-500 uppercase dark:text-gray-400">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            @foreach ($tables as $project)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700"
                                    id="{{ $search }}_ids{{ $project->id }}">
                                    {{-- <td class="w-4 p-4">
                                        <div class="flex items-center">
                                            <input id="" aria-describedby="checkbox-1" name="ids"
                                                type="checkbox"
                                                class="checkbox_ids w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600"
                                                value="{{ $project->id }}">
                                            <label for="checkbox" class="sr-only">checkbox</label>
                                        </div>
                                    </td> --}}
                                    <td
                                        class="w-full p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $project->name }}
                                    </td>
                                    <td
                                        class="w-full p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $project->staff->name }}
                                    </td>
                                    <td
                                        class="w-full p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $project->brand->name }}
                                    </td>

                                    <td
                                        class="w-full p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $project->talent->name }}
                                    </td>

                                    <td
                                        class="w-full p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $project->agency->name }}
                                    </td>

                                    <td
                                        class="w-full p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $project->scope->name }}
                                    </td>
                                    <td
                                        class="w-full p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $project->quantity }}
                                    </td>
                                    <td
                                        class="w-full p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        Rp. {{ number_format($project->rate_brand, 2, ',', '.') }}
                                    </td>
                                    <td
                                        class="w-full p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        Rp. {{ number_format($project->rate_talent, 2, ',', '.') }}
                                    </td>
                                    <td
                                        class="w-full p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $project->tgl_pelunasan_talent }}
                                    </td>
                                    <td
                                        class="w-full p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $project->tgl_pelunasan_brand }}
                                    </td>
                                    <td
                                        class="w-full p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $project->Keterangan }}
                                    </td>
                                    <td class="p-4 space-x-2 whitespace-nowrap">
                                        <!-- Edit User Modal -->
                                        @include('project.edit')
                                        @can('delete data')
                                            <form action="/project/{{ $project->id }}" method="POST" class="inline-flex">
                                                @method('delete')
                                                @csrf
                                                <!-- Delete User Modal -->
                                                @include('project.delete')
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

    {{-- Paginate --}}
    {{ $tables->links('partials.paginate') }}

    @include('project.create')
@endsection
