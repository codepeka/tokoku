let tableSatu;
 
$(document).ready(function() {
 
    //datatables
    tableSatu = $('#myTableSatu').DataTable({ 
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "DataTransaksi/ajax_list",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],
 
    });

});

function reload_table_satu() {
    tableSatu.ajax.reload(null,false); //reload datatable ajax 
}

function detail(id) {
 	// $('#titleModal').text("Detail Penjualan"); // Set title to Bootstrap modal title
  //   $('#exampleModal').modal('show'); // show bootstrap modal when complete loaded

    //Ajax Load data from ajax
    $.ajax({
        url : "DataTransaksi/ajax_detail/" + id,
        type: "GET",
        cache: false,
        success: function(data)
        {
            $('#titleModal').text("Detail Penjualan"); // Set title to Bootstrap modal title
        	$('#showDataModal').html(data);
            $('#exampleModal').modal('show'); // show bootstrap modal when complete loaded
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            swal("Gagal!"," Data Gagal Ditampilkan", "error"); // pesan gagal
        }
    });
}