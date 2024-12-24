<button type="button" data-modal-target="edit-data-modal-{{ $project->id }}"
    data-modal-toggle="edit-data-modal-{{ $project->id }}"
    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
        <path fill-rule="evenodd"
            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
            clip-rule="evenodd"></path>
    </svg>
    Edit data
</button>

<div class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full"
    id="edit-data-modal-{{ $project->id }}">
    <div class="relative w-full h-full max-w-2xl px-4 md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700">
                <h3 class="text-xl font-semibold dark:text-white">
                    Edit data
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white"
                    data-modal-toggle="edit-data-modal-{{ $project->id }}">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <form action="/project/{{ $project->id }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-3">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Project</label>
                            <input type="text" name="name" id="name"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Project Digital Ads" required value="{{ old('name', $project->name) }}">
                            @error('name')
                                <div class="col-span-3">
                                    <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>


                        <div class="col-span-3">
                            <label for="staff_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PIC</label>
                            <select name="staff_id" id="staff_id"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                @foreach ($staff as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $project->staff_id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('staff_id')
                                <div class="col-span-3">
                                    <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <div class="col-span-3">
                            <label for="brand_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
                            <select name="brand_id" id="brand_id"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                @foreach ($brand as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $project->brand_id ? 'selected' : '' }}>{{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('brand_id')
                                <div class="col-span-3">
                                    <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <div class="col-span-3">
                            <label for="date"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bulan dan
                                Tahun</label>
                            <input type="month" name="date" id="date"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ old('date', \Carbon\Carbon::createFromFormat('Y-m-d', $project->date)->format('Y-m')) }}">
                            @error('date')
                                <div class="col-span-3">
                                    <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <div class="col-span-3">
                            <label for="talent_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Talent</label>
                            <select name="talent_id" id="talent_id"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                @foreach ($talent as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $project->talent_id ? 'selected' : '' }}>
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('talent_id')
                                <div class="col-span-3">
                                    <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <div class="col-span-3">
                            <label for="agency_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agency</label>
                            <select name="agency_id" id="agency_id"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                @foreach ($agency as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $project->agency_id ? 'selected' : '' }}>
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('agency_id')
                                <div class="col-span-3">
                                    <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <div class="col-span-3">
                            <label for="scope_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Scope</label>
                            <select name="scope_id" id="scope_id"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                @foreach ($scopes as $scope)
                                    <option value="{{ $scope->id }}"
                                        {{ $scope->id == $project->scope_id ? 'selected' : '' }}>{{ $scope->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('scope_id')
                                <div class="col-span-3">
                                    <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <div class="col-span-3">
                            <label for="quantity"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Qty</label>
                            <input type="number" name="quantity" id="quantity"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ old('quantity', $project->quantity) }}">
                            @error('quantity')
                                <div class="col-span-3">
                                    <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>


                        <div class="col-span-3">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rate Brand</label>
                            <input type="number" name="rate_brand" id="rate_brand"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ old('rate_brand', $project->rate_brand) }}">
                            @error('rate_brand')
                                <div class="col-span-3">
                                    <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>


                        <div class="col-span-3">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rate
                                Talent</label>
                            <input type="number" name="rate_talent" id="rate_talent"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ old('rate_talent', $project->rate_talent) }}">
                            @error('rate_talent')
                                <div class="col-span-3">
                                    <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>


                        <div class="col-span-3">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pelunasan
                                Talent
                            </label>
                            <input type="date" name="tgl_pelunasan_talent" id="tgl_pelunasan_talent"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ old('tgl_pelunasan_talent', $project->tgl_pelunasan_talent) }}">
                            @error('tgl_pelunasan_talent')
                                <div class="col-span-3">
                                    <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>


                        <div class="col-span-3">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pelunasan
                                Brand
                            </label>
                            <input type="date" name="tgl_pelunasan_brand" id="tgl_pelunasan_brand"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ old('tgl_pelunasan_brand', $project->tgl_pelunasan_brand) }}">
                            @error('tgl_pelunasan_brand')
                                <div class="col-span-3">
                                    <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <div class="col-span-6">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan
                            </label>
                            <textarea name="Keterangan" id="Keterangan" cols="30" rows="5"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">{{ old('Keterangan', $project->Keterangan) }}</textarea>
                            @error('Keterangan')
                                <div class="col-span-3">
                                    <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>


                    </div>
            </div>
            <!-- Modal footer -->
            <div class="items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-700">
                <button
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                    type="submit">Simpan Perubahan</button>
            </div>
            </form>
        </div>
    </div>
</div>