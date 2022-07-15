<?php
    include_once '../autoload/class-autoloader.inc.php';
    
    $method = $_SERVER['REQUEST_METHOD'];
    
    if ($method == "GET")
    {
        $productList = DB::getAll();
        echo json_encode($productList);
    }
    else if ($method == "POST") 
    {
        
        $type = $_POST['type'];
        if($type != null)
        {
            $name = $_POST['name'];
            $sku = $_POST['sku'];
            $price = $_POST['price'];
    
            $content = $_POST['content'];
            $attribute = array();
            foreach ($content as $value)
            {
                $attribute[] = $value;
            }
            $product = new $type($type, $sku, $name, $price, $attribute);
            $product->save();
            echo "Success";
        }
        
        
    }
    else if ($method == "DELETE")
    {
        $sku = $_GET['sku'];
        $deleteStatus = DB::delete($sku);
    }
?>