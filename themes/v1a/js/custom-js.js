/* setInterval(function() {
    ip = $('#ip-connect').val();
	url = $('#ip-connect').attr('url');
	$.ajax({
		type: 'post', 
		url: url,
		data:{'ip':ip},
		dataType:'json',
		success: function(v) {
			// if(v.sukses == 1){
				// dataChange(v.url);
			// }else {
				// alert(v.errormsg);
			// }
			// hideload()
		}
	});
}, 5000); 
 */
 
 
setInterval(function() {
	// alert(linkRmUse);
	rm = $('input').hasClass('rm-inuse');
	if(rm){
		rm = $('.rm-inuse').val();
		if(rm != '' && rm !== null){
			//alert(rm);
			$.ajax({
				type: 'post', 
				url: linkRmUse,
				data:{'rm':rm},
				dataType:'json',
				success: function(v) {
					// if(v.sukses == 1){
						// dataChange(v.url);
					// }else {
						// alert(v.errormsg);
					// }
					// hideload()
				}
			});
		}
	} 
}, 10000); 

$( document ).ready(function() {
    $('input[readonly]').attr('tabindex','1');
	$('.first-focus').focus();
	
	
});


function numbersonly(e){
    var unicode=e.charCode? e.charCode : e.keyCode
    if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
        // if (unicode<48||unicode>57 ||  e.ctrlKey !== true ) //if not a number
		if ($.inArray(unicode, [46, 8, 9, 27, 13, 110, 190]) !== -1)
			   return false //disable key press
		// if ($.inArray(unicode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || (unicode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) ||   (unicode >= 35 && unicode <= 40))
         
    }
	
	
	// Allow: backspace, delete, tab, escape, enter and .
	/* if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) ||   (e.keyCode >= 35 && e.keyCode <= 40)) {
			 // let it happen, don't do anything
			 return;
	} */
	// Ensure that it is a number and stop the keypress
	/* if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
		e.preventDefault();
	} */
	
}

function showload(){
	//$(".se-pre-con").fadeOut("slow");
	//$('#loading-page').addClass('se-pre-con')
	$(".se-pre-con").fadeIn(300);
	
}
function showload2(){
	//$(".se-pre-con").fadeOut("slow");
	//$('#loading-page').addClass('se-pre-con')
	$(".se-pre-con2").fadeIn(300);
	
}

function hideload(){ 
	$(".se-pre-con").fadeOut(300);
	//$("#loading-page").removeClass('se-pre-con');
}

function hideload2(){ 
	$(".se-pre-con2").fadeOut(300);
	//$("#loading-page").removeClass('se-pre-con');
}

$("#tes").keydown(function (e) {
	// Allow: backspace, delete, tab, escape, enter and .
	if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
		 // Allow: Ctrl+A, Command+A
		(e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
		 // Allow: home, end, left, right, down, up
		(e.keyCode >= 35 && e.keyCode <= 40)) {
			 // let it happen, don't do anything
			 return;
	}
	// Ensure that it is a number and stop the keypress
	if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
		e.preventDefault();
	}
});

function inArray(needle, haystack) {
    var length = haystack.length;
    for(var i = 0; i < length; i++) {
        if(haystack[i] == needle) return true;
    }
    return false;
}



var digitsOnly = /[1234567890]/g;
var floatOnly = /[0-9\.]/g;
var alphaOnly = /[A-Za-z]/g;

function restrictCharacters(myfield, e, restrictionType) {
	if (!e) var e = window.event
	if (e.keyCode) code = e.keyCode;
	else if (e.which) code = e.which;
	var character = String.fromCharCode(code);
	// if they pressed esc... remove focus from field...
	if (code==27) { this.blur(); return false; }
	// ignore if they are press other keys
	// strange because code: 39 is the down key AND ' key...
	// and DEL also equals .
	if (!e.ctrlKey && code!=9 && code!=8 && code!=36 && code!=37 && code!=38 && (code!=39 || (code==39 && character=="'")) && code!=40) {
		if (character.match(restrictionType)) {
			return true;
		} else {
			return false;
		}
	}
}

// function coba(id, url){
// 
$(document).on("click", "a.editajax", function () {
	url = $(this).attr('url');
	popupwindows(url);
});




$(document).on("click", "a.deleteajax", function () {
   url = $(this).attr('url');
	id = $(this).attr('id'); 
		var r = confirm("Yakin Menghapus data?");
		
		if (r == true) {
			showload();
			$.ajax({
				type: 'post', 
				url: url,
				data:{'id':id},
				dataType:'json',
				success: function(v) {
					if(v.sukses == 1){
						dataChange(v.url);
					}else {
						alert(v.errormsg);
					}
					hideload()
				}
			});
			
		}
});

$(document).on("click", "a.deleteajax-2", function () {
   url = $(this).attr('url');
	id = $(this).attr('id'); 
		var r = confirm("Yakin Menghapus data?");
		
		if (r == true) {
			showload();
			$.ajax({
				type: 'post', 
				url: url,
				data:{'id':id},
				dataType:'json',
				success: function(v) {
					if(v.sukses == 1){
						dataChange(v.url);
					}else {
						alert(v.msg);
					}
					hideload()
				}
			});
			
		}
});


$(document).on("click", "a.deleteangsuran-ird", function (e) {
 	
   	url = $(this).attr('url');
   	var id = $(this).attr('name');

	$.ajax({
		type: 'post',
		url: url,
		dataType:'html',
		data : {'id':id},
		success: function(v) {
			$("#mydialog").html(v);
			$('span.ui-dialog-title').html('HAPUS DATA ANGSURAN');
			$("#mydialog").dialog("open");
			$("div.ui-dialog").css({'position':'absolute', 'height':'auto', 'width':'400px', 'display':'block', 'z-index':'101', 'font-size':'14px'});
		}
	});
	
});

$(document).on("click", "a#del-obat-racikan", function (e) {

   	var id = $(this).attr('name');
   	var url = $(this).attr('url');

	$.ajax({
		type: 'post',
		url: url,
		dataType:'json',
		data : {'id':id},
		success: function(v) {
			$('#'+v.target).html(v.html);
		}
	});
	
});


$(document).on('click', 'input#delete-angsuran', function(e){
	var url = $('form#dialog-angsuran-ird-form').attr('action');
	$.ajax({
		type: 'post', 
		url: url,
		data:$('#dialog-angsuran-ird-form').serialize(),
		dataType:'json',
		success: function(v) {
			$('#mydialog').dialog('close');
			$('#detail-transaksi').html(v.html);
			$('#IrdDetailCicilan_saldo_piutang').val(v.viewsaldo);
			$('#IrdDetailCicilan_saldo').val(v.saldo);
			hideload();
			
		}
	});
});

$(document).on('click', 'input#delete-angsuran-ri', function(e){
	var url = $('form#dialog-angsuran-ri-form').attr('action');
	$.ajax({
		type: 'post', 
		url: url,
		data:$('#dialog-angsuran-ri-form').serialize(),
		dataType:'json',
		success: function(v) {
			$('#mydialog').dialog('close');
			$('#detail-transaksi').html(v.html);
			$('#RiDetailCicilan_saldo_piutang').val(v.viewsaldo);
			$('#RiDetailCicilan_saldo').val(v.saldo);
			hideload();
			
		}
	});
});


