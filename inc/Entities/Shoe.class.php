<?php

class Shoe  {

    private int $id;
    private string $brand;
    private float $size;
    private bool $smells;
    private string $color;
    private string $type;

    //Getters
    public function getId() : int { return $this->id; }
    public function getBrand() : string { return $this->brand; }
    public function getSize() : float { return $this->size; }
    public function getSmells() : bool { return $this->smells; }
    public function getColor() : string { return $this->color; }
    public function getType() : bool { return $this->type; }

    //Setters
    public function setBrand(string $nBrand) { $this->brand = $nBrand; }
    public function setSize(float $nSize) { $this->size = $nSize; }
    public function setSmells(bool $nSmells) { $this->smells = $nSmells; }
    public function setColor(string $nColor) { $this->color = $nColor; }
    public function setType(string $nType) { $this->type = $nType; }

    //This function will output the line for the CSV file
    public function getCSVEntry()   {

        // brand,size,smells,color,type
        return "\n" . $this->brand . ","
            . $this->size . ","
            . $this->smells . ","
            . $this->color . ","
            . $this->type;
    }

}