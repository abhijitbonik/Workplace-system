$("#sub1").click( function(){
	
	

	$.post($("#form2").attr("action"), $("#form2 :input").serializeArray(), function(info){ $("#result1").html(info); });

    clearInput();
});

$("#form2").submit( function(){

	return false;
});

function clearInput(){

	$("#form2 :input").each(function(){
		$(this).val('');
	});
}