//delete pembayaran kassa igd
$(document).on("click", "a.delete-pembayaran", function () {
	var delurl = $(this).attr('name');
	var total = $('#total-bill').attr('rel');
	var sisatagihan = $('#rest-of-bill').attr('rel');

	$(this).parents('tr').remove();
	$.ajax({
		type: 'get',
		url: delurl, 
		dataType:'json',
		data:{'total':total, 'sisatagihan':sisatagihan},
		success: function(v) {
			$('td#total-bill').attr('rel', v.total);
			$('td#total-bill').html(v.totalview);
			$('td#rest-of-bill').attr('rel', v.rest);
			$('td#rest-of-bill').html(v.restview);
		}
	});
	
});

$(document).on("click", "a.deleteajax-ird", function () {
	url = $(this).attr('url');
	id = $(this).attr('id'); 
	
	var r = confirm("Yakin Menghapus data?");
	
	if (r == true) {
		
		$.ajax({
			type: 'post',
			url: url,
			data:{'id':id},
			dataType:'json',
			success: function(v) {
				if(v.paid == 1){
					alert('Transaksi Sudah dibayar ! Anda tidak dapat menghapus tindakan');
				}else{
					showload();
					$('#form-pelayanan').html(v.msg);
					hideload();
				}
				
			}
		});
		
	}
	
});


//kassa igd input default bayar
$(document).on("focus", "input#input-default-bayar", function () {
	var value = $(this).parents('td').attr('name');
	$(this).val(value);
});

$(document).on("focusout", "input#input-default-bayar", function () {
	var value = $(this).val();
	$(this).val('');
	$(this).attr('placeholder', toRp(value));
});

$(document).on("keyup", "input#input-default-bayar", function (e) {
	//get value
	var value = $(this).val();

	//get total bill
	var totalbill = $('#total-bill').attr('rel');

	$(this).parents('td').attr('name',value);

	var newValue = totalbill - value;
	$('td#rest-of-bill').html(toRp(newValue));
	$('td#rest-of-bill').attr('rel', newValue);
});

$(document).on("click", "#proses-angsuran", function () {
	var urlAngsuran = $(this).attr('url');
	$.ajax({
		type: 'post',
		url: urlAngsuran,
		dataType:'html',
		data : $('#kassa-ird-cicilan-form').serialize(),
		success: function(v) {
			$("#mydialog").html(v);
			$('span.ui-dialog-title').html('VERIFIKASI TINDAKAN PELAYANAN');
			$("#mydialog").dialog("open");
			$("div.ui-dialog").css({'position':'absolute', 'height':'auto', 'width':'800px', 'left': '352px', 'display':'block', 'z-index':'101', 'font-size':'14px'});
		}
	});
});


/*Proses rawat inap*/
$(document).on("click", "#proses-angsuran-rawatinap", function () {
	var urlAngsuran = $(this).attr('url');
	$.ajax({
		type: 'post',
		url: urlAngsuran,
		dataType:'html',
		data : $('#kassa-rawatinap-cicilan-form').serialize(),
		success: function(v) {
			$("#mydialog").html(v);
			$('span.ui-dialog-title').html('VERIFIKASI TINDAKAN PELAYANAN');
			$("#mydialog").dialog("open");
			$("div.ui-dialog").css({'position':'absolute', 'height':'500px', 'overflow-y':'scroll', 'width':'800px', 'left': '500px', 'display':'block', 'z-index':'101', 'font-size':'14px'});
		}
	});
});


/*$('.deleteajax').on('click', function(){ 
	url = $(this).attr('url');
	id = $(this).attr('id'); 
	bayar = $('#RmHeaderRawatJalan_Bayar').val(); 
	carabayar = $('#RmHeaderRawatJalan_kd_instansi').val(); 
	if(bayar == 1 && carabayar == '01'){
		alert('Tidak dapat menghapus,  Transaksi sudah di proses kassa!');
		hideload();
	}else {
		var r = confirm("Yakin Menghapus data?");
		
		if (r == true) {
			showload();
			$.ajax({
				type: 'post',
				// url: url+'/id/'+id,
				url: url,
				data:{'id':id},
				dataType:'json',
				success: function(v) {
					// if(v.errormsg != "undefined"){
						// alert(v.errormsg);
					// }
					// $("#loading-page").removeClass('se-pre-con');
					$('#form-pelayanan').html(v.msg);
					hideload()
				}
			});
			
		}
	}
	
	
});*/

$(document).on("click", "input#tombol-proses-rawatinap", function(){
	var url = $('#kassa-rawatinap-form').attr('action');
	showload();
	$.ajax({
		type: 'post',
		url: url,
		dataType:'json',
		data : $('#kassa-rawatinap-form').serialize(),
		success: function(v) {

			if(v.return == 'success'){
				$("#mydialog").html(v.msg);
				$('span.ui-dialog-title').html('PESAN');
				$('#RiHeaderPenerimaan_NoPembayaran').val(v.nopembayaran);
				$("#mydialog").dialog("open");
				$("div.ui-dialog").css({'position':'absolute', 'height':'150px', 'width':'300', 'left': '800px', 'top':'400px', 'display':'block', 'z-index':'101', 'font-size':'14px'});
			}else{
				$("#mydialog").html(v.msg);
				$('span.ui-dialog-title').html('PERINGATAN');
				$("#mydialog").dialog("open");
				$("div.ui-dialog").css({'position':'absolute', 'height':'150px', 'width':'300', 'left': '800px', 'top':'400px', 'display':'block', 'z-index':'101', 'font-size':'14px'});
			}
			hideload();
		}
	});
});

$(document).on("click", "input#rawatinap-status-dialog", function(){
	$("#mydialog").dialog("close");
	$('#print-kwitansi').show();
	//$('#kwitansi-standard').show();
	//$('#info-tagihan-ri').hide();
});

$(document).on("click", "a#reset-titipan", function(){
	var url = $(this).attr('action');

	$.ajax({
		type: 'get',
		url: url,
		dataType:'json',
		//data : {'rm':rm, 'kunjungan':kunjungan},
		success: function(v) {

			if(v.return == 'success'){
				$("#mydialog").html(v.msg);
				$('span.ui-dialog-title').html('PESAN');
				$("#mydialog").dialog("open");
				$("div.ui-dialog").css({'position':'absolute', 'height':'150px', 'width':'250', 'left': '600px', 'display':'block', 'z-index':'101', 'font-size':'14px'});
			}else{
				$("#mydialog").html(v.msg);
				$('span.ui-dialog-title').html('PERINGATAN');
				$("#mydialog").dialog("open");
				$("div.ui-dialog").css({'position':'absolute', 'height':'150px', 'width':'250', 'left': '600px', 'display':'block', 'z-index':'101', 'font-size':'14px'});
			}
			
		}
	});
});

$(document).on("click", "input#ubah-status-titipan", function(){
	var url = $('form#dialog-titipan-form').attr('action');

	$.ajax({
		type: 'get',
		url: url,
		dataType:'html',
		data : $('#dialog-titipan-form').serialize(),
		success: function(v) {
			if(v == 1){
				$("#mydialog").dialog("close");
				$('a#reset-titipan').parent('td').html('Bukan titipan');
			}else{
				alert('Gagal update');
			}
		}
	});
});


/*end rawat inap*/



/*transaksi non functional*/
$(document).on("click", "a.deleteajax-nonfunctional", function () {
	var url = $(this).attr('url');
	if(confirm("Hapus Tindakan Pelayanan?")){ 
		//showload();
		$.ajax({
			type: 'get',
			url: url,
			dataType:'json',
			success: function(v) {
				//hideLoad();
				if(v.status == 1){
					dataChange(v.url);
				}else{
					alert('Tindakan Gagal dihapus');
				}
			}
		});
	}
});

