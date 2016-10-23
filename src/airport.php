<?php
  class Airport {

    public $planes = [];

    public function land($plane) {
      array_push($this->planes, $plane);
    }

    public function takeOff($plane){
      if ($this->isStormy() == true) {
        trigger_error("Cannot lane plane weather is stormy", E_USER_ERROR);
      }
      array_pop($this->planes);
    }

    public function isStormy(){
      return rand(1, 6) > 4;
    }
  }
?>
