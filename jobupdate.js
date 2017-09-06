 $(".btnbtnprimary").click(function(){   
    $.ajax({     
           type: "POST",    
           url: "job_apply.php",        
           data: $(this).parent().serialize(),
           success: function(data){                
               alert(data);        
               }          


          });     

          return false;  });