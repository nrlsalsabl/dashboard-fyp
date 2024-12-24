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

<div class="flex flex-col sm:ml-64 p-8">
  <div class="h-full">
    <form action="/edit-profile/{{ $user->id }}" method="POST" enctype="multipart/form-data">
      @method("PUT")
      @csrf
      <div class="border-b-2 block md:flex">          
        <div class="w-full md:w-2/5 p-4 sm:p-6 lg:p-8 bg-white shadow-md">
          <span class="text-gray-600">Informasi dibawah ini sangat sensitif</span>
          <div class="w-full p-8 mx-2 flex justify-center">
            <img id="photo-preview" class="object-cover w-40 h-40 p-1 rounded-full ring-2 ring-indigo-300 dark:ring-indigo-500" src="{{ old('photo', asset('storage/' . $user->photo)) }}" alt="Bordered avatar">
          </div>
          <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="photo" type="file" name="photo">
        </div>
          
        <div class="w-full md:w-3/5 p-8 bg-white lg:ml-4 shadow-md">
          <div class="rounded  shadow p-6">
            <div class="pb-4">
              <label for="name" class="font-semibold text-gray-700 block pb-1">Nama Lengkap</label>
              <input id="name" name="name" class="border-1 rounded-r px-4 py-2 w-full" type="text" value="{{ old('name', $user->name) }}" />
            </div>
            <div class="pb-4">
              <label for="about" class="font-semibold text-gray-700 block pb-1">Email</label>
              <input id="email" name="email" class="border-1 rounded-r px-4 py-2 w-full" type="email" value="{{ old('email', $user->email) }}" disabled/>
            </div>
            <div class="pb-4">
              <label for="password" class="font-semibold text-gray-700 block pb-1">Password</label>
              <input id="password" name="password" class="border-1 rounded-r px-4 py-2 w-full" type="password" placeholder="*******" />
            </div>
            <button type="submit" class="text-white bg-gray-800 hover:bg-black focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Simpan Perubahan</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection