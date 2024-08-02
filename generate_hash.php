<?php
$senhas = ['123', '123', '123'];
foreach ($senhas as $senha) {
    $hash = password_hash($senha, PASSWORD_BCRYPT);
    echo "Senha: $senha - Hash: $hash<br>";
}
?>
