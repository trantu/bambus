<?php
# Connect Database Sqlite3
class MyDB2 extends SQLite3
{
    function __construct()
    {
        $this->open('db/ArtikelOL.db3');
    }
}

Class settings extends MyDB2 {

    //lay ten cac nhom mon an
    function getSettings(){

        $sql=<<<EOF
		SELECT * from Settings_Online
EOF;
        $result=$this->query($sql);
        while($row = $result->fetchArray(SQLITE3_ASSOC) ){
            $ar[]=$row;
        }

        return $ar;
    }




}
