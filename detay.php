<? include ("ust.php");
if($teklifbtn and intval($teklifmiktar)>0){
	if ($_SESSION["UserID"]==""){echo "<script language=\"JavaScript\">window.location.href = 'uye.php?p=detay&i=$i';</script>";exit();}
	$sec="select * from stok where id='$i'";$sor=mysql_query($sec);$oku=mysql_fetch_assoc($sor);
	if($oku[MusteriID]==$_SESSION["UserID"])echo "<script language=\"JavaScript\">window.location.href = '?i=$i&teklif=you#tklf';</script>";
	$klnzmn=formatetimestamp($oku[tarih],"no");$teklifmiktar=intval($teklifmiktar);
	if($klnzmn){
	 	$en_yuksek="select teklif from stok_teklif where StokID='$i' order by teklif desc";$en_sor=mysql_query($en_yuksek);$en_oku=mysql_fetch_assoc($en_sor);
		if(($teklifmiktar>$en_oku[teklif]) and ($teklifmiktar>=$oku[fiyat])){
			$teklif_yaz="insert into stok_teklif(MusteriID,StokID,teklif) values('$_SESSION[UserID]','$i','$teklifmiktar')  ";$teklif_sor=mysql_query($teklif_yaz);
			if($teklif_sor)echo "<script language=\"JavaScript\">window.location.href = '?i=$i&teklif=yes#tklf';</script>";
			else echo "<script language=\"JavaScript\">window.location.href = '?i=$i&teklif=no#tklf';</script>";
			exit();
		}else if($teklifmiktar<=$en_oku[teklif]) echo "<script language=\"JavaScript\">window.location.href = '?i=$i&teklif=small#tklf';</script>";
		else if($teklifmiktar<$oku[fiyat]) echo "<script language=\"JavaScript\">window.location.href = '?i=$i&teklif=fiyat#tklf';</script>";
	}else echo "<script language=\"JavaScript\">window.location.href = '?i=$i&teklif=sure#tklf';</script>";
}else{
	$sec="select * from stok where id='$i'";$sor=mysql_query($sec);$oku=mysql_fetch_assoc($sor); 
	$klnzmn=formatetimestamp($oku[tarih],"no");if(!$klnzmn){$klnzmn="Süresi dolmuþtur !";}if($oku[tarih]<10){$klnzmn="$oku[tarih] günlük ürün henüz iþleme alýnmadý.";}?>
	<script language="JavaScript"><!-- 
		function CheckForm () {
			if (document.frmTeklif.teklifmiktar.value==""){alert("Lütfen teklif miktrýnýzý giriniz !");return false;}
			else if (document.frmTeklif.teklifmiktar.value<"0"){alert("Lütfen teklif miktrýnýzý giriniz !");return false;}
			else {return true;}
		}
		function win(url) {
			config='toolbar=no,location=no,directories=no,status=no,menubar=no,width=400,height=300,top=30,left=40,scrollbars=yes,resizable=yes';
			window.open ('upload.php?a='+url,"Resimci",config);
		}
	// --></script>
		<? $sec3="select * from uye_active where id='$oku[MusteriID]'";$sor3=mysql_query($sec3);$oku3=mysql_fetch_assoc($sor3);
		$en_yuksek="select * from stok_teklif where StokID='$i' order by teklif desc";$en_sor=mysql_query($en_yuksek);$en_oku=mysql_fetch_assoc($en_sor);
		if($oku[fiyat]<$en_oku[teklif])$fiyat=$en_oku[teklif];else $fiyat=$oku[fiyat];
		$sec_sehir=mysql_query("select ad from sehir where plaka='$oku[krgSehir]'");$oku_sehir=mysql_fetch_assoc($sec_sehir);?>
		<table width="95%" align="center" border="0" cellpadding="0" cellspacing="0">
			<tr><th colspan="2" align="center"><h1><font size="+3"><? echo"$oku[title]" ?></font></h1></th></tr>
			<tr><td colspan="2" background="images/index/fon_bar01.gif">
				<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Ürün Bilgisi&nbsp; </td></tr></table>
			</td></tr>
			<? if($oku[fiyat])echo"<tr><td width='20%'>Þu anki Fiyatý </td><td>: &nbsp;$fiyat YTL</td></tr>";?>
			<? if(($oku[hemen]>0) and ($fiyat<$oku[hemen])){echo"<tr><td width='20%'>Hemen Al! fiyatý </td><td>: &nbsp;$oku[hemen] YTL</td>";}?>
			<tr><td>Kalan Süre </td><td>: &nbsp;<? echo"$klnzmn";?></td></tr>
			<tr><td colspan="2">&nbsp;</td></tr>
			<tr><td>Ürün </td><td>: &nbsp;<? echo"$oku[adet] adet $oku[title]" ?></td></tr>
			<tr><td>Kategorisi </td><td>: &nbsp;<? echo LearnCat($oku[KatID]); ?></td></tr>
			<? if($oku[fiyat])echo"<tr><td>Açýlýþ Fiyatý </td><td>: &nbsp;$oku[fiyat] YTL</td></tr>";?>
			<tr><td>Sahibi </td><td>: &nbsp;<? echo"$oku3[username]" ?></td></tr>
			<tr><td colspan="2"><br /><br /><br /></td></tr>
			<tr><td colspan="2" background="images/index/fon_bar01.gif">
				<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Açýklama&nbsp; </td></tr></table>
			</td></tr>
			<tr><td colspan="2"><? echo"$oku[ozellik]"; ?><br /><br /><br /></td></tr>
			<? $sec="select * from stok_resim where StokID='$i'";$sor=mysql_query($sec);$sat=mysql_num_rows($sor);
			if($sat>0){?>
				<tr><td colspan="2" background="images/index/fon_bar01.gif">
					<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Ürün Resimleri&nbsp; </td></tr></table>
				</td></tr>
				<tr><td colspan="2" align="center">
					<? while($okuresim=mysql_fetch_assoc($sor)){?>
						<a href="#r" onclick="win('<? echo"$okuresim[resimtitle]";?>')" title="Büyütmek için týklayýnýz"><img alt="" src="uploads/<? echo"$okuresim[resimtitle]";?>" border="1" height="70" width="70" /></a>
						<? $picNo++;if($picNo==8){echo"<br />";$picNo=0;}
					} ?><a name="r"></a>
				</td></tr>
				<tr><td colspan="2"><br /><br /><br /></td></tr>
			<? }?>
			<tr><td colspan="2" background="images/index/fon_bar01.gif">
				<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Kargo Bilgileri&nbsp; </td></tr></table>
			</td></tr>
			<tr><td>Bulunduðu þehir </td><td>: &nbsp;<? echo"$oku_sehir[ad]" ?></td></tr>
			<tr><td>Kargo Ücreti </td><td>: &nbsp;<? if($krgUcret==0){echo"Alýcý Öder";}else if($krgUcret==1){echo"Satýcý Öder";}?></td></tr>
			<tr><td>Kargo Notu </td><td>: &nbsp;<? echo"$oku[krgNot]" ?></td></tr>
			<tr><td colspan="2"><br /><br /><br /></td></tr>
			<tr><td colspan="2" background="images/index/fon_bar01.gif">
				<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Teklif&nbsp; </td></tr></table>
			</td></tr>
			<tr><td colspan="2" align="center">
				<? if($teklif=="yes")echo"Teklifiniz kabul edildi !<br />";
				else if($teklif=="no")echo"Teklifiniz kabul edilemedi !<br />";
				else if($teklif=="you")echo"Teklifiniz reddedildi ! Kendi sattýðýnýz ürüne teklif veremezsiniz !<br />";
				else if($teklif=="small")echo"Teklifiniz reddedildi ! Verdiðiniz tekliften daha yüksek teklif var !<br />";
				else if($teklif=="fiyat")echo"Teklifiniz reddedildi ! Verdiðiniz teklif malýn fiyatýndan düþük !<br />";
				else if($teklif=="sure")echo"Teklifiniz reddedildi ! Malýn teklif süresi sona ermiþtir !<br />";
				if($en_oku[teklif]>0){
					$sec3="select * from uye_active where id='$en_oku[MusteriID]'";$sor3=mysql_query($sec3);$oku3=mysql_fetch_assoc($sor3); 
					echo "En yüksek teklif=$en_oku[teklif] YTL<br />Teklifi veren: $oku3[username]";
				}
				else echo"Henüz teklif verilmedi !";?><br /><br />
			</td></tr>
			<? if(($klnzmn!="Süresi dolmuþtur !") and $oku[MusteriID]!=$_SESSION["UserID"]){?>
				<tr><td colspan="2" align="center"><a name="tklf"></a>
	  				<table cellpadding="0" cellspacing="5" width="100%"><tr>
						<? if($fiyat){?>
							<td bgcolor="#EBF8FE"<? if(($oku[hemen]==0) and ($fiyat<$oku[hemen]))echo" colpan='2'";?>><br />
								<form name="frmTeklif" action="?i=<? echo"$i"; ?>" method="post" onsubmit="return CheckForm();">
			   						<input type="text" name="teklifmiktar" size="7" /> YTL &nbsp;
									<input type="hidden" value="<? echo"$PHPSESSID";?>" name="psid" />
									<input type="submit" value="Teklif Ver" name="teklifbtn" />
									<input type="hidden" value="teklif" name="teklifbtn" />
								</form>
								<br /><a href="hesap.php?p=izle&i=<? echo"$i";?>">Ýzlemeye Al !</a>
							</td>
						<? } if(($oku[hemen]>0) and ($fiyat<$oku[hemen])){?>
							<td bgcolor="#EBF8FE"<? if(!$fiyat)echo" colpan='2'";?>><br />
								<form name="frmHemen" action="hemenal.php?i=<? echo"$i";?>" method="post">
									Hemen Al! fiyatý : &nbsp;<? echo"$oku[hemen]";?> YTL &nbsp;
									<input type="hidden" value="<? echo"$PHPSESSID";?>" name="psid" />
									<input type="submit" name="hemen" value="Hemen Al !" />
									<input type="hidden" value="hemenal" name="hemen" />
								</form>
								<br /><a href="sepet.php?act=ekle&i=<? echo"$i";?>">Sepete Ekle !</a>
							</td>
						<? }?>
					</tr></table>
				</td></tr>
			<? }else if(($klnzmn=="Süresi dolmuþtur !") and ($en_oku[MusteriID]==$_SESSION["UserID"])){?>
				<tr><td colspan="2" align="center"><a name="tklf"></a>
					<a href="hemenal.php?i=<? echo"$i&info=$_SESSION[UserID]";?>">Bu malzemeyi alabilirsiniz. Lütfen adres bilgilerinizi kontrol edin ve malzemenin ücretini ödeyin.</a>
				</td></tr>
			<? }
			if(($oku[durum]=='0') and ($oku[MusteriID]==$_SESSION["UserID"])){?>
				<tr><td colspan="2" align="center">&nbsp;<hr>&nbsp;</td></tr>
				<tr><td colspan="2"  align="center"><input type="button" value="Düzenle" onclick="javascript:window.location.href='sat.php?i=<? echo"$i";?>';" /></td></tr>
			<? }?>
		</table>
<? }; include ("alt.php") ?>