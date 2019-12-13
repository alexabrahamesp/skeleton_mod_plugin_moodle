<?php
require_once('../../config.php');
require_once('lib.php');
 
$id = required_param('id', PARAM_INT);
list ($course, $cm) = get_course_and_cm_from_cmid($id, 'ads');
$ads = $DB->get_record('ads', array('id'=> $cm->instance), '*', MUST_EXIST);

   // die(print_object($course));
   // print_object($course);
   $context = context_course::instance($course->id);
   $canreceive = has_capability('mod/customcert:receiveissue', $context); 
   // die(print_object($ads));
   if ($canreceive) {
      $linkname = get_string('certificate', 'ads');
      $link = new moodle_url('/mod/ads/view.php', array('id' => $cm->id, 'downloadown' => true));
      $downloadbutton = new single_button($link, $linkname, 'post', true);
      $downloadbutton->class .= ' m-b-1';  // Seems a bit hackish, ahem.
      $downloadbutton = $OUTPUT->render($downloadbutton);
  }
   // $PAGE->requires->js_call_amd('mod_ads/main','init', ['var_php_to_vue' => 'var_php_to_vue ¡¡WORKING!!']);
   
    echo $OUTPUT->header();
    echo $OUTPUT->render_from_template('mod_ads/app', ['var_php_to_mustache' => 'var_php_to_mustache ¡¡WORKING!!']);
    echo $downloadbutton;
   
    echo $OUTPUT->footer();