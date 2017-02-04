<? include("ust.php");
$sc="select * from stok";$sr=mysql_query($sc);$bugun=date("YmdHis");?> 
<table border="0" cellpadding="0" cellspacing="5" align="center" width="97%">
	<tr><td colspan="2" background="images/index/fon_bar01.gif">
		<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Son Gün&nbsp; </td></tr></table>
	</td></tr>
	<? while($oku=mysql_fetch_assoc($sr)){
		$i=SearchShow2("$oku[tarih]","$oku[id]","$oku[title]","$oku[fiyat]","$oku[bold]","$oku[hemen]","$oku[MusteriID]","$i","yes");
	} if($i==1)echo"<td width='50%'>&nbsp;</td>";
	?>
</table>	
			
<? include("alt.php"); ?>