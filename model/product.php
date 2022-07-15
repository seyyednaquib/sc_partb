<?php

    // namespace Model;
    abstract class Product 
    {
        protected $sku;
        protected $name;
        protected $price;
        protected $type;
        
        public function __construct($_sku = "", $_name = "", $_price = 0, $type = "")
        {
            $this->sku = $_sku;   
            $this->name = $_name;   
            $this->price = $_price;
            $this->type = $type;
        }
        

        public function save()
        {
            DB::insert('product', array
            (
                'sku' => $this->getSku(),
                'product_name' => $this->getName(),
                'product_price' => $this->getPrice(),
                'product_type' => $this->getType()
            ));
        }
        
        //getter
        public function getSku() 
        {
            return $this->sku;
        }

        public function getName() 
        {
            return $this->name;
        }

        public function getPrice() 
        {
            return $this->price;
        }

        public function getType() 
        {
            return $this->type;
        }
        
        //abstract function
        abstract public function setAttribute($attribute);
        abstract public function getAttribute();
    }
?>