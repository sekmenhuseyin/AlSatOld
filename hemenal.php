<? include("ust.php"); 
if ($_SESSION["UserID"]=="") {echo "<script language=\"JavaScript\">window.location.href = 'uye.php?p=hemenal&i=$i&info=$info';</script>";exit();}
if(!$ode or (!$Ad or !$Soyad or !$Adres  or !$adi or !$soyadi or !$number or !$cv2) or ($psid!=$PHPSESSID)){
	$sec2="select * from stok where id='$i'";$sor2=mysql_query($sec2);$oku2=mysql_fetch_assoc($sor2);
	if($info){
		$en_yuksek="select * from stok_teklif where StokID='$i' order by teklif desc";$en_sor=mysql_query($en_yuksek);$en_oku=mysql_fetch_assoc($en_sor);
		if(($info!=$en_oku[MusteriID]) or ($en_oku[MusteriID]!=$_SESSION["UserID"])){echo "<script language=\"JavaScript\">window.location.href='detay.php?i=$i';</script>";exit();}
	}$klnzmn=formatetimestamp($oku2[tarih],"no");
	if(($klnzmn and $info) or (!$klnzmn and !$info)){echo "<script language=\"JavaScript\">window.location.href='detay.php?i=$i';</script>";exit();}
	$sec="select * from uye_active where id='$_SESSION[UserID]'";$sor=mysql_query($sec);$oku=mysql_fetch_assoc($sor);?>
 	<script language="JavaScript"><!-- 
		function CheckForm () {
			if (document.frmode.Ad.value==""){alert("L�tfen t�m alanlar� doldurunuz !\n");return false;}
			else if (document.frmode.Soyad.value==""){alert("L�tfen t�m alanlar� doldurunuz !\n");return false;}
			else if (document.frmode.Adres.value==""){alert("L�tfen t�m alanlar� doldurunuz !\n");return false;}
			else if (document.frmode.adi.value==""){alert("L�tfen t�m alanlar� doldurunuz !\n");return false;}
			else if (document.frmode.soyadi.value==""){alert("L�tfen t�m alanlar� doldurunuz !\n");return false;}
			else if (document.frmode.number.value.length!=16){alert("L�tfen kredi kart� numaran�z� eksiksiz yaz�n�z !\n");return false;}
			else if (document.frmode.cv2.value.length!=3){alert("L�tfen CVC2 numaran�z� eksiksiz yaz�n�z !\n");return false;}
				else {return true;}
		}
	// --></script>
	<form action="?i=<? echo"$i";?>" id="frmode" name="frmode" method="post" onSubmit="return CheckForm();"><table width="90%" align="center" border="0">
		<tr><td colspan="2" background="images/index/fon_bar01.gif">
			<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">�r�n Bilgisi&nbsp; </td></tr></table>
		</td></tr>
		<tr><td>Ba�l�k </td><td>: &nbsp;<? echo"$oku2[title]" ?></td></tr>
		<tr><td>�denecek Tutar </td><td>: &nbsp;<? if($info)echo"$en_oku[teklif]"; else echo"$oku2[hemen]" ?> YTL</td></tr>
		<tr><td colspan="2"><input type="hidden" name="fiyat" value="<? if($info)echo"$en_oku[teklif]"; else echo"$oku2[hemen]" ?>" /></td></tr>
		<? if($ode){
			echo("<tr><td colspan='2' align='center'>&nbsp;<hr>&nbsp;</td></tr>");
			if(!$Ad or !$Soyad or !$Adres or !$adi or !$soyadi or !$number or !$cv2){
				echo("<tr><td colspan=2 align=center><font class='hatan'>L�tfen bo� k�s�mlar� doldurun !</font></td></tr>");
			}else if(strlen($cv2)<>3)echo"<tr><td colspan=2 align=center><font class='hatan'>L�tfen CVC2 numaran�z� eksiksiz yaz�n�z !</font></td></tr>";
			else if(strlen($number)<>16)echo"<tr><td colspan=2 align=center><font class='hatan'>L�tfen kredi kart� numaran�z� eksiksiz yaz�n�z !</font></td></tr>";
			echo("<tr><td colspan='2' align='center'>&nbsp;<hr>&nbsp;</td></tr>");
		}else echo"<tr><td colspan='2'><br /><br /></td></tr>";?>
		<tr><td colspan="2" background="images/index/fon_bar01.gif">
			<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Teslimat Bilgisi&nbsp; </td></tr></table>
		</td></tr>
		<tr><td align="center" colspan="2">Sat�n ald���n�z �r�n a�a��daki adrese g�nderilece�inden l�tfen adresinizi do�ru ve tam giriniz.<br /><br /></td></tr>
		<tr><td width="35%">Ad�n�z *</td><td><input size="20" type="text" name="Ad" value="<? echo "$oku[ad]"; ?>"></td></tr>
		<tr><td>Soyad�n�z *</td><td><input size="20" type="text" name="Soyad" value="<? echo "$oku[soyad]"; ?>"></td></tr>
		<tr><td>Adresiniz *</td><td><textarea cols="40" rows="5" name="Adres"><? echo "$oku[adres]"; ?></textarea></td></tr>
		<tr><td>�ehir</td><td>
			<select size="1" name="sehir">
				<? $sec_sehir=mysql_query("select * from sehir order by plaka asc");
					while($oku_sehir=mysql_fetch_assoc($sec_sehir)){if(intval($oku_sehir[plaka])!=0){?> <option value='<? echo("$oku_sehir[plaka]");?>'<? if(intval($oku[sehir])==intval($oku_sehir[plaka]))echo" selected='selected'";?>><? echo("$oku_sehir[ad]");?></option><? }}?>
                	<option value="00"<? if(intval($oku[sehir])==0)echo" selected='selected'";?>>Di�er Yerler</option>
			</select></td>
		</tr>
		<tr><td>�l�e</td><td valign="top"><input size="20" type="text" name="ilce" value="<? echo "$oku[ilce]"; ?>"></td></tr>
		<tr><td colspan="2"><br /><br /><input type="hidden" name="tutar" value="<? if($info=="timeout")echo"$en_oku[teklif]"; else echo"$oku2[hemen]" ?>" /></td></tr>
		<tr><td colspan="2" background="images/index/fon_bar01.gif">
			<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Kredi Kart� Bilgisi&nbsp; </td></tr></table>
		</td></tr>
		<tr><TD height=26>Kart Sahibinin Ad� :</TD><TD class=ariver12> &nbsp;<INPUT type="text" id="adi" name="adi"></TD></TR>
        <TR><TD width=220 height=26>Kart Sahibinin Soyad� :</TD><TD class=ariver12> &nbsp;<INPUT type="text" id="soyadi" name="soyadi"></TD></TR>
		<TR><TD height=26><div>Kredi Kart� Numaran�z:<BR><SMALL><SPAN style="COLOR: #666666">(Bo�luk B�rakmay�n�z)</SPAN></SMALL></div></TD><TD> &nbsp;<INPUT type="text" id="number" maxLength="16" name="number"></TD></TR>
		<TR><TD height=26><div>CVC2 Numaran�z :<BR><SMALL><SPAN style="COLOR: #666666">(Kart�n�z�n arkas�ndaki son 3 hane)</SPAN></SMALL></div></TD><TD> &nbsp;<INPUT type="text" id="cv2" maxLength="3" size="3" name="cv2"></TD></TR>				
        <TR><TD height=26><div>Son Kullanma Tarihi :</div></TD><TD class=ariver12> &nbsp;
			<SELECT size=1 name=expmon><? for($q=1;$q<=12;$q++){if(strlen($q)==1){$q="0".$q;}echo"<OPTION value='$q'>$q</OPTION>";} ?></SELECT>
			<SELECT size=1 name=expyear> <? for($q=0;$q<=10;$q++){$yil=date("y")+$q;if(strlen($q)==1){$yil="0".$yil;}echo"<OPTION value='$yil'>20$yil</OPTION>";} ?></SELECT>
		</TD></TR>
		<tr><td colspan="2"><br /><br /><input type="hidden" value="<? echo"$PHPSESSID";?>" name="psid" /></td></tr>
		<tr><td colspan="2" align="center"><input type="submit" value="  �deme Onay�  " name="ode"></td></tr>
	</table></form>
<? } else{
	$sec=mysql_query("select durum,MusteriID,title from stok where id='$i'");$oku=mysql_fetch_assoc($sec);
	if($oku[durum]==1){
		$ekle = mysql_query("INSERT INTO stok_sale(alanID,satanID,StokID,fiyat,tarih) VALUES('$_SESSION[UserID]','$oku[MusteriID]','$i','$fiyat','".date("d/m/Y")."')");
		if($ekle){
			$guncelle=mysql_query("UPDATE stok SET durum='3' where id='$i'");
			$email_govdesi="<html><head><title>�r�n Sat�� Bilgisi</title></head><body><table><tr><td>Merhaba ".LearnUser($oku[MusteriID])."</td></tr>";
			$email_govdesi.= "<tr><td><b>'$oku[title]'</b> ba�l�kl� �r�n�n�z� ".LearnUser($_SESSION[UserID])." lakapl� kullan�c� sat�n alm��t�r.</td></tr>";
			$email_govdesi.= "<tr><td>L�tfen en k�sa zamanda �r�n� a�a��daki adrese yollay�n.</td></tr>";
			$email_govdesi.= "<tr><td>Al�c�: $Ad $Soyad</td></tr>";
			$email_govdesi.= "<tr><td>Adresi: $Adres $ilce/$sehir</td></tr>";
			$email_govdesi.= "<tr><td>Te�ekk�rler !"."</td></tr></table></body></html>";
			$headers = "MIME-Version: 1.0"."\r\n";
			$headers.= "Content-type:text/html;charset=windows-1254"."\r\n";
			$headers.= "Return-Path: info@hesaplialsat.com"."\r\n";
			$headers.= 'From: Hesapl� Al Sat <info@hesaplialsat.com>'."\r\n";
			@mail($EPosta,"�yelik Onay Mektubu",$email_govdesi,$headers);
		}
		if($guncelle){echo SayfaOrtala("Ba�ar�l� bir �ekilde al�m yapt�n�z !");}else{echo SayfaOrtala("Al�mda bir hata olu�tu !");}
	}else if($oku[durum]>1){echo SayfaOrtala("Bu �r�n� daha �nceden sat�lm�� !");
	}else{echo SayfaOrtala("Bu �r�n� alamazs�n�z !");}
}include("alt.php");?>
