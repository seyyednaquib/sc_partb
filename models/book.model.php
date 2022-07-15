<?php
    class Book extends Product 
    {
        private $weight;

        public function __construct($_type, $_sku, $_name, $_price, $_attribute)
        {
            parent::__construct($_sku, $_name, $_price, $_type);
            $this->setAttribute($_attribute);
        }
        
        public function save()
        {
            parent::save();
            $sqlProductType = "INSERT INTO book (book_sku, weight) VALUES ('". $this->getSku() ."', '". $this->getWeight() ."')";
            DB::insert($sqlProductType);
        }

        //getter
        public function getAttribute()
        {
            return "Weight: " . $this->weight . " KG";
        }

        public function setAttribute($weight)
        {
            $this->weight = $weight[0];
        }
        
        public function getWeight()
        {
            return $this->weight;
        }
        

    }
?>