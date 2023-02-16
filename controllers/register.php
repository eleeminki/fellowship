<?php


$inputs = [];
$errors = [];

if (is_post()) {
    $fields = [
        'fName2' => 'string | required | min: 3 | max: 10',
        'lName2' => 'string | required | min: 2 | max: 10',
        'uName2' => 'string | required | alphanumeric | between: 3, 25 | unique: users, username',
        'email2' => 'email | required | email | unique: users, email',
        'pw2' => 'string | required | secure',
        'confirm2' => 'string | required | same: pw2',
    ];

    $messages = [
        'confirm2' => [
            'same' => 'The password does not match'
        ]
    ];

    [$inputs, $errors] = filter($_POST, $fields, $messages);

    if ($errors) {
        redirect_with('loginRegister.php', [
        'input' => $inputs,
        'errors' => $errors
        ]);
    }

    if (register_user($inputs['fName2'], $inputs['lName2'], $inputs['uName2'], $inputs['email2'], $inputs['pw2'])) {
        echo 'SUCCESSFUL REGISTERED';
        redirect_to(pathinfo($_SERVER['REQUEST_URI'], PATHINFO_BASENAME));
    }
}
