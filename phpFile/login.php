<?php
    session_start();
    include_once "config.php";
    $user_name = $_POST['email'];
    $pass = $_POST['password'];
    
    if(isset($user_name) && isset($pass)){
        if(!empty($user_name) && !empty($pass)){
            if(filter_var($user_name,FILTER_VALIDATE_EMAIL)){
                $req = $con->prepare("SELECT * FROM utilisateur WHERE email= ? AND password = ?");
                $req->bindValue(1,$user_name);
                $req->bindValue(2,$pass);
                $req->execute();
                $row = $req-> fetchAll(PDO::FETCH_ASSOC);
                if(!empty($row)){
                    // if($row[0]["id_login"]=="LG00"){
                    //     $_SESSION["user"] = "ADMIN";
                    //     $_SESSION['authenticated'] = true;
                    //     echo "ADMIN";
                    // }
                    // else{
                    //     if($row[0]['stat']==="online"){
                    //         echo "ce compte est deja ouvrir dans une autre browser";
                    //     }
                    //     else{
                    //         $req1 = $con->prepare("INSERT INTO user_session VALUES (?,?,?,?)");
                    //         $req1->bindValue(1,time());
                    //         $req1->bindValue(2,date('Y-m-d H:i:s', time()));
                    //         $req1->bindValue(3,NULL);
                    //         $req1->bindValue(4,$row[0]["id_login"]);
                    //         if($req1->execute()){
                    //             $req = $con->prepare("UPDATE login SET stat = 'online' WHERE email= ?");
                    //             $req->bindValue(1,$user_name);
                    //             if($req->execute()){
                    //                 $_SESSION['user']=$row[0]["email"];
                    //                 $_SESSION['id_user'] = $row[0]["id_login"];
                    //                 $_SESSION['authenticated-user'] = true;
                    //                 $req = $con->prepare("
                    //                 SELECT u.id_user


                    //                 FROM projects p , userr u
                                    
                                    
                    //                 WHERE u.id_user in (SELECT p.chef_pro FROM projects 
                    //                                    WHERE p.start_date < CURRENT_DATE
                    //                                    AND p.end_date > CURRENT_DATE)
                    //                 AND u.email = ? ;
                    //                 ");
                    //                 $req->bindValue(1,$user_name);
                    //                 $req->execute();
                    //                 $row = $req-> fetchAll(PDO::FETCH_ASSOC);
                    //                 if($row){
                    //                     $_SESSION["chef_project"] = true;
                    //                 }
                    //                 // else{
                    //                 //     pass;
                    //                 // }
                    //                 echo "USER";
                    //             }
                    //             else{
                    //                 echo "err";
                    //             }
                                
                    //         }
                    //     }
                    // }
                    $req = $con->prepare("SELECT name_role FROM role WHERE id_role = ? ");
                    $req->bindValue(1,$row[0]['id_role']);
                    $req->execute();
                    $row1 = $req-> fetchAll(PDO::FETCH_ASSOC);
                    

                    if($row1[0]['name_role'] === "admin"){
                        $_SESSION['authenticated'] = true;
                        $_SESSION["user"] = "ADMIN";
                        echo "ADMIN";
                    }
                    else if ($row1[0]['name_role'] === "user"){
                        $_SESSION["user"] = "ADMIN";
                        $_SESSION['authenticated_user'] = true;
                        $_SESSION['id'] = $row[0]['id'];
                        $_SESSION['email'] = $row[0]['email'];
                        $_SESSION['img'] = $row[0]['img'];
                        echo "user";
                        
                    }

                }
                    
                else{
                    echo "email or password is incorrect !";
                }
            }
            else{
                echo "please enter a valid email";
            }
        }
        else{
            echo "all input are required";
        }
    }
    else{
        echo "somthing are wrong";
    }

?>

