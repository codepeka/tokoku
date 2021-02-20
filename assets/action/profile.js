$(document).ready(function() {
	detail();
});

function detail() {
    //Ajax Load data from ajax
    $.ajax({
        url : "Profile/ajax_detail",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {	
        	$("#nama").val(data.nama);
        	$("#username").val(data.username);
        	$("#passLama").val("");
        	$("#passBaru").val("");
        	$("#ulangiPassBaru").val("");
        	console.log("Data Berhasil Ditampilkan");
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            swal("Gagal!"," Data Profil Gagal Ditampilkan", "error"); // pesan gagal
        }
    });
}

function save()
{
    event.preventDefault();
    $('#btnSave').text('Loading...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
   
    let url = "profile/ajax_update";
    let msgSuccess = "Data Berhasil Diubah";
    let msgError = "Data Gagal Diubah";

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#myForm').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            if(data.status == true) { 
            	swal("Good job!", msgSuccess, "success"); // pesan berhasil
            	detail();
            } else if(data.status == "nosame") {
            	swal("Maaf!", "Password baru anda tidak cocok", "warning");
        	} else if(data.status == "failed") {
            	swal("Maaf!", "Password lama yang anda masukkan salah", "warning");
        	} else {
                $(".needs-validation").addClass('was-validated');
            }
            $('#btnSave').text('Save Changes'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
 
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            swal("Gagal!", msgError, "error"); // pesan gagal
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
 
        }
    });
}