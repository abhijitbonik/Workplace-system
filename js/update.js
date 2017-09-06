$("#sub").click( function(){
	
	

	$.post($("#form1").attr("action"), $("#form1 :input").serializeArray(), function(info){ $("#result").html(info); });

    clearInput1();
});

$("#form1").submit( function(){

	return false;
});

function clearInput1(){

	$("#form1 :input").each(function(){
		$(this).val('');
	});
}

