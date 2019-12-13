<?php

defined('MOODLE_INTERNAL') || die;

require_once(__DIR__.'/lib.php');



function document_size($position,$type) {
    $data=[];
    switch ($type) {
      case 'latter':
          if($position == 'horizontal'){
              $data['width'] = 279;
              $data['height'] =216;
          }else{
              $data['width'] = 216 ;
              $data['height'] = 279;
          }
          break;
      case 'official':
          if($position == 'horizontal'){
              $data['width'] =356 ;
              $data['height'] = 216;
          }else{
              $data['width'] = 216;
              $data['height'] = 356;
          }
          break;
      case 'A4':
          if($position == 'horizontal'){
              $data['width'] =297 ;
              $data['height']= 210;
          }else{
              $data['width'] = 210;
              $data['height'] = 297;
          }
          break;
      default:
          # code...
          break;
  }
    return $data;
}