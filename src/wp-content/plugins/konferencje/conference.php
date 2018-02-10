<?php

/*
* Plugin Name: CMS Konferencje
* Description: Plugin dedicated to provide informations about conferences and keep contact with participants
* Version: 1.0
* Author: Rafał Podkoński, Rafał Klicki, Tomasz Orzeł, Jakub Micek
*/

require_once 'libs/ConferenceCPT.php';
require_once 'libs/NewsCPT.php';
require_once 'libs/Request.php';

define('CMS_CONFERENCES_DIR_PATH', plugin_dir_path(__FILE__));


class CMSKonferencje_Plugin {

  private static $plugin_id = 'cms-konferencje';
  private $plugin_version = '1.0';

  private $conferenceCPT;
  private $newsCPT;

  function __construct() {
    $this->tmpl_dir = plugin_dir_path(__FILE__) . 'templates/';
    $this->conferenceCPT = new ConferenceCPT();
    $this->newsCPT = new NewsCPT();

    // Podczas Aktywacji
    register_activation_hook(__FILE__, array($this, 'onActivate'));
  }

  function onActivate() {
    $ver_opt = static::$plugin_id . '-version';
    $installed_version = get_option($ver_opt, NULL);

    if ($installed_version == NULL) {
      update_option($ver_opt, $this->plugin_version);
    }
  }

}

$cmsKonferencjePlugin = new CMSKonferencje_Plugin();
