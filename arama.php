<? include("ust.php");
if(!$show){?>
	<table border="0" cellpadding="2" cellspacing="0" align="center" width="98%">
		<tr><th>Resim</th><th>Ba�l�k</th><th>Fiyat</th><th>Kalan S�re</th><th>��lem</th></tr>
		<tr><td colspan="5"><hr /></td></tr>
		<? if(!$a){$a=0;}$b=0;$src_list="SELECT * FROM stok where ";$trh=date("YmdHis");
		if($AraKat!=-1){$src_list.="KatID='$AraKat' and ";}if($AraText!=""){$src_list.="title like '%$AraText%' and ";}$src_list.="durum='1' and trh>$trh";
	
		$tablo_say=mysql_query($src_list);$urun_say=mysql_num_rows($tablo_say);
		$tablo=$src_list." order by trh asc limit $a,10";$sorgu=mysql_query($tablo);
		while($oku=mysql_fetch_assoc($sorgu)){
			if(formatetimestamp($oku[tarih],"no")){$i=SearchShow("$oku[tarih]","$oku[id]","$oku[title]","$oku[fiyat]","$oku[bold]","$oku[hemen]","$i");}
		}?>
		<tr>
			<td align="center" colspan="5" height="40" valign="bottom">
				<? while($b<$urun_say){
					if(($b+10)>$urun_say){$c=$urun_say;}else{$c=$b+10;}$a=$b+1;
		 			echo" <a href='?AraText=$AraText&AraKat=$AraKat&a=$b'>$a-$c</a> ";
			    	$b=$b+10;if($b>$urun_say){$b=$urun_say;}
				} ?>
			</td>
		</tr>
	</table>
	
	
<? }else if($show==ara){
	
	if(!$ara_detay){?>
		<form action="?show=ara" method="post" name="frmAra"><table border="0" cellpadding="0" cellspacing="0" align="center" width="95%">
			<tr><th colspan="3" align="center">Detayl� Arama</th></tr>
			<tr><td colspan="3" background="images/index/fon_bar01.gif">
				<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Genel Bilgiler&nbsp; </td></tr></table>
			</td></tr>
			<tr><td width="30%">Aranacak �fade</td><td><INPUT size="28" name="AraText"></td><td>&nbsp;</td>
			</tr><tr>
				<td>Kategori</td><td><SELECT size="1" name="AraKat">
	                <OPTION value="-1" selected>T�m Kategoriler</OPTION>
	                <? $sec="select * from kategori order by KategoriAd Asc";$sor=mysql_query($sec);
					while($oku=mysql_fetch_assoc($sor)){if($oku[id]!='0') echo("<option value='$oku[id]'>$oku[KategoriAd]</option>");}?>
	                <OPTION value="0">Di�erleri</OPTION>
	            </SELECT></td><td>&nbsp;</td>
			</tr>
			<tr><td colspan="3"><br /><br /><br /></td></tr>
			<tr><td colspan="3" background="images/index/fon_bar01.gif">
				<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Fiyat Bilgileri&nbsp; </td></tr></table>
			</td></tr><tr>
	      		<td><INPUT type="checkbox" name="Arachkhemenal">Hemen AL! bulunsun</td>
				<td colspan="2" align="center">Fiyat   Aral��� <INPUT maxLength="12" size="7" name="Arafiyat1"> &mdash; <INPUT maxLength="12" size="7" name="Arafiyat2"> YTL</td>
			<tr><td colspan="3"><br /><br /><br /></td></tr>
			<tr><td colspan="3" background="images/index/fon_bar01.gif">
				<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Zaman Bilgileri&nbsp; </td></tr></table>
			</td></tr>
				<tr><td>Bitecek   �r�nler <SELECT size="1" name="Arabitecek">
	        		<OPTION value="" selected>----------</OPTION>
        			<OPTION value="2">2 saat   i�inde</OPTION>
        			<OPTION value="6">6 saat i�inde</OPTION>
        			<OPTION value="12">12 saat i�inde</OPTION>
        			<OPTION value="24">24 saat i�inde</OPTION>
      			</SELECT></td>
				<td colspan="2" align="center">Yeni gelenler <SELECT size="1" name="Arayeni">
        			<OPTION value="" selected>----------</OPTION>
       				<OPTION value="6">6 saat   i�inde</OPTION>
        			<OPTION value="12">12 saat i�inde</OPTION>
        			<OPTION value="24">1 g�n i�inde</OPTION>
        			<OPTION value="48">2 g�n i�inde</OPTION>
				</SELECT></td>
			</tr>
			<tr><td colspan="3"><br /><br /><br /></td></tr>
			<tr><td colspan="3" background="images/index/fon_bar01.gif">
				<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Kargo Bilgileri&nbsp; </td></tr></table>
			</td></tr><tr>
				<td>
					�ehir <SELECT size="1" name="Arabolge">
	        			<OPTION value="-1" selected>T�m   �ehirler</OPTION>
	                	<? $sec="select * from sehir order by plaka Asc";$sor=mysql_query($sec);
						while($oku=mysql_fetch_assoc($sor)){if($oku[plaka]!='00') echo("<option value='$oku[plaka]'>$oku[ad]</option>");}?>
	        			<OPTION value="00">Di�er Yerler</OPTION>
	     			</SELECT>
				</td><td colspan="2" align="center">
	      			<INPUT type="checkbox" name="Arachkkargo">�cretsiz kargo &nbsp;&nbsp;
				</td>
			</tr><tr><td colspan="3"><br /><br /></td></tr>
			<tr><td colspan="3" align="center"><INPUT type="submit" value="   Arama Yap   " name="ara_detay"></td></tr>
		</table></form>
	<? }else{
			$AraText=trim($AraText);$Arafiyat1=trim($Arafiyat1);$Arafiyat2=trim($Arafiyat2);
			if(!$a){$a=0;}$b=0;$trh=date("YmdHis");$src_list="select * from stok where ";$kriter="show=ara&ara_detay=evet";
            if($AraText){$src_list.="title like '%$AraText%' and ";$kriter.="&AraText=$AraText";}
			if($AraKat!="-1"){$src_list.="KatID='$AraKat' and ";}$kriter.="&AraKat=$AraKat";
			if($Arachkhemenal=="on"){$src_list.="hemen>'0' and ";$kriter.="&Arachkhemenal=$Arachkhemenal";}else{$src_list.="hemen='0' and ";}
			if($Arafiyat1){$src_list.="fiyat>='$Arafiyat1' and ";$kriter.="&Arafiyat1=$Arafiyat1";}
			if($Arafiyat2){$src_list.="fiyat<='$Arafiyat2' and ";$kriter.="&Arafiyat2=$Arafiyat2";}
			if($Arabitecek){$trh2=date("Ymd");$trh2.=date("H"+$Arabitecek);$trh2.=date("is");$src_list.="trh<=$trh2 and ";$kriter.="&Arabitecek=$Arabitecek";}
			if($Arayeni){$trh2=date("Ymd");$trh2.=date("H"-$Arayeni);$trh2.=date("is");$src_list.="trh>=$trh2 and ";$kriter.="&Arayeni=$Arayeni";}
			if($Arabolge!=-1){$src_list.="krgSehir='$Arabolge' and ";}$kriter.="&Arabolge=$Arabolge";
			if($Arachkkargo=="on"){$src_list.="krgUcret='1' and ";$kriter.="&Arachkkargo=$Arachkkargo";}else{$src_list.="krgUcret='0' and ";}
			$src_list.="durum='1' and trh>$trh";
			$tablo_say=mysql_query($src_list);$urun_say=mysql_num_rows($tablo_say);
			$sec=mysql_query($src_list." order by trh asc limit $a,10");?>
			<table border="0" cellpadding="2" cellspacing="0" align="center" width="98%">
				<tr><th>Resim</th><th>Ba�l�k</th><th>Fiyat</th><th>Kalan S�re</th><th>��lem</th></tr>
				<tr><td colspan="5"><hr /></td></tr>
					<? while($oku=mysql_fetch_assoc($sec))$i=SearchShow("$oku[tarih]","$oku[id]","$oku[title]","$oku[fiyat]","$oku[bold]","$oku[hemen]","$i");?>
				</tr>
				<tr>
					<td align="center" colspan="5" height="40" valign="bottom">
						<? while($b<$urun_say){
							if(($b+10)>$urun_say){$c=$urun_say;}else{$c=$b+10;}$a=$b+1;
				 			echo" <a href='?$kriter&a=$b'>$a-$c</a> ";
					    	$b=$b+10;if($b>$urun_say){$b=$urun_say;}
						} ?>
					</td>
				</tr>
			</table>	
	<? }
}
include("alt.php"); ?>