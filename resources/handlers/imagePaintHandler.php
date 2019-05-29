<?php

use app\{
    CirclesGenerator,
    ImageWriter
};

if ($imageWidth === -1 || $imageHeight === -1 || $circleRadius === -1 || $amountCircles === -1
    || !$validator->validateRadius($imageWidth, $imageHeight, $circleRadius)) {
    http_response_code(500);
    exit();
}

$circlesGenerator = new CirclesGenerator();
$imageWriter = new ImageWriter(dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'public'. DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR);

$image = $circlesGenerator->getCirclesImage($imageWidth, $imageHeight, $circleRadius, $amountCircles);
$imageWriter->writeImage($image);

header('Content-Type: image/png');
imagepng($image);
