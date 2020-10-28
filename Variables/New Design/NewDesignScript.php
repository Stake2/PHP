<?php 

$newdesignscript = '<script src="https://www.superanimes.org/js/config.min.js?v=11.1"></script>
<script>
	eval(function(p,a,c,k,e,d){e=function(c){return c};if(!"".replace(/^/,String)){while(c--){d[c]=k[c]||c}k=[function(e){return d[e]}];e=function(){return"\\w+"};c=1};while(c--){if(k[c]){p=p.replace(new RegExp("\\b"+e(c)+"\\b","g"),k[c])}}return p}("1.0=1.0||{};1.0.3="2";",4,4,"lazySizesConfig|window|lazy|lazyClass".split("|"),0,{}))
</script>
<script src="https://www.superanimes.org/js/lazyLoad.min.js"></script>
<script>
	eval(function(p,a,c,k,e,d){e=function(c){return(c<a?"":e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!"".replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return"\\w+"};c=1};while(c--){if(k[c]){p=p.replace(new RegExp("\\b"+e(c)+"\\b","g"),k[c])}}return p}("y="1v://R.S.T";x="U/V/W=";$.Q({c:{X:x},});$(".Z").4(2(){$(".m-7").q(f);$("d").10("g");$("#11").12()});$(".O").4(2(){$(".m-7").6(f);$("d").k("g")});$(".l-7-14").4(2(){$(".l-7").6(f);$("d").k("g")});$(u).Y(2(e){p(e.P===N){$(".m-7, .l-7").6(f);$("d").k("g")}});8 h=F;$(".15").13(2(){8 3=$(9).3();8 17=3.1l(" ",F);p(3.1u>=h){$(9).3(3.C(0,h)+"<a r=\"i-v\"> ... 1t 16 </a><w r=\"i-t\">"+3.C(h)+"</w>")}}).A("4",".i-v",2(){$(9).6().1r(".i-t").q()});$(".1q").4(2(){$(".n").6()});$(".1p").4(2(){$(".n").q()});$(".1o").4(2(){8 o=$("1n[1m=\"b\"]:1k").18();8 5=$(9).D("c-b-5");$.1j({1i:"1h",1g:y+"/z/b.z.1f",c:{o:o,5:5},1e:"1d",1c:2(j){p(j.1a===1){$(".G").3(j.B)}19{$(".G").1s("<s r=\"E E-1b\">"+j.B+"</s>")}}})});$(u).A("4",".K",2(){8 5=$(9).D("c-b-5");J("I",5,H*L*M);$(".n").6()});",62,94,"||function|html|click|id|hide|box|var|this||enquete|data|body||100|noScroll|leiamais_limit|leiamais|result|removeClass|full|search|enqueteBox|valor|if|show|class|div|tail|document|btn|span|TOKEN_CSRF|BASE|inc|on|mensagem|substring|attr|alert|250|enqueteContent|30|poll|createCookie|js_fechar_votar|24|60|27|closeSearch|keyCode|ajaxSetup|www|superanimes|org|TIx6iX3ppJHoA14biLyNGN3MKIqDI7rH4lH|9x|dlgM|token|keyup|actionSearch|addClass|buscador|focus|each|close|alertCorpo|Mais|cut|val|else|codigo|danger|success|json|dataType|php|main_website_url|post|type|ajax|checked|indexOf|name|input|js_votar|votar_enquete_show|js_enquete_close|siblings|prepend|Leia|length|https".split("|"),0,{}))
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?"":e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!"".replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return"\\w+"};c=1};while(c--){if(k[c]){p=p.replace(new RegExp("\\b"+e(c)+"\\b","g"),k[c])}}return p}("E 1;s 0=r.q(".8-p");0.6.5="b";n.7("m",(e)=>{1=e;0.6.5="k";0.7("j",(e)=>{4("h g f d c o 8 t l v","F",2);1.u();1.L.K((a)=>{J(a.I==="H"){4("9 G w D!","C",3);0.6.5="b"}B{4("A z 9 y!","x",3)}1=i})})});",48,48,"addBtn|deferredPrompt|||alert_view|display|style|addEventListener|atalho|Atalho|choiceResult|none|Criar|para||instalar|em|Clique|null|click|block|ou|beforeinstallprompt|window||button|querySelector|document|const|App|prompt|Desktop|com|danger|cancelado|de|Pedido|else|success|Sucesso|var|warning|Criado|accepted|outcome|if|then|userChoice".split("|"),0,{}))

	function checkSizeGridBoxItem() {
		var grid_size = $(".orientation_vertical").outerHeight(true).toFixed(2);
		$(".grid_image").css({
			"height": grid_size + "px",
			"padding-bottom": "0"
		});
	}
	if ($(".orientation_vertical").length) {
		$(document).ready(function() {
			checkSizeGridBoxItem();
		});

		$(window).resize(function() {
			checkSizeGridBoxItem();
		});
	}
