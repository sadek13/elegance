<?php require_once ('DAL.class.php');



class Category extends DAL{

    public function getallCategories(){
        $sql='select * from categories';
        return $this->getdata($sql);
    }
    public function getCategory($name){
        $sql="select * from categories where category_name='$name'";
        return $this->getdata($sql);
    
    }

    public function getCategoryByID($id){
        $sql="select * from categories where category_ID=$id";
        return $this->getdata($sql);
    
    }


    public function getCatName()
    {
        $sql='select category_name as name from categories';
return $this->getdata($sql);
    }


    public function insertcategory($name){

        $sql="insert into categories (category_name) VALUES ('$name')";
        return $this->execute($sql);
      
    }

    public function updatecategory($id,$name){
        $sql= "UPDATE categories SET category_name='$name' where category_ID='$id'";
        return $this->execute($sql);
      
    }
    public function categoryExists($name,$id)
    {
        $sql="select * from categories where category_name='$name' and category_ID='$id'";
        return $this->getdata($sql);
 
    }

    public function deletecategory($id){
        $sql= "DELETE FROM categories WHERE category_ID='$id'";
        return $this->execute($sql);

      
    }

}
?>

