<? session_start();include("common.php");
if($a){echo"<html><head><title>�r�n Resmi</title></head><body><img src='uploads/$a' /></body></html>";}
else{ ?>
	<html><head><title>�r�n Resmi Ekle</title></head>
	<body>
		<? if ($_SESSION["UserID"]==""){echo "<table width=100% height=100%><tr><td align=center valign=middle>L�tfen oturum A��n !</td></tr></table>";exit();}
		if ($submit) {
			$file_tmp = $_FILES['file']['tmp_name'];
			if (!is_uploaded_file($file_tmp)){$err="notselect";}
			else if (($_FILES["file"]["size"] < "204800")) {	//$MAX_FILE_SIZE
				$file_name = $_FILES['file']['name'];$fname=strtolower(substr($file_name,strrpos($file_name,".")));
				for($i=0;$i<17;$i++)$fname=chr(rand(97,122)).$fname;if(file_exists("uploads/".$_FILES['file']['fname'])){for($i=0;$i<7;$i++)$fname=chr(rand(97,122)).$fname;}
			    move_uploaded_file($_FILES["file"]["tmp_name"],"uploads/" ."$fname" );$id=$_SESSION['UserID'];
				$ekle = mysql_query("INSERT INTO stok_resim(MusteriID, resimtitle, StokID) VALUES ('$_SESSION[UserID]', '$fname', '$_SESSION[temp]')");
				$err="tpage";
			}
			else{$err=size;}
		}
		if($act=='sil'){
			$resim_sec=mysql_query("select resimtitle from stok_resim resim where id='$i'");$resim_ad=mysql_fetch_assoc($resim_sec);
			unlink("uploads/".$resim_ad[resimtitle]);$sil=mysql_query("delete from stok_resim where id='$i'");
		}?>
			<form enctype="multipart/form-data" method="post" action="upload.php" target="_self"><table border="0" align="center" width="90%" cellspacing="0" cellpadding="0">
				<? if($err=="notselect") {echo"<tr><td>Dosya bulunamad� !</td></tr>";}
				if($act=='sil') {
					if (!$sil) { echo "<tr><td>Resim silinemedi !</td></tr>"; }
					else { echo"<tr><td>Resim ba�ar�yla silindi !</td></tr>";}
				} 
				if($err=="tpage") {echo"<tr><td>Y�kleme ba�ar�yla tamamland� !</td></tr>";}
				if($err=="size") {echo"<tr><td>Y�klemek istedi�iniz dosya �ok b�y�k !</td></tr>";} ?>
				<tr><td>L�tfen y�klemek istedi�iniz resimi se�iniz: </td></tr>
				<tr><td><input name="file" type="file" />&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="Y�kle" /></td></tr>
			</table></form>
			<table width="100%" align="center" border="0" cellpadding="3" cellspacing="0"><tr><td align=center>
	           	<? $sec="select * from stok_resim where MusteriID='$_SESSION[UserID]' and StokID='$_SESSION[temp]'";$sor=mysql_query($sec);$j=0;
				while($oku=mysql_fetch_assoc($sor)){
					echo("<img src='uploads/$oku[resimtitle]' border='1' name='pic' height='70' width='70' /><br /><a href='?act=sil&i=$oku[id]'>Sil</a>");
					$j++;if($j==7){echo"<br />";$j=0;}
				} ?>
			</td></tr></table>
		</body>
		</html>
<? }?>
