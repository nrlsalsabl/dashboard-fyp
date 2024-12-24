<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title }}</title>
    <link rel="icon" type="image/x-icon" href="https://media.licdn.com/dms/image/D4E0BAQFFpLZcUp0Qgg/company-logo_200_200/0/1694839430809?e=1726704000&v=beta&t=EQEkZ9MD2YCO-nxv0CX4j_W0Yd1vJ__T4W2a0NViqnA">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        body {
            background-image: url('{{ asset("assets/endless-constellation.svg") }}');
            background-attachment: fixed;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
</head>

<body class="px-4 pb-10 sm:max-w-2xl mx-auto">

    @if (session()->has('error'))
        <div class="flex mt-4 mitems-center p-4 mb-4 text-sm text-pink-800 border border-pink-300 rounded-lg bg-pink-50 dark:bg-gray-800 dark:text-pink-400 dark:border-pink-800" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div>
            <span class="font-medium">{{ session('error') }}
            </div>
        </div>
    @endif

    {{-- Jika berhasil mendaftar --}}
    @if (session()->has('success'))
    
        {{-- Berhasil mendaftar --}}
        <section class="bg-white dark:bg-gray-900 shadow dark:border rounded-lg dark:border-gray-700 my-8">
            <h2 class="text-xl font-bold text-[#e6edf3] bg-[#010409] px-6 py-4 rounded-t-lg">
                <img src="https://fypmedia.id/wp-content/themes/lmd-fypmedia/img/logo.png" class="h-6" alt="FYP Logo" />
            </h2>
            <div class="py-8 px-6">
                <h2 class="text-2xl">Regitrasi berhasil!</h2>
                <br>
                <p>Terima kasih.</p>
                <br>
                <br>
                <div class="flex flex-col">
                    <span class="text-sm">Info Lebih Lanjut, Hubungi :</span>
                    <div>
                        <a href="https://www.instagram.com/fypmedia.id" target="_blank" class="text-sm">@fypmedia.id </a>

                    </div>
                    <div>
                        <a href="https://wa.me/+6285175125712" target="_blank" class="text-sm">085175125712 (Amira)</a>

                    </div>
                    <div>
                        <a href="https://wa.me/+6285175123014" target="_blank" class="text-sm">085175123014 (Jaya)</a>

                    </div>
                </div>
            </div>
        </section>
    
    {{-- Kalo blm berhasil mendaftar, tampilkan form --}}
    @else


    {{-- HEADER --}}
    <section class="bg-white dark:bg-gray-900 shadow dark:border rounded-lg dark:border-gray-700 my-8">
        <h2 class="text-xl font-bold text-[#e6edf3] bg-[#010409] px-6 py-4 rounded-t-lg">
            <img src="https://fypmedia.id/wp-content/themes/lmd-fypmedia/img/logo.png" class="h-6" alt="FYP Logo" />
        </h2>
        <div class="py-8 px-6">
            <h2 class="text-2xl">Formulir Registrasi Talent FYP MEDIA</h2>
            <br>
            <br>
            <div class="flex flex-col">
                <span class="text-sm">Info Lebih Lanjut, Hubungi :</span>
                <div>
                    <a href="https://www.instagram.com/fypmedia.id" target="_blank" class="text-sm">@fypmedia.id </a>

                </div>
                <div>
                    <a href="https://wa.me/+6285175125712" target="_blank" class="text-sm">085175125712 (Amira)</a>

                </div>
                <div>
                    <a href="https://wa.me/+6285175123014" target="_blank" class="text-sm">085175123014 (Jaya)</a>

                </div>
            </div>
        </div>
    </section>

    <form action="/form/498c62cf2582c9ef765d1154b0a64032" method="POST" enctype="multipart/form-data" id="registrationForm">
        @csrf

        {{-- PERSONAL --}}
        <section
            class="bg-white dark:bg-gray-900 shadow dark:border rounded-lg dark:border-gray-700 my-8">
            <div class="text-xl font-bold text-[#e6edf3] bg-[#010409] px-6 py-4 flex items-center gap-2 rounded-t-lg">
                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                        clip-rule="evenodd" />
                </svg>
                <h2>
                    Personal
                </h2>
            </div>
            <div class="py-8 px-6">

                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            Lengkap<span class="text-red-500">*</span></label>
                        <input type="text" name="name" id="name" required value="{{ old('name') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukkan nama lengkap...">
                        @error('name')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email<span
                                class="text-red-500">*</span></label>
                        <input type="email" name="email" id="email" required value="{{ old('email') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukkan email...">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="place"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir<span
                                class="text-red-500">*</span></label>
                        <input type="text" name="place" id="place" required value="{{ old('place') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukkan tempat lahir...">
                        @error('place')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="date"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir<span
                                class="text-red-500">*</span></label>
                        <div class="relative max-w-sm">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input datepicker datepicker-autohide datepicker-format="yyyy-mm-dd" type="text" id="date" required value="{{ old('date') }}" name="date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Pilih tanggal">
                            @error('date')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="province_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi<span
                                class="text-red-500">*</span></label>
                        <select id="province_id" name="province_id" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected value="">Pilih Provinsi</option>
							@foreach ($provinces as $province)
								<option value="{{ $province->id }}">{{$province->name}}</option>
							@endforeach
                        </select>
                    </div>
                    <div>
                        <label for="regency_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kabupaten/Kota<span
                                class="text-red-500">*</span></label>
                        <select id="regency_id" name="regency_id" required disabled
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Pilih Kabupaten/Kota</option>
                        </select>
                    </div>
                    <div>
                        <label for="district_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan<span class="text-red-500">*</span></label>
                        <select id="district_id" name="district_id" disabled required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Pilih Kecamatan</option>
                        </select>
                    </div>
                    <div>
                        <label for="village_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Desa/Kelurahan<span class="text-red-500">*</span></label>
                        <select id="village_id" name="village_id" disabled required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Pilih Desa/Kelurahan</option>
                        </select>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="phone"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor HP<span
                                class="text-red-500">*</span></label>
                        <input type="text" name="phone" id="phone" required value="{{ old('phone') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="081234567890">
                        @error('phone')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="engagement"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Engagement Rate<span
                                class="text-red-500">*</span></label>
                        <input type="number" step="0.1" min="0.0" name="engagement" id="engagement" value="{{ old('engagement') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="0.0" required>
                        @error('engagement')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                        <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">Cek
                            engagement rate kamu <a href="https://phlanx.com/engagement-calculator" target="_blank"
                                class="font-medium text-blue-600 hover:underline dark:text-blue-500">di sini</a>.</p>
                    </div>
                    <div class="w-full self-center">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="photo">Upload Foto <span class="font-thin">(Opsional)</span></label>
                        <input name="photo" accept="image/*" 
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="file_input_help" id="photo" type="file">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">JPG, JPEG, atau
                            PNG.</p>
                        @error('photo')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full flex justify-center">
                        <img class="rounded-full w-32 h-32 object-cover" id="photo_preview"
                            src="{{ asset('storage/images/default-profile-picture.jpg') }}" alt="image description">
                    </div>

                </div>

            </div>
        </section>

        {{-- KATEGORI --}}
        <section
            class="bg-white dark:bg-gray-900 shadow dark:border rounded-lg dark:border-gray-700 my-8">
            <div class="text-xl font-bold text-[#e6edf3] bg-[#010409] px-6 py-4 flex items-center gap-2 rounded-t-lg">
                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M6 5a2 2 0 0 1 2-2h4.157a2 2 0 0 1 1.656.879L15.249 6H19a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2v-5a3 3 0 0 0-3-3h-3.22l-1.14-1.682A3 3 0 0 0 9.157 6H6V5Z"
                        clip-rule="evenodd" />
                    <path fill-rule="evenodd"
                        d="M3 9a2 2 0 0 1 2-2h4.157a2 2 0 0 1 1.656.879L12.249 10H3V9Zm0 3v7a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2v-7H3Z"
                        clip-rule="evenodd" />
                </svg>
                <h2>
                    Kategori
                </h2>
            </div>
            <div class="py-8 px-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
                    Kategori<span class="text-red-500">*</span></label>
                @error('category_id')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
                <br>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                    @php
                        $oldCategories = old('category_id') ?? [];
                    @endphp
                    @foreach ($categories as $category)
                        <div class="flex items-center me-4">
                            <input id="category_id_{{ $category->id }}"  @checked(in_array((string)$category->id, $oldCategories)) name="category_id[]" type="checkbox" value="{{ $category->id }}"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="category_id_{{ $category->id }}"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $category->name }}</label>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>

        {{-- INSTAGRAM --}}
        <section
            class="bg-white dark:bg-gray-900 shadow dark:border rounded-lg dark:border-gray-700 my-8">
            <div class="text-xl font-bold text-[#e6edf3] bg-[#010409] px-6 py-4 flex items-center gap-2 rounded-t-lg">
                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path fill="currentColor" fill-rule="evenodd"
                        d="M3 8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8Zm5-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H8Zm7.597 2.214a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2h-.01a1 1 0 0 1-1-1ZM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm-5 3a5 5 0 1 1 10 0 5 5 0 0 1-10 0Z"
                        clip-rule="evenodd" />
                </svg>

                <h2>
                    Instagram
                </h2>
            </div>
            <div class="py-8 px-6">

                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="w-full">
                        <label for="instagram"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username IG<span
                                class="text-red-500">*</span></label>
                        <input type="text" name="instagram" id="instagram" required value="{{ old('instagram') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="fypmedia.id">
                        @error('instagram')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="finstagram"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Followers
                            IG<span class="text-red-500">*</span></label>
                        <input type="number" min="0" name="finstagram" id="finstagram" required value="{{ old('finstagram') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="1000">
                        @error('finstagram')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="rate_igs"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rate Card IG
                            Story<span class="text-red-500">*</span></label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <span class="text-gray-500">Rp</span>
                            </span>
                            <input type="text" id="rate_igs" required data-currency="rate_igs" name="rate_igs_display" value="{{ old('rate_igs_display') }}"
                                class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="2.000.000">
                            <input type="hidden" name="rate_igs" value="{{ old('rate_igs') }}">
                        </div>
                        @error('rate_igs')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="rate_igf"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rate Card IG Feed<span
                                class="text-red-500">*</span></label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <span class="text-gray-500">Rp</span>
                            </span>
                            <input type="text" id="rate_igf" required data-currency="rate_igf" name="rate_igf_display" value="{{ old('rate_igf_display') }}"
                                class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="2.000.000">
                            <input type="hidden" name="rate_igf" value="{{ old('rate_igf') }}">
                        </div>
                        @error('rate_igf')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="rate_igr"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rate Card IG
                            Reels<span class="text-red-500">*</span></label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <span class="text-gray-500">Rp</span>
                            </span>
                            <input type="text" id="rate_igr" required data-currency="rate_igr" name="rate_igr_display" value="{{ old('rate_igr_display') }}"
                                class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="2.000.000">
                            <input type="hidden" name="rate_igr" value="{{ old('rate_igr') }}">
                        </div>
                        @error('rate_igr')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="rate_igl"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rate Card IG Live<span
                                class="text-red-500">*</span></label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <span class="text-gray-500">Rp</span>
                            </span>
                            <input type="text" id="rate_igl" required data-currency="rate_igl" name="rate_igl_display" value="{{ old('rate_igl_display') }}"
                                class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="2.000.000">
                            <input type="hidden" name="rate_igl" value="{{ old('rate_igl') }}">
                        </div>
                        @error('rate_igl')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

            </div>
        </section>

        {{-- TIKTOK --}}
        <section
            class="bg-white dark:bg-gray-900 shadow dark:border rounded-lg dark:border-gray-700 my-8">
            <div class="text-xl font-bold text-[#e6edf3] bg-[#010409] px-6 py-4 flex items-center gap-2 rounded-t-lg">
                <svg class="w-6 h-6" fill="#e6edf3" width="24" height="24" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg" xml:space="preserve">
                    <path
                        d="M19.589 6.686a4.793 4.793 0 0 1-3.77-4.245V2h-3.445v13.672a2.896 2.896 0 0 1-5.201 1.743l-.002-.001.002.001a2.895 2.895 0 0 1 3.183-4.51v-3.5a6.329 6.329 0 0 0-5.394 10.692 6.33 6.33 0 0 0 10.857-4.424V8.687a8.182 8.182 0 0 0 4.773 1.526V6.79a4.831 4.831 0 0 1-1.003-.104z" />
                </svg>

                <h2>
                    TikTok
                </h2>
            </div>
            <div class="py-8 px-6">

                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="w-full">
                        <label for="tiktok"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username TikTok<span
                                class="text-red-500">*</span></label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <span class="text-gray-500">@</span>
                            </span>
                            <input type="text" id="tiktok" required value="{{ old('tiktok') }}" name="tiktok"
                                class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="fypmedia.id">
                        </div>
                        @error('tiktok')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="ftiktok"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Followers
                            TikTok<span class="text-red-500">*</span></label>
                        <input type="number" min="0" name="ftiktok" id="ftiktok" value="{{ old('ftiktok') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="1000" required>
                        @error('ftiktok')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="rate_ttf"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rate Card TikTok
                            Feed<span class="text-red-500">*</span></label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <span class="text-gray-500">Rp</span>
                            </span>
                            <input type="text" id="rate_ttf" required data-currency="rate_ttf" name="rate_ttf_display" value="{{ old('rate_ttf_display') }}"
                                class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="2.000.000">
                            <input type="hidden" name="rate_ttf" value="{{ old('rate_ttf') }}">
                        </div>
                        @error('rate_ttf')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="rate_ttl"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rate Card TikTok
                            Live<span class="text-red-500">*</span></label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <span class="text-gray-500">Rp</span>
                            </span>
                            <input type="text" id="rate_ttl" required data-currency="rate_ttl" name="rate_ttl_display" value="{{ old('rate_ttl_display') }}"
                                class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="2.000.000">
                            <input type="hidden" name="rate_ttl" value="{{ old('rate_ttl') }}">
                        </div>
                        @error('rate_ttl')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

            </div>
        </section>

        {{-- YOUTUBE --}}
        <section
            class="bg-white dark:bg-gray-900 shadow dark:border rounded-lg dark:border-gray-700 my-8">
            <div class="text-xl font-bold text-[#e6edf3] bg-[#010409] px-6 py-4 flex items-center gap-2 rounded-t-lg">
                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M21.7 8.037a4.26 4.26 0 0 0-.789-1.964 2.84 2.84 0 0 0-1.984-.839c-2.767-.2-6.926-.2-6.926-.2s-4.157 0-6.928.2a2.836 2.836 0 0 0-1.983.839 4.225 4.225 0 0 0-.79 1.965 30.146 30.146 0 0 0-.2 3.206v1.5a30.12 30.12 0 0 0 .2 3.206c.094.712.364 1.39.784 1.972.604.536 1.38.837 2.187.848 1.583.151 6.731.2 6.731.2s4.161 0 6.928-.2a2.844 2.844 0 0 0 1.985-.84 4.27 4.27 0 0 0 .787-1.965 30.12 30.12 0 0 0 .2-3.206v-1.516a30.672 30.672 0 0 0-.202-3.206Zm-11.692 6.554v-5.62l5.4 2.819-5.4 2.801Z"
                        clip-rule="evenodd" />
                </svg>

                <h2>
                    YouTube
                </h2>
            </div>
            <div class="py-8 px-6">

                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="w-full">
                        <label for="youtube"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username YouTube<span
                                class="text-red-500">*</span></label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <span class="text-gray-500">@</span>
                            </span>
                            <input type="text" id="youtube" required value="{{ old('youtube') }}" name="youtube"
                                class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="fypmedia.id">
                        </div>
                        @error('youtube')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="syoutube"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Subscriber
                            YouTube<span class="text-red-500">*</span></label>
                        <input type="number" min="0" name="syoutube" id="syoutube" value="{{ old('syoutube') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="1000" required>
                        @error('syoutube')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="rate_yt"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rate Card YouTube<span
                                class="text-red-500">*</span></label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <span class="text-gray-500">Rp</span>
                            </span>
                            <input type="text" id="rate_yt" required data-currency="rate_yt" name="rate_yt_display" value="{{ old('rate_yt_display') }}"
                                class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="2.000.000">
                            <input type="hidden" name="rate_yt" value="{{ old('rate_yt') }}">
                        </div>
                        @error('rate_yt')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

            </div>
        </section>

        {{-- EVENT ATTENDANCE --}}
        <section
            class="bg-white dark:bg-gray-900 shadow dark:border rounded-lg dark:border-gray-700 my-8">
            <div class="text-xl font-bold text-[#e6edf3] bg-[#010409] px-6 py-4 flex items-center gap-2 rounded-t-lg">
                <svg class="w-6 h-6 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M4 4a1 1 0 0 1 1-1h14a1 1 0 1 1 0 2v14a1 1 0 1 1 0 2H5a1 1 0 1 1 0-2V5a1 1 0 0 1-1-1Zm5 2a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H9Zm5 0a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-1Zm-5 4a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1H9Zm5 0a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1h-1Zm-3 4a2 2 0 0 0-2 2v3h2v-3h2v3h2v-3a2 2 0 0 0-2-2h-2Z"
                        clip-rule="evenodd" />
                </svg>

                <h2>
                    Event Attendance
                </h2>
            </div>
            <div class="py-8 px-6">

                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                    <div class="sm:col-span-2">
                        <label for="rate_event"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rate Card Event
                            Attendance<span class="text-red-500">*</span></label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <span class="text-gray-500">Rp</span>
                            </span>
                            <input type="text" id="rate_event" required data-currency="rate_event" name="rate_event_display" value="{{ old('rate_event_display') }}"
                                class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="2.000.000">
                            <input type="hidden" name="rate_event" value="{{ old('rate_event') }}">
                        </div>
                        @error('rate_event')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

            </div>
        </section>

        {{-- TALENT PRIORITAS --}}
        <section
            class="bg-white dark:bg-gray-900 shadow dark:border rounded-lg dark:border-gray-700 my-8">
            <div class="text-xl font-bold text-[#e6edf3] bg-[#010409] px-6 py-4 flex items-center gap-2 rounded-t-lg">
                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                </svg>


                <h2>
                    Talent Prioritas
                </h2>
            </div>
            <div class="py-8 px-6">

                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                    <div class="sm:col-span-2">
                        <label class="block mb-2 font-medium text-gray-900 dark:text-white">Apakah Kamu
                            Berminat Menjadi Talent Prioritas?<span class="text-red-500">*</span></label>
                        <p class="text-sm">Exclusive Talent akan diprioritaskan untuk diajukan kepada brand dan berhak
                            mengikuti exclusive event FYP Media x Brand Ternama. Persyaratan: mencantumkan CP
                            085175123014 (Jaya) dan @fypmedia.id di bio instagram</p>
                        <br>
                        <div class="flex items-center mb-4">
                            <input id="talent-exclusive-yes" type="radio" value="1" name="talent_exclusive" required @checked(old('talent_exclusive') == '1')
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="talent-exclusive-yes"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ya, saya bersedia (Of
                                course)</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="talent-exclusive-no" type="radio" value="0" name="talent_exclusive" @checked(old('talent_exclusive') == '0')
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="talent-exclusive-no"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak, saya ingin
                                menjadi talent basic saja (No, I am not)</label>
                        </div>
                        @error('talent_exclusive')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

            </div>
        </section>

        {{-- PIC --}}
        <section
            class="bg-white dark:bg-gray-900 shadow dark:border rounded-lg dark:border-gray-700 my-8">
            <div class="text-xl font-bold text-[#e6edf3] bg-[#010409] px-6 py-4 flex items-center gap-2 rounded-t-lg">
                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-width="2"
                        d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>


                <h2>
                    PIC
                </h2>
            </div>
            <div class="py-8 px-6">

                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                    <div class="sm:col-span-2">
                        <label for="staff_id" class="block mb-2 font-medium text-gray-900 dark:text-white">PIC (Siapa
                            yang Menghubungi)<span class="text-red-500">*</span></label>
                        <p class="text-sm">Setelah Submit, konfirmasi ke Nomor 085175123014 (Jaya) ya.
                            <a href="http://wa.me/6285175123014" target="_blank"
                                class="text-blue-800">(wa.me/6285175123014)</a>
                        </p>
                        <br>
                        <div class="relative" id="search_pic">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="search" @if(old('staff_id') == 'input_manual') disabled @endif name="staff_id_display" value="{{ old('staff_id_display') }}" id="staff_id" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari PIC..." />
                            <div id="dropdown" class="absolute z-50 overflow-hidden w-full bg-white border border-gray-300 rounded-lg shadow-lg dark:bg-gray-700 dark:border-gray-600 mt-1 hidden">
                            </div>
                            {{-- isinya bisa staff_id atau 'input_manual' --}}
                            <input type="hidden" name="staff_id" value="{{ old('staff_id') }}">
                            @error('staff_id')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                            
                            {{-- Spinner --}}
                            <div id="spinner" class="absolute right-10 top-4 hidden">
                                <svg class="animate-spin h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291l-3.707 3.707c-4.019-4.02-4.019-10.537 0-14.556L6 7.291a8.003 8.003 0 010 10.582z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- Checkbox pic manual --}}
                    {{-- <div class="sm:col-span-2">
                        <div class="flex items-center">
                            <input id="checkbox_staff_manual" type="checkbox" value="1" @checked(old('staff_id') == 'input_manual')
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox_staff_manual" class="ms-2 text-sm text-gray-900 dark:text-gray-300">PIC tidak ada pada pencarian.</label>
                        </div>
                    </div> --}}

                    {{-- INPUT PIC MANUAL --}}
                    {{-- <div class="sm:col-span-2 @if(old('staff_id') != 'input_manual') hidden @endif" id="input_data_pic_manual">
                        <label for="manual_staff_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            PIC<span class="text-red-500">*</span></label>
                        <input type="text" name="manual_staff_name" id="manual_staff_name" value="{{ old('manual_staff_name') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukkan nama PIC...">
                        @error('manual_staff_name')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div> --}}
                </div>

            </div>
        </section>

        {{-- DATA PAYMENT --}}
        <section
            class="bg-white dark:bg-gray-900 shadow dark:border rounded-lg dark:border-gray-700 my-8">
            <div class="text-xl font-bold text-[#e6edf3] bg-[#010409] px-6 py-4 flex items-center gap-2 rounded-t-lg">
                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M12 14a3 3 0 0 1 3-3h4a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-4a3 3 0 0 1-3-3Zm3-1a1 1 0 1 0 0 2h4v-2h-4Z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M12.293 3.293a1 1 0 0 1 1.414 0L16.414 6h-2.828l-1.293-1.293a1 1 0 0 1 0-1.414ZM12.414 6 9.707 3.293a1 1 0 0 0-1.414 0L5.586 6h6.828ZM4.586 7l-.056.055A2 2 0 0 0 3 9v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2h-4a5 5 0 0 1 0-10h4a2 2 0 0 0-1.53-1.945L17.414 7H4.586Z" clip-rule="evenodd"/>
                  </svg>
                  

                <h2>
                    Data Payment <span class="font-normal text-base">(Opsional)</span>
                </h2>
            </div>
            <div class="py-8 px-6">

                <div class="grid gap-4 sm:grid-cols-12 sm:gap-6">

                    <div class="sm:col-span-full">
                        <label for="account_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Penerima Rekening</label>
                        <input type="text" name="account_name" id="account_name" required value="{{ old('account_name') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukkan nama penerima rekening...">
                        @error('account_name')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-8">
                        <label for="account_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Rekening</label>
                        <input type="text" name="account_number" id="account_number" required value="{{ old('account_number') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukkan nomor rekening...">
                        @error('account_number')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-4">
                        <label for="bank_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Bank</label>
                        <input type="text" name="bank_name" id="bank_name" required value="{{ old('bank_name') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="BCA/BNI/dll">
                        @error('bank_name')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-full">
                        <label for="npwp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NPWP</label>
                        <input type="text" name="npwp" id="npwp" required value="{{ old('npwp') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="xx.xxx.xxx.x-xxx.xxx">
                        @error('npwp')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-full">
                        <label for="nik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                        <input type="text" name="nik" id="nik" required value="{{ old('nik') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="16 digit">
                        @error('nik')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

            </div>
        </section>

        {{-- AFFILIATE --}}
        <section
            class="bg-white dark:bg-gray-900 shadow dark:border rounded-lg dark:border-gray-700 my-8">
            <div class="text-xl font-bold text-[#e6edf3] bg-[#010409] px-6 py-4 flex items-center gap-2 rounded-t-lg">
                <svg class="w-6 h-6 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z"
                        clip-rule="evenodd" />
                </svg>
                <h2>
                    Affiliate
                </h2>
            </div>
            <div class="py-8 px-6">

                <div class="grid gap-10 sm:grid-cols-2 sm:gap-8">

                    <div class="sm:col-span-2">
                        <label for="phone" class="block mb-4 font-medium text-gray-900 dark:text-white">Apakah Kamu
                            Tertarik Bergabung Menjadi Shopee Affiliate?<span class="text-red-500">*</span></label>

                        <div class="flex">
                            <div class="flex items-center me-6">
                                <input id="shopee-affiliate-yes" type="radio" value="1" name="shopee_affiliate" required @checked(old('shopee_affiliate') == '1')
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="shopee-affiliate-yes"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ya</label>
                            </div>
                            <div class="flex items-center me-6">
                                <input id="shopee-affiliate-no" type="radio" value="0" name="shopee_affiliate" @checked(old('shopee_affiliate') == '0')
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="shopee-affiliate-no"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak</label>
                            </div>
                        </div>
                        @error('shopee_affiliate')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="phone" class="block mb-4 font-medium text-gray-900 dark:text-white">Apakah Kamu
                            Tertarik Untuk Dibantu Personal Branding / Jasa Digital Marketing Oleh Tim FYP Media?<span class="text-red-500">*</span></label>

                        <div class="flex">
                            <div class="flex items-center me-6">
                                <input id="tiktok-affiliate-yes" type="radio" value="1" name="tiktok_affiliate" required @checked(old('tiktok_affiliate') == '1')
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="tiktok-affiliate-yes"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ya</label>
                            </div>
                            <div class="flex items-center me-6">
                                <input id="tiktok-affiliate-no" type="radio" value="0" name="tiktok_affiliate" @checked(old('tiktok_affiliate') == '0')
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="tiktok-affiliate-no"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak</label>
                            </div>

                        </div>
                        @error('tiktok_affiliate')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="phone" class="block mb-4 font-medium text-gray-900 dark:text-white">Apakah Kamu
                            Tertarik Bergabung di MCN TikTok FYP?<span class="text-red-500">*</span></label>

                        <div class="flex">
                            <div class="flex items-center me-6">
                                <input id="mcn-tiktok-yes" type="radio" value="1" name="mcn_tiktok" required @checked(old('mcn_tiktok') == '1')
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="mcn-tiktok-yes"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ya</label>
                            </div>
                            <div class="flex items-center me-6">
                                <input id="mcn-tiktok-no" type="radio" value="0" name="mcn_tiktok" @checked(old('mcn_tiktok') == '0')
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="mcn-tiktok-no"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak</label>
                            </div>

                        </div>
                        @error('mcn_tiktok')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

            </div>
        </section>

        {{-- PERNYATAAN --}}
        <section
            class="bg-white dark:bg-gray-900 shadow dark:border rounded-lg dark:border-gray-700 my-8">
            <div class="py-8 px-6">
                <div class="grid gap-10 sm:grid-cols-2 sm:gap-8">

                    <div class="sm:col-span-2">
                        <div class="flex items-center">
                            <input required id="statement" type="checkbox" value="1" name="statement"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="statement" class="ms-2 text-sm text-gray-900 dark:text-gray-300">Saya
                                menyatakan bahwa data yang saya isikan dalam formulir ini sudah benar.<span class="text-red-500">*</span></label>
                        </div>
                        @error('statement')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

            </div>
        </section>

        {{-- TOMBOL SUBMIT --}}
        <div class="flex justify-end">
            <button type="submit" id="submit_button"
                class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-black rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                Kirim
            </button>
        </div>

    </form>

    @endif

	<script src="{{ asset('js/dropdown-indo-region.js') }}"></script>
    <script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <script>
        $(document).ready(function() {
			// Validasi Phone
            $('input[name="phone"]').on('input', function(event) {
                // Hilangkan karakter non-angka
                $(this).val($(this).val().replace(/[^0-9]/g, ''));
            });

            // Validasi number koma
			$('input[name="engagement"]').on('keydown', function(event) {
                // Prevent simbol 'e', '+', '-'
				const invalidChars = ['e', '+', '-'];
				if (invalidChars.includes(event.key)) {
					event.preventDefault();
				}
            });

            // Validasi number bilangan cacah (untuk followers)
            function validateNumberCacah(event) {
                // Prevent simbol 'e', '+', '-', '.'
				const invalidChars = ['e', '+', '-', '.'];
				if (invalidChars.includes(event.key)) {
					event.preventDefault();
				}
            }
            $('input[name="finstagram"]').on('keydown', validateNumberCacah);
            $('input[name="ftiktok"]').on('keydown', validateNumberCacah);
            $('input[name="syoutube"]').on('keydown', validateNumberCacah);

            // Format currency
            function formatCurrency(value) {
                // Remove any non-numeric characters (except for dot and comma)
                value = value.replace(/[^,\d]/g, '');

                // Split the value into integer and decimal parts
                var parts = value.split(',');
                var integerPart = parts[0];
                var decimalPart = parts.length > 1 ? ',' + parts[1] : '';

                // Add thousand separators to the integer part
                var formattedIntegerPart = integerPart.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

                // Return the formatted value
                return formattedIntegerPart + decimalPart;
            }

            const currencyFields = [
                'rate_igs',
                'rate_igf',
                'rate_igr',
                'rate_igl',
                'rate_ttf',
                'rate_ttl',
                'rate_yt',
                'rate_event',
            ];

            currencyFields.forEach(currencyField => {
                $(`[data-currency="${currencyField}"]`).on('input', function() {
                    var inputVal = $(this).val();
    
                    // Update the hidden raw value (remove all non-numeric characters)
                    var rawVal = inputVal.replace(/\D/g, '');
                    $(`input[name="${currencyField}"]`).val(rawVal);
    
                    // Format the value for display
                    var formattedVal = formatCurrency(inputVal);
                    $(this).val(formattedVal);
                });
            });


			// Untuk nampilin preview image saat di-upload
            $("#photo").on('change', () => {
				const image = $('#photo')[0];
                const imgPreview = $('#photo_preview');

                const blob = URL.createObjectURL(image.files[0]);
                imgPreview.attr('src', blob);
			});

            // Script untuk mencari PIC
            let debounceTimer;
            // picName ini state untuk klik dari hasil search saja, bukan manual
            let picName = '{{ old("staff_id_display") ? old("staff_id_display") : ""}}';

            function debounce(func, delay) {
                return function() {
                    const context = this;
                    const args = arguments;
                    clearTimeout(debounceTimer);
                    debounceTimer = setTimeout(() => func.apply(context, args), delay);
                };
            }

            function performSearch(query) {
                if (query.length >= 1) {  // Perform search only if the input length is greater than and equal 2 characters
                    $('#spinner').removeClass('hidden');
                    $.ajax({
                        url: '/getStaffs?name=' + query,  // Replace with your search endpoint
                        method: 'GET',
                        success: function(data) {
                            $('#spinner').addClass('hidden');
                            var dropdown = $('#dropdown');
                            dropdown.empty().removeClass('hidden').show();  // Clear previous results and show the dropdown

                            // If data empty
                            if (data.length == 0) {
                                dropdown.append(`<div class="px-4 py-2 text-sm text-gray-900 dark:text-white italic">PIC "${query}" tidak ada.</div>`);
                                return;
                            }

                            // Assuming 'data' is an array of search results
                            data.forEach(function(item) {
                                dropdown.append('<div class="dropdown-item cursor-pointer px-4 py-2 text-sm text-gray-900 hover:bg-gray-200 dark:text-white dark:hover:bg-gray-600" data-value="' + item.id + '" data-name="' + item.name + '">' + item.name + '</div>');
                            });

                            $('.dropdown-item').on('click', function() {
                                var value = $(this).data('value');
                                var name = $(this).data('name');
                                picName = name;
                                $('#staff_id').val(name);
                                $('input[name="staff_id"]').val(value);
                                dropdown.hide();  // Hide the dropdown after selecting an item
                            });
                        },
                        error: function() {
                            $('#spinner').addClass('hidden');
                        }
                    });
                } else {
                    $('#dropdown').hide();
                    $('#spinner').addClass('hidden');
                }
            }

            const debouncedSearch = debounce(performSearch, 300);

            $('#staff_id').on('input', function() {
                var query = $(this).val();
                debouncedSearch(query);                
            });

            $(document).on('click', function(event) {
                if (!$(event.target).closest('.relative').length) {
                    let currentPicName = $('#staff_id').val();
                    if (currentPicName == '') {
                        $('#staff_id').val('');
                        $('input[name="staff_id"]').val('');
                        picName = '';
                    } else {
                        $('#staff_id').val(picName);
                    }
                    $('#dropdown').hide();  // Hide the dropdown if clicking outside of it
                }
            });

            /* -------------------------- Validasi Data Payment -------------------------- */
            $('input[name=account_number]').inputmask({
                regex: "[0-9]*",
                showMaskOnHover: false,
                showMaskOnFocus: false
            });
            $('input[name=npwp]').inputmask({
                mask: "99.999.999.9-999.999",
                showMaskOnHover: false,
                showMaskOnFocus: false
            });
            $('input[name=nik]').inputmask({
                mask: "9999999999999999",
                showMaskOnHover: false,
                showMaskOnFocus: false
            });

            // Jika checkbox_staff_manual di-check
            // $('#checkbox_staff_manual').on('change', function() {
            //     if ($(this).is(':checked')) {
            //         $('#staff_id').prop('required', false);
            //         $('#manual_staff_name').prop('required', true);

            //         $('#staff_id').val('');
            //         $('#staff_id').prop('disabled', true);
            //         $('#input_data_pic_manual').removeClass('hidden');

            //         $('input[name="staff_id"]').val('input_manual');
            //         $('#dropdown').hide();
            //     } else {
            //         $('#staff_id').prop('required', true);
            //         $('#manual_staff_name').prop('required', false);

            //         $('#manual_staff_name').val('');
            //         $('#staff_id').prop('disabled', false);
            //         $('#input_data_pic_manual').addClass('hidden');

            //         $('input[name="staff_id"]').val('');
            //     }
            // });

            // Prevent if submit button clicked
            // $('#submit_button').on('click', function(event) {
            //     event.preventDefault();

            //     // Cek jika checkbox_staff_manual di-check
            //     if ($('#checkbox_staff_manual').is(':checked')) {
            //         $('input[name="staff_id"]').val('input_manual');
            //     }

            //     // Cek jika minimal 1 category_id di-check
            //     if ($('input[name="category_id[]"]:checked').length == 0) {
            //         alert('Pilih minimal 1 kategori');
            //         return;
            //     }

            //     // Cek required
            //     if (!$('#registrationForm')[0].checkValidity()) {
            //         $('#registrationForm')[0].reportValidity();
            //         return;
            //     }

            //     // Submit form
            //     $('#registrationForm').submit();
            // })

        });
    </script>
	
</body>
