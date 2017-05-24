
<meta charset="utf-8">
<?php if(!defined('SECURITY')) exit('404 - Not Access');
$db=new MyDB();
	$sqls=<<<EOF
		DELETE FROM gruppe 
EOF;

	$runs= $db->exec($sqls);
	$rets = $db->query($sqls);
	if(!$runs) {
		echo "Error Database! Try Again!";
	}

	$line_text=file_get_contents("./db/ArtikelGrOL.txt");
	$res=explode("\n", $line_text);
	foreach($res as $row){
		$data[]=explode("¶¶¶", $row);
	}  	
	$count=count($data);
	for($i=0;$i<$count;$i++){
		if($i>0)
		{
			if(!isset($data[$i][2])){
				$re1=$data[$i][0];$re2=$data[$i][1];
				$sql=<<<EOF
					INSERT INTO gruppe(NameGruppe,IMG) VALUES('$re1','$re2');
EOF;
			}

			else {
				$re1=$data[$i][0];$re2=$data[$i][1];$re3=$data[$i][2];
				$sql=<<<EOF
					INSERT INTO gruppe(NameGruppe,IMG,COLOR) VALUES('$re1','$re2','$re3');
EOF;
			}
			$result = $db->exec($sql);
			if(!$result){
				echo $i."not successfully";
			}
		}

		
	}

$db->close();
 ?>