	  var c = jQuery.noConflict();	 
	  
	  c(document).ready(function(){

          c('#myModal').on('shown.bs.modal', function () {
             c('#myInput').focus()
          })

          c('.slideshow').cycle({fx: 'fade', speed: 5000, timeout: 6000});
	      
	  });


