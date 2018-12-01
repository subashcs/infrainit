<?php
$del=$_POST['del'];

$cookie=explode(',',$_COOKIE['infracookie']);

$newar=array();
$k=0;
if(count($cookie)==1){
        
    if(setcookie("infracookie","",time()-3600)){
        $_COOKIE['infracookie']='';
        echo "successful";
    }
    else{
        echo "failure";
    }
}
else{
    
    //echo count($cookie);
    //echo $_COOKIE['infracookie'];
    for($i=0;$i<count($cookie);$i++)
    {  
      if($cookie[$i]!=$del){
        array_push($newar,$cookie[$i]);
      }
      else{
          if($k==1)
          {
             array_push($newar,$cookie[$i]);  
          }
          else{
             
              $k++;
          }
      }
      
    }
    
    if(setcookie("infracookie",implode(',',$newar),time()+7*86400)){
        echo "success";
    }
    else{
        echo "failure";
    }
}

 ?>
