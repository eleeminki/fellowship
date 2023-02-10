<?php
const FILTERS = [
    'email' => FILTER_SANITIZE_EMAIL,

];

/************************** SANITIZE  ******************/

function sanitize(array $data, array $fields, array $filters = FILTERS): array
{
    if($fields) {
        $options = array_map(fn($fieldType) => $filters[$fieldType], $fields);
        $sanitized = filter_var_array($data, $options);
        $trimmed = array_map('trim', $sanitized);
        return $trimmed;
       
    }
   
}

/************************* DEFAULT VALIDATION ERRORS *****************/

const DEFAULT_VALIDATION_ERRORS = [
    'required' => 'Please enter the %s',
    'email' => 'The %s is not a valid email address',
    'min' => 'The %s must have at least %s characters',
    'max' => 'The %s must have at most %s characters',
    'between' => 'The %s must be between %d and %d characters',
    'same' => 'The %s must match with %s',
    'alphanumeric' => 'The %s should only have letters and numbers',
    'secure' => 'The %s must have between 8 and 64 characters and contain at least one number, one uppercase, and one special character',
    'unique' => 'The %s already exists',
];

/************************** VALIDATE  ******************/

function validate(array $data, array $fields, array $messages = []): array 
{
    $errors = [];

    $custom_messages = array_filter($messages, fn($message) => is_string($message));
    $validation_errors = array_merge(DEFAULT_VALIDATION_ERRORS, $custom_messages);

    $rules_split = fn($separator, $str) => array_map('trim', explode($separator, $str));

    foreach($fields as $fieldName => $fieldRule) {
        $rules = $rules_split("|", $fieldRule);
        foreach($rules as $rule) {
            $params = [];
            if(strpos($rule, ':')){
                [$rule_name, $rule_params] = $rules_split(':', $rule);
                $params = $rules_split(',', $rule_params);
            }
            else {
                $rule_name = trim($rule);
            }
            
            $fn = 'is_' .$rule_name;
            if(is_callable($fn)) {
                $pass = $fn($data, $fieldName, ...$params);
                if(!$pass) {
                    $errors[$fieldName] = sprintf($messages[$fieldName][$rule_name] ?? $validation_errors[$rule_name], $fieldName, ...$params);
                }
            }
        }
    }
   
    return $errors;

}

/************************** FILTER  ******************/

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