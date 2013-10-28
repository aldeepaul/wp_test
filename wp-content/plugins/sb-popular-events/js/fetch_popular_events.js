jQuery(document).ready(function($) {
	// We can also pass the url value separately from ajaxurl for front end AJAX implementations
    console.log(sb_popular_ajax_object.sb_popular_ajax_url);
	jQuery.ajax({
		url: sb_popular_ajax_object.sb_popular_ajax_url,
		type: 'GET',
		dataType: 'json',		
		success: function(data){
            $.each( data.FetchMostPopularMarketsResult, function( key, value ) {
                $("#sb-popular-events").append("<li>" + value.dn + "</li>");
            });
        },
		error: function (xhr, ajaxOptions, thrownError) {
        	console.log(xhr.status);
        	console.log(thrownError);
        	console.log(xhr);
      }
	});
});