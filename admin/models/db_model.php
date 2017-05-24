
<?php
# Connect Database Sqlite3
class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open(dirname(dirname(dirname(__FILE__))).'/db/ArtikelOL.db3');
    }
}
Class db_model extends MyDB {

    //lay ten cac nhom mon an
    function getNameGruppe(){

        $sql=<<<EOF
		SELECT `Online_Gruppe_Name`,`Online_Gruppe_ID`,`Online_Gruppe_Bild`,`Online_Gruppe_Farbe` FROM `Gruppe_Online` order by Online_Gruppe_ID
EOF;
        $result=$this->query($sql);
        while($row = $result->fetchArray(SQLITE3_ASSOC) ){
            $ar[]=$row;
        }

        return $ar;
    }

    //sua group
    function editNameGruppe($id,$name,$bild,$farbe){
        if($farbe==null||$farbe==""||$farbe=="undefined"||$farbe=="null"){
            $farbe=null;
        }

        if($name==null||$name==""||$name=="undefined"||$name=="null"){
            $name=null;
        }
        if($id==null||$id==""||$id=="undefined"||$id=="null"){
            //$new_id=null;
            $sql=<<<EOF
		SELECT  max(Online_Gruppe_ID) as id from Gruppe_Online
EOF;
            $result=$this->query($sql);
            while($row = $result->fetchArray(SQLITE3_ASSOC) ){
                $new_id= $row['id']+1;
            }
            $sql2=<<<EOF
		INSERT INTO Gruppe_Online values('$new_id','$name','$bild','$farbe')
EOF;
            $result2=$this->query($sql2);
            //return $new_id;
        }else{
            if($bild==null){
                $sql=<<<EOF
		UPDATE  Gruppe_Online set Online_Gruppe_Name='$name',Online_Gruppe_Farbe='$farbe'  where Online_Gruppe_ID ='$id'
EOF;
            }else{
                $sql=<<<EOF
		UPDATE  Gruppe_Online set Online_Gruppe_Name='$name',Online_Gruppe_Bild='$bild',Online_Gruppe_Farbe='$farbe'  where Online_Gruppe_ID ='$id'
EOF;
            }
            $result=$this->query($sql);
        }



        return true;
    }

    function removeGroup($id){
        $sql=<<<EOF
		DELETE from Gruppe_Online where Online_Gruppe_ID='$id';
EOF;
        $result=$this->query($sql);
        return true;
    }

    function removeProduct($id){
        $sql=<<<EOF
		DELETE from Artikel_Online where PLU='$id';
EOF;
        $result=$this->query($sql);
        return true;
    }
    //add group
    function addGroup($name,$image_name,$farbe_group){
        if($name==null||$name==""||$name=="undefined"||$name=="null"){
            $name=null;
        }
        if($farbe_group==null||$farbe_group==""||$farbe_group=="undefined"||$farbe_group=="null"){
            $farbe_group=null;
        }
        $sql=<<<EOF
		SELECT  max(Online_Gruppe_ID) as id from Gruppe_Online
EOF;
        $result=$this->query($sql);
        while($row = $result->fetchArray(SQLITE3_ASSOC) ){
            $new_id= $row['id']+1;
        }
        $sql2=<<<EOF
		INSERT INTO Gruppe_Online values('$new_id','$name','$image_name','$farbe_group')
EOF;
        $result2=$this->query($sql2);
    }
    //sua product
    function editProduct($old_plu,$p_plu,$p_name,$p_preis1,$p_preis2,$p_preis3,$p_beilage,$p_artikel_name,$p_artikel_beschreibung,$p_online_gruppe,$p_online_bild,$p_online_farbe){
        if($p_name==null||$p_name==""||$p_name=="undefined"||$p_name=="null"){
            $p_name=null;
        }
        if($p_preis1==null||$p_preis1==""||$p_preis1=="undefined"||$p_preis1=="null"){
            $p_preis1=null;
        }
        if($p_preis2==null||$p_preis2==""||$p_preis2=="undefined"||$p_preis2=="null"){
            $p_preis2=null;
        }
        if($p_preis3==null||$p_preis3==""||$p_preis3=="undefined"||$p_preis3=="null"){
            $p_preis3=null;
        }
        if($p_beilage==null||$p_beilage==""||$p_beilage=="undefined"||$p_beilage=="null"){
            $p_beilage=null;
        }
        if($p_artikel_name==null||$p_artikel_name==""||$p_artikel_name=="undefined"||$p_artikel_name=="null"){
            $p_artikel_name=null;
        }
        if($p_artikel_beschreibung==null||$p_artikel_beschreibung==""||$p_artikel_beschreibung=="undefined"||$p_artikel_beschreibung=="null"){
            $p_artikel_beschreibung=null;
        }
        if($p_online_bild==null||$p_online_bild==""||$p_online_bild=="undefined"||$p_online_bild=="null"){
            $p_online_bild=null;
        }
        if($p_online_farbe==null||$p_online_farbe==""||$p_online_farbe=="undefined"||$p_online_farbe=="null"){
            $p_online_farbe=null;
        }

        if($p_plu==null||$p_plu==""||$p_plu=="undefined"||$p_plu=="null"||$this->check_plu($p_plu)==true){
          $p_plu=$old_plu;
        }
        $sql=<<<EOF
		UPDATE   Artikel_Online set PLU='$p_plu',Name='$p_name',Preis1='$p_preis1',Preis2='$p_preis2',Preis3='$p_preis3',Beilage='$p_beilage',Artikel_Name='$p_artikel_name',Artikel_Beschreibung='$p_artikel_beschreibung',Online_Gruppe='$p_online_gruppe',Online_Bild='$p_online_bild',Online_Farbe='$p_online_farbe' where PLU='$old_plu'
EOF;
        $result=$this->query($sql);
        return true;
    }
    //aad product
    function addProduct($p_plu,$p_name,$p_preis1,$p_preis2,$p_preis3,$p_beilage,$p_artikel_name,$p_artikel_beschreibung,$p_online_gruppe,$p_online_bild,$p_online_farbe){
        if($p_name==null||$p_name==""||$p_name=="undefined"||$p_name=="null"){
            $p_name=null;
        }
        if($p_preis1==null||$p_preis1==""||$p_preis1=="undefined"||$p_preis1=="null"){
            $p_preis1=null;
        }
        if($p_preis2==null||$p_preis2==""||$p_preis2=="undefined"||$p_preis2=="null"){
            $p_preis2=null;
        }
        if($p_preis3==null||$p_preis3==""||$p_preis3=="undefined"||$p_preis3=="null"){
            $p_preis3=null;
        }
        if($p_beilage==null||$p_beilage==""||$p_beilage=="undefined"||$p_beilage=="null"){
            $p_beilage=null;
        }
        if($p_artikel_name==null||$p_artikel_name==""||$p_artikel_name=="undefined"||$p_artikel_name=="null"){
            $p_artikel_name=null;
        }
        if($p_artikel_beschreibung==null||$p_artikel_beschreibung==""||$p_artikel_beschreibung=="undefined"||$p_artikel_beschreibung=="null"){
            $p_artikel_beschreibung=null;
        }
        if($p_online_bild==null||$p_online_bild==""||$p_online_bild=="undefined"||$p_online_bild=="null"){
            $p_online_bild=null;
        }
        if($p_online_farbe==null||$p_online_farbe==""||$p_online_farbe=="undefined"||$p_online_farbe=="null"){
            $p_online_farbe=null;
        }

        if($p_plu==null||$p_plu==""||$p_plu=="undefined"||$p_plu=="null"||$this->check_plu($p_plu)==true){
            $sql_plu=<<<EOF
		SELECT  max(PLU) as id from Artikel_Online
EOF;
            $result_plu=$this->query($sql_plu);
            while($row = $result_plu->fetchArray(SQLITE3_ASSOC) ){
                $p_plu= $row['id']+1;
            }
        }
        $sql=<<<EOF
		INSERT into  Artikel_Online (PLU,Name,Preis1,Preis2,Preis3,Beilage,Artikel_Name,Artikel_Beschreibung,Online_Gruppe,Online_Bild,Online_Farbe) values ('$p_plu','$p_name','$p_preis1','$p_preis2','$p_preis3','$p_beilage','$p_artikel_name','$p_artikel_beschreibung','$p_online_gruppe','$p_online_bild','$p_online_farbe');
EOF;
        $result=$this->query($sql);
        return true;
    }

    //check PLU
    function check_plu($plu){
        $sql_plu=<<<EOF
		SELECT  PLU from Artikel_Online where PLU='$plu'
EOF;
        $result_plu=$this->query($sql_plu);
        if($row = $result_plu->fetchArray(SQLITE3_ASSOC)){
            return true;
        }else{
            return false;
        }
    }

    //lay tat ca cac mon
    function all_products($search){
        if($search==null||$search==""||$search=="undefined"||$search=="null"){
            $sql=<<<EOF
		SELECT * from Artikel_Online
EOF;
            $ar=array();
            $result=$this->query($sql);
            while($row = $result->fetchArray(SQLITE3_ASSOC) ){
                $ar[]=$row;
            }
        }else{
            $sql=<<<EOF
		SELECT * from Artikel_Online where Online_Gruppe='$search'
EOF;
            $ar=array();
            $result=$this->query($sql);
            while($row = $result->fetchArray(SQLITE3_ASSOC) ){
                $ar[]=$row;
            }
        }


        return $ar;
    }

    //lay toan bo settings//
    function getSettings($search){
        if($search==null||$search==""||$search=="undefined"||$search=="null"){
            $sql=<<<EOF
		SELECT `Id`,`Name`,`Key`,`Value`,`description` FROM `Settings_Online` 
EOF;
        }else{
            $sql=<<<EOF
		SELECT `Id`,`Name`,`Key`,`Value` FROM `Settings_Online` where `Name`='$search'
EOF;
        }


        $result=$this->query($sql);
        while($row = $result->fetchArray(SQLITE3_ASSOC) ){
            $ar[]=$row;
        }

        return $ar;
    }
    function getNameSettings(){

        $sql=<<<EOF
		SELECT DISTINCT Name FROM Settings_Online;
EOF;

        $result=$this->query($sql);
        while($row = $result->fetchArray(SQLITE3_ASSOC) ){
            $ar[]=$row;
        }

        return $ar;
    }

    function editSetting($id,$key,$value,$description){
        if($key==null||$key==""||$key=="undefined"||$key=="null"){
            $key=null;
        }
        if($value==null||$value==""||$value=="undefined"||$value=="null"){
            $value=null;
        }

        if($description==null||$description==""||$description=="undefined"||$description=="null"){
            $description=null;
        }

        $sql=<<<EOF
		UPDATE  Settings_Online set Key='$key',Value='$value',description='$description'  where Id ='$id'
EOF;
        $result=$this->query($sql);




        return true;
    }
    function editLogo($id,$value){

        if($value==null||$value==""||$value=="undefined"||$value=="null"){
            $value=null;
        }



        $sql=<<<EOF
		UPDATE  Settings_Online set Value='$value' where Id ='$id'
EOF;
        $result=$this->query($sql);




        return true;
    }

    function saveNewSetting($name,$key,$value,$description){
        if($name==null||$name==""||$name=="undefined"||$name=="null"){
            $name=null;
        }
        if($key==null||$key==""||$key=="undefined"||$key=="null"){
            $key=null;
        }
        if($value==null||$value==""||$value=="undefined"||$value=="null"){
            $value=null;
        }

        if($description==null||$description==""||$description=="undefined"||$description=="null"){
            $description=null;
        }

        $sql=<<<EOF
		INSERT into  Settings_Online (Id,Name,Key,Value,description) values (null,'$name','$key','$value','$description')
EOF;
        $result=$this->query($sql);




        return true;
    }




}
