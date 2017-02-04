<? include ("ust.php"); ?>
<table border="0" cellpadding="0" cellspacing="4" align="center" width="97%">
	<tr><td colspan="2" background="images/index/fon_bar01.gif">
		<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Vitrin&nbsp; </td></tr></table>
	</td></tr>
		<? $q=0;$trh=date("YmdHis");$sec="select * from stok where vitrin='1' and durum='1' and trh>$trh";$sor=mysql_query($sec);
		while($oku=mysql_fetch_assoc($sor)){
				$vtr_list0[$q]=$oku[id];$vtr_list1[$q]=$oku[tarih];$vtr_list2[$q]=$oku[title];$vtr_list3[$q]=$oku[fiyat];
				$vtr_list4[$q]=$oku[bold];$vtr_list5[$q]=$oku[hemen];$vtr_list6[$q]=$oku[MusteriID];
				$vtr_list[$q]=$q;$q++;
		} 
		if($q){
			@shuffle($vtr_list);
			for($vtr=0;$vtr<6;$vtr++){
				$tmp=$vtr_list[$vtr];
				$i=SearchShow2("$vtr_list1[$tmp]","$vtr_list0[$tmp]","$vtr_list2[$tmp]","$vtr_list3[$tmp]","$vtr_list4[$tmp]","$vtr_list5[$tmp]","$vtr_list6[$tmp]","$i","no");
			} if($i==1)echo"<td width='50%'>&nbsp;</td>";
		}?>
</table>	
<? include ("alt.php"); ?>