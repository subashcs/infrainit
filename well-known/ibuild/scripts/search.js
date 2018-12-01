$(document).ready(function(){
  $('#show_searched_materials_button').attr("class","activeresultshow");
  $('#show_searched_suppliers_button').attr("class","notactiveresultshow");
  $('#show_searched_customers_button').attr("class","notactiveresultshow");
  $('#show_searched_architects_button').attr("class","notactiveresultshow");
    
  $("#materials").show();
  $("#customers").hide();
  $("#suppliers").hide();
  $("#architects").hide();
  $("#show_searched_materials_button").click(function(){
   $('#show_searched_materials_button').attr("class","activeresultshow");
   $('#show_searched_suppliers_button').attr("class","notactiveresultshow");
   $('#show_searched_customers_button').attr("class","notactiveresultshow");
   $('#show_searched_architects_button').attr("class","notactiveresultshow");
    
   $("#materials").show();
   $("#suppliers").hide();
   $("#customers").hide();
   $("#architects").hide();
  });
  $("#show_searched_customers_button").click(function(){
   $('#show_searched_customers_button').attr("class","activeresultshow");
   $('#show_searched_materials_button').attr("class","notactiveresultshow");
   $('#show_searched_suppliers_button').attr("class","notactiveresultshow");
   $('#show_searched_architects_button').attr("class","notactiveresultshow");
    
   $("#customers").show();
   $("#materials").hide();
   $("#suppliers").hide();
   $("#architects").hide();
  });
  $("#show_searched_suppliers_button").click(function(){
  $('#show_searched_suppliers_button').attr("class","activeresultshow");
  $('#show_searched_materials_button').attr("class","notactiveresultshow");
  $('#show_searched_customers_button').attr("class","notactiveresultshow");
  $('#show_searched_architects_button').attr("class","notactiveresultshow");
    
  $("#suppliers").show();
   $("#customers").hide();
   $("#materials").hide();
   $("#architects").hide();

  });
  
  $("#show_searched_architects_button").click(function(){
  $('#show_searched_suppliers_button').attr("class","notactiveresultshow");
  $('#show_searched_materials_button').attr("class","notactiveresultshow");
  $('#show_searched_customers_button').attr("class","notactiveresultshow");
  $('#show_searched_architects_button').attr("class","activeresultshow");
    
  $("#suppliers").hide();
   $("#customers").hide();
   $("#materials").hide();
   $("#architects").show();

  });
});
