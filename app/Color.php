<?php

namespace App;

use ErrorException;

class Color
{
    protected const INTENSITY_MIN = 0;
    protected const INTENSITY_MAX = 255;
    protected const NUMBER_OF_AXLES = 3;

    protected function validationIntensity(int $intensity)
    {
        if (!$this->isIntensityRange($intensity)) {
            throw new ErrorException("Цвет не валиден, введите заначение от 0 до 255");
        }
    }

    protected function isIntensityRange(int $intensity): bool
    {
        return ($intensity >= self::INTENSITY_MIN && $intensity <= self::INTENSITY_MAX) ? true : false;
    }

    protected function getNewColorValues(array $intensityA, array $intensityB ):array {
        $colors = [];

        for($i = 0; $i < self::NUMBER_OF_AXLES; $i ++) {
            $newIntensity = round(($intensityA[$i] + $intensityB[$i]) / 2);
            array_push($colors, $newIntensity);
        }

        return $colors;
    }


}