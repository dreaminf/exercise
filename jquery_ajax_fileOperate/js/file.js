document.getElementById("btn").onclick=function(){
	file_upload_form.img.click();
}

$("#fileup").change(function(){
	var formdata=new FormData(file_upload_form); //文件上传的数据对象
	$.ajax({
		url:"../php/upload.php",
		beforeSend:function(xhr){
			console.log("准备发送！");
		},
		complete:function(xhr){
			console.log("发送了1");
		},
		contentType:false,
		data:formdata,
		dataType:"json",
		error:function(){
			console.log("aaa");
		},
		processData:false,
		success:function(data){
			console.log(data);
			if(data.code != 200){
				$("h6").html(data.msg);
				$("h6").css({"color":"red"});
				console.log(data.msg);

			}else{
				$("h6").html(data.msg);
				$("h6").css({"color":"green"});
				console.log(data.msg);
				$("img").attr("src",data.path);
				$("img").css({"outline":"1px solid red"});
			}
		},
		// timeout:2000,
		type:"post",
		xhr:function(){
			var obj=new XMLHttpRequest();
			obj.upload.onprogress=function(e){
				if(e.lengthComputable){
					$("span").html(parseInt((e.loaded/e.total)*100)+"%");
					// $("span").html((((e.loaded/e.total)*100).toFixed(2))+"%");
					//Number对象的toFixed()方法 括号内传入要保留的小数点位数
					$("progress").val((e.loaded/e.total)*100);
				}
			}
			return obj;
		}
	});
})

console.log(new FormData());