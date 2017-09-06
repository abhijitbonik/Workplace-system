$(document).on('submit', 'form', function(e){

       e.preventDefault();
       $form =$(this);
       upload($form);
    });

    function upload($form){
       
       $form.find('.progress-bar').removeClass('progress-bar-success').removeClass('progress-bar-danger');
      var formdata = new FormData($form[0]);
      var request = new XMLHttpRequest();

      request.upload.addEventListener('progress', function(e){
        var percent = Math.round(e.loaded/e.total *100);

        $form.find('.progress-bar').width(percent+'%').html(percent+'%');
      });

 

      request.addEventListener('load', function(e){
        $form.find('.progress-bar').addClass('progress-bar-success').html('upload complete.......');
      });



      request.open('post', 'writer_photo.php');
      request.send(formdata);

      $form.on('click', '.cancel', function(){

        request.abort();
        $form.find('.progress-bar').addClass('progress-bar-danger').removeClass('progress-bar-success').html('upload aborted....');
      });
    }