<?php
require_once('core/Sanitizor.php');
require_once('core/Validator.php');

class Filter
{
    public function filter(array $data, array $fields, array $errorMsgs, array $sanFilters): array
    {

        $sanitize_rules = [];
        $validate_rules = [];

        foreach ($fields as $field => $fieldRule) {
            if (strpos($fieldRule, "|")) {
                [$sanitize_rules[$field], $validate_rules[$field]] = explode('|', $fieldRule, 2);
            }
        }

        $inputs = Sanitizor::sanitizor($data, array_map('trim', $sanitize_rules), $sanFilters);
        $errors = Validator::validator($data, $validate_rules, $errorMsgs);

        return [$inputs, $errors];
    }
}

?>