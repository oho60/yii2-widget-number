<?php
namespace oho\number;

 /* 
  * echo \oho60\number\Number::widget(['type'=>'thaiBaht','number'=>'123']);
 */
class Number extends \yii\bootstrap\Widget
{
	public $type='thaiBaht';
	public $number=0;
	
    public function init(){
        parent::init();

    }
	 public function run()
    {
    	switch ($this->type) {
    		case 'thaiBaht':
    			if($this->validate_numeric($this->number)){
    				return $this->bahtThai(number_format($this->number, 2, '.', '') );
    			}
    			return 0;
    		break;
    		default:
    			return 0;	
    	}
    }
    public function bahtThai($thb) {
  	 	list($thb, $ths) = explode('.', $thb);
   		$ths = substr($ths.'00', 0, 2);
   		$thaiNum = array('', 'หนึ่ง', 'สอง', 'สาม', 'สี่', 'ห้า', 'หก', 'เจ็ด', 'แปด', 'เก้า');
	   $unitBaht = array('บาท', 'สิบ', 'ร้อย', 'พัน', 'หมื่น', 'แสน', 'ล้าน', 'สิบ', 'ร้อย', 'พัน', 'หมื่น', 'แสน', 'ล้าน');
	   $unitSatang = array('สตางค์', 'สิบ');	
	   $THB = '';	
	   $j = 0;	
	   for ($i = strlen($thb) - 1; $i >= 0; $i--, $j++) {	
	    $num = $thb[$i];	
	    $tnum = $thaiNum[$num];	
	    $unit = $unitBaht[$j];	
	    switch (true) {	
	     case $j == 0 && $num == 1 && strlen($thb) > 1:
	      	$tnum = 'เอ็ด';
	      break;
	     case $j == 1 && $num == 1:
	      $tnum = '';
	      break;
	     case $j == 1 && $num == 2:
	      $tnum = 'ยี่';
	      break;
	     case $j == 6 && $num == 1 && strlen($thb) > 7:
	      $tnum = 'เอ็ด';
	      break;
	     case $j == 7 && $num == 1:
	      $tnum = '';
	      break;
	     case $j == 7 && $num == 2:
	      $tnum = 'ยี่';
	      break;
	     case $j != 0 && $j != 6 && $num == 0:
	      $unit = '';
	      break;
	    }
	    $S = $tnum.$unit;
	    $THB = $S.$THB;
	   }
	   if ($ths == '00') {
	    $THS = 'ถ้วน';
	   } else {
	    $j = 0;
	    $THS = '';
	    for ($i = strlen($ths) - 1; $i >= 0; $i--, $j++) {
	     $num = $ths[$i];
	     $tnum = $thaiNum[$num];
	     $unit = $unitSatang[$j];
	     switch (true) {
	      case $j == 0 && $num == 1 && strlen($ths) > 1:
	       $tnum = 'เอ็ด';
	       break;
	      case $j == 1 && $num == 1:
	       $tnum = '';
	       break;
	      case $j == 1 && $num == 2:
	       $tnum = 'ยี่';
	       break;
	      case $j != 0 && $j != 6 && $num == 0:
	       $unit = '';
	       break;
	     }
	     $S = $tnum.$unit;
	     $THS = $S.$THS;
	    }
	   }
	   return $THB.$THS;

  }
  function bahtThaiA($number){
  	$txtnum1 = array('ศูนย์','หนึ่ง','สอง','สาม','สี่','ห้า','หก','เจ็ด','แปด','เก้า','สิบ');
  	$txtnum2 = array('','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน');
  	$number = str_replace(",","",$number);
  	$number = str_replace(" ","",$number);
  	$number = str_replace("บาท","",$number);
  	$number = explode(".",$number);
  	if(sizeof($number)>2){
  		return 'ทศนิยมหลายตัวนะจ๊ะ';
  		exit;
  	}
  	$strlen = strlen($number[0]);
  	$convert = '';
  	for($i=0;$i<$strlen;$i++){
  		$n = substr($number[0], $i,1);
  		if($n!=0){
  			if($i==($strlen-1) AND $n==1){ $convert .= 'เอ็ด'; }
  			elseif($i==($strlen-2) AND $n==2){  $convert .= 'ยี่'; }
  			elseif($i==($strlen-2) AND $n==1){ $convert .= ''; }
  			else{ $convert .= $txtnum1[$n]; }
  			$convert .= $txtnum2[$strlen-$i-1];
  		}
  	}
  
  	$convert .= 'บาท';
  	if($number[1]=='0' OR $number[1]=='00' OR
  			$number[1]==''){
  		$convert .= 'ถ้วน';
  	}else{
  		$strlen = strlen($number[1]);
  		for($i=0;$i<$strlen;$i++){
  			$n = substr($number[1], $i,1);
  			if($n!=0){
  				if($i==($strlen-1) AND $n==1){$convert
  				.= 'เอ็ด';}
  				elseif($i==($strlen-2) AND
  						$n==2){$convert .= 'ยี่';}
  				elseif($i==($strlen-2) AND
  						$n==1){$convert .= '';}
  				else{ $convert .= $txtnum1[$n];}
  				$convert .= $txtnum2[$strlen-$i-1];
  			}
  		}
  		$convert .= 'สตางค์';
  	}
  	return $convert;
  }
  /* numeric, decimal passes */
  function validate_numeric($variable) {
  	return is_numeric($variable);
  }
  /*
   * ดึงตัวแปรจาห string รูปแกบบการ ดึง
   * $str = "{{input_amount@cash}}  เครดิดการ์ด1111 {{input_amount@xxx}} บาท ธนาคาร {{input_text@xx}}";
	$xx=Yii::$app->Booster->StingParams($str); 
   */
 public function StingParams($str,$regex= "/\{{(.*?)}}/",$arr=[]) { //"/\{{\w+@(\w+)\}}/"
  	preg_match($regex, $str, $matches);
  	if(count($matches)==0){
  		return $arr;
  	}elseif(!empty($matches[0])){
  		$key=str_replace('}}','',str_replace('{{','',$matches[0]));
  		$arr[$key]=$key;
  		$xx=str_replace($matches[0],"",$str);
  		return $this->StingParams($xx,$regex,$arr);
  
  	}
  
  }
}
