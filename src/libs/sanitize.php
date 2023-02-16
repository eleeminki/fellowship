<?php 

const FILTERS = [
    "string" => FILTER_UNSAFE_RAW,
    "email" => FILTER_SANITIZE_EMAIL,
];

/************************** SANITIZE  ******************/

function sanitize(array $data, array $fields, array $filters = FILTERS): array
{
    if ($fields) {
        $options = array_map(fn ($field) => $filters[$field], $fields);
        $sanitized = filter_var_array($data, $options);
        $trimmed = array_map('trim', $sanitized);
        return $trimmed;
    }
}