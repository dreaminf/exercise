// ajax.js
//创建XMLHTTPREQUEST对象
function creatXMLHTTPRequest(){
	var xhr;
	//如果浏览器支持 XMLHTTPREQUEST对象，直接创建
	if(window.XMLHttpRequest){
		xhr=new XMLHttpRequest();
		//如果浏览器为IE，尝试通过ActivexObject对象进行创建
		//传入的两个参数为版本参数
	}else if(window.ActiveXObject){
		var activexName=[
			"MSXML2.XMLHTTP",
			"Miscrosoft.XMLHTTP"
		];	
		for(var i=0;i<activexName.length;i++){
			xhr=new ActiveXObject(activexName[i]);
			if(xhr){
				break;
			}
		}
	}
	return xhr;//返回创建完成的XMLHttpRequest 对象
}