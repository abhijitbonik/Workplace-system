$(".btnbtnprimary").click( function(){
	
	

	$.post($(".form").attr("action"), $(".form :input").serializeArray(), function(info){ $(".result").html(info); });

});

$(".form").submit( function(){

	return false;
});

