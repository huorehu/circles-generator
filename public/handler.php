<?php

spl_autoload_register(function($className) {
    require dirname(__DIR__) . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
});
define('RESOURCES_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR);

use app\Validator;

$validator = new Validator();

switch ($_GET['form']) {
    case 'image-generator':
        $imageWidth = $validator->validate($_GET['width']);
        $imageHeight = $validator->validate($_GET['height']);
        $circleRadius = $validator->validate($_GET['radius']);
        $amountCircles = $validator->validate($_GET['amount']);
        require RESOURCES_PATH . 'handlers' . DIRECTORY_SEPARATOR . 'imagePaintHandler.php';
        break;
    case 'slider':
        require 'slider.php';
        break;
    case 'images':
        $imgArr = array_values(array_diff(array_reverse(scandir('img')), ['.', '..']));
        echo json_encode($imgArr, JSON_PRETTY_PRINT);
        header('Content-type: application/json');
        break;
    case 'main':
        require 'index.php';
    default:
        http_response_code(404);
}
