<?php
	//namespace Age;
	class Age_verify{
		protected $myage;
		protected $curr_date;
		protected $x_result="";
		public function __construct($age){
			$this->myage=$age;
			$this->curr_date=date('y-m-d');
		}
			//04-07-2020
			//10-08-1986
			//24-10-33
		public function func(){
			if($this->curr_date > $this->myage){
				$myage1=date_parse($this->myage);
				$y1=$myage1['year'];
				$m1=date('m',strtotime($this->myage));
				$d1=date('d',strtotime($this->myage));

				$currAge=date_parse($this->curr_date);
				$y2=$currAge['year'];
				$m2=date('m',strtotime($this->curr_date));
				$d2=date('d',strtotime($this->curr_date));
				if($d2 < $d1){

					$m2=$m2-1;
					if($m2==0){
						$y2=$y2-1;
						$m2=12;
					}
					$days="{$y2}-{$m2}-{$d2}";
					$d2=$d2+date('t',strtotime($days));
				}
				if($m2 < $m1){
					$y2=$y2-1;
					$m2=$m2+12;
				}
				if($y2 > $y1){
					$y=$y2-$y1;
					if($y<=1){
					$this->x_result.=$y.'year';
				}
				else{
					$this->x_result.=$y.'days';
				}
				}
				if($m2 > $m1){
					$m=$m2-$m1;
					if($m<=1){
					$this->x_result.=$m.'month';
				}
				else{
					$this->x_result.=$m.'months';
				}
				}
				if($d2 > $d1){
					$d=$d2-$d1;
					if($d<=1){
					$this->x_result.=$d.'day';
				}
				else{
					$this->x_result.=$d.'days';
				}
				}
				return $this->x_result;
			}
			else{
				throw new Exception("not age properly write :y-m-d and you write {$this->myage}");
			}
		}

	}
	try{
		$obj=new Age_verify('hello');
		echo $obj->func();
	}
	catch (Exception $e){
		echo "Error: ".$e->getMessage();
	}
	


?>
