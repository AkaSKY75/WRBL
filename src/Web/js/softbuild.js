  $( "#thumb1" ).click(function() {
  $( "#slide1" ).fadeIn( "slow", function() {
    // Animation complete.
  });  
         $( "#slide2" ).fadeOut( "slow", function() {
    // Animation complete.
  });
         
          $( "#slide3" ).fadeOut( "slow", function() {
    // Animation complete.
  });
         
         $("#slide1").addClass("active")
         $("#slide2").removeClass("active")
         $("#slide3").removeClass("active")
});
        
        $( "#thumb2" ).click(function() {
  $( "#slide2" ).fadeIn( "slow", function() {
    // Animation complete.
  }); 
          
          $( "#slide1" ).fadeOut( "slow", function() {
    // Animation complete.
  });
         
          $( "#slide3" ).fadeOut( "slow", function() {
    // Animation complete.
  });
          
          $("#slide2").addClass("active")
          $("#slide1").removeClass("active")
         $("#slide3").removeClass("active")
});

        
$( "#thumb3" ).click(function() {
  $( "#slide3" ).fadeIn( "slow", function() {
    // Animation complete.
  }); 
          
          $( "#slide1" ).fadeOut( "slow", function() {
    // Animation complete.
  });
         
          $( "#slide2" ).fadeOut( "slow", function() {
    // Animation complete.
  });
          $("#slide3").addClass("active")
          $("#slide1").removeClass("active")
         $("#slide2").removeClass("active")
});
 
      $( "#goright" ).click(function() {
       if( $("#slide1").hasClass("active") ) {
         $("#slide2").addClass("active")
         $("#slide1").removeClass("active")
         $("#slide1").fadeOut()
         $("#slide2").fadeIn()
         
       }
        
        else if( $("#slide2").hasClass("active") ) {
         $("#slide3").addClass("active")
         $("#slide2").removeClass("active")
         $("#slide2").fadeOut()
         $("#slide3").fadeIn()
         
       }
        
        else if( $("#slide3").hasClass("active") ) {
         $("#slide1").addClass("active")
         $("#slide3").removeClass("active")
         $("#slide3").fadeOut()
         $("#slide1").fadeIn()
         
       }
});
        
        $( "#goleft" ).click(function() {
       if( $("#slide1").hasClass("active") ) {
         $("#slide3").addClass("active")
         $("#slide1").removeClass("active")
         $("#slide1").fadeOut()
         $("#slide3").fadeIn()
         
       }
        
        else if( $("#slide2").hasClass("active") ) {
         $("#slide1").addClass("active")
         $("#slide2").removeClass("active")
         $("#slide2").fadeOut()
         $("#slide1").fadeIn()
         
       }
        
        else if( $("#slide3").hasClass("active") ) {
         $("#slide2").addClass("active")
         $("#slide3").removeClass("active")
         $("#slide3").fadeOut()
         $("#slide2").fadeIn()
         
       }
});
        
        
        
       
      window.setInterval(function(){
   if( $("#slide1").hasClass("active") ) {
         $("#slide2").addClass("active")
         $("#slide1").removeClass("active")
         $("#slide1").fadeOut()
         $("#slide2").fadeIn()
         
       }
        
        else if( $("#slide2").hasClass("active") ) {
         $("#slide3").addClass("active")
         $("#slide2").removeClass("active")
         $("#slide2").fadeOut()
         $("#slide3").fadeIn()
         
       }
        
        else if( $("#slide3").hasClass("active") ) {
         $("#slide1").addClass("active")
         $("#slide3").removeClass("active")
         $("#slide3").fadeOut()
         $("#slide1").fadeIn()
         
       }
}, 8000);
      
      
		jQuery(document).ready(function($) {
			
			$('#reducere').change(function() {				
				seteazaPreturi();
			});
			
			$("#plusquant").click(function() {  
					
				var newQty = parseInt($("#quantbox").val())+ parseInt($("#step").val()); 
				 
				if (newQty > parseInt($("#limmax").val()))
					newQty = $("#limmax").val();	
			
				$("#quantbox").val(newQty); 
				seteazaPreturi();
			});
				
			$("#minusquant").click(function() {
				var newQty =+($("#quantbox").val() - $("#step").val());  

				if(isNaN(parseInt(newQty)))
					newQty =$("#limmin").val();

				if (newQty < $("#limmin").val()) 
					newQty = $("#limmin").val();
				
					
				$("#quantbox").val(newQty);   
				seteazaPreturi();
			});
			  
			$( "#quantbox" ).keyup(function() {
				var newQty = +($("#quantbox").val()); 

				if(isNaN(parseInt(newQty)))
					newQty = $("#limmin").val();

				if (newQty < $("#limmin").val()) 
					newQty = $("#limmin").val();
				if(newQty > $("#limmax").val())
					newQty = $("#limmax").val();
				
				$("#quantbox").val(newQty); 
				seteazaPreturi();
			});
			
			
			
			
			
			
			
			
			
			
		});
		/*
		// honor points - 11.05.2016

		function seteazaPreturi1(){
				
			var newQty = $("#quantbox").val(); 
			if(isNaN(parseInt(newQty))){
				newQty = limmin;
			}   
          
			if (newQty < parseInt($("#limmin").val())) 
			{
				newQty = parseInt($("#limmin").val());
			} 
			if (newQty > parseInt($("#limmax").val()))
			{
				newQty = parseInt($("#limmax").val());
			}
            //variabile din html
			$("#quantbox").val(newQty); 
			$("#price5").text(newQty);
			
			// calc pret honor points
			var pricePerItem5=$('#pricePerItem5').val();
			//if(document.getElementById('reducere').checked)
			//{
				//$("#reducere").checked(function(){
				//var price5 = ((pricePerItem5*newQty)-((0.4 * pricePerItem5*newQty )));
				
			//});
			
			//}else
			//{   
				var price5=(pricePerItem5*newQty);
			//}
			
			$("#pretPerFeature5").text("$"+parseFloat(price5).toFixed(2));
		}		

*/
		function seteazaPreturi(){
			var newQty = $("#quantbox").val(); 
			var reducere = $("#valreducere").val();
			if(isNaN(parseInt(newQty))){
				newQty = $("#limmin").val();
			}   
          
			if (newQty < parseInt($("#limmin").val())) {
				newQty = parseInt($("#limmin").val());
			}  
            //variabile din html
			$("#quantbox").val(newQty); 
			$("#price1").text(newQty);
			$("#price2").text(newQty);
			$("#price3").text(newQty);            
            $("#price4").text(newQty);
			$("#price5").text(newQty);
			
			// calc pret
			var pricePerItem1=$('#pricePerItem1').val();
			var pret1=pricePerItem1*newQty;
			
			$("#pretPerFeature1").text("$"+parseFloat(pret1).toFixed(2));
			
			var pricePerItem2=$('#pricePerItem2').val();
			var pret2=pricePerItem2*newQty;
			
			$("#pretPerFeature2").text("$"+parseFloat(pret2).toFixed(2));
			
			var pricePerItem3=$('#pricePerItem3').val();
			var pret3=pricePerItem3*newQty;
			
			$("#pretPerFeature3").text("$"+parseFloat(pret3).toFixed(2));
            
            var pricePerItem4=$('#pricePerItem4').val();
			var price4=pricePerItem4*newQty;
			
			$("#pretPerFeature4").text("$"+parseFloat(price4).toFixed(2));
			
            var pricePerItem5=$('#pricePerItem5').val();
			price5=calculeazareducere(newQty,reducere,pricePerItem5);
			$("#pretPerFeature5").text("$"+parseFloat(price5).toFixed(2));
			
		}
      
	function calculeazareducere(){
		var pricePerItem5=$('#pricePerItem5').val();
		var reducere=$("#valreducere").val();
		var newQty=$("#quantbox").val();
		var price5=parseFloat(pricePerItem5*newQty);
		if($("#reducere").is(':checked')){
			price5=parseFloat(price5*(100-parseInt(reducere))/100);
		}
		return price5;
	}
