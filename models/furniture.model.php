<?php
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
        
        public function save()
        {
            parent::save();
            $sqlProductType = "INSERT INTO furniture (furniture_sku, height, width, length) VALUES ('". $this->getSku() ."', '"
            . $this->getHeight() ."', '". $this->getWidth() ."', '". $this->getLength() ."')";
            DB::insert($sqlProductType);
        }

        //getter
        public function getAttribute()
        {
            return "Dimension: " . $this->getHeight(). " CMx ". $this->getWidth() . " CMx " . $this->getLength() . " CM";
        }

        public function setAttribute($content)
        {
            $this->setHeight($content[0]);
            $this->setWidth($content[1]);
            $this->setLength($content[2]);
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