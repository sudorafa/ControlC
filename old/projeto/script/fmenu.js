var request = getXmlHttp();
var requestc = getXmlHttp();
var requestemail = getXmlHttp();
requestc1= getXmlHttp();
var dssalvar = false;
var idcontrole = 0;
var idlogin=0;
var dcampo1="";
var dcampo2="";
var ncampo;
var nformulario;
var entersair=0;

//funcao para limpar os campos do mov_prestadores

function limparcampos(){
			document.forms[0].elements[1].value = "";
			document.forms[0].elements[4].value = "";
			document.forms[0].elements[5].value = "";
			document.forms[0].elements[6].value = "";
			document.forms[0].elements[7].value = "";
			document.forms[0].elements[8].value = "";
			document.forms[0].elements[9].value = "";
			document.forms[0].elements[10].value = "";
			document.forms[0].elements[11].value = "";
			document.forms[0].elements[12].value = "";
			document.forms[0].elements[13].value = "";
			document.forms[0].elements[14].value = "";
			document.forms[0].elements[15].value = "";
			document.forms[0].elements[16].value = "";
			document.forms[0].elements[17].value = "";
			document.forms[0].elements[1].focus();
	
}



//mudar cor no form
function SetColor(formulario, campo, sair1) {
	var formb = document.forms[0];
		var totalelementos  = formb.length;
	if (entersair==0) {
		document.forms[0].elements[1].focus();
		
	}
	
	for (var i=0; i < totalelementos; i++) {
		if (i == campo) {
			formb[i].style.background='#FFCC66';
			
			  			
		}else{
			formb[i].style.background='#FFFFFF';
		       }

	}
		
}



//funcao para movimentacao dos prestadores

function movprestador(){
		request.open("POST", "confirmamov.php", true);
		request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
    		request.setRequestHeader("Cache-Control", "no-store, no-cache, must-revalidate");
    		request.setRequestHeader("Cache-Control", "post-check=0, pre-check=0");
    		request.setRequestHeader("Pragma", "no-cache");
		
		
		var cpf = document.forms[0].elements[1].value;
		var horaentrada = document.forms[0].elements[8].value;
		var horasaida = document.forms[0].elements[9].value;
		var cracha = document.forms[0].elements[10].value;
		var armario = document.forms[0].elements[11].value;
		var obs = document.forms[0].elements[17].value;
  		var url= "cpf=" + cpf + "&horaentrada="+ horaentrada + "&horasaida="+ horasaida+ "&cracha="+ cracha+ "&armario="+ armario+ "&obs="+ obs;
		request.onreadystatechange = movprestador2;
		request.send(url);
}


//funcao que confirma a movimentacao dos prestadores

function movprestador2(){
	if (request.readyState == 1) {
		document.getElementById('statuspesq').innerHTML ="<img src='flash.gif'>"; 
	}
 else if(request.readyState == 4){
 		document.getElementById('statuspesq').innerHTML =""; 
     	 respmovpres = request.responseText;
			respmovpres = respmovpres.split("<dados>");
			
		if (respmovpres[0]==1){
			document.forms[0].elements[4].value = respmovpres[5];
			document.forms[0].elements[5].value = respmovpres[1];
			document.forms[0].elements[6].value = respmovpres[2];
			document.forms[0].elements[7].value = respmovpres[3];
			document.forms[0].elements[8].value = respmovpres[10];
			document.forms[0].elements[12].value = respmovpres[4];
			cartamens = respmovpres[6].split("<>");
			cartaaso =respmovpres[7].split("<>");
			cartacrim =respmovpres[8].split("<>");
			document.forms[0].elements[13].value = datacerta(cartamens[0]);
			document.forms[0].elements[14].value = datacerta(cartaaso[0]);
			document.forms[0].elements[15].value = datacerta(cartacrim[0]);
			if (cartamens[1]!= 1){
				alert(cartamens[1])
			}
			if (cartaaso[1]!= 1){
				alert(cartaaso[1])
			}
			if (cartacrim[1]!= 1){
				alert(cartacrim[1])
			}
			document.forms[0].elements[16].value = respmovpres[9];

			if (respmovpres[11]==9){
				alert("PROMOTOR INATIVO PELA FILIAL:" + respmovpres[12])
			}
			//document.forms[0].elements[10].value = respmovpres[14];
			//document.forms[0].elements[11].value = respmovpres[15];
			document.forms[0].elements[10].focus();
		}
		else if (respmovpres[0]==2){
			alert(respmovpres[1]);
			limparcampos();	
			document.forms[0].elements[1].focus();
			entersair=0;		
		}
		else if (respmovpres[0]==5){
		alert(respmovpres[1]);
		document.forms[0].elements[1].focus();
		limparcampos();
		entersair=0;
		
		}
		else if (respmovpres[0]==6){
			document.forms[0].elements[4].value = respmovpres[5];
			document.forms[0].elements[5].value = respmovpres[1];
			document.forms[0].elements[6].value = respmovpres[2];
			document.forms[0].elements[7].value = respmovpres[3];
			document.forms[0].elements[8].value = respmovpres[10];
			document.forms[0].elements[9].value = respmovpres[11];
			document.forms[0].elements[12].value = respmovpres[4];
			cartamens = respmovpres[6].split("<>");
			cartaaso =respmovpres[7].split("<>");
			cartacrim =respmovpres[8].split("<>");
			document.forms[0].elements[13].value = datacerta(cartamens[0]);
			document.forms[0].elements[14].value = datacerta(cartaaso[0]);
			document.forms[0].elements[15].value = datacerta(cartacrim[0]);
			if (cartamens[1]!= 1){
				alert(cartamens[1])
			}
			if (cartaaso[1]!= 1){
				alert(cartaaso[1])
			}
			if (cartacrim[1]!= 1){
				alert(cartacrim[1])
			}
			document.forms[0].elements[16].value = respmovpres[9];
			document.forms[0].elements[17].value = respmovpres[12];
			document.forms[0].elements[10].value = respmovpres[13];
			document.forms[0].elements[11].value = respmovpres[14];
			if (respmovpres[15]==9){
				alert("PROMOTOR INATIVO PELA FILIAL:" + respmovpres[16])
			}
			document.forms[0].elements[10].focus();
			
		}
		else if (respmovpres[0]==3){
			alert(respmovpres[1]);
			document.forms[0].elements[1].focus();
			limparcampos();
			entersair=0;
		}

   }


}



