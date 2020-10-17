var url = "http://localhost/si-rubah/"
	$(".kirim_surat").submit(function(event) {
	event.preventDefault();
	if(($('#image1').val()=='') ||($('#image2').val()=='') ||($('#image3').val()=='') ||($('#image4').val()=='') || ($('#image5').val()=='') ||  ($('#image6').val()=='')) {
			if(
				$(".pesan_error")
					.children()
					.hasClass("alert") != true
				){
					$(".pesan_error").prepend(
						'<div class="col-7 alert alert-danger">file masih kosong, silahkan unggah berkas yang diperlukan!</div>'
					);

				} else {
					$(".pesan_error>.alert").replaceWith(
						'<div class="col-7 alert alert-danger">file masih kosong, silahkan unggah berkas yang diperlukan!</div>'
						);
				};
		return false;
	}

	var data = new FormData(this);
		$.ajax({
			url: 'http://localhost/si-rubah/Pengajuan_surat/'+$('#controller').val(),
			type: "POST",
			dataType: "JSON",
			data: data,
			processData: false,
			contentType: false,
			cache: false,
			beforeSend: function() {},
			success: function(data) {
				window.location.href=url+'Cek_Status';
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert(jqXHR.responseText);
			}
		});
	});


$("document").ready(function(){
	$(".custom-file-input").on("change", function(){
		var id = $(this).attr('id');
		var file = this.files[0];
		var fileType = file.type;
		var fileSize = file.size;
		var match = ["image/jpeg", "image/png", "image/jpg", "application/pdf"];

		$(".pesan_error")
			.children()
			.remove();

		if( !(fileType == match[0] || fileType == match[1] || fileType == match[2] || fileType == match[3] )){
			if(
				$(".pesan_error")
					.children()
					.hasClass("alert") != true
				){
					$(".pesan_error").prepend(
						'<div class="col-7 alert alert-danger">Format tidak didukung, silahkan upload file JPG, JPEG, PNG atau PDF!</div>'
					);

				} else {
					$(".pesan_error>.alert").replaceWith(
						'<div class="col-7 alert alert-danger">Format tidak didukung, silahkan upload file JPG, JPEG, PNG atau PDF!</div>'
						);
				};
				$('#'+id).val('');
				$('#label_'+id).html('Unggah Berkas');
			return false; 
		};

		if (fileSize >= 12097152){
			if(
				$(".pesan_error")
					.children()
					.hasClass("alert") != true
				){
					$(".pesan_error").prepend(
						'<div class="col-7 alert alert-danger">Ukuran file terlalu besar, Maksimal ukuran file 12MB!</div>'
					);

				} else {
					$(".pesan_error>.alert").replaceWith(
						'<div class="col-7 alert alert-danger">Ukuran file terlalu besar, Maksimal ukuran file 12MB!</div>'
						);
				}
			$('#'+id).val('');
				$('#label_'+id).html('Unggah Berkas');
			return false;
		}
	});
});