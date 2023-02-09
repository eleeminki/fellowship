<?php
const FILTERS = [
    'email' => FILTER_SANITIZE_EMAIL,

];

function sanitize(array $data, array $fieldTypes): array
{
    if(isset($data)) {
        $sanitized = array_map(fn($fieldType) => FILTERS[$fieldType], $fieldTypes);
        return $sanitized;
    }
   
}