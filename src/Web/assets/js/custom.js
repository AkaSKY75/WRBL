
	  jQuery(document).ready(function($) {
		/*place jQuery actions here*/ 
	
		$("form.produse").submit(function(e) {
			// Get the product ID and the quantity 
			var id_form= $(this).attr('id');		
			var product_id=id_form.substr(3);
		//	var product_id = $(this).find('input[name=id_product]').val();
			var campp= "#qty"+product_id;
			var qty = $(campp).val();
			//$("button.adagugaincos").unbind("mouseenter mouseleave");
			//$("button.adagugaincos").unbind("hover");
			$.post( link + "/cart/add_cart_item", { product_id: product_id, quantity: qty, ajax: 1 },
  				function(data){	
 		 			// Interact with returned data
					if(data == 'true'){ 		 			
    					$.get(link + "/cart/actualizare", function(cart){ // Get the contents of the url cart/show_cart
  							$("#cart_total").html(cart); // Replace the information in the div #cart_content with the retrieved data
							$("#trimite_comanda").removeAttr('disabled');						
							$("#mesajajax").addClass("msg_success");
							$("#mesajajax").html("Produs adaugat cu succes!");
							//$("#cart_quant").focus().select();
							$(this).find('button[type=submit]').mouseup();
							$(this).find('button[type=submit]').mouseout();
							
						}); 		 
										
 		 			}else{
 		 				alert("Product does not exist");
 		 			}
 			 });
			return false; // Stop the browser of loading the page defined in t
		});
		
		
		$('a[data-toggle="modal"]').on('click', function(e) {
			var target_modal = $(e.currentTarget).data('target');
			var remote_content = e.currentTarget.href;
			var modal = $(target_modal);
			var modalBody = $(target_modal + ' .modal-body');
			modal.on('show.bs.modal', function () {
					modalBody.load(remote_content);
				}).modal();
			return false;
		  });
		
		$( "#cheama_ospatar" ).click(function() {
			var id_table=$("#id_table").val();  
			var site_url=$("#site_url").val();  
			var url=site_url+"/nfc/cheama_ospatar/";
			$("#mesajajax").html('')
			$.ajax({
					url: url,
					data: {id_table: id_table
					},
					type: "post",
					success: function(msg){	
						$("#mesajajax").addClass("msg_success");
						$("#mesajajax").html(msg);	
					}
				});
		});
		
		$( "#cere_nota" ).click(function() {
			var id_table=$("#id_table").val();  
			var site_url=$("#site_url").val(); 
			var metoda_plata=$("#metoda_plata").val();
			if(metoda_plata==3){
			var popUpList = $('<div><form action=""><input type="radio" value="cash">Cash<br><input type="radio" vaue="Card">Card<br><button type="submit" class="btn nota">Trimite</button></form></div>');			
			var raspuns=popUpList.dialog();
			alert(raspuns);
			}
			var url=site_url+"/nfc/cere_nota/";
			$("#mesajajax").html('')
			$.ajax({
					url: url,
					data: {id_table: id_table
					},
					type: "post",
					success: function(msg){	
						$("#mesajajax").addClass("msg_success");
						$("#cere_nota").removeAttr('disabled');	
						$("#mesajajax").html(msg);	
					}
				});
		});
		
		$( "#trimite_comanda" ).click(function() {
			var site_url=$("#site_url").val();  
				window.location.href = site_url+"/cart";
		});
		
		$( "#produse_comandate" ).click(function() {
			var site_url=$("#site_url").val();  
				window.location.href = site_url+"/nfc/produse_comandate/";
		});
		
		$( "#comanda_mea" ).click(function() {
			
		var site_url=$("#site_url").val();  
			window.location.href = site_url+"/cart/comanda_mea";
		});
		
		
		
		  // Match to Bootstraps data-toggle for the modal
		  // and attach an onclick event handler
		  $('a[data-toggle="modal"]').on('click', function(e) {

			// From the clicked element, get the data-target arrtibute
			// which BS3 uses to determine the target modal
			var target_modal = $(e.currentTarget).data('target');
			// also get the remote content's URL
			var remote_content = e.currentTarget.href;

			// Find the target modal in the DOM
			var modal = $(target_modal);
			// Find the modal's <div class="modal-body"> so we can populate it
			var modalBody = $(target_modal + ' .modal-body');

			// Capture BS3's show.bs.modal which is fires
			// immediately when, you guessed it, the show instance method
			// for the modal is called
			modal.on('show.bs.modal', function () {
					// use your remote content URL to load the modal body
					modalBody.load(remote_content);
				}).modal();
				// and show the modal

			// Now return a false (negating the link action) to prevent Bootstrap's JS 3.1.1
			// from throwing a 'preventDefault' error due to us overriding the anchor usage.
			return false;
		  });
	  })

	  
	  
	  