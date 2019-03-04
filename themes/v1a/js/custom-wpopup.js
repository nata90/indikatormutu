 
function showload(){
	//$(".se-pre-con").fadeOut("slow");
	//$('#loading-page').addClass('se-pre-con')
	$(".se-pre-con").fadeIn(300);
	
}

function hideload(){ 
	$(".se-pre-con").fadeOut(300);
	//$("#loading-page").removeClass('se-pre-con');
}

function selectLink(){
	//$('.link-wpopup').click(function(){
	$(document).on("click", ".link-wpopup", function () {
		// alert('aaaaaa');
		id = $(this).attr('id');
		name = $(this).attr('name');
		forid = $(this).attr('forId');
		fordesc = $(this).attr('forDesc');
		forclear = $(this).attr('forClear');
		if(forclear != ''){
			data = forclear.split("/")
			for(i = 0; i < data.length; i++){
				window.opener.document.getElementById(data[i]).value = ''; 
			}
		}
		//alert(forid);
		//alert(id);*
		//alert(fordesc);
		//alert(name);
		
		
		window.opener.document.getElementById(forid).value = id; 
		window.opener.document.getElementById(fordesc).value = name; 
		//window.close();
	}); 
	 
}

selectLink();

$('#wp-content').on("click", ".link-wpopup5", function () {
	id = $(this).attr('id'); 
	url = $(this).attr('url');
	url = url+'/id/'+id;
	dataChange2(url);
	
});

//$('.link-wpopup3').click(function(){
	$('#wp-content').on("click", ".link-wpopup3", function () {
		showload();
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
					// alert('Data Tidak Ada');
					
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
						res = res2.split(':'); 
						if(res[0] != ''){ 
							var a = res[0];
							var b = res[1];
							if(window.opener.document.getElementById( a ) !== null){
								window.opener.document.getElementById( a ).value = b;
							} 
						} 
						//alert(key + " -> " + p[key]);
					  }
					}
					hideload();
				}else { 
					
					if(typeof v.msg != "undefined"){
						//alert(v.msg);
						$("#mydialog").html(v.msg);
						$("#mydialog").dialog("open"); 
						hideload();
					}else {
						var p = v.data;
						for (var key in p) {
						  if (p.hasOwnProperty(key)) {
							res2 = p[key];
							//alert(res2);
							res = res2.split(':'); 
							if(res[0] != ''){ 
								var a = res[0];
								var b = res[1];
								if(window.opener.document.getElementById( a ) !== null){
									window.opener.document.getElementById( a ).value = b;
								} 
							} 
							//alert(key + " -> " + p[key]);
						  }
						}
						
						if(v.url != null){ 
							// window.opener.document.getElementById(v.target).value = v.url;
							// window.opener.document.getElementById('form-pelayanan').innerHTML  = v.url; //DI KOMENT DULU UNTUK TRANSAKSI PEMBAYARAN
							window.opener.document.getElementById(v.url.target).innerHTML  = v.url.html;
						}

						if(v.url2 != null){ 
							// window.opener.document.getElementById(v.target).value = v.url;
							// window.opener.document.getElementById('form-pelayanan').innerHTML  = v.url; //DI KOMENT DULU UNTUK TRANSAKSI PEMBAYARAN
							window.opener.document.getElementById(v.url2.target).innerHTML  = v.url2.html;
						}

						if(v.down != null){   
							window.opener.document.getElementById(v.down).removeAttribute("style");    // Get the element with id="demo" 
						}

						if(v.down2 != null){   
							// window.opener.document.getElementById(v.down).style.display = 'block';    // Get the element with id="demo" 
							window.opener.document.getElementById(v.down2).removeAttribute("style");    // Get the element with id="demo" 
						}

						if(v.down3 != null){   
							// window.opener.document.getElementById(v.down).style.display = 'block';    // Get the element with id="demo" 
							window.opener.document.getElementById(v.down3).removeAttribute("style");    // Get the element with id="demo" 
						}
						
						if(v.up != null){   
							window.opener.document.getElementById(v.up).style.display = 'none';    // Get the element with id="demo" 
						}

						if(v.up2 != null){   
							window.opener.document.getElementById(v.up2).style.display = 'none';    // Get the element with id="demo" 
						}

						if(v.checkedattribute != null){
							if(v.checkedattribute.defaultid != ''){
								window.opener.document.getElementById(v.checkedattribute.defaultid).checked = v.checkedattribute.changeattrtype;
							}

							if(v.checkedattribute.defaultid2 != ''){
								window.opener.document.getElementById(v.checkedattribute.defaultid2).checked = v.checkedattribute.changeattrtype2;
							}
							
					}

						if(v.editattribute != null){ //change attribute
							if(v.editattribute.type == 1) {				
								window.opener.document.getElementById(v.editattribute.defaultid).type = v.editattribute.changeattrtype;
							}

							if(v.editattribute.style == 1) {					
								window.opener.document.getElementById(v.editattribute.defaultid).style = v.editattribute.changeattrstyle;
							}
							

							if(v.editattribute.id2 == 1 && v.editattribute.style2) {					
								window.opener.document.getElementById(v.editattribute.defaultid2).style = v.editattribute.changeattrstyle2;
							}

							if(v.editattribute.placeholder == 1) {			
							 	window.opener.document.getElementById(v.editattribute.defaultid).placeholder = v.editattribute.changeattrtype;
							}

						}

						if(v.changeid != null){
							window.opener.document.getElementById(v.changeid).setAttribute('class',v.newclass);
						}

						if(v.changeclass != null){
							var p = v.changeclass;
							for (var key in p) {
							  if (p.hasOwnProperty(key)) {
								oldClass = p[key];

								res = oldClass.split(':');
								var x = window.opener.document.getElementsByClassName(res[0]);
								var newClass = res[1];

								while(x.length > 0) {
								   x[0].className = newClass;  
								}
							  }
							}
						}

						hideload();
						//window.close();
					}
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
	});


