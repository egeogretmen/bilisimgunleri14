<html>
<head>
	<title>Koç Üniversitesi - Bilişim Günleri '14</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script type="text/javascript" src="onepage-scroll-master/jquery.onepage-scroll.js"></script>
	<link href='onepage-scroll-master/onepage-scroll.css' rel='stylesheet' type='text/css'>
	<script>
	$(document).ready(function(){
		$(".main").onepage_scroll({
			sectionContainer: "section",
			responsiveFallback: 600,
			loop: false,
			beforeMove: function(index) {
				if(index == 1){
					$('.main .page1').css({ background: "#99ddff"});
				}
				else if(index == 2){
					$('.main .page1').css({ background: "#99ddff"});
					$('.main .page2').css({ background: "#59b9e2"});
					$('.main .page3').css({ background: "#59b9e2"});
				}
				else if(index == 3){
					$('.main .page').css({ background: "#37a3ba"});
				}
				else if(index == 4){
					$('.main .page').css({ background: "#318898"});
				}
				else if(index == 5){
					$('.main .page').css({ background: "#225869"});
				}
			}
			
		});

		function validateEmail(email) { 
			var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return re.test(email);
		} 

		$("#workshopForm").submit( function(e) {
			
			var name = $('input#att_name').val();
			var email = $('input#att_email').val();
			var submitBut = $('input#submit').val();
			var err = false;
			if(name == "") {
				$("#att_name").focus();
				err = true;
			}

			if(!validateEmail(email)){
				$("#att_email").focus();
				err = true;
			}

			if(err) return false;
			
			$('#workshop_form').css({ display: "none"});
			$('#workshop_submitted').css({ display: "block"});
			$('#workshop_submitted').html("<h4>Lütfen bekleyin...</h4>").hide().fadeIn(1500);
			
			var dataString = 'att_name=' + name + '&att_email=' + email + '&submit=' + submitBut;
			$.ajax({
				type: "POST",
				url: "workshopForm.php",
				data: dataString,
				success: function() {
					$('#workshop_submitted').html("<h4>Kaydınız alınmıştır.</h4>").hide().fadeIn(1500);
				},
				error: function() {
					('#workshop_submitted').html("<h4><a href=\"javascript:reloadForm()\">Lütfen tekrar deneyin.</a></h4>").hide().fadeIn(1500);
				}
			});
			e.preventDefault(); //STOP default action
			e.unbind();
			return false;
		});
		
		function reloadForm(){
			$('#workshop_submitted').css({ display: "none"});
			$('#workshop_submitted').html("<h4>Lütfen bekleyin...</h4>");
			$('#workshop_form').css({ display: "block"});
		}
		
});
</script>

<style>
@font-face {
	font-family: "04b03_tr";
	src: local('04b03_tr'),
	url('04B03_tr.ttf') format('truetype'); 
}
* {
	font-family: "04b03_tr";
}
html {
	height: 100%
}
.main .page{
	transition: background 2s ease;
	background: #99ddff;
}
.main section.page1{
	margin: 0 !important;
	height: 100%;
}
.main section.page2{
	margin: 0 !important;
	height: 100%;
	background: #59b9e2;
}
.main section.page3{
	margin: 0 !important;
	height: 100%;
}
.page_container {
	padding-top: 30px;
}
.textbox {
	margin: auto;
	margin-top: 50px;
	padding: 10px;
	text-align: center;
	position: relative;
	z-index: 2;
}
#navBar {
	display: block;
	position: absolute;
	top: 0;
	left: 0;
	background-color: rgba(40,40,40,0.3);
	text-align: center;
	z-index: 2;
	width: 100%;
	margin: auto;
}
#navBar ul {
	list-style-type: none;
	margin: auto;
	padding: 0;
}
#navBar ul li {
	display: inline-block;
	margin: 5 20 5 20;
}
#navBar a {
	text-decoration: none;
	color: #fff;
	opacity: 0.4;
	font-size: 11pt;
}
#navBar a:hover {
	opacity: 0.8;
	font-size: 13pt;
	transition: font-size 0.5s;
}
h1 {
	font-size: 35pt;
	color:rgba(255,255,255,1);
	margin: 14px;
}
h2 {
	font-size: 25pt;
	color:rgba(255,255,255,0.8);
	margin: 12px;
}
h4 {
	font-size: 20pt;
	color:rgba(255,255,255,0.8);
	margin: 10px;
}
h4 a {
	color:rgba(255,200,200,0.8);
	text-decoration: none;
}
.page1 .textbox {
	background-color:rgba(0,0,0,0.4);
	width: 60%;
}
.page2 .textbox {
	background-color:rgba(255,210,50,0.8);
	width: 30%;
}
.page3 .textbox {
	background-color:rgba(255,70,0,0.8);
	width: 30%;
}
.page4 .textbox {
	background-color:rgba(170,0,255,0.8);
	width: 45%;
	margin-top: auto;
}
.page5 .textbox {
	background-color:rgba(0,255,85,0.8);
	width: 30%;
	margin-top: auto;
}
.workshop_form {
	background-color:rgba(0,0,0,0.6);
	width: 300px;
	padding: 10;
	margin: auto;
	text-align: center;
	position: relative;
	z-index: 2;
}
.workshop_form label {
	display: inline-block;
	margin: 10 auto;
	text-align: right;
	width: 280px;
}
.workshop_form input[id^='att'] {
	
	background-color: rgba(0,0,0,0);
	border-top: none;
	border-left: none;
	border-right: none;
	border-bottom: 2px solid #0099CC;
	box-sizing: border-box;
	outline: none;
	color: white;
	font-size: 1.0em;
	padding: 0.3em 0.6em;
	width: 100%;
}
.workshop_form .form_description {
	color: rgba(255,255,255,0.4);
}
.jelly-form{
	position: relative;
}
.jelly-form:before, .jelly-form:after{
	content:'';
	display: block;

	position: absolute;
	bottom: 2px;

	height: 6px;
	border-left: 2px solid #0099CC;
}
.jelly-form:before{
	left: 0;
}
.jelly-form:after{
	right: 0;
}
.workshop_form input[type='submit'] {
	margin: 0;
	padding: 1em;
	background: rgba(0,0,0,0);
	border: 2px solid #09c;
	outline: none;
	color: rgba(255,255,255,0.4);
	transition: background 0.5s;
	transition: color 0.5s;
}
.workshop_form input[type='submit']:hover {
	background: rgba(255,255,255,0.2);
	outline: none;
	color: rgba(255,255,255,0.8);
	transition: background 0.5s;
	transition: color 0.5s;
}
.workshop_form p {
	margin: 10px;
}
#workshop_submitted {
	display: none;
}
img {
	z-index: 1;
	margin: auto;
	width: 100%;
	height: 100%;
	position: absolute;
	bottom: 0px;
}
.page1 img {
	height: auto;
}
.clear {
	height: 0;
	display: block;
	float: both;
}
</style>
</head>

