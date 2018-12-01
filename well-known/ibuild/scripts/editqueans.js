$(document).ready(function(){
var a;
  $(".edit_question_button").click(function(){
     var b=$(this).parent().next();
     var ques_id=$(this).next().val();

     b.show();
     b.next().hide();
     $(".cancel_question_edit").click(function(){
       $(".edit_question_wrap").hide();
       b.next().show();
          });
     b.children(".submit_edited_question").click(function(){
          var content=b.children(".edit_question").val();
          var data="ques="+content+"& ques_id="+ques_id;
          $.ajax({
            type:"post",
            url:"/ibuild/consult/edit_question.php",
            data:data,
            success:function(data){
                if(data=="successful"){
                  alert('success');
                  location.reload();
                }
                else{
                  alert("some error encountered while processing request");
                }
            },
            error:function(data){
              alert("script error");
            }
          });
     });
  });

  $(".delete_question_button").click(function(){
    var que_id=$(this).prev().val();
  
    var data="que_id="+que_id;
    $.ajax({
      type:"post",
      url:"/ibuild/consult/delete_question.php",
      data:data,
      success:function(data){
        if(data=="successful"){
          alert('success');
           location.reload('/ibuild/consult');

        }
        else{
        
          alert("some error encountered while processing request");
        }
      },
      error:function(data){
         alert("error in script");
      }
    });

  });
  $(".edit_answer_button").click(function(){
     var b=$(this).parent().next();
     var ans_id=$(this).next().val();
    $(".cancel_answer_edit").click(function(){
      $(".edit_answer_wrap").hide();
      b.next().show();
    });
     b.show();
     b.next().hide();
     b.children(".submit_edited_answer").click(function(){
          var content=b.children(".edit_answer").val();

          var data="ans="+content+"&ans_id="+ans_id;
          $.ajax({
            type:"post",
            url:"/ibuild/consult/edit_answer.php",
            data:data,
            success:function(data){
              if(data=="successful"){
                alert('success');
                location.reload();
              }
              else{
                alert("some error encountered while processing request");
              }
            },
            error:function(data){
               alert("error in script");
            }
          });
     });
  });

  $(".delete_answer_button").click(function(){
    var ans_id=$(this).prev().val();
    var data="ans_id="+ans_id;
    $.ajax({
      type:"post",
      url:"/ibuild/consult/delete_answer.php",
      data:data,
      success:function(data){
        if(data=="successful"){
          alert('success');
          location.reload();
        }
        else{
          alert("some error encountered while processing request");
        }
      },
      error:function(data){
         alert("error in script");
      }
    });

  });

});
