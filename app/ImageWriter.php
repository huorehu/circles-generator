<?php

namespace app;

class ImageWriter
{
    private $path;

    public function __construct($path)
    {
        $this->path = $path;
        $this->initDir($path);
    }

    public function writeImage($image)
    {
        $imageName = uniqid();
        imagepng($image, $this->path . "${imageName}.png");
    }

    private function initDir($path)
    {
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
    }
}