</script>
<script src="https://www.superanimes.org/js/configBase.min.js?v=11.1"></script>
<script src="https://www.superanimes.org/js/configUser.min.js?v=11.1"></script>
<script src="https://www.superanimes.org/js/main.js?v=11.1"></script>
<script src="https://www.superanimes.org/js/jquery.min.js?v=1.0"></script>';

$newdesigncss = '
<style>
* {
    margin: 0;
    padding: 0;
    outline: none;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    word-wrap: break-word;
}
.linkColor {
    color: #454545;
}

.colorHighlight {
    color: #76608a;
}

body {
    line-height: 200%;
    font-family: "Roboto", Arial, Helvetica, sans-serif;
    width: 100%;
    height: 100%;
    background: #1b1b1b main_website_url(https://www.superanimes.org/img/preto/bg.png);
    margin: 0;
    padding: 0;
    outline: none;
    font-size: 0.85em;
    scrollbar-color: #2b2b2b #555;
    scrollbar-width: 12px;
}

::-webkit-scrollbar {
    width: 13px;
    height: 10px;
}
::-webkit-scrollbar-track:enabled {
    background-color: #555;
}
::-webkit-scrollbar-thumb:vertical {
    background-color: #2b2b2b;
}
::-webkit-scrollbar-thumb:horizontal {
    background-color: #2b2b2b;
}
::-webkit-scrollbar-thumb:vertical:hover,
::-webkit-scrollbar-thumb:horizontal:hover {
    background-color: #353535;
}

main {
    display: block;
}

select {
    outline: 0;
}

a {
    text-decoration: none;
    color: #b88e50!important;
}

h1,
h2,
h3,
h4,
h5,
h6,
a {
    font-weight: normal !important;
}

.conteudoBox ul {
    list-style: none;
    margin: 10px 0;
}

.conteudoBox li {
    margin-left: 25px;
    list-style: disc;
    color: #777;
}

.box_content {
    width: 100%;
    height: 100%;
    float: left;
    margin: 10px 0px;
    padding: 10px;
    background: #252525;
    color: #999;
    line-height: 18px;
}

#boxLogo {
    position: absolute;
    float: left;
}

@media screen and (max-width: 359px) {
    #boxLogo {
        position: absolute;
        max-width: 26px;
        float: left;
        overflow: hidden;
    }
}

#boxLogo img {
    position: relative;
    float: left;
    margin-top: 10px;
    margin-right: 5px;
    height: 31px;
}

@media screen and (min-width: 360px) and (max-width: 400px) {
    #boxLogo img {
        position: relative;
        float: left;
        margin-top: 10px;
        height: 26px;
    }
}

@media screen and (max-width: 359px) {
    #boxLogo img {
        height: 29px;
    }
}

#menuH {
    position: fixed;
    top: 0;
    height: 48px;
    width: 100%;
    float: left;
    background: #232323;
    font-size: 1em;
    z-index: 9999;
    border-bottom: 1px solid #333;
    color: #fff;
    margin-bottom: 68px;
    transition-delay: 0s;
}

#menuH.active {
    opacity: 0.25;
    transition-delay: 0.75s;
}

#menuH.active:hover {
    opacity: 1;
    transition-delay: 0s;
}

.actionSearch,
.closeSearch,
.menu_btns {
    position: relative;
    width: 48px;
    height: 48px;
    padding: 14px;
    float: right;
    border-left: 0;
    border-top: 0;
    cursor: pointer;
}

@media screen and (max-width: 459px) {
    .actionSearch,
    .closeSearch,
    .menu_btns {
        width: 40px;
        padding: 14px 10px;
    }
}

.actionSearch img,
.closeSearch img,
.menu_btns img {
    width: 18px;
    height: 18px;
    float: right;
    margin-top: 0px;
    margin-right: 0px;
}

.actionSearch:hover,
.closeSearch:hover,
.menu_btns:hover {
    background: #333;
}

