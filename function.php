<?php
define('PAGE_PER_NO',3); 
function getPagination($count){
      $paginationCount= floor($count / PAGE_PER_NO);
      $paginationModCount= $count % PAGE_PER_NO;
      if(!empty($paginationModCount)){
               $paginationCount++;
      }
      return $paginationCount;
}
?>