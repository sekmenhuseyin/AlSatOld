<? include ("ust.php");
if ($_SESSION["UserID"]=="") {$uye_page="hesap";if($p){$uye_page.="&ph=$p";}if($i){$uye_page.="&i=$i";}echo "<script language=\"JavaScript\">window.location.href = 'uye.php?p=$uye_page';</script>";exit(); } 
if($islem=="htrlt"){
	$sec=mysql_query("select * from stok where id='$i'");$oku=mysql_fetch_assoc($sec);
	$sec2=mysql_query("select * from uye_active where id='$oku[MusteriID]'");$oku2=mysql_fetch_assoc($sec2);
	$en_yuksek=mysql_query("select teklif from stok_teklif where StokID='$i' order by teklif desc");$en_oku=mysql_fetch_assoc($en_yuksek);$ucret=$en_oku[teklif];
	$resim_sec=mysql_query("select * from stok_resim where StokID='$i' and MusteriID=$_SESSION[UserID]");
	//mail içeriði
	$email_govdesi="<html><head><title>Ödeme Hatýrlatma</title></head><body><table><tr><td>Merhaba $oku2[ad]</td></tr>";
	$email_govdesi.= "<tr><td><b>'$oku[title]'</b> adlý ürüne verdiðiniz $ucret liralýk teklif kabul edildi.</td></tr><tr><td align='center'>";
	while($resim_oku=mysql_fetch_assoc($resim_sec)){
		$email_govdesi.= "<a href='http://www.hesaplialsat.com/upload.php?a=$resim_oku[resimtitle]' title='Büyütmek için týklayýnýz' target='_blank'><img src='http://www.hesaplialsat.com/uploads/$resim_oku[resimtitle]' border='0' width='70' height='70' />";
		$picNo++;if($picNo==8){echo"</td></tr><tr><td align='center'>";$picNo=0;}
	}
	$email_govdesi.= "</td></tr><tr><td>En kýsa sürede bu parayý hesabýmýza yatýrmanýz ve sitemizden ücreti yatýrdýðýnýzý belirten linki týklamanýz gerekmektedir.</td></tr>";
	$email_govdesi.= "<tr><td><br /><a href='http://www.hesaplialsat.com/hemenal.php?i=$i&info=timeout'>http://www.hesaplialsat.com/hemenal.php?i=$i&info=timeout</a><br /><br /></td></tr>";
	$email_govdesi.= "<tr><td>Bu sizi doðrudan ürün ödeme sayfasýna götürmelidir. Eðer öyle olmuyorsa, lütfen URL'nin tamamýný web tarayýcýnýzýn adres kutusuna kopyalayýp yapýþtýrýn ve klavyeniz üzerinde &quot;Enter&quot; tuþuna basýn.</td></tr>";
	$email_govdesi.= "<tr><td>Teþekkürler !</td></tr></table></body></html>";
	$headers = "MIME-Version: 1.0"."\r\n";
	$headers.= "Content-type:text/html;charset=windows-1254"."\r\n";
	$headers.= "Return-Path: info@hesaplialsat.com"."\r\n";
	$headers.= 'From: Hesaplý Al Sat <info@hesaplialsat.com>'."\r\n";
	echo"<table width='100%'><tr><td align='center'>";
	if (@mail($oku2[EPosta],"Ödeme Hatýrlatma",$email_govdesi,$headers))echo ("Ödeme hatýrlatma mektubu alýcýya gönderildi.<br>");else echo ("Ödeme hatýrlatma mektubu gönderilemedi.<br>Lütfen daha sonra tekrar deneyin !<br>");
	echo"</td></tr></table>";
}else if($islem=="urun_sil"){
	$sil_stok=mysql_query("delete from stok where id='$i'");
	$sec_resim=mysql_query("select * from stok_resim where MusteriID='$_SESSION[UserID]' and StokID='$i'");
	while($resim_ad=mysql_fetch_assoc($sec_resim)){$j=$resim_ad[id];@unlink("uploads/".$resim_ad[resimtitle]);$sil=mysql_query("delete from stok_resim where id='$j'");}
	echo"<table width='100%'><tr><td align='center'>Ýþleminiz baþarýyla tamamlanmýþtýr !</td></tr></table>";
}?>
<script language="JavaScript"><!-- 
	function searchSwitch(p,t){
		if(p=='1'){
			document.getElementById("stlk_list").style.display='none';
			document.getElementById("stlk_timeout").style.display='none';
			document.getElementById("stlk_ode").style.display='none';
			document.getElementById("stlk_buy").style.display='none';
		}else if(p=='2'){
			document.getElementById("tklf_ver").style.display='none';
			document.getElementById("tklf_win").style.display='none';
			document.getElementById("tklf_lose").style.display='none';
		}
		document.getElementById(t).style.display='';
	}
