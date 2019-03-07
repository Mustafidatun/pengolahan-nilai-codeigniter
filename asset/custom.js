$(document).ready(function () {
    $("#siswa").keyup(function () {
        $.ajax({
            type: "POST",
            url: "http://localhost/PengolahanNilai/siswa_controller/listsiswa",
            data: {
                keyword: $("#siswa").val()
            },
            dataType: "json",
            success: function (data) {
                if (data.length > 0) {
                    $('#dropdownsiswa').empty();
                    $('#siswa').attr("data-toggle", "dropdown");
                    $('#dropdownsiswa').dropdown('toggle');
                }
                else if (data.length == 0) {
                    $('#siswa').attr("data-toggle", "");
                }
                $.each(data, function (key,value) {
                    if (data.length >= 0)
                        $('#dropdownsiswa').append('<li role="displaysiswa" ><a role="menuitem dropdownsiswali" class="dropdownlivalue">' + value['nama_siswa'] + '</a></li>');
                });
            }
        });
    });
    $('ul.txtsiswa').on('click', 'li a', function () {
        $('#siswa').val($(this).text());
    });
});