<?php class Crud  
{
    private $db;

    /**
     * Class constructor.
     */
    public function __construct($con)
    {
       // var_dump($con);
        $this->db = $con;
    } 

    public function getProducts($term=null)
    {
//var_dump($_POST);exit;
        $query = "select * from products ";
        if($term) {
            $query .= 'WHERE   name  like :q ';
           }
        $q = $this->db->prepare($query);
        if($term) {
            $search_term = '%' . $term . '%';
           $q->bindParam(':q', $search_term);
           
          }
        $q->execute();   
        return $q->fetchAll();
    }

    function createProduct($post)
    {
        extract($post);

        $target_dir =  'assets/';
        $target_file = $target_dir . time() . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $image = $target_file;
            
       
        $query = "insert into products(name,price,quantity,image) values(?,?,?,?)";
        $q = $this->db->prepare($query);
        $q->bindparam(1,$name);
        $q->bindparam(2,$price);
        $q->bindparam(3,$quantity);
        $q->bindparam(4,$image);
       

        if($q->execute()){
            return 1 ;
        }else{
            var_dump($q->errorInfo());
        }

    }



    function getSingleProduct($id)
    {

        var_dump($_POST);exit;
        $query = "select * from products where id=?";
        
        $q = $this->db->prepare($query);

        $q->bindparam(1,$id);
        $q->execute();
        return $q->fetch();
    }

    function editProduct($post)
    {
        extract($post);
        $memdetails = $this->getSingleProduct($id);
                 
        if($_FILES["image"]['name'] != '') {
         $target_dir ='assets/';
          $target_file = $target_dir . time() . basename($_FILES["image"]["name"]);
          move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
          $image = $target_file;
        } else {
          $image= $memdetails['image'];
        }

        //var_dump($post);exit;
        $query = "update products set name=?,price=?,quantity=?,image=? where id=?";
        $q = $this->db->prepare($query);
        $q->bindparam(1 , $name);
        $q->bindparam(2 , $price);
        $q->bindparam(3 , $quantity);
        $q->bindparam(4 , $image);
        $q->bindparam(5 , $id);
        $q->execute();

    }

    public function deleteProduct($id)
    {
        $query = "delete from products where id = ?";
        $q = $this->db->prepare($query);
        $q->bindparam(1 , $id);
        $q->execute();   
        
    }


    function createUser($post)
    {
        extract($post);
        					

        $query = "insert into registered_users(name,email,username,password,created_at,updated_at) values(?,?,?,?,NOW(),NOW())";
        $q = $this->db->prepare($query);
        $q->bindparam(1,$name);
        $q->bindparam(2,$email);
        $q->bindparam(3,$username);
        $q->bindparam(4,$password);
       

        if($q->execute()){
            return 1 ;
        }else{
            var_dump($q->errorInfo());
        }

    }

    function getData($username)  {
        
        $query = "select  * from `registered_users` where  username=?";
        $q = $this->db->prepare($query);
        $q->bindparam(1,$username);
        
        $q->execute();
        return $q->fetch();

      }  

}
 

?>