//$('.link-wpopup3').click(function(){
	$('#wp-content').on("click", ".link-wpopup4", function () {
		showload();
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
					// alert('Data Tidak Ada');
					
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
						res = res2.split(':'); 
						if(res[0] != ''){ 
							var a = res[0];
							var b = res[1];
							if(window.opener.document.getElementById( a ) !== null){
								window.opener.document.getElementById( a ).value = b;
							} 
						} 
						//alert(key + " -> " + p[key]);
					  }
					}
					hideload();
				}else { 
					
					if(typeof v.msg != "undefined"){
						//alert(v.msg);
						$("#mydialog").html(v.msg);
						$("#mydialog").dialog("open"); 
						hideload();
					}else {
						var p = v.data;
						for (var key in p) {
						  if (p.hasOwnProperty(key)) {
							res2 = p[key];
							//alert(res2);
							res = res2.split(':'); 
							if(res[0] != ''){ 
								var a = res[0];
								var b = res[1];
								if(window.opener.document.getElementById( a ) !== null){
									window.opener.document.getElementById( a ).value = b;
								} 
							} 
							//alert(key + " -> " + p[key]);
						  }
						}
						
						if(v.url != null){ 
							// window.opener.document.getElementById(v.target).value = v.url;
							// window.opener.document.getElementById('form-pelayanan').innerHTML  = v.url; //DI KOMENT DULU UNTUK TRANSAKSI PEMBAYARAN
							window.opener.document.getElementById(v.url.target).innerHTML  = v.url.html;
						}

						if(v.url2 != null){ 
							// window.opener.document.getElementById(v.target).value = v.url;
							// window.opener.document.getElementById('form-pelayanan').innerHTML  = v.url; //DI KOMENT DULU UNTUK TRANSAKSI PEMBAYARAN
							window.opener.document.getElementById(v.url2.target).innerHTML  = v.url2.html;
						}

						if(v.down != null){   
							window.opener.document.getElementById(v.down).removeAttribute("style");    // Get the element with id="demo" 
						}

						if(v.down2 != null){   
							// window.opener.document.getElementById(v.down).style.display = 'block';    // Get the element with id="demo" 
							window.opener.document.getElementById(v.down2).removeAttribute("style");    // Get the element with id="demo" 
						}

						if(v.down3 != null){   
							// window.opener.document.getElementById(v.down).style.display = 'block';    // Get the element with id="demo" 
							window.opener.document.getElementById(v.down3).removeAttribute("style");    // Get the element with id="demo" 
						}
						
						if(v.up != null){   
							window.opener.document.getElementById(v.up).style.display = 'none';    // Get the element with id="demo" 
						}

						if(v.up2 != null){   
							window.opener.document.getElementById(v.up2).style.display = 'none';    // Get the element with id="demo" 
						}

						if(v.checkedattribute != null){
							if(v.checkedattribute.defaultid != ''){
								window.opener.document.getElementById(v.checkedattribute.defaultid).checked = v.checkedattribute.changeattrtype;
							}

							if(v.checkedattribute.defaultid2 != ''){
								window.opener.document.getElementById(v.checkedattribute.defaultid2).checked = v.checkedattribute.changeattrtype2;
							}
							
					}

						if(v.editattribute != null){ //change attribute
							if(v.editattribute.type == 1) {				
								window.opener.document.getElementById(v.editattribute.defaultid).type = v.editattribute.changeattrtype;
							}

							if(v.editattribute.style == 1) {					
								window.opener.document.getElementById(v.editattribute.defaultid).style = v.editattribute.changeattrstyle;
							}
							

							if(v.editattribute.id2 == 1 && v.editattribute.style2) {					
								window.opener.document.getElementById(v.editattribute.defaultid2).style = v.editattribute.changeattrstyle2;
							}

							if(v.editattribute.placeholder == 1) {			
							 	window.opener.document.getElementById(v.editattribute.defaultid).placeholder = v.editattribute.changeattrtype;
							}

						}
						hideload();
						//window.close();
					}
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
	//	window.close(); 

		disableFormHH(false);
 		disableFormDD(false);
	});


