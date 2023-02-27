<?php

class Sanitizor
{
    public static function sanitizor(array $data, array $fields, array $sanFilters): array
    {
        $options = array_map(fn($field) => $sanFilters[$field], $fields);
        $sanitized = filter_var_array($data, $options);
        $trimmed = array_map('trim', $sanitized);

        return $trimmed;

    }
}