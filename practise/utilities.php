<?php
function check_empty_fields($required_fields_array){
    $formErrors = array();
    foreach($required_fields_array as $rfield){
        if(!isset($_POST[$rfield]) || ($_POST[$rfield] == NULL)){
            $formErrors[] = $rfield . " is required.";
        }
    }
    return $formErrors;
}

function check_min_length($checking_fields){
    
}