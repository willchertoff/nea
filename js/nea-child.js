window.onload = function() {
  new WOW().init();

  jQuery(document).ready(function ($) {
    $('#mobile-menu-icon').click(function(){
        $('.popup').toggleClass('popup-up');
        $('.nav-open').toggleClass('down');
    });

    $('#search-toggle').click(function() {
      $('#searchform').toggleClass('active');
    })
  });
  //Gravity Forms - Click and Pledge - Preset amounts 
  jQuery(document).ready(function ($) {
	  $('#set-25').click(function(){
		$(this).addClass("active");
		$('#set-50').removeClass("active");
		$('#set-100').removeClass("active");
		$('#set-500').removeClass("active");
		$('#set-1000').removeClass("active");
		$('#input_55_38').val('$25.00');
		$('#input_55_38').trigger('change'); 
	  });
	  $('#set-50').click(function(){
		$(this).addClass("active");  
		$('#set-25').removeClass("active");
		$('#set-100').removeClass("active");
		$('#set-500').removeClass("active");
		$('#set-1000').removeClass("active");
		$('#input_55_38').val('$50.00');
		$('#input_55_38').trigger('change'); 
	  });
	  $('#set-100').click(function(){
		  $(this).addClass("active");
		  $('#set-25').removeClass("active");
		$('#set-50').removeClass("active");
		$('#set-500').removeClass("active");
		$('#set-1000').removeClass("active");
		$('#input_55_38').val('$100.00');
		$('#input_55_38').trigger('change'); 
	  });
	  $('#set-500').click(function(){
		  $(this).addClass("active");
		  $('#set-25').removeClass("active");
		$('#set-50').removeClass("active");
		$('#set-100').removeClass("active");
		$('#set-1000').removeClass("active");
		$('#input_55_38').val('$500.00');
		$('#input_55_38').trigger('change'); 
	  });
	  $('#set-1000').click(function(){
		  $(this).addClass("active");
		  $('#set-25').removeClass("active");
		$('#set-50').removeClass("active");
		$('#set-100').removeClass("active");
		$('#set-500').removeClass("active");
		$('#input_55_38').val('$1000.00');
		$('#input_55_38').trigger('change'); 
	  });
	  $('#input_55_38').click(function(){
		  $('#set-25').removeClass("active");
		$('#set-50').removeClass("active");
		$('#set-100').removeClass("active");
		$('#set-500').removeClass("active");
		$('#set-1000').removeClass("active");
		$('#input_55_38').trigger('change'); 
	  });
  });
  //Gravity Forms - Click and Pledge - Ghost field for recurring payments
  jQuery(document).ready(function ($) {
		  
		  var formdonateoptionhidden = document.getElementById("gfp_44");
		  //console.log("Init:" + formdonateoptionhidden.value);
		  $('.recpayoptions').each(function () {
			  $(this).change( function() {
				  setTimeout(function(){
				  var hiddenvalue = formdonateoptionhidden.value;
				  //console.log("Change:" + hiddenvalue);
				  if(hiddenvalue == 'yes') {
					  $('#choice_55_46_0').removeAttr('checked');
					  $('#choice_55_46_1').attr('checked', true).trigger("click");
					  //console.log("YES:" + hiddenvalue);
				  } else {
					  $('#choice_55_46_1').removeAttr('checked');
					  $('#choice_55_46_0').attr('checked', true).trigger("click");
					  //console.log("NO:" + hiddenvalue);
				  }
				  //console.log("Change after:" + hiddenvalue);
				  }, 500);
			  });
		  });
  });
  
}
