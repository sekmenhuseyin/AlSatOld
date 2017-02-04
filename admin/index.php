<? include("ust.php"); 
	    
if((md5($KullAd)==md5("admin")) and (md5($KullPass)==md5("admin")) and ($submit)){$_SESSION["adminEntered"]=$KullAd;if($act=="logout"){$act="sale";}}
if($act=="logout"){$_SESSION["adminEntered"]="";}if(!$act){$act="sale";}
if(!$_SESSION["adminEntered"]){include("login.html");}
else{ ?>
	<table cellpadding="0" width="95%" border="0" cellspacing="0" align="center"><tr><td align="center">
		<?	if(substr($act,0,3)=="uye"){include("uye.php");}
			else if($act=="cats"){include("cats.php");}
			else if($act=="sehir"){include("sehir.php");}
			else if($act=="sale"){include("sale.php");}
			else if($act=="stok"){include("stok.php");}
			else if($act=="resim"){include("resim.php");}
			else if($act=="detay"){include("detay.php");}
		?>
	</td></tr></table>
<? }
include("alt.php");?>
