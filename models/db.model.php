<?php
  // session_start();

class DB 
  {
    protected static $host = 'localhost';
    protected static $user = 'root';
    protected static $pass = '';
    protected static $db = 'product';

    public static function connect() 
    {
      $connection = mysqli_connect(DB::$host, DB::$user, DB::$pass , DB::$db);
      if (mysqli_connect_errno())
      {
        echo "failed";
        exit();
      } 
      else 
      {
        return $connection;
      }
    }
    
    public static function insert($sql)
    {
      $resultProduct = mysqli_query(DB::connect(), $sql);
      mysqli_close(DB::connect());
    }

    public static function delete($sku)
    {
      $sql = "DELETE FROM product WHERE product_sku='". $sku ."'";
      $result = mysqli_query(DB::connect(), $sql);
      mysqli_close(DB::connect());
    }

    public static function get($sql)
    {
      $resultList = array();
      $result = mysqli_query(DB::connect(), $sql);
      while($row = mysqli_fetch_assoc($result))
      {
        $resultList[] = $row;
      }
      mysqli_close(DB::connect());
      return $resultList;
    }

    public static function getAll()
    {
      $resultList = array ();
      $sql = "SELECT * FROM product";
      $productList = DB::get($sql);
      foreach ($productList as $value)
      {
          $sqlProductType = "SELECT * FROM ". $value['product_type'] ." WHERE ". $value['product_type'] ."_sku='" . $value['product_sku'] . "'";
          $productTypeList = DB::get($sqlProductType);
          unset($productTypeList[0][$value['product_type'] . "_sku"]);
          $attribute = array ();
          foreach($productTypeList[0] as $content)
          {
              $attribute[] = $content;
          }
          $product = new $value['product_type']($value['product_type'], $value['product_sku'], $value['product_name'], $value['product_price'], $attribute);
          $resultList [] = array_merge((array) $value, ["attribute" => $product->getAttribute()]);
      }
      return $resultList;
    }
  }
  
?>