function disableFormHH(x){
	
	 var doc = window.opener.document;

     if(doc.getElementById("InvHeaderdistribusi_NoReferensi")){
         doc.getElementById("InvHeaderdistribusi_NoReferensi").readOnly=x;
		 doc.getElementById("InvHeaderdistribusi_TanggalDistribusi").readOnly=x;
	 	 doc.getElementById("InvHeaderdistribusi_Keterangan").readOnly=x;
	}
	 if(doc.getElementById("InvHeaderpembelian_TanggalPembelian")){
         doc.getElementById("InvHeaderpembelian_TanggalPembelian").readOnly=x;
         doc.getElementById("InvHeaderpembelian_KodeTermin").disabled=x;
         doc.getElementById("InvHeaderpembelian_NoReferensi").readOnly=x;
         doc.getElementById("InvHeaderpembelian_TanggalJatuhTempo").readOnly=x;
         doc.getElementById("InvHeaderpembelian_KodeSupplier").readOnly=x;
         doc.getElementById("InvHeaderpembelian_Keterangan").readOnly=x;
     }

}

function disableFormDD(x){

	  var doc = window.opener.document;
	  if(doc.getElementById("InvDetaildistribusi_KodeBarang")){
         doc.getElementById("InvDetaildistribusi_KodeBarang").readOnly=x;
		 doc.getElementById("InvDetaildistribusi_JumlahDistribusi").readOnly=x;
	//	 doc.getElementById("InvDetaildistribusi_Satuan").readOnly=x;
		 doc.getElementById("InvDetaildistribusi_NomorBatch").readOnly=x;
		 doc.getElementById("InvDetaildistribusi_TanggalED").readOnly=x;
		 doc.getElementById("Saldo").readOnly=x;
	 }
	  if(doc.getElementById("InvDetailpembelian_KodeBarang")){
         doc.getElementById("InvDetailpembelian_KodeBarang").readOnly=x;
         doc.getElementById("InvDetailpembelian_Jumlah").readOnly=x;
         doc.getElementById("InvDetailpembelian_NomorBatch").readOnly=x;
         doc.getElementById("InvDetailpembelian_Harga").readOnly=x;
         doc.getElementById("InvDetailpembelian_TanggalED").readOnly=x;
    //	 doc.getElementById("InvDetaildistribusi_Satuan").readOnly=x;
         doc.getElementById("InvDetailpembelian_Konversi").readOnly=x;
         doc.getElementById("InvDetailpembelian_Discount1").readOnly=x;
         doc.getElementById("InvDetailpembelian_Discount2").readOnly=x;
         doc.getElementById("InvDetailpembelian_DiscountTunai").readOnly=x;
     }


         doc.getElementById("proses").disabled=x;	
}



