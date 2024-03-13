<?php

class Event {

  public $id;
  public $nome_evento;
  public $attendees;
  public $data_evento;

  public function __construct($id, $nome_evento, $attendees, $data_evento) {
    $this->id = $id;
    $this->nome_evento = $nome_evento;
    $this->attendees = $attendees;
    $this->data_evento = $data_evento;
  }

  public function getId() {
    return $this->id;
  }

  public function getEventById($id) {
    return $this->$id;
  }

  public function getTitle() {
    return $this->nome_evento;
  }

  public function getDescription() {
    return $this->data_evento;
  }

  public function getAttendees() {
    return $this->attendees;
  }
}

?>