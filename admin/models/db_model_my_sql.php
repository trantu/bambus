
<?php
require_once dirname(__FILE__).'/lib/db_mysql.php';

Class db_model extends db_mysql {


    function getorders($start,$end){



        $sql="select * from history_order order by Day DESC limit ".$start." ,30 ";
        $result=mysql_query($sql) or die(mysql_error());
        $ar=array();
        while($row=mysql_fetch_assoc($result)){
            $ar[]=$row;
        }
        return $ar;
    }

    function getorderstotal(){

        $sql="select count(idDH) as num from history_order";
        $result=mysql_query($sql) or die(mysql_error());
        $ar=array();
        while($row=mysql_fetch_assoc($result)){
           return $row;
        }

    }

    function delete_order($id){

        $sql="delete from history_order where idDH=".$id;
        $result=mysql_query($sql) or die(mysql_error());
        if($result){
            return array("result"=>true);
        }else{
            return array("result"=>false);
        }

    }

    function delete_order_all(){

        $sql="delete from history_order";
        $result=mysql_query($sql) or die(mysql_error());
        if($result){
            return array("result"=>true);
        }else{
            return array("result"=>false);
        }

    }


}
