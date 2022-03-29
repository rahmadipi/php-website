function jam() { 
	var jam = new Date();
	var j=jam.getHours()+"";
	var m=jam.getMinutes()+"";
	var s=jam.getSeconds()+"";
	document.getElementById("jam").innerHTML = ".:: "+(j.length==1?"0"+j:j)+":"+(m.length==1?"0"+m:m)+":"+(s.length==1?"0"+s:s)+" ::."; 
}
setInterval("jam()",1000);
function tanggal(){
	var tang = new Date();
	var bul= tang.getMonth();
	if(bul==0)var lan="Jan";
	else if(bul==1)var lan="Feb";
	else if(bul==2)var lan="Mar";
	else if(bul==3)var lan="Apr";
	else if(bul==4)var lan="Mei";
	else if(bul==5)var lan="Jun";
	else if(bul==6)var lan="Jul";
	else if(bul==7)var lan="Agu";
	else if(bul==8)var lan="Sep";
	else if(bul==9)var lan="Okt";
	else if(bul==10)var lan="Nov";
	else var lan="Des";
	var d = tang.getDate();
	document.getElementById("tanggal").innerHTML = "<center><table border=5 bgcolor=white cellspacing=0><tr><td rowspan=2><font size=10>"+d+"</font></td><td><font size=5>"+lan+"</font></td></tr><tr><td>"+tang.getFullYear()+"</td></tr></table></center>";
}
setInterval("tanggal()",60000);
function fixed(){
	if(pageYOffset>=300){
		document.getElementById("menubar-clone").style.display="block";
		document.getElementById("menubar").style.top="0";
		document.getElementById("menubar").style.left="0";
		document.getElementById("menubar").style.position="fixed";
	}
	else{
		document.getElementById("menubar-clone").style.display="none";
		document.getElementById("menubar").style.position="relative";
	}
}
setInterval("fixed()",50);