<? 
mysql_connect("localhost","root")||("Ba&#287;lant&#305; ger�ekle&#351;medi !");
mysql_select_db("veri")||("Veritaban&#305; se�ilemedi !");
setlocale ("LC_TIME", "TR");

if($uyeaction=="logout"){$_SESSION["UserID"]="";header("location:kategori.php");}
if(($oturum) and ($KulAd<>"") and ($KulPar<>"") and ($psid==$PHPSESSID)){
		$KulAd=htmlspecialchars($KulAd,ENT_QUOTES);$KulPar=htmlspecialchars($KulPar,ENT_QUOTES);
		$KulPar=md5($KulPar);$sec="select * from uye_active where username='$KulAd' and userpass='$KulPar'";$sor=mysql_query($sec);$sat=mysql_num_rows($sor);
		if($sat==1){
			$oku=mysql_fetch_assoc($sor);$_SESSION["UserName"]=$oku[ad];$_SESSION["UserID"]=$oku[id];
			$sec="select * from sepet where MusteriID='$PHPSESSID'";$sor=mysql_query($sec);
			while($oku=mysql_fetch_assoc($sor))$guncelle=mysql_query("UPDATE sepet SET MusteriID='$_SESSION[UserID]' where MusteriID='$PHPSESSID'");
	 		if($p and !$ph){$uye_page="$p.php";if($i){$uye_page.="?i=$i";}if($info){$uye_page.="&info=$info";}}else{$uye_page="hesap.php";if($ph){$uye_page.="?p=$ph";}if($i){$uye_page.="&i=$i";}}
			header("location:".$uye_page);
		} else header("location:uye.php?p=$p&err=nouser");
}


