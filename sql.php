<?
include("common.php");
echo"��lem ba�lad�<br>";
$sql=mysql_query("DROP TABLE IF EXISTS `izleme`");
if($sql)echo"izleme silindi<br>";
$sql=mysql_query("CREATE TABLE `izleme` (
  `id` smallint(15) NOT NULL auto_increment,
  `StokID` smallint(15) NOT NULL default '0',
  `MusteriID` smallint(15) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM");
if($sql)echo"izleme olu�turuldu<br>";
$sql=mysql_query("DROP TABLE IF EXISTS `kategori`");
if($sql)echo"kategori silindi<br>";
$sql=mysql_query("CREATE TABLE `kategori` (
  `id` smallint(2) NOT NULL default '0',
  `KategoriAd` varchar(25) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM");
if($sql)echo"kategori oluturuldu<br>";
$sql=mysql_query("INSERT INTO `kategori` (`id`, `KategoriAd`) VALUES 
(1, 'Beyaz E&#351ya'),(2, 'Bilgisayar'),(3, 'CD-DVD'),(4, 'Cep Telefonu'),(5, 'Elektronik E&#351ya'),(6, 'Ev Dekorasyonu'),
(7, 'Giyim-Aksesuar'),(8, 'K&#305rtasiye'),(9, 'Kitap-Dergi'),(10, 'Kozmetik'),(11, 'M&uumlcevher-Tak&#305'),
(12, 'Motorlu Ara&ccedillar'),(13, 'Oyuncak'),(14, 'Spor Aletleri'),(15, 'Ta&#351&#305nmazlar'),(0, 'Di&#287;erleri')");
if($sql)echo"kategoriler eklendi<br>";
$sql=mysql_query("DROP TABLE IF EXISTS `uye_puan`");
if($sql)echo"uye_puan silindi<br>";
$sql=mysql_query("CREATE TABLE `uye_puan` (
  `id` smallint(15) NOT NULL auto_increment,
  `verenMID` smallint(15) NOT NULL default '0',
  `verilenMID` smallint(15) NOT NULL default '0',
  `uye_puan` smallint(1) NOT NULL default '0',
  `yorum` text,
  `tarih` varchar(11) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM");
if($sql)echo"uye_puan olu�turuldu<br>";
$sql=mysql_query("DROP TABLE IF EXISTS `uye_passive`");
if($sql)echo"uye_passive silindi<br>";
$sql=mysql_query("CREATE TABLE `uye_passive` (
  `id` smallint(15) NOT NULL auto_increment,
  `activePass` varchar(35) NOT NULL default '',
  `ad` varchar(25) NULL default '',
  `soyad` varchar(25) NULL default '',
  `username` varchar(25) NOT NULL default '',
  `userpass` varchar(35) NOT NULL default '',
  `EPosta` varchar(50) NOT NULL default '',
  `tel` varchar(15) NULL default '',
  `adres` varchar(255) NULL default '',
  `sehir` varchar(2) NOT NULL default '',
  `ilce` varchar(50) NULL default '',
  `ozelsoru` char(1) NOT NULL default '',
  `ozelcevap` varchar(35) NULL default '',
  `tarih` varchar(11) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM");
if($sql)echo"uye_passive olu�turuldu<br>";
$sql=mysql_query("DROP TABLE IF EXISTS `stok_sale`");
if($sql)echo"stok_sale silindi<br>";
$sql=mysql_query("CREATE TABLE `stok_sale` (
  `id` smallint(15) NOT NULL auto_increment,
  `alanID` smallint(15) NOT NULL default '0',
  `satanID` smallint(15) NOT NULL default '0',
  `StokID` smallint(15) NOT NULL default '0',
  `tarih` varchar(11) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM");
if($sql)echo"stok_sale olu�turuldu<br>";
$sql=mysql_query("DROP TABLE IF EXISTS `sehir`");
if($sql)echo"sehir silindi<br>";
$sql=mysql_query("CREATE TABLE `sehir` (
  `plaka` char(2) NULL default '',
  `ad` char(40) NULL default ''
) TYPE=MyISAM");
if($sql)echo"sehir olu�turuldu<br>";
$sql=mysql_query("INSERT INTO `sehir` (`plaka`, `ad`) VALUES 
('00', 'Others'),('01', 'Adana'),('02', 'Ad�yaman'),('03', 'Afyon'),('04', 'A�r�'),('05', 'Amasya'),('06', 'Ankara'),
('07', 'Antalya'),('08', 'Artvin'),('09', 'Ayd�n'),('10', 'Bal�kesir'),('11', 'Bilecik'),('12', 'Bing�l'),
('13', 'Bitlis'),('14', 'Bolu'),('15', 'Burdur'),('16', 'Bursa'),('17', '�anakkale'),('18', '�ank�r�'),
('19', '�orum'),('20', 'Denizli'),('21', 'Diyarbak�r'),('22', 'Edirne'),('23', 'Elaz��'),('24', 'Erzincan'),
('25', 'Erzurum'),('26', 'Eski�ehir'),('27', 'Gaziantep'),('28', 'G�m��hane'),('29', 'Giresun'),('30', 'Hakkari'),
('31', 'Hatay'),('32', 'Isparta'),('33', 'Mersin'),('34', '�stanbul'),('35', '�zmir'),('36', 'Kars'),
('37', 'Kastamonu'),('38', 'Kayseri'),('39', 'K�r�ehir'),('40', 'K�rklareli'),('41', 'Kocaeli'),('42', 'Konya'),
('43', 'K�tahya'),('44', 'Malatya'),('45', 'Manisa'),('46', 'Kahramanmara�'),('47', 'Mardin'),('48', 'Mu�la'),
('49', 'Mu�'),('50', 'Nev�ehir'),('51', 'Ni�de'),('52', 'Ordu'),('53', 'Rize'),('54', 'Sakarya'),('55', 'Samsun'),
('56', 'Siirt'),('57', 'Sinop'),('58', 'Sivas'),('59', 'Tekirda�'),('60', 'Tokat'),('61', 'Trabzon'),('62', 'Tunceli'),
('63', '�anl�urfa'),('64', 'U�ak'),('65', 'Van'),('66', 'Yozgat'),('67', 'Zonguldak'),('68', 'Aksaray'),('69', 'Bayburt'),
('70', 'Karaman'),('71', 'K�r�kkale'),('72', 'Batman'),('73', '��rnak'),('74', 'Bart�n'),('75', 'Ardahan'),('76', 'I�d�r'),
('77', 'Yalova'),('78', 'Karab�k'),('79', 'Kilis'),('80', 'Osmaniye'),('81', 'D�zce')");
if($sql)echo"sehirler eklendi<br>";
$sql=mysql_query("DROP TABLE IF EXISTS `sepet`");
if($sql)echo"sepet silindi<br>";
$sql=mysql_query("CREATE TABLE `sepet` (
  `id` smallint(15) NOT NULL auto_increment,
  `MusteriID` smallint(15) NOT NULL default '0',
  `StokID` smallint(15) NOT NULL default '0',
  `fiyat` int(11) NOT NULL default '0',
  `adet` varchar(5) NOT NULL default '1',
  `tarih` varchar(11) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM");
if($sql)echo"sepet olu�turuldu<br>";
$sql=mysql_query("DROP TABLE IF EXISTS `stok`");
if($sql)echo"stok silindi<br>";
$sql=mysql_query("CREATE TABLE `stok` (
  `id` smallint(15) NOT NULL auto_increment,
  `MusteriID` smallint(15) NOT NULL default '0',
  `title` text NOT NULL,
  `KatID` char(2) NOT NULL default '',
  `fiyat` int(11) NULL default '0',
  `hemen` int(11) default '0',
  `tarih` text NOT NULL,
  `trh` text NOT NULL,
  `adet` varchar(5) NULL default '1',
  `ozellik` text,
  `krgSehir` text,
  `krgUcret` char(2) default NULL,
  `krgNot` text,
  `vitrin` smallint(1) NOT NULL default '0',
  `bold` smallint(1) NOT NULL default '0',
  `durum` char(2) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM");
if($sql)echo"stok olu�turuldu<br>";
$sql=mysql_query("DROP TABLE IF EXISTS `stok_resim`");
if($sql)echo"stok_resim silindi<br>";
$sql=mysql_query("CREATE TABLE `stok_resim` (
  `id` smallint(15) NOT NULL auto_increment,
  `MusteriID` smallint(15) NOT NULL default '0',
  `StokID` smallint(15) NOT NULL default '0',
  `resimtitle` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM");
if($sql)echo"stok_resim olu�turuldu<br>";
$sql=mysql_query("DROP TABLE IF EXISTS `stok_teklif`");
if($sql)echo"stok_teklif silindi<br>";
$sql=mysql_query("CREATE TABLE `stok_teklif` (
  `id` smallint(15) NOT NULL auto_increment,
  `MusteriID` smallint(15) NOT NULL default '0',
  `StokID` smallint(15) NOT NULL default '0',
  `teklif` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM");
if($sql)echo"stok_teklif olu�turuldu<br>";
$sql=mysql_query("DROP TABLE IF EXISTS `uye_active`");
if($sql)echo"uye_active silindi<br>";
$sql=mysql_query("CREATE TABLE `uye_active` (
  `id` smallint(15) NOT NULL auto_increment,
  `ad` varchar(25) NULL default '',
  `soyad` varchar(25) NULL default '',
  `username` varchar(25) NOT NULL default '',
  `userpass` varchar(35) NOT NULL default '',
  `EPosta` varchar(50) NOT NULL default '',
  `tel` varchar(15) NULL default '',
  `adres` varchar(255) NULL default '',
  `sehir` varchar(2) NOT NULL default '',
  `ilce` varchar(50) NULL default '',
  `ozelsoru` char(1) NOT NULL default '',
  `ozelcevap` varchar(35) NULL default '',
  `tarih` varchar(11) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM");
if($sql)echo"uye_active olu�turuldu<br>";
$trh=date("d/m/Y");
$sql=mysql_query("INSERT INTO `uye_active` (`ad`, `soyad`, `username`, `userpass`, `EPosta`, `tel`, `adres`, `sehir`, `ilce`, `ozelsoru`, `ozelcevap`,`tarih`) VALUES 
('', '', 'Hesapl�AlSat', 'e388c1c5df4933fa01f6da9f92595589', 'info@hesaplialsat.com', '', '', '06', '', '1', '', '$trh')");
if($sql)echo"admin uyesi eklendi<br>";
$sql=mysql_query("INSERT INTO `uye_puan` (verenMID,verilenMID,puan,yorum,tarih) VALUES('1','1','5','Hesapl�AlSat`a Ho�geldiniz! Ba�ar�lar ;-)','$trh')");
if($sql)echo"admin uyesi puanland�<br>";

?>