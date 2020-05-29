<?php

/**
* Plugin Name:  Custom Plugin
* Plugin URI:   https://github.com/santimonsalvec/custom-plugin-wp/
* Description:  Esta es una plantilla para crear un plugin personalizado.
* Version:      1.0.0
* Author:       Santiago Monsalve
* Author URI:   https://github.com/santimonsalvec/
*/

defined( 'ABSPATH' ) or die( '¡silence is gold!' );

/* agregar un ícono al menu de opciones en el administrador */ 
function custom_plugin_menu(){

    $page_title = 'Custom Plugin';      // requerido
    $menu_title = 'Custom Plugin';      // requerido 
    $capability = 'manage_options';     // requerido: administrator | editor | author | contributor | subscriber
    $menu_slug = 'custom-plugin';   // requerido: es un identificador único
    $function = 'load_option_page';     // requerido: cargar el archivo de configuraciones que se muestra al dar click en el ícono
    $icon = 'dashicons-star-filled';    // opcional
    $position = 81;                    // opcional
    add_menu_page( 
        $page_title
        , $menu_title
        , $capability
        , $menu_slug
        , $function
        , $icon
        , $position
    );
}
add_action('admin_menu', 'custom_plugin_menu');

/* inlcuir el archivo de opciones del plugin */
function load_option_page(){

    include_once (plugin_dir_path( __FILE__ ) . 'options.php');
}

function active_plugin_hook(){
    /* aqui puedes ejecutar todas las acciones necesarias luego de activar el plugin */
}
register_activation_hook( __FILE__, 'active_plugin_hook');

function desactive_plugin_hook(){
    /* aqui puedes ejecutar todas las acciones necesarias luego de desactivar el plugin */
}
register_deactivation_hook( __FILE__, 'desactive_plugin_hook');
