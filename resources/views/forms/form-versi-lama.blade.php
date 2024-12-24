<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title }}</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>

<body class="bg-cream text-charcoal min-h-screen font-sans leading-normal overflow-x-hidden lg:overflow-auto">
    <main class="flex-1 md:p-0 lg:pt-8 lg:px-8 lg:pb-8 flex flex-col">
        @session('success')
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                <span class="font-medium">Success!</span> {{ $value }}
            </div>
        @endsession
        @if (session()->has('error'))
            <div class="flex sm:ml-72 sm:mr-8 mt-4 mitems-center p-4 mb-4 text-sm text-pink-800 border border-pink-300 rounded-lg bg-pink-50 dark:bg-gray-800 dark:text-pink-400 dark:border-pink-800" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                <span class="font-medium">{{ session('error') }}
                </div>
            </div>
        @endif
        @if ($errors->any())
            <div class="flex sm:ml-72 sm:mr-8 mt-4 mitems-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only grid grid-cols-4">Info</span>
                @foreach ($errors->all() as $error)
                    <div>
                        <span class="font-medium">{{ $error }}
                    </div>
                @endforeach
            </div>
        @endif
        <section class="bg-cream-lighter p-4 shadow">
            <div class="flex mb-8">
                <h2 class="md:w-1/3 uppercase tracking-wide text-md sm:text-2xl">{{ $title }}</h2>
                <div class="flex flex-col ms-4">
                    <span class="text-sm">Info Lebih Lanjut, Hubungi :</span>
                    <a href="https://www.instagram.com/fypmedia.id" class="text-sm">@fypmedia.id </a>
                    <a href="https://wa.me/+6285175125712" class="text-sm">085175125712 (Amira)</a>
                    <a href="https://wa.me/+6285175123014" class="text-sm">085175123014 (Jaya)</a>
                </div>
            </div>
            <form action="/form/498c62cf2582c9ef765d1154b0a64032" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="md:flex mb-8">
                    <div class="md:w-1/3">
                        <legend class="uppercase tracking-wide text-sm">Personal</legend>
                        <p class="text-xs font-light text-red">Seluruh data harus diisi</p>
                    </div>
                    <div class="md:flex-1 mt-2 mb:mt-0 md:px-3">
                        <div class="mb-4">
                            <label class="block uppercase tracking-wide text-xs font-bold">Nama Lengkap</label>
                            <input class="w-full shadow-inner p-4 border-0.5 rounded" type="text" name="name"
                                id="name" placeholder="" required>
                        </div>
                        <div class="md:flex mb-4">
                            <div class="md:flex-1 md:pr-3">
                                <label
                                    class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Email</label>
                                <input class="w-full shadow-inner p-4 border-0.5 rounded" type="email" name="email"
                                    id="email" placeholder="" required>
                            </div>
                            <div class="md:flex-1 md:pl-3">
                                <label
                                    class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Tempat
                                    dan Tanggal Lahir</label>
                                    <div class="flex">
                                        <input class="flex-1 shadow-inner p-4 border-0.5 mr-2 rounded" type="text" name="place" id="place" placeholder="Tempat Lahir" required>
                                        <input class="flex-1 shadow-inner p-4 border-0.5 rounded" type="date" name="date" id="date" required>
                                    </div>
                                <span class="text-xs mb-4 font-thin">Ex: Mataram, 19 September 2000</span>
                            </div>
                        </div>
                        <div class="md:flex mb-4">
                            <div class="md:flex-1 md:pr-3">
                                <label
                                    class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold" for="province_id">Provinsi</label>
                                <div class="w-full flex">
                                    <select class="province-create w-full shadow-inner p-4 border-0.5 rounded" name="province_id" id="province_id"
                                        placeholder="" required>
                                        <option selected value="">Pilih Provinsi</option>
                                        @foreach ($provinces as $province)
                                            @if (old('province_id') == $province->id)
                                                <option value="{{ $province->id }}" selected>{{$province->name}}</option>
                                            @else
                                                <option value="{{ $province->id }}">{{$province->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="md:flex-1 md:pl-3">
                                <label
                                    class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold" for="regency_id">Kabupaten/Kota</label>
                                <div class="w-full flex">
                                    <select class="regency-create w-full shadow-inner p-4 border-0.5 rounded" name="regency_id" id="regency_id"
                                        placeholder="" required disabled>
                                        <option selected value="">Pilih Kabupaten/Kota</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="md:flex mb-4">
                            <div class="md:flex-1 md:pr-3">
                                <label
                                    class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold" for="district_id">Kecamatan</label>
                                <div class="w-full flex">
                                    <select class="district-create w-full shadow-inner p-4 border-0.5 rounded" name="district_id" id="district_id"
                                        placeholder="" required disabled>
                                        <option selected value="">Pilih Kecamatan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="md:flex-1 md:pl-3">
                                <label
                                    class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold" for="village_id">Desa/Kelurahan</label>
                                <div class="w-full flex">
                                    <select class="village-create w-full shadow-inner p-4 border-0.5 rounded" name="village_id" id="village_id"
                                        placeholder="" required disabled>
                                        <option selected value="">Pilih Desa/Kelurahan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="md:flex mb-4">
                            <div class="md:flex-1 md:pr-3">
                                <label class="block uppercase tracking-wide text-xs font-bold">No. Telp</label>
                                <input class="w-full shadow-inner p-4 border-0.5 rounded" type="text" name="phone"
                                    id="phone" placeholder="" required>
                            </div>
                            <div class="md:flex-1 md:pl-3">
                                <label class="block uppercase tracking-wide text-xs font-bold">Engagement Rate</label>
                                <input class="w-full shadow-inner p-4 border-0.5 rounded" type="number" name="engagement"
                                    id="engagement" placeholder="" pattern="^[0-9]+$" title="Tidak boleh ada koma atau titik" required>
                                <span class="text-xs mb-4 font-thin">check on <a
                                        href="https://phlanx.com/engagement-calculator"
                                        class="text-blue-800">here</a></span>
                            </div>
                        </div>
                        
                        <div class="md:flex mb-4">
                            <div class="md:flex-1 md:pr-3">
                                <label class="block uppercase tracking-wide text-xs font-bold">Photo</label>
                                <input class="w-full shadow-inner border-0.5 rounded" type="file" name="photo"
                                    id="photo">
                                <span class="text-xs mb-4 font-thin">SVG, PNG, JPG or GIF (MAX. 5MB).</span>
                                
                            </div>
                            <div class="md:flex-1 md:pl-3">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:flex mb-8">
                    <div class="md:w-1/3">
                        <legend class="uppercase tracking-wide text-sm">Kategori</legend>
                    </div>
                    <div class="md:flex-1 mt-2 mb:mt-0 md:px-3">
                        <div class="md:flex mb-4">
                            <div class="md:flex-1 md:pr-3">
                                <label
                                    class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold mb-4">Pilih
                                    Kategori</label>
                                <div class="grid grid-cols-5 gap-4">
                                    @foreach ($categories as $category)
                                        <div class="flex items-center me-4">
                                            <input id="category_id" name="category_id[]" type="checkbox"
                                                value="{{ $category->id }}"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="category_id"
                                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $category->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:flex mb-8">
                    <div class="md:w-1/3">
                        <legend class="uppercase tracking-wide text-sm">Instagram</legend>
                    </div>
                    <div class="md:flex-1 mt-2 mb:mt-0 md:px-3">
                        <div class="md:flex mb-4">
                            <div class="md:flex-1 md:pr-3">
                                <label
                                    class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">username</label>
                                <div class="w-full flex">
                                    <input class="flex-1 shadow-inner p-4 border-0.5 rounded" type="text" name="instagram"
                                        id="instagram" placeholder=""  required>
                                </div>
                            </div>
                            <div class="md:flex-1 md:pl-3 mt-2 md:mt-0">
                                <label
                                    class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Followers
                                    IG</label>
                                <div class="w-full flex">
                                    <input class="flex-1 shadow-inner p-4 border-0.5 rounded" type="number"
                                        name="finstagram" id="finstagram" placeholder=""  pattern="^[0-9]+$" title="Tidak boleh ada koma atau titik" required>
                                </div>
                                <span class="text-xs mb-4 font-thin">Username Ig</span>
                            </div>
                        </div>
                        <div class="md:flex mb-4">
                            <div class="md:flex-1 md:pr-3">
                                <label
                                    class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Rate
                                    Card IG Story</label>
                                <div class="w-full flex">
                                    <input class="flex-1 shadow-inner p-4 border-0.5 rounded" type="number" name="rate_igs"
                                        id="rate_igs" placeholder="" pattern="^[0-9]+$" title="Tidak boleh ada koma atau titik" required>
                                </div>
                                <span class="text-xs mb-4 font-thin">tanpa titik atau koma</span>
                            </div>
                            <div class="md:flex-1 md:pl-3 mt-2 md:mt-0">
                                <label
                                    class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Rate
                                    Card IG Feed</label>
                                <div class="w-full flex">
                                    <input class="flex-1 shadow-inner p-4 border-0.5 rounded" type="number" name="rate_igf"
                                        id="rate_igf" placeholder="" pattern="^[0-9]+$" title="Tidak boleh ada koma atau titik" required>
                                </div>
                                <span class="text-xs mb-4 font-thin">tanpa titik atau koma</span>
                            </div>
                        </div>
                        <div class="md:flex mb-4">
                            <div class="md:flex-1 md:pr-3">
                                <label
                                    class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Rate
                                    Card IG Reels</label>
                                <div class="w-full flex">
                                    <input class="flex-1 shadow-inner p-4 border-0.5 rounded" type="number" name="rate_igr"
                                        id="rate_igr" placeholder="" pattern="^[0-9]+$" title="Tidak boleh ada koma atau titik" required>
                                </div>
                                <span class="text-xs mb-4 font-thin">tanpa titik atau koma</span>
                            </div>
                            <div class="md:flex-1 md:pl-3 mt-2 md:mt-0">
                                <label
                                    class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Rate
                                    Card IG Live</label>
                                <div class="w-full flex">
                                    <input class="flex-1 shadow-inner p-4 border-0.5 rounded" type="number" name="rate_igl"
                                        id="rate_igl" placeholder="" pattern="^[0-9]+$" title="Tidak boleh ada koma atau titik" required>
                                </div>
                                <span class="text-xs mb-4 font-thin">tanpa titik atau koma</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:flex mb-8">
                    <div class="md:w-1/3">
                        <legend class="uppercase tracking-wide text-sm">Tiktok</legend>
                    </div>
                    <div class="md:flex-1 mt-2 mb:mt-0 md:px-3">
                        <div class="md:flex mb-4">
                            <div class="md:flex-1 md:pr-3">
                                <label
                                    class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">username</label>
                                <div class="w-full flex">
                                    <input class="flex-1 shadow-inner p-4 border-0.5 rounded" type="text" name="tiktok"
                                        id="tiktok" placeholder="" required>
                                </div>
                            </div>
                            <div class="md:flex-1 md:pl-3 mt-2 md:mt-0">
                                <label
                                    class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Followers
                                    Tiktok</label>
                                <div class="w-full flex">
                                    <input class="flex-1 shadow-inner p-4 border-0.5 rounded" type="number" name="ftiktok"
                                        id="ftiktok" placeholder="" pattern="^[0-9]+$" title="Tidak boleh ada koma atau titik" required>
                                </div>
                                <span class="text-xs mb-4 font-thin">tanpa titik atau koma</span>
                            </div>
                        </div>
                        <div class="md:flex mb-4">
                            <div class="md:flex-1 md:pr-3">
                                <label
                                    class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Rate
                                    Card Tiktok Feed</label>
                                <div class="w-full flex">
                                    <input class="flex-1 shadow-inner p-4 border-0.5 rounded" type="number" name="rate_ttf"
                                        id="rate_ttf" placeholder="" pattern="^[0-9]+$" title="Tidak boleh ada koma atau titik" required>
                                </div>
                                <span class="text-xs mb-4 font-thin">tanpa titik atau koma</span>
                            </div>
                            <div class="md:flex-1 md:pl-3 mt-2 md:mt-0">
                                <label
                                    class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Rate
                                    Card Tiktok Live</label>
                                <div class="w-full flex">
                                    <input class="flex-1 shadow-inner p-4 border-0.5 rounded" type="number" name="rate_ttl"
                                        id="rate_ttl" placeholder="" pattern="^[0-9]+$" title="Tidak boleh ada koma atau titik" required>
                                </div>
                                <span class="text-xs mb-4 font-thin">tanpa titik atau koma</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:flex mb-8">
                    <div class="md:w-1/3">
                        <legend class="uppercase tracking-wide text-sm">Youtube</legend>
                    </div>
                    <div class="md:flex-1 mt-2 mb:mt-0 md:px-3">
                        <div class="md:flex mb-4">
                            <div class="md:flex-1 md:pr-3">
                                <label
                                    class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">username</label>
                                <div class="w-full flex">
                                    <input class="w-full shadow-inner p-4 border-0.5 rounded" type="text" name="youtube"
                                        id="youtube" placeholder="" required>
                                </div>
                            </div>
                        </div>
                        <div class="md:flex mb-4">
                            <div class="md:flex-1 md:pr-3">
                                <label
                                    class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Subscriber
                                    Youtube</label>
                                <div class="w-full flex">
                                    <input class="flex-1 shadow-inner p-4 border-0.5 rounded" type="number" name="syoutube"
                                        id="syoutube" placeholder=""  pattern="^[0-9]+$" title="Tidak boleh ada koma atau titik" required>
                                </div>
                                <span class="text-xs mb-4 font-thin">tanpa titik atau koma</span>
                            </div>
                            <div class="md:flex-1 md:pl-3 mt-2 md:mt-0">
                                <label
                                    class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Rate
                                    Card Youtube</label>
                                <div class="w-full flex">
                                    <input class="flex-1 shadow-inner p-4 border-0.5 rounded" type="number" name="rate_yt"
                                        id="rate_yt" placeholder="" pattern="^[0-9]+$" title="Tidak boleh ada koma atau titik" required>
                                </div>
                                <span class="text-xs mb-4 font-thin">tanpa titik atau koma</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:flex mb-8">
                    <div class="md:w-1/3">
                        <legend class="uppercase tracking-wide text-sm">Rate Card Event Attendance</legend>
                    </div>
                    <div class="md:flex-1 mt-2 mb:mt-0 md:px-3">
                        <div class="md:flex mb-4">
                            <div class="md:flex-1 md:pr-3">
                                <div class="w-full flex">
                                    <input class="w-full shadow-inner p-4 border-0.5 rounded" type="number"
                                        name="rate_event" placeholder="" pattern="^[0-9]+$" title="Tidak boleh ada koma atau titik" required>
                                </div>
                                <span class="text-xs mb-4 font-thin">tanpa titik atau koma</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:flex mb-8">
                    <div class="md:w-1/3">
                        <legend class="uppercase tracking-wide text-sm">Apakah kamu berminat menjadi talent prioritas?
                        </legend>
                        <span class="text-xs mb-4 font-thin">Exclusive Talent akan diprioritaskan untuk diajukan kepada
                            brand dan berhak mengikuti exclusive event FYP Media x Brand Ternama. Persyaratan:
                            mencantumkan CP 085175123014 (Jaya) dan @fypmedia.id di bio instagram</span>
                    </div>
                    <div class="md:flex-1 mt-2 mb:mt-0 md:px-3">
                        <div class="md:flex mb-4">
                            <div class="md:flex-1 md:pr-3">
                                <div class="flex items-center mb-4">
                                    <input id="talent_exclusive" type="radio" name="talent_exclusive"
                                        value="1" name="default-radio"
                                        class="w-4 h-4 rounded text-gray-600 bg-gray-100 border-gray-300 focus:ring-gray-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                        required>
                                    <label for="talent_exclusive"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ya, saya
                                        bersedia (Of course)</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="talent_exclusive" type="radio" name="talent_exclusive"
                                        value="0" name="default-radio"
                                        class="w-4 h-4 rounded text-gray-600 bg-gray-100 border-gray-300 focus:ring-gray-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                        required>
                                    <label for="talent_exclusive"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak, saya
                                        ingin menjadi talent basic saja (No, i am not)</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:flex mb-8">
                    <div class="md:w-1/3">
                        <legend class="uppercase tracking-wide text-sm">PIC (Siapa yang menghubungi)</legend>
                        <span class="text-xs mb-4 font-thin">Setelah Submit, konfirmasi ke Nomor 085175460533 (Fia) ya.
                            <a href="http://wa.me/6285175460533"
                                class="text-blue-800">(wa.me/6285175460533)</a></span>
                    </div>
                    <div class="md:flex-1 mt-2 mb:mt-0 md:px-3">
                        <div class="md:flex mb-4">
                            <div class="md:flex-1 md:pr-3">
                                <select class="w-full shadow-inner p-4 border-0.5 rounded" id="staff_id" name="staff_id"
                                    required>
                                    <option value="" selected>Pilih PIC</option>
                                    <option value="input_manual">Input Manual</option>
                                    @foreach ($staffs as $staff)
                                        <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- INPUT PIC  (MANUAL) --}}
                        <div class="mb-4 hidden" id="input_data_pic_manual">
                            <div class="mb-4">
                                <div class="md:flex-1 md:pr-3">
                                    <label class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">NAMA PIC </label>
                                    <input class="w-full shadow-inner p-4 border-0.5 rounded" type="text" name="manual_staff_name" required>
                                </div>
                            </div>
                            {{-- <div class="mb-4">
                                <div class="md:flex-1 md:pr-3">
                                    <label class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">EMAIL PIC </label>
                                    <input class="w-full shadow-inner p-4 border-0.5" type="text" name="manual_staff_email" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="md:flex-1 md:pr-3">
                                    <label class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">NO HP PIC</label>
                                    <input class="w-full shadow-inner p-4 border-0.5" type="text" name="manual_staff_phone" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="md:flex-1 md:pr-3">
                                    <label class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">TANGGAL LAHIR PIC</label>
                                    <input class="w-full shadow-inner p-4 border-0.5" type="date" name="manual_staff_birth" required>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="md:flex mb-8">
                    <div class="md:w-1/3">
                        <legend class="uppercase tracking-wide text-sm">Affiliate</legend>
                    </div>
                    <div class="md:flex-1 mt-2 mb:mt-0 md:px-3">
                        <div class="md:flex mb-4">
                            <div class="md:flex-1 md:pr-3">
                                <label
                                    class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Apakah
                                    Tertarik Bergabung Menjadi Shopee Affiliate?</label>
                                <select class="w-full shadow-inner p-4 border-0.5 rounded" name="shopee_affiliate"
                                    placeholder="" required>
                                    <option value="" selected>Choose option</option>
                                    <option value="1">Ya, saya mau</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="md:flex mb-4">
                            <div class="md:flex-1 md:pr-3">
                                <label
                                    class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Apakah
                                    Tertarik Bergabung Menjadi Tiktok Affiliate?</label>
                                <div class="w-full flex">
                                    <select class="w-full shadow-inner p-4 border-0.5 rounded" name="tiktok_affiliate"
                                        placeholder="" required>
                                        <option value="" selected>Choose option</option>
                                        <option value="1">Ya, saya mau</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                </div>
                            </div>
                            <div class="md:flex-1 md:pl-3 mt-2 md:mt-0">
                                <label
                                    class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Apakah
                                    Tertarik Bergabung di MCN Tiktok FYP?</label>
                                <div class="w-full flex">
                                    <select class="w-full shadow-inner p-4 border-0.5 rounded" name="mcn_tiktok"
                                        placeholder="" required>
                                        <option value="" selected>Choose option</option>
                                        <option value="1">Ya, saya mau</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:flex border border-t-1 border-b-0 border-x-0 border-cream-dark">
                    <div class="md:flex-1 px-3 text-center md:text-right">
                        <button type="submit"
                            class="text-white bg-gray-800 hover:bg-black focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mt-4 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Kirim</button>
                    </div>
                </div>
            </form>
        </section>
    </main>
    <script>
        $(document).ready(function (){
            $('input[name="phone"]').on('input', function(event) {
                // Hilangkan karakter non-angka
                $(this).val($(this).val().replace(/[^0-9]/g, ''));
            });
        });
    </script>
    <script>
        document.getElementById('tiktok').addEventListener('input', function(event) {
            var input = event.target;
            var value = input.value;
            if (value && !value.startsWith('@')) {
                input.value = '@' + value;
            }
        });


        var labelElements = document.getElementsByTagName('label');
        var inputElements = document.getElementsByTagName('input');
        var selectElements = document.getElementsByTagName('select');

        // Mengiterasi melalui setiap elemen input
        for (var i = 0; i < inputElements.length; i++) {
            var element = inputElements[i];

            // Jika elemen adalah input atau select dan memiliki atribut required
            if ((element.tagName.toLowerCase() === 'input' || element.tagName.toLowerCase() === 'select') && element
                .hasAttribute('required')) {
                // Membuat elemen span baru
                var asteriskSpan = document.createElement('span');
                asteriskSpan.innerHTML = '<span class="text-red-500 ml-1">*</span>';

                // Menambahkan elemen span ke dalam label
                labelElements[i].appendChild(asteriskSpan);
            }
        }


        // DROPDOWN PIC
        // ------------------------------------------------------------------------
        var staffID = document.getElementById('staff_id');
        var stafDataManualy = document.getElementById('input_data_pic_manual');

        staffID.addEventListener('change', function() {
            if (this.value === 'input_manual') {
                stafDataManualy.style.display = 'block';
                var inputsManual = stafDataManualy.querySelectorAll('input');
                inputsManual.forEach(function(input) {
                    input.setAttribute('required', 'required');
                });
            } else {
                stafDataManualy.style.display = 'none';
                var inputsManual = stafDataManualy.querySelectorAll('input');
                inputsManual.forEach(function(input) {
                    input.removeAttribute('required');
                });
            }
        });
    </script>
    <script src="{{ asset('js/dropdown-create-indo-region.js') }}"></script>
</body>
