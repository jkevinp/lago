<?php
echo '<!DOCTYPE html>';
echo '<html>';
echo '<body>';
echo "<title>D' One Resort</title>"
echo '<body background="D:\Website\D'One Resort Photos\BlueBG.jpg">'

echo '<style>

#fixed { 
height:150px; 
position:fixed; 
top:0; left:0; 
z-index:10000; 
}

#footer{
height:157px;
margin-left:287px;
margin-right:245px;
line-height:30px;
text-align:left;
font-size:16px;
color:white;
font-family:Century Gothic;
background:#00b356;


}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #00b356;
	cursor: pointer;
}

li {
    float: left;
    border-right:1.5px solid #bbb;
}

li:last-child {
    border-right: none;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #FF3300;
}

.active {
    background-color: #FF3300;
}

a {
    font-size: 20px;
	font-family: Century Gothic;
	transition-duration: 0.4s;
}
.row {width:85%;float:right}
.four {width:85%;}

</style>';
echo '<div class="container">';
  echo '<div class="row">';
	echo '<div class="four">';
		<ul>
			<li><a href="DOneResort.html">Home</a></li>
			<li><a href="About.html">About Us</a></li>
			<li><a href="#contact">Gallery</a></li>
			<li><a href="#contact">Amenities</a></li>
			<li><a href="#contact">Rates</a></li>
			<li><a href="#contact">Rules & Regulations</a></li>
 
		<ul style="float:right;list-style-type:none;">
			<li><a href="#about"><img src= "D:\Website\Photos\Calendar.png" style="width:20px;height:20px"> 	RESERVE NOW!</a></li>
			<li><a href="#login">Login</a></li>
		</ul></div>
<center>

</center></div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<div id = "footer">
	<table width= 100% border=0;>
	<td width=80%>
	<p>	Copyright 2015 D' ONE RESORT. All Right Reserved.<br>
	Maharlika Road, San Salvador, Baras, Rizal<br>
	<img src ="D:\Website\Photos\Phone.png" style="width:15px; height:15px"></img>&nbsp 0922 807 1360 | 0917 517 6510 | 0917 516 1226<br>
	<img src ="D:\Website\Photos\Mail.png" style="width:15px; height:15px"></img>&nbsp donatajengsantos@gmail.com<br></p>
	</td>
	<td width=40%>
	<p align="center">
	<center><a href="https://www.facebook.com/DOne-Resort-Restaurant-169424814370/?ref=ts&fref=ts">
	<img id="img1" src ="D:\Website\Photos\Facebook1.png" style="width:80px; height:70px"></a></img></center>
	<center>Like us on Facebook!</center></p>
	</td>
	</table>
<div id="fixed">
</div> 
</div>
</div>
</body>
</html>