//mascara de cpf 
function MascCPF1(formulario, campo, e){
	var code;
	if (e.keyCode) code=e.keyCode;
	else if (e.which) code = e.which;
	else if (e.charCode) code = e.charCode;

	
	var formb = document.forms[formulario].elements[campo].value;
	
	if (code != 8) {
		if ((formb.length == 3) || (formb.length == 7)) {
		
			document.forms[formulario].elements[campo].value = formb + ".";
		}
		else 
			if (formb.length == 11) {
				document.forms[formulario].elements[campo].value = formb + "-";
			}
	}
	
		
}






//mascara de cpf ou busca dados do promotor
function MascCPF(formulario, campo, e){
	var code;
	if (e.keyCode) code=e.keyCode;
	else if (e.which) code = e.which;
	else if (e.charCode) code = e.charCode;

	
	var formb = document.forms[formulario].elements[campo].value;
	
	if (code != 8) {
		if ((formb.length == 3) || (formb.length == 7)) {
		
			document.forms[formulario].elements[campo].value = formb + ".";
		}
		else 
			if (formb.length == 11) {
				document.forms[formulario].elements[campo].value = formb + "-";
			}
	}
	
	if (code == 13) {
		entersair=1;
		movprestador();
	}
	else if(code == 27) {
		entersair=0;
		limparcampos();

		
	}
	
}

//chama funcao de acordo com a tecla
function InserirMovimento(e){
	var code;
	if (e.keyCode) code=e.keyCode;
	else if (e.which) code = e.which;
	else if (e.charCode) code = e.charCode;
	
	if (code == 13) {
		entersair=1;
		movprestador();
	}
	else if(code == 27) {
		entersair=0;
	limparcampos();

	
	
	}
	
}

function testeclovis(){
var whichCode = (window.Event) ? event.which : event.keyCode;   
}



//funcao para validar cnpj

function ValidarCNPJ(ObjCnpj, campofoc){
	var cnpj = ObjCnpj;
	var valida = new Array(6,5,4,3,2,9,8,7,6,5,4,3,2);
	var dig1= new Number;
	var dig2= new Number;
	exp = /\.|\-|\//g 
	
	cnpj = cnpj.toString().replace( exp, "" ); 
	
	var digito = new Number(eval(cnpj.charAt(12)+cnpj.charAt(13)));
		
	for(i = 0; i<valida.length; i++){
		dig1 += (i>0? (cnpj.charAt(i-1)*valida[i]):0);	
		dig2 += cnpj.charAt(i)*valida[i];	
	}
	dig1 = (((dig1%11)<2)? 0:(11-(dig1%11)));
	dig2 = (((dig2%11)<2)? 0:(11-(dig2%11)));
	
	if(((dig1*10)+dig2) != digito)	{
		alert('CNPJ Invalido!');
		document.forms[1].elements[campofoc].value="";
		
	}
}

//fim da funcao que valida cnpj

//funcao que valida cpf
 
