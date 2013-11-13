<?php

/*
* Generates a random key for user authentication
* @PARAM: A key size (int) 
*/
function rand_char($length) {
  $random = '';
  for ($i = 0; $i < $length; $i++) {
    $random .= chr(mt_rand(33, 126));
  }
  return $random;
}






?>