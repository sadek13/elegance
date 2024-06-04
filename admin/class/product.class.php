<?php require_once('DAL.class.php');



class Product extends DAL{
    

    public function getAllProducts(){
        $sql='select * from products';
    return $this->getdata($sql);
    }

    public function getProductById($id){
       $sql="SELECT 
        products.*,   -- Select all columns from products
        categories.category_name as category  -- Select the category_name from categories
    FROM 
        products
    INNER JOIN 
        categories ON products.cat_ID = categories.category_ID
        where prod_ID = $id;"
    ;
       
    
    return $this->getdata($sql);
    }
    public function getProductByTitle($title){
        $sql="select * from products where prod_name='$title'";
        return $this->getdata($sql);
    
    }

    public function getProductName()
    {
        $sql='select prod_name as name,price from products';
        return $this->getdata($sql);
    }



    public function getProductImagesById($id)
    {
        $sql="select * from product_img where prod_ID='$id'";
        return $this->getdata($sql);
}

public function getDisplayImage($id)
{
    $sql="select img from product_img where prod_ID='$id' limit 1";
    return $this->getdata($sql);
}



public function insertProduct($title,$description,$price,$stock,$weight,$color,$material){

    $sql= "INSERT INTO products (prod_title, description, price, stock, weight, color, material)
    VALUES ('$title', '$description', '$price', '$stock', '$weight', '$color', '$material')";
    return $this->execute($sql);
  
}

public function updateProduct1($title,$description,$price,$stock,$weight,$color,$material,$prod_ID){
    $sql = "UPDATE products
    SET prod_title = '$title',
   
        description = '$description',
        price = '$price',
        stock = '$stock',
        weight = '$weight',
        color = '$color',
        material = '$material'
    WHERE prod_ID = $prod_ID";
    return $this->execute($sql);
}

public function updateProduct($title,$catID, $description, $price, $stock, $weight, $color, $material, $prod_ID)
{
    $sql = "UPDATE products SET prod_title = ?,cat_ID=?,description = ?, price = ?, stock = ?, weight = ?, color = ?, material = ? WHERE prod_ID = ?";
    $params = ["ssdiidiss", $title,$catID, $description, $price, $stock, $weight, $color, $material, $prod_ID];
    
     // "si" denotes string and integer types for the parameters
    return $this->execute($sql, $params);
}


public function insertProduct1($title,$catID,$desc){

    $sql= "INSERT INTO products (prod_title,cat_ID, description)
    VALUES ('$title','$catID','$desc')";
    return $this->execute($sql);

  
}

public function checkIfProductExists($title){
    $sql="select prod_title from products where prod_title =?";
    return $this->data($sql,[$title]);
}
public function  insertProductImage($prod_ID,$image){

    $sql= "INSERT INTO product_img (prod_ID, img)
    VALUES ($prod_ID, '$image')";
    return $this->execute($sql);
}



// public function Featured($id){

//     $sql="UPDATE products
//     SET featured = ?
//     WHERE prod_ID=?";
//         $params=["ii",$ft,$id];
//     return $this->execute($sql,$params);
   
// }

public function markAsFeatured($id){

    $sql="UPDATE products
    SET featured =1
    WHERE prod_ID=$id";
   
    return $this->secondExecute($sql);
   
}

public function unmarkAsFeatured($id){

    $sql="UPDATE products
    SET featured = 0
    WHERE prod_ID=$id";
   
    return $this->secondExecute($sql);
   
}




    
public function getProdTableContent(){
    $sql="SELECT products.prod_ID,products.stock,products.prod_title, categories.category_name ,
    products.material,products.price,products.featured
    FROM products
    INNER JOIN categories ON products.cat_ID = categories.category_ID";
    return $this->getdata($sql);
}

public function deleteProduct($id){
    $sql= "DELETE FROM products WHERE prod_ID='$id'";
    return $this->execute($sql);

  
}

}