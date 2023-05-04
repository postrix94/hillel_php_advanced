<?php

namespace App;


class RGB extends Color
{
    private int $red;
    private int $green;
    private int $blue;

    public function __construct(int $red = 255, int $green = 255,int $blue = 255)
    {
        $this->setRed($red);
        $this->setGreen($green);
        $this->setBlue($blue);
    }

    public function equals(RGB $color):bool {
        $diff = array_diff($color->getValuesRGB(), $this->getValuesRGB());
        return count($diff) === 0 ? true : false;
    }

    public static function random(): RGB
    {
        $colors = [];

        for ($i = 0; $i < self::NUMBER_OF_AXLES; $i++) {
            $color = rand(self::INTENSITY_MIN ,self::INTENSITY_MAX);
            array_push($colors, $color);
        }

        return new self(...$colors);
     }

     public function mix(RGB $color): RGB {
        $colorA = $color->getValuesRGB();
        $colorB = $this->getValuesRGB();
        $newColorValues = $this->getNewColorValues($colorA,$colorB);
        $newColor = new self(...$newColorValues);

        return $newColor;
     }

     private function getValuesRGB(): array {
        return [$this->getRed(),$this->getGreen(), $this->getBlue()];
     }

    /**
     * @return int
     */
    public function getRed(): int
    {
        return $this->red;
    }

    /**
     * @param int $red
     */
    public function setRed(int $red): void
    {
        $this->validationIntensity($red);
        $this->red = $red;
    }

    /**
     * @return int
     */
    public function getBlue(): int
    {
        return $this->blue;
    }

    /**
     * @param int $blue
     */
    public function setBlue(int $blue): void
    {
        $this->validationIntensity($blue);
        $this->blue = $blue;
    }

    /**
     * @return int
     */
    public function getGreen(): int
    {
        return $this->green;
    }

    /**
     * @param int $green
     */
    public function setGreen(int $green): void
    {
        $this->validationIntensity($green);
        $this->green = $green;
    }
}