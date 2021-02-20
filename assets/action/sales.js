$(document).ready(function() {
	detail();
	// notifDel();
	orderMenu();

  	$(".uang").maskMoney({
        thousands:'.', 
        decimal:',', 
        precision:0
    });

    $("#diskon").on('keyup', function() {
    	let totalHarganya = $('#totalHarganya').html().split('.').join('');
    	let diskon = $(this).val().split('.').join('');
    	$("#tothar").html(new Intl.NumberFormat().format(totalHarganya - diskon).split(',').join('.'));
    });
});

function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    return !(charCode > 31 && (charCode < 48 || charCode > 57));
}

function detail() {
    //Ajax Load data from ajax
    $.ajax({
        url : "Sales/ajax_detail",
        type: "GET",
        cache: false,
        beforeSend: function() { 
        	$('#dataProducts').html(`<h1 class="styleProduct">Loading...</h1>`); 
    	},
        success: function(data) {
        	let html;

 			if (data == '') {
 				html = `<h1 class="styleProduct">Produk Kosong</h1>`;
 			} else {
 				html = data;
 			}

        	$('#dataProducts').html(html);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            swal("Gagal!"," Data Gagal Ditampilkan", "error"); // pesan gagal
        }
    });
}

function search(name) {
    //Ajax Load data from ajax
    if (name != null) {
	    $.ajax({
	        url : "Sales/search",
	        type: "POST",
	        data: {name:name},
	        beforeSend: function() { 
	        	$('#dataProducts').html(`<h1 class="styleProduct">Loading...</h1>`); 
	    	},
	        success: function(data) {
	        	let html;

	 			if (data == '') {
	 				html = `<h1 class="styleProduct">Produk Kosong</h1>`;
	 			} else {
	 				html = data;
	 			}

	        	$('#dataProducts').html(html);
	        },
	        error: function (jqXHR, textStatus, errorThrown) {
	            swal("Gagal!"," Data Gagal Ditampilkan", "error"); // pesan gagal
	        }
	    });
    } else {
    	detail();
    }
}

// Aksi Ketika Klik Menu
function myAction(ib, ip) {
	// let idne = $('#' + ib);
	let check = ib.split("-");

	// if (idne.val() == 1){
      insert(check[1], ip); // jika data barang sudah dipilih maka akan menampilkan gagal  
      // idne.val(0);
    // } else {
      // notifDel(ib, ip);
      // idne.val(1);
    // }

	// if (check[0] == "insert") {
	// 	// insert(ip, check[1]);
	// } else if (check[0] == "update") {

	// } 

	console.log(check[0] + " " + check[1] + " - " + ip);
}

// Order Menu 
function orderMenu() {
	$.ajax({
        url : "Sales/orderMenu",
        type: "GET",
        dataType: "JSON",
        cache: false,
        beforeSend: function() { 
        	$('#dataOrderMenu').html(`<h1 class="styleProduct">Loading...</h1>`); 
    	},
        success: function(data) {
        	let html, total_harga, totalPD, diskon = $('#diskon').val().split('.').join('');

 			if (data.html == '') {
 				html = `<h1 class="styleProduct">Order Kosong</h1>`;
	 			total_harga = 0;
	 			totalPD = 0;
 			} else {
 				html = data.html;
	 			total_harga = data.total_harga;
	 			totalPD = data.totalPD;
 			}

        	$('#dataOrderMenu').html(html);
			$('#totalHarganya').html(total_harga);
			$('#tothar').html((data.total_harga.split('.').join('')) - diskon);
			$('#totalPD').html(totalPD);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            swal("Gagal!"," Data Gagal Ditampilkan", "error"); // pesan gagal
        }
    });
}

// Insert Data PD
// jika data barang sudah dipilih maka akan menampilkan gagal
function insert(ib, ip) {
	$.ajax({
		url: "Sales/insertPD/" + ib + "/" + ip,
		type: "GET",
		dataType: 'JSON',
		success: function(data) {
			if (data.status == false) {
				swal("Maaf!"," Data telah ada di Order Menu", "warning");
				console.log("error " + data.status);
			} else {
				console.log("success " + data.status);
				orderMenu();
			}
		}, 
		error: function (jqXHR, textStatus, errorThrown) {
		    swal("Gagal!"," Data Gagal Ditambahkan", "error"); // pesan gagal
		}
	});
}

// Action update
function update(ib, ip, harga, jmlBrg) {
	let brg = ib.split("-");

	$.ajax({
		url: "Sales/updatePD/" + brg[1] + "/" + ip + "/" + harga + "/" + jmlBrg,
		type: "GET",
		dataType: 'JSON',
		success: function(data) {
			let diskon = $('#diskon').val().split('.').join('');

			$('#' + brg[0] + brg[1]).html('Rp. ' + new Intl.NumberFormat().format(harga * jmlBrg).split(',').join('.'));
			// alert(new Intl.NumberFormat().format(harga * jmlBrg).split(',').join('.'));
			$('#totalHarganya').html(data.totalHarga);
			$('#tothar').html(data.totalHarga.split('.').join('') - diskon);
			console.log(data.totalHarga);
		}, 
		error: function (jqXHR, textStatus, errorThrown) {
		    swal("Gagal!"," Data Gagal Diubah", "error"); // pesan gagal
		}
	});

	console.log(ib + "  " + ip + "  " + harga + "  " + jmlBrg);
}

// Action Hapus 
function hapus(ib, ip)
{
	// ajax delete data to database
	$.ajax({
	    url : "Sales/deletePD/" + ib + "/" + ip,
	    type: "GET",
	    success: function(data)
	    {
	    	orderMenu();
	        swal("Data telah terhapus", {
		      icon: "success",
		    });
	    },
	    error: function (jqXHR, textStatus, errorThrown)
	    {
	    	swal("Gagal!", "Data Gagal Dihapus", "error"); // pesan gagal
	    }
	});
}

// Notifikasi sebelum dan sesudah dihapus
function notifDel(ib, ip) {
  swal({
    title: "Yakin Dihapus",
    // text: "Setelah dihapus, kamu tidak akan bisa  recover this imaginary file!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      let check = ib.split("-");
      hapus(check[1], ip);
    }
    // else { swal("Your imaginary file is safe!"); }
  });
}

function bayar() {
	let totalHarga = $('#totalHarganya').html().split('.').join('');
	let diskon = $('#diskon').val().split('.').join('');

	$.ajax({
		url: "Sales/savePemesanan",
		type: "POST",
		data: {totalHarga: totalHarga, diskon: diskon},
		dataType: "JSON",
		success: function(data) 
		{
			if (data.status == true) {
				swal("Data telah disimpan", {
			      icon: "success",
			    });
			    setInterval('window.location.reload()', 1500);
			} else {
				swal("Maaf!", "Anda Belum Memilih Pesanan", "warning");
			}
		}, 
		error: function(jqXHR, textStatus, errorThrown) {
			swal("Gagal!", "Data Gagal Disimpan", "error");
		}
	})
}