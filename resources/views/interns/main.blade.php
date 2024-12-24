@extends('layouts.main')

@section('container')

@if (session()->has('success') || request()->has('delete_success'))
    <div class="flex sm:ml-72 sm:mr-8 mt-4 mitems-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div>
        <span class="font-medium">{{ session('success', 'Data berhasil dihapus') }}
        </div>
    </div>
@endif
@if ( $errors->any() )
<div class="flex sm:ml-72 sm:mr-8 mt-4 mitems-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <span class="sr-only">Info</span>
    @foreach ($errors->all() as $error)
        <div>
        <span class="font-medium">{{ $error }}
        </div>
    @endforeach
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
                            <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    <input id="select_all_ids" name="ids" aria-describedby="checkbox-1" type="checkbox" class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all" class="sr-only">checkbox</label>
                                </div>
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                <a class="flex justify-between" href="{{ route('intern.index', ['sort' => 'name', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
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
                                <a class="flex justify-between" href="{{ route('intern.index', ['sort' => 'address', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    Alamat
                                    @if (request('sort') == 'address')
                                        @if (request('direction') == 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                <a class="flex justify-between" href="{{ route('intern.index', ['sort' => 'position_id', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    Posisi
                                    @if (request('sort') == 'position_id')
                                        @if (request('direction') == 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                <a class="flex justify-between" href="{{ route('intern.index', ['sort' => 'phone', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    Nomor HP
                                    @if (request('sort') == 'phone')
                                        @if (request('direction') == 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                <a class="flex justify-between" href="{{ route('intern.index', ['sort' => 'birth', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    Tempat, Tanggal Lahir
                                    @if (request('sort') == 'birth')
                                        @if (request('direction') == 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                <a class="flex justify-between" href="{{ route('intern.index', ['sort' => 'village_id', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                    Domisili
                                    @if (request('sort') == 'village_id')
                                        @if (request('direction') == 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                Social Media
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                <a class="flex justify-between" href="{{ route('intern.index', ['sort' => 'status', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
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
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                        @foreach ($tables as $intern)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700" id="{{ $search }}_ids{{ $intern->id }}">
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input id="" aria-describedby="checkbox-1" name="ids" type="checkbox" class="checkbox_ids w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600" value="{{ $intern->id }}">
                                        <label for="checkbox" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <td class="flex items-center p-4 mr-12 space-x-6 whitespace-nowrap">
                                    <div class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                        <div class="text-base font-semibold text-gray-900 dark:text-white">{{ $intern->name }}</div>
                                        <div class="text-sm font-normal text-gray-500 dark:text-gray-400">{{ $intern->email }}</div>
                                    </div>
                                </td>
                                <td class="max-w-sm p-4 overflow-hidden text-base font-normal text-gray-500 truncate xl:max-w-xs dark:text-gray-400">{{ $intern->address }}</td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $intern->position->name }}</td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $intern->phone }}</td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $intern->place }}, {{ \Carbon\Carbon::parse($intern->birth)->format('d F Y') }}</td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $intern->village?->province?->name }}</td>
                                <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">{{ $intern->instagram }}, {{ $intern->linkedin }}</td>
                                <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                    @if ($intern->status == 1)
                                        <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-emerald-500 bg-emerald-100/60 dark:bg-gray-800">
                                            <h2 class="text-sm font-normal">Aktif</h2>
                                        </div>
                                    @else
                                        <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-rose-500 bg-rose-100/60 dark:bg-gray-800">
                                            <h2 class="text-sm font-normal">Tidak Aktif</h2>
                                        </div>
                                    @endif
                                </td>
                                <td class="p-4 space-x-2 whitespace-nowrap">
                                    <!-- Edit User Modal -->
                                    @include('interns.edit')
                                    @can('delete data')
                                    <form action="/intern/{{ $intern->id }}" method="POST" class="inline-flex">
                                        @method('delete')
                                        @csrf
                                        <!-- Delete User Modal -->
                                        @include('interns.delete')
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

<!-- Add User Modal -->
@include('interns.create')

@include('interns.import')


