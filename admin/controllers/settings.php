<?php
require_once dirname(dirname(__FILE__)).'/models/db_model.php';
class settings{
    function __construct()
    {
        $this->db_model= new db_model;
    }
    function settings(){
        $search=$_POST['search'];
        return json_encode($this->db_model->getSettings($search));
    }
    function nameSettings(){
        return json_encode($this->db_model->getNameSettings());
    }
    function editSetting(){

        $id=$_POST['id'];
        //$name=$_POST['Name'];
        $key=$_POST['Key'];
        $value=$_POST['Value'];
        $description=$_POST['description'];
        return $this->db_model->editSetting($id,$key,$value,$description);
    }
    function save(){

        //$id=$_POST['id'];
        $name=$_POST['Name'];
        $key=$_POST['Key'];
        $value=$_POST['Value'];
        $description=$_POST['des'];
        return $this->db_model->saveNewSetting($name,$key,$value,$description);
    }

    function editLogo(){
        //extract($_POST);
        $image = $_FILES['file'];
        $id=$_POST['id'];

        $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
        $image_name = "logo_" . date("Ymdhis") . "." . $ext;
        $target_file=dirname(dirname(__DIR__))."/style/images/".$image_name;
        $name_store='style/images/'.$image_name;
        $valid_exts = array('jpeg', 'jpg', 'png', 'gif','ico');
        if (!in_array($ext, $valid_exts)) {
            return false;
        }else{
            move_uploaded_file($image["tmp_name"], $target_file);
            return $this->db_model->editLogo($id,$name_store);
        }

    }
}
?>