<? include("ust.php");
if ($uyeaction == "uye_passive") {
	$sec="select * from uye_passive where activePass='$a' and userpass='$p'";$sor=mysql_query($sec);$sat_num=mysql_num_rows($sor);
	if($sat_num==1) {
		$oku=mysql_fetch_assoc($sor);$trh=date("d/m/Y");
		$ekle=mysql_query("INSERT INTO uye_active(ad,soyad,username,userpass,EPosta,tel,adres,sehir,ilce,ozelsoru,ozelcevap,tarih) VALUES ('$oku[ad]','$oku[soyad]','$oku[username]','$oku[userpass]','$oku[EPosta]','$oku[tel]','$oku[adres]','$oku[sehir]','$oku[ilce]','$oku[ozelsoru]','$oku[ozelcevap]','$oku[tarih]')");
		$sec_uye=mysql_query("select id from uye_active where username='$oku[username]'");$oku_uye=mysql_fetch_assoc($sec_uye);
		$ekle_uye_puan=mysql_query("INSERT INTO uye_puan(verenMID,verilenMID,puan,yorum,tarih) VALUES('1','".($oku_uye[id])."','3','Hesapl�AlSat`a Ho�geldiniz! Ba�ar�lar ;-)','$trh')");
		$sil=mysql_query("delete from uye_passive where id='$oku[id]'");
		if($ekle and $ekle_uye_puan and $sil)echo SayfaOrtala("Hesab�n�z aktif hale getirilmi�tir. Kaydoldu�unuz i�in te�ekk�r ederiz !");else echo SayfaOrtala("Kullan�c� aktifle�tirilemedi !<br>L�tfen daha sonra tekrar deneyin !");
	} else {echo SayfaOrtala("Aktif hale getirilecek hesap bulunamad� !");}
	
	
	
	
} else if ($uyeaction == "activate") {
	if($kontrol and $KullAd and $EPosta and ($psid==$PHPSESSID)){
		$sec=mysql_query("select * from uye_active where username='$KullAd' and EPosta='$EPosta'");$sat_say=mysql_num_rows($sec);
		$sec2=mysql_query("select * from uye_passive where username='$KullAd' and EPosta='$EPosta'");$sat_say2=mysql_num_rows($sec2);
		if($sat_say>0)echo "<script language=\"JavaScript\">window.location.href = '?uyeaction=activate&err=gereksiz';</script>";
		else if(($sat_say2<0) and ($sat_say<0))echo "<script language=\"JavaScript\">window.location.href = '?uyeaction=activate&err=nouser';</script>";
		else if($sat_say2>0){
			$oku=mysql_fetch_assoc($sec2);
			$email_govdesi="<html><head><title>�yelik Onay Mektubu</title></head><body><table><tr><td>Merhaba ".$KullAd."</td></tr>";
			$email_govdesi.= "<tr><td>Kay�t oldu�unuz i�in te�ekk�rler.</td></tr>";
			$email_govdesi.= "<tr><td>E-posta adresinizi do�rulamak i�in, l�tfen a�a��daki ba�lant�ya t�klay�n.</td></tr>";
			$email_govdesi.= "<tr><td><br /><a href='http://www.hesaplialsat.com/uye.php?uyeaction=uye_passive&a=$oku[activePass]&p=$oku[userpass]'>http://www.hesaplialsat.com/uye.php?uyeaction=uye_passive&a=$oku[activePass]&p=$oku[userpass]</a><br /><br /></td></tr>";
			$email_govdesi.= "<tr><td>Bu sizi do�rudan e-posta do�rulama sayfas�na g�t�rmelidir. E�er �yle olmuyorsa, l�tfen URL'nin tamam�n� web taray�c�n�z�n adres kutusuna kopyalay�p yap��t�r�n ve klavyeniz �zerinde &quot;Enter&quot; tu�una bas�n.</td></tr>";
			$email_govdesi.= "<tr><td>Te�ekk�rler !"."</td></tr></table></body></html>";
			$headers = "MIME-Version: 1.0"."\r\n";
			$headers.= "Content-type:text/html;charset=windows-1254"."\r\n";
			$headers.= "Return-Path: info@hesaplialsat.com"."\r\n";
			$headers.= 'From: Hesapl� Al Sat <info@hesaplialsat.com>'."\r\n";
			if (@mail($EPosta,"�yelik Onay Mektubu",$email_govdesi,$headers))echo SayfaOrtala("�yelik onay mektubu e-posta adresinize g�nderildi.<br>");else echo SayfaOrtala("�yelik onay mektubu g�nderilemedi.<br>L�tfen daha sonra aktivasyon postam� g�nder linkinden tekrar deneyin !");
		}?>
	<? }else{?>
		<form name="frmactive" action="?uyeaction=activate" method="post"><table align="center" border="0" cellpadding="0" cellspacing="0" width="95%">
			<tr><th colspan="2" align="center">Aktivasyon Postas� G�nderimi</th></tr>
			<? if($err) {?>
				<tr><td colspan='2' align='center'>&nbsp;<hr>&nbsp;</td></tr>
				<? if($err=="nouser"){?><tr><td colspan=2 align=center><font class='hatan'>Yazd���n�z kullan�c� bulunamad� !</font></td></tr><? }?>
				<? if($err=="gereksiz"){?><tr><td colspan=2 align=center><font class='hatan'>Kullan�c� ad�n�z �nceden aktifle�tirilmi� !</font></td></tr><? }?>
				<tr><td colspan='2' align='center'>&nbsp;<hr>&nbsp;<br /><br /></td></tr><? 
			}?>
			<tr><td colspan="2" background="images/index/fon_bar01.gif">
				<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Kullan�c� Bilgileri&nbsp; </td></tr></table>
			</td></tr>
		 	<tr><td width="30%">Kullan�c� ad�n�z *</td><td><input type="text" name="KullAd" value="<? echo"$KullAd";?>" /></td></tr>
		 	<tr><td>E-Posta adresiniz *</td><td><input type="text" name="EPosta" value="<? echo"$EPosta";?>" /></td></tr>
		 	<tr><td>&nbsp;</td><td><input type="hidden" value="<? echo"$PHPSESSID";?>" name="psid" /><br /><input  type="submit" name="kontrol" value="Devam >>" /></td></tr>
		</table></form>
		<script language="javascript">document.frmactive.KullAd.focus();</script>
	<? }?>
		
		



<? } else if ($uyeaction == "lostpass") {
	if($sorgu and ($psid==$PHPSESSID)){
		$sec="select * from uye_active where username='$KullAd'";$sor=mysql_query($sec);$oku=mysql_fetch_assoc($sor);
   		if(md5($ozelcevap)==$oku[ozelcevap] ){
			for($i=0;$i<7;$i++){$yeni_sifre=$yeni_sifre.chr(rand(97,122)).chr(rand(48,57));}$yeni_sifre=crypt($yeni_sifre);
			$sifre_sifre=md5($yeni_sifre);$mail_gonder=$oku[EPosta];
			$duzelt=mysql_query("update uye_active set userpass='$sifre_sifre' where username='$KullAd'");   
			$email_govdesi = "Merhaba $oku[ad] $oku[soyad].";
			$email_govdesi .= "�ifrenizi unuttu�unuz i�in size rastgele �retilmi� bir �ifre verilmi�tir !";
			$email_govdesi .= "Kullan�c� ad�n�z: ".$KullAd."Yeni �ifreniz: ".$yeni_sifre."Bizi tercih etti�iniz i�in te�ekk�rler !";
			if (@mail($oku[EPosta],"Yeni �ifreniz",$email_govdesi,"From: info@hesaplialsat.com"))echo SayfaOrtala("Yeni �ifreniz e-posta adresinize g�nderildi.");else echo SayfaOrtala("Yeni �ifreniz g�nderilemedi.<br /> Yeni�ifreniz: $yeni_sifre");
   		}else echo "<script language=\"JavaScript\">window.location.href = '?uyeaction=lostpass&err=cevap';</script>";
	}else if($kontrol and $KullAd and $EPosta and ($psid==$PHPSESSID)){
		$sec="select * from uye_active where username='$KullAd' and EPosta='$EPosta'";$sor=mysql_query($sec);$sat_say=mysql_num_rows($sor);$oku=mysql_fetch_assoc($sor);
		if($sat_say > 0){?>
			<form name="frmFrgt2" action="?uyeaction=lostpass" method="post" autocomplete="off"><table align="center" border="0" cellpadding="0" cellspacing="0" width="95%">
				<tr><th colspan="2" align="center">�ifre Hat�rlatma Servisi</th></tr>
				<tr><td colspan="2" background="images/index/fon_bar01.gif">
					<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Kullan�c� Bilgileri&nbsp; </td></tr></table>
				</td></tr>
				<tr>
					<td width="30%">
						<? if($oku[ozelsoru]==1)echo"En be�endi�iniz sporcu kimdir?";
						else if($oku[ozelsoru]==2)echo"En sevdi�iniz ��retmeniniz kimdir?";
						else if($oku[ozelsoru]==3)echo"�lkokulunuzun ad� nedir?";
						else if($oku[ozelsoru]==4)echo"En sevdi�iniz oyuncu/yazar kimdir?";
						else if($oku[ozelsoru]==5)echo"�lk oyunca��n�z neydi";
						else if($oku[ozelsoru]==6)echo"Evcil hayvan�n�z�n ad� nedir?";
						else if($oku[ozelsoru]==7)echo"En b�y�k kahram�n�z kim?";?>
					</td><td><input type="text" name="ozelcevap" value="<? echo $ozelcevap; ?>" /></td>
				<tr>
					<td><input type="hidden" name="KullAd" value="<? echo"$KullAd";?>" /><input type="hidden" name="sorgu" value="p2" /></td>
					<td><input type="hidden" value="<? echo"$PHPSESSID";?>" name="psid" /><br /><input type="submit" name="sorgu" value="Devam >>" /></td></tr>
			</table></form>
			<script language="javascript">document.frmFrgt2.ozelcevap.focus();</script>
		<? }else echo "<script language=\"JavaScript\">window.location.href = '?uyeaction=lostpass&err=nousermail';</script>";
	}else{?>
		<form name="frmFrgt1" action="?uyeaction=lostpass" method="post" autocomplete="off"><table align="center" border="0" cellpadding="0" cellspacing="0" width="95%">
			<tr><th colspan="2" align="center">�ifre Hat�rlatma Servisi</th></tr>
			<? if($err) {?>
				<tr><td colspan='2' align='center'>&nbsp;<hr>&nbsp;</td></tr>
				<? if($err=="nousermail"){?><tr><td colspan=2 align=center><font class='hatan'>Yazd���n�z kullan�c� ad� veya eposta adresi hatal� !</font></td></tr><? }?>
				<? if($err=="cevap"){?><tr><td colspan=2 align=center><font class='hatan'>Yazd���n�z �zel cevab�n�z hatal� !</font></td></tr><? }?>
				<tr><td colspan='2' align='center'>&nbsp;<hr>&nbsp;<br /><br /></td></tr><? 
			}?>
			<tr><td colspan="2" background="images/index/fon_bar01.gif">
				<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Kullan�c� Bilgileri&nbsp; </td></tr></table>
			</td></tr>
		 	<tr><td width="30%">Kullan�c� ad�n�z *</td><td><input type="text" name="KullAd" value="<? echo"$KullAd";?>" /></td></tr>
		 	<tr><td>E-Posta adresiniz *</td><td><input type="text" name="EPosta" value="<? echo"$EPosta";?>" /></td></tr>
		 	<tr><td>&nbsp;</td><td><input type="hidden" value="<? echo"$PHPSESSID";?>" name="psid" /><br /><input  type="submit" name="kontrol" value="Devam >>" /></td></tr>
		</table></form>
		<script language="javascript">document.frmFrgt1.KullAd.focus();</script>
	<? }





} else if ($uyeaction == "profile") {
	$sec=mysql_query("select * from uye_puan where verilenMID='$i' and puan>'0'");$sec_uye=mysql_query("select username,tarih from uye_active where id='$i'");$oku_uye=mysql_fetch_assoc($sec_uye);
	$uye_puan_sec="select * from uye_puan where verilenMID='$i' and puan>'0'";$uye_puan_sor=mysql_query($uye_puan_sec);$uye_puan_say=mysql_num_rows($uye_puan_sor);$uye_puan_MID=0;$nouye_puan_MID=5;
	if($uye_puan_say>0){while($uye_puan_oku=mysql_fetch_assoc($uye_puan_sor)){$uye_puan_MID=$uye_puan_MID+$uye_puan_oku[puan];}$uye_puan_MID=$uye_puan_MID/$uye_puan_say;$uye_puan_MID=ceil($uye_puan_MID);$nouye_puan_MID=5-$uye_puan_MID;}
?>
	<table align="center" border="0" cellpadding="7" cellspacing="0" width="95%">
		<tr><td colspan="2"><? echo"$oku_uye[username] ";while($uye_puan_MID){echo"<img src='images/index/star.gif' border='0' />";$uye_puan_MID--;}while($nouye_puan_MID){echo"<img src='images/index/star2.gif' border='0' />";$nouye_puan_MID--;}?><br />�yelik Tarihi: <? echo"$oku_uye[tarih]";?></td><th width="40%">Yorum Veren / Yorumu</th><th width="20%">Verdi�i Puan</th><th width="15%">Tarih</th></tr>
		<? $j=0;while($oku=mysql_fetch_assoc($sec)){?>
				<tr bgcolor="<? if($j==0){echo"#BCE0FE";}else{echo"#80C5FD";} ?>"><td width="%">Veren: </td><td colspan="2"><? $sec_uye=mysql_query("select username,id from uye_active where id='$oku[verenMID]'");$oku_uye=mysql_fetch_assoc($sec_uye);if($oku[verenMID]>1)echo"<a href='?uyeaction=profile?i=$oku_uye[id]'>$oku_uye[username]</a>";else echo"$oku_uye[username]";?></td>
				<td align="center"><? $uye_puan_say=$oku[puan];while($uye_puan_say){echo"<img src='images/index/star.gif' border='0' />";$uye_puan_say--;}?></td><td align="center"><? echo"$oku[tarih]";?></td></tr><tr bgcolor="<? if($j==0){echo"#BCE0FE";$j++;}else{echo"#80C5FD";$j=0;} ?>"><td>Yorumu: </td><td colspan="4"><? echo"$oku[yorum]";?></td></tr>
		<? }?>
	</table><?





} else if ($uyeaction == "newuser") {
	if (($Submit=="") or ($KulAd=="") or ($KulPar=="") or ($KulPar2=="") or ($EPosta=="") or ($KulPar!=$KulPar2) or (strlen($KulPar)<6)) { ?>
			<script language="JavaScript"><!-- 
			function kontrolet(type){
				if(type=="eposta"){
					var str=document.formUye.EPosta.value;var filtrele=/^(\w+(?:\.\w+)*)@((?:\w+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
					if (filtrele.test(str)){}else{document.getElementById('hint_mail').innerHTML="<b>Mail adresinizi eksik yada yanl�� girdiniz !</b><br /><br />";}
				}else if(type=="parola"){
					if(document.formUye.KulPar.value.length>0&&document.formUye.KulPar.value.length<6){
						document.getElementById('hint_parola').innerHTML="<b>Parolan�z 6 haneden k�sa olamaz !</b>";
					}else if(document.formUye.KulPar2.value.length>0&&document.formUye.KulPar2.value.length<6){
						document.getElementById('hint_parola').innerHTML="<b>Parolan�z 6 haneden k�sa olamaz !</b>";
					}else if(document.formUye.KulPar.value!=document.formUye.KulPar2.value){
						document.getElementById('hint_parola').innerHTML="<b>Parolalar�n�z birbiriyle uyu�muyor !</b>";
					}
				}
			}
			function win() {
				config='toolbar=no,location=no,directories=no,status=no,menubar=no,width=350,height=250,top=30,left=40,scrollbars=yes,resizable=no';
				window.open ("check.php?i="+document.formUye.KulAd.value,"control",config);
			}
			function CheckForm () {
				if (document.formUye.KulAd.value==""){alert("L�tfen t�m alanlar� doldurunuz !\n");return false;}
				else if (document.formUye.KulPar.value==""){alert("L�tfen t�m alanlar� doldurunuz !\n");return false;}
				else if (document.formUye.KulPar2.value==""){alert("L�tfen t�m alanlar� doldurunuz !\n");return false;}
				else if (document.formUye.EPosta.value==""){alert("L�tfen t�m alanlar� doldurunuz !\n");return false;}
				else if (document.formUye.KulPar.value!=document.formUye.KulPar2.value){alert("Parolalar�n�z birbiriyle uyu�muyor !\n");return false;}
				else if (document.formUye.KulPar.value.length<6){alert("Parolan�z 6 haneden k�sa olamaz !\n");return false;}
				else {return true;}
			}
			// --></script><script src="data/ajax_username.js"></script> 
			<form name="formUye" id="formUye" method="post" action="?uyeaction=newuser" onSubmit="return CheckForm();"><table align="center" border="0" cellpadding="0" cellspacing="0" width="95%">
				<tr><th colspan="2" align="center">�yelik Formu</th></tr>
				<? if($Submit or $err) {?>
					<tr><td colspan='2' align='center'>&nbsp;<hr>&nbsp;</td></tr><? 
					if($Submit and (($KulAd=="") or ($KulPar=="") or ($KulPar2=="") or ($EPosta=="") or ($Tel=="") or ($Adres=="") or ($sehir==""))){?>
						<tr><td colspan=2 align=center><font class='hatan'>L�tfen bo� k�s�mlar� doldurun !</font></td></tr><? }
					if($Submit and ($KulPar!=$KulPar2)){?><tr><td colspan=2 align=center><font class='hatan'>Parolalar�n�z birbiriyle uyu�muyor !</font></td></tr><? }
					if($Submit and (strlen($KulPar)<6)){?><tr><td colspan=2 align=center><font class='hatan'>Parolan�z 6 haneden k�sa olamaz !</font></td></tr><? }
					if($err=="mail"){?><tr><td colspan=2 align=center><font class='hatan'>L�tfen ge�erli bir mail adresi giriniz !</font></td></tr><? }
					if($err=="name"){?><tr><td colspan=2 align=center><font class='hatan'>Se�ti�iniz kullan�c� ad� kullan�lmaktad�r !</font></td></tr><? }?>
					<tr><td colspan='2' align='center'>&nbsp;<hr>&nbsp;<br /><br /></td></tr><? 
				}?>
				<tr><td colspan="2" background="images/index/fon_bar01.gif">
					<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Kullan�c� Bilgileri&nbsp; </td></tr></table>
				</td></tr>
				<tr><td width="30%">Kullan�c� Ad�n�z *</td><td><input size="20" type="text" name="KulAd" value="<? echo("$KulAd"); ?>" onblur="check_username(this.value)" onfocus="javascript:document.getElementById('hint_username').innerHTML='';" > &nbsp; <span id="hint_username"></span></td></tr>
				<tr><td>Kullan�c� Parolan�z *</td><td><input size="20" type="password" name="KulPar" value="<? echo("$KulPar"); ?>" onblur="kontrolet('parola');" onfocus="javascript:document.getElementById('hint_parola').innerHTML='';" >
					<SMALL><SPAN style="COLOR: #666666">(Min. 6 hane)</SPAN></SMALL></td></tr>
				<tr><td>Kullan�c� Parolan�z *</td><td><input size="20" type="password" name="KulPar2" value="<? echo("$KulPar2"); ?>" onblur="kontrolet('parola');" onfocus="javascript:document.getElementById('hint_parola').innerHTML='';" >
					<SMALL><SPAN style="COLOR: #666666">(Tekrar)</SPAN></SMALL></td></tr>
				<tr><td></td><td><span id="hint_parola"></span></td></tr>
				<tr><td><br /><br /><br /></td></tr>
				<tr><td colspan="2" background="images/index/fon_bar01.gif">
					<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Ki�isel Bilgileriniz&nbsp; </td></tr></table>
				</td></tr>
				<tr><td>E-Posta Adresiniz *</td><td valign="top"><input size="20" type="text" name="EPosta" value="<? echo("$EPosta"); ?>" onblur="kontrolet('eposta');" onfocus="javascript:document.getElementById('hint_mail').innerHTML='';" >
					<SMALL><SPAN style="COLOR: #666666">(�yeli�iniz adresinize g�nderilecek e-postayla onaylanacakt�r)</SPAN></SMALL></td></tr>
				<tr><td></td><td><span id="hint_mail"></span></td></tr>
				<tr><td>�zel Sorunuz</td><td><select name="ozelsoru">
					<option value="1" <? if($ozelsoru==1){ echo("selected='selected'");} ?>>En be�endi�iniz sporcu kimdir?</option>
					<option value="2" <? if($ozelsoru==2){ echo("selected='selected'");} ?>>En sevdi�iniz ��retmeniniz kimdir?</option>
					<option value="3" <? if($ozelsoru==3){ echo("selected='selected'");} ?>>�lkokulunuzun ad� nedir?</option>
					<option value="4" <? if($ozelsoru==4){ echo("selected='selected'");} ?>>En sevdi�iniz oyuncu/yazar kimdir?</option>
					<option value="5" <? if($ozelsoru==5){ echo("selected='selected'");} ?>>�lk oyunca��n�z neydi?</option>
					<option value="6" <? if($ozelsoru==6){ echo("selected='selected'");} ?>>Evcil hayvan�n�z�n ad� nedir?</option>
					<option value="7" <? if($ozelsoru==7){ echo("selected='selected'");} ?>>En b�y�k kahram�n�z kim?</option>
				</select></td></tr>
				<tr><td>Cevab�n�z</td><td><input size="20" type="text" name="ozelcevap" value="<? echo("$ozelcevap"); ?>"></td></tr>
				<tr><td><br /><br /><br /></td></tr>
				<tr><td colspan="2" background="images/index/fon_bar01.gif">
					<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Kargo Bilgileriniz&nbsp; </td></tr></table>
				</td></tr>
				<tr><td>Ad�n�z</td><td><input size="20" type="text" name="Ad" value="<? echo("$Ad"); ?>"></td></tr>
				<tr><td>Soyad�n�z</td><td><input size="20" type="text" name="Soyad" value="<? echo("$Soyad"); ?>"></td></tr>
				<tr><td>Telefonunuz</td><td><input size="20" type="text" name="Tel" value="<? echo("$Tel"); ?>"></td></tr>
				<tr><td>Adresiniz</td><td><textarea cols="40" rows="5" name="Adres"><? echo("$Adres"); ?></textarea></td></tr>
				<tr><td>�ehir</td><td>
			  		<select size="1" name="sehir">
                		<? $sec_sehir="select * from sehir order by plaka Asc";$sor_sehir=mysql_query($sec_sehir);
						while($oku_sehir=mysql_fetch_assoc($sor_sehir)){if($oku_sehir[plaka]!='00'){?> <option value='<? echo("$oku_sehir[plaka]");?>'<? if($sehir==$oku_sehir[plaka])echo" selected='selected'";?>><? echo("$oku_sehir[ad]");?></option><? }}?>
                		<option value="00"<? if($sehir=='00')echo" selected='selected'";?>>Di�er Yerler</option>
              		</select></td>
				</tr>
				<tr><td>�l�e</td><td><input size="20" type="text" name="ilce" value="<? echo("$ilce"); ?>"></td></tr>
				<tr><td><br /><br /><br /></td></tr>
				<tr><td colspan="2" background="images/index/fon_bar01.gif">
					<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Kullan�c� S�zle�mesi&nbsp; </td></tr></table>
				</td></tr>
				<tr><td>Kullan�c� S�zle�mesi</td><td><textarea cols="40" rows="5" name="kulsozu"></textarea></td></tr>
				<tr><td colspan="2" align="center">&nbsp;&nbsp;</td></tr>
				<tr><td colspan="2" align="center"><input type="hidden" value="<? echo"$PHPSESSID";?>" name="psid" /><br /><input type="submit" name="Submit" value=" S�zle�meyi Okudum ve �artlar� Kabul Ediyorum "></td></tr>
			</table></form>
			<script language="javascript">document.formUye.KulAd.focus();</script>
	<? } else if(($Submit) and ($psid==$PHPSESSID)) {
			if(ereg("(^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,4})$)",$EPosta)){}else{echo "<script language=\"JavaScript\">window.location.href = '?uyeaction=newuser&err=mail';</script>";exit();}
			$KulAd=htmlspecialchars($KulAd,ENT_QUOTES);$KulPar=htmlspecialchars($KulPar,ENT_QUOTES);
			$sec="select * from uye_active where username='$KulAd'";$sor=mysql_query($sec);$sat_num=mysql_num_rows($sor);
			$sec2="select * from uye_passive where username='$KulAd'";$sor2=mysql_query($sec2);$sat_num2=mysql_num_rows($sor2);
			if(($sat_num>0) or ($sat_num2>0)) {echo "<script language=\"JavaScript\">window.location.href = '?uyeaction=newuser&err=name';</script>";exit();
			}else {
				//ilk �nce aktivasyon �ifresi hesaplan�yor.
				for ($i=0;$i<10;$i++) $activePass.=chr(rand(97,122)).chr(rand(65,90));
				//sonra uyemiz kaydediliyor...
				$KulPar=md5($KulPar);$ozelcevap=md5($ozelcevap);$activePass=md5($activePass);$trh=date("d/m/Y");
				$KulAd=htmlspecialchars($KulAd,ENT_QUOTES);$KulPar=htmlspecialchars($KulPar,ENT_QUOTES);$ad=htmlspecialchars($ad,ENT_QUOTES);$soyad=htmlspecialchars($soyad,ENT_QUOTES);$tel=htmlspecialchars($tel,ENT_QUOTES);$adres=htmlspecialchars($adres,ENT_QUOTES);$ilce=htmlspecialchars($ilce,ENT_QUOTES);
				$ekle=mysql_query("INSERT INTO uye_passive(activePass,ad,soyad,username,userpass,EPosta,tel,adres,sehir,ilce,ozelsoru,ozelcevap,tarih) VALUES ('$activePass','$Ad','$Soyad','$KulAd','$KulPar','$EPosta','$Tel','$Adres','$sehir','$ilce','$ozelsoru','$ozelcevap','$trh')");
				if($ekle){
					//son olarak da mail at�l�yor.
					$email_govdesi="<html><head><title>�yelik Onay Mektubu</title></head><body><table><tr><td>Merhaba ".$ad." ".$soyad."</td></tr>";
					$email_govdesi.= "<tr><td>Kay�t oldu�unuz i�in te�ekk�rler.</td></tr>";
					$email_govdesi.= "<tr><td>E-posta adresinizi do�rulamak i�in, l�tfen a�a��daki ba�lant�ya t�klay�n.</td></tr>";
					$email_govdesi.= "<tr><td><br /><a href='http://www.hesaplialsat.com/uye.php?uyeaction=uye_passive&a=$activePass&p=$KulPar'>http://www.hesaplialsat.com/uye.php?uyeaction=uye_passive&a=$activePass&p=$KulPar</a><br /><br /></td></tr>";
					$email_govdesi.= "<tr><td>Bu sizi do�rudan e-posta do�rulama sayfas�na g�t�rmelidir. E�er �yle olmuyorsa, l�tfen URL'nin tamam�n� web taray�c�n�z�n adres kutusuna kopyalay�p yap��t�r�n ve klavyeniz �zerinde &quot;Enter&quot; tu�una bas�n.</td></tr>";
					$email_govdesi.= "<tr><td>Te�ekk�rler !"."</td></tr></table></body></html>";
					$headers = "MIME-Version: 1.0"."\r\n";
					$headers.= "Content-type:text/html;charset=windows-1254"."\r\n";
					$headers.= "Return-Path: info@hesaplialsat.com"."\r\n";
					$headers.= 'From: Hesapl� Al Sat <info@hesaplialsat.com>'."\r\n";
					if (@mail($EPosta,"�yelik Onay Mektubu",$email_govdesi,$headers))echo SayfaOrtala("�yelik onay mektubu e-posta adresinize g�nderildi.<br>");else echo SayfaOrtala("�yelik onay mektubu g�nderilemedi.<br>L�tfen daha sonra aktivasyon postam� g�nder linkinden tekrar deneyin !");
				}else{echo SayfaOrtala("�yelik kayd�n�z yap�lamad�. L�tfen daha sonra deneyin.");}
			}
	}
    
	
	
	
	
} else { 
	 	if($p){$uye_page="uye.php?p=$p";if($ph){$uye_page.="&ph=$ph";}if($i){$uye_page.="&i=$i";}if($info){$uye_page.="&info=$info";}}else{$uye_page="uye.php";}?>
		<script language="JavaScript"><!-- 
		function CheckForm2 () {
			if (document.formUye2.KulAd.value==""){alert("L�tfen t�m alanlar� doldurunuz !\n");return false;}
			else if (document.formUye2.KulPar.value==""){alert("L�tfen t�m alanlar� doldurunuz !\n");return false;}
			else {return true;}
		}
		// --></script>
		<form name="formUye2" action="<? echo"$uye_page"; ?>" method="post" onSubmit="return CheckForm2();" autocomplete="off"><table border="0" cellpadding="0" cellspacing="0" align="center" width="80%">
			<tr><td colspan="2"><br><br><br><br><br></td></tr>
			<? if($oturum){
				if($KulAd==""){?><tr><td colspan='2' align='center'><font color='#FF0000' style='font-weight:bold;'>L�tfen kullan�c� ad�n�z� girin.</font></td></tr><? }
				if($KulPar==""){?><tr><td colspan='2' align='center'><font color='#FF0000' style='font-weight:bold;'>L�tfen kullan�c� �ifrenizi girin.</font></td></tr><? }
			} 
			if($err=="nouser"){?><tr><td colspan='2' align='center'><font color='#FF0000' style='font-weight:bold;'>Girdi�iniz kullan�c� ad� veya �ifre hatal� !</font></td></tr><? }?>
			<tr><td colspan="2"><br>
				<table width="80%" border="3" align="center" cellpadding="20" cellspacing="2"><tr><td align="center">
      				<br /><br /><table border="0" cellpadding="0" cellspacing="0" align="center" width="80%"><tr>
					<td>Kullan�c� Ad�n�z</td><td><input type="text" name="KulAd" /></td></tr>
					<tr><td>Kullan�c� �ifreniz</td><td><input type="password" name="KulPar" /></td></tr>
					<tr><td colspan="2" align="center"><input type="hidden" value="<? echo"$PHPSESSID";?>" name="psid" /><br /><input type="submit" value="  Oturum A�  " name="oturum" /></td></tr></table><br />
      			</td></tr></table><br /><br /><br /><br />
			</td></tr>
			<tr><td colspan="2"><a href="?uyeaction=lostpass">�ifremi unuttum !</a></td></tr>
			<tr><td colspan="2"><a href="?uyeaction=newuser">�ye olmak istiyorum !</a></td></tr>
			<tr><td colspan="2"><a href="?uyeaction=activate">Aktivasyon postam gelmedi !</a></td></tr>
		</table></form>
		<script language="javascript">document.formUye2.KulAd.focus();</script>
<? }
include("alt.php"); ?>
