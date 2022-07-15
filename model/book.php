<?php

    class Book extends Product 
    {
        private $weight;

        public function __construct($_type, $_sku, $_name, $_price, $_attribute)
        {
            parent::__construct($_sku, $_name, $_price, $_type);
            $this->setAttribute($_attribute);
        }
        
        //Saving to the Book entity table based on its unique attribute
        public function save()
        {
            parent::save();
            DB::insert('book', array
            (
                'sku' => $this->getSku(),
                'weight' => $this->getWeight()
            ));
        }

        //getter
        public function getAttribute()
        {
            return "Weight: " . $this->weight . " KG";
        }

        public function getWeight()
        {
            return $this->weight;
        }

        //setter
        public function setAttribute($_weight)
        {
            $this->setWeight($_weight[0]);
        }

        public function setWeight($_weight)
        {
            $this->weight = $_weight;
        }
        

    }
?>