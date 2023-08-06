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
            
            $data = $this->SelectAll('admin');
            include_once 'header.php';
            include_once 'index.php';

            break;

            case '/edit':
                include_once 'header.php';
                if(isset($_GET['eid'])){

                    $eid = $_GET['eid'];
                    $where = array('id' => $eid);
                    $data = $this->Select_where('admin', $where);
                    $fetch_data = $data->fetch_object();

                    //update//

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

                case '/delete':

                    if (isset($_GET['did'])) {

                    $did = $_GET['did'];
                    $where = array('id' => $did);
                    $this->Delete_Data('admin', $where);
                    header('location:index');
                }
                
                    break;


        }

    }
}

$obj = new Mycontrol;