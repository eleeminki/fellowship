<?php  

function register_user(string $firstName, string $lastName, string $username, string $email, string $password): bool 
{
    $sql = 'INSERT INTO users(firstName, lastName, username, email, password)VALUES(:firstName, :lastName, :username, :email, :password)';
    
    // $stmt = db()->prepare($sql);
    // $stmt->bindValue(':firstName', $firstName, PDO::PARAM_STR);
    // $stmt->bindValue(':lastName', $lastName, PDO::PARAM_STR);
    // $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    // $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    // $stmt->bindValue(':password', $password, password_hash($password, PASSWORD_BCRYPT));
    // return $stmt->execute();
}