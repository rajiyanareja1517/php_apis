<?php

    class Config {

        private $HOST_NAME = "localhost";
        private $USER_NAME = "root";        
        private $PASSWORD = "";
        private $DB_NAME = "my_db";
        public $connection;

        function initConnection() {
            $this->connection = new mysqli($this->HOST_NAME, $this->USER_NAME,$this->PASSWORD,$this->DB_NAME);
        }

        function addPost($post, $description, $image) {
            $this->initConnection();
            $query = "INSERT INTO posts(post,description,image) VALUES ('$post','$description','$image');";
            $res = mysqli_query($this->connection,$query);
            return $res;
        }

        function deletePost($id) {
            $this->initConnection();
            $q = "SELECT * FROM posts WHERE id=$id;";
            $obj = mysqli_query($this->connection,$q);
            $count = mysqli_num_rows($obj);
            if($count == 1) {
                $value = mysqli_fetch_assoc($obj);
                $image = $value['image'];
                unlink("../../uploads/$image");
                $query = "DELETE FROM posts WHERE id=$id";
                $res = mysqli_query($this->connection,$query);
                return $res;
            } else {
                return false;
            }
        }

        function updatePost($id, $post, $description) {
            $this->initConnection();
            $query = "UPDATE posts SET post='$post', description='$description' WHERE id=$id";
            $res = mysqli_query($this->connection,$query);
            return $res;
        }

        function fetchAllPosts() {
            $this->initConnection();
            $query = "SELECT * FROM posts";
            $res = mysqli_query($this->connection,$query);
            return $res;
        }

        function fetchSinglePost($id) {
            $this->initConnection();

            $query = "SELECT * FROM posts WHERE id=$id; ";

            $res = mysqli_query($this->connection,$query);
            return $res;

        }

        function addData($ctgryName) {
            $this->initConnection();
            $query = "INSERT INTO categorys(category_name) VALUES ('$ctgryName'); ";
            $res = mysqli_query($this->connection, $query);
            return $res;
        }

        function updateData($id,$ctgryName) {
            $this->initConnection();
            $query = "UPDATE categorys SET category_name='$ctgryName' WHERE id=$id";
            $res = mysqli_query($this->connection, $query);
            return $res;
        }
        function deleteData($id) {
            $this->initConnection();
            $query = "DELETE FROM categorys WHERE id=$id";
            $res = mysqli_query($this->connection,$query);
            return $res;
        }

        function getAllData() {
            $this->initConnection();
            $query = "SELECT * FROM categorys";
            $res = mysqli_query($this->connection,$query);
            return $res;
        }

        function addProduct($name,$price,$category) {
            $this->initConnection();
            $query = "INSERT INTO products(product_name,product_price,product_category) VALUES ('$name',$price,$category);";
            $res = mysqli_query($this->connection,$query);
            return $res;
        }

        function fetchAllProducts() {
            $this->initConnection();
            $query = "SELECT * FROM products";
            $res = mysqli_query($this->connection,$query);
            return $res;
        }

        function updateProduct($id, $name, $price, $ctgry) {
            $this->initConnection();
            $query = "UPDATE products SET product_name='$name', product_price=$price, product_category=$ctgry WHERE id=$id";
            return mysqli_query($this->connection,$query);
        }

        function deleteProduct($id) {
            $this->initConnection();
            $query = "DELETE FROM products WHERE id=$id";
            $res = mysqli_query($this->connection,$query);
            return $res;
        }
        
        function fetchSingleProduct($id) {
            $this->initConnection();
            $query = "SELECT * FROM products WHERE id=$id";
            $res = mysqli_query($this->connection,$query);
            return $res;
        }

        function fetchSingleCatefory($id) {
            $this->initConnection();
            $query = "SELECT * FROM categorys WHERE id=$id";
            $res = mysqli_query($this->connection,$query);
            return $res;
        } 

        //

        function signUpUser  ($email, $password) {
            $this->initConnection();
            $query = "SELECT * FROM authentication WHERE email='$email'";
            $result = mysqli_query($this->connection, $query);
        
            $count = mysqli_num_rows($result);
            if ($count == 0) {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $qer = "INSERT INTO authentication(email,password) VALUES ('$email','$hashed_password');";
                $res = mysqli_query($this->connection, $qer);
                return true;
            } else {
                return false;
            }
        }
        
        function signInUser  ($email, $password){
            $this->initConnection();
            $q = "SELECT password FROM authentication WHERE email='$email';";
            $res = mysqli_query($this->connection, $q);
            
            if ($res) {
                $row = mysqli_fetch_assoc($res);
                if ($row) {
                    $hashed_password = $row['password'];
                    $stored_password = $hashed_password;
                    if ($stored_password == $hashed_password) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

        function fetchAllUsers() {
            $this->initConnection();
            $query = "SELECT * FROM authentication";
            $res = mysqli_query($this->connection,$query);
            return $res;
        }

        function fetchSingleUser($id) {
            $this->initConnection();
            $query = "SELECT * FROM authentication WHERE id=$id";
            $res = mysqli_query($this->connection,$query);
            return $res;
        }

        function deleteUser($id) {
            $this->initConnection();
            $query = "DELETE FROM authentication WHERE id=$id;";
            $res = mysqli_query($this->connection,$query);
            return $res;
        }

        function updateUser($email,$password,$id){
            $this->initConnection();
            $query = "UPDATE authentication SET email='$email',password='$password' WHERE id=$id;";
            $res = mysqli_query($this->connection,$query);
            return $res;
        }

        // Student 

        
        function addStudent($name,$age,$course){
            $this->initConnection();
            $query = "INSERT INTO students(name,age,course) VALUES('$name',$age,'$course');";
            $res = mysqli_query($this->connection,$query);
            return $res;
        }
        
        function fetchAllStudents(){
            $this->initConnection();
            $query = "SELECT * FROM students;";
            $res = mysqli_query($this->connection,$query);
            return $res;
        }

        function updateStudent($name,$age,$course,$id){
            $this->initConnection();
            $query = "UPDATE students SET name='$name',age=$age,course='$course' WHERE id=$id;";
            $res = mysqli_query($this->connection,$query);
            return $res;
        }

        function fetchSingleRecord($id){
            $this->initConnection();
            $query = "SELECT * FROM students WHERE id=$id;";
            $res = mysqli_query($this->connection,$query);
            return $res;
        }

        function deleteStudent($id){
            $this->initConnection();
            $query = "DELETE FROM students WHERE id=$id;";
            $res = mysqli_query($this->connection,$query);
            return $res;
        }

    }

?>