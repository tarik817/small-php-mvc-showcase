jQuery(document).ready(function($){
	//Delete record.
	$('div#board').on ('click', 'button.close', function(){
		//Get data.
		var holder = $(this).closest('.panel-default');
		var user_id = holder.find('input.user_id').val();
		var post_id = holder.find('input.post_id').val();
		//Send ajax request.
		$.ajax({
        url: $('div#urls input#remove_url').val(),
        type: "post",
        dataType: "text",
        data: {
          'post_id': post_id,
          'user_id': user_id
        },
        success: function(data) {
        	holder.slideUp("normal", function() { $(this).remove(); } );
          return ;
        },
        error: function(data) {
        	holder.prepend('<div class="limitlife"><div class="alert alert-danger alert-dismissible" role="alert"><strong>Error!</strong> Sorry you post was not removed.</div></div>');
        	setTimeout(function(){
        		$('div.limitlife').slideUp("normal", function() { $(this).remove(); } );
        	}, 2000);
          return ;
        } 
    });
	});
});