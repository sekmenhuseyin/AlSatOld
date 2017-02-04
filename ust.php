<? session_start();include("common.php");
function KurGoster($cins){
	$dolar="USD/TRY";$avro="EUR/TRY";@$dosya=file("http://www.tcmb.gov.tr/kurlar/today.html?");
	if($dosya){
		for ($i=0; $i<sizeof($dosya); $i++){
			if((ereg($dolar, $dosya[$i])) and ($cins=="dolar")){$alanlar=split("[[:space:]]+",$dosya[$i]);return $alanlar[5];}
			if((ereg($avro, $dosya[$i])) and ($cins=="avro")){$alanlar = split("[[:space:]]+",$dosya[$i]);return $alanlar[4];}
		}
	}else return '0';
}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <META http-equiv="Content-Type" content="text/html; charset=windows-1254">
	<META http-equiv=Page-Enter content=blendTrans(Duration=1.0)>
	<META http-equiv=Page-Exit content=blendTrans(Duration=1.0)>
    <META http-equiv="Copyright" content="Copyright © 2006">
    <META http-equiv="Resource-type" content="document">
    <META http-equiv="Distribution" content="global">
    <META http-equiv="Content-Language" content="tr">
    <META http-equiv="Window-target" content="_top">
    <META http-equiv="imagetoolbar" content="no">
    <META http-equiv="Reply-to" content="">
    <META name="Copyright" content="Copyright © 2006">
    <META name="Content-Language" content="tr">
    <META name="Description" content="">
    <META name="Author" content="">
    <META name="Keywords" content="">
	<title>Hesaplı Al Sat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . . : Hesabını Bilenlerin Sitesi : . . &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</title>
	<link rel="stylesheet" type="text/css" href="data/style.css">
</head>

