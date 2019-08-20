<!DOCTYPE html>
<html>
<head>
<style type="text/css">

.test
{
	text-align:center;
	//border: 2px solid green;
	
}
.marks
{
	font-family: "Arial";
}
.invi
{
	text-align:left;
	font-family: "Arial";
	padding: 15px;
	//border-radius: 30px;
	//margin: 10px;
	//box-shadow: 0px 10px 60px rgba(0,0,0,0.3);
	width:auto;
	margin:auto;		
	font-size:16px;
	//background:linear-gradient(to bottom,#2196F3 50px, white 50px, white);
}

.err
{
	font-family: "monospace";
	background:linear-gradient(to bottom,#777777,#555555 20px,black 20px,black);
	margin:10px;
	padding:10px 20px 0px 20px;
	color: #76FF03;
	font-weight:bold;
	border-radius:5px 5px 0px 0px;
	box-shadow: 0px 10px 30px rgba(0,0,0,0.25);
}

.failed
{
	text-align:center;
	padding: 10px;
	//background-color:rgba(255,100,100,0.5);
	border-radius: 5px;
}
.passed
{
	text-align:center;
	padding: 10px;
	//color:green;
	//background-color:rgba(150,255,150,1);
	border-radius: 5px;
}
.pass
{
	font-style: bold;
	margin: 10px;
	margin: auto;
	width: 15px;
	height: 15px;
	border-radius: 15px;
	color: green;
	font-size: 18px;
	font-family: "sans-serif";
	font-style: bold;
	text-align: center; 
	overflow: hidden; 
}
.wrong
{
	margin: 10px;
	margin: auto;
	width: 15px;
	height: 15px;
	border-radius: 15px;
	color: white;
	font-size: 12px;
	font-family: "sans-serif";
	background-color: red;
	text-align: center;
}
.time
{
	margin: 10px;
	margin: auto;
	width: 15px;
	height: 15px;
	border-radius: 15px;
	color: white;
	font-size: 9px;
	font-style: bold;
	font-family: "sans-serif";
	background-color: orange;
	text-align: center; 
	overflow: hidden; 
}
#table4 td 
{
    text-align:center;
    background-color:#f5f5f5;
   //border: 1px solid #ddd;
   border-collapse:collapse;
    //border-radius:10px;
    //outline: 2px solid red;
 	border-bottom: 2px solid #ffffff;
	margin: 5px;  
    
}

#table4 th
{
	background-color: #eeeeee;
	padding:15px;
	text-align: center;
  	border-bottom: 2px solid white;
}

#table4
{
	margin: auto;
	border-radius:5px 5px 0px 0px;
	//box-shadow: 0px 10px 60px rgba(0,0,0,0.5);
	border-collapse: collapse;
	text-align: center;
	//border: 2px solid red;
}
#table4 td:first-child{border-top-left-radius: 10px; border-bottom-left-radius: 10px;}
#table4 td:last-child{border-top-right-radius: 10px; border-bottom-right-radius: 10px;}
#table4 th:first-child{border-top-left-radius: 10px; border-bottom-left-radius: 10px;}
#table4 th:last-child{border-top-right-radius: 10px; border-bottom-right-radius: 10px;}
#table4.tr
{
border-radius:10px;
// background-color: #f0f0f0;
// border-radius: 10px; 
border-bottom: 2px solid white;
 padding: 2px;
 }
#table4.tr:hover {background-color:rgba(0,0,255	A,1); 	box-shadow: 0px 10px 30px rgba(0,0,0,0.25);}
//tr:nth-child(even) {background-color: #f2f2f2;}
.second
{
padding: 15px;
position: absolute;
right: 25px;
width: 43%;
top: 60%;
height: 30%;
overflow: scroll; 
background-color: white;
border-radius:15px;
box-shadow: 0px 10px 30px rgba(0,0,0,0.25);
}
body
		{
			background-color: #eeeeee;
			transition-duration: 0.25s;
			overflow: hidden;
		}
		.container
		{
			width: 30%;
			margin: auto;
			text-align: center;
		}
		.heading
		{
			font-size: 45px;
			font-family: "sans-serif";
			font-weight: 100;
			color: #000000;
			text-align: center;
			width: 100%;
			margin: auto;
			border-bottom: 1px solid grey;	

		}
		input[type=text]
		{
			font-size: 1.1em;
			width: 100%;
			padding: 0px;
			border-radius: 0px;
			border: none;
			border-bottom: 1px solid grey;
			/*box-shadow: 0px 2px 12px 1px rgba(0,0,0,0.5);*/
			background-color: rgba(255,255,255,0);
			transition-duration: 0.25s;
			margin: 0px 0px 0px 0px;
			color: black;
		}
		input:focus
		{
			outline: none;
			opacity: 1;
			border-bottom: 1px solid #5555FF;
			/*background-color: white;*/
		}
		input.file
		{

			background-color: blue;
		}
		label
		{
			opacity: 0;
		}
		.label
		{
			color: #aaaaaa;
			font-family: Helvetica;
			font-size: 16px;
			opacity: 1;

		}
		th
		{
			width: 100px;
			text-align: left;
			padding: 5px;
		}
		td
		{
			width: auto;/*
			height: 130px;*/
			//border: 2px solid red;
		}
		.form-control-file
		{
			background-color: rgba(0,0,0,0);
			border-radius: 15px;
			/*outline: 2px solid red;*/
			opacity: 0;
			font-size: 0;
			z-index: 0;
			position:absolute;
			left: 10%;
			top: -20px;
			height: 00px;
			width: 0px;
			margin-bottom: 30px;
			/*box-shadow: 0px 10px 60px rgba(0,0,0,0.3);*/
			/*border: 2px solid red;*/
			opacity: 1;
			z-index: 1;		
		}
		.fake-file
		{
			background: linear-gradient(to right, #2196F3 25%, #64B5F6);
			/*background-color: #8F00FF;*/
			color: white;
			overflow: hidden;
			font-size: 18px;
			margin-top: 0px;
			border-radius: 15px;
			outline: none;
			height: 50px;
			width: 85%;
			margin-bottom: 0px;
			margin-left: 10px;
			box-shadow: 0px 10px 60px rgba(0,0,0,0.3);
			/*border: 2px solid blue;*/
			z-index: -1;
			font-family: Helvetica;
		}
		input.file:hover +.fake-file
		{
			position: relative;
			top: -5px;
			box-shadow: 0px 10px 60px rgba(0,0,0,0.5);
		}
		.form-control-file:active
		{
			opacity: 0;
			border: none;

		}
		input.file+label
		{
			background-color: red;
		}
		button
		{
			opacity: 0;
			height: 0;
			border: none;
		}
		.table1
		{
				position: absolute; 
				left: 20px; 
				z-index: 1;
				top: 80px; 
				padding: 10px; 
				border-radius: 15px;
				box-shadow: 0px 10px 60px rgba(0,0,0,0.3);
				background: linear-gradient(to bottom,#2196F3 50px,white 50px, white);
				font-family: Helvetica;
				font-weight: bold;
				font-size: 22px;
				color: white;
				height: 85%;
				width: 15%;
		}
		.table2
		{
				margin: auto; 
				display: inline-block; 
				position: absolute; 
				top: 90px;
				left: 31%;
				z-index: 2;
		}
		.table3
		{
			position: absolute;
			left: 30%;
			top: 100px;
			margin: auto;
			width: 20.5%;		
		}
		#submit
		{
			opacity: 1;
			border: none;
			outline: none;
			border-radius:10px;
			width: 70%;
			margin: 5px;
			height: 30px;
			padding: 5px;
			box-shadow: 0px 10px 60px rgba(0,0,0,0.3);
			background-color: #333333;
			color: white;
			font-size: 20px;

		}
		.fileupload
		{
			border-radius: 10px;
			/*width: 100%;*/
			margin: 5px;
			font-family: Helvetica;
			font-weight: 100;
			color: #31A6F3;
			font-size: 14px;
			background-color: #505050;
			padding: 5px;
			box-shadow: 0px 10px 40px rgba(0,0,0,0.3);
			overflow: hidden;
			/*display: inline-block;*/
		}
		.dot
		{
			border-radius: 50%;
			height: 10px;
			width: 10px;
			background-color: rgba(255,255,255,0.2);		
			display: inline-block;
			margin-right: 10px;
		}
		.divider
		{
			background-color: grey;
			width: 2px;
			height: 90%;
			position: absolute;
			left: 50%;

		}
		.file-container
		{
			/*background-color: white;*/
			/*border-radius: 15px;*/
			padding: 5px;
			/*box-shadow: 0px 10px 60px rgba(0,0,0,0.3);*/
			height: 150px;
			overflow: auto;
		}
		#questionwindow
		{
			width: 45%;
			height: 40%;
			position: absolute;
			right: 30px;
			top: 100px;
			outline: none;
			box-shadow: 0px 10px 60px rgba(0,0,0,0.3);
			resize: vertical;
			border: none;
			border-radius: 10px;
			z-index: 2;
		}
		/* width */
::-webkit-scrollbar {
    width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
    background: rgba(0,0,0,0); 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
    background: #bbbbbb; 
    border-radius: 5px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
    background: #aaaaaa; 
}
/*#container
{
width: 300px;
height: 200px;
border: solid 1px #000;
position: relative;
}

.bottom-right
{

position: absolute;
right: 0px;
bottom: 0px;
width: 300px;
height: 200px;
border: 1px solid #000;
}
*/
</style>
</head>
<body>
<div class="heading">ASSIGNMENT SUBMISSION</div>
			<div class="divider"></div>
			<form method="POST" action="action.php" enctype = 'multipart/form-data'>

			  <div class="form-group">
			  	<table class="table1" style="">
			  		<tr>		
			  			<th>
			  			Details
			  			</th>
			  		</tr>
			  		<tr>
			  			<th width="50px"><div class="label" id="srnl">SRN</div></th>
			  		</tr>
			  		<tr>
			  			<td>
			    			<input type="text" class="form-control" id="srn" name = "srn" placeholder="" value = "">		
			    		</td>
			    	</tr>
					<tr>
						<th width="50px"><div class="label" id="srnl">SECTION</div></th>
					</tr>
					<tr>
						<td>
			    			<input type="text" class="form-control" id="sec" name = "sec" placeholder="" value = "">
			    		</td>
			    	</tr>
			  		<tr>
			  			<th width="50px"><div class="label" id="anol">ASSIGNMENT #</div></th>
			  		</tr>
			  		<tr>
			  			<td>
			    			<input type="text" class="form-control" id="ano" name = "ano" placeholder="" value = "" onchange="anochange()">
			    		</td>
			    	</tr>
			    	<tr>
			    		<th width="50px"><div class="label" id="qnol">QUESTION #</div></th>
			    	</tr>
			    	<tr>		
			    		<td>
			    			<input type="text" class="form-control" id="qno" name = "qno" placeholder="" value = "" onchange="anochange()">	
			    		</td>
			    	</tr>
			    	<tr>
		    			<td>
		    				<div class="fake-file" id="fake-file"><span style="position: relative;top: -30px; font-size: 90px; font-weight: bold ;color: #64B5F6">{}</span><div style="position: relative; top: -80px; font-size: 12px;left:40px;">UPLOAD FILES</div></div>
		    			
		    			</td>
		    		</tr>
		    		<tr>
						<td>
		    				<div class="file-container">
		    					
		    				</div>
						</td>
					</tr>
		    		<tr>
		    			<td>
		    				<div style="text-align: center;">
		    				<input type="submit" class="btn btn-primary" id="submit" value="SUBMIT >" name="submit" onsubmit="shrinkquestion()">
		    				</div>
		    			</td>
		    		</tr>	
			    </table>
			    <BR>
			    
		    				<input type="file" class="form-control-file" id='name' name = "name[]" multiple=""/>
		    	<table class="table3">
		    		
					
					
		    	</table>
		  	  </div>
		  	  	
				  
			</form>
		</span></div></td></tr></table>
<iframe src="http://10.2.20.193/c/admin/1/1/question.pdf" id="questionwindow">
</iframe>
<script type="text/javascript">
document.querySelector("#name").onchange=func1;
var ff=document.querySelector("#fake-file");
ff.onclick=fakeclick;
function func1()
{
	var d=document.querySelector(".file-container");
	d.innerHTML="";
	for(i=0;i<this.files.length;i++)
	{
	d.innerHTML=d.innerHTML+'<div class="fileupload"><div class="dot"></div>'+this.files[i].name+'</div>';
	 console.log(this.files[i].name);
	}
}
function shrinkquestion()
{
document.querySelector('#questionwindow').style.width='20px';
}
function fakeclick() 
{
  var element = document.querySelector('#name'); 
//   if ("createEvent" in document) {
//     var evt = document.createEvent("HTMLEvents");
//     evt.initEvent("change", false, true);
//     element.dispatchEvent(evt);
// }
// else
//     element.fireEvent("onchange");
element.click();
}
function anochange()
{
	var anoval=document.querySelector("#ano").value;
	var qnoval=document.querySelector("#qno").value;
	if(anoval!='' && qnoval!='')
	{
		document.querySelector("#questionwindow").src="http://10.2.20.193/c/admin/"+anoval+"/"+qnoval+"/question.pdf";
	}
}
</script>
</body>
</html>
<div class='second'></div>
