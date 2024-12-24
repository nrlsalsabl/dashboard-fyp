<div class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 h-modal" id="add-user-modal">
    <div class="relative w-full h-full max-w-2xl px-4">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700">
                <h3 class="text-xl font-semibold dark:text-white">
                    Tambah Data Intern
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white" data-modal-toggle="add-user-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <form action="/intern" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap<span class="text-red-500">*</span></label>
                            <input type="text" name="name" id="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 @error('name') border border-red-500 text-red-900 placeholder-red-700 @enderror" placeholder="John Doe" required>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email<span class="text-red-500">*</span></label>
                            <input type="email" name="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 @error('name') border border-red-500 text-red-900 placeholder-red-700 @enderror" placeholder="johndoe@gmail.com" required>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="place" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir<span class="text-red-500">*</span></label>
                            <input type="text" name="place" id="place" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Jakarta" required>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="birth" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir<span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-2.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>                                  
                                </div>
                                <input datepicker datepicker-autohide datepicker-format="yyyy-mm-dd" type="text" name="birth" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date" required>
                            </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor HP<span class="text-red-500">*</span></label>
                            <input type="text" name="phone" id="phone" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="081234567890" required>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="position" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Posisi<span class="text-red-500">*</span></label>
                            <select name="position_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option selected value="">Pilih Posisi</option>
                                    @foreach ($positions as $position)
                                        @if (old('position_id') == $position->id)
                                            <option value="{{ $position->id }}" selected>{{$position->name}}</option>
                                        @else
                                            <option value="{{ $position->id }}">{{$position->name}}</option>
                                        @endif
                                    @endforeach
                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="province" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi<span class="text-red-500">*</span></label>
                            <select name="province_id" class="province-create bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
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
                        <div class="col-span-6 sm:col-span-3">
                            <label for="regency" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kabupaten/Kota<span class="text-red-500">*</span></label>
                            <select name="regency_id" disabled class="regency-create bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option selected value="">Pilih Kabupaten/Kota</option>
                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="district" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan<span class="text-red-500">*</span></label>
                            <select name="district_id" disabled class="district-create bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option selected value="">Pilih Kecamatan</option>
                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="village" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Desa/Kelurahan<span class="text-red-500">*</span></label>
                            <select name="village_id" disabled class="village-create bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option selected value="">Pilih Desa/Kelurahan</option>
                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="instagram" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instagram<span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-2.5 pointer-events-none">
                                    <svg class="w-6 h-6 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M12 20a8 8 0 0 1-5-1.8v-.6c0-1.8 1.5-3.3 3.3-3.3h3.4c1.8 0 3.3 1.5 3.3 3.3v.6a8 8 0 0 1-5 1.8ZM2 12a10 10 0 1 1 10 10A10 10 0 0 1 2 12Zm10-5a3.3 3.3 0 0 0-3.3 3.3c0 1.7 1.5 3.2 3.3 3.2 1.8 0 3.3-1.5 3.3-3.3C15.3 8.6 13.8 7 12 7Z" clip-rule="evenodd"/>
                                    </svg>                                    
                                </div>
                            <input type="text" name="instagram" id="instagram" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="e.g. @fypmedia.id" required>
                            </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="linkedin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">LinkedIn<span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-2.5 pointer-events-none">
                                    <svg class="w-6 h-6 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M12.5 8.8v1.7a3.7 3.7 0 0 1 3.3-1.7c3.5 0 4.2 2.2 4.2 5v5.7h-3.2v-5c0-1.3-.2-2.8-2.1-2.8-1.9 0-2.2 1.3-2.2 2.6v5.2H9.3V8.8h3.2ZM7.2 6.1a1.6 1.6 0 0 1-2 1.6 1.6 1.6 0 0 1-1-2.2A1.6 1.6 0 0 1 6.6 5c.3.3.5.7.5 1.1Z" clip-rule="evenodd"/>
                                        <path d="M7.2 8.8H4v10.7h3.2V8.8Z"/>
                                    </svg>                                      
                                </div>
                            <input type="text" name="linkedin" id="linkedin" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="e.g. fyp-media-corp" required>
                            </div>
                        </div>
                        <div class="col-span-6">
                            <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat<span class="text-red-500">*</span></label>
                            <textarea id="address" name="address" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Input address" required></textarea>
                        </div>
                    </div> 
                </div>
                <!-- Modal footer -->
                <div class="items-center p-6 border-t border-gray-200 rounded-b">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('js/dropdown-create-indo-region.js') }}"></script>