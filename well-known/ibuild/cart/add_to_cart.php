<?php
if(!empty($_GET['mat'])){

    $mat=$_GET['mat'];

     if(!isset($_COOKIE['test_cookie'])){
    setcookie("test_cookie", "test", time() + 3600);
  }
  if(count($_COOKIE) > 0) {
      
    
      if(isset($_COOKIE['infracookie']))
      {
         $data = $_COOKIE["infracookie"];
             
          
         $mycooks=explode(',',$data);
          $arr=$mat;
         //$arr=array('id'=>$mat);
         array_push($mycooks,$arr);
        $mycookie=implode(',',$mycooks);
      
        if(setcookie("infracookie",$mycookie,time()+7*86400)){
            $_COOKIE['infracookie']=$mycookie;
            header('location:index.php');
        }
        else{
            echo "failure.go back";
        }
        

      
      }

      else{
        
        $mycookie=$mat;
        if(setcookie("infracookie",$mycookie,time()+7*86400)){
             $_COOKIE['infracookie']=$mycookie;
             
            header('location:index.php');
        }
        else{
            echo "failure";
        }
       
      }
     }
  else {
        echo "<h4>Cookies are disabled.Please enable Cookies.<h4>";
    }

  }
  ?>