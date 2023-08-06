<?php
class Model

{
    public $con = "";
    public function __construct()
    {
        $this->con = new mysqli('localhost', 'root', '', 'estore');

        if ($this->con->connect_error) {
            die("Connection failed: " . $this->con->connect_error);
        }
        echo "Connected successfully!";
    }

    public function SelectAll($tbl)

    {

       $sql = "SELECT * FROM $tbl";
      
        $q = $this->con->query($sql);
        while ($fetch = $q->fetch_object()) {
            $res[] = $fetch;
        }
        return $res;
    } 

    public function InsertData($tbl,$data)

     {
        $dk = array_keys($data); 
        $k = implode(",",$dk);
        $dv = array_values($data);
        $v = implode("','",$dv);

        $sql = "INSERT INTO $tbl ($k) VALUES ('$v')";
        $q=$this->con->query($sql);
        return $q;
     }

     function Delete_Data($tbl,$where)

        {
            $key =array_keys($where);
            $vals =array_values($where);
            $sql = "DELETE FROM $tbl WHERE 1=1";
            $i=0;
          foreach($where as $w)
            {
                $sql.=" and $key[$i]='$vals[$i]' ";
               $i++;
            }
            // echo $sql;exit;

            $q=$this->con->query($sql);
            return $q;
       

    }

    function Select_where($tbl,$where)

    {
        $sql="SELECT * FROM $tbl WHERE 1=1";
        $key = array_keys($where);
        $val = array_values($where);
        $i = 0;

        foreach($where as $w)
        {
            $sql.= " AND $key[$i]= '$val[$i]' ";
            $i++;
        }
        // echo $sql;exit;

        $q = $this->con->query($sql);
        return $q;
    }
    
    function update_data($table,$data,$where)
    {
        $sql ="UPDATE $table SET ";
        $dk = array_keys($data);
        $dv = array_values($data);

        $count = count($data);
        $i=0;
        foreach($data as $d)
        {
            if($count == $i+1)
            {
                $sql.="$dk[$i] = '$dv[$i]'";
            }
            else
            {
                $sql.="$dk[$i]='$dv[$i]',";
            }
            $i++;

        }
        $sql.=" WHERE 1=1";
        $wk = array_keys($where);
        $wv = array_values($where);
        $j=0;
        foreach($where as $w)
        {
            $sql.=" AND $wk[$j]='$wv[$j]'";
            $j++;
        }
        // echo $sql;exit;
        $q=$this->con->query($sql);
        return $q;

    }

    function Join_Two($tbl1,$tbl2,$on)
     {
         $sql = "SELECT * FROM $tbl1 LEFT JOIN $tbl2 on $on";
        //  echo $sql;exit;
         $q = $this ->con->query($sql);
         while($fetch = $q->fetch_object())
         {
             $res[]=$fetch;
         }
         return $res;
     }
}


?>