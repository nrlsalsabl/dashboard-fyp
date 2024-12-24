<div class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full"
    id="add-user-modal">
    <div class="relative w-full h-full max-w-2xl px-4 md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700">
                <h3 class="text-xl font-semibold dark:text-white">
                    Tambah Pendapatan
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white"
                    data-modal-toggle="add-user-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <form action="/earnings" method="POST" id="create-earning-form">
                    @csrf
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-6">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Pendapatan</label>
                            <input type="text" name="name" id="name"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 @error('name') border border-red-500 text-red-900 placeholder-red-700 @enderror"
                                placeholder="Masukkan nama pendapatan..." required>
                        </div>
                        <div class="col-span-6 sm:col-span-6">
                            <label for="earnable_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand/Agency</label>
                            <div class="flex">
                                <button id="earnable-button" data-dropdown-toggle="dropdown-earnable"
                                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-500 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
                                    type="button">
                                    Brand <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>
                                <div id="dropdown-earnable"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="earnable-button">
                                        <li>
                                            <button id="brand" type="button"
                                                class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                <div class="inline-flex items-center">
                                                    Brand
                                                </div>
                                            </button>
                                        </li>
                                        <li>
                                            <button id="agency" type="button"
                                                class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                <div class="inline-flex items-center">
                                                    Agency
                                                </div>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <label for="earnable_id" class="sr-only">Pilih Nama</label>
                                <select id="earnable_id" name="earnable_id" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-e-lg border-s-gray-100 dark:border-s-gray-700 border-s-2 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">Pilih Brand</option>
                                </select>
                                <input id="earnable_type" type="hidden" name="earnable_type" required>
                            </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="talent"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Talent</label>
                            <select name="talent_id" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">Pilih talent</option>
                                @foreach ($talents as $talent)
                                    @if (old('talent_id') == $talent->id)
                                        <option value="{{ $talent->id }}" selected>{{ $talent->name }}</option>
                                    @else
                                        <option value="{{ $talent->id }}">{{ $talent->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="date"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-2.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input datepicker datepicker-format="yyyy-mm-dd" type="text" name="date"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Select date" required>
                            </div>
                        </div>
                        <div class="col-span-6 sm:col-span-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SOW</label>
                            <div class="flex flex-wrap gap-3">
                                @foreach ($sows as $sow)
                                    <div class="flex items-center me-4">
                                        <input id="sow-{{ $sow->id }}" name="sows[]" type="checkbox"
                                            value="{{ $sow->id }}"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="sow-{{ $sow->id }}"
                                            class="ms-2 text-sm text-gray-900 dark:text-gray-300">{{ $sow->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <p id="error-sow" class="mt-2 text-sm text-red-600 dark:text-red-500 hidden">Harap pilih minimal 1 SOW.</p>
                        </div>
                        <div class="col-span-6 sm:col-span-6">
                            <label for="rate" id="rate-label"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rate Brand</label>
                            <div class="flex">
                                <span
                                    class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                    Rp
                                </span>
                                <input type="number" inputmode="numeric" name="rate" id="rate" required
                                    class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="1000000">
                            </div>
                        </div>
                        <div class="col-span-6 sm:col-span-6">
                            <label for="link_project"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link
                                Project</label>
                            <input type="text" name="link_project" id="link_project"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 @error('name') border border-red-500 text-red-900 placeholder-red-700 @enderror"
                                placeholder="https://www.contoh-link-project.com">
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="items-center py-6 border-t border-gray-200 rounded-b">
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                            type="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            //  Initial
            $("#earnable_id").prop('disabled', true);
            $.ajax({
                type: "GET",
                url: "/getBrands",
                success: function(response) {
                    let options = '<option value="">Pilih Brand</option>';
                    for (let i = 0; i < response.length; i++) {
                        options += '<option value="' + response[i].id + '">' + response[i].name +
                            '</option>';
                    }
                    $("#earnable_id").html(options);
                    $("#earnable_type").val('App\\Models\\Brand');
                    $("#earnable_id").prop('disabled', false);
                }
            });

            $("#agency").click(function() {
                if ($("#earnable_type").val() != 'App\\Models\\Agency') {
                    $("#earnable_id").prop('disabled', true);
                    $.ajax({
                        type: "GET",
                        url: "/getAgencies",
                        success: function(response) {
                            let options = '<option value="">Pilih Agency</option>';
                            for (let i = 0; i < response.length; i++) {
                                options += '<option value="' + response[i].id + '">' + response[
                                    i].name + '</option>';
                            }
                            $("#earnable_id").html(options);
                            $("#earnable_type").val('App\\Models\\Agency');
                            $("#earnable_id").prop('disabled', false);
                        }
                    });
                    $("#earnable-button").html(
                        'Agency <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/></svg>'
                        );
                    $("#rate-label").html('Rate Agency');
                }
                $("#earnable-button").click();
            });

            $("#brand").click(function() {
                if ($("#earnable_type").val() != 'App\\Models\\Brand') {
                    $("#earnable_id").prop('disabled', true);
                    $.ajax({
                        type: "GET",
                        url: "/getBrands",
                        success: function(response) {
                            let options = '<option value="">Pilih Brand</option>';
                            for (let i = 0; i < response.length; i++) {
                                options += '<option value="' + response[i].id + '">' + response[
                                    i].name + '</option>';
                            }
                            $("#earnable_id").html(options);
                            $("#earnable_type").val('App\\Models\\Brand');
                            $("#earnable_id").prop('disabled', false);
                        }
                    });
                    $("#earnable-button").html(
                        'Brand <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/></svg>'
                        );
                    $("#rate-label").html('Rate Brand');
                }
                $("#earnable-button").click();
            });

            $('#create-earning-form').submit(function(e) {
                // Check if any checkbox named 'options[]' is checked
                if ($('input[name="sows[]"]:checked').length === 0) {
                    e.preventDefault(); // Prevent form submission
                    $('#error-sow').show(); // Show error message
                } else {
                    $('#error-sow').hide(); // Hide error message if at least one is checked
                }
            });
        });
    </script>
