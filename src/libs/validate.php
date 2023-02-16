<?php



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

     $custom_messages = array_filter($messages, fn ($message) => is_string($message));
     $validation_errors = array_merge(DEFAULT_VALIDATION_ERRORS, $custom_messages);

     $rules_split = fn ($separator, $str) => array_map('trim', explode($separator, $str));

     foreach ($fields as $fieldName => $fieldRule) {
         $rules = $rules_split("|", $fieldRule);
         foreach ($rules as $rule) {
             $params = [];
             if (strpos($rule, ':')) {
                 [$rule_name, $rule_params] = $rules_split(':', $rule);
                 $params = $rules_split(',', $rule_params);
               
             } else {
                 $rule_name = trim($rule);
             }

             $fn = 'is_'.$rule_name;
        
             if (is_callable($fn)) {
                 $pass = $fn($data, $fieldName, ...$params);
                 if (!$pass) {
                     $errors[$fieldName] = sprintf($messages[$fieldName][$rule_name] ?? $validation_errors[$rule_name], $fieldName, ...$params);
                 }
             }
         }
     }

     return $errors;
 }

 /************************** VALIDATE HELPER FUNCTIONS  ******************/

 function is_required(array $data, string $fieldName): bool
 {
     return isset($data[$fieldName]) && trim($data[$fieldName]) !== '';
 }

 function is_email(array $data, string $fieldName): bool
 {
     return filter_var($data[$fieldName], FILTER_VALIDATE_EMAIL);
 }

 function is_alphanumeric(array $data, string $fieldName): bool
 {
     if (ctype_alnum($data[$fieldName])) {
         return true;
     }
 }

 function is_between(array $data, string $fieldName, int $min, int $max): bool
 {
     $length =  mb_strlen($data[$fieldName]);
     return $length >= $min && $length <= $max;
 }

 function is_min(array $data, string $fieldName, int $min): bool
 {
     $length =  mb_strlen($data[$fieldName]);
     return $length >= $min;
 }

 function is_max(array $data, string $fieldName, int $max): bool
 {
     $length =  mb_strlen($data[$fieldName]);
     return $length >= $max;
 }


 function is_secure(array $data, string $fieldName): bool
 {
     $pattern = "#.*^(?=.{8,64})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#";
     return preg_match($pattern, $data[$fieldName]);
 }

 function is_same(array $data, string $fieldName, string $other): bool
 {
     if (isset($data[$fieldName], $data[$other])) {
         return $data[$fieldName] === $data[$other];
     }
 }


 function is_unique(array $data, string $fieldName, string $table, string $column): bool
 {
     $sql = "SELECT $column FROM $table WHERE $column = :value";

     $stmt = db()->prepare($sql);
     $stmt->bindValue(":value", $data[$fieldName]);
     $stmt->execute();
     return $stmt->fetchColumn() === false;
 }