//$('#proses-datapasien').on('click',function(){
$('#data-bpjs').on('click', '#proses-datapasien', function(){
	showload();
	url = $(this).attr('url');
	rm = $('#nomor-rm').val();
	$.ajax({
		type: 'post',
		url: url,
		data:{'rm':rm},
		// dataType:'json',
		success: function(v) {
			// $('#Pendaftaranpasien_noBpjs').val(v);
			window.opener.document.getElementById('Pendaftaranpasien_noBpjs').value = v;
			hideload();
			// alert('aaa');
			//window.close();
		}
	});
});

$('#data-bpjs').on('click', '#proses-datapasien-rawatinap', function(){
	showload();
	url = $(this).attr('url');
	rm = $('#nomor-rm').val();
	rel = $(this).attr('rel');
	$.ajax({
		type: 'post',
		url: url,
		data:{'rm':rm},
		dataType:'json',
		success: function(v) {
			if(typeof v.msg != "undefined"){
				//alert(v.msg);
				$("#mydialog").html(v.msg);
				$("#mydialog").dialog("open"); 
				hideload();
			}else {
				var p = v.data;
				for (var key in p) {
				  if (p.hasOwnProperty(key)) {
					res2 = p[key];
					//alert(res2);
					res = res2.split(':'); 
					if(res[0] != ''){ 
						var a = res[0];
						var b = res[1];
						if(window.opener.document.getElementById( a ) !== null){
							window.opener.document.getElementById( a ).value = b;
						} 
					} 
				  }
				}
				
				if(v.url != null){ 
					// window.opener.document.getElementById(v.target).value = v.url;
					// window.opener.document.getElementById('form-pelayanan').innerHTML  = v.url; //DI KOMENT DULU UNTUK TRANSAKSI PEMBAYARAN
					window.opener.document.getElementById(v.url.target).innerHTML  = v.url.html;
				}

				if(v.url2 != null){ 
					// window.opener.document.getElementById(v.target).value = v.url;
					// window.opener.document.getElementById('form-pelayanan').innerHTML  = v.url; //DI KOMENT DULU UNTUK TRANSAKSI PEMBAYARAN
					window.opener.document.getElementById(v.url2.target).innerHTML  = v.url2.html;
				}

				if(v.down != null){   
					window.opener.document.getElementById(v.down).style.display = 'block';    // Get the element with id="demo" 
				}
				
				if(v.up != null){   
					window.opener.document.getElementById(v.up).style.display = 'none';    // Get the element with id="demo" 
				}

				if(v.editattribute != null){ //change attribute
					if(v.editattribute.type == 1) {				
						window.opener.document.getElementById(v.editattribute.defaultid).type = v.editattribute.changeattrtype;
					}

					if(v.editattribute.style == 1) {					
						window.opener.document.getElementById(v.editattribute.defaultid).style = v.editattribute.changeattrstyle;
					}
					

					if(v.editattribute.id2 == 1 && v.editattribute.style2) {					
						window.opener.document.getElementById(v.editattribute.defaultid2).style = v.editattribute.changeattrstyle2;
					}

					if(v.editattribute.placeholder == 1) {			
					 	window.opener.document.getElementById(v.editattribute.defaultid).placeholder = v.editattribute.changeattrtype;
					}

				}
				hideload();
				//window.close();
			}
		}
	})
});



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
				
				/* if(v.grid != null){
					$('#'+v.grid).yiiGridView('update', {
						data: $(this).serialize()
					});
				} */
				if(v.grid != null){
					opener.coba();
				}
				
				if(v.grid2 != null){
					opener.coba2(v.grid2.url);
				}
				
				//window.close();
			}
			
			hideload();	
			
		}
	});
}
function popUpClosed() {
    window.location.reload();
}

//-------------------------MODULES INA CBGS-------------------------
	// $('.hapus-diagnosa').click(function(){ 
	$('#inacbg-form').on('click', '.hapus-diagnosa', function(){
		showload();
		kode = $(this).attr('id'); 
		link = $(this).attr('url'); 
		$.ajax({
			type: 'post',
			url: link,
			dataType:'json',
			data:{'kode':kode},
			success: function(v) {
				$('#listDiagnosa').html(v.html);
				hideload(); 
			}
		});  
	});
	
	
	$('#inacbg-form').on('click', '.hapus-prosedur', function(){
		showload();
		kode = $(this).attr('id'); 
		link = $(this).attr('url'); 
		$.ajax({
			type: 'post',
			url: link,
			dataType:'json',
			data:{'kode':kode},
			success: function(v) {
				$('#listProcedur').html(v.html);
				hideload(); 
			}
		});  
	});

