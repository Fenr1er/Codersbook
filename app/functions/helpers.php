<?php
/**
 * Comment
 * ! Alerts
 * ? Querys
 * TODO TPDOS
 * @param test
 */


function dd( $value ) {
    echo '<pre>';
    print_r( $value );
    echo '</pre>';
    die();
}

function base_path( $path ) {
    return BASE_PATH . $path; /* da es eine globale variable ist, wird sie Groß geschrieben, hier definiert muss aber erst angelegt werden */
}

function config($name){
    return require BASE_PATH."app/config/".$name."_config.php";
}