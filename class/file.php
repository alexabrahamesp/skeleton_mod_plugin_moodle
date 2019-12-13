<?php
class ads_file{
    protected $id;
    protected $adsid;
    protected $userid;
    protected $contextid;
    protected $courseid;
    protected $typeimage;
    protected $filename;
    protected $component;
    protected $filearea;
    protected $filepath;
    protected $mimetype;
    protected $timecreated;
    protected $timedeleted;

    public function store($resource, $courseid, $userid){
        $context = context_course::instance($courseid);
        $this->contextid = $context->id;
        $this->adsid = $resource->id;
        $this->courseid = $courseid;
        $this->userid = $userid;
        $this->filename = $resource->name;
        $this->mimetype = $resource->type;
        //$this->typeimage = $resource->type;
        $this->id = self::save_in_database($resource);
        if($this->id){
          self::save_in_disk($resource);
        }else{
          return false;
        }
        $resource = self::to_resource();
        return $resource;
      }


      private function save_in_database($resource){
        global $DB;
        $file = new stdClass();
        $file->ads_contextid = $this->contextid;
        $file->ads_userid = $this->userid;
        $file->ads_adsid = $this->adsid;
        $file->ads_typeimage = $this->typeimage;
        $file->ads_filename = $this->filename;
        $file->ads_timecreated = $this->timecreated;
        $file->ads_timedeleted = $this->timedeleted;
        $id = $DB->insert_record("ads_files", $file, true);
        return $id;
      }


}