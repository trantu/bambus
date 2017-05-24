<?php
require_once dirname(dirname(__FILE__)).'/models/db_model.php';
class groups{
    function __construct()
    {
        $this->db_model= new db_model;
    }
    function groups(){
        return json_encode($this->db_model->getNameGruppe());
    }
    function editGroup(){

        $id=$_POST['id'];
        $name=$_POST['name'];
        $bild=$_POST['bild'];
        $farbe=$_POST['farbe'];
        return $this->db_model->editNameGruppe($id,$name,$bild,$farbe);
    }

    function removeGroup(){

        $id=$_POST['id'];


        return $this->db_model->removeGroup($id);
    }

    function addGroup(){
        //extract($_POST);
        $image = $_FILES['file'];
        $name_group=$_POST['name'];
        $frabe_group=$_POST['frabe_group'];
        if($image['name']==null){
            return $this->db_model->addGroup($name_group,'',$frabe_group);
        }else{
            $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
            $base_name = pathinfo($image['name'], PATHINFO_BASENAME);
            $image_name = $base_name . date("Ymdhis") . "." . $ext;
            $target_file=dirname(dirname(__DIR__))."/upload/groups/".$image_name;
            $name_store=$image_name;
            $valid_exts = array('jpeg', 'jpg', 'png', 'gif');
            if (!in_array($ext, $valid_exts)) {
                return false;
            }else{
                move_uploaded_file($image["tmp_name"], $target_file);
                return $this->db_model->addGroup($name_group,$name_store,$frabe_group);
            }
        }


    }

    function editGroupArticle(){
        //extract($_POST);
        $image = $_FILES['file_2'];
        $name_group=$_POST['name'];
        $frabe_group=$_POST['frabe_group'];
        $id=$_POST['id'];
        if($image['name']==null){
            return $this->db_model->editNameGruppe($id,$name_group,null,$frabe_group);
        }else{
            $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
            $base_name = pathinfo($image['name'], PATHINFO_BASENAME);
            $image_name = $base_name . date("Ymdhis") . "." . $ext;
            $target_file=dirname(dirname(__DIR__))."/upload/groups/".$image_name;
            $name_store=$image_name;
            $valid_exts = array('jpeg', 'jpg', 'png', 'gif');
            if (!in_array($ext, $valid_exts)) {
                return false;
            }else{
                move_uploaded_file($image["tmp_name"], $target_file);
                return $this->db_model->editNameGruppe($id,$name_group,$image_name,$frabe_group);
            }
        }


    }
}
?>