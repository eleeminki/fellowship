<?php

/************************** FILTER  ******************/

function filter(array $data, array $fields, array $messages = []): array
{
    $sanitize_rules = [];
    $validate_rules = [];

    foreach ($fields as $field => $rules) {
        if (strpos($rules, '|')) {
            [$sanitize_rules[$field], $validate_rules[$field]] = explode('|', $rules, 2);
        } else {
            $sanitize_rules[$field] = $rules;
        }
    }
           
    $inputs = sanitize($data, array_map('trim', $sanitize_rules));
    // dd($validate_rules);
    $errors = validate($inputs, $validate_rules, $messages);

    return [$inputs, $errors];
}
