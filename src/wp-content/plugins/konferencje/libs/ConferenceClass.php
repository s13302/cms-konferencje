<?php

class ConferenceClass {

  private $id = NULL;
  private $speaker = NULL;
  private $places_limit = NULL;
  private $price = NULL;
  private $published = NULL;

  private $errors = array();

  function __construct() {
    $entity = isset($_POST["entity"]) ? $_POST["entity"] : NULL;

    $this->id = isset($entity["id"]) ? $entity["id"] : NULL;
    $this->speaker = isset($entity["speaker"]) ? $entity["speaker"] : NULL;
    $this->places_limit = isset($entity["places_limit"]) ? $entity["places_limit"] : NULL;
    $this->price = isset($entity["price"]) ? $entity["price"] : NULL;
    $this->published = isset($entity["published"]) ? true : false;
  }

  function validate() {
    /*
    speaker:
    * not null
    */
    if (! isset($this->speaker) || empty($this->speaker)) {
      $this->addError('speaker', 'Pole `speaker` nie może być puste.');
    }
    /*
    places_limit:
    * not null
    * number
    * greather or equal than -1
    */
    if (! isset($this->places_limit) || empty($this->places_limit)) {
      $this->addError('places_limit', 'Pole `Limit miejsc` nie może być puste.');
    }
    if (! is_numeric($this->places_limit)) {
      $this->addError('places_limit', 'Pole `Limit miejsc` musi zawierać liczbę.');
    }
    if ($this->places_limit < -1) {
      $this->addError('places_limit', 'Pole `Limit miejsc` nie może być mniejsze niż -1.');
    }
    /*
    price:
    * not null
    * number
    * greather or equal than 0
    */
    if (! isset($this->price) || empty($this->price)) {
      $this->addError('price', 'Pole `Cena za osobę` nie może być puste.');
    }
    if (! is_numeric($this->price)) {
      $this->addError('price', 'Pole `Cena za osobę` musi zawierać liczbę.');
    }
    if ($this->price < 0) {
      $this->addError('price', 'Pole `Cena za osobę` nie może być mniejsze niż 0.');
    }
    return $this->hasErrors();
  }

  function getId() {
    return $this->id;
  }

  function getSpeaker() {
    return $this->speaker;
  }

  function getPlacesLimit() {
    return $this->places_limit;
  }

  function getPrice() {
    return $this->price;
  }

  function isPublished() {
    return $this->published;
  }

  function getErrors() {
    return $this->errors;
  }

  function hasErrors() {
    $this->validate();
    return empty($this->errors);
  }

  private function addError($field, $msg) {
    if (! isset($this->errors[$field])) {
      $this->errors[$field] = $msg;
    } else {
      $this->errors[$field] .= "\n" . $msg;
    }
  }

}