// --></script>
<?
function StokShow($okuid,$okutitle,$okuKatID,$okufiyat,$okuhemen,$klnzmn,$i,$islem){
	$resim_sec="select * from stok_resim where StokID='$okuid'";$resim_sor=mysql_query($resim_sec);$resim_oku=mysql_fetch_assoc($resim_sor);
	$en_yuksek="select * from stok_teklif where StokID='$okuid' order by teklif desc";$en_sor=mysql_query($en_yuksek);$en_oku=mysql_fetch_assoc($en_sor);?>
	<tr bgcolor="<? if($i==0){echo"#BCE0FE";$i++;}else{echo"#80C5FD";$i=0;} ?>">
		<td width="70"><a href='detay.php?i=<? echo"$okuid";?>'><img alt="<? echo"$okutitle";?>" src="<? if($resim_oku[resimtitle])echo"uploads/$resim_oku[resimtitle]";else echo"images/index/nophoto.gif";?>" border="0" height="70" width="70" /></a></td>
		<td><a href='detay.php?i=<? echo"$okuid";?>'><? if(strlen($okutitle)>25)echo substr($okutitle,0,25)."...";else echo"$okutitle";?></a></td>
		<td><? echo LearnCat($okuKatID);?></td>
		<td><? if($islem==6){echo"Fiyatý: ";}else {echo"Açýlýþ Fiyatý: ";};echo "$okufiyat";?> YTL<br /><? if($okuhemen){echo "Hemen Al !: $okuhemen YTL<br />";}if($en_oku[teklif]){"En Yüksek Teklif: $en_oku[teklif]";}?></td>
		<td align="center"><? if($klnzmn>0)echo"$klnzmn";else if($klnzmn<0)echo -$klnzmn." günlük ürün<br>henüz iþleme alýnmadý.";else echo"Süresi dolmuþtur !";?></td>
		<? if($islem==1){if($en_oku[teklif]){echo"<td align='center'><a href=?i=$okuid&islem=htrlt>Ödeme Hatýrlat</a></td>";}else{?><td align="center">Hiç teklif verilmedi !<br /><input type="button" title="Tekrar Listele" value="Listele" onclick="javascript:window.location.href='sat.php?i=<? echo"$okuid";?>'" /></td><? }}//ödeme hatýrlat?>
		<? if($islem==2){?><td align='center'><input type="button" name="submit" value="Ücreti Öde !" onclick="javascript:window.location.href='sat.php?p=2&i=<? echo"$okuid"?>';" /><? //ücreti öde?>
							<br /><input type="button" name="btn_dzn" value="Düzenle !" onclick="javascript:window.location.href='sat.php?i=<? echo"$okuid"?>';" /><? //listeleme ücreti ödeme?>
							<br /><a href="?i=<? echo"$okuid"?>&islem=urun_sil" onclick="return confirm('------- &nbsp;&nbsp;U y a r &#305;&nbsp;&nbsp; ----------------------------------------------------------- \n\n\Bu ürünü silmek istedi&#287;inizden emin misiniz?')">Ürünü Sil !</a></td><? }//listeleme sil?>
		<? if($islem==4){?><td align='center'><input type="button" name="btn_odeme" value="Ücreti Öde !" onclick="javascript:window.location.href='hemenal.php?i=<? echo"$okuid&info=$_SESSION[UserID]"?>';" /></td><? }//listeleme iptal?>
		<? if($islem==5){?><td align='center'><a href="?i=<? echo"$okuid&islem=urun_send"?>">Ürünü<br />Gönderdim</a></td><? }//listeleme iptal?>
		<? if($islem==6){?><td align="center"><a href="?i=<? echo"$okuid&islem=urun_came"?>">Ürünü Teslim Aldým</a></td><? }//ürün geldi onayý?>
	</tr>
<? return $i;
}
?>
	<table width="95%" border="0" cellspacing="0" cellpadding="0" align="center">
		<tr><td background="images/index/fon_bar01.gif"><table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr>
			<td class="title01"><a href="hesap.php"><? if(!$p)echo"<big>";?>Satýlýða Çýkardýklarým<? if(!$p)echo"</big>";?></a>&nbsp; </td></tr></table>
		</td></tr><tr><td>
			<? if(!$p){?>
				<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center"><tr>
					<td onclick="javascript:searchSwitch('1','stlk_list');" class="title02"><a class="title02" href="#">Listelenenler</a></td>
					<td onclick="javascript:searchSwitch('1','stlk_timeout');" class="title02"><a class="title02" href="#">Zamaný Dolanlar</a></td>
					<td onclick="javascript:searchSwitch('1','stlk_ode');" class="title02"><a class="title02" href="#">Ücreti Ödenecekler</a></td>
					<td onclick="javascript:searchSwitch('1','stlk_buy');" class="title02"><a class="title02" href="#">Sattýklarým</a></td>
				</tr></table><br />
				<div id="stlk_list" name="stlk_list">
				<table width="100%" border="0" cellspacing="0" cellpadding="2" align="center">
					<tr><th>Resim</th><th>Baþlýk</th><th>Kategori</th><th>Fiyat</th><th>Kalan Süre</th></tr>
					<tr><td colspan="6"><hr /></td></tr><? //Listelenenler?>
	    			<? $sec="select id,title,KatID,fiyat,hemen,tarih from stok where MusteriID='$_SESSION[UserID]' and durum='1' order by title Asc";$sor=mysql_query($sec);
					while($oku=mysql_fetch_assoc($sor)){
						$klnzmn=formatetimestamp($oku[tarih],"no"); 
						if($klnzmn)
							$i=StokShow($oku[id],$oku[title],$oku[KatID],$oku[fiyat],$oku[hemen],$klnzmn,$i,"0");
		 			}?>
				</table>
				</div><div id="stlk_timeout" name="stlk_timeout" style="display:none;">
				<table width="100%" border="0" cellspacing="0" cellpadding="2" align="center">
					<tr><th>Resim</th><th>Baþlýk</th><th>Kategori</th><th>Fiyat</th><th>Kalan Süre</th><th>Ýþlem</th></tr>
					<tr><td colspan="6"><hr /></td></tr><? //Zamaný Dolanlar?>
	    			<? $sec="select id,title,KatID,fiyat,hemen,tarih from stok where MusteriID='$_SESSION[UserID]' and durum='1' order by title Asc";$sor=mysql_query($sec);
					while($oku=mysql_fetch_assoc($sor)){
						$klnzmn=formatetimestamp($oku[tarih],"no"); 
						if(!$klnzmn)
							$i=StokShow($oku[id],$oku[title],$oku[KatID],$oku[fiyat],$oku[hemen],$klnzmn,$i,"1");
		 			}?>
				</table>
				</div><div id="stlk_ode" name="stlk_ode" style="display:none;">
				<table width="100%" border="0" cellspacing="0" cellpadding="2" align="center">
					<tr><th>Resim</th><th>Baþlýk</th><th>Kategori</th><th>Fiyat</th><th>Kalan Süre</th><th>Ýþlem</th></tr>
					<tr><td colspan="6"><hr /></td></tr><? //Ücreti Ödenecekler?>
	    			<? $sec="select id,title,KatID,fiyat,hemen,tarih from stok where MusteriID='$_SESSION[UserID]' and durum='0' order by title Asc";$sor=mysql_query($sec);
					while($oku=mysql_fetch_assoc($sor)){
						$i=StokShow($oku[id],$oku[title],$oku[KatID],$oku[fiyat],$oku[hemen],-$oku[tarih],$i,"2");
		 			}?>
				</table>
				</div><div id="stlk_buy" name="stlk_buy" style="display:none;">
				<table width="100%" border="0" cellspacing="0" cellpadding="2" align="center">
					<tr><th>Resim</th><th>Baþlýk</th><th>Kategori</th><th>Fiyat</th><th>Kalan Süre</th><th>Ýþlem</th></tr>
					<tr><td colspan="6"><hr /></td></tr><? //Sattýklarým?>
	    			<? $sec="select id,title,KatID,fiyat,hemen from stok where MusteriID='$_SESSION[UserID]' and durum='3' order by title Asc";$sor=mysql_query($sec);$sat_num=mysql_num_rows($sor);
					while($oku=mysql_fetch_assoc($sor)){
						$i=StokShow($oku[id],$oku[title],$oku[KatID],$oku[fiyat],$oku[hemen],"0",$i,"5");
		 			}?>
				</table>
				</div><br /><br />
			<? }?>
		</td></tr>
		
		
		
		<tr><td background="images/index/fon_bar01.gif"><table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr>
			<td class="title01"><a href="?p=tklf"><? if($p=="tklf")echo"<big>";?>Tekliflerim<? if($p=="tklf")echo"</big>";?></a>&nbsp; </td></tr></table>
		</td></tr><tr><td>
			<? if($p=="tklf"){?>
				<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center"><tr>
					<td onclick="javascript:searchSwitch('2','tklf_ver');" class="title02"><a class="title02" href="#">Verdiðim Teklifler</a></td>
					<td onclick="javascript:searchSwitch('2','tklf_win');" class="title02"><a class="title02" href="#">Kazandýðým Teklifler</a></td>
					<td onclick="javascript:searchSwitch('2','tklf_lose');" class="title02"><a class="title02" href="#">Kazanamadýðým Teklifler</a></td>
				</tr></table><br />
				<div id="tklf_ver" name="tklf_ver">
				<table width="100%" border="0" cellspacing="0" cellpadding="2" align="center">
					<tr><th>Resim</th><th>Baþlýk</th><th>Kategori</th><th>Fiyat</th><th>Kalan Süre</th></tr>
					<tr><td colspan="5"><hr /></td></tr>
    				<? $sec="select distinct StokID from stok_teklif where MusteriID='$_SESSION[UserID]'";$sor=mysql_query($sec);
					while($oku=mysql_fetch_assoc($sor)){
						$en_yuksek="select * from stok_teklif where StokID='$oku[StokID]' order by teklif desc";$en_sor=mysql_query($en_yuksek);$en_oku=mysql_fetch_assoc($en_sor);
						$sec2="select id,title,KatID,fiyat,hemen,tarih from stok where id='$oku[StokID]'";$sor2=mysql_query($sec2);$oku2=mysql_fetch_assoc($sor2);
						$klnzmn=formatetimestamp($oku2[tarih],"no"); 
						if($klnzmn)
							$i=StokShow($oku2[id],$oku2[title],$oku2[KatID],$oku2[fiyat],$oku2[hemen],$klnzmn,$i,"0");
	 				}?>
				</table>
				</div><div id="tklf_win" name="tklf_win" style="display:none;">
				<table width="100%" border="0" cellspacing="0" cellpadding="2" align="center">
					<tr><th>Resim</th><th>Baþlýk</th><th>Kategori</th><th>Fiyat</th><th>Kalan Süre</th><th>Ýþlem</th></tr>
					<tr><td colspan="6"><hr /></td></tr>
    				<? $sec="select distinct StokID from stok_teklif where MusteriID='$_SESSION[UserID]'";$sor=mysql_query($sec);
					while($oku=mysql_fetch_assoc($sor)){
						$en_yuksek="select * from stok_teklif where StokID='$oku[StokID]' order by teklif desc";$en_sor=mysql_query($en_yuksek);$en_oku=mysql_fetch_assoc($en_sor);
						$sec2="select id,title,KatID,fiyat,hemen,tarih from stok where id='$en_oku[StokID]'";$sor2=mysql_query($sec2);$oku2=mysql_fetch_assoc($sor2);
						$klnzmn=formatetimestamp($oku2[tarih],"no"); 
						if((!$klnzmn) and ($_SESSION["UserID"]==$en_oku[MusteriID]))
							$i=StokShow($oku2[id],$oku2[title],$oku2[KatID],$oku2[fiyat],$oku2[hemen],$klnzmn,$i,"4");
	 				}?>
				</table>
				</div><div id="tklf_lose" name="tklf_lose" style="display:none;">
				<table width="100%" border="0" cellspacing="0" cellpadding="2" align="center">
					<tr><th>Resim</th><th>Baþlýk</th><th>Kategori</th><th>Fiyat</th><th>Kalan Süre</th></tr>
					<tr><td colspan="5"><hr /></td></tr>
    				<? $sec="select distinct StokID from stok_teklif where MusteriID='$_SESSION[UserID]'";$sor=mysql_query($sec);
					while($oku=mysql_fetch_assoc($sor)){
						$en_yuksek="select * from stok_teklif where StokID='$oku[StokID]' order by teklif desc";$en_sor=mysql_query($en_yuksek);$en_oku=mysql_fetch_assoc($en_sor);
						$sec2="select id,title,KatID,fiyat,hemen,tarih from stok where id='$en_oku[StokID]'";$sor2=mysql_query($sec2);$oku2=mysql_fetch_assoc($sor2);
						$klnzmn=formatetimestamp($oku2[tarih],"no"); 
						if((!$klnzmn) and ($_SESSION["UserID"]!=$en_oku[MusteriID]))
							$i=StokShow($oku2[id],$oku2[title],$oku2[KatID],$oku2[fiyat],$oku2[hemen],$klnzmn,$i,"0");
	 				}?>
				</table>
				</div><br /><br />
			<? }?>
		</td></tr>
		
		
		
		<tr><td background="images/index/fon_bar01.gif"><table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr>
			<td class="title01"><a href="?p=buy"><? if($p=="buy")echo"<big>";?>Satýn Aldýklarým<? if($p=="buy")echo"</big>";?></a>&nbsp; </td></tr></table>
		</td></tr><tr><td>
			<? if($p=="buy"){?>
				<table width="100%" border="0" cellspacing="0" cellpadding="2" align="center">
					<tr><th>Resim</th><th>Baþlýk</th><th>Kategori</th><th>Fiyat</th><th>Kalan Süre</th><th>Ýþlem</th></tr>
					<tr><td colspan="6"><hr /></td></tr>
    				<? $sec="select * from stok_sale where alanID='$_SESSION[UserID]'";$sor=mysql_query($sec);
					while($oku=mysql_fetch_assoc($sor)){
						$sec2=mysql_query("select id,title,KatID,fiyat,hemen,tarih,durum from stok where id='$oku[StokID]'");$oku2=mysql_fetch_assoc($sec2);
						if($oku2[durum]==3){$i=StokShow($oku2[id],$oku2[title],$oku2[KatID],$oku[fiyat],"0","0",$i,"6");}
	 				}?>
				</table><br /><br />
			<? }?>
		</td></tr>
		
		
		
		<tr><td background="images/index/fon_bar01.gif"><table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr>
			<td class="title01"><a href="?p=puan"><? if($p=="puan")echo"<big>";?>Puanlama<? if($p=="buy")echo"</big>";?></a>&nbsp; </td></tr></table>
		</td></tr><tr><td>
			<? if($p=="puan"){?>
				<table width="100%" border="0" cellspacing="0" cellpadding="2" align="center">
					<tr><th>Üyenin Adý</th><th>uye_puaným</th><th>Yorumum</th><th>Ýþlem</th></tr>
					<tr><td colspan="4"><hr /></td></tr>
	    			<? if(($istek=="puanlama") and $i and ($psid==$PHPSESSID)){
						$trh=date("d/m/Y");$guncelle=mysql_query("UPDATE uye_puan SET puan='$puan_val',yorum='$yorum_txt',tarih='$trh' where id='$i' and verenMID=$_SESSION[UserID] and puan='0'");
					}
					$sec=mysql_query("select * from uye_puan where verenMID='$_SESSION[UserID]' and puan='0'");
					while($oku=mysql_fetch_assoc($sec)){
						$sec_uye=mysql_query("select username from uye_active where id='$oku[verilenMID]'");$oku_uye=mysql_fetch_assoc($sec_uye);?>
						<form action="?p=puan&istek=puanlama&i=<? echo"$oku[id]";?>" method="post" name="frm_puan">
							<tr><td><? echo"$oku_uye[username]";?></td><td><input name="puan_val" type="radio" value="1" /><input name="puan_val" type="radio" value="2" />
							<input name="puan_val" type="radio" value="3" /><input name="puan_val" type="radio" value="4" /><input name="puan_val" type="radio" value="5" checked="checked" /><br /> 
							&nbsp; 1 &nbsp;&nbsp;&nbsp; 2 &nbsp;&nbsp;&nbsp; 3 &nbsp;&nbsp;&nbsp; 4 &nbsp;&nbsp;&nbsp; 5
							</td><td><textarea name="yorum_txt" rows="4" cols="60"></textarea></td>
							<td><input type="hidden" name="psid" value="<? echo"$PHPSESSID";?>" /><input type="submit" name="puanla" value="Onayla" /></td></tr>
						</form>
		 			<? }?>
				</table><br /><br />
			<? }?>
		</td></tr>
		
		
		
		<tr><td background="images/index/fon_bar01.gif"><table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr>
			<td class="title01"><a href="?p=izle"><? if($p=="izle")echo"<big>";?>Ýzlemeye Aldýklarým<? if($p=="kazan")echo"</big>";?></a>&nbsp; </td></tr></table>
		</td></tr><tr><td>
			<? if($p=="izle"){?>
				<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
					<? if($i){
						$sec="select * from stok_teklif where MusteriID='$_SESSION[UserID]' and StokID='$i' ";$sor=mysql_query($sec);$sat_num=mysql_num_rows($sor);
						$sec2="select id,MusteriID from stok where id='$i'  ";$sor2=mysql_query($sec2);$oku2=mysql_fetch_assoc($sor2);
						$sec3="select * from izleme where MusteriID='$_SESSION[UserID]' and StokID='$i'";$sor3=mysql_query($sec3);$sat_num3=mysql_num_rows($sor3);
						if(($sat_num==0) and ($_SESSION[UserID]!=$oku2[MusteriID]) and ($sat_num3==0)){
							$soru=mysql_query("insert into izleme(MusteriID,StokID) values($_SESSION[UserID],'$i')");?>
							<tr><td colspan="2" align="center"><font class='bildirim'>Ürün, izleme listenize eklendi !</font></td></tr><? 
						}else if($_SESSION[UserID]==$oku2[MusteriID]){?><tr><td colspan="2" align="center"><font class='hatan'>Bu sizin ürününüz !</font></td></tr><? 
						}else if($sat_num3!=0){?><tr><td colspan="2" align="center"><font class='bildirim'>Ürün, izleme listenize eklendi !</font></td></tr><? 
						}else if($sat_num!=0){?><tr><td colspan="2" align="center"><font class='hatan'>Bu ürüne teklif verdiniz !</font></td></tr><? 
						}
					}
					$secin="select * from izleme where MusteriID='$_SESSION[UserID]'";$soru=mysql_query($secin);?>
					<tr><th>Resim</th><th>Baþlýk</th><th>Kategori</th><th>Fiyat</th><th>Kalan Süre</th></tr>
					<? while($okur=mysql_fetch_assoc($soru)){
						$sec="select * from stok where id='$okur[StokID]'";$sor=mysql_query($sec);$oku=mysql_fetch_assoc($sor);
						$klnzmn=formatetimestamp($oku[tarih],"no"); 
						$i=StokShow($oku[id],$oku[title],$oku[KatID],$oku[fiyat],$oku[hemen],$klnzmn,$i,"0");
					} ?>
				</table><br /><br />
			<? }?>
		</td></tr>
		
		
		
		<tr><td background="images/index/fon_bar01.gif"><table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr>
			<td class="title01"><a href="?p=kisisel"><? if($p=="kisisel")echo"<big>";?>Kiþisel Bilgilerim<? if($p=="kazan")echo"</big>";?></a>&nbsp; </td></tr></table>
		</td></tr><tr><td>
			<? if($p=="kisisel"){
				$sec="select * from uye_active where id='$_SESSION[UserID]'";$sor=mysql_query($sec);$oku=mysql_fetch_assoc($sor);
				if($istek==dgstr){
					if(($submit) and ($psid==$PHPSESSID)){
						$guncelle=mysql_query("UPDATE uye_active SET ad='$ad',soyad='$soyad',EPosta='$EPosta',adres='$adres',tel='$tel',sehir='$sehir',ilce='$ilce' where id='$_SESSION[UserID]'");$bsr="blg";
					}else{?>
						<script language="JavaScript"><!-- 
						function CheckForm1 () {
							if(document.frmBlg.EPosta.value==""){alert("Lütfen tüm alanlarý doldurunuz !\n");return false;}
							else {return true;}
						}
						function kontrolet(){
							var str=document.frmBlg.EPosta.value;var filtrele=/^(\w+(?:\.\w+)*)@((?:\w+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
							if (filtrele.test(str)){}else{document.getElementById('hint_mail').innerHTML="<b>Mail adresinizi eksik yada yanlýþ girdiniz !</b><br /><br />";}
						}
						// --></script>
						<form name="frmBlg" method="post" action="?p=kisisel&istek=dgstr" onSubmit="return CheckForm1();"><table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
							<tr><td width="30%">Kullanýcý Adýnýz</td><td><? echo"$oku[username]";?></td></tr>
							<tr><td>Adýnýz</td><td><input type="text" name="ad" value="<? echo"$oku[ad]";?>" /></td></tr>
							<tr><td>Soyadýnýz</td><td><input type="text" name="soyad" value="<? echo"$oku[soyad]";?>" /></td></tr>
							<tr><td>E-Posta Adresiniz*</td><td><input type="text" name="EPosta" onblur="kontrolet();" value="<? echo"$oku[EPosta]";?>" /></td></tr>
							<tr><td></td><td><span id="hint_mail"></span></td></tr>
							<tr><td>Telefon Numaranýz</td><td><input type="text" name="tel" value="<? echo"$oku[tel]";?>" /></td></tr>
							<tr><td>Adresiniz</td><td><input type="text" name="adres" value="<? echo"$oku[adres]";?>" /></td></tr>
							<tr><td>Bulunduðunuz Þehir</td><td><select size="1" name="sehir">
                					<? $sec_sehir=mysql_query("select * from sehir order by plaka asc");
									while($oku_sehir=mysql_fetch_assoc($sec_sehir)){if(intval($oku_sehir[plaka])!=0){?> <option value='<? echo("$oku_sehir[plaka]");?>'<? if(intval($oku[sehir])==intval($oku_sehir[plaka]))echo" selected='selected'";?>><? echo("$oku_sehir[ad]");?></option><? }}?>
                					<option value="00"<? if(intval($oku[sehir])==0)echo" selected='selected'";?>>Diðer Yerler</option>
              					</select></td>
							</tr>
							<tr><td>Bulunduðunuz Ýlçe</td><td><input type="text" name="ilce" value="<? echo"$oku[ilce]";?>" /></td></tr>
							<tr><td colspan="2"><br /><input type="hidden" value="<? echo"$PHPSESSID";?>" name="psid" /></td></tr>
							<tr><td align="center"><input type="button" value="   Ýptal   " name="btn_iptal" onclick="javascript:window.location.href='?p=kisisel';" /></td><td><input type="submit" name="submit" value="Tamamla" /></td></tr>
						</table></form><br /><br />
						<script language="javascript">document.formBlg.ad.focus();</script>
					<? }
				}else if($istek==sfr){
					if($submit and ($new1_pass==$new2_pass) and ($oku[userpass]==md5($old_pass)) and (strlen($new1_pass)>=6) and ($psid==$PHPSESSID)){
						if ($new1_pass==$new2_pass){
							$guncelle=mysql_query("UPDATE uye_active SET userpass='".md5($new1_pass)."' where id='$_SESSION[UserID]'");$bsr=sfr;
						}else echo "<script language=\"JavaScript\">window.location.href = '?p=kisisel&istek=sfr&err=new';</script>";
					}else{?>
						<script language="JavaScript"><!-- 
						function CheckForm2 () {
							if (document.frmSfr.old_pass.value==""){alert("Lütfen tüm alanlarý doldurunuz !\n");return false;}
							else if (document.frmSfr.new1_pass.value==""){alert("Lütfen tüm alanlarý doldurunuz !\n");return false;}
							else if (document.frmSfr.new2_pass.value==""){alert("Lütfen tüm alanlarý doldurunuz !\n");return false;}
							else if (document.frmSfr.new1_pass.value!=document.frmSfr.new2_pass.value){alert("Parolalarýnýz birbiriyle uyuþmuyor !\n");return false;}
							else if (document.frmSfr.new1_pass.value.length<=6){alert("Parolanýz 6 haneden kýsa olamaz !\n");return false;}
							else {return true;}
						}
						// --></script>
  						<form name="frmSfr" action="?p=kisisel&istek=sfr" method="post" onSubmit="return CheckForm2();"><table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
							<? if($Submit or $err) {
								if($Submit and (($old_pass=="") or ($new1_pass=="") or ($new2_pass==""))){?><tr><td colspan=2 align=center><font class='hatan'>Lütfen boþ kýsýmlarý doldurun !</font></td></tr><? };
								if($err=="new"){?><tr><td colspan=2 align=center><font class='hatan'>Þifreleriniz birbiriyle uyuþmuyor !</font></td></tr><? }?>
								<tr><td colspan='2' align='center'><br /></td></tr>
							<? }?>
      						<tr><td width="30%">Þu anki Þifreniz : &nbsp;</td><td><input name="old_pass" type="password" value="<? echo"$old_pass";?>" /></td></tr>
      						<tr><td>Yeni Þifreniz : &nbsp;</td><td><input name="new1_pass" type="password" value="<? echo"$new1_pass";?>" /></td></tr>
      						<tr><td>Yeni Þifreniz (Tekrar) : &nbsp;</td><td><input name="new2_pass" type="password" value="<? echo"$new2_pass";?>" /></td></tr>
     						<tr><td align="center"><input type="hidden" value="<? echo"$PHPSESSID";?>" name="psid" /><br /><input type="button" value="   Ýptal   " name="btn_iptal" onclick="javascript:window.location.href='?p=kisisel';" /></td>
							<td><br /><input name="submit" type="submit" value="   Þifreyi Deðiþtir   " /></td></tr>
    					</table></form>
						<script language="javascript">document.formSfr.old_pass.focus();</script>
					<? }
				}else if($istek=="srcvp"){
					if($submit and (md5($userpass)==$oku[userpass]) and (strlen($userpass)>=6) and ($psid==$PHPSESSID)){
						$guncelle=mysql_query("UPDATE uye_active SET ozelcevap='".md5($ozelcevap)."',ozelsoru=$ozelsoru where id='$_SESSION[UserID]'");$bsr=srcvp;
					}else{?>
						<script language="JavaScript"><!-- 
						function CheckForm3 () {
							if (document.frmsrcvp.userpass.value==""){alert("Lütfen þifrenizi giriniz !\n");return false;}
							else if (document.frmsrcvp.userpass.value.length<=6){alert("Lütfen þifrenizi ekiksiz giriniz !\n");return false;}
							else {return true;}
						}
						// --></script>
  						<form name="frmsrcvp" action="?p=kisisel&istek=srcvp" method="post" onSubmit="return CheckForm3();"><table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
							<? if($Submit) {
								if($Submit and ($userpass=="")){?><tr><td colspan=2 align=center><font class='hatan'>Lütfen þifrenizi giriniz !</font></td></tr><? }?>
								<tr><td colspan='2' align='center'><br /></td></tr>
							<? }?>
							<tr><td>Özel Sorunuz : &nbsp;</td><td><select name="ozelsoru">
								<option value="1" <? if($oku[ozelsoru]==1){ echo("selected='selected'");} ?>>En beðendiðiniz sporcu kimdir?</option>
								<option value="2" <? if($oku[ozelsoru]==2){ echo("selected='selected'");} ?>>En sevdiðiniz öðretmeniniz kimdir?</option>
								<option value="3" <? if($oku[ozelsoru]==3){ echo("selected='selected'");} ?>>Ýlkokulunuzun adý nedir?</option>
								<option value="4" <? if($oku[ozelsoru]==4){ echo("selected='selected'");} ?>>En sevdiðiniz oyuncu/yazar kimdir?</option>
								<option value="5" <? if($oku[ozelsoru]==5){ echo("selected='selected'");} ?>>Ýlk oyuncaðýnýz neydi?</option>
								<option value="6" <? if($oku[ozelsoru]==6){ echo("selected='selected'");} ?>>Evcil hayvanýnýzýn adý nedir?</option>
								<option value="7" <? if($oku[ozelsoru]==7){ echo("selected='selected'");} ?>>En büyük kahramýnýz kim?</option>
							</select></td></tr>
      						<tr><td>Cevabýnýz : &nbsp;</td><td><input name="ozelcevap" type="text" value="<? echo"$ozelcevap";?>" /></td></tr>
      						<tr><td>Þifreniz : &nbsp;</td><td><input name="userpass" type="password" value="<? echo"$userpass";?>" /></td></tr>
     						<tr><td align="center"><input type="hidden" value="<? echo"$PHPSESSID";?>" name="psid" /><br /><input type="button" value="   Ýptal   " name="btn_iptal" onclick="javascript:window.location.href='?p=kisisel';" /></td>
							<td><br /><input name="submit" type="submit" value="   Sorumu ve Cevabýmý Deðiþtir   " /></td></tr>
    					</table></form>
						<script language="javascript">document.frmsrcvp.ozelsoru.focus();</script>
					<? }
				}
				if(!$istek or $bsr){
					$sec="select * from uye_active where id='$_SESSION[UserID]'";$sor=mysql_query($sec);$oku=mysql_fetch_assoc($sor);
					$sec_sehir=mysql_query("select ad from sehir where plaka='$oku[sehir]'");$oku_sehir=mysql_fetch_assoc($sec_sehir);?>
					<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
							<? if($bsr) {
								if($bsr=="blg"){?><tr><td colspan=2 align=center><font class='bildirim'>Bilgileriniz güncellendi !</font></td></tr><? }
								if($bsr=="sfr"){?><tr><td colspan=2 align=center><font class='bildirim'>Þifreniz deðiþti !</font></td></tr><? }
								if($bsr=="srcvp"){?><tr><td colspan=2 align=center><font class='bildirim'>Özel sorunuz ve cevabýnýz deðiþti !</font></td></tr><? }?>
								<tr><td colspan='2' align='center'><br /></td></tr>
							<? }?>
						<tr><td width="30%">Kullanýcý Adýnýz</td><td><? echo"$oku[username]";?></td></tr>
						<tr><td>Adýnýz</td><td><? echo"$oku[ad]";?></td></tr>
						<tr><td>Soyadýnýz</td><td><? echo"$oku[soyad]";?></td></tr>
						<tr><td>E-Posta Adresiniz</td><td><? echo"$oku[EPosta]";?></td></tr>
						<tr><td>Telefon Numaranýz</td><td><? echo"$oku[tel]";?></td></tr>
						<tr><td>Adresiniz</td><td><? echo"$oku[adres]";?></td></tr>
						<tr><td>Bulunduðunuz Þehir</td><td><? $sec_sehir=mysql_query("select * from sehir where plaka='$oku[sehir]'");$oku_sehir=mysql_fetch_assoc($sec_sehir);echo"$oku_sehir[ad]";?></td></tr>
						<tr><td>Bulunduðunuz Ýlçe</td><td><? echo"$oku[ilce]";?></td></tr>
					</table><br />
					<a href="?p=kisisel&istek=dgstr">Kiþsel Bilgilerimi Deðiþtir</a><br />
					<a href="?p=kisisel&istek=sfr">Þifremi Deðiþtir</a><br />
					<a href="?p=kisisel&istek=srcvp">Özel Sorumu ve Cevabýmý Deðiþtir</a><br />
				<? }
			}?>
		</td></tr>
	</table>	
<? include ("alt.php") ?>
