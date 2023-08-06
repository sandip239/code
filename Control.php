<?php

include_once 'Model.php';


class Mycontrol extends Model
{

    public function __construct()
    {
        parent::__construct();
        $url = $_SERVER['PATH_INFO'];
        session_start();

        echo $url;

        switch ($url) {
            case '/index':
                if (isset($_SESSION['id'])) {
                include_once 'header.php';
                $admindata = $this->SelectAll('admin');

                include_once 'index.php';
            } else {
                header('location:login');
            }
                break;

            default:

                break;

            case '/register':

                include_once 'header.php';
                if (isset($_POST['submit'])) {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                    $data = array('name' => $name, 'email' => $email, 'password' => $password);

                    $this->InsertData('admin', $data);
                    echo "insted";
                    echo "<script>alert('data insert success fully')</script>";
                    header('location:index');
                }
                include_once 'register.php';
                break;

            case '/delete':

                if (isset($_GET['did'])) {

                    $did = $_GET['did'];
                    $where = array('id' => $did);
                    $this->Delete_Data('admin', $where);
                    header('location:index');
                }
                break;

            case '/edit':
                include_once 'header.php';
                if (isset($_GET['eid'])) {

                    $eid = $_GET['eid'];
                    $where = array('id' => $eid);
                    $data = $this->Select_where('admin', $where);
                    $fetch_data = $data->fetch_object();

                    //update

                    if (isset($_POST['update'])) {
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];

                        $data = array('name' => $name, 'email' => $email, 'password' => $password);

                        $update = $this->update_data('admin', $data, $where);
                        header('location:index');
                    }

                }
                include_once 'edit.php';
                break;


            case '/like':

                include_once 'header.php';
                $cdata = $this->Join_Two('cetegory', 'products', 'cetegory.id=products.productCategory');
                break;

            case '/login':
                if (!isset($_SESSION['id'])) {
                    if (isset($_POST['submit'])) {
                        $email = $_POST['email'];
                        $password = $_POST['password'];

                        $where = array('email' => $email, 'password' => $password);
                        $res = $this->Select_where("admin", $where);
                        $r = $res->num_rows;
                        if ($r > 0) {
                            $_session_data = $res->fetch_object();
                            // echo $_session_data;exit;
                            $_SESSION['id'] = $_session_data->id;
                            // setcookie("name",$email,time()+30);
                            // setcookie("pwd",$password,time()+30);
                            echo "<script>alert('login success!')</script>";

                            header('location:index');
                        } else {
                            echo "<script>alert('invalid data!')</script>";
                        }
                    }
                    include_once 'header.php';
                    include_once 'login.php';

                } else {
                    header('location:index');
                }
                break;
                case '/logout':
                    session_destroy();
                    header('location:login');
            
                    break;




        }
    }
}

$obj = new Mycontrol;