function ValidarCPF(Objcpf,campofoc){
exp = /\.|\-/g
var cpf = Objcpf;
cpf = cpf.toString().replace( exp, "" );
var i; 
s = cpf; 
var c = s.substr(0,9); 
var dv = s.substr(9,2); 
var d1 = 0; 
for (i = 0; i < 9; i++){ 
d1 += c.charAt(i)*(10-i); 
} 
if (d1 == 0){ 
	alert('CPF Invalido!');
	document.forms[1].elements[campofoc].value="";	
	exit;
} 
d1 = 11 - (d1 % 11); 
if (d1 > 9) d1 = 0; 
if (dv.charAt(0) != d1){ 
	alert('CPF Invalido!');
	document.forms[1].elements[campofoc].value="";	
	exit;
}
d1 *= 2; 
for (i = 0; i < 9; i++){ 
d1 += c.charAt(i)*(11-i); 
} 
d1 = 11 - (d1 % 11); 
if (d1 > 9) d1 = 0; 
if (dv.charAt(1) != d1){ 
	alert('CPF Invalido!');
	document.forms[1].elements[campofoc].value="";	
	exit;
} 

}
//fim da funcao para validar cpf



//verifica se existe campo em branco

function campobrancoform(){
	var formb = document.forms[1];
	var totalelementos  = formb.length;
	var campb = 0;
	for (var i=0; i < totalelementos; i++) {
		obrigatorio = formb[i].name.split("<>");
		obrigatorio = obrigatorio[1];
		nomobrigado = obrigatorio[0];
		if ((formb[i].value=="") &&(obrigatorio=="true")){
		
			campb = i;
		
		}
				
	}
	
	return campb;


}






//fun��o que ativa e desativa a div procurar( se o parametro for igual a um ele ativa senao desativa)

function procurar(visivel){

	if (visivel == 1){
		document.getElementById('Temppro').style.display='block';
		document.getElementById('Tempcad').style.display='none';
		document.getElementById('Tempmen').style.display='none';
		document.forms[2].elements[0].focus();
	      }
	else{
		document.getElementById('Temppro').style.display='none';
		document.getElementById('Tempcad').style.display='block';
		document.getElementById('Tempmen').style.display='block';
		
	     }
}



//funcao novocadastro:  para zerar os campos do formulario

function novocadastro(numform){

	var formb = document.forms[numform];
	var totalelementos  = formb.length;
	for (var i=0; i < totalelementos; i++) {
		if ( (i) != totalelementos){
		
			formb[i].value="";
		

		}
			
	}
	
}


//funcao para verificar a data e colocar no formato portugues

function datacerta(datanova){	
				var tipodata = datanova.split("-");
							
					if (  ( (tipodata.length) == 3 ) && (tipodata[2].length >= 1   ) && (tipodata[2].length <= 2 )   ) {
						datanova = tipodata[2] + "/" + tipodata[1] + "/" + tipodata[0]; 
					
					}
				return datanova;
}

// funcao que recupera o autonumerico e chama a confirmacao do autonumerico
function cadbanco(){
		request.open("POST", "autonumber.php", true);
		request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
    		request.setRequestHeader("Cache-Control", "no-store, no-cache, must-revalidate");
    		request.setRequestHeader("Cache-Control", "post-check=0, pre-check=0");
    		request.setRequestHeader("Pragma", "no-cache");
		
		
		var campos = document.forms[1].elements[0].name.split("<>");
  		var url= "tabela="+document.forms[1].name + "&campo="+ campos[0];
		request.onreadystatechange = confirmabanco;
		request.send(url);
}


//funcao que confirma o autonumerico e chama a funcao de cadastramento

function confirmabanco(){

  if(request.readyState == 4){
     	 idcontrole = request.responseText;
	 document.forms[1].elements[0].value = idcontrole;
	 var sqlcomp = cadgenerico();
		
		requestc.open("POST", "confirmacadastro.php", true);
		requestc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
    		requestc.setRequestHeader("Cache-Control", "no-store, no-cache, must-revalidate");
    		requestc.setRequestHeader("Cache-Control", "post-check=0, pre-check=0");
    		requestc.setRequestHeader("Pragma", "no-cache");
		var url= "sql="+sqlcomp;
		requestc.onreadystatechange = confirmacad;
		requestc.send(url);
		

   }


}

//funcao para confimar o cadastramento do formulario

function confirmacad(){
	if(requestc.readyState == 4){

		var s_resposta= requestc.responseText;
		
		if (s_resposta == 1 ) {
			
			alert("Cadastro Realizado com Sucesso");
			document.forms[1].elements[0].value = idcontrole;
			
			
		}
		else{
			
			alert("Erro ao tentar cadastrar, procure o CPD para maiores informa��es!!!!!");
			novocadastro(1);
		}
			
	}


}

