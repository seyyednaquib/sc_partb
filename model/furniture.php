<?php

    // namespace Model;
    class Furniture extends Product 
    {
        private $height;
        private $width;
        private $length;

        public function __construct($_type, $_sku, $_name, $_price, $_attribute)
        {
            parent::__construct($_sku, $_name, $_price, $_type);
            $this->setAttribute($_attribute);
        }
        
        //Saving to the Furniture entity table based on its unique attribute
        public function save()
        {
            parent::save();
            DB::insert('furniture', array
            (
                'sku' => $this->getSku(),
                'height' => $this->getHeight(),
                'width' => $this->getWidth(),
                'length' => $this->getLength()
            ));
        }

        //getter
        public function getAttribute()
        {
            return "Dimension: " . $this->getHeight(). " CMx ". $this->getWidth() . " CMx " . $this->getLength() . " CM";
        }

        public function setAttribute($_content)
        {
            $this->setHeight($_content[0]);
            $this->setWidth($_content[1]);
            $this->setLength($_content[2]);
        }

        public function getHeight()
        {
            return $this->height;
        }

        public function getWidth()
        {
            return $this->width;
        }
        
        public function getLength()
        {
            return $this->length;
        }

        //setter
        public function setHeight($_height)
        {
            $this->height = $_height;
        }
        
        public function setWidth($_width)
        {
            $this->width = $_width;
        }

        public function setLength($_length)
        {
            $this->length = $_length;
        }
    }
?>