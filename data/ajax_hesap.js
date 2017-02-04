var xmlHttp

function hesap_page(p,p2){
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null){return} 
	var url="data/username.php"
	url=url+"?p="+p+"&p2="+p2
	url=url+"&psid="+Math.random()
	xmlHttp.onreadystatechange=stateChangedHesapPage
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
} 

function stateChangedHesapPage() {
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){document.getElementById("hint_page").innerHTML=xmlHttp.responseText } 
} 

function GetXmlHttpObject(){ 
	var objXMLHttp=null
	if (window.XMLHttpRequest){objXMLHttp=new XMLHttpRequest()}
	else if (window.ActiveXObject){objXMLHttp=new ActiveXObject("Microsoft.XMLHTTP")}
	return objXMLHttp
} 