<?php
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
        
        public function save()
        {
            $sql = "INSERT INTO product (product_sku, product_name, product_price, product_type) VALUES ('". $this->getSku() ."', '". $this->getName() ."', '". $this->getPrice() ."', '". $this->getType() ."')";
            DB::insert($sql);
        }
        
        abstract public function setAttribute($attribute);
        abstract public function getAttribute();
    }
?>