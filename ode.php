<? include ("ust.php");
$sec="select * from stok where id='$i'";$sor=mysql_query($sec);$oku=mysql_fetch_assoc($sor);$sure=$oku[tarih];
if($sure<100){
	$tarih=mktime(date("H"),date("i"),date("s"),date("m"),date("d")+$sure,date("y"));
	$trh=date("Ym");$trh.=date("d")+$sure;$trh.=date("His");
	$guncelle=mysql_query("UPDATE stok SET durum='1',trh='$trh',tarih='$tarih' where id='$i'");
}
include ("alt.php");?>