.actionSearch:hover img,
.closeSearch:hover img,
.menu_btns:hover img {
    margin: 2px;
    width: 16px;
    height: 16px;
}

.menu_btns:hover i {
    margin: 2px;
    width: 16px;
    height: 16px;
}

.actionSearch.active,
.closeSearch.active,
.menu_btns.active {
    background: #454545;
}

.actionMenuUser,
.actionMenu {
    float: right;
}

.actionMenuUser.active,
.actionMenu.active {
    background: #333;
}

.menu_btn_user {
    width: 32px !important;
    height: 32px !important;
    border-radius: 50%;
    padding: 0 !important;
    margin-top: -7px !important;
    margin-right: -7px !important;
}

#menuHbox {
    width: 96%;
    z-index: 9999;
    margin: 0 1%;
}

@media screen and (min-width: 1280px) {
    #menuHbox {
        width: 94%;
        margin: 0 3%;
    }
}

@media screen and (min-width: 1920px) {
    #menuHbox {
        width: 1820px;
        margin: 0 auto;
    }
}

.menu {
    display: none;
    position: fixed;
    width: calc(1% + (48px + 192px));
    height: 100%;
    top: 48px;
    right: 0;
    background: rgba(27, 27, 27, 0.95);
    overflow: auto;
    border-left: 1px solid #333;
}

@media screen and (min-width: 1280px) {
    .menu {
        width: calc(3% + (48px + 192px));
    }
}

@media screen and (min-width: 1920px) {
    .menu {
        width: calc(((100% + (1920px)) - (3260px)) / 2);
        margin: 0 auto;
    }
}

@media screen and (max-width: 520px) {
    .menu {
        width: 100%;
    }
}

.menu ul,
.menu li {
    list-style: none;
    width: 100%;
}

.menu li {
    width: 100%;
    height: 48px;
    line-height: 48px;
    float: left;
    color: #fff;
    display: block;
    padding: 0px 10px;
    border-bottom: 1px solid #333;
    background: #2b2b2b;
    cursor: pointer;
}

.menu li:hover {
    background: #454545;
}

.menu i {
    width: 100%;
    height: 48px;
    line-height: 48px;
    float: left;
    color: #fff;
    display: block;
    padding: 0px 10px;
    background: #2b2b2b;
}

.menu li a {
    text-decoration: none;
    color: #fff;
    display: block;
}

.menu li img {
    width: 16px;
    float: left;
    margin-top: 16px;
    margin-right: 10px;
}

.menu li i {
    width: 16px;
    float: left;
    margin-top: 16px;
    margin-right: 10px;
}

.menu li a i {
    width: 16px;
    float: left;
    margin-top: 16px;
    margin-right: 10px;
}

.js_boxCliente {
    display: none;
    position: fixed;
    width: calc(1% + (48px + 192px));
    height: 100%;
    top: 48px;
    right: 0;
    background: rgba(27, 27, 27, 0.95);
    overflow: auto;
    border-left: 1px solid #333;
}

@media screen and (min-width: 1280px) {
    .js_boxCliente {
        width: calc(3% + (48px + 192px));
    }
}
@media screen and (min-width: 1920px) {
    .js_boxCliente {
        width: calc(((100% + (1920px)) - (3260px)) / 2);
        margin: 0 auto;
    }
}
@media screen and (max-width: 520px) {
    .js_boxCliente {
        width: 100%;
    }
}

.js_boxCliente ul,
.js_boxCliente li {
    list-style: none;
    width: 100%;
}

.js_boxCliente li {
    width: 100%;
    height: 48px;
    line-height: 48px;
    float: left;
    background: #2b2b2b;
    color: #fff;
    display: block;
    padding: 0px 10px;
    border-bottom: 1px solid #333;
    cursor: pointer;
}

.js_boxCliente li:hover {
    background: #454545;
}

.js_boxCliente li a {
    text-decoration: none;
    color: #fff;
    display: block;
}

.js_boxCliente li img {
    width: 16px;
    float: left;
    margin-top: 16px;
    margin-right: 10px;
}

.js_boxCliente li i {
    width: 16px;
    float: left;
    margin-top: 16px;
    margin-right: 10px;
}

.js_boxCliente .active {
    background: #454545;
}

.js_boxCliente .hide {
    display: none;
}

#corpo {
    width: calc(100% - 310px - 20px);
    float: left;
    height: 100%;
}

