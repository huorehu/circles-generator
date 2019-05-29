<?php

namespace app;

class Validator
{
    public function validate($input)
    {
        return preg_match('/^[1-9]\d{0,5}$/', $input) ? $input : -1;
    }

    public function validateRadius($imageWidth, $imageHeight, $circleRadius)
    {
        return $imageWidth / 2 >= $circleRadius && $imageHeight / 2 >= $circleRadius;
    }
}
