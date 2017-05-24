<?php if(!defined('SECURITY')) exit('404 - Not Access');
Class All extends MyDB{

	//lay ten cac nhom mon an
	function getNameGruppe(){
			
		$sql=<<<EOF
		SELECT `Online_Gruppe_Name`,`Online_Gruppe_ID` FROM `Gruppe_Online`
EOF;
		$result=$this->query($sql);
		 while($row = $result->fetchArray(SQLITE3_ASSOC) ){
		 		$ar[]=$row;
		 }	

		return $ar;
	}

	//lay cac mon an theo nhom mon an
	function getDishes($NameGruppe){
		$sql=<<<EOF
		SELECT PLU,Name,Online_Gruppe_Name,Preis1,Artikel_Beschreibung,Beilage from Artikel_Online,Gruppe_Online where Online_Gruppe='$NameGruppe' and Online_Gruppe_ID='$NameGruppe'
EOF;
		$result=$this->query($sql);
		 while($row = $result->fetchArray(SQLITE3_ASSOC) ){
		 		$ar[]=$row;
		 }
		return $ar;
	}
}
 ?>