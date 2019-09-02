<?php 
    $dbh = new PDO('mysql:host=localhost;dbname=onlinecinemaajk',"root","");

    function query($query){
        global $dbh;
        $result = $dbh->prepare($query);
        $rows = [];
        while ($row = $result->fetch()){
            $rows[] = $row;
        }
        return $rows;
    }

    function upload() {
        global $dbh;
        $filename = $_FILES['gambar']['name'];
        $filesize = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];
        $newFileName = "";
        if($error === 4 ) {
            $newFileName = "default.png";
        }else{

            $imageExtensionValid = ['jpg','jpeg', 'png'];
            $imageExtension = explode('.',$tmpName);
            $imageExtension = strtolower(end($imageExtension));
            if(!in_array($imageExtension,$imageExtensionValid)){
                echo "
                <script>
                    alert('Please upload the allowed image extensions (jpg, jpeg, png)');
                </script>";
                return false;
            }
            if(!$imageExtensionInArray){
                echo "
                <script>
                    alert('Please upload the allowed image extensions (jpg, jpeg, png)');
                </script>
            ";
            }
            if($filesize > 5000000) {
                echo "
                    <script>
                        alert('Image's size is too big (>2 mb)');
                    </script>
                ";
                // return false;
            }
    
            $newFileName = uniqid().".".$imageExtension;
    
            move_uploaded_file($tmpName, "img/".$newFileName);
        }

        return $newFileName;
    }

    //Fungsi Buat Register
    function register($data){
        global $dbh;
        $username = strtolower(htmlspecialchars(stripslashes($data["username"])));
        $password = $data["password"];
        $passwordConfirm = $data["passwordConfirm"];
        $gambar = upload();
        if(!$gambar)return false;

        $cekUsername = $dbh->prepare("SELECT username FROM users WHERE username = :username")->fetch();
        if($cekUsername){
            echo "
            <script>
                alert('Username telah terpakai');
            </script>
            ";
            return false;
        }

        if($password !== $passwordConfirm) {
            echo "
                <script>
                    alert('password tidak sama');
                </script>
            ";
            return false;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $dbh->prepare("INSERT INTO users (username,password,gambar) VALUES (:username,:password,:gambar)" );
        $stmt->execute(['username' => $username,'password' => $password, 'gambar' => $gambar]);
        return $stmt->rowCount();
    }
