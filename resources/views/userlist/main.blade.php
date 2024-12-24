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
                            <a class="flex justify-between" href="{{ route('users-list.index', ['sort' => 'name', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
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
                            <a class="flex justify-between" href="{{ route('users-list.index', ['sort' => 'role', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                Role
                                @if (request('sort') == 'role')
                                    @if (request('direction') == 'asc')
                                        ▲
                                    @else
                                        ▼
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            <a class="flex justify-between" href="{{ route('users-list.index', ['sort' => 'status', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
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
                        @can('edit users')
                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Actions
                        </th>
                        @endcan
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                    @foreach ($users as $user)
                    @continue($user->hasRole('master') && auth()->user()->hasRole('super-admin'))
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700" id="{{ $search }}_ids{{ $user->id }}">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="" aria-describedby="checkbox-1" name="ids[]" type="checkbox" class="checkbox_ids w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600" value="{{ $user->id }}">
                                    <label for="checkbox" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <td class="flex items-center p-4 mr-12 space-x-6 whitespace-nowrap">
                                <img class="w-10 h-10 rounded-full" src="{{ asset('storage/' . $user->photo) }}" alt="{{ $user->name }}">
                                <div class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                    <div class="text-base font-semibold text-gray-900 dark:text-white">{{ $user->name }}</div>
                                    <div class="text-sm font-normal text-gray-500 dark:text-gray-400">{{ $user->email }}</div>
                                </div>
                            </td>
                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ implode(" ", $user->getRoleNames()->toArray()) }}</td>
                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                @if ($user->status == 1)
                                    <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-emerald-500 bg-emerald-100/60 dark:bg-gray-800">
                                        <h2 class="text-sm font-normal">Active</h2>
                                    </div>
                                @endif
                            </td>
                            
                            @can('edit users')
                            <td class="p-4 space-x-2 whitespace-nowrap">
                                <!-- Edit User Modal -->
                                @include('userlist.edit')
                                <!-- Delete User Modal -->
                                @can('delete users')
                                    <form action="/users-list/{{ $user->id }}" method="POST" class="inline-flex">
                                        @method('DELETE')
                                        @csrf
                                        <!-- Delete User Modal -->
                                        @include('userlist.delete')
                                    </form>
                                @endcan
                            </td> 
                            @endcan
                        </tr>    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

@include('userlist.create')
@endsection