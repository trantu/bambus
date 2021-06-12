<?php 
# Connect Database Sqlite3
if(!defined('SECURITY')) exit('404 - Not Access');
Class All extends MyDB {

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

	//lay cac mon an hien trang chu khi vao
	function getNameMain($dishis){
		$sql=<<<EOF
		SELECT PLU,Name,Online_Gruppe,Preis1,Artikel_Beschreibung,Beilage,Online_Bild,Online_Farbe from Artikel_Online where Online_Gruppe='$dishis' order by PLU
EOF;
		$result=$this->query($sql);
		 while($row = $result->fetchArray(SQLITE3_ASSOC) ){
		 		$ar[]=$row;
		 }
		return $ar;
	}

	//lay cac mon an theo nhom mon an
	function getDishes(){
		$NameGruppe=$_POST['namegruppe'];
		$sql=<<<EOF
		SELECT PLU,Name,Online_Gruppe_Name,Preis1,Artikel_Beschreibung,Beilage,Online_Bild,Online_Farbe from Artikel_Online,Gruppe_Online where Online_Gruppe='$NameGruppe' and Online_Gruppe_ID='$NameGruppe' order by PLU
EOF;
		$result=$this->query($sql);
		 while($row = $result->fetchArray(SQLITE3_ASSOC) ){
		 		$ar[]=$row;
		 }
		 
		return $ar;
	}

	// lay mon an kem cua 1 mon an */
	function getDishes_Dish($idSP){
		$sql=<<<EOF
		SELECT PLU,Name,Preis1,Artikel_Beschreibung,Beilage,Online_Bild from Artikel_Online where PLU="$idSP"
EOF;
		$result=$this->query($sql);
		$row = $result->fetchArray(SQLITE3_ASSOC);
		return $row;
	}


	//api lay cac mon an theo nhom mon an
	function api_getDishes($NameGruppe){
		$sql=<<<EOF
		SELECT PLU as id,Name as name,Preis1 as price,Beilage as adds,Online_Bild as image,Artikel_Beschreibung as description from Artikel_Online where Online_Gruppe='$NameGruppe' ORDER BY PLU ASC
EOF;
		$ar=array();
		$result=$this->query($sql);
		 while($row = $result->fetchArray(SQLITE3_ASSOC) ){
		 		$ar[]=$row;		
		 }
		 
		return $ar;
	}

    // Lay tat ca mon
    function api_getAllDishes(){
        $sql=<<<EOF
		SELECT PLU as id, Artikel_Name as name from Artikel_Online ORDER BY PLU ASC
EOF;
        $ar=array();
        $result=$this->query($sql);
        while($row = $result->fetchArray(SQLITE3_ASSOC) ){
            $ar[]=$row;
        }

        return $ar;
    }


}