@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            let interns = {{ Js::from($tables->toArray()) }};
            interns = interns.data;

            interns.forEach(intern => {
                $("button[data-modal-target='edit-data-modal-" + intern.id + "']").on("click", function () {
                    // Empty select options
                    emptySelectOptions('regency', intern.id);
                    emptySelectOptions('district', intern.id);
                    emptySelectOptions('village', intern.id);

                    // Return if village_id is null
                    if (intern.village == null) {
                        return;
                    }

                    let provinceId = intern.village.province.id;
                    let regencyId = intern.village.district.regency.id;
                    let districtId = intern.village.district.id;
                    let villageId = intern.village.id;
                    
                    // Populate select options
                    populateSelectOptions('regency', intern.id, provinceId, regencyId);
                    populateSelectOptions('district', intern.id, regencyId, districtId);
                    populateSelectOptions('village', intern.id, districtId, villageId);

                });
                
                // Initialize ajax on onchange event
                $(`.province-edit-${intern.id}`).on("change", function () {
                    populateSelectOptionsOnParentChange('regency', intern.id, $(this).val());
                });

                $(`.regency-edit-${intern.id}`).on("change", function () {
                    populateSelectOptionsOnParentChange('district', intern.id, $(this).val());
                });

                $(`.district-edit-${intern.id}`).on("change", function () {
                    populateSelectOptionsOnParentChange('village', intern.id, $(this).val());
                });
            });

            function emptySelectOptions(fieldName, dataId) {
                let name = '';
                switch (fieldName) {
                    case 'regency':
                        name = "Kabupaten/Kota";
                        break;
                    case 'district':
                        name = "Kecamatan";
                        break;
                    case 'village':
                        name = "Desa/Kelurahan";
                        break;
                    default:
                        break;
                }
                $(`.${fieldName}-edit-${dataId}`).html(
                    `<option value="">Pilih ${name}</option>`
                );
            }

            function disableSelectInput(fieldName, dataId) {
                $(`.${fieldName}-edit-${dataId}`).prop("disabled", true);
            }

            function enableSelectInput(fieldName, dataId) {
                $(`.${fieldName}-edit-${dataId}`).prop("disabled", false);
            }

            function populateSelectOptions(fieldName, dataId, parentFieldId, currentFieldId) {
                let url = '';
                switch (fieldName) {
                    case 'regency':
                        url = "/getRegencies/" + parentFieldId;
                        break;
                    case 'district':
                        url = "/getDistricts/" + parentFieldId;
                        break;
                    case 'village':
                        url = "/getVillages/" + parentFieldId;
                        break;
                    default:
                        break;
                }

                disableSelectInput(fieldName, dataId);
                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $.each(data, function(i, field) {
                            $(`.${fieldName}-edit-${dataId}`).append(
                                '<option ' + (field.id == currentFieldId ? 'selected' : '') + ' value="' +
                                field.id +
                                '">' +
                                field.name +
                                "</option>"
                            );
                        });
                        enableSelectInput(fieldName, dataId);
                    },
                });
            }

            function populateSelectOptionsOnParentChange(fieldName, dataId, parentFieldId) {
                let url = '';
                switch (fieldName) {
                    case 'regency':
                        url = "/getRegencies/" + parentFieldId;
                        emptySelectOptions('regency', dataId);
                        emptySelectOptions('district', dataId);
                        emptySelectOptions('village', dataId);
                        
                        disableSelectInput('regency', dataId);
                        disableSelectInput('district', dataId);
                        disableSelectInput('village', dataId);
                        break;
                    case 'district':
                        url = "/getDistricts/" + parentFieldId;
                        emptySelectOptions('district', dataId);
                        emptySelectOptions('village', dataId);

                        disableSelectInput('district', dataId);
                        disableSelectInput('village', dataId);
                        break;
                    case 'village':
                        url = "/getVillages/" + parentFieldId;
                        emptySelectOptions('village', dataId);
                        disableSelectInput('village', dataId);
                        break;
                    default:
                        break;
                }
                
                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $.each(data, function(i, field) {
                            $(`.${fieldName}-edit-${dataId}`).append(
                                '<option' + ' value="' + field.id + '">' + field.name + "</option>"
                            );
                        });
                        enableSelectInput(fieldName, dataId);
                    },
                });
            }
        });
    </script>
@endpush