/*Info Tagihan humas*/
/*$(document).on('click', 'input#info-tagihan-humas', function(){
		alert('tesstst');
	});
*/
// };
function ajaxSimpanData(link, dataform){
	$.ajax({
		type: 'post',
		url: link,
		dataType:'json',
		data: dataform,
		success: function(v) {
			if(v.error == 1){
				// alert(v.msg);
				$("#mydialog").html(v.msg);
				$("#mydialog").dialog("open");
			}else {
				alert(v.msg);
				if(v.url != null){
					dataChange(v.url);
				}
				if(v.redirect != null){
					window.location = v.redirect; 
				} 
			} 
			hideload();			
		}
	});
}




function ajaxSimpanData2(link, dataform){ //Dengan Konfirmasi
	$.ajax({
		type: 'post',
		url: link,
		dataType:'json',
		data: dataform,
		success: function(v) {
			if(v.error == 1){
				// alert(v.msg);
				$("#mydialog").html(v.msg);
				$("#mydialog").dialog("open");
			}else {
				alert(v.msg);
				if(v.url != null){
					dataChange2(v.url);
				}
				/* if(v.redirect != null){
					window.location = v.redirect; 
				} */
				
				
				
				
				if(v.konfirmasi1 != null){
					if(confirm(v.konfirmasi1.msg)){ 
						showload();
						$.ajax({
							type: 'post',
							url: v.konfirmasi1.url,
							// dataType:'json',
							data : v.konfirmasi1.data,
							success: function(v) {
								// alert(v);
								hideload();
							}
						});
					} 
				}
				
				
				if(v.konfirmasi2 != null){
					if(confirm(v.konfirmasi2.msg)){ 
						showload();
						$.ajax({
							type: 'post',
							url: v.konfirmasi2.url,
							// dataType:'json',
							data : v.konfirmasi2.data,
							success: function(v) {
								// alert(v);
								hideload();
							}
						});
					} 
				}
				
				if(v.konfirmasi != null){
					if(confirm(v.konfirmasi.msg)){ 
						showload();
						window.location = v.konfirmasi.redirect; 
						hideload(); 
					} 
				}
				
			} 
			hideload();			
		}
	});
}

// window.dataChange = function(url) {
	// dataChange(url); 
// }

function dataChange(url){ 
	// alert(url);
	$.ajax({
		type: 'get',
		url: url,
		dataType:'json',
		success: function(v) {  
			isnull = v.data.isnull; 
			res = isnull.split(':'); 
			if(res[1] == '1'){
				
				if(typeof v.msg != "undefined"){
					//alert(v.msg);
					$("#mydialog").html(v.msg+'<br/><input type="button" onclick="$(\'#mydialog\').dialog(\'close\');" style="float:right;margin-left:5px;margin-right:5px;" class="tombolhijau" value="OK">');
					$("#mydialog").dialog("open");
					$("div.ui-dialog").css({'position':'absolute', 'height':'auto', 'width':'400px', 'display':'block', 'z-index':'101', 'font-size':'14px'});
				}else {
					alert('Data Tidak Ada');
				}
				var p = v.data;
				for (var key in p) {
				  if (p.hasOwnProperty(key)) {
					res2 = p[key];
					//alert(res2);
					res = res2.split(':'); 
					if(res[0] != ''){ 
						var a = res[0];
						var b = res[1]; 
						// window.opener.document.getElementById( a ).value = b;
						if(document.getElementById( a ) !== null){
							document.getElementById( a ).value = b; 
						} 
					}  
				  }
				}

				if(v.radio != null)
				{ 
					var r = v.radio;
					for (var key in r) {
					  if (r.hasOwnProperty(key)) {
						res3 = r[key];
						//alert(res2);
						res = res3.split(':'); 
						if(res[0] != ''){ 
							var a = res[0];
							var b = res[1]; 
							// window.opener.document.getElementById( a ).value = b;
							if(document.getElementById( a ) !== null){
								$('input[id='+a+'][value='+b+']').prop('checked',true);	 
							} 
						}  
					  }
					}
				}
			 
				if(v.url != null){  
					document.getElementById( v.url.target ).innerHTML = v.url.html; 
					// window.opener.document.getElementById(v.url.target).innerHTML  = v.url.html;
				}

				if(v.url2 != null){ 
					document.getElementById( v.url2.target ).innerHTML = v.url2.html; 
					// window.opener.document.getElementById(v.url2.target).innerHTML  = v.url2.html;
				}
				
				if(v.url3 != null){ 
					document.getElementById( v.url3.target ).innerHTML = v.url3.html; 
					// window.opener.document.getElementById(v.url2.target).innerHTML  = v.url2.html;
				}
				
				if(v.url4 != null){ 
					document.getElementById( v.url4.target ).innerHTML = v.url4.html; 
					// window.opener.document.getElementById(v.url2.target).innerHTML  = v.url2.html;
				}

				if(v.down != null){   
					// window.opener.document.getElementById(v.down).style.display = 'block';    // Get the element with id="demo" 
					document.getElementById(v.down).style.display = 'block';    // Get the element with id="demo" 
				}
				
				if(v.up != null){   
					// window.opener.document.getElementById(v.up).style.display = 'none';    // Get the element with id="demo" 
					document.getElementById(v.up).style.display = 'none';    // Get the element with id="demo" 
				}
				if(v.editattribute != null){
					if(v.editattribute.placeholder == 1) {		
						document.getElementById(v.editattribute.defaultid).placeholder = v.editattribute.changeattrtype;
					}
				}

				if(v.checkedattribute != null){
					if(v.checkedattribute.defaultid != ''){
						document.getElementById(v.checkedattribute.defaultid).checked = v.checkedattribute.changeattrtype;
					}

					if(v.checkedattribute.defaultid2 != ''){
						document.getElementById(v.checkedattribute.defaultid2).checked = v.checkedattribute.changeattrtype2;
					}
					
				}

				if(v.changeid != null){
					document.getElementById(v.changeid).setAttribute('class',v.newclass);
				}


				hideload();
				// $('#Pendaftaranpasien_NomorRM').val('');
				// $('.input-datapribadi').val('');
				
			}else { 
				if(typeof v.msg != "undefined"){
					//alert(v.msg);
					$("#mydialog").html(v.msg);
					$("#mydialog").dialog("open");  
				} 
					var p = v.data;
					for (var key in p) {
					  if (p.hasOwnProperty(key)) {
						res2 = p[key];
						//alert(res2);
						res = res2.split(':'); 
						if(res[0] != ''){ 
							var a = res[0];
							var b = res[1];
							// window.opener.document.getElementById( a ).value = b;
							if(document.getElementById( a ) !== null){
								document.getElementById( a ).value = b; 
							}  
						}  
					  }
					}


					if(v.radio != null)
				{ 
					var r = v.radio;
					for (var key in r) {
					  if (r.hasOwnProperty(key)) {
						res3 = r[key];
						//alert(res2);
						res = res3.split(':'); 
						if(res[0] != ''){ 
							var a = res[0];
							var b = res[1]; 
							// window.opener.document.getElementById( a ).value = b;
							if(document.getElementById( a ) !== null){
								$('input[id='+a+'][value='+b+']').prop('checked',true);	
							
							} 
						}  
					  }
					}
				}
					 
					if(v.url != null){ 
						document.getElementById( v.url.target ).innerHTML = v.url.html; 
						// window.opener.document.getElementById(v.url.target).innerHTML  = v.url.html;
					}

					if(v.url2 != null){ 
						document.getElementById( v.url2.target ).innerHTML = v.url2.html; 
						// window.opener.document.getElementById(v.url2.target).innerHTML  = v.url2.html;
					}
					
					
					if(v.url3 != null){ 
						document.getElementById( v.url3.target ).innerHTML = v.url3.html; 
						// window.opener.document.getElementById(v.url2.target).innerHTML  = v.url2.html;
					}
					
					if(v.url4 != null){ 
						document.getElementById( v.url4.target ).innerHTML = v.url4.html; 
						// window.opener.document.getElementById(v.url2.target).innerHTML  = v.url2.html;
					}

					if(v.down != null){   
						// window.opener.document.getElementById(v.down).style.display = 'block';    // Get the element with id="demo" 
						document.getElementById(v.down).style.display = 'block';    // Get the element with id="demo" 
					}
					
					if(v.up != null){   
						// window.opener.document.getElementById(v.up).style.display = 'none';    // Get the element with id="demo" 
						document.getElementById(v.up).style.display = 'none';    // Get the element with id="demo" 
					}

					if(v.editattribute != null){
						if(v.editattribute.placeholder == 1) {		
						 	document.getElementById(v.editattribute.defaultid).placeholder = v.editattribute.changeattrtype;
						}
					}
					
					if(v.checkedattribute != null){
						if(v.checkedattribute.defaultid != ''){
							document.getElementById(v.checkedattribute.defaultid).checked = v.checkedattribute.changeattrtype;
						}

						if(v.checkedattribute.defaultid2 != ''){
							document.getElementById(v.checkedattribute.defaultid2).checked = v.checkedattribute.changeattrtype2;
						}
						
					}

					if(v.changeid != null){
						document.getElementById(v.changeid).setAttribute('class',v.newclass);
					}


					hideload();
					 window.close();
				 
			}
			
		}
	});
}



