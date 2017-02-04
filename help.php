<? include("ust.php");?>
<style type="text/css">
<!--
p{word-spacing:4px;}
.style1 {
	color: #FF0000;
	font-weight: bold;
}
.style2 {color: #FF0000}
-->
</style>
<? if($sayfa=="yeniuye"){?>

                       <p class="style1" style="word-spacing:4px">YENÝ ÜYE</p>
                       <p class="style2"style="word-spacing:4px">Aktivasyon Ýþlemi</p>
	<p style="word-spacing:4px">Eðer yeni üye olduysanýz e-mailinizden üyeliðiliðinizi aktive etmeniz gerekmektedir.</p>
                       <p style="word-spacing:4px">E-malinize yollanan aktiasyon linkini týklayarak yada bu adresi adres çubuðuna kopyalayarak 
aktivasyon iþlemini gerçekleþtirebilirsiniz.</p>
                       <p style="word-spacing:4px"> Aktivasyon Postam Gelmedi
üye oluðunuz halde aktivasyon postanýz gemediði takdirde aktivasyon postam gelmedi linkine týklayarak geçici þifrenizi alabilirsiniz.					    </p>
                       <p>
					   <table  border="0">
    <tr>
     <td><img src="help images/oturum_ac.JPG" width="400" height="270" /></td>
    </tr>
    <tr>
	<td><img src="help images/aktive.JPG" width="400" height="270" /></td>
	</tr> 
</table>

                         <p>
                           <? } else if($sayfa=="alan"){?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                         <p class="style1">ALICI REHBERÝ</p>
                         <p style="word-spacing:4px">&nbsp;&nbsp;&nbsp;&nbsp; <span class="style2">Ürün Arama</span>                         
<p>Aradýðýnýz ürünün adýný arama kutusuna yazarak daha sonra aradýðýnýz kategoriyi seçerek ara butonuna basýnýz.							</p>
                         <p style="word-spacing:4px">Gelen seçenekler arasýndan size uygun olaný seçiniz. </p>
                         <p style="word-spacing:4px"><img src="help images/ara.JPG" width="400" height="270" /><br/>
</p>
                         <p class="style2">Ürün Alma</p>
<p>1- <span class="style2">Teklif Ver</span></p>
                         <p style="word-spacing:4px">-----------'da teklif verebilmek için öncelikle kayýtlý kullanýcý olmanýz ve bazý þartlarý saðlamanýz gerekir.
							 Kayýt iþlemi birkaç dakikalýk ve ücretsiz bir iþlemdir. 
							----------'un temel formatý, online açýk artýrma formatýdýr ve bu format, teklif verme prensibiyle çalýþýr.
							 Satýcýlarýn ürünlerini belirli bir süreliðine listeledikleri ve en yüksek teklif sahibine satýþ yaptýklarý 
							 bu formatta önceden ürünü kazanan belli deðildir. 
							Açýk artýrma ve teklif sisteminin iþleyiþi:
							  Süre sonunda en yüksek teklif sahibiyseniz, ürünü kazanmýþ olursunuz.
							 ----------- sizi email ile bilgilendirir. Kazandýðýnýz ürünle ilgili tüm iþlemleri (ödeme, kargo takibi vb)
							  Hesabým sayfanýzdan yapabilirsiniz</p>
                         <p>2- <span class="style2">Hemen Alma</span></p>
                         <p style="word-spacing:4px"> ------------ da beðendiðiniz ürünü hemen al fiyatýný ödeyerek ürün süresini dolmasýný beklemeden 
                           albilirsiniz bunun için almaya karar verdiðiniz ürünün bir hemen al fiyatýnýn satýcý tarafýndan 
                           belirlenmiþ olmasý gerekir.</p>
                         <p> <img src="help images//hemen_teklif.JPG" width=400 height="270"/><br/>
</p>
                         <p>3- <span class="style2">Ýzlemeye Al</span></p>
                         <p> izlemeye al ile beðendiðiniz ürünleri takip edebilirsiniz.Ýzlemeye aldýðýnýz ürünlerdeki tüm deðiþiklikleri
bu bölümden izleyebilirsiniz</p>
                         <p style="word-spacing:4px">Teklif verdiðiniz ürünleri izlemeye alamazsýnýz. <img src="help images/izle.jpg" width="400" height="270" align="left" /><br/>
                       </p>
                         
                         <p>4-<span class="style2">Sepete Ekle</span></p>
                         <p style="word-spacing:4px">Bir kaç ürünü birden almak istediðinizde almak istediðniz ürünleri sepete ekleyerek ayný anda birden fazla ürünü
alabilirsiniz.</p>
                         <p style="word-spacing:4px">Sepete ekleyebilmek için ürüne bir hemen al fiyatý belirlenmiþ olmasý gerekir.</p>
                         <p> <img src="help images/sepet.JPG" width="400" height="270" align="left" /><br/ >
                           <? }else if($sayfa=="satan"){?>
<p class="style1">SATICI REHBERÝ</p>
		<p>	Ödemenizin yapýldýðý bilgisini alýn.
		Ürün bittiðinde ve ürünü kazanan alýcý ödeme yaptýðýnda --------- size email ile bilgi verir ve</p>
        <p> hesabým sayfanýzýn satýlýða çýkardýklarým bölümünde 
		ürününüzün yanýnda "ödeme alýnmýþtýr, kargo yapmanýz bekleniyor" ibaresi yer alýr.</p>
         <p>Ürün alým tarihinden 4 gün sonra alýcýnýn dört gün içinde ödeme yapmasý gerekiyor. </p>
         <p>Bu süre içinde alýcýya hatýrlatma e-mail'li gönderebilirsiniz. 
                           
                           Ýkinci þans
		eðer alýcý ödemeyi yapmamýþsa ve ürününüzde baþka stok_teklif varsa,</p>
        <p> bu teklif sahiplerinden ikinci en yüksek teklif sahibine ürünü satabilirsiniz. 
		Unutmayýn ki, herkes her an internete baðlanamayabiliyor,</p>
        <p> aksaklýk yaþayabiliyor, ani seyahatler, beklenmeyen geliþmeler olabiliyor. 
		Satýcý olarak göstereceðiniz tölerans, sizin müþteri</p>
        <p> kazanmanýzý saðlayacaktýr.</p>Ürünü kargolayýn.
		Alýcýnýn ödemesini takip eden 3 günü içinde ürünü kargolamalýsýnýz.Ürününüze</p>
        <p> kargo sýrasýnda bir hasar gelmemesi için özenli paketleme yapýn. 
		--------- size para transferini yapar.Hesabým sayfanýza</p>
         <p> kargo bilgilerini girmenizi takip eden Son 24 saat	
 		içinde, alýcýnýn ürüne onay vermesi gerekir. 
                         <p> Verilmediði takdirde Hesabým sayfanýzda "onay hatýrlat" linkine týklanabilir. Bu linke bastýðýnýz anda alýcýya onay vermesi için e-mail gönderilir. 
						 Bu süre sonunda da onay gelmediði veya alýcý -----------’a ulaþmadýðý takdirde ürüne ----------- tarafýndan onay verilir.</p>
                         <p class="style2"> Ýade & Ýrtibat</p>
							Onay hatýrlat linkini kullanmadan önce alýcýya mesajla veya telefonla ulaþmanýzý öneririz. Çünkü kýsa bir mesaj veya</p>
                         <p> telefon konuþmasý, olasý aksaklýklarý, istenmeyen durumlarý önleyecektir. 
                           
Alýcýnýn ürünü iade etmek istemesi durumunda, iade kargo ücreti</p>
                         <p> alýcý tarafýndan ödenmelidir. Alýcý ürünü iade etmeden önce yine kendisiyle irtibatta olmanýz birçok gerekli olmayan iadeleri önceden</p>
                         <p> engelleyecektir. 
                           
                           Onay & Transfer
Alýcý onayýný takip eden ilk iþ gününde ----------- tarafýndan banka hesabýnýza ürün bedeli transfer edilir.</p>
                         <? }else if($sayfa=="artirimbitince"){?>
</p>
                         <p>Kazandýðýnýz teklifi alabilmek için kargo adresinizi satýcýya gondermeniz gerekir.Alýcýlar açýk artýrma bittiðinde 
4 gün içinde </p>
                         <p>ürün fiyatýný ödemek zorundadýr.
                           <? }else if($sayfa=="hesap"){?>
</p>
                         <p>Size özel bilgileri görebilmek için üye giriþi yaptýktan sonra hesabým bölümüne girmeniz gerekir.
Satýlýða çýkardýklarýnýz</p>
                         <p> ürünlerden listenenleri, zamaný dolanlarý,ücreti ödenecekleri ve satýn alýnanlarý görebilirsiniz. 
                           
                           stok_teklif
                           
Bu bölümde verdiðiniz</p>
                         <p> stok_teklif, kazandýýnýz stok_teklif ve kazanamadýðýnýz stok_teklif bulunur.
                           
                           Ýzlemeye aldýklarým
                           
bu bölümde ürünlerdeki deðiþiklikleri</p>
                         <p> izleyebilirsiniz.
                           
                           Kiþisel bilglerim
                           
                           bu bölümde kiþisel bilgilerinizi görebilir ve kisisel blgilerinizde deðiþiklik yapabilirsiniz.
                           <? }else if($sayfa=="sozlesme"){?>
</p>
                         <p class="style1">
                           SÖZLEÞME VE KURALLAR</p>
<p>---------.com açýk artýrma sitesinde kayýt, teklif, satýþ iþlemlerini yapabilmeniz için öncelikle 18 yaþýndan büyük olmalýsýnýz.</p>
                         <p> Kayýt iþleminden önce bütün kullanýcýlarýn ----------- Kullanýcý Sözleþmesini okuduðu ve kabul ettiði sayýlýr. 
                           
----------  sözleþmede belirtildiði </p>
                         <p>gibi satýþ yükümlülüðünü yerine getirmeyen, listeleme kurallarýna aykýrý hareket eden, satýcýnýn þartlarýný kabul ederek teklif veren ve</p>
                         <p> yükümlülüklerini yerine getirmeyen, hileli davranýþta bulunan, manipülatif teklif veren üyelerin, üyeliklerini geçici olarak veya tamamen bitirebilir.
                           <? }else if($sayfa=="kural"){?>
</p>
                         <p class="style2">Yasaklý Ürünler</p>
<p> ----------- sitesi olarak, kayýtlý kullanýcýlarýmýza daha güvenli bir internet ortamý saðlamayý ilke edindik. Bu sebepten dolayý, üyelerimizin </p>
                         <p>kendilerini daha rahat hissetmeleri için onlara çeþitli gizlilik haklarý tanýdýk. ----------- üyelerinin, sahip olduklarý bu haklar, aþaðýda sýralanmýþtýr</p>
                         <p>
                           
                         1. Elektronik posta adresiniz hiçbir gerekçe ile baþka kuruluþlara daðýtýlmayacak ve reklam, tanýtým, pazarlama yapmak amacýyla kullanýlmayacaktýr.</p>
                         <p>2. Bize verdiðiniz üyelik bilgileri ve kiþisel bilgiler, sizin onayýnýz dýþýnda diðer üyelere açýlmayacaktýr. Ancak bu bilgiler, ----------- sitesinin kendi bünyesinde müþteri profili belirlemek amacýyla kullanýlacaktýr.</p>
                         <p> 3. Sisteme girdiðiniz tüm bilgilere sadece siz ulaþabilir ve bunlarý sadece siz deðiþtirebilirsiniz. Bir baþka üyenin sizinle ilgili bilgilere ulaþmasý ve bunlarý deðiþtirmesi mümkün deðildir.</p>
                         <p> 4. Kayýt esnasýnda sizden istenen kiþisel bilgilerden, zorunlu olanlar hariç, istediklerinizi kendi insiyatifiniz dahilinde bize bildirebilirsiniz. Bize vermeyi tercih etmeyeceðiniz bilgiler varsa, bu alanlarý doldurmak veya iþaretlemek zorunda deðilsiniz.
                           
                         Bu ilkeler ile kiþisel haklarýnýz bizim tarafýmýzdan teminat altýna alýnmýþtýr.
                           
                          
                         Alým-Satýmý devlet iznine tabi olan ürünler 
                        <p> Alkollü içecekler 
                         <p>Ateþli silahlar ve býçaklar 
                         <p>Askeri teçhizat 
                         <p>Canlý hayvan 
                         <p>Çalýntý mallar 
                         <p>Dinleme cihazlarý 
                         <p>Hisse senedi, tahvil, bono 
                         <p>Ýnsan organlarý 
                         <p>Kaçak ve ithalatý yasak ürünler 
                         <p>Kopya ve bandrolsüz ürünler 
                         <p>Linkler (ürün açýklamasý) 
                         <p>Maymuncuk ve kilit açýcýlar 
                         <p>Promosyon ürünleri 
                         <p>Pornografik içerikli malzemeler 
                         <p>Radar detektörleri 
                         <p>Reçeteli ilaçlar & Vitamin haplarý 
                           <p>Sahte veya Replika ürünler 
                           <p>Þans oyunlarý biletleri 
                           <p>Telsiz ve komünikasyon cihazlarý 
                           <p>Toplu elektronik posta adresi listeleri </p>
                           <p>TV dekoderleri ve þifreli yayýn çözücüler </p>
                           <p>Tütün mamülleri </p>
                           <p>Uyuþturucu maddeler </p>
                           <p>Ürün vasfýna sahip olmayan listelemeler</p>   
                           <p>Yanýcý ve patlayýcý maddeler </p>
                           <p>Yasaklý yayýnlar </p>
                           <p>Hukuki Ýhlal Gerçekleþtirebilecek ürünler </p>
                           <p>Kontratlar </p>
                           <p>Telif hakkýna sahip ürünler </p>
                           <p>Yüz fotoðrafý, isimler ve imzalar </p>
                           <p>Oyunlar (5 yýldan eski olmayan lisanssýz oyunlar)</p> 
                           <p>Yazýlýmlar (Lisanssýz yazýlýmlar)</p> 
                           <p>Tescilli marka olan ürünler </p>
                           Dikkat Edilmesi gereken ürünler 
                           
                           <p>Etkinlik biletleri 
                           <p>Kullanýlmýþ giyim eþyasý 
                           <p>Kullanýlmýþ týbbi cihazlar 
                           <p>Yiyecek maddeleri</p>
                           <? }else if($sayfa=="sss"){?>
</p>
                         <p class="style1">Ticaret nasýl gerçekleþiyor?</p>
                         <p>Açýk artýrmayý kazandýnýz veya ürün sattýnýz! Peki þimdi, alýcý ve satýcý arasýndaki ürün ve para transferi nasýl gerçekleþecek? 
                           
							-----------, alýcý ve satýcýlarýn buluþma yeridir ve ayný zamanda havuz hesap yönetimi yapmaktadýr. 
							Alýcýnýn parasý, ürün teslim edildikten sonra satýcýya, ----------- tarafýndan ödenmektedir. Bu kolay, hýzlý ve güvenli döngü,
							 Güvenli Ticaret döngüsüdür.</p>
                         <p><span class="style2"> Baþarýlý bir Güvenli Ticaret döngüsü:</span>                           
						 	<p class="style2">Alýcý Öder</p> 
                           Açýk artýrma sonuçlandýktan sonra kazanan alýcý, ürün bedelini 4  günü 
                           içerisinde, kredi kartý ile -----------'uný havuz hesabýna öder. Para, havuz hesapta açýk artýrma numarasý ile bloke edilir.    
                           <p class="style2">Satýcý Kargolar</p> 
                           Satýcý ödeme alýndýktan sonra 3 iþ günü içerisinde ürünü alýcýya gönderir. 
                           <p  class="style2">Alýcý Onaylar</p> 
                        Alýcý ürünü teslim aldýðýnda, Hesabým sayfasýndan onay verir.    
                           <p class="style2">Para Satýcýya Aktarýlýr</p> 
                           Ürün bedeli, alýcýnýn onayýyla ----------- tarafýndan satýcýnýn banka hesabýna aktarýlýr.    
                           Güvenli Ticaret sayesinde satýcý, ürünü yollamadan önce tahsilatýný garanti altýna almýþ olur. Alýcý ise, parayý satýcýya 
						   ödemeden önce ürünü inceleme fýrsatý bulmuþ olur.    
                         <p class="style2" >  Sorularýnýz:</p>
                           Güvenli Ticaret döngüsüyle ilgili, aklýnýza takýlan tüm sorularýn yanýtlarýný buradan bulabilirsiniz.
                           <p class="style2" >Teklif iptal etmek</p>
                           Alýcý, teklif iptal þartlarýmýza uyduðu takdirde teklifini iptal edebilir. Teklifinizi iptal edip edemeyeceðiniz iki koþula baðlýdýr:
                           
                           <p class="style2" >Neden teklif iptali yapýyorsunuz?</p>
                           <p class="style2" >Ürünün bitmesine ne kadar süre kaldý?</p>
                           Aþaðýdaki koþullardan bir veya birkaç tanesi gerçekleþtiðinde teklif iptali 
                           yapabilirsiniz:
                           Teklif miktarýný girerken yazým hatasý yaptýysanýz, 
                           Ürüne teklif verdikten sonra satýcý üründe önemli revizyonlar yaptýysa, 
                           Satýcýya ulaþamýyorsanýz, mesajlarýnýza yanýt vermiyorsa teklifinizi, 
                           Satýcý, üründe bir arýza/hasar/kusur meydana geldiðini bildirdiyse,
                           teklifinizi iptal edebilirsiniz. 
                           
                           Teklif iptalinde kalan süre ve profilinizdeki iptal sayýsý da kriterdir:
                           
                           Üründe kalan süre
                           Ýzin verilen
                           Ýzin verilmeyen                           24 saatten fazla
                           
                           
                           Yukarýdaki þartlar saðlanýyorsa, 
teklif iptali yapabilirsiniz. </p>
                         <p> Uyarý: Profilinizdeki teklif iptal sayýlarý sürekli olarak sistem tarafýndan kontrol edilmektedir.Kötü niyetli davranýþlar tespit edildiðinde, haber verilmeksizin üyeliðiniz iptal edilebilir.
                           
                           
                           <p class="style2">Ürün kazandým, ne yapacaðým?</p> 
                           
                           
                           
                           
                           Ürünü kazandýnýz! 
                           
                           Teklif verdiniz ve en yüksek teklif sahibi olarak bir ürün kazandýnýz. ----------- sizi email mesajýyla bilgilendirir ve kazandýðýnýz ürün(ler), stok_teklifinizi takip ettiðiniz Hesabým/stok_teklifim sayfasýndan, Hesabým sayfasýna aktarýlýr.
                           
                           
                           
                           
                           Ödemenizi 4 gün içinde havuz hesabýna yapmalýsýnýz.
                           Kazandýðýnýz ürün veya ürünler Hesabým sayfanýza aktarýlýr. Bu tarihten itibaren 4 gün içinde ----------- havuz hesabýna ödeme yapmalýsýnýz.
                           
                           
                              Ödemeniz alýndýðýnda kargo adres bilgileriniz satýcýya ulaþtýrýlýr.
                           
                           
                           3 iþ günü & son 24 saat
                           Ödemenizi takip eden 3 iþ günü içinde satýcýnýn ürünü kargolama süresi vardýr. Bu süre sonunda ürün size kargolanmadýysa, "kargo hatýrlat" linki üzerinden satýcýya son 24 saatlik süre tanýnýr.
                           
                           
                           <p class="style2">Ürün kargolanmadý</p>
                           Satýcý ürünü son 24 saat uyarýsýndan sonra da kargolamadýðý takdirde, Hesabým sayfanýzdan "iþlemi iptal" etme insiyatifi sizdedir. 
                           
                           
             			   <p class="style2">Ürün kargolandý</p>
                           Ürünü teslim alýp onay verin.
                           Ürünü daima kargo görevlisinin yanýnda açýn. Üründe taþýnma esnasýnda herhangi bir kýrýk vb oluþmuþsa görevli zabýt (ürünün durum tespit belgesi) tutmakla yükümlüdür.
                           
                           
                           Onaylayýn
                           Teslim aldýðýnýz ürüne 3 iþ günü içinde onay vermelisiniz. Üründe bir sorun yoksa, Durum sayfanýzdan onay vererek, paranýzýn satýcýya aktarýlmasý için -----------'a talimat vermiþ olursunuz.
                           
                           
                           Ürün size ulaþmadýysa
                           Ürün satýcý tarafýndan kargolanmýþ gözüküyor fakat ürün size zamanýnda ulaþmadýysa, satýcýya ve -----------'a durumu bildirerek onay sürenizi uzattýrabilirsiniz.
                           
                           
                           Hile rapor etmek/Ürün iadesi
                           Ürün, tanýtýlandan tamamen farklý veya kusurlu/arýzalý ise, ürünü iade etmek için Hile rapor edebilirsiniz. Keyfi iadelerin engeli için, iade kargo ücreti alýcýlara aittir.
                           
                           
                           Ýade edilecek ürünün iade kargo bilgileri de -----------'a bildirilmelidir. Ýade kargo satýcýsýna ulaþtýðýnda, ürün bedeli herhangi bir kesintiye uðramadan ----------- tarafýndan alýcýya iade edilir. Ýadeler, alýcýnýn ödemeyi hangi yolla yaptýðýna göre deðiþir. 
                           puan ve yorum verin.
                           Alýþveriþiniz esnasýnda yaþadýklarýnýzýn özetini, tecrübelerinizi en dürüst þekilde yazýn. Yazdýklarýnýz diðer kullanýcýlara, diðer kullanýcýlarýn yazdýklarý da size yol gösterecektir. -----------'un en önemli yapý taþlarýndan birisi Kullanýcý profili sistemidir.
                           <? }else if($sayfa=="gizli"){?>
                           <span class="style1">Gizlilik Politikasý</span> 
                           ----------- sitesi olarak, kayýtlý kullanýcýlarýmýza daha güvenli bir internet ortamý saðlamayý ilke edindik. Bu sebepten dolayý, üyelerimizin kendilerini daha rahat hissetmeleri için onlara çeþitli gizlilik haklarý tanýdýk. ----------- üyelerinin, sahip olduklarý bu haklar, aþaðýda sýralanmýþtýr:
                           
                           1. Elektronik posta adresiniz hiçbir gerekçe ile baþka kuruluþlara daðýtýlmayacak ve reklam, tanýtým, pazarlama yapmak amacýyla kullanýlmayacaktýr.
                           
                           2. Bize verdiðiniz üyelik bilgileri ve kiþisel bilgiler, sizin onayýnýz dýþýnda diðer üyelere açýlmayacaktýr. Ancak bu bilgiler, ----------- sitesinin kendi bünyesinde müþteri profili belirlemek amacýyla kullanýlacaktýr.
                           
                           3. Sisteme girdiðiniz tüm bilgilere sadece siz ulaþabilir ve bunlarý sadece siz deðiþtirebilirsiniz. Bir baþka üyenin sizinle ilgili bilgilere ulaþmasý ve bunlarý deðiþtirmesi mümkün deðildir.
                           
                           4. Kayýt esnasýnda sizden istenen kiþisel bilgilerden, zorunlu olanlar hariç, istediklerinizi kendi insiyatifiniz dahilinde bize bildirebilirsiniz. Bize vermeyi tercih etmeyeceðiniz bilgiler varsa, bu alanlarý doldurmak veya iþaretlemek zorunda deðilsiniz.
                           
                           Bu ilkeler ile kiþisel haklarýnýz bizim tarafýmýzdan teminat altýna alýnmýþtýr.
                           <? }else{



}
include("alt.php");?>
                                                                                                                                                                                                                                                                                                                                                                                                                </p>
