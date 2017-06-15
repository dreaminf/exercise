// canvasboard.js

var canvas=document.getElementById("canvas");
var ctx=canvas.getContext("2d");
var color=document.getElementById("color");
var select=document.getElementById("select");
var flag=false; //状态鼠标按下时为true
var imgDate; //存储的数据
var erX,erY,CX,CY,E2X,E2Y;

select.onchange=function(){
	ctx.lineWidth=this.value;
	pen=this.value;
} 
color.onchange=function(){
	ctx.strokeStyle=this.value;
	ctx.fillStyle=this.value;
}
// 橡皮擦
function eraserout(SX,SY){
	ctx.beginPath();
	ctx.clearRect(SX,SY,10,10);
	ctx.closePath();
	ctx.stroke();
}

//画板清空
function clearPIC(){
	ctx.clearRect(0,0,canvas.width,canvas.height);
}
//画直线
function drawline(SX,SY,EX,EY){
	ctx.clearRect(0,0,canvas.width,canvas.height);
	ctx.putImageData(imgDate,0,0);
	ctx.beginPath();
	ctx.moveTo(SX,SY);
	ctx.lineTo(EX,EY);
	ctx.closePath();
	ctx.stroke();
}

//画空心圆
function drawCircleline(CX,CY,R){
		
	ctx.clearRect(0,0,canvas.width,canvas.height);
	ctx.putImageData(imgDate,0,0);
	ctx.beginPath();
	ctx.arc(CX,CY,R,0,2*Math.PI);
	ctx.closePath();
	ctx.stroke();	
}
// 画实心圆
function drawCirclemap(CX,CY,R){
	ctx.clearRect(0,0,canvas.width,canvas.height);
	ctx.putImageData(imgDate,0,0);
	ctx.beginPath();
	ctx.arc(CX,CY,R,0,2*Math.PI);
	ctx.closePath();
	ctx.fill();
}
//画矩形，描边型
function drawRectline(SX,SY,W,H){
	ctx.clearRect(0,0,canvas.width,canvas.height);
	ctx.putImageData(imgDate,0,0);
	ctx.beginPath();
	ctx.strokeRect(SX,SY,W,H);
	ctx.closePath();
}
//画矩形，填充型
function drawRectmap(SX,SY,W,H){
	ctx.clearRect(0,0,canvas.width,canvas.height);
	ctx.putImageData(imgDate,0,0);
	ctx.beginPath();
	ctx.fillRect(SX,SY,W,H);
	ctx.closePath();
}
//画等腰三角形 
function drawTriangle(W,H,SY,EX,EY){
	ctx.clearRect(0,0,canvas.width,canvas.height);
	ctx.putImageData(imgDate,0,0);
	ctx.beginPath();
	ctx.moveTo(W/2,SY)
	ctx.lineTo(H,EY);
	ctx.lineTo(EX,EY);
	ctx.closePath();
	ctx.stroke();
}
// 画二次贝塞尔曲线
function drawercicurve(SX,SY,CX,CY,E1X,E1Y){
	ctx.clearRect(0,0,canvas.width,canvas.height);
	ctx.putImageData(imgDate,0,0);
	ctx.beginPath();
	ctx.moveTo(SX,SY);
	ctx.quadraticCurveTo(CX,CY,E1X,E1Y);
	ctx.stroke();
	ctx.closePath();				
}
//画三次贝塞尔
function drawsancicurve(SX,SY,C1X,C1Y,E2X,E2Y,DX,DY){
	ctx.clearRect(0,0,canvas.width,canvas.height);
	ctx.putImageData(imgDate,0,0);
	ctx.beginPath();
	ctx.moveTo(SX,SY);
	ctx.bezierCurveTo(CX,CY,E2X,E2Y,DX,DY);
	ctx.stroke();
	ctx.closePath();	
}