<body>
	<div id="navBar">
		<ul>
			<li><a href="#" onclick=" $('.main').moveTo(1);">Ana Sayfa</a></li>
			<li><a href="#" onclick=" $('.main').moveTo(2);">1. Gün</a></li>
			<li><a href="#" onclick=" $('.main').moveTo(3);">2. Gün</a></li>
			<li><a href="#" onclick=" $('.main').moveTo(4);">3. Gün</a></li>
			<li><a href="#" onclick=" $('.main').moveTo(5);">4. Gün</a></li>
		</ul>
	</div>
	<div class="main">
		<section class="page1 page">
			<div class="bg_container">
				<img src="bg11.png"/>
			</div>
			<div class="page_container">
				<div class="textbox">
					<h2>KOÇ ÜNİVERSİTESİ 4. BİLİŞİM GÜNLERİ</h2>
					<h1>"İNTERNETİN GÖRÜNMEYEN YÜZÜ"</h1>
					<h2>31 Mart - 3 Nisan</h2>
				</div>
			</div>
		</section>
		<section class="page2 page">
			<div class="bg_container">
				<img src="bg2.png"/>
			</div>
			<div class="page_container">
				<div class="textbox">
					<h2>31 Mart Pazartesi</h2>
					<h2>18:30</h2>
					<h4>Alternatif Bilişim</h4>
					<h4>Ahmet Sabancı, Ebru Yetişkin ve Ali Rıza Keleş</h4>
					<h4>"İnternetin Yıkıcıliğı Üzerine, Tekel Medya ve Büyük Veri Savaşı"</h4>
				</div>
			</div>
		</section>
		<section class="page3 page">
			<div class="bg_container">
				<img src="bg3.png"/>
			</div>
			<div class="page_container">
				<div class="textbox">
					<h2>1 Nisan - Salı</h2>
					<h2>18:30</h2>
					<h4>Ötekilerin Postası</h4><br>
					<h4>"Dijital Aktivizm ve Alternatif Habercilik"</h4>
				</div>
			</div>
		</section>
		<section class="page4 page">
			<div class="bg_container">
				<img src="bg4.png"/>
			</div>
			<div class="page_container">
				<div class="textbox">
					<h2>2 Nisan - Çarşamba</h2>
					<h2>17:00</h2>
					<h4>Kem Gözlere Şiş - CryptoParty</h4>
					<h4>Barış Büyükakyol - Orkut Murat Yılmaz</h4>
					<h4>İnternet ortamında kişisel verilerin güvenliği ve mahremiyeti atölyesi</h4>
					<!-- <h4 style="font-size: 14pt">Kontenjanı 25 kişiyle sınırlı bu atölyeye katılmak için <span style="color: #333333">bilisim@ku.edu.tr</span> adresine mail atabilirsiniz.</h4> -->
					<div id="workshop_form" class="workshop_form">
					<form action="workshopForm.php" id="workshopForm" method="post">
						<div class="form_description"><p>Kontenjanı 25 kişiyle sınırlı bu <span style="color: #aa8822">ücretsiz</span> atölyeye katılmak için formu doldurabilirsiniz.</p></div>
						<div class="jelly-form"><input type="text" id="att_name" name="att_name" placeholder="Ad Soyad"></div><br>
						<div class="jelly-form"><input type="email" id="att_email" name="att_email" placeholder="adsoyad@ku.edu.tr"></div><br>
						<input type="submit" id="submit" name="submit" value="Gönder">
					</form>
					</div>
					<div id="workshop_submitted" class="workshop_form">
						<h4><!-- js will fill this line --></h4>
					</div>
				</div>
				
			</div>
		</section>
		<section class="page5 page">
			<div class="bg_container">
				<img src="bg5.png"/>
			</div>
			<div class="page_container">
				<div class="textbox">
					<h2>3 Nisan - Perşembe</h2>
					<h2>18:30</h2><br>
					<h4>Av. Serhat Koç, Şevket Uyanık</h4><br>
					<h4>"Korsan Parti, Yeni Siyasa, Meshnet"</h4>
				</div>
			</div>
		</section>
	</div>
</body>

</html>