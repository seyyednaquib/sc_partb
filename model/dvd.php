<?php

    // namespace Model;
    class Dvd extends Product
    {
        private $size;

        public function __construct($_type, $_sku, $_name, $_price, $_attribute)
        {
            parent::__construct($_sku, $_name, $_price, $_type);
            $this->setAttribute($_attribute);
        }
        
        //Saving to the DVD entity table based on its unique attribute
        public function save()
        {
            parent::save();
            DB::insert('dvd', array
            (
                'sku' => $this->getSku(),
                'size' => $this->getSize()
            ));
        }
            
        //getter
        public function getAttribute()
        {
            return "Size: " . $this->size . " MB";
        }
        
        public function getSize()
        {
            return $this->size;
        }

        //setter
        public function setAttribute($_size)
        {
            $this->setSize($_size[0]);
        }
        
        
        public function setSize($_size)
        {
            $this->size = $_size;
        }
    }
?>