
// 随机颜色函数
function rc(){
	var str = "#";
	for(var i=0;i<6;i++){
		var r =parseInt(Math.random()*16);
		str += r.toString(16);
	}
	return str;
}



// aXb随机框，不同随机颜色函数，内调用随机颜色函数
function randomRect(a,b){
	var arr3=new Array(a);
	document.write("<div style='width:"+a+"00px;height:"+b+"00px'>");
	for(var i=0;i<arr3.length;i++){
		arr3[i]=new Array(b);
		for(var j=0;j<arr3[i].length;j++){
			   arr3[i][j]=rc();
			   document.write('<div style="width:100px;height:100px;float:left;background:'+arr3[i][j]
			   	+'"></div>');
		}
	}
	document.write("</div>");

}



// 老师写的随机randomPhone--函数

		function randomPhone(){
			var PhoneStr="1";
			do{
				var arr=[3,4,5,7,8];
				var arrlen=parseInt(Math.random()*arr.length);
				PhoneStr+=arr[arrlen];
				var r=parseInt(Math.random()*10);
				PhoneStr +=r;
			}while (!/^1[34578]\d{9}$/.test(PhoneStr));
		
			console.log(PhoneStr);
			return PhoneStr;
		}




	// //判断质数函数
		function isZhishu(num){
			var count=0;
			if(num>1){
				for(var i=num;i>0;i--){

					if(num%i==0){count++};
				}

				if(count==2){
					return true;
				}else{
						return false;
				}

			}else{
				return false;
			}
		}


//不规整二维数组去重
var arr=[1,2,4,4,5,6,4,[5,8,6,7,8,8,9,9,4,0,4,8,9,9,8,9,9,8,8,9]];
Array.prototype.removeRepeatElementArr=function(){
	for(var i=0;i<this.length;i++){
		if(Array.isArray(this[i])){
			for(var j=0;j<this[i].length;j++){
				//元素是数组内元素与元素之间的比较，不能重复
				if(this.indexOf(this[i][j])!=-1){
					this[i].splice(j,1);
					j--;

				}else{
					//判断元素是数组内的元素不能重复
					for(var k=j+1;k<this[i].length;k++){
						if(this[i][j]==this[i][k]){
							this[i].splice(k,1);
							k--;
						}	
					}
							
				}
						
			}
		}else{
			for(var j=i+1;j<this.length;j++){
				//元素不是数组的内的去重
				if(this[j]==this[i]){
					this.splice(j,1);
					i--;
				}

			}
					
		}
	}
	return this;
}
console.log(arr.removeRepeatElementArr());

//一维数组去重
// 数组去重，先排序后比较
Array.prototype.unique1= function () {
    var temp = new Array();
    this.sort(); //否则非相邻重复的去不掉
    for(var i = 0; i < this.length; i++) {
        if( this[i] == this[i+1]) {
            continue;
        }
         temp[temp.length]=this[i];
    }
    return temp;
}
// 数组去重 splice()方法使用
var arr=[7,3,3,6,7,7,9,10];
Array.prototype.unique=function(){
  	for(var i=0;i<this.length;i++){
  		for(var j=i+1;j<this.length;j++){
  			if(this[j]==this[i]){
  				this.splice(j,1);
  				j--;
  			}
  		}
  	}
  	return this;
}



//统计字符串重复出现的字符的次数
	String.prototype.tjCount=function(){
		var map={};
		for(var i=0;i<this.length;i++){
			var s=this[i];
			var r=map[s];
			// console.log(r);
			if(r){
				map[s]+=1;
			}else{
				map[s]=1;
			}
		}
		return map;
	}
	console.log(a.tjCount());