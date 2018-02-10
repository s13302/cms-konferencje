<?php

class Request {

  private static $instance;

  public static function getInstance() {
    if ( ! isset(static::$instance)) {
      static::$instance = new self();
    }
    return static::$instance;
  }

  private $query_params;

  private function __construct() {}

  function getQueryParams() {
    if (! isset($this->query_params)) {
      $parts = explode('&', $_SERVER['QUERY_STRING']);
      $this->query_params = array();

      foreach ($parts as $part) {
        $tmp = explode('=', $part);
        $this->query_params[$tmp[0]] = trim(urldecode($tmp[1]));
      }
    }
    return $this->query_params;
  }

  function getQuerySingleParam($name, $default = NULL) {
    $qparams = $this->getQueryParams();
    if (isset($qparams[$name])) {
      return $qparams[$name];
    }
    return $default;
  }

  function isMethod($method) {
    return (strtoupper($_SERVER['REQUEST_METHOD']) == strtoupper($method));
  }

}
