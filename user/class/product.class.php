<?php require_once('DAL.class.php');



class Product extends DAL{
    

    public function getAllProducts(){
        $sql='select * from products';
    return $this->getdata($sql);
    }
    public function getProduct($name){
        $sql="select * from products where prod_name='$name'";
        return $this->getdata($sql);
    
    }

    public function getProductByID($id){
        $sql="select * from products where prod_ID=$id";
        return $this->getdata($sql);
    
    }



    public function getProductName()
    {
        $sql='select prod_name as name,price from products';
return $this->getdata($sql);
    }

public function getFeaturedProducts()
{
    $sql='select * from products where featured=1 limit 4';
    return $this->getdata($sql);
}

public function getProdImages($id)
{
    $sql="select img from product_img where prod_ID='$id'";
    return $this->getdata($sql);
}

public function getAProdImage($id)
{
    $sql="select img from product_img where prod_ID='$id' limit 1";
    return $this->getdata($sql);
}

public function getAllImages()
{
    $sql="select prod_ID,img from product_img";
    return $this->getdata($sql);
}



public function getDisplayedProds()
{

    //note : Temporary
    $sql='select * from products where featured=1';
    return $this->getdata($sql);
}
}