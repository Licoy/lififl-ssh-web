<?php
function saveFile($fileName, $text) {
	if (!$fileName || !$text)return false;
	if (makeDir(dirname($fileName))) {
		if ($fp = fopen($fileName, "w")) {
			if (@fwrite($fp, $text)) {
				fclose($fp);
				return true;
			}else{
				fclose($fp);
				return false;
			} 
		} 
	} 
	return false;
}
function makeDir($dir, $mode = "0777") {
	if (!$dir) return false;
		if(!file_exists($dir)) {
			return mkdir($dir,$mode,true);
		} else {
			return true;
		}
}
function gravatar($email){
	$str="https://secure.gravatar.com/avatar/".md5($eamil);
	return $str;
}
function explodeIpStr($str){
	$arr=explode(".",$str);
	//var_dump($arr);
	$ipStr=$arr[0].".".$arr[1].".***.".$arr[3];
	return $ipStr;
	
}

function comi(){
	$english = array(1,2,3,4,5,6,7,8,9,'A','B','C','D','E','F','G','H','I','J','K','L','M',
			'N','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h',
			'j','k','m','n','p','q','r','s','t','u','v','w','x','y','z');
		@$rand=rand(1,61);
		@$rand2=rand(1,61);
		@$rand3=rand(1,61);
		@$rand4=rand(1,61);
		@$rand5=rand(1,61);
		@$str=$english[$rand].$english[$rand2].$english[$rand3].$english[$rand4].$english[$rand5];
		@$strmd5=md5($str).md5($str);
		@$strmd5=md5($strmd5);
		echo md5($strmd5);
}

function vsum(){
	$f=array("+","-","×");
	$rand1=rand(1,10);
	$rand2=rand(1,10);
	$randf=rand(0,2);
	$randf=$f[$randf];
	$suan=$rand1.$randf.$rand2;
	switch($randf){
		case "+":$resu=$rand1+$rand2;break;
		case "-":$resu=$rand1-$rand2;break;
		case "×":$resu=$rand1*$rand2;break;
	}
	return array($suan,$resu);
}
function loading($xhrname){
	$str='if('.$xhrname.'.readyState != 4){
			if('.$xhrname.'.readyState==0)
			myTips("请稍等，加载中！","loading");
			else if('.$xhrname.'.readyState==1){
				$("#ui-mask").remove();
				$("#change_loading").remove();
				myTips("请稍等，加载中！","loading");
			}
			else if('.$xhrname.'.readyState==2){
				$("#ui-mask").remove();
				$("#change_loading").remove();
				myTips("请稍等，加载中！","loading");
			}
			else if('.$xhrname.'.readyState==3){
				$("#ui-mask").remove();
				$("#change_loading").remove();
				myTips("请稍等，加载中！","loading");
			}						
		}';
		return $str;
}
?>