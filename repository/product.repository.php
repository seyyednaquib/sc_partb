<?php
    class ProductRepository 
    {
        //Delete all type of product. Kindly note that, the inheritance relationship is being implemented
        //in MySQL as well. Thus, once the parrent is deleted, the child also would be deleted automatically
        public function delete($sku) 
        {
            DB::delete('product', 'sku=%s', $sku);    
        }


        //Reading all type of product
        public function read() 
        {
            $productList = DB::query("SELECT * FROM product");
            foreach ($productList as $data)
            {
                $classType = ucfirst($data['product_type']);
                $productTypeList = DB::query("SELECT * FROM ". $data['product_type'] ." WHERE ". "sku='" . $data['sku'] . "'");
                unset($productTypeList[0]["sku"]);
                $attribute = array ();
                foreach($productTypeList[0] as $content)
                {
                    $attribute[] = $content;
                }
                $product = new $classType($data['product_type'], $data['sku'], $data['product_name'], $data['product_price'], $attribute);
                $resultList [] = array_merge((array) $data, ["attribute" => $product->getAttribute()]);
            }
            return $resultList;
        }


        //Adding all type of products dyanmically based on its type and assigning its unique attribute(s)
        public function add($post)
        {
            $type = $post['type'];
            $name = $post['name'];
            $sku = $post['sku'];
            $price = $post['price'];
            $content = $post['content'];
            $attribute = array();
            foreach ($content as $value)
            {
                $attribute[] = $value;
            }
            $classType = ucfirst($type);
            $product = new $classType($type, $sku, $name, $price, $attribute);
            $product->save();
            echo "Success";
        }
    }
?>