//funcao para enviar email para o cadastro
function enviar_email(){

				request.open("POST", "enviar_email.php", true);
				request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
    				request.setRequestHeader("Cache-Control", "no-store, no-cache, must-revalidate");
    				request.setRequestHeader("Cache-Control", "post-check=0, pre-check=0");
    				request.setRequestHeader("Pragma", "no-cache");
				var url= "idpromotor="+idcontrole;
				request.onreadystatechange = confirmar_email;
				request.send(url);
}


//funcao para confirmar o envio do email para o cadastro com os dados do prestador

function confirmar_email(){
	if(request.readyState == 4){
		alert(request.responseText);
	}
}

//funcao para editar os dados

function editardados(){

      	
	 	var sqlcomp = sqleditar();
		requestc.open("POST", "confirmacadastro.php", true);	
		requestc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
    		requestc.setRequestHeader("Cache-Control", "no-store, no-cache, must-revalidate");
    		requestc.setRequestHeader("Cache-Control", "post-check=0, pre-check=0");
    		requestc.setRequestHeader("Pragma", "no-cache");
		var url= "sql="+sqlcomp;
		requestc.onreadystatechange = confirmaedit;
		requestc.send(url);



}

//funcao para confimar a edi��o dos dados

function confirmaedit(){
	if(requestc.readyState == 4){

		var s_resposta= requestc.responseText;
		if (s_resposta == 1 ) {
			
			alert("Dados Alterados com Sucesso");
						
		}
		else{
			alert("Erro ao tentar Editar, procure o CPD para maiores informacoes!!!!!");

		}
			
	}


}



//funcao para recuperar o numero da filial

function recuperarfilial(campo, formulario){

      		requestc.open("POST", "recuperarfilial.php", true);	
		requestc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
    		requestc.setRequestHeader("Cache-Control", "no-store, no-cache, must-revalidate");
    		requestc.setRequestHeader("Cache-Control", "post-check=0, pre-check=0");
    		requestc.setRequestHeader("Pragma", "no-cache");
		var url= "";
		requestc.onreadystatechange = confirmarecfil;
		requestc.send(url);



}

//funcao para confimar a recupera��o da filial

function confirmarecfil(){
	if(requestc.readyState == 4){
		var s_resposta= requestc.responseText;
		var formb = document.forms[1];
		var totalelementos  = formb.length;
		
		for (var i=0; i < totalelementos; i++) {
			ndadosfil= document.forms[1].elements[i].name.split("<>");
			if (ndadosfil[0] =="filial")  {
				document.forms[1].elements[i].value=s_resposta;
				
		       }

	}
			
	}


}


//funcao para recuperar a data do servidor

function recuperardata(){

      		requestc.open("POST", "recuperardata.php", true);	
		requestc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
    		requestc.setRequestHeader("Cache-Control", "no-store, no-cache, must-revalidate");
    		requestc.setRequestHeader("Cache-Control", "post-check=0, pre-check=0");
    		requestc.setRequestHeader("Pragma", "no-cache");
		var url= "";
		requestc.onreadystatechange = confirmarecdata;
		requestc.send(url);



}

//funcao para confimar a recupera��o da data

function confirmarecdata(){
	if(requestc.readyState == 4){
		var s_resposta= requestc.responseText;
		
				document.forms[nformulario].elements[ncampo].value=s_resposta;
				
		 
			
	}


}


//funcao para setar o usuario que est� cadastrando

function recusuario(){

      		requestc1.open("POST", "recusuario.php", true);	
		requestc1.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
    		requestc1.setRequestHeader("Cache-Control", "no-store, no-cache, must-revalidate");
    		requestc1.setRequestHeader("Cache-Control", "post-check=0, pre-check=0");
    		requestc1.setRequestHeader("Pragma", "no-cache");
		var url= "usuario=";
		requestc1.onreadystatechange = confirmausuario;
		requestc1.send(url);



}

//funcao para confimar o usuario que est� cadastrando

function confirmausuario(){
	
	if(requestc1.readyState == 4){
		
		var s_resposta= requestc1.responseText;
				
				var formb = document.forms[1];
				var totalelementos  = formb.length;
				for (var i=0; i < totalelementos; i++) {
					if ( (	i+1) == totalelementos){
							formb[i].value = s_resposta;
							
					}
				
				
				}	
	}		
				
		 
}






//funcao para mostrar os dados quando utlizar o botao procurar