@media screen and (max-width: 1023px) {
    #corpo {
        width: 100%;
    }
}

.conteudoBox {
    width: 100%;
    float: left;
    background: #1b1b1b;
    color: #ccc;
    margin-bottom: 20px !important;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

.conteudoBox2 {
    width: 100%;
    float: left;
    border: 1px solid #2b2b2b;
    border-top: 1px solid #333;
    border-bottom: 4px solid #2b2b2b;
    background: #1b1b1b;
    color: #ccc;
    margin-bottom: 20px;
}

.conteudoBox2 p {
    font-size: 0.9em;
}

.boxConteudo {
    width: 100%;
    padding: 10px;
    float: left;
}

.linha {
    width: 100%;
    float: left;
    margin-bottom: 10px;
}

#rodape {
    margin-top: 20px;
    width: 100%;
    height: auto;
    float: left;
    border-top: 1px solid #333;
    background: #1b1b1b;
}

.logoRodape {
    width: 100%;
    height: 24px;
    line-height: 24px;
    float: left;
    text-align: center;
    border-top: 1px solid #333;
    background: #232323;
}

.logoRodape small {
    width: 100%;
    float: left;
    color: #999;
}

#rodapeConteudo {
    width: 98%;
    margin: 0px auto;
    padding-top: 20px;
    padding-bottom: 30px;
}

@media screen and (min-width: 1280px) {
    #rodapeConteudo {
        width: 94%;
    }
}

@media screen and (min-width: 1920px) {
    #rodapeConteudo {
        width: 1820px;
    }
}

#rodapeConteudo li {
    float: left;
    list-style-type: none;
    margin-bottom: 10px;
    margin-right: 10px;
    background: #232323;
    height: 46px;
    padding: 15px 20px;
    display: block;
}

#rodapeConteudo li img {
    width: 16px;
    float: left;
    margin-right: 10px;
}
#rodapeConteudo li a {
    display: block;
}

@media only screen and (max-width: 480px) {
    #rodapeConteudo li {
        width: 100%;
    }
}

#rodape a {
    color: #76608a;
    text-decoration: none;
}

#rodapeConteudo strong {
    color: #f69;
    margin-bottom: 20px;
    font-weight: 400;
    font-size: 1em;
}

#rodapeBox {
    width: 98%;
    margin-left: 1%;
    color: #888;
    height: 29px;
    clear: both;
    line-height: 29px;
    font-size: 0.875em;
}

.dezPx {
    width: 100%;
    height: 10px;
    clear: both;
}

.conteudoBox li {
    list-style: none;
    margin: 0px;
}

.alertOk {
    height: 25px;
    line-height: 25px;
    color: #360;
    background: #6c6;
    text-align: center;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
}
.alertErro {
    height: 25px;
    line-height: 25px;
    color: #c03;
    background: #ff9191;
    text-align: center;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
}

.alertSearch {
    color: #999;
    font-size: 1em;
    font-weight: normal;
    margin-bottom: 10px;
    float: left;
}

.alertSearch b {
    color: #f2f2f2;
}

.exibirMais {
    width: 53px;
    height: 53px;
    position: absolute;
    background: main_website_url(https://www.superanimes.org/img/exibir-mais.gif);
    right: 0;
    margin-top: 997px;
    position: absolute;
    z-index: 10;
    border-top-left-radius: 85px;
    border-bottom-right-radius: 5px;
    cursor: pointer;
}

.exibirMais:hover {
    background: #39f main_website_url(https://www.superanimes.org/img/exibir-mais.gif);
}

h1,
h2 {
    font-weight: 700;
    font-size: 2em;
	line-height: 34px;
    margin: 0;
}

#rodape a:hover {
    text-decoration: underline;
}

.boxBarraInfo a:visited,
.top10Link a:visited {
    color: #999;
}

.alertOk:hover,
.alertErro:hover {
    cursor: pointer;
}

.conteudoBoxHome {
    border: 1px solid #2b2b2b;
    border-top: 1px solid #333;
    border-bottom: 4px solid #2b2b2b;
    min-height: 100%;
    margin-bottom: 20px;
    background: #1b1b1b;
    float: left;
    width: 100%;

.conteudoBoxHome h1 {
    font-size: 1.2em;
    color: #555;
    margin: 10px;
    font-family: Consolas, "Andale Mono", "Lucida Console", "Lucida Sans Typewriter", Monaco, "Courier New", monospace;
}

#liberado {
    background: #74b10f;
}

