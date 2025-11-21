<?php
session_start();


if (!isset($_SESSION['token'])) { 
    $_SESSION['token'] =  md5(uniqid(mt_rand(), true));
}
class ToolsController {

    public static function clean($value)
    {
        if (!is_string($value)) return $value;

        $value = strip_tags($value);
        $value = trim($value);
        $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        $value = htmlentities($value, ENT_QUOTES, 'UTF-8');

        return $value;
    }

    public static function validate($value, $type)
    {
        switch ($type) {

            case 'string':
                return is_string($value);

            case 'email':
                return filter_var($value, FILTER_VALIDATE_EMAIL);

            case 'int':
                return filter_var($value, FILTER_VALIDATE_INT) !== false;

            case 'alpha': // solo letras y espacios
                return preg_match('/^[a-zA-ZÁÉÍÓÚáéíóúÑñ\s]+$/u', $value);

            case 'alphanumeric': // letras + números + espacios
                return preg_match('/^[a-zA-Z0-9ÁÉÍÓÚáéíóúÑñ\s]+$/u', $value);

            case 'text': // texto con signos básicos
                return preg_match('/^[\p{L}0-9\s.,:;!?()"\-%\'áéíóúÁÉÍÓÚñÑ]+$/u', $value);

            default:
                return false;
        }
    }

}
