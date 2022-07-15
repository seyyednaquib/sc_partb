<?php
    class Dvd extends Product
    {
        private $size;

        public function __construct($_type, $_sku, $_name, $_price, $_attribute)
        {
            parent::__construct($_sku, $_name, $_price, $_type);
            $this->setAttribute($_attribute);
        }
        
        public function save()
        {
            parent::save();
            $sqlProductType = "INSERT INTO dvd (dvd_sku, size) VALUES ('". $this->getSku() ."', '". $this->getSize() ."')";
            DB::insert($sqlProductType);
        }
            
        public function getAttribute()
        {
            return "Size: " . $this->size . " MB";
        }
        
        public function setAttribute($size)
        {
            $this->size = $size[0];
        }
        
        public function getSize()
        {
            return $this->size;
        }
        
    }
?>