<body leftmargin=0 topmargin=0 style="margin:0;" bgcolor="#E6E6E6" background="images/index/fon.gif">
    <table border="0" cellpadding="0" cellspacing="0" width="100%" background="images/index/fon_top.gif" height="147">
        <tr>
	        <td align="center" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="740">
                <tr>
	                <td valign="middle" height="68"><img src="images/index/LOGO2.gif" alt="" border="0" align="left"></td>
                </tr>
                <tr>
	                <td><table border="0" cellpadding="0" cellspacing="0"><tr>
	                    <td><a href=" " title=""><img src="images/btn/b01.gif" height="42" alt="" border="0"></a></td>
	                    <td><a href="kategori.php" title=""><img src="images/btn/b02.gif" height="42" alt="" border="0"></a></td>
	                    <td><a href="kategori.php" title=""><img src="images/btn/b03.gif" height="42" alt="" border="0"></a></td>
	                    <td><a href="<? if (!$_SESSION["UserID"])echo"uye.php?p=sat";else echo"sat.php";?>" title=""><img src="images/btn/b04.gif" height="42" alt="" border="0"></a></td>
	                    <td><a href="<? if (!$_SESSION["UserID"])echo"uye.php?p=hesap";else echo"hesap.php";?>" title=""><img src="images/btn/b05.gif" height="42" alt="" border="0"></a></td>
	                    <td><a href="son.php" title=""><img src="images/btn/b06.gif" height="42" alt="" border="0"></a></td>
	                    <td><a href="ilet.php" title=""><img src="images/btn/b07.gif" height="42" alt="" border="0"></a></td>
	                    <td><a href="help.php?show=help" title=""><img src="images/btn/b08.gif" height="42" alt="" border="0"></a></td>
	                </tr></table></td>
                </tr>
                <tr>
	                <td background="images/index/fon_top02.gif" width="740" height="37" align="right">
                        <table border="0" cellpadding="5" cellspacing="0" background=""><tr>
							<td width="100" align="left" style="font-size:9px;font-weight:bold;">Dolar <? echo KurGoster("dolar");?> YTL<br />Euro&nbsp; <? echo KurGoster("avro");?> YTL</td>
							<form name="formArama" action="arama.php" method="get"><td width="305" align="left">
								<input type="text" name="AraText" size="17" value="<? echo"$AraText";?>" />
								<select name="AraKat">
                                	<option value="-1"<? if($AraKat=="-1"){echo" selected='selected'";}?>>Tüm Kategoriler</option>
                                  	<? $sec="select * from kategori order by KategoriAd Asc";$sor=mysql_query($sec);
									while($oku=mysql_fetch_assoc($sor)){if($oku[id]!='0'){?><option value='<? echo"$oku[id]";?>'<? if($AraKat==$oku[id]){echo" selected='selected'";}echo">$oku[KategoriAd]</option>";}}?>
                                  	<option value="0"<? if($AraKat=="0"){echo" selected='selected'";}?>>Diğerleri</option>
								</select>
								<input type="submit" value="  Ara  " />
							</td></form>
							<td width="30" align="center"><a href="arama.php?show=ara" class="titlemini">Detaylı<br>Ara</a></td>
	                        <td width="195" align="left">
								<? if (!$_SESSION["UserID"]) {
									echo("<a href='uye.php?uyeaction=newuser' title='Üye Ol !'><img src='images/btn/b_uyeol.gif' border='0' alt='Üye Ol !' /></a> &nbsp;&nbsp;&nbsp;&nbsp;");
									echo("<a href='uye.php' title='Oturum Aç'><img src='images/btn/b_login.gif' border='0' alt='Oturum Aç' /></a>");
								} else {
									echo("<a href='uye.php?uyeaction=logout' title='Oturumu Kapat'><img src='images/btn/b_logout.gif' border='0' alt='Oturumu Kapat' /></a>");
								} ?>
	                        </td>
                        </tr></table>
                    </td>
                </tr>
            </table></td>
        </tr>
    </table>
    <table border="0" cellpadding="0" cellspacing="0" width="850" align="center">
        <tr valign="top">
	        <td width="149" rowspan="3"><br>
			<? $satno=10;
			if($show=="help"){?>
				<table border="0" cellpadding="0" cellspacing="0" width="149" background="images/index/fon_left02.gif">
                	<tr><td background="images/index/left01.gif" height="26"><p class="title">YARDIM</p></td></tr>
	                <tr><td>
	                    <p class="b01"><img src="images/index/e02.gif" width="6" height="5" alt="" border="0" align="absmiddle">&nbsp;&nbsp;<a href="?show=help&sayfa=yeniuye">Yeni Üyeler</a></p>
						<div align='center'><img src='images/index/hr01.gif' width='137' height='3' alt='' border='0'></div>
	                    <p class="b01"><img src="images/index/e02.gif" width="6" height="5" alt="" border="0" align="absmiddle">&nbsp;&nbsp;<a href="?show=help&sayfa=alan">Alıcı Rehberi</a></p>
						<div align='center'><img src='images/index/hr01.gif' width='137' height='3' alt='' border='0'></div>
	                    <p class="b01"><img src="images/index/e02.gif" width="6" height="5" alt="" border="0" align="absmiddle">&nbsp;&nbsp;<a href="?show=help&sayfa=satan">Satıcı Rehberi</a></p>
						<div align='center'><img src='images/index/hr01.gif' width='137' height='3' alt='' border='0'></div>
	                    <p class="b01"><img src="images/index/e02.gif" width="6" height="5" alt="" border="0" align="absmiddle">&nbsp;&nbsp;<a href="?show=help&sayfa=artirimbitince">Açık Artırma Bitince</a></p>
						<div align='center'><img src='images/index/hr01.gif' width='137' height='3' alt='' border='0'></div>
	                    <p class="b01"><img src="images/index/e02.gif" width="6" height="5" alt="" border="0" align="absmiddle">&nbsp;&nbsp;<a href="?show=help&sayfa=hesap">Hesabım</a></p>
						<div align='center'><img src='images/index/hr01.gif' width='137' height='3' alt='' border='0'></div>
	                    <p class="b01"><img src="images/index/e02.gif" width="6" height="5" alt="" border="0" align="absmiddle">&nbsp;&nbsp;<a href="?show=help&sayfa=sozlesme">Sözleşme Koşulları</a></p>
						<div align='center'><img src='images/index/hr01.gif' width='137' height='3' alt='' border='0'></div>
	                    <p class="b01"><img src="images/index/e02.gif" width="6" height="5" alt="" border="0" align="absmiddle">&nbsp;&nbsp;<a href="?show=help&sayfa=kural">Site Kuralları</a></p>
						<div align='center'><img src='images/index/hr01.gif' width='137' height='3' alt='' border='0'></div>
	                    <p class="b01"><img src="images/index/e02.gif" width="6" height="5" alt="" border="0" align="absmiddle">&nbsp;&nbsp;<a href="?show=help&sayfa=sss">Sıkça Sorulan Sorular</a></p>
						<div align='center'><img src='images/index/hr01.gif' width='137' height='3' alt='' border='0'></div>
	                    <p class="b01"><img src="images/index/e02.gif" width="6" height="5" alt="" border="0" align="absmiddle">&nbsp;&nbsp;<a href="?show=help&sayfa=biz">Hakkımızda</a></p>
						<div align='center'><img src='images/index/hr01.gif' width='137' height='3' alt='' border='0'></div>
	                    <p class="b01"><img src="images/index/e02.gif" width="6" height="5" alt="" border="0" align="absmiddle">&nbsp;&nbsp;<a href="?show=help&sayfa=gizli">Gizlilik Politikası</a></p>
		            </td></tr>
        	        <tr><td><img src="images/index/left_bot02.gif" alt="" width="149" height="17" border="0"></td></tr>
            	</table>
			<? }else{?>
				<table border="0" cellpadding="0" cellspacing="0" width="149" background="images/index/fon_left02.gif">
                	<tr><td background="images/index/left01.gif" height="26"><p class="title">KATEGORİLER</p></td></tr>
	                <tr><td>
						<? $sec="select * from kategori order by KategoriAd Asc";$sor=mysql_query($sec);$satno=mysql_num_rows($sor);
						while($oku=mysql_fetch_assoc($sor)){
							if($oku[id]!=0) {
								echo("<p class='b01'><img src='images/index/e02.gif' width='6' height='5' alt='' border='0' align='absmiddle'>&nbsp;&nbsp;<a href='arama.php?AraKat=$oku[id]'>$oku[KategoriAd]</a></p>");
	                    		echo("<div align='center'><img src='images/index/hr01.gif' width='137' height='3' alt='' border='0'></div>");
							}
						}?>
	                    <p class="b01"><img src="images/index/e02.gif" width="6" height="5" alt="" border="0" align="absmiddle">&nbsp;&nbsp;<a href="arama.php?AraKat=0">Diğerleri</a></p>
		            </td></tr>
        	        <tr><td><img src="images/index/left_bot02.gif" alt="" width="149" height="17" border="0"></td></tr>
            	</table>
			<? }?>
			</td>
	        <td colspan="3" background="images/index/mid_t2.gif">
				<table border="0" cellpadding="0" cellspacing="0" width="701">
					<tr><td width="15"><img src="images/index/mid_t1.gif" alt="" border="0" align="absbottom"></td>
					<td>&nbsp;</td>
					<td width="15"><img src="images/index/mid_t3.gif" alt="" border="0" align="absbottom"></td></tr>
				</table>
			</td>
        </tr>
        <tr>
	        <td bgcolor="#979797"><img src="images/index/px1.gif" width="1" height="1" alt="" border="0"></td>
	        <td bgcolor="#FFFFFF" width="699" height="<? echo(($satno+1)*22);?>" valign="top"><p class="px5">
