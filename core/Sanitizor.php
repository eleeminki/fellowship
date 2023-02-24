<?php
$filters = require_once('/sanitization.php');
class Sanitizor
{
    public function sanitize(array $data, array $fields, array $filters = $filters): array
    {
        $options = array_map(fn($field) => $filters[$field], $fields);
        $sanitized = filter_var_array($data, $options);
        $trimmed = array_map('trim', $sanitized);
        return $trimmed;
    }
}