<?php
function allPages(){
 return
    ["Home","Destinations","Author","Login","Register","Booking"];
 }
 function accessPercentage(){
 $array=[];
 $count=0;
 $home=0;
 $destinations=0;
 $author=0;
 $login=0;
 $register=0;
 $booking=0;
 
 $oneDayAgo=strtotime("1 day ago");

 @$file=file("data/log.txt");
 if(count($file)){
 foreach($file as $i){
 $part=explode("\t",$i);
 $url=explode(".php",$part[0]);
 $page=explode("&",$url[1]);

 if(strtotime($part[1])>=$oneDayAgo)
         switch($page[0]){
          case "":$home++;$count++;;break;
          case "?page=home":$home++;$ukupno++;;break;
          case "?page=destinations":$destinations++;$count++;;break;
          case "?page=author":$author++;$count++;;break;
          case "?page=register":$register++;$count++;;break;
          case "?page=login":$login++;$count++;;break;
          case "?page=booking":$booking++;$count++;;break;
 
        default:$home++;$count++;;break;
        }
        }
        }
      if($count>0){
    $array[]=round($home*100/$count,2);
    $array[]=round($destinations*100/$count,2);
    $array[]=round($author*100/$count,2);
    $array[]=round($register*100/$count,2);
    $array[]=round($login*100/$count,2);
    $array[]=round($booking*100/$count,2);
   }
 
      return $array;
    }


      function getLogin($id){
       @$open=fopen(LOGIN_FAJL,"a");
       $insert=$id."\n";

     @fwrite($open,$insert);
     @fclose($open);
       }



   function numberOfLoged(){
      return count(file(LOGIN_FAJL));
    }

    function unsetLogin($id){
     $id=(int)$id;
     $insert="";
     @$file=file(LOGIN_FAJL);
     if(count($file)){
     foreach($file as $i){
     $iId=trim((int)$i);
     if($iId!=$id){
     $insert.=$iId."\n";
      }
       }
        }
      @$open=fopen(LOGIN_FAJL,"w");
      @fwrite($open,$insert);
      @fclose($open);
      }
