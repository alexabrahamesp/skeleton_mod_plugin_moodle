<?php
defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/course/moodleform_mod.php');

class mod_ads_mod_form extends moodleform_mod {

    public function definition() {
        global $CFG, $DB, $OUTPUT;
        $strings = [
            'certificate_title' => get_string('certificate_title', 'ads'),
            'certificate_motive' => get_string('certificate_motive', 'ads'),
            'university_name' => get_string('university_name', 'ads'),
            'entities_group' => get_string('certificate_entities_group', 'ads'),
        ];

        $mform =& $this->_form;
                                                 
        $mform->addElement('text', 'certificate_title', $strings['certificate_title'], array('size'=>'64'));
        $mform->setType('certificate_title', PARAM_TEXT);
        $mform->addRule('certificate_title', null, 'required', null);
         
        $mform->addElement('text', 'certificate_motive', $strings['certificate_motive'], array('size'=>'64'));
        $mform->setType('certificate_motive', PARAM_TEXT);
        $mform->addRule('certificate_motive', null, 'required', null);

        $mform->addElement('text', 'university_name', $strings['university_name'], array('size'=>'64'));
        $mform->setType('university_name', PARAM_TEXT);
        $mform->addRule('university_name', null, 'required', null);
 
        $this->standard_coursemodule_elements();
 
        $this->add_action_buttons();
    }
}