function exibirdados(idcont){

      		idcontrole = idcont;
		var campos1 = document.forms[1].elements[0].name.split("<>");
	 	var sqlcomp = "select * from " + document.forms[1].name + " where " + campos1[0] + " = <dadosreg>" + idcontrole + "<dadosreg>";
		var formb = document.forms[1];
		var totale  = formb.length;
		var campos="";
		for (var i=0; i < totale; i++) {
			var campos2 = formb[i].name.split("<>");
			if ( (i+1) == totale){
				
				campos = campos +  campos2[0] ;
			}
			else{
				campos = campos + campos2[0] + "<dadosreg>" ;
			}
		}
		requestc.open("POST", "exibirdados.php", true);	
		requestc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
    		requestc.setRequestHeader("Cache-Control", "no-store, no-cache, must-revalidate");
    		requestc.setRequestHeader("Cache-Control", "post-check=0, pre-check=0");
    		requestc.setRequestHeader("Pragma", "no-cache");
		var url= "sql="+sqlcomp + "&totalelementos=" + campos;
		requestc.onreadystatechange = exibirdados2;
		requestc.send(url);



}

//funcao para confimar a exibi��o dos dados

function exibirdados2(){
	if(requestc.readyState == 4){
		
		var s_resposta= requestc.responseText;
		s_resposta = s_resposta.split("<dadosreg>");
		var formb = document.forms[1];
		var totalelementos  = formb.length;
		for (var i=0; i < totalelementos; i++) {
			if ( (i+1) <= totalelementos){
				s_resposta[i] = datacerta(s_resposta[i]);
				formb[i].value = s_resposta[i];
				if (i==0){
					idcontrole = s_resposta[i];
						
				}
				
				
			}	
		}		
					
	}

procurar(2);
}








//funcao para fazer a busca

function buscacad(ncampo1, ncampo2, nbusca1, nbusca2){

      		dcampo1 = nbusca1;
		dcampo2 = nbusca2;
		numeroid = document.forms[1].elements[0].name.split("<>");
		//var sqlcomp1 = "select " + numeroid[0] + ", " + ncampo1 + ", " + ncampo2 + " from " + document.forms[1].name + " where (" + ncampo1 + " = <dadosreg>" + document.forms[2].elements[0].value + "<dadosreg>) or (" + ncampo2 + " like <dadosreg>%" + document.forms[2].elements[0].value + "%<dadosreg>)"; 
		//var sqlcomp1 = "select " + numeroid[0] + ", " + ncampo1 + ", " + ncampo2 + " from " + document.forms[1].name + " where (" + ncampo1 + " like <dadosreg>%" + document.forms[2].elements[0].value + "%<dadosreg> ) or " ( + ncampo2 + " like <dadosreg>%" + document.forms[2].elements[0].value + "%<dadosreg>)"; 		
		tabela = document.forms[1].name;
		sqlcomp1 = "tabela=" + tabela  + "&campo1=" + ncampo1 + "&campo2=" + ncampo2 + "&dvalor=" + document.forms[2].elements[0].value + "&idcontrole=" + numeroid[0] ;
		requestc.open("POST", "buscacad.php", true);
		requestc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
    		requestc.setRequestHeader("Cache-Control", "no-store, no-cache, must-revalidate");
    		requestc.setRequestHeader("Cache-Control", "post-check=0, pre-check=0");
    		requestc.setRequestHeader("Pragma", "no-cache");
		//var url= "sql="+sqlcomp1;
		
		var url= sqlcomp1;
		requestc.onreadystatechange = buscacadconfi;
		requestc.send(url);
		


}

//funcao para imprimir e confimar a busca

function buscacadconfi(){
	if(requestc.readyState == 4){
		
		var imprimirbusca="<table><tr><td>" +dcampo1 + "</td><td>" + dcampo2 + "</td></tr>";
		var campodados="";
		var s_resposta= requestc.responseText;
		var linhadados = s_resposta.split("<proxreg>");
		var totallinha = linhadados.length;
		var totallinha =  totallinha -1;
		for(var i=0; i<totallinha; i++){
						
			campodados = linhadados[i].split("<dadosreg>");
					
				
				imprimirbusca = imprimirbusca + "<tr><td><a href='#' onclick='exibirdados(" + campodados[0]+ ")'>" + campodados[1] + "</a></td><td><a href='#' onclick='exibirdados(" + campodados[0] + ")'>" + campodados[2] + "</a></td></tr>"
				
			
			
			
		}
		
		imprimirbusca = imprimirbusca + "</table>";
		document.getElementById('dprocurar').innerHTML = imprimirbusca;
		//resp = document.all.dprocurar;
		//resp.innerHTML = imprimirbusca;
		
		
							
	}


}






