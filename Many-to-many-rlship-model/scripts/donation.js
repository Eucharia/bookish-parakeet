$(document).ready(function() {

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
    $(document).on('change', 'select#cat', function() {
      	var idValue = $("#cat :selected").val()
        
        $.get('categories' + '/' + idValue, {option: $(this).val() }, 

          function(data) {
            if (data.success) {
              var accessory = $('#acce');
              accessory.empty();
                $.each(data.accessories, function(key, value){
                   accessory.append('<option value="' + key + '">' + value.name  + '</option>');
                   $('#acce-two').append('<option value="' + key + '">' + value.name  + '</option>');
                });
            } else{
              alert('Failed to load file');
            }        
        }, 'json');
            
    });
});