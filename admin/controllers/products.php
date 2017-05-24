<?php
require_once dirname(dirname(__FILE__)).'/models/db_model.php';
class products{
    function __construct()
    {
        $this->db_model= new db_model;
    }
    function products(){
        $search=$_POST['search'];
        return json_encode($this->db_model->all_products($search));
    }
    function editProduct(){

        $old_plu=$_POST['old_plu'];
        $p_plu=$_POST['p_plu'];
        $p_name=$_POST['p_name'];
        $p_preis1=$_POST['p_preis1'];
        $p_preis2=$_POST['p_preis2'];
        $p_preis3=$_POST['p_preis3'];
        $p_beilage=$_POST['p_beilage'];
        $p_artikel_name=$_POST['p_artikel_name'];
        $p_artikel_beschreibung=$_POST['p_artikel_beschreibung'];
        $p_online_gruppe=$_POST['p_online_gruppe'];
        $p_online_bild=$_POST['p_online_bild'];
        $p_online_farbe=$_POST['p_online_farbe'];

        return $this->db_model->editProduct($old_plu,$p_plu,$p_name,$p_preis1,$p_preis2,$p_preis3,$p_beilage,$p_artikel_name,$p_artikel_beschreibung,$p_online_gruppe,$p_online_bild,$p_online_farbe);
    }

    function removeProduct(){

        $id=$_POST['id'];


        return $this->db_model->removeProduct($id);
    }

    function addProduct(){

        $p_plu=$_POST['p_plu'];
        $p_name=$_POST['p_name'];
        $p_preis1=$_POST['p_preis1'];
        $p_preis2=$_POST['p_preis2'];
        $p_preis3=$_POST['p_preis3'];
        $p_beilage=$_POST['p_beilage'];
        $p_artikel_name=$_POST['p_artikel_name'];
        $p_artikel_beschreibung=$_POST['p_artikel_beschreibung'];
        $p_online_gruppe=$_POST['p_online_gruppe'];
        $p_online_bild=$_POST['p_online_bild'];
        $p_online_farbe=$_POST['p_online_farbe'];

        return $this->db_model->addProduct($p_plu,$p_name,$p_preis1,$p_preis2,$p_preis3,$p_beilage,$p_artikel_name,$p_artikel_beschreibung,$p_online_gruppe,$p_online_bild,$p_online_farbe);
    }
}
?>