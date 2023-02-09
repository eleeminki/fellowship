<?php

/************************** SANITIZE AND VALIDATE ******************/

function filter(array $data, array $fields, array $message = []): array
{
    $sanitize_rules = [];
    $validate_rules = [];

    foreach($fields as $field => $rules) {
        if(strpos($rules, '|')) {
            [$sanitize_rules[$field], $validate_rules[$field]] = explode('|', $rules, 2);
        }
        else {
            $sanitize_rules[$field] = $rules; 
        }
    }

    $input = sanitize($data, $sanitize_rules);
    return $input;
    

}