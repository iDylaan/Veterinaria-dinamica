<?php

// $password = "eltodopoderoso1234"; // Admin
$password = "hectorvet12345";  // Veterinario

$passwordHash = password_hash($password, PASSWORD_BCRYPT);

echo $passwordHash;