    var url = "http://localhost/si-rubah/Profil/"

function E_Profil(nik) {
    $.ajax({
        url: url + "edit_Profil/" + nik,
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            $('#nama').val(data.nama);
            $('#nik').val(data.nik);
            $('#kelurahan').val(data.kelurahan);
            $('#nama_rt').val(data.nama_rt);
            $('#nama_rw').val(data.nama_rw);
            $('#email').val(data.email);
            $('#no_hp').val(data.no_hp);
            $('#alamat').val(data.alamat);
            $('#editprofilModal').modal('show');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('error!');
        }

    });
}

function EditProfil() {
    $.ajax({
        url: url + "update_Profil",
        type: "POST",
        dataType: "JSON",
        data: {
            nama: $('#nama').val(),
            nik: $('#nik').val(),
            kelurahan: $('#kelurahan').val(),
            nama_rt: $('#nama_rt').val(),
            nama_rw: $('#nama_rw').val(),
            email: $('#email').val(),
            no_hp: $('#no_hp').val(),
            alamat: $('#alamat').val(),

        },
        success: function () {
            alert('data berhasil diubah!');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('error!');
        }
    });
}

