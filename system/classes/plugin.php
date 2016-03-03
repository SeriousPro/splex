<?php

/**
 * User: Marcel 'CoNfu5eD Naeve <confu5ed@serious-pro.de>
 * Date: 03.03.2016
 * Time: 13:55
 */

/**
 * Class Plugin
 */
class Plugin
{

    /**
     * Function for getting the head of a plugin.
     * @param $plugin string - plugin name
     * @param $params string - plugin parameters (syntax defined by plugin)
     */
    static function head($plugin, $params="") {
        $requested_file =__PLUGINS_DIR__ . "/$plugin/head.php";
        if(file_exists($requested_file))
            include ($requested_file);
    }

    /**
     * Function for getting the body of a plugin.
     * @param $plugin string - plugin name
     * @param $params string - plugin parameters (syntax defined by plugin)
     */
    static function body($plugin, $params="") {
        $requested_file =__PLUGINS_DIR__ . "/$plugin/body.php";
        if(file_exists($requested_file))
            include ($requested_file);
    }

    /**
     * Function for getting standalone content of a plugin.
     * @param $plugin string - plugin name
     * @param $box string - box name (boxes/?.php)
     * @param $params array - parameters for the box
     */
    static function box($plugin, $box, $params=[]) {
        $requested_file = __PLUGINS_DIR__ . "/$plugin/boxes/$box.php";
        if(file_exists($requested_file))
            include ($requested_file);
    }

    /**
     * Function for getting the name of the plugin which has to be loaded.
     * @return string - site name (plugin name) which has to be loaded
     */
    static function select() {
        if(isset($_GET['site'])) {
            return $_GET['site'];
        }
        if(isset($_SESSION['default_site'])) {
            return $_SESSION['default_site'];
        }
        if(defined("DEFAULT_SITE")) {
            return DEFAULT_SITE;
        }
        return "error";
    }

}