function dataChange2(url){   // dataChange pemisah menggunkan ":" , dataChange2 pemisah menggunkan ";" 
	// alert(url);
	$.ajax({
		type: 'get',
		url: url,
		dataType:'json',
		success: function(v) {  
			isnull = v.data.isnull; 
			res = isnull.split(';'); 
			if(res[1] == '1'){
				
				
				if(typeof v.msg != "undefined"){
					//alert(v.msg);
					$("#mydialog").html(v.msg);
					$("#mydialog").dialog("open");  
				}else {
					alert('Data Tidak Ada');
				}
				var p = v.data;
				for (var key in p) {
				  if (p.hasOwnProperty(key)) {
					res2 = p[key];
					//alert(res2);
					res = res2.split(';'); 
					if(res[0] != ''){ 
						var a = res[0];
						var b = res[1]; 
						// window.opener.document.getElementById( a ).value = b;
						if(document.getElementById( a ) !== null){
							document.getElementById( a ).value = b; 
						} 
					}  
				  }
				}

				if(v.radio != null)
				{ 
					var r = v.radio;
					for (var key in r) {
					  if (r.hasOwnProperty(key)) {
						res3 = r[key];
						//alert(res2);
						res = res3.split(';'); 
						if(res[0] != ''){ 
							var a = res[0];
							var b = res[1]; 
							// window.opener.document.getElementById( a ).value = b;
							if(document.getElementById( a ) !== null){
								$('input[id='+a+'][value='+b+']').prop('checked',true);	 
							} 
						}  
					  }
					}
				}
			 
				if(v.url != null){  
					document.getElementById( v.url.target ).innerHTML = v.url.html; 
					// window.opener.document.getElementById(v.url.target).innerHTML  = v.url.html;
				}

				if(v.url2 != null){ 
					document.getElementById( v.url2.target ).innerHTML = v.url2.html; 
					// window.opener.document.getElementById(v.url2.target).innerHTML  = v.url2.html;
				}
				
				if(v.url3 != null){ 
					document.getElementById( v.url3.target ).innerHTML = v.url3.html; 
					// window.opener.document.getElementById(v.url2.target).innerHTML  = v.url2.html;
				}
				
				if(v.url4 != null){ 
					document.getElementById( v.url4.target ).innerHTML = v.url4.html; 
					// window.opener.document.getElementById(v.url2.target).innerHTML  = v.url2.html;
				}

				if(v.down != null){   
					// window.opener.document.getElementById(v.down).style.display = 'block';    // Get the element with id="demo" 
					document.getElementById(v.down).style.display = 'block';    // Get the element with id="demo" 
				}
				
				if(v.up != null){   
					// window.opener.document.getElementById(v.up).style.display = 'none';    // Get the element with id="demo" 
					document.getElementById(v.up).style.display = 'none';    // Get the element with id="demo" 
				}
				if(v.editattribute != null){
					if(v.editattribute.placeholder == 1) {		
						document.getElementById(v.editattribute.defaultid).placeholder = v.editattribute.changeattrtype;
					}
				}

				if(v.checkedattribute != null){
					if(v.checkedattribute.defaultid != ''){
						document.getElementById(v.checkedattribute.defaultid).checked = v.checkedattribute.changeattrtype;
					}

					if(v.checkedattribute.defaultid2 != ''){
						document.getElementById(v.checkedattribute.defaultid2).checked = v.checkedattribute.changeattrtype2;
					}
					
				}

				hideload();
				// $('#Pendaftaranpasien_NomorRM').val('');
				// $('.input-datapribadi').val('');
				
			}else { 
				
				if(typeof v.msg != "undefined"){
					//alert(v.msg);
					$("#mydialog").html(v.msg);
					$("#mydialog").dialog("open");  
				} 
					var p = v.data;
					for (var key in p) {
					  if (p.hasOwnProperty(key)) {
						res2 = p[key];
						//alert(res2);
						res = res2.split(';'); 
						if(res[0] != ''){ 
							var a = res[0];
							var b = res[1];
							// window.opener.document.getElementById( a ).value = b;
							if(document.getElementById( a ) !== null){
								document.getElementById( a ).value = b; 
							}  
						}  
					  }
					}


					if(v.radio != null)
				{ 
					var r = v.radio;
					for (var key in r) {
					  if (r.hasOwnProperty(key)) {
						res3 = r[key];
						//alert(res2);
						res = res3.split(';'); 
						if(res[0] != ''){ 
							var a = res[0];
							var b = res[1]; 
							// window.opener.document.getElementById( a ).value = b;
							if(document.getElementById( a ) !== null){
								$('input[id='+a+'][value='+b+']').prop('checked',true);	
							
							} 
						}  
					  }
					}
				}
					 
					if(v.url != null){ 
						document.getElementById( v.url.target ).innerHTML = v.url.html; 
						// window.opener.document.getElementById(v.url.target).innerHTML  = v.url.html;
					}

					if(v.url2 != null){ 
						document.getElementById( v.url2.target ).innerHTML = v.url2.html; 
						// window.opener.document.getElementById(v.url2.target).innerHTML  = v.url2.html;
					}
					
					
					if(v.url3 != null){ 
						document.getElementById( v.url3.target ).innerHTML = v.url3.html; 
						// window.opener.document.getElementById(v.url2.target).innerHTML  = v.url2.html;
					}
					
					if(v.url4 != null){ 
						document.getElementById( v.url4.target ).innerHTML = v.url4.html; 
						// window.opener.document.getElementById(v.url2.target).innerHTML  = v.url2.html;
					}

					if(v.down != null){   
						// window.opener.document.getElementById(v.down).style.display = 'block';    // Get the element with id="demo" 
						document.getElementById(v.down).style.display = 'block';    // Get the element with id="demo" 
					}
					
					if(v.up != null){   
						// window.opener.document.getElementById(v.up).style.display = 'none';    // Get the element with id="demo" 
						document.getElementById(v.up).style.display = 'none';    // Get the element with id="demo" 
					}

					if(v.editattribute != null){
						if(v.editattribute.placeholder == 1) {		
						 	document.getElementById(v.editattribute.defaultid).placeholder = v.editattribute.changeattrtype;
						}
					}
					
					if(v.checkedattribute != null){
						if(v.checkedattribute.defaultid != ''){
							document.getElementById(v.checkedattribute.defaultid).checked = v.checkedattribute.changeattrtype;
						}

						if(v.checkedattribute.defaultid2 != ''){
							document.getElementById(v.checkedattribute.defaultid2).checked = v.checkedattribute.changeattrtype2;
						}
						
					}

					hideload();
					 window.close();
				 
			}
			
		}
	});
}

