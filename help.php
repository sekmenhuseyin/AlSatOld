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

                       <p class="style1" style="word-spacing:4px">YEN� �YE</p>
                       <p class="style2"style="word-spacing:4px">Aktivasyon ��lemi</p>
	<p style="word-spacing:4px">E�er yeni �ye olduysan�z e-mailinizden �yeli�ili�inizi aktive etmeniz gerekmektedir.</p>
                       <p style="word-spacing:4px">E-malinize yollanan aktiasyon linkini t�klayarak yada bu adresi adres �ubu�una kopyalayarak 
aktivasyon i�lemini ger�ekle�tirebilirsiniz.</p>
                       <p style="word-spacing:4px"> Aktivasyon Postam Gelmedi
�ye olu�unuz halde aktivasyon postan�z gemedi�i takdirde aktivasyon postam gelmedi linkine t�klayarak ge�ici �ifrenizi alabilirsiniz.					    </p>
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
                         <p class="style1">ALICI REHBER�</p>
                         <p style="word-spacing:4px">&nbsp;&nbsp;&nbsp;&nbsp; <span class="style2">�r�n Arama</span>                         
<p>Arad���n�z �r�n�n ad�n� arama kutusuna yazarak daha sonra arad���n�z kategoriyi se�erek ara butonuna bas�n�z.							</p>
                         <p style="word-spacing:4px">Gelen se�enekler aras�ndan size uygun olan� se�iniz. </p>
                         <p style="word-spacing:4px"><img src="help images/ara.JPG" width="400" height="270" /><br/>
</p>
                         <p class="style2">�r�n Alma</p>
<p>1- <span class="style2">Teklif Ver</span></p>
                         <p style="word-spacing:4px">-----------'da teklif verebilmek i�in �ncelikle kay�tl� kullan�c� olman�z ve baz� �artlar� sa�laman�z gerekir.
							 Kay�t i�lemi birka� dakikal�k ve �cretsiz bir i�lemdir. 
							----------'un temel format�, online a��k art�rma format�d�r ve bu format, teklif verme prensibiyle �al���r.
							 Sat�c�lar�n �r�nlerini belirli bir s�reli�ine listeledikleri ve en y�ksek teklif sahibine sat�� yapt�klar� 
							 bu formatta �nceden �r�n� kazanan belli de�ildir. 
							A��k art�rma ve teklif sisteminin i�leyi�i:
							  S�re sonunda en y�ksek teklif sahibiyseniz, �r�n� kazanm�� olursunuz.
							 ----------- sizi email ile bilgilendirir. Kazand���n�z �r�nle ilgili t�m i�lemleri (�deme, kargo takibi vb)
							  Hesab�m sayfan�zdan yapabilirsiniz</p>
                         <p>2- <span class="style2">Hemen Alma</span></p>
                         <p style="word-spacing:4px"> ------------ da be�endi�iniz �r�n� hemen al fiyat�n� �deyerek �r�n s�resini dolmas�n� beklemeden 
                           albilirsiniz bunun i�in almaya karar verdi�iniz �r�n�n bir hemen al fiyat�n�n sat�c� taraf�ndan 
                           belirlenmi� olmas� gerekir.</p>
                         <p> <img src="help images//hemen_teklif.JPG" width=400 height="270"/><br/>
</p>
                         <p>3- <span class="style2">�zlemeye Al</span></p>
                         <p> izlemeye al ile be�endi�iniz �r�nleri takip edebilirsiniz.�zlemeye ald���n�z �r�nlerdeki t�m de�i�iklikleri
bu b�l�mden izleyebilirsiniz</p>
                         <p style="word-spacing:4px">Teklif verdi�iniz �r�nleri izlemeye alamazs�n�z. <img src="help images/izle.jpg" width="400" height="270" align="left" /><br/>
                       </p>
                         
                         <p>4-<span class="style2">Sepete Ekle</span></p>
                         <p style="word-spacing:4px">Bir ka� �r�n� birden almak istedi�inizde almak istedi�niz �r�nleri sepete ekleyerek ayn� anda birden fazla �r�n�
