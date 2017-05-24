<?php if(!defined('SECURITY')) exit('404 - Not Access');

class Cart extends MyDB {

	//thêm sản phẩm ko có ăn kèm
	function add_cart(){
		if(!isset($_SESSION['arrSP'])) {
        	$_SESSION['arrSP']= array();
      	}
		$idSP=$_POST['idSP'];	
		if(isset($_SESSION['arrSP'][$idSP])){
			$rows=$_SESSION['arrSP'][$idSP];
			$qty=$rows['qty'] + 1 ;
			if(isset($_POST['note'])){
				$note=addslashes(trim(strip_tags($_POST['note'])));
			}
			else{
				$note=$rows['note'];
			}
			if(isset($rows['Beilage'])==false){
				$_SESSION['arrSP']["$idSP"]=array(
					'idSP' =>$idSP,
					'name'=>$rows['name'],
					'price'=>$rows['price'],
					'qty'=>$qty,
					'note'=>$note,
					'plu'=>$rows['plu']
				);
			}
			else{
				$_SESSION['arrSP']["$idSP"]= array(
					'idSP' =>$idSP,
					'name'=>$rows['name'],
					'price'=>$rows['price'],
					'price_notbei'=>$rows['price_notbei'],
					'qty'=>$qty,
					'Beilage'=>$rows['Beilage'],
					'note'=>$note,
					'plu'=>$rows['plu'],
					'stt_bei'=>$rows['stt_bei']
				);
			}	
		}
		else{
			$sql=<<<EOF
			SELECT PLU,Name,Preis1,Beilage FROM Artikel_Online where PLU='$idSP';
EOF;
			$note=addslashes(trim(strip_tags($_POST['note'])));
			$result=$this->query($sql);
			$row = $result->fetchArray(SQLITE3_ASSOC);
			$_SESSION['arrSP']["$idSP"]=array(
				'idSP' =>$idSP,
				'name'=>$row['Name'],
				'price'=>$row['Preis1'],
				'qty'=>1,
				'note'=>$note,
				'plu'=>$idSP
			);
		}
		 
		$this->total_dishis();
		return $this->total_cart();		
	}

	//tính tổng tiền
	function total_cart(){
		$total=0;
		foreach ($_SESSION['arrSP'] as $row) {
			$total +=$row['price']*$row['qty'];
		}
		
		$_SESSION['total']=$total;
		return $total;
	}

	//tổng sản phẩm
	function total_dishis(){
		$total=0;
		foreach ($_SESSION['arrSP'] as $row) {
			$total +=$row['qty'];
		}
		$_SESSION['total_dishis']=$total;
		return $total;
	}

	//lấy số lượng sản phẩm theo IDSP
	function qtyId(){
		if(isset($_POST['idSP'])){
			$idSP=$_POST['idSP'];
			$qty=0;
			foreach ($_SESSION['arrSP'] as $row) {
				if($idSP==$row['idSP']){
					$qty=$row['qty'];
				}
			}
			return $qty;
		}
	}

	//xoa san pham
	function delete(){
		$idSP=$_POST['idSP'];
		$qty=0;
		//	foreach ($_SESSION['arrSP'] as $rows) {
		if(isset($_SESSION['arrSP'][$idSP])){
			$rows=$_SESSION['arrSP'][$idSP];
			$qty=$rows['qty'] - 1 ;
			if($qty >0){
				//if(isset($rows['Beilage'])==false){
					$_SESSION['arrSP']["$idSP"]['qty']= $qty;/*array(
						'idSP' =>$idSP,
						'name'=>$rows['name'],
						'price'=>$rows['price'],
						'qty'=>$qty,
						'note'=>$rows['note']
					);*/
				/*}
				else {
					$_SESSION['arrSP']["$idSP"]=array(
						'idSP' =>$idSP,
						'name'=>$rows['name'],
						'price'=>$rows['price'],
						'qty'=>$qty,
						'Beilage'=>$rows['Beilage'],
						'note'=>$rows['note']
					);
				}*/
			}
			else { unset($_SESSION['arrSP']["$idSP"]);}
		}

		$this->total_dishis();
		return $this->total_cart();		
	}

	//thêm sản phẩm  có ăn kèm cua web,cai nay se hien tung mon an them
	function add_cart_beilage_w($idSP,$idSPs,$prices_w,$beilage_w,$plu,$note,$stt_bei){
		if(!isset($_SESSION['arrSP'])) {
        	$_SESSION['arrSP']= array();
      	}
		if(isset($_SESSION['arrSP'][$idSP])){
			$rows=$_SESSION['arrSP'][$idSP];
			$qty=$rows['qty'] + 1 ;
			if(isset($_SESSION['qtySP'])){
				$qty=$_SESSION['qtySP'] + $rows['qty'] ;
			}
			$_SESSION['arrSP']["$idSP"]=array(
				'idSP' =>$idSP,
				'name'=>$rows['name'],
				'price'=>$rows['price'],
				'price_notbei'=>$rows['price_notbei'],
				'qty'=>$qty,
				"Beilage"=>$beilage_w,
				'note'=>$note,
				'plu'=>$plu,
				'stt_bei'=>$stt_bei
			);
		}
		else{
			$sql=<<<EOF
				SELECT PLU,Name,Preis1,Beilage FROM Artikel_Online where PLU='$idSPs';
EOF;
			$result=$this->query($sql);
			$row=$result->fetchArray(SQLITE3_ASSOC);
			if(isset($_SESSION['qtySP'])){
				$qty=$_SESSION['qtySP'];
			}
			$_SESSION['arrSP']["$idSP"]=array(
				'idSP' =>$idSP,
				'name'=>$row['Name'],
				'price'=>$row['Preis1']+$prices_w,
				'price_notbei'=>$row['Preis1'],
				'qty'=>1,
				"Beilage"=>$beilage_w,
				'note'=>$note,
				'plu'=>$plu,
				'stt_bei'=>$stt_bei
			);
		}

		$this->total_dishis();
		return $this->total_cart();		
	}


	//xoa  san pham khi edit
	function delete_idSPw($idSP){
		$qty=$_SESSION['arrSP']["$idSP"]['qty'];
		$_SESSION['qtySP']=$qty;
		unset($_SESSION['arrSP']["$idSP"]);
		$this->total_dishis();
		return $this->total_cart();
	}

	//xoá giỏ hàng
	function unsetCart(){
		unset($_SESSION['arrSP']);
		$this->total_cart();
		$this->total_dishis();
		
	}


}

 ?>