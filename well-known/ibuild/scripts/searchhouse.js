$(document).ready(function(){
  $("#searchhousebut").click(function () {

    var frm = $('#left_sidebar');
    $.ajax({
        url:'process_house_search.php',
        data: frm.serialize(),
        success: function (data) {
          if(data!=''){
            $('#middle_part').html(data);

          }
          else{$('#middle_part').html("<h3>Sorry no match found</h3>");}
        }
    });


});

});
