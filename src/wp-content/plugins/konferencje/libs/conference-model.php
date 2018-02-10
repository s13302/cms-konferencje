<?php

class CMSKonferencje_Model {

  private $conference_table_name = 'cms_konferencje';
  private $conference_participant_table_name = "cms_conference_participant";
  private $wpdb;

  function __construct() {
    global $wpdb;
    $this->wpdb = $wpdb;
  }

  function getConferenceTableName() {
    return $this->wpdb->prefix . $this->conference_table_name;
  }

  function getParticipantTableName() {
    return $this->wpdb->prefix . $this->conference_participant_table_name;
  }

  function createDbTable() {
    require_once ABSPATH . 'wp-admin/includes/upgrade.php';

    $sql = 'CREATE TABLE IF NOT EXISTS ' . $this->getConferenceTableName() .' ('
        . 'id INT NOT NULL AUTO_INCREMENT'
        . ', speaker INT REFERENCES ' . $this->wpdb->users . '(ID)'
        . ', places_limit INT NOT NULL DEFAULT -1'
        . ', price DOUBLE NOT NULL'
        . ', published BIT NOT NULL DEFAULT 1'
        . ', CHECK ((places_limit >= -1) AND (price >= 0))'
        . ', PRIMARY KEY (id)'
        . ')ENGINE=InnoDB DEFAULT CHARSET=utf8;';
    dbDelta($sql);

    $sql = 'CREATE TABLE IF NOT EXISTS ' . $this->getParticipantTableName() . ' ('
        . $this->getConferenceTableName() . '_id INT NOT NULL REFERENCES ' . $this->getConferenceTableName() . '(ID)'
        . ', ' . $this->wpdb->users . '_id INT NOT NULL REFERENCES ' . $this->wpdb->users . '(ID)'
        . ', PRIMARY KEY (' . $this->getConferenceTableName() . '_id, ' . $this->wpdb->users . '_id)'
        . ')Engine=InnoDB DEFAULT CHARSET=utf8;';
    dbDelta($sql);
  }

}
