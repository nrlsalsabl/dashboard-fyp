<button type="button" data-modal-target="edit-data-modal-{{ $talent->id }}"
    data-modal-toggle="edit-data-modal-{{ $talent->id }}"
    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
        <path fill-rule="evenodd"
            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
            clip-rule="evenodd"></path>
    </svg>
    Edit
</button>

<div class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 h-modal"
    id="edit-data-modal-{{ $talent->id }}">
    <div class="relative w-full h-full max-w-2xl px-4">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700">
                <h3 class="text-xl font-semibold dark:text-white">
                    Edit Talent
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white"
                    data-modal-toggle="edit-data-modal-{{ $talent->id }}">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <form action="/talent/{{ $talent->id }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="grid grid-cols-6 gap-6">

                        {{-- NAME --}}
                        <div class="col-span-6 ">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                            <input type="text" value="{{ $talent->name }}" name="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                            

                        {{-- EMAIL --}}
                        <div class="col-span-4">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" value="{{ $talent->email }}" name="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>

                        {{-- PHONE --}}
                        <div class="col-span-2">
                            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                            <input type="text" value="{{ $talent->phone }}" name="phone" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>


                        {{-- TEMPAT TANGGAL LAHIR --}}
                        <div class="col-span-4">
                            <label for="place" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir</label>
                            <input type="text" value="{{ $talent->place }}" name="place" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>

                        <div class="col-span-2">
                            <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                            <input type="date" value="{{ $talent->date }}" name="date" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>


                        {{-- ALAMAT DOMISILI --}}
                        {{-- Provinsi --}}
                        <div class="col-span-6 sm:col-span-3">
                            <label for="province-edit-{{ $talent->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi</label>
                            <select class="province-edit-{{ $talent->id }} shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" name="province_id" id="province-edit-{{ $talent->id }}" required>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}" @selected(old('province_id', $talent->village?->province?->id) == $province->id)>{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Kabupaten/Kota --}}
                        <div class="col-span-6 sm:col-span-3">
                            <label for="regency-edit-{{ $talent->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kabupaten/Kota</label>
                            <select class="regency-edit-{{ $talent->id }} shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" name="regency_id" id="regency-edit-{{ $talent->id }}" disabled required>
                                <option value="">Pilih Kabupaten/Kota</option>
                            </select>
                        </div>

                        {{-- Kecamatan --}}
                        <div class="col-span-6 sm:col-span-3">
                            <label for="district-edit-{{ $talent->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
                            <select class="district-edit-{{ $talent->id }} shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" name="district_id" id="district-edit-{{ $talent->id }}" disabled required>
                                <option value="">Pilih Kecamatan</option>
                            </select>
                        </div>

                        {{-- Desa/Kelurahan --}}
                        <div class="col-span-6 sm:col-span-3">
                            <label for="village-edit-{{ $talent->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Desa/Kelurahan</label>
                            <select class="village-edit-{{ $talent->id }} shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" name="village_id" id="village-edit-{{ $talent->id }}" disabled required>
                                <option value="">Pilih Desa/Kelurahan</option>
                            </select>
                        </div>


                        <div class="col-span-6">
                            <label for="engagement" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Engagement Rate</label>
                            <input type="text" value="{{ $talent->engagement }}" name="engagement" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>

                        {{-- KATEGORI --}}
                        <div class="col-span-6">
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                            <div class="grid grid-cols-5 gap-4">
                                @foreach ($categories as $category)
                                    <div class="flex items-center me-4">
                                        <input id="category-{{ $category->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" type="checkbox" name="category_id[]" value="{{ $category->id }}" @if($talent->categories->contains($category)) checked @endif>
                                        <label for="category-{{ $category->id }}" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">{{ $category->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>


                        {{-- INFORMASI INSTAGRAM --}}
                        <h1 class="text-xl font-semibold dark:text-white">Instagram</h1>
                        <div class="col-span-6">
                            <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username Instagram</label>
                            <input type="text" value="{{ $talent->instagram }}" name="instagram" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                        <div class="col-span-2">
                            <label for="finstagram" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Follower Instagram</label>
                            <input type="text" value="{{ $talent->finstagram }}" name="finstagram" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                        <div class="col-span-2">
                            <label for="rate_igs" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rate Instagram Story</label>
                            <input type="text" value="{{ $talent->rate_igs }}" name="rate_igs" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                        <div class="col-span-2">
                            <label for="rate_igf" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rate Instagram Feed</label>
                            <input type="text" value="{{ $talent->rate_igf }}" name="rate_igf" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                        <div class="col-span-2">
                            <label for="rate_igr" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rate Instagram Reels</label>
                            <input type="text" value="{{ $talent->rate_igr }}" name="rate_igr" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                        <div class="col-span-2">
                            <label for="rate_igl" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rate Instagram Live</label>
                            <input type="text" value="{{ $talent->rate_igl }}" name="rate_igl" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                        <div class="col-span-2"></div>

                        {{-- INFORMASI TIKTIK --}}
                        <h1 class="text-xl font-semibold dark:text-white">Tiktok</h1>
                        <div class="col-span-6">
                            <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username TikTok</label>
                            <input type="text" value="{{ $talent->tiktok }}" name="tiktok" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                        <div class="col-span-2">
                            <label for="ftiktok" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Follower Tiktok</label>
                            <input type="text" value="{{ $talent->ftiktok }}" name="ftiktok" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                        <div class="col-span-2">
                            <label for="rate_ttf" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rate Tiktok Feed</label>
                            <input type="text" value="{{ $talent->rate_ttf }}" name="rate_ttf" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                        <div class="col-span-2">
                            <label for="rate_ttl" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rate Tiktok Live</label>
                            <input type="text" value="{{ $talent->rate_ttl }}" name="rate_ttl" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>

                        {{-- Informasi Youtube --}}
                        <h1 class="text-xl font-semibold dark:text-white">Youtube</h1>
                        <div class="col-span-6">
                            <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Youtube</label>
                            <input type="text" value="{{ $talent->youtube }}" name="youtube" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                        <div class="col-span-2">
                            <label for="syoutube" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subscriber Youtube</label>
                            <input type="text" value="{{ $talent->syoutube }}" name="syoutube" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                        <div class="col-span-2">
                            <label for="rate_yt" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rate Youtube</label>
                            <input type="text" value="{{ $talent->rate_yt }}" name="rate_yt" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                        <div class="col-span-2">
                            <label for="rate_event" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rate Event Attendance</label>
                            <input type="text" value="{{ $talent->rate_event }}" name="rate_event" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>

                        {{-- Informasi Data Payment --}}
                        <h1 class="text-xl font-semibold dark:text-white">Data Payment</h1>
                        <div class="col-span-6">
                            <label for="account_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Penerima Rekening</label>
                            <input type="text" value="{{ $talent->account_name }}" name="account_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                        <div class="col-span-full sm:col-span-4">
                            <label for="account_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Rekening</label>
                            <input type="text" value="{{ $talent->account_number }}" name="account_number" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                        <div class="col-span-full sm:col-span-2">
                            <label for="bank_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Bank</label>
                            <input type="text" value="{{ $talent->bank_name }}" name="bank_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                        <div class="col-span-6">
                            <label for="npwp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NPWP</label>
                            <input type="text" value="{{ $talent->npwp }}" name="npwp" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                        <div class="col-span-6">
                            <label for="nik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                            <input type="text" value="{{ $talent->nik }}" name="nik" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>


                        {{-- INFORMASI LAINNYA --}}
                        <h1 class="text-xl font-semibold dark:text-white">Lain Lain</h1>
                        <div class="col-span-6">
                            <label for="rate_event" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Talent Exclusive</label>
                            <select class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" name="talent_exclusive">
                                <option selected value="{{ $talent->talent_exclusive }}">
                                    @if($talent->talent_exclusive == 1)
                                        Ya
                                    @else
                                        Tidak
                                    @endif
                                </option>
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                        </div>


                        <div class="col-span-2">
                            <label for="shopee_affiliate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Shopee Affiliate</label>
                            <select class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" name="shopee_affiliate">
                                <option selected value="{{ $talent->shopee_affiliate }}">
                                    @if($talent->shopee_affiliate == 1)
                                        Ya
                                    @else
                                        Tidak
                                    @endif
                                </option>
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label for="tiktok_affiliate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tiktok Affiliate</label>
                            <select class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" name="tiktok_affiliate">
                                <option selected value="{{ $talent->tiktok_affiliate }}">
                                    @if($talent->tiktok_affiliate == 1)
                                        Ya
                                    @else
                                        Tidak
                                    @endif
                                </option>
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label for="mcn_tiktok" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">MCN Tiktok</label>
                            <select class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" name="mcn_tiktok">
                                <option selected value="{{ $talent->mcn_tiktok }}">
                                    @if($talent->mcn_tiktok == 1)
                                        Ya
                                    @else
                                        Tidak
                                    @endif
                                </option>
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                        </div>

                        {{-- STATUS --}}
                        <div class="col-span-6">
                            <div class="flex justify-between">
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                {{-- <a href=""
                                    class="block mb-2 text-sm font-medium text-gray-900 hover:text-blue-600">Edit
                                    data</a> --}}
                            </div>
                            <select id="underline_select" name="status"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected>Pilih Status</option>
                                <option value="0" {{ $talent->status == 0 ? 'selected' : '' }}>Tidak</option>
                                <option value="1" {{ $talent->status == 1 ? 'selected' : '' }}>Ya</option>
                            </select>
                        </div>
                    </div>
            </div>
            <!-- Modal footer -->
            <div class="items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-700">
                <button
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                    type="submit">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
