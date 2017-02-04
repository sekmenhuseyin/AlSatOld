	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  	<tr><th>id</th><th>KategoriAd</th></tr>
	  	<? $sec=mysql_query("select * from kategori order by id asc");
		while($oku=mysql_fetch_assoc($sec)){
		  	echo"<tr><td>$oku[id]</td><td>$oku[KategoriAd]</td></tr>";
		}?>
	</table>
