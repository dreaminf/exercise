var updatecheck=document.querySelectorAll(".ucheck");
var uspan=document.querySelectorAll("form>span");
var default_tel=utel.value;
var default_email=uemail.value;
console.log(default_tel,default_email);
function jsupdateCheck(){
	var Regphonenum=/^1[34578]\d{9}$/;//手机号码
	var Regemail=/@\w{2,10}(\.com|\.cn|\.com\.cn)/; //邮箱验证
	if(!Regphonenum.test(utel.value)){
		uspan[0].innerHTML="手机号码不正确！";
		uspan[0].style.background="red";
		return;
	}else{
		uspan[0].innerHTML="&radic;";
		uspan[0].style.background="green";
	}
	if(!Regemail.test(uemail.value)){
		uspan[1].innerHTML="邮箱格式不正确!";
		uspan[1].style.background="red";
		return;
	}else{
		uspan[1].innerHTML="&radic;";
		uspan[1].style.background="green";
	}
	return flag=true;//全部验证通过时
}


	// for(var i=0;i<updatecheck.length;i++){
	// 	updatecheck[i].onchange =function(){
	// 		if(jsupdateCheck()){
	// 			flag=false;
	// 			update.disabled=false;
	// 		}else{
	// 			update.disabled=true;
	// 		}
	// 	}
	// }
updatecheck[0].onblur=function(){
	if(this.value==default_tel){
		uspan[0].innerHTML="手机号码未修改！";
		uspan[0].style.background="red";
		update.disabled=true;
		return;
	}
	if(uemail.value==default_email){
		uspan[1].innerHTML="邮箱未修改！";
		uspan[1].style.background="red";
		update.disabled=true;
		return;
	}
	if(jsupdateCheck()){
		flag=false;
		update.disabled=false;
	}else{
		update.disabled=true;
	}
}
updatecheck[1].onblur=function(){
	if(this.value==default_email){
		uspan[1].innerHTML="邮箱未修改！";
		uspan[1].style.background="red";
		update.disabled=true;
		return;
	}
	if(utel.value==default_tel){
		uspan[0].innerHTML="手机号码未修改！";
		uspan[0].style.background="red";
		update.disabled=true;
		return;
	}
	if(jsupdateCheck()){
		flag=false;
		update.disabled=false;
	}else{
		update.disabled=true;
	}
}

