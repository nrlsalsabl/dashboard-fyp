$(document).ready(function () {
  let provinceSelect = $("#province_id");
  let regencySelect = $("#regency_id");
  let districtSelect = $("#district_id");
  let villageSelect = $("#village_id");

  // Make ajax request to get regencies based on selected province
  provinceSelect.on("change", function () {
      regencySelect.prop("disabled", true);
      districtSelect.prop("disabled", true);
      villageSelect.prop("disabled", true);

      regencySelect.html(
          '<option selected value="">Pilih Kabupaten/Kota</option>'
      );
      districtSelect.html(
          '<option selected value="">Pilih Kecamatan</option>'
      );
      villageSelect.html(
          '<option selected value="">Pilih Desa/Kelurahan</option>'
      );

      let province_id = $(this).val();
      if (province_id) {
          $.ajax({
              url: "/getRegencies/" + province_id,
              type: "GET",
              dataType: "json",
              success: function (data) {
                  regencySelect.empty();
                  regencySelect.append(
                      '<option selected value="">Pilih Kabupaten/Kota</option>'
                  );
                  $.each(data, function (key, value) {
                      regencySelect.append(
                          '<option value="' +
                              value.id +
                              '">' +
                              value.name +
                              "</option>"
                      );
                  });
                  regencySelect.prop("disabled", false);
              },
          });
      }
  });

  // Make ajax request to get districts based on selected regency
  regencySelect.on("change", function () {
      districtSelect.prop("disabled", true);
      villageSelect.prop("disabled", true);

      districtSelect.html(
          '<option selected value="">Pilih Kecamatan</option>'
      );
      villageSelect.html(
          '<option selected value="">Pilih Desa/Kelurahan</option>'
      );

      let regency_id = $(this).val();
      if (regency_id) {
          $.ajax({
              url: "/getDistricts/" + regency_id,
              type: "GET",
              dataType: "json",
              success: function (data) {
                  districtSelect.empty();
                  districtSelect.append(
                      '<option selected value="">Pilih Kecamatan</option>'
                  );
                  $.each(data, function (key, value) {
                      districtSelect.append(
                          '<option value="' +
                              value.id +
                              '">' +
                              value.name +
                              "</option>"
                      );
                  });
                  districtSelect.prop("disabled", false);
              },
          });
      }
  });

  // Make ajax request to get villages based on selected district
  districtSelect.on("change", function () {
      villageSelect.prop("disabled", true);
      villageSelect.html(
          '<option selected value="">Pilih Desa/Kelurahan</option>'
      );

      let district_id = $(this).val();
      if (district_id) {
          $.ajax({
              url: "/getVillages/" + district_id,
              type: "GET",
              dataType: "json",
              success: function (data) {
                  villageSelect.empty();
                  villageSelect.append(
                      '<option selected value="">Pilih Desa/Kelurahan</option>'
                  );
                  $.each(data, function (key, value) {
                      villageSelect.append(
                          '<option value="' +
                              value.id +
                              '">' +
                              value.name +
                              "</option>"
                      );
                  });
                  villageSelect.prop("disabled", false);
              },
          });
      }
  });
});