//funcao que monta a sql para fazer o cadastro de qualquer formulario
//para isso o name do formulario tem que ser o nome da tabela e o campo do formulario o nome dos campos da tabela 
function cadgenerico(){
	var sqlcompl = "INSERT INTO " + document.forms[1].name + "(";
	var formb = document.forms[1];
	var totalelementos  = formb.length;
	for (var i=0; i < totalelementos; i++) {
		campos2 = formb[i].name.split("<>");
		if ( (i+1) == totalelementos){
		
			sqlcompl = sqlcompl  + campos2[0] + ") values(";	
			
		}
		else{
		
		sqlcompl = sqlcompl +  campos2[0] + ", ";

		}
			
	}
	
	
	for (var i=0; i < totalelementos; i++) {
		
		var tipodata = formb[i].value.split("/");
		if (  ( (tipodata.length) == 3 ) && (tipodata[0].length >= 1   ) && (tipodata[0].length <= 2 )   ) {
			formb[i].value = tipodata[2] + "/" + tipodata[1] + "/" + tipodata[0]; 

		}
		
		if ( (i+1) == totalelementos){
		
			sqlcompl = sqlcompl + "<dadosreg>"  + formb[i].value + "<dadosreg> )";	
			
		}
		else{
			
			sqlcompl = sqlcompl + "<dadosreg>" +  formb[i].value + "<dadosreg>, ";
		

		}
			
	}

	
	return sqlcompl;


}



//funcao que monta a sql para edicao dos dados do formulario
//para isso o name do formulario tem que ser o nome da tabela e o campo do formulario o nome dos campos da tabela 

function sqleditar(){
	var sqlcompl = "update " + document.forms[1].name + " set ";
	var formb = document.forms[1];
	nomeid = document.forms[1].elements[0].name.split("<>")
	var totalelementos  = formb.length;
	for (var i=1; i < totalelementos; i++) {
		campos2 = formb[i].name.split("<>");
		var tipodata = formb[i].value.split("/");
		if (  ( (tipodata.length) == 3 ) && (tipodata[0].length >= 1   ) && (tipodata[0].length <= 2 )   ) {
			formb[i].value = tipodata[2] + "/" + tipodata[1] + "/" + tipodata[0]; 
			

		}
		
		if ( (i+1) == totalelementos){
		
			sqlcompl = sqlcompl + campos2[0] + " = <dadosreg>" + formb[i].value + "<dadosreg> where  " + nomeid[0] + " = <dadosreg>" + idcontrole + "<dadosreg>" ;	
			
		}
		else{
		
		sqlcompl = sqlcompl + campos2[0] + " = <dadosreg>" + formb[i].value + "<dadosreg>, ";

		}
			
	}
	
	
			
	return sqlcompl;


}







//funcao para excluir o cadastro
function excluircadastro(){
		request.open("POST", "confirmacadastro.php", true);
		request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
    		request.setRequestHeader("Cache-Control", "no-store, no-cache, must-revalidate");
    		request.setRequestHeader("Cache-Control", "post-check=0, pre-check=0");
    		request.setRequestHeader("Pragma", "no-cache");
		campos2 = document.forms[1].elements[0].name.split("<>");
		var url = "sql=delete from " + document.forms[1].name + " where " + campos2[0] + " = <dadosreg>" + idcontrole + "<dadosreg>";
		request.onreadystatechange = confirmaexcluir;
		request.send(url);
}


// funcao para confimar a dele��o do cadastro
function confirmaexcluir(){

  if(request.readyState == 4){
     	
		var s_resposta= request.responseText;
		if (s_resposta == 1 ) {
			
			alert("Dados Excluido com Sucesso!!!!");
			idcontrole = 0;
			novocadastro(1);
			
		}
		else{
			alert("Erro ao tentar Excluir , Procure o CPD para maiores informa��es!!!");

		}
			
	

   }


}


function VerInativo(campo){
		if((document.forms[1].elements[campo].value=="INATIVO") && (document.forms[1].elements[22].value<1)){
				document.forms[1].elements[22].value=document.forms[1].elements[1].value;
			}
			else if(document.forms[1].elements[campo].value=="ATIVO"){
				document.forms[1].elements[22].value=0;
			}
}
	




/* fun��o SetMensagem: para mudar a mensagem e a cor quando o campo do formulario estiver selecionado
Paramentros:

txt = mensagem que ser� exibida
campo = qual o numero do campo do formulario que esta ativo
formulario = qual o formulario que est� ativo 
sairfocus = parametro passado para informar que saiu do campo - nao obrigatorio
campover = qual o numero do campo do formulario que esta ativo- usado quando perde o focus n�o obrigatorio


*/



