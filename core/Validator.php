<?php
$config = require_once(__DIR__ . '/../config/config.php');
$errorMsgs = require_once('/validation.php');
class Validator
{
    public static function validator(array $data, array $fields, array $errorMsgs = $errrorMsgs): array
    {
        $errors = [];

        $trimRules = fn($seperator, $validRule) => array_map('trim', explode($seperator, $validRule));

        foreach ($fields as $field => $fieldRule) {
            $trimmedRules = $trimRules('|', $fieldRule);
            foreach ($trimmedRules as $rule) {
                $params = [];
                if (strpos($rule, ':')) {
                    [$ruleName, $ruleParams] = $trimRules(':', $rule);
                    $params = $trimRules(',', $ruleParams);
                } else {
                    $ruleName = trim($rule);
                }

                $helperFn = 'is_' . $ruleName;

                if (is_callable($helperFn)) {
                    $pass = $helperFn($data, $field, ...$params);
                } else {
                    $errors[$field] = sprintf($errorMsgs[$ruleName], $field, ...$params);
                }
            }
        }
        return $errors;
    }

    public function is_required(array $data, string $field): bool
    {
        return isset($data[$field]) && trim($data[$field]) !== '';
    }

    public function is_email(array $data, string $field): bool
    {
        return isset($data[$field]) && filter_var(trim($data[$field]), FILTER_VALIDATE_EMAIL);
    }

    public function is_min(array $data, string $field, int $min): bool
    {
        return isset($data[$field]) && strlen(trim($data[$field])) >= $min;
    }

    public function is_max(array $data, string $field, int $max): bool
    {
        return isset($data[$field]) && strlen(trim($data[$field])) <= $max;
    }
    public function is_between(array $data, string $field, array $range): bool
    {
        return isset($data[$field]) && strlen(trim($data[$field])) >= $range[0] && strlen(trim($data[$field])) <= $range[1];
    }
    public function is_same(array $data, string $field, string $other): bool
    {
        return isset($data[$field]) && (trim($data[$field])) === trim($other);
    }
    public function is_alphanumeric(array $data, string $field): bool
    {
        return isset($data[$field]) && ctype_alnum(trim($data[$field]));
    }
    public function is_secure(array $data, string $field): bool
    {
        $pattern = "#.*^(?=.{8,64})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#";
        return isset($data[$field]) && preg_match($pattern, (trim($data[$field])));
    }
    public function is_unique(array $data, string $field, array $config, string $table, string $column): bool
    {
        $db = new Database($config['database'], DB_USER, DB_PASSWORD);
        return isset($data[$field]) && $db->query(
            'SELECT' . $column . 'FROM' . $table . 'WHERE' . $column . ' = :value',
            [
                'value' => $data[$field]
            ]
        )->findCol() == false;
    }

}