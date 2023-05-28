

	  function actualizare_mese(){
		var id_company=$("#id_company").val();
		var site_url=$("#site_url").val();
		$.ajax({
			url: site_url+'/terminal/actualizare_mese',
			type: 'POST',
			data: {id_company: id_company},
			dataType: 'json',
			success: function(data){
				$('#meseterminal').html(data.html);
			},
			error: function(jqXHR, textStatus, errorThrown){
				$('#meseterminal').html('');
				//alert(errorThrown);
			}
		});		
	  }
	  /*, 
					complete:function (){
						$.ajax({
						url: site_url+'/terminal/actualizare_mese',
						type: 'POST',
						data: {id_company: id_company},
						dataType: 'json',
						success: function(data){
							$('#meseterminal').html(data.html);
						},
						error: function(jqXHR, textStatus, errorThrown){
							$('#meseterminal').html('');
							alert(errorThrown);
						}
						});					
					}		
	  */