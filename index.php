<html>
<head>
 <style>
#ban
{
position:fixed;
display:block;
background-color:rgba(0,0,1,0.5);
color:white;
padding:10px;
width:100%;
height:50px;
border:0px;
top:0px;
}
body{
margin:0;padding:0;
background-image: url("3.jpg");
background-repeat:no-repeat;
background-position:right;
background-attachment:fixed;
background-size:cover;
overflow: hidden;
}
.container-1{
  width: 300px;
  vertical-align: middle;
  white-space: nowrap;
  position: fixed;
}
.container-1 input#search{
  width: 280px;
  height: 40px;
  background: rgba(0,0,1.1,0.2);
  border: none;
  font-size: 15pt;
  float: left;
  color: #63717f;
  padding-left: 45px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 0px;
  margin-left:900px;
  margin-top:20px;
}
.container-1 input#search::-webkit-input-placeholder {
   color: #65737e;
}
 
.container-1 input#search:-moz-placeholder { /* Firefox 18- */
   color: #65737e;  
}
 
.container-1 input#search::-moz-placeholder {  /* Firefox 19+ */
   color: #65737e;  
}
 
.container-1 input#search:-ms-input-placeholder {  
   color: #65737e;  
}#submitButton{
	background-color:#3399ff;
	width:80px;
	height:40px;
	
	overflow:hidden;
	//text-transform:uppercase;
        border:none;
	border-radius:2px;
	cursor:pointer;
	margin-top:20px;
	color:white;
}
#submitButton:hover{
background-color:cyan;
}
.logo{
position:absolute;
margin-top:570px;
margin-left:880px;
}
@font-face{
 font-family:ff;
 src:url(fnt.otf);
}
#a{
position:absolute;
margin-left:530px;
margin-top:478px;
font-family:calibri;
font-size:4em;
transform:rotate(32deg);
color:#1a1a1a;

}
#sai{
text-decoration:none;
color:white;
}
</style>
</head>
<body>
<div id='ban'>
</div>
<h1 id='a'>Me!<h1>
<div class='box'>
  <div class='container-1'>
     <form action="products.php" method="post">
         <span class='icon'><i class='fa fa-search'></i></span>
      <input type='text' id='search' name="search_keywords" placeholder="Search Here..." required/>
       <input id='submitButton' type="submit" value="Walk In"/>
    </form> 
 </div>
</div>
<div>
<div class='logo'>
<img src='img.png'  width='70px' height='70px'>
<img src='myn.png' width='70px' height='70px' >
<img src='ebay.png'  width='70px' height='70px'>
<img src='jbng.jpg'  width='70px' height='70px'>
<img src='junglee.png'  width='70px' height='70px'>
<img src='snap.png'  width='70px' height='70px'>
</div>
</body>
</html>