alabilirsiniz.</p>
                         <p style="word-spacing:4px">Sepete ekleyebilmek i�in �r�ne bir hemen al fiyat� belirlenmi� olmas� gerekir.</p>
                         <p> <img src="help images/sepet.JPG" width="400" height="270" align="left" /><br/ >
                           <? }else if($sayfa=="satan"){?>
<p class="style1">SATICI REHBER�</p>
		<p>	�demenizin yap�ld��� bilgisini al�n.
		�r�n bitti�inde ve �r�n� kazanan al�c� �deme yapt���nda --------- size email ile bilgi verir ve</p>
        <p> hesab�m sayfan�z�n sat�l��a ��kard�klar�m b�l�m�nde 
		�r�n�n�z�n yan�nda "�deme al�nm��t�r, kargo yapman�z bekleniyor" ibaresi yer al�r.</p>
         <p>�r�n al�m tarihinden 4 g�n sonra al�c�n�n d�rt g�n i�inde �deme yapmas� gerekiyor. </p>
         <p>Bu s�re i�inde al�c�ya hat�rlatma e-mail'li g�nderebilirsiniz. 
                           
                           �kinci �ans
		e�er al�c� �demeyi yapmam��sa ve �r�n�n�zde ba�ka stok_teklif varsa,</p>
        <p> bu teklif sahiplerinden ikinci en y�ksek teklif sahibine �r�n� satabilirsiniz. 
		Unutmay�n ki, herkes her an internete ba�lanamayabiliyor,</p>
        <p> aksakl�k ya�ayabiliyor, ani seyahatler, beklenmeyen geli�meler olabiliyor. 
		Sat�c� olarak g�sterece�iniz t�lerans, sizin m��teri</p>
        <p> kazanman�z� sa�layacakt�r.</p>�r�n� kargolay�n.
		Al�c�n�n �demesini takip eden 3 g�n� i�inde �r�n� kargolamal�s�n�z.�r�n�n�ze</p>
        <p> kargo s�ras�nda bir hasar gelmemesi i�in �zenli paketleme yap�n. 
		--------- size para transferini yapar.Hesab�m sayfan�za</p>
         <p> kargo bilgilerini girmenizi takip eden Son 24 saat	
 		i�inde, al�c�n�n �r�ne onay vermesi gerekir. 
                         <p> Verilmedi�i takdirde Hesab�m sayfan�zda "onay hat�rlat" linkine t�klanabilir. Bu linke bast���n�z anda al�c�ya onay vermesi i�in e-mail g�nderilir. 
						 Bu s�re sonunda da onay gelmedi�i veya al�c� -----------�a ula�mad��� takdirde �r�ne ----------- taraf�ndan onay verilir.</p>
                         <p class="style2"> �ade & �rtibat</p>
							Onay hat�rlat linkini kullanmadan �nce al�c�ya mesajla veya telefonla ula�man�z� �neririz. ��nk� k�sa bir mesaj veya</p>
                         <p> telefon konu�mas�, olas� aksakl�klar�, istenmeyen durumlar� �nleyecektir. 
                           
Al�c�n�n �r�n� iade etmek istemesi durumunda, iade kargo �creti</p>
                         <p> al�c� taraf�ndan �denmelidir. Al�c� �r�n� iade etmeden �nce yine kendisiyle irtibatta olman�z bir�ok gerekli olmayan iadeleri �nceden</p>
                         <p> engelleyecektir. 
                           
                           Onay & Transfer
Al�c� onay�n� takip eden ilk i� g�n�nde ----------- taraf�ndan banka hesab�n�za �r�n bedeli transfer edilir.</p>
                         <? }else if($sayfa=="artirimbitince"){?>
</p>
                         <p>Kazand���n�z teklifi alabilmek i�in kargo adresinizi sat�c�ya gondermeniz gerekir.Al�c�lar a��k art�rma bitti�inde 
4 g�n i�inde </p>
                         <p>�r�n fiyat�n� �demek zorundad�r.
                           <? }else if($sayfa=="hesap"){?>
</p>
                         <p>Size �zel bilgileri g�rebilmek i�in �ye giri�i yapt�ktan sonra hesab�m b�l�m�ne girmeniz gerekir.
Sat�l��a ��kard�klar�n�z</p>
                         <p> �r�nlerden listenenleri, zaman� dolanlar�,�creti �denecekleri ve sat�n al�nanlar� g�rebilirsiniz. 
                           
                           stok_teklif
                           
Bu b�l�mde verdi�iniz</p>
                         <p> stok_teklif, kazand��n�z stok_teklif ve kazanamad���n�z stok_teklif bulunur.
                           
                           �zlemeye ald�klar�m
                           
bu b�l�mde �r�nlerdeki de�i�iklikleri</p>
                         <p> izleyebilirsiniz.
                           
                           Ki�isel bilglerim
                           
                           bu b�l�mde ki�isel bilgilerinizi g�rebilir ve kisisel blgilerinizde de�i�iklik yapabilirsiniz.
                           <? }else if($sayfa=="sozlesme"){?>
</p>
                         <p class="style1">
                           S�ZLE�ME VE KURALLAR</p>
<p>---------.com a��k art�rma sitesinde kay�t, teklif, sat�� i�lemlerini yapabilmeniz i�in �ncelikle 18 ya��ndan b�y�k olmal�s�n�z.</p>
                         <p> Kay�t i�leminden �nce b�t�n kullan�c�lar�n ----------- Kullan�c� S�zle�mesini okudu�u ve kabul etti�i say�l�r. 
                           
----------  s�zle�mede belirtildi�i </p>
                         <p>gibi sat�� y�k�ml�l���n� yerine getirmeyen, listeleme kurallar�na ayk�r� hareket eden, sat�c�n�n �artlar�n� kabul ederek teklif veren ve</p>
                         <p> y�k�ml�l�klerini yerine getirmeyen, hileli davran��ta bulunan, manip�latif teklif veren �yelerin, �yeliklerini ge�ici olarak veya tamamen bitirebilir.
                           <? }else if($sayfa=="kural"){?>
</p>
                         <p class="style2">Yasakl� �r�nler</p>
<p> ----------- sitesi olarak, kay�tl� kullan�c�lar�m�za daha g�venli bir internet ortam� sa�lamay� ilke edindik. Bu sebepten dolay�, �yelerimizin </p>
                         <p>kendilerini daha rahat hissetmeleri i�in onlara �e�itli gizlilik haklar� tan�d�k. ----------- �yelerinin, sahip olduklar� bu haklar, a�a��da s�ralanm��t�r</p>
                         <p>
                           
                         1. Elektronik posta adresiniz hi�bir gerek�e ile ba�ka kurulu�lara da��t�lmayacak ve reklam, tan�t�m, pazarlama yapmak amac�yla kullan�lmayacakt�r.</p>
                         <p>2. Bize verdi�iniz �yelik bilgileri ve ki�isel bilgiler, sizin onay�n�z d���nda di�er �yelere a��lmayacakt�r. Ancak bu bilgiler, ----------- sitesinin kendi b�nyesinde m��teri profili belirlemek amac�yla kullan�lacakt�r.</p>
                         <p> 3. Sisteme girdi�iniz t�m bilgilere sadece siz ula�abilir ve bunlar� sadece siz de�i�tirebilirsiniz. Bir ba�ka �yenin sizinle ilgili bilgilere ula�mas� ve bunlar� de�i�tirmesi m�mk�n de�ildir.</p>
                         <p> 4. Kay�t esnas�nda sizden istenen ki�isel bilgilerden, zorunlu olanlar hari�, istediklerinizi kendi insiyatifiniz dahilinde bize bildirebilirsiniz. Bize vermeyi tercih etmeyece�iniz bilgiler varsa, bu alanlar� doldurmak veya i�aretlemek zorunda de�ilsiniz.
                           
                         Bu ilkeler ile ki�isel haklar�n�z bizim taraf�m�zdan teminat alt�na al�nm��t�r.
                           
                          
                         Al�m-Sat�m� devlet iznine tabi olan �r�nler 
                        <p> Alkoll� i�ecekler 
                         <p>Ate�li silahlar ve b��aklar 
                         <p>Askeri te�hizat 
                         <p>Canl� hayvan 
                         <p>�al�nt� mallar 
                         <p>Dinleme cihazlar� 
                         <p>Hisse senedi, tahvil, bono 
                         <p>�nsan organlar� 
                         <p>Ka�ak ve ithalat� yasak �r�nler 
                         <p>Kopya ve bandrols�z �r�nler 
                         <p>Linkler (�r�n a��klamas�) 
                         <p>Maymuncuk ve kilit a��c�lar 
                         <p>Promosyon �r�nleri 
                         <p>Pornografik i�erikli malzemeler 
                         <p>Radar detekt�rleri 
                         <p>Re�eteli ila�lar & Vitamin haplar� 
                           <p>Sahte veya Replika �r�nler 
                           <p>�ans oyunlar� biletleri 
                           <p>Telsiz ve kom�nikasyon cihazlar� 
                           <p>Toplu elektronik posta adresi listeleri </p>
                           <p>TV dekoderleri ve �ifreli yay�n ��z�c�ler </p>
                           <p>T�t�n mam�lleri </p>
                           <p>Uyu�turucu maddeler </p>
                           <p>�r�n vasf�na sahip olmayan listelemeler</p>   
                           <p>Yan�c� ve patlay�c� maddeler </p>
                           <p>Yasakl� yay�nlar </p>
                           <p>Hukuki �hlal Ger�ekle�tirebilecek �r�nler </p>
                           <p>Kontratlar </p>
                           <p>Telif hakk�na sahip �r�nler </p>
                           <p>Y�z foto�raf�, isimler ve imzalar </p>
                           <p>Oyunlar (5 y�ldan eski olmayan lisanss�z oyunlar)</p> 
                           <p>Yaz�l�mlar (Lisanss�z yaz�l�mlar)</p> 
                           <p>Tescilli marka olan �r�nler </p>
                           Dikkat Edilmesi gereken �r�nler 
                           
                           <p>Etkinlik biletleri 
                           <p>Kullan�lm�� giyim e�yas� 
                           <p>Kullan�lm�� t�bbi cihazlar 
                           <p>Yiyecek maddeleri</p>
                           <? }else if($sayfa=="sss"){?>
</p>
                         <p class="style1">Ticaret nas�l ger�ekle�iyor?</p>
                         <p>A��k art�rmay� kazand�n�z veya �r�n satt�n�z! Peki �imdi, al�c� ve sat�c� aras�ndaki �r�n ve para transferi nas�l ger�ekle�ecek? 
                           
							-----------, al�c� ve sat�c�lar�n bulu�ma yeridir ve ayn� zamanda havuz hesap y�netimi yapmaktad�r. 
							Al�c�n�n paras�, �r�n teslim edildikten sonra sat�c�ya, ----------- taraf�ndan �denmektedir. Bu kolay, h�zl� ve g�venli d�ng�,
							 G�venli Ticaret d�ng�s�d�r.</p>
                         <p><span class="style2"> Ba�ar�l� bir G�venli Ticaret d�ng�s�:</span>                           
						 	<p class="style2">Al�c� �der</p> 
                           A��k art�rma sonu�land�ktan sonra kazanan al�c�, �r�n bedelini 4  g�n� 
                           i�erisinde, kredi kart� ile -----------'un� havuz hesab�na �der. Para, havuz hesapta a��k art�rma numaras� ile bloke edilir.    
                           <p class="style2">Sat�c� Kargolar</p> 
                           Sat�c� �deme al�nd�ktan sonra 3 i� g�n� i�erisinde �r�n� al�c�ya g�nderir. 
                           <p  class="style2">Al�c� Onaylar</p> 
                        Al�c� �r�n� teslim ald���nda, Hesab�m sayfas�ndan onay verir.    
                           <p class="style2">Para Sat�c�ya Aktar�l�r</p> 
                           �r�n bedeli, al�c�n�n onay�yla ----------- taraf�ndan sat�c�n�n banka hesab�na aktar�l�r.    
                           G�venli Ticaret sayesinde sat�c�, �r�n� yollamadan �nce tahsilat�n� garanti alt�na alm�� olur. Al�c� ise, paray� sat�c�ya 
						   �demeden �nce �r�n� inceleme f�rsat� bulmu� olur.    
                         <p class="style2" >  Sorular�n�z:</p>
                           G�venli Ticaret d�ng�s�yle ilgili, akl�n�za tak�lan t�m sorular�n yan�tlar�n� buradan bulabilirsiniz.
                           <p class="style2" >Teklif iptal etmek</p>
                           Al�c�, teklif iptal �artlar�m�za uydu�u takdirde teklifini iptal edebilir. Teklifinizi iptal edip edemeyece�iniz iki ko�ula ba�l�d�r:
                           
                           <p class="style2" >Neden teklif iptali yap�yorsunuz?</p>
                           <p class="style2" >�r�n�n bitmesine ne kadar s�re kald�?</p>
                           A�a��daki ko�ullardan bir veya birka� tanesi ger�ekle�ti�inde teklif iptali 
                           yapabilirsiniz:
                           Teklif miktar�n� girerken yaz�m hatas� yapt�ysan�z, 
                           �r�ne teklif verdikten sonra sat�c� �r�nde �nemli revizyonlar yapt�ysa, 
                           Sat�c�ya ula�am�yorsan�z, mesajlar�n�za yan�t vermiyorsa teklifinizi, 
                           Sat�c�, �r�nde bir ar�za/hasar/kusur meydana geldi�ini bildirdiyse,
                           teklifinizi iptal edebilirsiniz. 
                           
                           Teklif iptalinde kalan s�re ve profilinizdeki iptal say�s� da kriterdir:
                           
                           �r�nde kalan s�re
                           �zin verilen
                           �zin verilmeyen                           24 saatten fazla
                           
                           
                           Yukar�daki �artlar sa�lan�yorsa, 
teklif iptali yapabilirsiniz. </p>
                         <p> Uyar�: Profilinizdeki teklif iptal say�lar� s�rekli olarak sistem taraf�ndan kontrol edilmektedir.K�t� niyetli davran��lar tespit edildi�inde, haber verilmeksizin �yeli�iniz iptal edilebilir.
                           
                           
                           <p class="style2">�r�n kazand�m, ne yapaca��m?</p> 
                           
                           
                           
                           
                           �r�n� kazand�n�z! 
                           
                           Teklif verdiniz ve en y�ksek teklif sahibi olarak bir �r�n kazand�n�z. ----------- sizi email mesaj�yla bilgilendirir ve kazand���n�z �r�n(ler), stok_teklifinizi takip etti�iniz Hesab�m/stok_teklifim sayfas�ndan, Hesab�m sayfas�na aktar�l�r.
                           
                           
                           
                           
                           �demenizi 4 g�n i�inde havuz hesab�na yapmal�s�n�z.
                           Kazand���n�z �r�n veya �r�nler Hesab�m sayfan�za aktar�l�r. Bu tarihten itibaren 4 g�n i�inde ----------- havuz hesab�na �deme yapmal�s�n�z.
                           
                           
                              �demeniz al�nd���nda kargo adres bilgileriniz sat�c�ya ula�t�r�l�r.
                           
                           
                           3 i� g�n� & son 24 saat
                           �demenizi takip eden 3 i� g�n� i�inde sat�c�n�n �r�n� kargolama s�resi vard�r. Bu s�re sonunda �r�n size kargolanmad�ysa, "kargo hat�rlat" linki �zerinden sat�c�ya son 24 saatlik s�re tan�n�r.
                           
                           
                           <p class="style2">�r�n kargolanmad�</p>
                           Sat�c� �r�n� son 24 saat uyar�s�ndan sonra da kargolamad��� takdirde, Hesab�m sayfan�zdan "i�lemi iptal" etme insiyatifi sizdedir. 
                           
                           
             			   <p class="style2">�r�n kargoland�</p>
                           �r�n� teslim al�p onay verin.
                           �r�n� daima kargo g�revlisinin yan�nda a��n. �r�nde ta��nma esnas�nda herhangi bir k�r�k vb olu�mu�sa g�revli zab�t (�r�n�n durum tespit belgesi) tutmakla y�k�ml�d�r.
                           
                           
                           Onaylay�n
                           Teslim ald���n�z �r�ne 3 i� g�n� i�inde onay vermelisiniz. �r�nde bir sorun yoksa, Durum sayfan�zdan onay vererek, paran�z�n sat�c�ya aktar�lmas� i�in -----------'a talimat vermi� olursunuz.
                           
                           
                           �r�n size ula�mad�ysa
                           �r�n sat�c� taraf�ndan kargolanm�� g�z�k�yor fakat �r�n size zaman�nda ula�mad�ysa, sat�c�ya ve -----------'a durumu bildirerek onay s�renizi uzatt�rabilirsiniz.
                           
                           
                           Hile rapor etmek/�r�n iadesi
                           �r�n, tan�t�landan tamamen farkl� veya kusurlu/ar�zal� ise, �r�n� iade etmek i�in Hile rapor edebilirsiniz. Keyfi iadelerin engeli i�in, iade kargo �creti al�c�lara aittir.
                           
                           
                           �ade edilecek �r�n�n iade kargo bilgileri de -----------'a bildirilmelidir. �ade kargo sat�c�s�na ula�t���nda, �r�n bedeli herhangi bir kesintiye u�ramadan ----------- taraf�ndan al�c�ya iade edilir. �adeler, al�c�n�n �demeyi hangi yolla yapt���na g�re de�i�ir. 
                           puan ve yorum verin.
                           Al��veri�iniz esnas�nda ya�ad�klar�n�z�n �zetini, tecr�belerinizi en d�r�st �ekilde yaz�n. Yazd�klar�n�z di�er kullan�c�lara, di�er kullan�c�lar�n yazd�klar� da size yol g�sterecektir. -----------'un en �nemli yap� ta�lar�ndan birisi Kullan�c� profili sistemidir.
                           <? }else if($sayfa=="gizli"){?>
                           <span class="style1">Gizlilik Politikas�</span> 
                           ----------- sitesi olarak, kay�tl� kullan�c�lar�m�za daha g�venli bir internet ortam� sa�lamay� ilke edindik. Bu sebepten dolay�, �yelerimizin kendilerini daha rahat hissetmeleri i�in onlara �e�itli gizlilik haklar� tan�d�k. ----------- �yelerinin, sahip olduklar� bu haklar, a�a��da s�ralanm��t�r:
                           
                           1. Elektronik posta adresiniz hi�bir gerek�e ile ba�ka kurulu�lara da��t�lmayacak ve reklam, tan�t�m, pazarlama yapmak amac�yla kullan�lmayacakt�r.
                           
                           2. Bize verdi�iniz �yelik bilgileri ve ki�isel bilgiler, sizin onay�n�z d���nda di�er �yelere a��lmayacakt�r. Ancak bu bilgiler, ----------- sitesinin kendi b�nyesinde m��teri profili belirlemek amac�yla kullan�lacakt�r.
                           
                           3. Sisteme girdi�iniz t�m bilgilere sadece siz ula�abilir ve bunlar� sadece siz de�i�tirebilirsiniz. Bir ba�ka �yenin sizinle ilgili bilgilere ula�mas� ve bunlar� de�i�tirmesi m�mk�n de�ildir.
                           
                           4. Kay�t esnas�nda sizden istenen ki�isel bilgilerden, zorunlu olanlar hari�, istediklerinizi kendi insiyatifiniz dahilinde bize bildirebilirsiniz. Bize vermeyi tercih etmeyece�iniz bilgiler varsa, bu alanlar� doldurmak veya i�aretlemek zorunda de�ilsiniz.
                           
                           Bu ilkeler ile ki�isel haklar�n�z bizim taraf�m�zdan teminat alt�na al�nm��t�r.
                           <? }else{



}
include("alt.php");?>
                                                                                                                                                                                                                                                                                                                                                                                                                </p>
