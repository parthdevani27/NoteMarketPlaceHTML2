<?php
function confirmq($r){
	global $connection;
	  if(!$r){
		   die ("error" .mysqli_error($connection));
	   }
}

function escape($string) {

global $connection;

return mysqli_real_escape_string($connection, trim($string));


}








































?>