function toRp(angka){
    var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
    var rev2    = '';
    for(var i = 0; i < rev.length; i++){
        rev2  += rev[i];
        if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
            rev2 += '.';
        }
    }
    return 'Rp. ' + rev2.split('').reverse().join('') + ',00';
}

function popupwindows(link,width=1000,height=400){
	window.open(link, 'winpopup', 'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width='+width+',height='+height+'').focus();
}

function convertToRupiah(objek) {
	  separator = ".";
	  a = objek.value;
	  b = a.replace(/[^\d]/g,"");
	  c = "";
	  panjang = b.length;
	  j = 0;
	  for (i = panjang; i > 0; i--) {
	    j = j + 1;
	    if (((j % 3) == 1) && (j != 1)) {
	      c = b.substr(i-1,1) + separator + c;
	    } else {
	      c = b.substr(i-1,1) + c;
	    }
	  }
	  objek.value = c;

} 

$(document).on("click", ".popup-window-js", function () {
	url = $(this).attr('url');
	window.open(url, 'winpopup', 'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1000,height=700').focus();
}); 

$(document).on("click", ".deleteajax-farmasi-jadi", function(){

	var nameObat = $(this).parents('tr').find('td').eq(2).html();
	var statusBayar = $('#FrHeaderpenjualan_statusBayar').val();

	if(statusBayar == 1){
		alert('Item obat tidak bisa dihapus karena transaksi sudah diproses');
	}else{
		if(confirm('Apakah anda ingin menghapus '+nameObat+' ?')){
			var url = $(this).attr('url');
			var jnsPenjualan = $('#FrHeaderpenjualan_JenisPenjualan').val();
			var kdDokter = $('#FrHeaderpenjualan_KodeDokter').val();
			var crBayar = $('#FrHeaderpenjualan_kdCaraBayar').val();
			var type = 'obatjadi';

			$.ajax({
				type: 'get',
				url: url,
				dataType:'json',
				data: {'jnsPenjualan':jnsPenjualan, 'kdDokter':kdDokter, 'crBayar':crBayar, 'type':type},
				success: function(v) {
					$('#'+v.url.target).html(v.url.html);
				}
			});
		}
	}
	
});

$(document).on("click", ".deleteajax-farmasi-racik", function(){
	var url = $(this).attr('url');
	var jnsPenjualan = $('#FrHeaderpenjualan_JenisPenjualan').val();
	var kdDokter = $('#FrHeaderpenjualan_KodeDokter').val();
	var crBayar = $('#FrHeaderpenjualan_kdCaraBayar').val();
	var type = 'obatracik';

	$.ajax({
		type: 'get',
		url: url,
		dataType:'json',
		data: {'jnsPenjualan':jnsPenjualan, 'kdDokter':kdDokter, 'crBayar':crBayar, 'type':type},
		success: function(v) {
			$('#'+v.url.target).html(v.url.html);
		}
	});
});


$(document).on("click", ".link-wpopup2", function () {
	id = $(this).attr('id');
	url = $(this).attr('forClear')+'?id='+id;
//	alert(forclear);

	$.ajax({
			type: 'post',
			url: url,
			data: $('form#headerpembelian-form').serialize(),
			dataType: 'json',
			success: function(v){ 
				
					if(v.url != null){  
					document.getElementById( v.url.target ).innerHTML = v.url.html; 
					// window.opener.document.getElementById(v.url.target).innerHTML  = v.url.html;
				}
			}
		});
});

