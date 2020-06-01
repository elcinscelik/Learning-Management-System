<?php
session_start();
?>
<html>

<style>

body,html {
 background-image: url("img/logbg.jpg");
background-repeat: no-repeat;
height:97%;
width:99%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;

}
#mail,#pass
{
    height:45px;
    font-size:14pt;
	width:450px;
	background-color: rgb(255, 212, 138);
	
}

#log
{
    height:45px;
    font-size:14pt;
	width: 450px;
    height: 45px;
	background-color: rgb(255, 212, 138);
}

table{
background-image:url(img/blankgray.png); 
background-repeat:no-repeat;
background-position:center;
background-size:cover;


}


</style>

<body>
<br><br><br><br><br><br><br><br><br>
<table border="1" width="500" height="350"  align="center" >
<td align="center">
<br><br>
<img src="img/logo.jpg">
<br><br><br>

<form name="myform" action="fg.php" method="post">
<a align="left" > E-mail (@bilgiedu.net, @bilgi.edu.tr) </a>
<input type="text" id="mail"  name="mail">
<br><br>
Password

<input type="password" id="pass"  name="pass">
<br><br><br>

<input type="submit"  id="log" value="Log In" name="lg">

<br>
<br>
<br>
<br>
Links:&nbsp &nbsp &nbsp  <a href= "" >Password Reset</a>  &nbsp &nbsp &nbsp<a href= "" >Login</a> &nbsp &nbsp &nbsp <a href= "" >Help</a> 
</td>
<br><br>
</table><br><br><br><br><br><br><br><br><br><br><br><br>
<table width="100%" height="80" valign="bottom">
<td align="left">
<a valign="top">Follow Us</a>
&nbsp &nbsp &nbsp
<a href="https://www.facebook.com/istanbulbilgiuniversitesi" target="_blank">
         <img src="img/fb.png"
         width="40" height="40">
		 &nbsp &nbsp &nbsp
		 </a>
<a href="https://twitter.com/bilgiofficial" target="_blank">
         <img src="img/twitter.png"
         width="40" height="40">
		 &nbsp &nbsp &nbsp
		 </a>
<a href="https://www.youtube.com/user/IstanbulBilgiUni" target="_blank">
         <img src="img/yt.png"
         width="40" height="40">
		 &nbsp &nbsp &nbsp
		 </a>
<a href="https://www.instagram.com/bilgiofficial/" target="_blank">
         <img src="img/insta.png"
         width="40" height="40">
		 &nbsp &nbsp &nbsp
		 </a>
<a href="https://www.linkedin.com/school/istanbul-bilgi-university/" target="_blank">
         <img src="img/in.png"
         width="40" height="40">
		 &nbsp &nbsp &nbsp	
</a>		 
</td>
</table>

</form>
</body>
</html>