<?php

class Sanitizor
{
    public static function sanitizor(array $data, array $fields, array $sanFilters): array
    {
            foreach($fields as $field => $rule) {
                $options = [];
                if(isset($sanFilters[$rule])) {
                    $options[$field] = $sanFilters[$rule];
                }
            }
            $sanitized = filter_var_array($data, $options);
            $trimmed = array_map('trim', $sanitized);
            return $trimmed;
        
    }
}