#liberando {
    background: #454545;
}

#online {
    background: #0099ff;
}

.chatSa {
    height: calc(100% - 48px);
    width: calc(2% + 310px);
    z-index: 9998;
    position: fixed;
    float: right;
    bottom: 0px;
    right: 0px;
    background: #2b2b2b;
    border: 1px solid #333;
    border-bottom: 0px;
    opacity: 1;
}
@media screen and (max-width: 2256px) {
    .chatSa {
        width: calc(2% + 310px);
    }
}
@media screen and (max-width: 1600px) {
    .chatSa {
        width: calc(2%+310px);
    }
}
@media screen and (max-width: 1023px) {
    .chatSa {
        width: 100%;
        height: 100%;
        z-index: 99999;
    }
}

.chatSa:hover {
    opacity: 1;
}

.chatSa iframe {
    width: 100%;
    height: 100%;
    float: left;
}
.chatSa span {
    margin-left: 10px;
    font-family: Constantia, "Lucida Bright", "DejaVu Serif", Georgia, serif;
    font-style: italic;
}
.chatSaImg {
    position: absolute;
    width: 32px;
    height: 32px;
    top: 58px;
    left: 10px;
    float: left;
    border-radius: 3px;
    background: rgba(208, 60, 46, 0.4);
    cursor: pointer;
    z-index: 998;
}
.chatSaImg img {
    margin: 4px;
    width: 24px !important;
    float: left;
}
.chatSaImg:hover {
    background: rgba(208, 60, 46, 0.7);
}
.chatSaBox {
    width: 100%;
    height: 100%;
    float: left;
    background: #fff;
    bottom: 0;
    clear: both;
}

* {
    outline: none;
}

.close {
    cursor: pointer;
}

.boxAlerta {
    width: 100%;
    min-height: 32px;
    float: left;
    margin: 10px 0px;
    padding: 5px 10px;
    background: #232323;
    border: 1px solid #333;
    color: #999;
}

.btnDisable {
    background: #333 !important;
}

.alert {
    min-width: 100%;
    float: left;
    padding: 15px 10px;
    font-size: 0.875em;
    margin-bottom: 10px;
}

.alert-default {
    background-color: #eaeaea;
    border: 1px solid #e5e5e5;
    color: #555;
}

.alert-default:hover {
    background-color: #e6e6e6;
}

.alert-danger {
    background: #f2dede;
    color: #a94442;
    border: 1px solid #ebccd1;
}

.alert-info {
    background: #d9edf7;
    color: #31708f;
    border: 1px solid #bce8f1;
}

.alert-reverse {
    background-color: #262626;
    border: 1px solid #303030;
    color: #f6f9ff;
}

.alert-reverse:hover {
    background-color: #222222;
}

.alert-success {
    background: #dff0d8;
    color: #3c763d;
    border: 1px solid #d6e9c6;
}

.alert-warning {
    background: #fcf8e3;
    color: #8a6d3b;
    border: 1px solid #faebcc;
}

.commentAlertBox {
    position: absolute;
    top: 0px;
    right: 0px;
    padding: 0;
    padding: 1px 3px;
    background: rgba(69, 69, 69, 0.8);
    font-size: 12px;
    line-height: 12px;
}

.commentCountLine {
    width: 100%;
    float: left;
    padding: 10px;
    border-bottom: 1px solid #333;
}

