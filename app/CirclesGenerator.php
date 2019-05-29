<?php

namespace app;

use InvalidArgumentException;

class CirclesGenerator
{
    const COLORS = [
        ['r' => 0,   'g' => 0,   'b' => 255], // blue
        ['r' => 255, 'g' => 0,   'b' => 0  ], // red
        ['r' => 0,   'g' => 255, 'b' => 0  ], // green
        ['r' => 0,   'g' => 0,   'b' => 0  ], // black
        ['r' => 255, 'g' => 255, 'b' => 0  ], // yellow

    ];

    private $amountColorIndexes;

    public function __construct()
    {
        $this->amountColorIndexes = count(self::COLORS);
    }

    /**
     * Draws image which contains colored circles.
     *
     * @param $imageWidth - image width
     * @param $imageHeight - image height
     * @param $circleRadius - circle radius
     * @param $amountCircles - amount of circles
     * @return false|resource - image which contains colored circles on success or false on errors.
     */
    public function getCirclesImage($imageWidth, $imageHeight, $circleRadius, $amountCircles)
    {
        $circleDiameter = $circleRadius * 2;

        if ($circleDiameter > $imageWidth || $circleDiameter > $imageHeight) {
            throw new InvalidArgumentException('Circle diameter must be less than width and height of image');
        }

        $image = imagecreate($imageWidth, $imageHeight);
        /* Adds white background color */
        imagecolorallocate($image,255, 255, 255);

        for ($i = 0; $i < $amountCircles; $i++) {
            $circleColor = $this->getRandomColor();
            $circleCenter = $this->getRandomCircleCenter($imageWidth, $imageHeight, $circleRadius);
            $circleColor = imagecolorallocate($image, $circleColor['r'], $circleColor['g'], $circleColor['b']);
            imagefilledellipse($image, $circleCenter['x'], $circleCenter['y'], $circleDiameter, $circleDiameter, $circleColor);
        }

        return $image;
    }

    private function getRandomColor()
    {
        return self::COLORS[rand(0, $this->amountColorIndexes - 1)];
    }

    private function getRandomCircleCenter($imageWidth, $imageHeight, $circleRadius)
    {
        return ['x' => rand($circleRadius, $imageWidth - $circleRadius),
                'y' => rand($circleRadius, $imageHeight - $circleRadius)];
    }
}
