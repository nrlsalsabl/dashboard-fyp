$(document).ready(function () {
    // Make ajax request to get regencies based on selected province
    $('.province-create').on("change", function () {
        $('.regency-create').prop("disabled", true);
        $('.district-create').prop("disabled", true);
        $('.village-create').prop("disabled", true);

        $('.regency-create').html(
            '<option selected value="">Pilih Kabupaten/Kota</option>'
        );
        $('.district-create').html(
            '<option selected value="">Pilih Kecamatan</option>'
        );
        $('.village-create').html(
            '<option selected value="">Pilih Desa/Kelurahan</option>'
        );

        let province_id = $(this).val();
        if (province_id) {
            $.ajax({
                url: "/getRegencies/" + province_id,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('.regency-create').empty();
                    $('.regency-create').append(
                        '<option selected value="">Pilih Kabupaten/Kota</option>'
                    );
                    $.each(data, function (key, value) {
                        $('.regency-create').append(
                            '<option value="' +
                                value.id +
                                '">' +
                                value.name +
                                "</option>"
                        );
                    });
                    $('.regency-create').prop("disabled", false);
                },
            });
        }
    });

    // Make ajax request to get districts based on selected regency
    $('.regency-create').on("change", function () {
        $('.district-create').prop("disabled", true);
        $('.village-create').prop("disabled", true);

        $('.district-create').html(
            '<option selected value="">Pilih Kecamatan</option>'
        );
        $('.village-create').html(
            '<option selected value="">Pilih Desa/Kelurahan</option>'
        );

        let regency_id = $(this).val();
        if (regency_id) {
            $.ajax({
                url: "/getDistricts/" + regency_id,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('.district-create').empty();
                    $('.district-create').append(
                        '<option selected value="">Pilih Kecamatan</option>'
                    );
                    $.each(data, function (key, value) {
                        $('.district-create').append(
                            '<option value="' +
                                value.id +
                                '">' +
                                value.name +
                                "</option>"
                        );
                    });
                    $('.district-create').prop("disabled", false);
                },
            });
        }
    });

    // Make ajax request to get villages based on selected district
    $('.district-create').on("change", function () {
        $('.village-create').prop("disabled", true);
        $('.village-create').html(
            '<option selected value="">Pilih Desa/Kelurahan</option>'
        );

        let district_id = $(this).val();
        if (district_id) {
            $.ajax({
                url: "/getVillages/" + district_id,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('.village-create').empty();
                    $('.village-create').append(
                        '<option selected value="">Pilih Desa/Kelurahan</option>'
                    );
                    $.each(data, function (key, value) {
                        $('.village-create').append(
                            '<option value="' +
                                value.id +
                                '">' +
                                value.name +
                                "</option>"
                        );
                    });
                    $('.village-create').prop("disabled", false);
                },
            });
        }
    });
});
