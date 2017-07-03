<?php

$ROOT_URL = $_REQUEST['ROOT_URL'];

$ficheros  = scandir('/home/'.$ROOT_URL.'/public_html/');

foreach($ficheros as $files){

        $find_aci = scandir($files);

        foreach($find_aci as $folder){
         if($folder == 'ACIWEB'){

        $exce =   exec('cd /home/daoutel/public_html/'.$files.'/'.$folder.' &&  git pull');
        file_put_contents("github-event.log","**** ".date("Y-m-d h:i:sa").' **** '.$files.'/'.$folder." ****\n--INI--\n ".$exce."\n--END--\n",FILE_APPEND);

        echo date("Y-m-d h:i:sa").' -  '.$files.'/'.$folder.'<br>  '.$exce.'<br><br> ****** <br>';
          }
        }


}

/*
echo $array =  $HTTP_RAW_POST_DATA;
*/
?>
