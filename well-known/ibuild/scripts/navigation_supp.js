$(document).ready(function(){
  $("#add_new_mat_but").css("background-color","white");
  $("#add_new_mat_but").css("color","black");
  $("#orders_shower").hide();

  $("#orders_button").click(function(){

    $("#add_new_mat_but").css("background-color","black");
    $("#add_new_mat_but").css("color","white");
    $("#add_new_mat").hide();
    $("#orders_shower").show();

    $("#orders_button").css("background-color","white");
    $("#orders_button").css("color","black");

  });
  $("#add_new_mat_but").click(function () {
    $("#add_new_mat_but").css("background-color","white");
    $("#add_new_mat_but").css("color","black");
    $("#orders_shower").hide();
    $("#add_new_mat").show();
    $("#orders_button").css("background-color","black");
    $("#orders_button").css("color","white");
  });
});
