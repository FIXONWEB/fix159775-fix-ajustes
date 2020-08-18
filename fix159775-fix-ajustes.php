<?php
/**
 * Plugin Name:     Fixonweb - Ref.: 159775 - fix-ajustes
 * Plugin URI:      https://github.com/FIXONWEB/fix159775-fix-ajustes
 * Description:     fix-ajustes
 * Author:          FIXONWEB
 * Author URI:      https://fixonweb.com.br
 * Text Domain:     fix159775-fix-ajustes
 * Domain Path:     /languages
 * Version:         0.1.6
 *
 * @package         Fix159775_Fix_Ajustes
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

require 'plugin-update-checker.php';
$url_159775 	= 'https://github.com/fixonweb/fix159775-fix-ajustes';
$slug_159775 	= 'fix159775-fix-ajustes/fix159775-fix-ajustes';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker($url_159775,__FILE__,$slug_159775);

function fix159775_load_modules($directory, $recursive = true, $listDirs = false, $listFiles = true, $exclude = '') {
    $arrayItems = array();
    $skipByExclude = false;
    $handle = opendir($directory);
    if ($handle) {
        while (false !== ($file = readdir($handle))) {
        preg_match("/(^(([\.]){1,2})$|(\.(svn|git|md))|(Thumbs\.db|\.DS_STORE))$/iu", $file, $skip);
        if($exclude){
            preg_match($exclude, $file, $skipByExclude);
        }
        if (!$skip && !$skipByExclude) {
            if (is_dir($directory. DIRECTORY_SEPARATOR . $file)) {
                if($recursive) {
                    $arrayItems = array_merge($arrayItems, fix159775_load_modules($directory. DIRECTORY_SEPARATOR . $file, $recursive, $listDirs, $listFiles, $exclude));
                }
                if($listDirs){
                    $file = $directory . DIRECTORY_SEPARATOR . $file;
                    $arrayItems[] = $file;
                }
            } else {
                if($listFiles){
                    $file = $directory . DIRECTORY_SEPARATOR . $file;
                    $arrayItems[] = $file;
                }
            }
        }
    }
    closedir($handle);
    }
    return $arrayItems;
}


$path_modules = plugin_dir_path( __FILE__ )."add-in";
$dire = fix159775_load_modules($path_modules);
sort($dire);
foreach ($dire as $key => $value) {
	$extensao = substr($value, -4) ;
	if($extensao=='.php') require_once($value);;
}


function fix159775__file__(){
	return __FILE__;
}
function fix159775_plugin_file(){
	return plugin_dir_path( __FILE__ );
}

add_action('wp_enqueue_scripts', "fix159775_enqueue_scripts");
function fix159775_enqueue_scripts(){
    wp_enqueue_script( 'start-jquery', plugin_dir_url( __FILE__ ) . '/js/start-jquery.js', array( 'jquery' )  );
}