function SetMensagem(txt, campo, formulario, sairfocus, campover) {
	var formb = document.forms[1];
	document.getElementById('Tempmentxt').innerHTML = txt;
	if (campover > 0){
		ncampo13 = formb[campover].name.split("<>");
		if ((sairfocus=="sair") && (ncampo13[0]=='cnpj')){
			
			ValidarCNPJ(document.forms[1].elements[1].value,campover);

		}
		else if ((sairfocus=="sair") && (ncampo13[0]=='cpf')){
			ValidarCPF(document.forms[1].elements[campover].value,campover);
		}
		
	}
	if (campo<50) {
			ncampo12 = document.forms[1].elements[campo].name.split("<>");
			
			var verbranco = formb[campo].value;
			if(verbranco == "") {
				
			
				if (ncampo12[0]=="filial"){
					recuperarfilial(campo, formulario);
				
				}
				else if (ncampo12[0]=="datacadastro"){
					ncampo = campo;
					nformulario=formulario;
					recuperardata();
				}
			}
	}
	var totalelementos  = formb.length;
	for (var i=0; i < totalelementos; i++) {
		if (i == campo) {
			formb[i].style.background='#FFCC66';
			
			  			
		}else{
			formb[i].style.background='#FFFFFF';
		       }

	}

	
}



/*
Funcao dsmenu:
		Funcao para manipula��o do menu
		parametros:
			
		bopcao --> 		
		


*/	
function dsmenu(bopcao){
	document.getElementById('Temppro').style.display='none';
	document.getElementById('Tempcad').style.display='block';
	if (bopcao == "Novo"){
		recusuario();
		document.forms[0].elements[0].disabled=true;
		document.forms[0].elements[3].disabled=true;
		document.forms[0].elements[4].disabled=true;
		document.forms[0].elements[5].disabled=true;
		document.forms[0].elements[6].disabled=true;
		document.forms[0].elements[2].value="CANCELAR";
		novocadastro(1);
		habilitacampo();
		document.forms[1].elements[1].focus();
		dssalvar = true;
		idcontrole=0;
				
		
	}

	else if ( (bopcao == "Excluir") && (document.forms[0].elements[2].value == "EXCLUIR" )){
		
		if (document.forms[1].elements[0].name == "idoperador"){

			alert("Impossivel Excluir Operador");
		}
		else if (document.forms[1].elements[0].name == "idconferente"){

			alert("Impossivel Excluir Conferente");
		}		

		else if (document.forms[1].elements[0].value == "") {
			
			alert("Selecione um Registro para Excluir");
			
		}
		

		else{
			var desejaexcluir = confirm("Deseja Realmente Excluir o Cadastro?");
			if(desejaexcluir==true){
				excluircadastro();
			}
			
			

		}

	}

	else if ( (bopcao == "Excluir") && (document.forms[0].elements[2].value == "CANCELAR" )){
		
		if (idcontrole > 0){
	
			dssalvar=false;
			desabilitacampo();
			document.forms[0].elements[2].value="EXCLUIR";
			document.forms[0].elements[0].disabled=false;
			document.forms[0].elements[3].disabled=false;
			document.forms[0].elements[4].disabled=false;
			document.forms[0].elements[5].disabled=false;
			document.forms[0].elements[6].disabled=false;

		}
		else{
		document.forms[1].reset();
		desabilitacampo();
		document.forms[0].elements[0].disabled=false;
		document.forms[0].elements[3].disabled=false;
		document.forms[0].elements[4].disabled=false;
		document.forms[0].elements[5].disabled=false;
		document.forms[0].elements[6].disabled=false;
		document.forms[0].elements[2].value="EXCLUIR";
		dssalvar=false;
		}
		
		
		
	}

	else if (bopcao == "Editar"){
		
		if (document.forms[1].elements[0].value == "") {
			
			alert("Selecione um Registro para Editar");
			

		}
		else{
			
			document.forms[0].elements[0].disabled=true;
			document.forms[0].elements[3].disabled=true;
			document.forms[0].elements[4].disabled=true;
			document.forms[0].elements[5].disabled=true;
			document.forms[0].elements[6].disabled=true;
			document.forms[0].elements[2].value="CANCELAR";
			habilitacampo();
			document.forms[1].elements[1].focus();
			dssalvar = true;

			var formb = document.forms[1];
			var totalelementos  = formb.length;
			for (var i=0; i < totalelementos; i++) {
		
				var tipodata = formb[i].value.split("/");
				if (  ( (tipodata.length) == 3 ) && (tipodata[2].length >= 1   ) && (tipodata[2].length <= 2 )   ) {
					formb[i].value = tipodata[2] + "/" + tipodata[1] + "/" + tipodata[0]; 
				}

			

			}
		
			
			

		}

		

	}

	else if (bopcao == "Salvar"){
		var campobran = campobrancoform();
		
		if (campobran == 0){
		if ((dssalvar == true) && (idcontrole > 0) ){
			
			//chamar funcao salvar para edicao	
			

			
			editardados();	
			

		}

		else if (dssalvar == true){
			
			
			cadbanco();
			
		}
		else{

		alert("Impossivel Salvar Registro");
		}
			desabilitacampo();
			document.forms[0].elements[0].disabled=false;
			document.forms[0].elements[3].disabled=false;
			document.forms[0].elements[4].disabled=false;
			document.forms[0].elements[5].disabled=false;
			document.forms[0].elements[6].disabled=false;
			document.forms[0].elements[2].value="EXCLUIR";
			dssalvar=false;	

	

	}
	else{
			alert("Campo em Branco");
			document.forms[1].elements[campobran].focus();	
		
		
		}	
	}	

}

