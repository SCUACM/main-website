$( window ).scroll(function() {
	    if($(window).scrollTop() > 200){
	       $('.navbar').css({'background-color': '#fff'});
	   	}	
	    else{
	       $('.navbar').css({'background-color': 'transparent'}); 
	     }
	});
    $( window ).resize(function() {
	    if ($(window).width() > 767){
	    	if($(window).scrollTop() < 200){
	    		$('#name').css({'color': '#fff'});
	    		$('#myNavbar a').css({'color': '#fff'}); 
	    	}
	    } 
 	});
 	$( window ).scroll(function() {
	    if ($(window).width() > 767){
	    	if($(window).scrollTop() > 200){
	    		$('#name').css({'color': '#000'});
	    		$('#myNavbar a').css({'color': '#000'});
	    	}
	    } 
 	});
 	$( window ).scroll(function() {
	    if ($(window).width() > 767){
	    	if($(window).scrollTop() < 200){
	    		$('#name').css({'color': '#fff'});
	    		$('#myNavbar a').css({'color': '#fff'});
	    	}
	    } 
 	});

 	$( window ).resize(function() {
	    if ($(window).width() < 768){
	    	if($(window).scrollTop() < 200){
	    		$('#name').css({'color': '#000'});
	    		$('#myNavbar a').css({'color': '#000'});
	    	}
	    } 
 	});