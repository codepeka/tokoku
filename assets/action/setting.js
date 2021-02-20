$(document).ready(function(){
	showData();
});

function showData() {

    //Ajax Load data from ajax
    $.ajax({
        type: "GET",
        url : "setting/showData",
        dataType: "JSON",
        success: function(data)
        {
        	$('#namaToko').val(data.nama_toko);
        	$('#tglUbah').html(`Terakhir diubah pada tanggal : <code>${data.tgl_ubah}</code>.`);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            swal("Gagal!"," Data Gagal Ditampilkan", "error"); // pesan gagal
            console.log(jqXHR + textStatus + errorThrown);
        }
    });
}

function save() {
	event.preventDefault();
    $('#btnSave').text('Loading...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 

    //Ajax Load data from ajax
    $.ajax({
        url : "setting/save",
        type: "POST",
        data: $('#myForm').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
        	showData();
        	swal("Good job!", "Data Berhasil Disimpan", "success"); // pesan gagal
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            swal("Gagal!", "Data Gagal Disimpan", "error"); // pesan gagal
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
 
        }
    });
}