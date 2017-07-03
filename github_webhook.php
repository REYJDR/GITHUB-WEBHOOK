<?php

$ROOT_URL = $_REQUEST['ROOT_URL'];
$DIR= '/home/'.$ROOT_URL.'/public_html/';



$ficheros  = scandir($DIR );

foreach($ficheros as $files){

        $find_aci = scandir($files);

        foreach($find_aci as $folder){
	         
	        if($folder == 'ACIWEB'){

		        $EXCE_IN = $DIR.$files.'/'.$folder;

		        $exce =   exec('cd  '. $EXCE_IN.'  &&  git pull');

		        file_put_contents("github-event.log","**** ".date("Y-m-d h:i:sa").' **** '.$EXCE_IN." ****\n--INI--\n ".$exce."\n--END--\n",FILE_APPEND);

		        echo date("Y-m-d h:i:sa").' -  '.$files.'/'.$folder.'<br>  '.$exce.'<br><br> ****** <br>';
	          }

	      }


}

/*
echo $array =  $HTTP_RAW_POST_DATA;
*/
?>
