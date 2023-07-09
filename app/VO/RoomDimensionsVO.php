<?php

namespace App\VO;

class RoomDimensionsVO
{
    private float $length;
    private float $width;
    private float $height;

    public function __construct(float $length, float $width, float $height)
    {
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
    }

    public function getLengthWalls(): float
    {
        return ($this->length+$this->width) * 2;
    }

    public function getFloorArea(): float
    {
        return $this->length * $this->width;
    }

    public function getWallsArea(): float
    {
        return $this->getLengthWalls() * $this->height;
    }

}
