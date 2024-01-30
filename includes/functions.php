<?php

function emptyInput($mail, $pass){
  if(empty($mail) || empty($pass)){
    $result = true;
  }else{
    $result = false;
  }
  return $result;
}