.comment_view_reaply {
    width: 100%;
    float: left;
    margin: 20px 0px;
    padding: 10px;
    background: #333;
}
.js_box_load {
    float: left;
    margin-left: 10px;
    margin-top: 10px;
}
.js_box_load .load {
    float: left;
    margin-left: 10px;
    margin-bottom: 10px;
}
.commentMain .load {
    float: left;
    margin-left: 10px;
    margin-bottom: 10px;
}
.commentMain .js_comment_view {
    width: auto;
    height: 32px;
    float: left;
    margin-left: 10px;
    margin-bottom: 10px;
    padding: 0px 10px;
    text-align: center;
    line-height: 32px;
    color: #fff;
    background: #2b2b2b;
    border: 1px solid #333;
    cursor: pointer;
}
.commentMain .js_comment_view img {
    float: left;
    margin-top: 5px;
    margin-right: 5px;
}
.commentMain .js_comment_view:hover {
    background: #454545;
}
.commentMain .commentViewType {
    width: auto;
    float: right;
}
.commentMain .commentViewType select {
    width: 125px;
    padding: 5px 10px;
    display: block;
    background: main_website_url(https://www.superanimes.org/img/arrow_drop_down_white.png) no-repeat;
    background-size: 24px;
    background-position: right;
    background-color: #2b2b2b;
    cursor: pointer;
    border: 0;
    border-bottom: 1px solid #76608a;
    color: #fff;
    height: 32px;
    -webkit-appearance: none;
    -moz-appearance: none;
    -o-appearance: none;
    appearance: none;
}
.commentMain .commentViewType select select::-ms-expand {
    display: none;
}
.commentMedals {
    width: 100%;
}
.commentBox {
    width: 100%;
    float: left;
    padding: 10px;
    background: #212121;
    border: 1px solid #2b2b2b;
    border-top: 1px dashed #333;
    border-bottom: 1px 1 #333;
}
.commentBox .conquista_comentarios {
    width: 100%;
    background: #313131;
    padding: 3px 10px;
    border-bottom: 1px solid #333;
    border-top: 1px solid #333;
    float: left;
    font-size: 13px;
    color: #999;
}
.commentBox .conquista_comentarios span {
    float: left;
    margin-right: 10px;
}
.commentBox .commentMedals {
    position: relative;
    float: left;
}
.commentBox .commentMedals img {
    height: 20px;
    margin: 0px;
}
.commentBox:nth-of-type(2n) {
    background: #212121;
}
.commentBox .mod {
    color: #fff;
    margin: 3px 0px;
    text-align: center;
    font-size: 12px !important;
}
.commentBox.reply {
    border: 0;
    border-top: 1px dashed #454545;
    float: right;
    padding: 0;
    margin-top: 10px;
    padding-top: 10px;
    background: none;
}
.commentBox .commentAvatar {
    width: 48px;
    height: 48px;
    float: left;
    padding: 1px;
    background: #fff;
    border-radius: 2px;
    position: relative;
}
.commentBox .commentAvatar img {
    width: 46px;
    height: 46px;
    border-radius: 2px;
}
.commentBox .commentAvatar a {
    float: left;
}
.commentBox .commentPost {
    width: 100%;
    margin-left: -58px;
    padding-left: 58px;
    float: right;
}
.commentBox .commentPost h4 {
    width: 100%;
    margin-bottom: 5px;
    color: #fff;
}
.commentBox .commentPost h4 a {
    font-size: 1em;
    text-decoration: none;
    color: #fff;
}
.commentBox .commentPost h4 a:hover {
    text-decoration: underline;
    color: #f2f2f2;
}
.commentBox .commentPost .replyUser {
    width: calc(100% + 58px);
    margin: 0;
    margin-left: -58px;
    color: #999;
    font-size: 0.75em;
    font-weight: normal;
}
.commentBox .commentPost .replyUser b {
    font-weight: 400;
    color: #f0f0f0;
}
.commentBox .commentPost textarea {
    width: calc(100% + 58px);
    margin: 0;
    margin-left: -58px;
    margin-top: 5px;
    min-height: 48px;
    padding: 5px 10px;
    background: #262626;
    border: 1px solid #333;
    color: #999;
    outline: none;
    font-size: 1em;
    resize: vertical;
}
.commentBox .commentPost .commentPostBtn {
    width: auto;
    height: 32px;
    line-height: 32px;
    float: right;
    margin-top: 10px;
    padding: 0px 10px;
    color: #fff;
    border: 0;
    background: #2b2b2b;
    border-bottom: 1px solid #76608a;
    cursor: pointer;
}
.commentBox .commentPost .commentPostBtn:hover {
    background: #454545;
}
.commentBox .commentPost .commentPostBtn.commentCancel,
.commentBox .commentPost .commentPostBtn.replyCancel {
    background: #2b2b2b;
    border-bottom: 1px solid #76608a;
    margin-right: 10px;
}
.commentBox .commentPost .commentPostBtn.commentCancel:hover,
.commentBox .commentPost .commentPostBtn.replyCancel:hover {
    background: #454545;
}
.commentBox .commentPost .comment_txt,
.commentBox .commentPost p {
    width: 100%;
    height: 100%;
    margin: 0;
    margin-top: 5px;
    margin-bottom: 5px;
    padding: 5px 10px;
    padding-top: 35px;
    background: #2b2b2b;
    word-wrap: break-word;
    color: #999;
    font-size: 1em;
    line-height: 17px !important;
}
.commentBox .commentPost .comment_box_text {
    float: left;
    width: calc(100% + 58px);
    margin: 0;
    margin-left: -58px;
    height: 100%;
    margin-top: 5px;
    margin-bottom: 5px;
    padding: 5px 10px;
    background: #2b2b2b;
    word-wrap: break-word;
    color: #999;
    font-size: 1em;
    line-height: 17px !important;
}
.commentBox .commentPost .comment_box_text img,
.commentBox .commentPost .comment_box_text iframe,
.commentBox .commentPost .comment_box_text audio {
    display: block !important;
    max-width: 100%;
    max-height: 100%;
    border-radius: 3px;
    margin: 8px 0px;
}
.commentBox .commentPost small {
    cursor: pointer;
    color: #888;
    margin-left: 10px;
    font-weight: normal;
}
.commentBox .commentPost .comment_action {
    float: left;
    margin-right: 10px;
    cursor: pointer;
    color: #999;
    height: 24px;
    line-height: 24px;
    margin-left: 5px;
}
.commentBox .commentPost .comment_action img {
    height: 13px;
    margin-top: 2px;
    margin-right: 5px;
}
.commentBox .commentPost .comment_date {
    float: right;
    margin-left: 10px;
    cursor: pointer;
    color: #999;
    margin-left: 10px;
    font-size: 0.75em;
}
.commentBox .commentPost .comment_like {
    float: left;
    margin-left: 0 !important;
    padding: 10px important;
}
.commentBox .commentPost .comment_like.active {
    border-bottom: 1px solid #76608a;
}
.commentBox .commentPost .comment_abuse {
    float: right;
    margin-right: 0;
}
.commentBox .btn_more_reply {
    width: 100%;
    height: auto;
    float: right;
    padding: 10px;
    clear: both;
    line-height: 12px;
    color: #fff;
    background: #353535;
    text-align: center;
    cursor: pointer;
}
.comment_action_box {
    width: calc(100% + 58px);
    margin-left: -58px;
    float: left;
}
.comment_more_action {
    width: 100%;
    display: none;
    position: relative;
    float: right;
    clear: both;
    z-index: 999;
}
.comment_more_action .comment_more_action_itens {
    width: 260px;
    position: absolute;
    float: right;
    right: 0;
    top: 0;
    clear: both;
    background: #2b2b2b;
    border: 1px solid #333;
}
.comment_more_action .comment_action {
    width: 100%;
    float: left;
    height: 32px !important;
    line-height: 32px !important;
    padding-left: 10px;
    background: #292929;
    border-bottom: 1px solid #353535;
    border-left: 1px solid #76608a;
    cursor: pointer;
}
.comment_more_action .comment_action:hover {
    background: #333;
}
.comment_more_action .comment_action:last-of-type {
    border-bottom: 0;

}
.friend_list .friend_box .friend_box_list_iten a {
    text-decoration: none;
    color: #fff;
    display: block;
    line-height: 20px;
}
.friend_list .friend_box .friend_box_list_iten img {
    float: left;
    margin-right: 5px;
    height: 18px;
    width: auto;
}
.friend_sms_box {
    width: 100%;
    height: 100%;
    float: left;
    padding: 10px;
}
.friend_sms_box img {
    width: 48px;
    height: 48px;
    float: left;
}
.friend_sms_box .friend_sms_text {
    width: calc(100% - 58px);
    min-height: 48px;
    height: 96px;
    float: right;
    overflow: auto;
    padding: 10px;
    background: #232323;
    color: #999;
    border: 1px solid #333;
    resize: vertical;
}
.friend_sms_box .perfil_sms_btn {
    width: auto;
    height: 32px;
    line-height: 32px;
    text-align: center;
    color: #fff;
    margin-top: 10px;
    padding: 0px 15px;
    float: right;
    background: #454545;
    clear: both;
    border: 0;
}
.js_friend_sms_result {
    width: 100%;
    float: left;
    padding: 10px;
    margin-top: 70px;
}
.js_friend_sms_result .js_friend_sms_result_box {
    width: 100%;
    margin: 10px 0px;
    float: left;
}
.js_friend_sms_result .js_friend_sms_result_box span {
    float: right;
    font-size: 10px;
    margin-top: 10px;
    color: #999;
}
.js_friend_sms_result .js_friend_sms_result_box.right a {
    float: right;
}
.js_friend_sms_result .js_friend_sms_result_box.right p {
    float: left;
    background: #242424;
}
.js_friend_sms_result .js_friend_sms_result_box.right span {
    float: left;
}
.js_friend_sms_result img {
    width: 32px;
    height: 32px;
    float: left;
    border-radius: 50%;
}
.js_friend_sms_result p {
    width: calc(100% - 42px);
    float: right;
    margin: 0;
    padding: 8px;
    background: #292929;
    color: #999;
    border: 1px solid #353535;
    border-radius: 3px;
    word-wrap: break-word;
}
.friend_sms {
    width: 100%;
    height: 680px;
    position: relative;
    padding: 10px;
}
.friend_sms_list_user {
    width: 240px;
    height: 100%;
    color: #fff;
    overflow: auto;
    float: left;
    background: #232323;
    margin-bottom: 10px;
}
@media only screen and (max-width: 639px) {
    .friend_sms_list_user {
        width: 100%;
        height: 70px;
    }
}

.btn {
    background: #333;
    color: #fff;
    border: 0;
    padding: 10px;
    cursor: pointer;
    margin-right: 5px;
    font-size: 12px;
    border-radius: 2px;
}
.btn.success {
    border-bottom: 1px solid #4caf50;
}
.btn.error {
    border-bottom: 1px solid #e91e63;
}
.btn.danger {
    border-bottom: 1px solid #e91e63;
}
.btn.warning {
    border-bottom: 1px solid #ffeb3b;
}
.button {
    width: auto;
    float: left;
    padding: 10px;
    margin: 5px;
    color: #fff;
    background: #292929;
    border: 1px solid #333;
    border-bottom: 1px solid #76608a;
    cursor: pointer;
}
.button:hover {
    background: #292929;
    border-bottom: 1px solid #76608a;
}
.button.active {
    background: #76608a;
}
.button span {
    text-align: center;
    display: table-cell;
    vertical-align: middle;
}
.orange {
    background: coral !important;
    border: 1px solid #fff !important;
}
.green {
    background: #4ac948 !important;
    border: 1px solid #fff !important;
}
.red {
    background: #d03c2e !important;
    border: 1px solid #fff !important;
}
.black {
    background: #232323 !important;
    border: 1px solid #fff !important;
}
.blue {
    background: #005b96 !important;
    border: 1px solid #fff !important;
}
.btns_sidebar_fixed {
    position: fixed;
    width: 32px;
    height: auto;
    bottom: 0;
    left: 0;
    float: left;
    z-index: 998;
    opacity: 0.3;
    transition-delay: 0.75s;
}
.btns_sidebar_fixed:hover {
    opacity: 1;
    transition-delay: 0s;
}
.btns_sidebar_fixed .itens {
    width: 32px;
    height: 32px;
    float: left;
    margin-top: 10px;
    padding: 3px;
    border-top-right-radius: 3px;
    border-bottom-right-radius: 3px;
    background: #333;
    border-left: 0;
    cursor: pointer;
}
.btns_sidebar_fixed .itens img {
    display: inline-block;
    width: 24px;
    height: 24px;
    margin: auto auto;
    border-radius: 3px;
}
.btns_sidebar_fixed .itens.active {
    background: #0a680a;
}
.btns_sidebar_fixed .itens.disable {
    background: #d03c2e;
}
.btns_sidebar_fixed .itens.warning {
    background: #ff9b00;
}
.btns_sidebar_fixedRight {
    position: fixed;
    width: 32px;
    height: auto;
    bottom: 0;
    right: 0;
    float: right;
    z-index: 998;
    opacity: 0.3;
    transition-delay: 0.75s;
}
.btns_sidebar_fixedRight:hover {
    opacity: 1;
    transition-delay: 0s;
}
.btns_sidebar_fixedRight .itens {
    width: 32px;
    height: 32px;
    float: left;
    margin-top: 10px;
    padding: 3px;
    border-right: 0;
    border-top-left-radius: 3px;
    border-bottom-left-radius: 3px;
    background: #333;
    cursor: pointer;
}
.btns_sidebar_fixedRight .itens img {
    display: inline-block;
    width: 24px;
    height: 24px;
    margin: auto auto;
    border-radius: 3px;
}
.btns_sidebar_fixedRight .itens.active {
    background: #0a680a;
}
.btns_sidebar_fixedRight .itens.disable {
    background: #d03c2e;
}
.btns_sidebar_fixedRight .itens.warning {
    background: #ff9b00;
}
</style>
';

?>