<?php

add_filter( 'gform_submit_button', '_themename_form_submit_button', 10, 2 );

function _themename_form_submit_button( $button, $form ) {
	$button_text = $form['button']['text'];
    $classes = "theme-button gform_button";
    return "<button type='submit' class='$classes' id='gform_submit_button_{$form['id']}'><span>{$button_text}</span></button>";
}