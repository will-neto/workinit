function readURL(input) {
    if (input.files && input.files[0]) {
      $("#imagens").html('');
      $.each(input.files, function(index, element){
        var reader = new FileReader();
        reader.onload = function(e) {
          $("#imagens").append('<img src="'+ e.target.result + '" class="icone-foto" alt="ícone enviar foto"/>');
          //$('#icone-foto').attr('src', e.target.result);
        }      
        reader.readAsDataURL(element);
      });
    } 
  }
  
  $("#file").change(function() {
    readURL(this);
  });