$(document).on("click", ".link-wpopup3", function () {
	//showload();
	//alert('aaaaaa');
	id = $(this).attr('id');
	name = $(this).attr('name');
	forid = $(this).attr('forId');
	fordesc = $(this).attr('forDesc');
	forclear = $(this).attr('forClear');
	url = $(this).attr('url');
	
	$.ajax({
		type: 'get',
		url: url+'/id/'+id,
		dataType:'json',
		success: function(v) {
			isnull = v.data.isnull; 
			res = isnull.split(':'); 
			if(res[1] == '1'){
				alert('Data Tidak Ada');
				
				if(typeof v.msg != "undefined"){
					//alert(v.msg);
					$("#mydialog").html(v.msg);
					$("#mydialog").dialog("open");  
				}
				var p = v.data;
				for (var key in p) {
				  if (p.hasOwnProperty(key)) {
					res2 = p[key];
					//alert(res2);
					res = res2.split(':'); 
					if(res[0] != ''){ 
						var a = res[0];
						var b = res[1]; 
						// window.opener.document.getElementById( a ).value = b;
						if(document.getElementById( a ) !== null){
							document.getElementById( a ).value = b; 
						} 
					}  
				  }
				}
			 
				if(v.url != null){  
					document.getElementById( v.url.target ).innerHTML = v.url.html; 
					// window.opener.document.getElementById(v.url.target).innerHTML  = v.url.html;
				}

				if(v.url2 != null){ 
					document.getElementById( v.url2.target ).innerHTML = v.url2.html; 
					// window.opener.document.getElementById(v.url2.target).innerHTML  = v.url2.html;
				}

				if(v.show != null){   
					// window.opener.document.getElementById(v.down).style.display = 'block';    // Get the element with id="demo" 
					document.getElementById(v.show).style.display = 'inline-block';    // Get the element with id="demo" 
				}

				if(v.down != null){   
					// window.opener.document.getElementById(v.down).style.display = 'block';    // Get the element with id="demo" 
					document.getElementById(v.down).style.display = 'block';    // Get the element with id="demo" 
				}


				if(v.down2 != null){   
					// window.opener.document.getElementById(v.down).style.display = 'block';    // Get the element with id="demo" 
					document.getElementById(v.down2).style.display = 'block';    // Get the element with id="demo" 
				}
				
				if(v.up != null){   
					// window.opener.document.getElementById(v.up).style.display = 'none';    // Get the element with id="demo" 
					document.getElementById(v.up).style.display = 'none';    // Get the element with id="demo" 
				}

				

				if(v.editattribute != null){
					if(v.editattribute.placeholder == 1) {		
						document.getElementById(v.editattribute.defaultid).placeholder = v.editattribute.changeattrtype;
					}
				}

				if(v.checkedattribute != null){
					if(v.checkedattribute.defaultid != ''){
						document.getElementById(v.checkedattribute.defaultid).checked = v.checkedattribute.changeattrtype;
					}

					if(v.checkedattribute.defaultid2 != ''){
						document.getElementById(v.checkedattribute.defaultid2).checked = v.checkedattribute.changeattrtype2;
					}
					
				}

				hideload();
				// $('#Pendaftaranpasien_NomorRM').val('');
				// $('.input-datapribadi').val('');
				
			}else { 
				
				if(typeof v.msg != "undefined"){
					//alert(v.msg);
					$("#mydialog").html(v.msg);
					$("#mydialog").dialog("open");  
				} 
					var p = v.data;
					for (var key in p) {
					  if (p.hasOwnProperty(key)) {
						res2 = p[key];
						//alert(res2);
						res = res2.split(':'); 
						if(res[0] != ''){ 
							var a = res[0];
							var b = res[1];
							// window.opener.document.getElementById( a ).value = b;
							if(document.getElementById( a ) !== null){
								document.getElementById( a ).value = b; 
							}  
						}  
					  }
					}
					 
					if(v.url != null){ 
						document.getElementById( v.url.target ).innerHTML = v.url.html; 
						// window.opener.document.getElementById(v.url.target).innerHTML  = v.url.html;
					}

					if(v.url2 != null){ 
						document.getElementById( v.url2.target ).innerHTML = v.url2.html; 
						// window.opener.document.getElementById(v.url2.target).innerHTML  = v.url2.html;
					}

					if(v.down != null){   
						// window.opener.document.getElementById(v.down).style.display = 'block';    // Get the element with id="demo" 
						document.getElementById(v.down).style.display = 'block';    // Get the element with id="demo" 
					}

					if(v.down2 != null){   
						// window.opener.document.getElementById(v.down).style.display = 'block';    // Get the element with id="demo" 
						document.getElementById(v.down2).style.display = 'block';    // Get the element with id="demo" 
					}
					
					if(v.up != null){   
						// window.opener.document.getElementById(v.up).style.display = 'none';    // Get the element with id="demo" 
						document.getElementById(v.up).style.display = 'none';    // Get the element with id="demo" 
					}

					if(v.editattribute != null){
						if(v.editattribute.placeholder == 1) {		
						 	document.getElementById(v.editattribute.defaultid).placeholder = v.editattribute.changeattrtype;
						}
					}
					
					if(v.checkedattribute != null){
						if(v.checkedattribute.defaultid != ''){
							document.getElementById(v.checkedattribute.defaultid).checked = v.checkedattribute.changeattrtype;
						}

						if(v.checkedattribute.defaultid2 != ''){
							document.getElementById(v.checkedattribute.defaultid2).checked = v.checkedattribute.changeattrtype2;
						}
						
					}
					
					hideload();
					window.close();
				 
			} 
			
		}
	});
	/* if(forclear != ''){
		data = forclear.split("/")
		for(i = 0; i < data.length; i++){
			window.opener.document.getElementById(data[i]).value = ''; 
		}
	}
	window.opener.document.getElementById(forid).value = id; 
	window.opener.document.getElementById(fordesc).value = name; 
	window.close(); */

	//window.opener.document.getElementById("proses").disabled=x;
});

$(document).on("click", ".link-wpopup4", function () {
	//showload();
	//alert('aaaaaa');
	id = $(this).attr('id');
	name = $(this).attr('name');
	forid = $(this).attr('forId');
	fordesc = $(this).attr('forDesc');
	forclear = $(this).attr('forClear');
	url = $(this).attr('url');
	
	$.ajax({
		type: 'get',
		url: url+'/id/'+id,
		dataType:'json',
		success: function(v) {
			isnull = v.data.isnull; 
			res = isnull.split(':'); 
			if(res[1] == '1'){
				alert('Data Tidak Ada');
				
				if(typeof v.msg != "undefined"){
					//alert(v.msg);
					$("#mydialog").html(v.msg);
					$("#mydialog").dialog("open");  
				}
				var p = v.data;
				for (var key in p) {
				  if (p.hasOwnProperty(key)) {
					res2 = p[key];
					//alert(res2);
					res = res2.split(':'); 
					if(res[0] != ''){ 
						var a = res[0];
						var b = res[1]; 
						// window.opener.document.getElementById( a ).value = b;
						if(document.getElementById( a ) !== null){
							document.getElementById( a ).value = b; 
						} 
					}  
				  }
				}
			 
				if(v.url != null){  
					document.getElementById( v.url.target ).innerHTML = v.url.html; 
					// window.opener.document.getElementById(v.url.target).innerHTML  = v.url.html;
				}

				if(v.url2 != null){ 
					document.getElementById( v.url2.target ).innerHTML = v.url2.html; 
					// window.opener.document.getElementById(v.url2.target).innerHTML  = v.url2.html;
				}

				if(v.show != null){   
					// window.opener.document.getElementById(v.down).style.display = 'block';    // Get the element with id="demo" 
					document.getElementById(v.show).style.display = 'inline-block';    // Get the element with id="demo" 
				}

				if(v.down != null){   
					// window.opener.document.getElementById(v.down).style.display = 'block';    // Get the element with id="demo" 
					document.getElementById(v.down).style.display = 'block';    // Get the element with id="demo" 
				}


				if(v.down2 != null){   
					// window.opener.document.getElementById(v.down).style.display = 'block';    // Get the element with id="demo" 
					document.getElementById(v.down2).style.display = 'block';    // Get the element with id="demo" 
				}
				
				if(v.up != null){   
					// window.opener.document.getElementById(v.up).style.display = 'none';    // Get the element with id="demo" 
					document.getElementById(v.up).style.display = 'none';    // Get the element with id="demo" 
				}

				

				if(v.editattribute != null){
					if(v.editattribute.placeholder == 1) {		
						document.getElementById(v.editattribute.defaultid).placeholder = v.editattribute.changeattrtype;
					}
				}

				if(v.checkedattribute != null){
					if(v.checkedattribute.defaultid != ''){
						document.getElementById(v.checkedattribute.defaultid).checked = v.checkedattribute.changeattrtype;
					}

					if(v.checkedattribute.defaultid2 != ''){
						document.getElementById(v.checkedattribute.defaultid2).checked = v.checkedattribute.changeattrtype2;
					}
					
				}

				hideload();
				// $('#Pendaftaranpasien_NomorRM').val('');
				// $('.input-datapribadi').val('');
				
			}else { 
				
				if(typeof v.msg != "undefined"){
					//alert(v.msg);
					$("#mydialog").html(v.msg);
					$("#mydialog").dialog("open");  
				} 
					var p = v.data;
					for (var key in p) {
					  if (p.hasOwnProperty(key)) {
						res2 = p[key];
						//alert(res2);
						res = res2.split(':'); 
						if(res[0] != ''){ 
							var a = res[0];
							var b = res[1];
							// window.opener.document.getElementById( a ).value = b;
							if(document.getElementById( a ) !== null){
								document.getElementById( a ).value = b; 
							}  
						}  
					  }
					}
					 
					if(v.url != null){ 
						document.getElementById( v.url.target ).innerHTML = v.url.html; 
						// window.opener.document.getElementById(v.url.target).innerHTML  = v.url.html;
					}

					if(v.url2 != null){ 
						document.getElementById( v.url2.target ).innerHTML = v.url2.html; 
						// window.opener.document.getElementById(v.url2.target).innerHTML  = v.url2.html;
					}

					if(v.down != null){   
						// window.opener.document.getElementById(v.down).style.display = 'block';    // Get the element with id="demo" 
						document.getElementById(v.down).style.display = 'block';    // Get the element with id="demo" 
					}

					if(v.down2 != null){   
						// window.opener.document.getElementById(v.down).style.display = 'block';    // Get the element with id="demo" 
						document.getElementById(v.down2).style.display = 'block';    // Get the element with id="demo" 
					}
					
					if(v.up != null){   
						// window.opener.document.getElementById(v.up).style.display = 'none';    // Get the element with id="demo" 
						document.getElementById(v.up).style.display = 'none';    // Get the element with id="demo" 
					}

					if(v.editattribute != null){
						if(v.editattribute.placeholder == 1) {		
						 	document.getElementById(v.editattribute.defaultid).placeholder = v.editattribute.changeattrtype;
						}
					}
					
					if(v.checkedattribute != null){
						if(v.checkedattribute.defaultid != ''){
							document.getElementById(v.checkedattribute.defaultid).checked = v.checkedattribute.changeattrtype;
						}

						if(v.checkedattribute.defaultid2 != ''){
							document.getElementById(v.checkedattribute.defaultid2).checked = v.checkedattribute.changeattrtype2;
						}
						
					}
					
					hideload();
					window.close();
				 
			} 
			
		}
	});
	/* if(forclear != ''){
		data = forclear.split("/")
		for(i = 0; i < data.length; i++){
			window.opener.document.getElementById(data[i]).value = ''; 
		}
	}
	window.opener.document.getElementById(forid).value = id; 
	window.opener.document.getElementById(fordesc).value = name; */
	window.close(); 

	//window.opener.document.getElementById("proses").disabled=x;
});

