<?php 
/*
echo 'insira seu nome: ';
$input = trim(fgets(STDIN, 1024));
echo "\n", 'me chamo ', $input, "\n\n";
*/


manageText($validationError = 0);

function manageText($validationError){
    readLogin($validationError);
    readPassword($validationError);
}

function readLogin($validationError){
    $text = "";

    if($validationError == 1) 
        $text = readline("Digite sua senha novamente: "); 
    else 
        $text = readline("Digite sua senha: ");

    validateLogin($text);
}

function readPassword($validationError){
    $text = "";

    if($validationError == 1) 
        $text = readline("Digite sua senha novamente: "); 
    else 
        $text = readline("Digite sua senha: ");

    validatePassword($text);
}

function validateLogin($login){
    
    $validated = preg_match("/^[a-zA-Z0-9]+$", $login);

    switch($validated){
        case 1:
            echo "\n Senha valida! \n Hash da senha: " . md5($login) . "\n";
            break;
        default: 
            echo "\n Login Invalido!  
            - O login deve ter apenas letras sem acento e números. \n\n";
            
            manageText($validationError = 1);
    }
}

function validatePassword($password){
    
    $validated = preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W)[a-zA-Z\d\W]{8,}$/", $password);

    switch($validated){
        case 1:
            echo "\n Senha valida! \n Hash da senha: " . md5($password) . "\n";
            break;
        default: 
            echo "\n Senha Invalida!  
            - A senha deve ter no mínimo 8 caracteres. 
            - Pelo menos 1 número. 
            - Deve conter pelo menos 1 caracter maiúsculo e minúsculo. 
            - Deve conter pelo menos 1 caracter especial. \n\n";
            
            manageText($validationError = 1);
    }
}

?>