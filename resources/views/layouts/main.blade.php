<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Dashboard HR | {{ $title }}</title>
    <link rel="icon" type="image/x-icon" href="https://media.licdn.com/dms/image/D4E0BAQFFpLZcUp0Qgg/company-logo_200_200/0/1694839430809?e=1726704000&v=beta&t=EQEkZ9MD2YCO-nxv0CX4j_W0Yd1vJ__T4W2a0NViqnA">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    @stack('scripts')
</head>
<body>
    @include('partials.navbar')
    
    @include('partials.aside')

    @if (!request()->is('fdashboard', 'fregistrasi'))
        @include('partials.header')
    @endif
    @if (request()->is('fregistrasi'))
        @include('partials.link')
    @endif
    
    <div class="container max-w-full {{ Request::is('/') ? 'bg-gray-300' : '' }}">
        @yield('container')
    </div>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#select_all_ids").click(function(){
                $('.checkbox_ids').prop('checked', $(this).prop('checked'));
            });

            $('input[name="phone"]').on('input', function(event) {
                // Hilangkan karakter non-angka
                $(this).val($(this).val().replace(/[^0-9]/g, ''));
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

            $('#deleteAllSelectorRecord').click(function(e){
                e.preventDefault();
                if(!confirm("Anda yakin ingin menghapus data ini?")){
                    return;
                }
                let token = $("meta[name='csrf-token']").attr("content");
                let all_ids = [];
                $('input:checkbox[name=ids]:checked').each(function(){
                    all_ids.push($(this).val());
                });

                if(all_ids.length <= 0){
                    alert("Please select records.");
                    return;
                }

                let model = {!! json_encode(request()->path()) !!}
                if (model == 'kinerja-intern') {
                    model = 'performance'
                }

                if (model == 'kinerja-staff') {
                    model = 'indicator'
                }

                $.ajax({
                    url:"/bulk-action",
                    type:"DELETE",
                    data:{
                        ids:all_ids,
                        model: model,
                        _token:token
                    },
                    success: function(response) {
                        if ('error' in response) {
                            $('#error-alert').html(
                                `<div class="flex sm:ml-72 sm:mr-8 mt-4 mitems-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                    </svg>
                                    <span class="sr-only">Info</span>
                                    <div>
                                    <span class="font-medium">${response.error}
                                    </div>
                                </div>`);
                        } else {
                            // console.log(response);
                            // location.reload();
                            let redirectUrl = {!! json_encode(url()->current()) !!};
                            window.location.href = redirectUrl + '?delete_success=true';
                        }
                    },
                    error: e => {
                        console.log(e.responseText)
                    }
                    
                })
            });

            // Fix bug for backdrop sidebar
            $('body').on('click', '[drawer-backdrop]', function() {
                $(this).remove();                
            });

            $('[data-drawer-toggle="logo-sidebar"]').on('click', function() {
                // Check if body have overflow-hidden class
                if ($('body').hasClass('overflow-hidden')) {
                    $('[drawer-backdrop]').remove();
                }
            });
        });
    </script>
    <script>
        document.getElementById('photo').addEventListener('change', function() {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('photo-preview').src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
</body>
</html>