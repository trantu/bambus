<?php
require_once dirname(dirname(__FILE__)).'/models/db_model_my_sql.php';
class orders{
    function __construct()
    {
        $this->db_model= new db_model;
    }
    function getorders(){

        $start=$_POST['start'];
        $end=$_POST['end'];
        return json_encode($this->db_model->getorders($start,$end));
    }

    function getorderstotal(){

        return json_encode($this->db_model->getorderstotal());
    }
    function delete_order(){

        $id=$_POST['id'];
        return json_encode($this->db_model->delete_order($id));
    }

    function delete_order_all(){

        return json_encode($this->db_model->delete_order_all());
    }

}
?>