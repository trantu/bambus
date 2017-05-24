<meta charset="utf-8">
<?php if(!defined('SECURITY')) exit('404 - Not Access');
$db = new MyDB();
   	$sqls=<<<EOF
				DELETE  FROM products
EOF;
		 $rets = $db->exec($sqls);
		 $rets = $db->query($sqls);
	$line_of_text =file_get_contents("db/ArtikelOL.txt");
	$text=str_replace('---','',$line_of_text);
	$text_array = explode("\n",$text);
	foreach ($text_array as $row) {
		$data[]=explode("¶¶¶",$row);		
	}
	$count=count($data);
	for($i=0;$i<$count;$i++){
		if($i>0)
		{	
			if(!isset($data[$i][7]))
			{	 
				$re1=$data[$i][0];$re2=$data[$i][1];$re3=str_replace(",",".",$data[$i][2]);$re4=$data[$i][4];$re5=$data[$i][3];$re6=$data[$i][5];
				$re7=$data[$i][6];
			$sql =<<<EOF
		      INSERT INTO products (PLU,Name,PreisINNEN,Online_Beschreibung,Gruppe,IMG,COLOR) 
		      VALUES ('$re1','$re2','$re3','$re4',"$re5",'$re6','$re7');

EOF;
			}
			else
			{$re1=$data[$i][0];$re2=$data[$i][1];$re3=str_replace(",",".",$data[$i][3]);$re4=$data[$i][4];$re5=$data[$i][3];$re6=$data[$i][5];
				$re7=$data[$i][6];$re8=$data[$i][7];
							$sql =<<<EOF
		      INSERT INTO products (PLU,Name,PreisINNEN,Online_Beschreibung,Gruppe,IMG,COLOR,Beilage) 
			VALUES ('$re1','$re2','$re3','$re4',"$re5",'$re6','$re7','$re8');

EOF;

			}

		   $ret = $db->exec($sql);
		   if(!$ret){
		      echo $db->lastErrorMsg();
		   }
		   else {
		      echo "Records created successfully <br>";
		   }
		}
	} 	

	$db->close();


 ?>