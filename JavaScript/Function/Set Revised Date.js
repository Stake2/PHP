var d = new Date();
var x = d.getDate();
var m = d.getMonth();
var y = d.getFullYear();

var metas = document.getElementsByTagName("meta");
var date2 = "Stake's Enterprisetm, " + x + "/" + m + "/" + y;

for (var i=0; i<metas.length; i++) {  
	if (metas[i].getAttribute("name") && metas[i].getAttribute("name")==="revised") {
		metas[i].setAttribute("content", date2);
	}
}

console.log("Set Revised Date Script was loaded.");