// 画图形状的状态值
function drawstate(state){
	var allshapstate=iner_shap.querySelectorAll("span");
	var alltools=tools.querySelectorAll("span");
	for(var i=0;i<allshapstate.length;i++){
		allshapstate[i].value="0";
	}
	for(var j=0;j<alltools.length;j++){
		alltools[j].value="0";
	}
	state.value="1";
}

canvas.onmousedown=function(e){
	canvas.style.cursor="crosshair";
	flag=true;
	imgDate=ctx.getImageData(0,0,canvas.width,canvas.height);
	var SX=e.clientX-canvas.offsetLeft;
	var SY=e.clientY-canvas.offsetTop;
		erX=e.clientX-canvas.offsetLeft;
		erY=e.clientY-canvas.offsetTop;
		console.log(erX,erY);
		if(pencil.value==1){
				//铅笔
				ctx.beginPath();
				ctx.moveTo(SX,SY);
			}

	canvas.onmousemove=function(e1){
		if(flag){
			//线的结束坐标
			var EX=e1.clientX-canvas.offsetLeft;
			var EY=e1.clientY-canvas.offsetTop;

			//求圆的半径
			var RW=Math.abs((e1.clientX-canvas.offsetLeft)-SX),
				RH=Math.abs((e1.clientY-canvas.offsetTop)-SY),
				x=Math.pow(RW,2)+Math.pow(RH,2);
			var R=Math.ceil(Math.sqrt(x));//圆的半径
			//矩形
			var W=Math.abs((e1.clientX-canvas.offsetLeft)-SX);
			var H=Math.abs((e1.clientY-canvas.offsetTop)-SY);
			// 橡皮擦
			if(eraser.value==1){
				canvas.style.cursor="url(../images/eraser333.cur),auto";
				eraserout(EX,EY);
			}
			// 铅笔
			if(pencil.value==1){
				ctx.lineTo(EX,EY);
				ctx.stroke();
			}
			// 直线
			if(line.value==1){
				drawline(SX,SY,EX,EY);
			}
					 	
			//二次曲线
			if(ercicurve.value==1){
				if(e1.ctrlKey==1){
					console.log("111");
					CX=e1.clientX-canvas.offsetLeft;
					CY=e1.clientY-canvas.offsetTop;
					console.log(CX,CY);
				}
				if(e1.shiftKey==1){
				console.log("122");
				var  E1X=e1.clientX-canvas.offsetLeft;
				var  E1Y=e1.clientY-canvas.offsetTop;
				console.log(E1X,E1Y);
				drawercicurve(erX,erY,CX,CY,E1X,E1Y);
				}
			}

			// 三次贝塞尔
			if(sancicurve.value==1){
				if(e1.ctrlKey==1){
					console.log("111");
					CX=e1.clientX-canvas.offsetLeft;
					CY=e1.clientY-canvas.offsetTop;
					console.log(CX,CY);
				}
				if(e1.shiftKey==1){
					console.log("122");
					E2X=e1.clientX-canvas.offsetLeft;
					E2Y=e1.clientY-canvas.offsetTop;
					console.log(E1X,E1Y);

				}
				if(e1.altKey==1){
					var DX=e1.clientX-canvas.offsetLeft;
					var DY=e1.clientY-canvas.offsetTop;
					console.log(DX,DY);
					drawsancicurve(SX,SY,CX,CY,E2X,E2Y,DX,DY);
				}


			}

			//空心圆
			if(circle.value==1){
				drawCircleline(SX,SY,R);
			}
			//实心圆
			if(roundmap.value==1){
				drawCirclemap(SX,SY,R);
			}
			//矩形
			if(rectline.value==1){
				drawRectline(SX,SY,W,H);
			}
			//实心矩形
			if(rectmap.value==1){
				drawRectmap(SX,SY,W,H)
			}
			//三角形
			if(triangle.value==1){
				drawTriangle(W,H,SY,EX,EY);
			}
					 	
		}
	}
}
window.onmouseup=function(){
	flag=false;
}
