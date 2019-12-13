<?php
defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/course/moodleform_mod.php');

class mod_ads_mod_form extends moodleform_mod {

    public function definition() {
        global $CFG, $DB, $OUTPUT;
// nombre descriptivo 
        $options_document_position= [
            'horizontal' => 'Horizontal',
            'vertical'   => 'Vertical',
        ];
        $options_document_format=[
            'latter'     => get_string('letter_document', 'ads'),
            'official'   => get_string('official_document', 'ads'),
            'A4'        => get_string('A4_document', 'ads')
        ];
        $strings = [
            'certificate_title'          => get_string('certificate_title', 'ads'),
            'university_name'            => get_string('university_name', 'ads'),
            'entities_group'             => get_string('certificate_entities_group', 'ads'),
            'certificate_description'    => get_string('certificate_description', 'ads'),
            'options'                    => get_string('options','ads'),
            'add_university'             => get_string('add_university','ads'),
            'document_format'            => get_string('document_format','ads'),
            'document_position'          => get_string('document_position','ads'),
            'advanced_signature'         => get_string('advanced_signature','ads'),
            'document_design'            => get_string('document_design','ads'),
            'document_backgroud'         => get_string('document_background','ads'),
            'document_footer'            => get_string('document_footer','ads'),
            'document_header'            => get_string('document_header','ads'),
            'add_description'            => get_string('add_description','ads'),
            'add_course_name'            => get_string('add_course_name','ads'),
            'content'                    => get_string('content','ads')
        ];
        $mform =& $this->_form;

// Agregar datos generales
        $mform->addElement('header', 'general', get_string('general', 'form'));

        $mform->addElement('text', 'certificate_title', $strings['certificate_title'], array('size'=>'64'));
        $mform->setType('certificate_title', PARAM_TEXT);
        $mform->addRule('certificate_title', null, 'required', null);



        
// Agregar datos opcionales
        $optionsheader = $mform->addElement('header', 'content', $strings['content']);

        $mform->addElement('selectyesno', 'advanced_signature', $strings['advanced_signature']);
        $mform->setDefault('advanced_signature', 0);
        $mform->addHelpButton('advanced_signature', 'advanced_signature', 'ads');
        $mform->setType('advanced_signature', PARAM_INT);
    
        $mform->addElement('selectyesno', 'add_course_name', $strings['add_course_name']);
        $mform->setDefault('add_course_name', 0);
        $mform->addHelpButton('add_course_name', 'add_course_name', 'ads');
        $mform->setType('add_course_name', PARAM_INT);

        $mform->addElement('selectyesno', 'add_description', $strings['add_description']);
        $mform->setDefault('add_description', 0);
        $mform->addHelpButton('add_description', 'add_description', 'ads');
        $mform->setType('add_description', PARAM_INT);

        $mform->addElement('text', 'certificate_description', $strings['certificate_description'], array('size'=>'64'));
        $mform->setType('certificate_description', PARAM_TEXT);
        $mform->hideIf('certificate_description', 'add_description', 'eq', 0);   

         $mform->addElement('selectyesno', 'add_university', $strings['add_university']);
        $mform->setDefault('add_university', 0);
        $mform->addHelpButton('add_university', 'add_university', 'ads');
        $mform->setType('add_university', PARAM_INT);

        $mform->addElement('text', 'university_name', $strings['university_name'], array('size'=>'64'));
        $mform->setType('university_name', PARAM_TEXT);
        $mform->hideIf('university_name', 'add_university', 'eq', 0);
   
// Agregar imagenes del documento
        $mform->addElement('header', 'document_design', $strings['document_design']);

        $mform->addElement('select', 'document_position',$strings['document_position'],$options_document_position);
        $mform->setDefault('document_position', get_config('ads', 'document_position'));
        $mform->addHelpButton('document_position', 'document_position', 'ads');
        $mform->setType('document_position', PARAM_TEXT);

        $mform->addElement('select', 'document_format',$strings['document_format'],$options_document_format);
        $mform->setDefault('document_format', get_config('ads', 'document_format'));
        $mform->addHelpButton('document_format', 'document_format', 'ads');
        $mform->setType('document_format', PARAM_TEXT);

        $mform->addElement('filepicker', 'document_backgroud', $strings['document_backgroud'], null,
                array('maxbytes' => $maxbytes, 'accepted_types' => '*'));

        $mform->addElement('filepicker', 'document_header', $strings['document_header'], null,
                array('maxbytes' => $maxbytes, 'accepted_types' => '*'));
        $mform->addElement('filepicker', 'document_footer', $strings['document_footer'], null,
                array('maxbytes' => $maxbytes, 'accepted_types' => '*'));
    
        $this->standard_coursemodule_elements();
 
        $this->add_action_buttons();
    }
}
