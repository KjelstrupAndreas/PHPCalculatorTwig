<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 09-11-2017
 * Time: 09:11
 */

$number1 = $_REQUEST["number1"];
$number2 = $_REQUEST["number2"];
$operation = $_REQUEST["operation"];

switch ($operation) {
    case "+":
        $result = $number1 + $number2;
        break;

    case "-":
        $result = $number1 - $number2;
        break;

    case "*":
        $result = $number1 * $number2;
        break;

    case "/":
        $result = $number1 / $number2;
        break;

    default:
        $result = "Illegal operation: " . $operation;

}
$longResult = $number1 . $operation . $number2 . "=" . $result;

require_once '../vendor/autoload.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../views');
$twig = new Twig_Environment($loader, array(
    //'cache' => '/path/to/compilation_cache',
    'auto_reload' => true
));
$template = $twig->loadTemplate('showit.html.twig');
$parametersToTwig = array('result' => $result);
echo $template->render($parametersToTwig);