//funcao para habilitar todos os campos do cadastro

function habilitacampo(){


	var formb = document.forms[1];
	var totalelementos  = formb.length;
	for (var i=0; i < totalelementos; i++) {
		
			formb[i].disabled=false;
	}


}


//funcao para desabilitar todos os campos do cadastro

function desabilitacampo(){


	var formb = document.forms[1];
	var totalelementos  = formb.length;
	for (var i=0; i < totalelementos; i++) {
		
			formb[i].disabled=true;
	}






}

//funcao para montagem dos campos e envio para o proximo registro

function avanca_emp(){
	document.getElementById('Temppro').style.display='none';
	document.getElementById('Tempcad').style.display='block';
	var sqlcomp =  document.forms[1].name +  "<dadosreg>" + idcontrole + "<dadosreg>";
	var formb = document.forms[1];
	var totalelementos  = formb.length;
	
	for (var i=0; i < totalelementos; i++) {
		campos2 =  formb[i].name.split("<>");
		if ( (i) != totalelementos){
			if ( (i+1) == totalelementos){
			sqlcomp = sqlcomp + campos2[0];
			}
			else{

				sqlcomp = sqlcomp + campos2[0] + "<dadosreg>";
		}
			}
		
	}


requestc.open("POST", "avancar_emp.php", true);
requestc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
requestc.setRequestHeader("Cache-Control", "no-store, no-cache, must-revalidate");
requestc.setRequestHeader("Cache-Control", "post-check=0, pre-check=0");
requestc.setRequestHeader("Pragma", "no-cache");
var url= "sql="+sqlcomp;
requestc.onreadystatechange = avanca_emp2;
requestc.send(url);

   

}

//funcao para recuperar os dados do avancar

function avanca_emp2(){
	if(requestc.readyState == 4){
		
		var s_resposta= requestc.responseText;
		
		if (s_resposta==1){
			alert("Registro n�o encontrado!!!!")
		}
		else if (s_resposta == 2 ) {
			
			alert("Ultimo Registro!!!!");
						
		}
		else{
			
			var s_resposta = s_resposta.split("<dadosreg>");
			
			var formb = document.forms[1];
			var totalelementos  = formb.length;
			
			for (var i=0; i < totalelementos; i++) {
				
				if ( (i+1) <= totalelementos){
					
					s_resposta[i] = datacerta(s_resposta[i]);
					formb[i].value = s_resposta[i];
					if (i==0){
						idcontrole = s_resposta[i];
					}
				
				
				}			

			}

			

		}
			
	}


}

//funcao para montagem dos campos e envio para voltar registro

function volta_emp(){
	document.getElementById('Temppro').style.display='none';
	document.getElementById('Tempcad').style.display='block';
	var sqlcomp =  document.forms[1].name +  "<dadosreg>" + idcontrole + "<dadosreg>";
	var formb = document.forms[1];
	var totalelementos  = formb.length;
	
	for (var i=0; i < totalelementos; i++) {
			campos2 =  formb[i].name.split("<>");
			if ( (i) == totalelementos){
			sqlcomp = sqlcomp + campos2[0];
			}
			else{

				sqlcomp = sqlcomp + campos2[0] + "<dadosreg>";
		
			}
		
	}


requestc.open("POST", "volta_emp.php", true);
requestc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
requestc.setRequestHeader("Cache-Control", "no-store, no-cache, must-revalidate");
requestc.setRequestHeader("Cache-Control", "post-check=0, pre-check=0");
requestc.setRequestHeader("Pragma", "no-cache");
var url= "sql="+sqlcomp;
requestc.onreadystatechange = volta_emp2;
requestc.send(url);

   

}


//funcao para recuperar os dados do voltar

function volta_emp2(){
	
	if(requestc.readyState == 4){
		
		var s_resposta= requestc.responseText;
		
		if (s_resposta==1){
			alert("Registro n�o encontrado!!!!")
		}
		else if (s_resposta == 2 ) {
			
			alert("Primeiro Registro!!!!");
						
		}
		else{
			
			var s_resposta = s_resposta.split("<dadosreg>");
			var formb = document.forms[1];
			var totalelementos  = formb.length;
			for (var i=0; i < totalelementos; i++) {
				
				if ( (i+1) <= totalelementos){
					s_resposta[i] = datacerta(s_resposta[i]);
					formb[i].value = s_resposta[i];
					if (i==0){
						idcontrole = s_resposta[i];
						
					}
				
				
				}			

			}

			

		}
			
	}


}





