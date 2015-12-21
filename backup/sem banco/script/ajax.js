function getXmlHttp() {
var xmlhttp;
  if (window.XMLHttpRequest) {
  xmlhttp = new XMLHttpRequest();  
    } else if (window.ActiveXObject) {
   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");  
    } else {
  xmlhttp = false;
    }
return xmlhttp;
} 