//---------------REMUNERASI JS-----------------
$(document).on("change", "td .capaian", function () {
	var totnilai = [];
	capaian = $(this).val();
	idkeg = $(this).attr('id');
	pros = $('#pros_'+idkeg).val();
	nilai = capaian * pros;
	
	$('#nilai_'+idkeg).val(nilai.toFixed(2));
	
	totKeg = $('#total-kegiatan').val();
	
	
	for (i = 1; i <= totKeg; i++) {
		// totnilai = $('.nilai [lang=1]').val();
		totnilai1 = $('.nilai[lang="'+i+'"]').val();
		tot = Math.round(totnilai1 * 100);
		totnilai.push(tot); 
		// totnilai= totnilai1;
		
	} 
	// var arr = [1.5,2.4,3,4];
	var total=0;
	for(var i in totnilai) { total += parseFloat(totnilai[i]); }


	$('#tot_nilai_kualitas').val(total/100); 
});



$(document).on("change", "td .nonreg-pilih", function () { //NON REGULER
	var totnilaipilih = [];
	capaian = $(this).val();
	capaian = parseInt(capaian);
	idkeg = $(this).attr('id');
	pros = $('#penyetara_pilih_'+idkeg).val();
	nilai = capaian * pros;
	totKeg = $('#total-kegiatan-pilih').val();
	
	capaianawal = $('#capaian_'+idkeg).val();
	// alert(capaianawal);
	// alert(capaian);
	// alert(idkeg);
	// alert(pros);
	// alert(nilai);
	
	
	if(capaianawal < capaian){
		alert('Tidak Boleh Melebihi capaian awal!');
		$(this).val('');
		$('#nonreg_capaianpilih_'+idkeg).val('')
		
		
		for (i = 1; i <= totKeg; i++) {
			// totnilai = $('.nilai [lang=1]').val();
			totnilai1 = $('.nilai-pilih[lang="'+i+'"]').val();
			tot = Math.round(totnilai1 * 100); 
			totnilaipilih.push(tot); 
			// totnilai= totnilai1;
			// alert(totnilai1);
			
		} 
		// var arr = [1.5,2.4,3,4];
		var total=0;
		for(var i in totnilaipilih) { total += parseFloat(totnilaipilih[i]); }
		$('#nonreg_capaian_total').val(total/100); 
		
	}else {
		$('#nonreg_capaianpilih_'+idkeg).val(nilai.toFixed(2)); 
		
		for (i = 1; i <= totKeg; i++) {
			// totnilai = $('.nilai [lang=1]').val();
			totnilai1 = $('.nilai-pilih[lang="'+i+'"]').val();
			tot = Math.round(totnilai1 * 100);
			totnilaipilih.push(tot); 
			// totnilai= totnilai1;
			// alert(totnilai1);
			
		} 
		// var arr = [1.5,2.4,3,4];
		var total=0;
		for(var i in totnilaipilih) { 
			// alert(totnilaipilih[i]);
			total += parseFloat(totnilaipilih[i]); 
		}


		$('#nonreg_capaian_total').val(total/100); 
	}
	
	
});


$(document).on("change", "td .res-nonreg-pilih", function () { //RESIDEN NON REGULER
	var totnilaipilih = [];
	capaian = $(this).val();
	capaian = parseInt(capaian);
	idkeg = $(this).attr('id');
	pros = $('#res_penyetara_pilih_'+idkeg).val();
	nilai = capaian * pros;
	totKeg = $('#res-total-kegiatan-pilih').val();
	
	capaianawal = $('#res_capaian_'+idkeg).val();
	// alert(capaianawal);
	// alert(capaian);
	// alert(idkeg);
	// alert(pros);
	// alert(nilai);
	
	
	if(capaianawal < capaian){
		alert('Tidak Boleh Melebihi capaian awal!');
		$(this).val('');
		$('#res_nonreg_capaianpilih_'+idkeg).val('')
		
		
		for (i = 1; i <= totKeg; i++) {
			// totnilai = $('.nilai [lang=1]').val();
			totnilai1 = $('.res-nilai-pilih[lang="'+i+'"]').val();
			tot = Math.round(totnilai1 * 100); 
			totnilaipilih.push(tot);  
		} 
		// var arr = [1.5,2.4,3,4];
		var total=0;
		for(var i in totnilaipilih) { total += parseFloat(totnilaipilih[i]); }
		$('#res_nonreg_capaian_total').val(total/100); 
		
	}else {
		$('#res_nonreg_capaianpilih_'+idkeg).val(nilai.toFixed(2)); 
		
		for (i = 1; i <= totKeg; i++) {
			// totnilai = $('.nilai [lang=1]').val();
			totnilai1 = $('.res-nilai-pilih[lang="'+i+'"]').val();
			tot = Math.round(totnilai1 * 100);
			totnilaipilih.push(tot); 
			
		} 
		// var arr = [1.5,2.4,3,4];
		var total=0;
		for(var i in totnilaipilih) { total += parseFloat(totnilaipilih[i]); }


		$('#res_nonreg_capaian_total').val(total/100); 
	}
	
	
});




$(document).on("click", "input#proses-semua", function () { 
	showload();
	totKeg = $('#total-kegiatan').val();
	for (i = 1; i <= totKeg; i++) {
		// totnilai = $('.nilai [lang=1]').val();
		capaian = $('.capaian[lang="'+i+'"]').val();
		idkegiatan = $('.capaian[lang="'+i+'"]').attr('id');
		// alert(capaian);
		// alert(idkegiatan);
		// tot = Math.round(totnilai1 * 100);
		// totnilai.push(tot);
		// totnilai= totnilai1;
		
	}
	
	hasil1 = $('#nilai-iki').val();
	hasil2 = $('#nilai-idiki').val();
	
	if(hasil1 == '' || hasil2 == ''){
		alert('Hasil Belum Ada!');
		hideload();
	}else {
		link = $(this).attr('link');
		$.ajax({
			type: 'post',
			url: link,
			dataType:'json',
			data: $('#iki-form').serialize(),
			success: function(v) {
				alert('Data Berhasil Disimpan!');
				hideload();
			}
		}); 
	} 
});

