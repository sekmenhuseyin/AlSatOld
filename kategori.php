<? include ("ust.php") ?>
  <table align="center">
  <tr>
  
  
    <? $sec="select * from kategori order by KategoriAd Asc";$sor=mysql_query($sec);
	while($oku=mysql_fetch_assoc($sor)){
	
 		echo"<td><a href='arama.php?AraKat=$oku[id]'><img src='images/kategori/$oku[id].gif' border=0 /><br />$oku[KategoriAd]</a></td>";
		$i++;if($i==5){echo"</tr><tr>";$i=0;};
	 }?>
   
   
   </tr>
   </table>
<? include ("alt.php") ?>