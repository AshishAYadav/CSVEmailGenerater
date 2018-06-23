<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>CSV email parser</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  </head>
  <body>
  <div class="align-center" style="padding-top:50px">

    <center class="body center" >
      <h1>Your files are Ready</h1>
    <?php

    $foramt_data=file_get_contents($_FILES['sample_format']['name']);
    $csv_data = file_get_contents($_FILES['sample_csv']['name']);

     function csv_to_array($data,$delimeter){
		 $csv_array = array(array(""));
       for($len=0,$i=0,$j=0,$count = 0; $len < strlen($data); ++$len){
		 
		 if (!isset($csv_array[$i][$j]))
            $csv_array[$i][$j]= null;
         if($data[$len]!=',')
         $csv_array[$i][$j].=$data[$len];
         if($data[$len]=="$delimeter"){
           $j++;
           continue;
         }
         if($data[$len]=="\n"){
           $j=0;
           $i++;
           ++$count;
         }
       }
       return $csv_array;
     }
     // function print_2d_array($my_array){
     //   for($i=0; $i<count($my_array); ++$i){
     //     for($j=0; $j<count($my_array[$i]); $j++){
     //       echo $my_array[$i][$j]." ";
     //     }
     //     echo "<br>";
     //   }
     // }

    $my_csv_array=csv_to_array($csv_data,",");
  //  print_2d_array($my_csv_array);

     for($i=0;$i<count($my_csv_array);++$i){
       $str =$foramt_data;
       $fp = fopen("email".($i+1).".txt",'w') or die("can't open file");
       $str=str_replace("__email__",$my_csv_array[$i][0],$str);
       $str=str_replace("__name__",$my_csv_array[$i][1],$str);
       $str=str_replace("__signature__",$my_csv_array[$i][2],$str);
       fwrite($fp,$str);
       fclose($fp);
       echo '<a href="email'.($i+1).'.txt" download="email'.($i+1).'.txt" class="btn" >Download email'.($i+1).'</a> <br><br>';

     }

     ?>

</center>
</div>

  </body>
</html>
