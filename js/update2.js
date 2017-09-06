$("#sub3").click( function(){
	
	

	$.post($("#form3").attr("action"), $("#form3 :input").serializeArray(), function(info){ $("#result3").html(info); });

    clearInput1();
});

$("#form3").submit( function(){

	return false;
});

function clearInput1(){

	$("#form3 :input").each(function(){
		$(this).val('');
	});
}