$(document).on("click", "input#proses-iki", function () {  
	showload();
	link = $(this).attr('link');
	kuantitas = $('#tot_capaian_kuantitas').val();
	kualitas = $('#tot_nilai_kualitas').val();
	tambahan = $('#tot_nilai_tambahan').val();
	target = $('#target').val();
	
	 
	//rumus tambahan non reg
	tambahannonreg = $('#nonreg_capaian_total').val();
	restambahannonreg = $('#res_nonreg_capaian_total').val();
	
	 
	if(tambahannonreg == undefined){
		tambahannonreg = 0;
	}
	
	if(restambahannonreg == undefined){
		restambahannonreg = 0;
	}
	
	// alert(restambahannonreg);
	$('#capaian_nonreg').val(tambahannonreg);
	$('#res_capaian_nonreg').val(restambahannonreg * 0.2);
	penyetaraan = $('#penyetaraan_ori').val(); 
	totalPlusNonreg = parseFloat(penyetaraan) + parseFloat(tambahannonreg)+ parseFloat(restambahannonreg);
	
	penyetaraan1 = $('#penyetaraan').val(totalPlusNonreg);
	
	//alert(penyetaraan1); 
	$('span#totalCapaianPenyetara').val(totalPlusNonreg);
	
	cp = $('#penyetaraan').val();
	
	if(cp == 0 && target == 0){
		hitung =  0;
		hitung2 =  0;
		hitung3 =  0;
	}else {
		hitung =  parseFloat(cp) / parseFloat(target) * 100;
		hitung2 =  parseFloat(cp) / parseFloat(target) * 70;
		hitung3 =  parseFloat(cp) / parseFloat(target);
	}
	
	// alert(hitung);
	$('#totalCapaianKuantitas').val(hitung3);
	$('#totalCapaianPenyetara').val(hitung);
	$('#tot_capaian_kuantitas').val(hitung2);
	
	
	kuantitas = $('#tot_capaian_kuantitas').val(); 
	//------------------------------------
	
	
	
	// totalcapaian = parseFloat(hitung2)  + parseFloat(kualitas) +  parseFloat(tambahan);
	totalcapaian = parseFloat(kuantitas)  + parseFloat(kualitas) +  parseFloat(tambahan);
	// totalcapaian = kuantitas + parseFloat(kualitas) + parseFloat(tambahan);
	//alert(totalcapaian);
	$('#total-capaian-iki').val(totalcapaian);
	
	
	$.ajax({
		type: 'post',
		url: link+'/cap/'+totalcapaian,
		dataType:'json',
		data: $('#iki-form').serialize(),
		success: function(v) {
			// alert(v.data.iki);
			$('#nilai-iki').val(v.data.iki);
			$('#nilai-idiki').val(v.data.idiki);
			hideload();
			//hideLoad(); 
		}
	});
});


$(document).on("click", "input.btn-dokter", function () { 
	id = $(this).attr('id'); 
	 $("#laporan6-list-"+id).toggle('slow');
});


$(document).on("click", "input#proses-absen-dokter", function () { 
	showload(); 
	link = $(this).attr('link');
	$.ajax({
		type: 'post',
		url: link,
		dataType:'json',
		data: $('#absensi-dokter-form').serialize(),
		success: function(v) {
			alert('Data Berhasil Disimpan!');
			hideload();
			window.location = v.redirect;
		}
	});  
});


// $('#dialogPend').click(function () {
$(document).on("click", "input#dialogPend", function () {  
    $('#mydialog').dialog('close');
    return false;
});

//---------------------------------------------





// };

//----------------------------------MODULES INA CBG----------------------------
//JANGAN NAMABAH KODING DI SINNI KECUALI UNTUK MODUL INACBG

function refreshIna(rm, url){ 
	$.ajax({
		type: 'post',
		url: url,
		data : { 'rm':rm},
		//dataType:'json',
		success: function(v) {
			$('#data-search').html(v);
			hideload();
		}
	});   
}


$(document).on("click", "a.ina-link-id", function () {  
	/* id = $(this).attr('lang'); 
    $('.aktif').slideUp();
	// $('.detail ').removeClass("aktif");
	
    $('#form-'+id).slideDown();
	$('#form-'+id).addClass("aktif") */
	 
	url =  $(this).attr('url');
	// link = url+'/rm/'+rm+'/kunjungan/'+kunjungan+'/ruang/'+ruang;
 
	window.open(url, 'winpopup', 'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=700').focus();
 
});


$(document).on("click", "input.ina-link-id", function () {  
	/* id = $(this).attr('lang'); 
    $('.aktif').slideUp();
	// $('.detail ').removeClass("aktif");
	
    $('#form-'+id).slideDown();
	$('#form-'+id).addClass("aktif") */
	 
	url =  $(this).attr('url');
	// link = url+'/rm/'+rm+'/kunjungan/'+kunjungan+'/ruang/'+ruang;
 
	window.open(url, 'winpopup', 'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=1200,height=700').focus();
 
});


$(document).on("click", "input.ina-klaim-baru", function () {  
	sep = $(this).attr('sep'); 
	rm = $(this).attr('rm');  
	kunj = $(this).attr('kunj');  
    showload(); 
	link = $(this).attr('link');
	$.ajax({
		type: 'post',
		url: link,
		dataType:'json',
		data: {'sep':sep, 'rm':rm, 'kunj':kunj},
		success: function(v) {
			if(v.code == '200'){
				refreshIna(rm, v.url);
				// hideload();
			}else {
				$("#mydialog").html(v.msg);
				$("#mydialog").dialog("open");
				refreshIna(rm, v.url);
				// hideload();
			}
			
			
			
			// window.location = v.redirect;
		}
	});  
});


// $('#hapus-klaim').click(function(){ 
$(document).on("click", "input.ina-hapus-id", function () {  
	showload();
	url = $(this).attr('url');   
	var r = confirm("Yakin Menghapus data klaim?");
		
	if (r == true) {
		$.ajax({
			type: 'post', 
			url: url,
			dataType:'json',
			data:{'sep':sep}, 
			success: function(v) {
				if(v.metadata.code == 200){
					location.reload(); 
				}else {
					$("#mydialog").html(v.metadata.message);
					$("#mydialog").dialog("open");
					hideload();
				} 
				//location.reload(); 
			}
		});
	} 
});

//cetak etiket farmasi
/*$(document).on("click", "#print-etiket-farmasi", function () {
	var nopenjualan = $('#FrHeaderpenjualan_NoPenjualan').val();
	var urlEtiket = $(this).attr('url');

	showload();
	$.ajax({
		type: 'post',
		url: urlEtiket,
		dataType:'html',
		data : $('#cetak-etiket-form').serialize(),
		success: function(v) {
			hideload();
		}
	});
});*/

/* $(document).on("click", "input.ina-final", function () {
	url =  $(this).attr('url');  
	$.ajax({
		type: 'post',
		url: link,
		dataType:'json',
		data: {'sep':sep, 'rm':rm, 'kunj':kunj},
		success: function(v) {
			if(v.code == '200'){
				refreshIna(rm, v.url);
				// hideload();
			}else {
				$("#mydialog").html(v.msg);
				$("#mydialog").dialog("open");
				refreshIna(rm, v.url);
				// hideload();
			} 
		}
	});  
}); */
//----------------------------------END-----------------------------------------