//------------------------------------------------------------------
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
					//window.close();
				 
			}
			
		}
	});
}

function dataChange2(url){ 
	showload(); 
		$.ajax({
			type: 'get',
			url: url ,
			dataType:'json',
			success: function(v) {
				isnull = v.data.isnull;
				res = isnull.split(';'); 
				if(res[1] == '1'){
					// alert('Data Tidak Ada');
					
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
							if(window.opener.document.getElementById( a ) !== null){
								window.opener.document.getElementById( a ).value = b;
							} 
						} 
						//alert(key + " -> " + p[key]);
					  }
					}
					hideload();
				}else { 
					
					if(typeof v.msg != "undefined"){
						//alert(v.msg);
						$("#mydialog").html(v.msg);
						$("#mydialog").dialog("open"); 
						hideload();
					}else {
						var p = v.data;
						for (var key in p) {
						  if (p.hasOwnProperty(key)) {
							res2 = p[key];
							//alert(res2);
							res = res2.split(';'); 
							if(res[0] != ''){ 
								var a = res[0];
								var b = res[1];
								if(window.opener.document.getElementById( a ) !== null){
									window.opener.document.getElementById( a ).value = b;
								} 
							} 
							//alert(key + " -> " + p[key]);
						  }
						}
						
						if(v.url != null){ 
							// window.opener.document.getElementById(v.target).value = v.url;
							// window.opener.document.getElementById('form-pelayanan').innerHTML  = v.url; //DI KOMENT DULU UNTUK TRANSAKSI PEMBAYARAN
							window.opener.document.getElementById(v.url.target).innerHTML  = v.url.html;
						}

						if(v.url2 != null){ 
							// window.opener.document.getElementById(v.target).value = v.url;
							// window.opener.document.getElementById('form-pelayanan').innerHTML  = v.url; //DI KOMENT DULU UNTUK TRANSAKSI PEMBAYARAN
							window.opener.document.getElementById(v.url2.target).innerHTML  = v.url2.html;
						}

						if(v.down != null){   
							window.opener.document.getElementById(v.down).removeAttribute("style");    // Get the element with id="demo" 
						}

						if(v.down2 != null){   
							// window.opener.document.getElementById(v.down).style.display = 'block';    // Get the element with id="demo" 
							window.opener.document.getElementById(v.down2).removeAttribute("style");    // Get the element with id="demo" 
						}

						if(v.down3 != null){   
							// window.opener.document.getElementById(v.down).style.display = 'block';    // Get the element with id="demo" 
							window.opener.document.getElementById(v.down3).removeAttribute("style");    // Get the element with id="demo" 
						}
						
						if(v.up != null){   
							window.opener.document.getElementById(v.up).style.display = 'none';    // Get the element with id="demo" 
						}

						if(v.up2 != null){   
							window.opener.document.getElementById(v.up2).style.display = 'none';    // Get the element with id="demo" 
						}

						if(v.checkedattribute != null){
							if(v.checkedattribute.defaultid != ''){
								window.opener.document.getElementById(v.checkedattribute.defaultid).checked = v.checkedattribute.changeattrtype;
							}

							if(v.checkedattribute.defaultid2 != ''){
								window.opener.document.getElementById(v.checkedattribute.defaultid2).checked = v.checkedattribute.changeattrtype2;
							}
							
					}

						if(v.editattribute != null){ //change attribute
							if(v.editattribute.type == 1) {				
								window.opener.document.getElementById(v.editattribute.defaultid).type = v.editattribute.changeattrtype;
							}

							if(v.editattribute.style == 1) {					
								window.opener.document.getElementById(v.editattribute.defaultid).style = v.editattribute.changeattrstyle;
							}
							

							if(v.editattribute.id2 == 1 && v.editattribute.style2) {					
								window.opener.document.getElementById(v.editattribute.defaultid2).style = v.editattribute.changeattrstyle2;
							}

							if(v.editattribute.placeholder == 1) {			
							 	window.opener.document.getElementById(v.editattribute.defaultid).placeholder = v.editattribute.changeattrtype;
							}

						}
						hideload();
						//window.close();
					}
				} 
				
			}
		});
}