function SearchShow($okutarih,$okuid,$okutitle,$okufiyat,$okubold,$okuhemen,$i){
	$klnzmn=formatetimestamp($okutarih,"no"); 
	if($klnzmn){
		$resim_sec="select * from stok_resim where StokID='$okuid'";$resim_sor=mysql_query($resim_sec);$resim_oku=mysql_fetch_assoc($resim_sor);
		$en_yuksek="select * from stok_teklif where StokID='$okuid' order by teklif desc";$en_sor=mysql_query($en_yuksek);$en_oku=mysql_fetch_assoc($en_sor);
		if($okufiyat<$en_oku[teklif])$fiyat=$en_oku[teklif];else $fiyat=$okufiyat;?>
		<tr bgcolor="<? if($i==0){echo"#BCE0FE";$i++;}else{echo"#80C5FD";$i=0;} ?>">
			<td width="70">
				<a href='detay.php?i=<? echo"$okuid";?>'><img alt="<? echo"$okutitle";?>" src="<? if($resim_oku[resimtitle])echo"uploads/$resim_oku[resimtitle]";else echo"images/index/nophoto.gif";?>" border="0" height="70" width="70" /></a>
			</td>
			<td>&nbsp;<a href='detay.php?i=<? echo"$okuid";?>'><? if($okubold==1)echo"<b>$okutitle</b>";else echo"$okutitle";?></a></td>
			<td align="center"><? if($okufiyat){echo"Fiyat�: <b>$fiyat</b> YTL<br />";}?><? if($okuhemen){echo"Heman Al! fiyat�: <b>$okuhemen</b> YTL";}?></td>
			<td align="center"><? echo "$klnzmn"; ?></td>
			<td align="center">
				<? if($okufiyat){?><a href="detay.php?i=<? echo "$okuid";?>#tklf"><img alt="Teklif Ver !" border="0" src="images/btn/b_teklif.gif" /></a><br /><? }?>
				<? if($okuhemen){?>
					<a href='hemenal.php?i=<? echo"$okuid"?>'><img alt='Hemen Al !' border='0' src='images/btn/b_hemen.gif' /></a>
					<br /><a href="sepet.php?act=ekle&i=<? echo"$okuid";?>">Sepete Ekle !</a><br />
				<? }?>
				<a href="<? if (!$_SESSION["UserName"] or !$_SESSION["UserID"])echo"uye.php?p=hesap&ph=izle&i=$okuid";else echo"hesap.php?p=izle&i=$okuid";?>">�zlemeye Al !</a>
			</td>
		</tr>
	<? }
	return $i;
}
function SearchShow2($okutarih,$okuid,$okutitle,$okufiyat,$okubold,$okuhemen,$okumusteriID,$i,$songunmu){
	$klnzmn=formatetimestamp($okutarih,$songunmu); 
	if($klnzmn){
		$resim_sec="select * from stok_resim where StokID='$okuid'";$resim_sor=mysql_query($resim_sec);$resim_oku=mysql_fetch_assoc($resim_sor);
		$en_yuksek="select * from stok_teklif where StokID='$okuid' order by teklif desc";$en_sor=mysql_query($en_yuksek);$en_oku=mysql_fetch_assoc($en_sor);
		$uye_puan_sec="select * from uye_puan where verilenMID='$okumusteriID' and puan>'0'";$uye_puan_sor=mysql_query($uye_puan_sec);$uye_puan_say=mysql_num_rows($uye_puan_sor);$uye_puan_MID=0;$nouye_puan_MID=5;
		if($uye_puan_say>0){while($uye_puan_oku=mysql_fetch_assoc($uye_puan_sor)){$uye_puan_MID=$uye_puan_MID+$uye_puan_oku[puan];}$uye_puan_MID=$uye_puan_MID/$uye_puan_say;$uye_puan_MID=ceil($uye_puan_MID);$nouye_puan_MID=5-$uye_puan_MID;}
		if($okufiyat<$en_oku[teklif])$okufiyat=$en_oku[teklif];if($okufiyat>$okuhemen)$okuhemen=0;
		if($i==0)echo"<tr>"; ?><td width="50%" style="border-style:solid; border:thin; border-color:#1A99D7;" bgcolor="#D8EDFE">
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr><td width="75" rowspan="4" align="right" valign="top"><br />
				<a href='detay.php?i=<? echo"$okuid";?>'><img alt="<? echo"$okutitle";?>" src="<? if($resim_oku[resimtitle])echo"uploads/$resim_oku[resimtitle]";else echo"images/index/nophoto.gif";?>" border="0" height="70" width="70" /></a>
			</td></tr>
			<tr><td align="center"><big>&nbsp;<a href='detay.php?i=<? echo"$okuid";?>'><? if ($okubold==1) echo"<b>$okutitle</b>";else echo"$okutitle";?></a><br /><br /></big></td></tr>
			<tr><td align="center"><? if($okufiyat){echo"Fiyat�: <b>$okufiyat</b> YTL";}if($okuhemen){echo" &nbsp;&nbsp;Hemen Al: <b>$okuhemen</b> YTL";}?></td></tr>
			<tr><td align="center">
				<? if($okufiyat){?><a href="detay.php?i=<? echo "$okuid";?>#tklf"><img alt="Teklif Ver !" border="0" src="images/btn/b_teklif.gif" /></a><? }?>
				<? if($okuhemen){?>&nbsp;&nbsp;<a href='hemenal.php?i=<? echo"$okuid"?>'><img alt='Hemen Al !' border='0' src='images/btn/b_hemen.gif' /></a><? }?>
			</td></tr><tr><td colspan="2"><br /></td></tr>
			<tr><td align="right">
				Sat�c�: &nbsp; </td><td><a href="uye.php?uyeaction=profile&i=<? echo"$okumusteriID";?>"><? echo LearnUser($okumusteriID)." ";
				while($uye_puan_MID){echo"<img src='images/index/star.gif' border='0' />";$uye_puan_MID--;}while($nouye_puan_MID){echo"<img src='images/index/star2.gif' border='0' />";$nouye_puan_MID--;}?></a>
			</td></tr>
			<tr><td align="right">Kalan S�re: &nbsp; </td><td><? echo"$klnzmn"; ?></td></tr>
		</table>
		<? if($i==0){echo"</td>";$i++;}else{echo"</td></tr>";$i=0;}
	}
	return $i;
}
function SayfaOrtala($sText){return "<table width='100%' height='100%' border='0' cellpadding='0' cellspacing='0'><tr><td align='center' valign='middle'>$sText</td></tr></table>";}
function LearnCat($c_id){$sor=mysql_query("select KategoriAd from kategori where id='$c_id'");$oku=mysql_fetch_assoc($sor);return $oku[KategoriAd];}
function LearnUser($u_id){$sor=mysql_query("select username from uye_active where id='$u_id'");$oku=mysql_fetch_assoc($sor);return $oku[username];}
function LearnStok($u_id){$sor=mysql_query("select title from stok where id='$u_id'");$oku=mysql_fetch_assoc($sor);return $oku[title];}
function formatetimestamp($tarih1,$sonmu){
	$tarih2=time();$difference=$tarih1-$tarih2;$days=floor($difference/86400);$difference=$difference-($days*86400);
	if($sonmu=="no"){if($days<0){return false;exit();}}
	else if($sonmu=="yes"){if(($days<0) or ($days>=1)){return false;exit();}}
	$hours = floor($difference/3600);$difference = $difference - ($hours*3600);if($hours<0){return false;exit();}
	$minutes = floor($difference/60);$difference = $difference - ($minutes*60);if($minutes<0){return false;exit();}
	$seconds = $difference;if($seconds<0){return false;exit();}
	if($days>0){$klnzmn="$days g�n ";if($hours>0)$klnzmn="$days g�n $hours"."s:$minutes"."dk";else $klnzmn.="$minutes"."dk:$seconds sn";
	}else{if($hours>0){$klnzmn.="$hours"."s:$minutes"."dk";}else{if($minutes>0){$klnzmn.="$minutes"."dk:$seconds sn";}else{$klnzmn="$seconds sn";}}}
	return $klnzmn;
}
?>
