<?php
    class Controller 
    {        
        public function delete($sku)
        {
            $productRepository = new ProductRepository();
            $productRepository->delete($sku);
        }

        public function read() 
        {
            $productRepository = new ProductRepository();
            $resultList = $productRepository->read();
            echo json_encode($resultList);            
        }

        public function add($post)
        {
            $productRepository = new ProductRepository();
            $productRepository->add($post);
        }
    }
?>