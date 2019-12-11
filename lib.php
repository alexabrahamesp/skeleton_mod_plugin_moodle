<?php 
// Este fichero puede ser cargado para el contexto global de moodle, tenga en cuenta que algunas modificaciones acá
// podrian ser utilizadas en otros contextos.

defined('MOODLE_INTERNAL') || die;

// require_once($CFG->dirroot . '/mod/ads/locallib.php');
function dd($var){
    print_object($var);
    die;
}

function dump($var){
    print_object($var);
}

// function ads_supports($feature){
//     dump($feature);
//     dd("ads_supports");
// }

function ads_add_instance($ads) {
    dump($ads);
    dd("ads_add_instance");
}

// function ads_update_instance($ads){
//     dump($ads);
//     dd("ads_update_instance");
// }

// function ads_save_content($ads){
//     dump($ads);
//     dd("ads_save_content"); 
// }

// function ads_delete_instance($id){
//     dump($id);
//     dd("ads_delete_instance"); 
// }

// function ads_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, $options = array()) {
//     // Esta es para buscar ficheritos jejeje
// }

// function ads_grade_item_update($ads, $grades=null) {
//     dump("------------------------------ ads");
//     dump($ads);
//     dump("------------------------------ Grades");
//     dump($grades);
//     dd("ads_grade_item_update"); 
// }

// function ads_update_grades($ads=null, $userid=0, $nullifnone=true) {
//     dump($ads);
//     dd("ads_update_grades"); 
// }
