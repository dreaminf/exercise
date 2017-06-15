<!-- function.php -->
<?php 
/**
	 * 斐波那契数列 传入位数，返回数值
	 * p $num
	 */
function fbnq($num){
	$before=1;
	$after=1;
	if($num==1||$num==2){
		return 1;
	}else{
		for($i=0;$i<=$num-3;$i++){
			$sum=$before+$after;
			$before=$after;
			$after=$sum;
		}
		return $sum;
	}
}
echo fbnq(30);

/**
 * indexOf
 * 传入数组及要查找的值
 * 返回值对应的位置，返回类型是数组
 */
$arr_=[1,2,3,3,4,4,5,5,6,6,677,6];
function indexOf($arr,$value){
	if(in_array($value,$arr)){
		$index=[];
		foreach ($arr as $key => $v) {
			if($value===$v){
				$index[]=$key;
			}
		}
		return $index;
	}
	return false;	
}
var_dump(indexOf($arr_,6));

 ?>