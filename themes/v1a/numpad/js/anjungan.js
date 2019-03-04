function showload(){ 
	$(".se-pre-con").fadeIn(200);
	
}

function hideload(){ 
	$(".se-pre-con").fadeOut(200); 
}

function pasien(url, rm){
	showload();
		$.ajax({  
		type: 'get', 	   
		url: url+'/id/'+rm, 
		dataType: 'json', 
		success: function(v) { 		
			if(v.error == '1'){
				alert(v.msg);
				location.reload(); 
				//alert('Nomor RM tidak ditemukan, Silahkan cek kembali nomor RM anda.');
			}else {
				//alert(v.error);
				$('#home').slideUp();
				$('#home2-view').html(v.html);
				$('#home2').slideDown();	
			}
			hideload();
			// polihpoli();
		}
	});
}


function pasien2(url, rm){
	showload();
		$.ajax({  
		type: 'get', 	   
		url: url+'/id/'+rm, 
		dataType: 'html', 
		success: function(v) { 		
			if(v == 'kosong'){
				alert('Nomor RM tidak ditemukan, Silahkan cek kembali nomor RM anda.');
			}else {
				//location.reload(); 
			}
			hideload();
			// polihpoli();
		}
	});
}

$(document).on("click", "#pilih-poli", function(){
	showload();
	link = $(this).attr('url');
	$.ajax({ 
		type: 'get', 	   
		url: link, 
		dataType: 'json', 
		success: function(v) { 		
			 if(v.error == 1){
		 		alert(v.msg);
		 		 hideload();
			 }else {
			 	$('#home2').slideUp();	
			 	$('#list-room').slideDown();	

			 	hideload();	
			 }
			 
		}
	});
});


$(document).on("click", "#pilih-poli2", function(){
	showload();
	link = $(this).attr('url');
	$.ajax({ 
		type: 'get', 	   
		url: link, 
		dataType: 'json', 
		success: function(v) { 		
			 if(v.error == 1){
		 		alert(v.msg);
		 		 hideload();
			 }else {
			 	$('#list-dokter-form').slideUp();	
			 	$('#list-room').slideDown();	

			 	hideload();	
			 }
			 
		}
	});
});




$(document).on("click", "#pilih-poli3", function(){
	
	$('#result').slideUp();
	$('#list-room').slideDown();
});


$(document).on("click", "#batal-daftar", function(){
	showload();
	link = $(this).attr('url');
	window.location = link;
});


