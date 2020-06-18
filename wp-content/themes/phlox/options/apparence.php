<?php

add_action('customize_register', function(WP_Customize_Manager $manager){
    $manager-> add_section('Yann_Food_apparence', [
        'title' => 'Personnalisation de l\'apparence '
    ]);
    $manager-> add_setting('header_background', [
        'default' => '#fff'
    ]);
    $manager-> add_control('header_background', [
        'section' => 'Yann_Food_apparence',
        'setting' => 'header_background',
        'label' => 'Couleur du site'
    ]);
});