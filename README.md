body {
	
    color: #000;
    font-family: "Istok Web",sans-serif;
    font-size: 14px;
    font-weight: 400;
    line-height: 20px;
    letter-spacing: 0.6px;

}
:focus{outline:none !important;}
h1, h2, h3, h4, h5, h6 {
	color: #444;
}
/* default font size */
.fa {
	font-size: 14px;
}
.fa-stack{width:9px;}
.fa-stack .fa{font-size:13px;}
/* Override the bootstrap defaults */
h1 {
	font-size: 33px;
}
h2 {
	font-size: 27px;
}
h3 {
	font-size: 21px;
}
h4 {
	font-size: 15px;
}
h5 {
	font-size: 18px;
}
h6 {
	font-size: 10.2px;
}
a {
	color: #777;
}
a:hover {
	text-decoration: none;color:#fdb913;
}
legend {
	font-size: 18px;
	padding: 7px 0px
}
label {
	font-size: 14px;
	font-weight: normal;
}
select.form-control, textarea.form-control, input[type="text"].form-control, input[type="password"].form-control, input[type="datetime"].form-control, input[type="datetime-local"].form-control, input[type="date"].form-control, input[type="month"].form-control, input[type="time"].form-control, input[type="week"].form-control, input[type="number"].form-control, input[type="email"].form-control, input[type="url"].form-control, input[type="search"].form-control, input[type="tel"].form-control, input[type="color"].form-control {
	font-size: 14px;
}
.input-group input, .input-group select, .input-group .dropdown-menu, .input-group .popover {
	font-size: 12px;
}
.input-group .input-group-addon {
	font-size: 12px;
	height: 30px;
}

/* Fix some bootstrap issues */
span.hidden-xs, span.hidden-sm, span.hidden-md, span.hidden-lg {
	display: inline;
}

.nav-tabs {
	margin-bottom: 15px;
}
div.required .control-label:before {
	content: '* ';
	color: #F00;
	font-weight: bold;
}
/* Gradent to all drop down menus */
.dropdown-menu li > a:hover {
	text-decoration: none;
	color: #ffffff;
	background-color: #229ac8;
}
/* top */
#top {
	padding:0;
	min-height: 36px;
	background:#000000;
	background-color: #2a2a2a;
}
#top .container {
    background: transparent;
	padding:0px;
	background-color: #2a2a2a;
	box-shadow: none;

}
#top #form-currency .currency-select {
	text-align: left;
	width:100%;
}
#top #form-currency .currency-select:hover {
	text-shadow: none;

}
#form-language .btn, #form-currency .btn {
    padding: 4px 2px;
}
#top .language-menu .language-select{color: #fff; width: 100%; padding: 2px 10px; text-align: left;}
#top .language-menu .language-select:hover{background-color: #fdb913; color: #fff;}
#form-currency .dropdown-menu, #form-language .dropdown-menu ,.affiliate-dropmenu .dropdown-menu{right:auto;left:0; background-color:rgba(62, 62, 62, 0.9);padding:5px 0;margin-top:3px;}
.myaccount .dropdown-menu{right:auto;left:0;background-color:rgba(62, 62, 62, 0.9);padding:5px 0;margin:9px 0 0;   z-index: 999;}
.nav.pull-left {padding-top: 10px; display: block; color: #fff;}
#form-language .btn.btn-link.dropdown-toggle{margin-right:10px;}
.myaccount  .caret{vertical-align:2px;color: #acacac;}
#form-language .dropdown-menu > li > a {padding: 2px 10px;   text-align: left;}
#form-currency .dropdown-menu .btn { padding:2px 10px !important;color:#fff;border:0 none;}
#form-language .dropdown-menu > li > a:hover {color:#FFFFFF;}
#top .btn-link, #top-links li, #top-links a {
	color: #ffffff;	
	text-decoration: none;
}
 #form-language .dropdown-menu > li > a,#form-currency .dropdown-menu > li > a,#top-links .myaccount .dropdown-menu > li > a ,.affiliate-dropmenu .dropdown-menu li a{color:#fff;}
#top-links li{padding:0 4px 0 0;}

#top-links .myaccount-menu li{padding:0;}

#top-links li+li{background:url("../image/megnor/header_top_links_pipe.jpg") no-repeat scroll left 2px transparent; padding:0 4px 0 9px;}
#top-links .myaccount-menu li + li{background:none;padding:0;}
#top-links a .fa{padding:5px 5px;}
#top .btn-link:hover, #top-links a:hover {color: #fdb913;}

#form-currency .dropdown-menu.currency-menu li:hover .btn, #form-language .dropdown-menu > li:hover > a,.myaccount .dropdown-menu > li:hover > a ,.affiliate-dropmenu .dropdown-menu li:hover > a{ background-color: #fdb913; color: #ffffff;}
#form-currency .dropdown-menu .btn:hover, #form-language .dropdown-menu > li > a:hover,.myaccount .dropdown-menu > li > a:hover{}

#top-links .dropdown-menu a ,.affiliate-dropmenu .dropdown-menu li a{
	text-shadow: none; padding:2px 10px;text-align:left;
}
#top-links .dropdown-menu a:hover,#top-links .dropdown-menu a:focus {
	color: #fff;
}
#top .btn-link strong {
	font-size: 14px;
	font-weight: normal;
}
#top-links {
	padding-top: 7px;
}
#top-links .list-inline{margin:1px 0 0;}
#top-links a + a {
	margin-left: 15px;
}
#top .fa-caret-down{vertical-align:-2px;color: #acacac;}

/* Header */
/*.header.container {
	height: 120px;
	background-color: #000000;
	box-shadow: none;	
	-webkit-box-shadow: none;	
	-moz-box-shadow: none;
	position: relative;
	padding:none;
}*/
/*customize*/
header{  background:#000;}
.header.container {
    height: 120px;
    padding: none;
	position:relative;
	background-color:#000;
}
.main-slider .swiper-wrapper {
  direction: ltr !important;
}

/* logo */
.header-logo{float:left;}
.header-search{position: absolute; right: 370px; top: 40px; width:345px;}
.header-cart{float:right;}
#logo {
	margin:30px 0 0 0;
	display:inline-block;
}
/* search */
#search {
	margin-bottom:0px;
	padding: 0 10px;
}
#search .input-lg {
    background: none repeat scroll 0 0 #ffffff;
	border-radius: 0;
	-webkit-border-radius:0;
	-khtml-border-radius:0;
	-moz-border-radius:0;
    box-shadow: none;
    float: left;
    height: auto;
    margin: 0;
    padding: 8.3px 10px;
    vertical-align: middle;
    width: 257px;
}
#search .btn-lg {
	  background: none repeat scroll 0 0 #fdb913;
    border: medium none;
    border-radius: 0;
	border-radius: 0;
	-webkit-border-radius:0;
	-khtml-border-radius:0;
	-moz-border-radius:0px;
    color: #ffffff;
    cursor: pointer;
    float: left;
    font-size: 14px;
    margin: 0;
    padding:10px 16px 7px;
    text-transform: uppercase;
    z-index: 9;
	
}
/* cart */
.header-right {float: right;}
#cart-total{ background: none repeat scroll 0 0 #ffffff;
    border-radius: 50%;
	border-radius:50%;
	-webkit-border-radius:50%;
	-khtml-border-radius:50%;
	-moz-border-radius:50%;
    clear: both;
    color: #696969;
    font-size: 13px;
    font-weight: 500;
    height: 20px;
    line-height: 21px;
    position: absolute;
    right: -2px;
    text-align: center;
    top: -2px;
    width: 20px;
}
#cart #cart-total .fa.fa-shopping-cart{display:none;}
#cart {
	margin: 35px 0 0;
	float:right;
}
#cart > .btn {
	background: url("../image/megnor/sprite.png") no-repeat scroll 13px -224px #fdb913;
    border-radius: 50%;
	border-radius:50%;
	-webkit-border-radius:50%;
	-khtml-border-radius:50%;
	-moz-border-radius:50%;
    color: #ffffff;
    display: block;
    float: left;
    font-size: 11px;
    font-weight: 700;
    height: 52px;
 
    position: relative;
    text-align: center;
    text-transform: uppercase;
    top: -4px;
    width: 52px;
    z-index: 0;
	 margin-left: 20px;
}
#cart.open > .btn {
	
}
#cart.open > .btn:hover {
	color: #444;
}
#cart .dropdown-menu {
	background: #fff;
	z-index: 1001;
}
#cart .dropdown-menu {
	width: 350px;
	padding:10px;
}
#cart .button-container {  
    width: auto;
	float:right;
}
#cart .dropdown-menu table {
	margin-bottom: 10px;
}

#cart .dropdown-menu .text-center {
    padding: 8px 0 !important;
}
#cart .dropdown-menu table.table-striped {
    border-bottom: 1px solid #eeeeee;
}
.cart-menu .table-bordered tr > td, .cart-menu .table-bordered {
    border: medium none;
    padding: 4px 5px;
}
#cart table.table-striped .btn-danger.btn-xs {
    background: none repeat scroll 0 0 transparent;
	box-shadow:none; 
	-webkit-box-shadow: none;
	-moz-box-shadow:none;
    margin: 0;
    padding: 0 0 0 5px;
	border:0 none;
	color:#000;
}
#cart table.table-striped .btn-danger:hover{color:#000 !important;}
#cart .dropdown-menu table td{border:none;background:none;}
#cart .dropdown-menu li > div {		
}
#cart .dropdown-menu li p {	margin:0px 0;}
.content_headercms_top { float:left; margin-top: 37px;}
.header-tele-cms {
    display: inline-block;
    position: relative; 
}
.header-tele-cms .telephone {
  	background: url("../image/megnor/call.png") no-repeat scroll center center transparent;
	float: left;
	height: 44px;
	width: 44px;
}

.cms-data {
    border-right: 1px solid #dcdcdc;
    display: inline-block;
    margin: 0 0 0 15px;
    padding-right: 20px;
}
.call {
   float: left;
   line-height: 22px;
	text-transform: uppercase;
	font-size: 18px;
	font-weight: 600;
	font-family: "Archivo Narrow",sans-serif;
	color: #ffffff;
}
.call-no {
    clear: both;
    float: left;
    color: #fff;
}


.swiper-container-fade .swiper-slide {
    width: 100% !important;
}
.contact-info .right {width: 100%;}

/* menu */
.nav-header {
    background: none repeat scroll 0 0 #000;
    border-bottom: 5px solid #fdb913;
}
@media (max-width: 979px){
    .nav-header {
    background: none repeat scroll 0 0 #000;
    border-bottom: none;
}
}
.nav-header .container {
    background-color: #000;
    /*height:62px;*/
    margin: 0 auto;
  	box-shadow: none;
}

#res-menu {
    display: none;
}
.nav-responsive { display:none;}
.responsive-menu {
	background: #545F61;	
	height: 42px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	-khtml-border-radius: 5px;
	border-radius: 5px;
	
	padding: 0px 5px; 
	/*overflow:hidden; HIDE CATEGORIES THOSE ARE OUT OF MANU.  */	  
}

.main-menu ul {
	list-style: none;
    margin: 0;
    display: block;
    padding: 0;
}
.main-menu ul > li {
	background-color: rgba(0, 0, 0, 0);
	display: inline-block;
	float: none;
	margin-right: 15px;
}

.main-menu ul > li > a, .hiden_menu li > a {
	color: #ffffff;
	display: block;
	font-family: "Archivo Narrow",sans-serif;
	font-size: 18px;
	font-weight: 400;
	margin-bottom: 0;
	padding: 15px 5px;
	position: relative;
	text-transform: uppercase;
	z-index: 6;
	
}
.main-menu ul > li:hover , .hiden_menu li:hover{
	background-color: #636363;
}  
.main-menu > ul > li:hover {
} 
 
 .nav-responsive span, .main-menu > ul > li > a {
    color: #ffffff;
    display: block;
    font-family: "Archivo Narrow",sans-serif;
    font-size: 18px;
    font-weight: 400;
    margin-bottom: 0;
    padding:21px 15px;
    position: relative;
    text-transform: uppercase;
    z-index: 6;
}
.main-menu a:hover { text-decoration:none}

.main-menu > ul > li:hover > a {
    background: none repeat scroll 0 0 #646464;
}
.main-menu > ul > li > ul , .responsive-menu .main-navigation{
	display: none;
	background: #15BCF0;
	position: absolute;	
	z-index: 5;
	padding: 5px;	
}  
.main-menu > ul > li:hover > ul {
	display: block;
} 
.main-menu > ul > li ul > li > ul {
	display: block;
	background: #15BCF0;
	position: absolute;	
	z-index: 5;
	padding: 5px;	
	margin-left:-13px;
}
.main-menu > ul > li ul > li:hover > ul {
	display: block;
	 top: 0px;
    left: 173px;
}

.main-menu > ul > li > ul > ul {
	/*display: table-cell;*/
}
.main-menu > ul > li ul + ul {
	/*padding-left: 20px;*/
}
.main-menu > ul > li ul > li > a{	
	padding: 8px;
	color: #FFFFFF;
	display: block;
	white-space: nowrap; 
}


.responsive-menu .main-navigation li a {
    color: #cecece;
    display: block;
    padding: 8px 12px;
    white-space: nowrap;
}


.main-menu > ul > li ul > li > a{min-width: 160px;}
.main-menu > ul > li ul > li > a:hover{
	color:#333;
	background-color:#fff;
}

.responsive-menu .main-navigation li a:hover {background-color: transparent;color: #fdb913;}

.main-menu > ul > li ul > li > a.activSub {	
	background-image:url(../image/megnor/cat_arrow_hover.png) ;
	background-repeat:no-repeat;
	background-position: right center;
}
.main-menu > ul > li > ul > ul > li > a {
	color: #FFFFFF;
} 
@media (min-width: 768px) {
	#menu .dropdown:hover .dropdown-menu {
		display: block;
	}
}
@media (max-width: 767px) {
	#menu {
		
	}
	#menu div.dropdown-inner > ul.list-unstyled {
		display: block;
	}
	#menu div.dropdown-menu {
		margin-left: 0 !important;
		padding-bottom: 10px;
		background-color: rgba(0, 0, 0, 0.1);
	}
	#menu .dropdown-inner {
		display: block;
	}
	#menu .dropdown-inner a {
		width: 100%;
		color: #fff;
	}
	#menu .dropdown-menu a:hover,
	#menu .dropdown-menu ul li a:hover {
		background: rgba(0, 0, 0, 0.1);
	}
	#menu .see-all {
		margin-top: 0;
		border: none;
		border-radius: 0;
		color: #fff;
	}
}

/* 1-col layout */

#column-left{
	width:25%;	
}
#column-right{
	width:25%;	
}
.layout-1 #content{
}
#column-left .swiper-viewport {
	overflow: hidden;border: none;
}
#column-left .swiper-viewport .swiper-pagination.swiper-pagination-bullets {
	display: none;
}
/* 2-col layout */

.layout-2.left-col #column-left{
	width:24%;padding:0 20px 0 15px;    margin: 0 -5px 0 0;
}
.layout-2.right-col #column-right{
	width:23.6%;
}
.layout-2 #content{
	width:76%;padding:0 10px;
	 margin-bottom: 25px;
}
.layout-2 .content-bottom #content{width:100%;margin-bottom:0;padding:0;}


/*.layout-2.left-col #content {

	   	
}
.layout-2.right-col #content {  
}
*/
/* 3-col layout */
.layout-3 #column-left{	
	width:25%;
}
.layout-3 #column-right{			
	width:25%;
}
.layout-3 #content{		
	width:50%;
}

/* Content-top */

.slider-banner {
    float: left;
    width: 100%;
}
.slider-banner .slide {
    float: left;
    width: 25%;
}
.slider-banner .slide a {
    background: none repeat scroll 0 0 #000000;
    cursor: pointer;
    display: block;
    height: 100%;
   transition: all 0.4s ease;
	-webkit-transition: all 0.4s ease;
	-moz-transition: all 0.4s ease;
	-ms-transition: all 0.4s ease;
	-o-transition: all 0.4s ease;
    width: 100%;
	border-top: 4px solid #000000;
}

.slidebanner1 .cms-title {
    border-left: 0 none;
}
.slidebanner4 .cms-title {
    border-right: 0 none;
}
.cms-title {
    border-color: #064857;
    border-style: solid;
    border-width: 0 1px;
    padding: 15px 20px;
    text-align: center;
    font-family: "Archivo Narrow";
}
.slider-banner .slide:hover a {
    border-top: 4px solid #fdb812;
    transition: all 0.4s ease;
	-webkit-transition: all 0.4s ease;
	-moz-transition: all 0.4s ease;
	-ms-transition: all 0.4s ease;
	-o-transition: all 0.4s ease;
}
.text1 {
   color: #fff;
text-transform: uppercase;
font-size: 17px;
font-weight: 600;
}
.text2 {
    color: #ffe35f;
	font-size: 15px;
	font-weight: 500;
}

.owl-buttons {
    display: none;
}
.top-banner {
	width: 100%;
	float: left;
	margin: 30px 0 0 0;
}
.single-banner {
	width: auto;
	float: left;
}
.subbanner1.single-banner , .bottom-banner .subbanner1.single-banner {
	margin: 0 24px 0 0;
}
.bottom-banner {
	width: 100%;
	float: left;
	position: relative;
	overflow: hidden;
	margin: 0 0 40px;
}
.bottom-banner .single-banner {
	width: 48.6%;
	float: left;
}
.bottom-banner img {
    max-width: 100%;
}
.single-banner div img, .top-banner .single-banner img, .bottom-banner .single-banner img {
	transition: all 1s ease 0s;
	-webkit-transition: all 1s ease 0s;
	-moz-transition: all 1s ease 0s;
	-ms-transition: all 1s ease 0s;
	-o-transition: all 1s ease 0s;
	vertical-align: middle;
	max-width: 100%;
}
.single-banner div:hover img, .top-banner .single-banner:hover img, .bottom-banner .single-banner:hover img {
	transform: scale(1.08);
	-webkit-transform: scale(1.08);
	-ms-transform: scale(1.08);
	-o-transform: scale(1.08);
	-moz-transform: scale(1.08);
}
.single-banner div, .subbanner1.single-banner, .subbanner2.single-banner {
	overflow: hidden;
}

/*Megnor category */
ul.dropmenu{
	display: block;
    font-family: Verdana,Arial,Helvetica,sans-serif;
    font-size: 12px;
    margin: 0;
    padding: 1px 0 0;
    position: relative;
    z-index: 9;
}
.dropmenu li{
	position: relative;
	list-style: none;
	margin: 0px;
	display: block;
	cursor: pointer;
    padding-bottom: 1px;
}
.dropmenu li:hover{	
	/*background-color:#f5f5f5;*/
}
.dropmenu li a{
	
	display: block;
	cursor: pointer;
	text-decoration: none;
	font-weight: bold;
	-moz-border-radius-bottomleft: 5px;
	-moz-border-radius-bottomright: 5px;
	-moz-border-radius-topleft: 5px;
	-moz-border-radius-topright: 5px;
}
.dropmenu li a:hover{
}
.dropmenu li span{
	display: block;
	float: right;
	height: 10px;
	width: 6px;
	position: absolute;
	top: 18px;
	right: 10px;
}
.dropmenu li:hover ul, .dropmenu li:hover div{
	display: block;
}
.dropmenu ul, .dropmenu div{
	position: absolute;
	display: none;
	width: 197px;
	left: 182px;
	top: 0px;
	margin: 0px;
	padding: 0px;
}
.dropmenu li div ul{
	border: none;
	background: none;
	position: relative;
	display: block;
	left: 0px;
}
.dropmenu ul li{
	border: 1px solid #e4e4e4;
	float: none;
}

.dropmenu div ul{
	position: relative;
	display: block;
}
.dropmenu li div{
	background-color: #cccccc;
	padding: 5px;
	display: none;
	position: absolute;
}
.dropmenu .submenu {background-color: #e4e4e4;}


.box .box-content ul , #content .content ul { 
	padding:0px;
	margin:0px;
	list-style:none;
}
.box .box-content ul li{

}
.box .box-content ul li:last-child a ,.box .box-content ul li ul li a{   border-bottom:0 none;}
.box .box-content ul li a{ border-bottom: 1px solid #e3e3e3;}

#content .content ul li {
	line-height:22px;
	padding:5px;
}
.box .box-content ul li ul li + li{border-top:medium none;}
.box .box-content ul li a , #content .content ul li a{
	 color: #696969;
    font-family: "Istok Web",sans-serif;
    font-size: 14px;
    font-weight: normal;
    padding: 9px 0 9px 30px;
    position: relative;
}
.box .box-content ul li a + a , .box .box-content ul li a + a:hover{ background:none; padding-left:0; }
.box .box-content ul li a:hover , #content .content ul li a:hover{
	color:#fdb913;
}

.box .box-content ul ul{
	background: none repeat scroll 0 0 #f5f5f5;
	margin-left:66px;
	width: 100%;
	z-index: 99;
	border: 1px solid #e3e3e3;
	border-left:0 none;
}
.box .box-content ul li ul li a {
    padding: 8px 0 8px 10px;
}
.box.sidebar-category .box-content ul li ul li a.activSub::before {
    right: 3px;
    top: 10px;
}
.box.sidebar-category .box-content ul li { padding: 0 12px 0 0;}

.box .box-content ul li ul li a.activSub:before, .box .box-content ul li a.activSub:before {
	content:"\f105";
	font-family:'FontAwesome';
	position: absolute;
    right:6px;
	font-size:13px;
	color:#aba9a9;
}
.box .box-content ul li ul li:hover > a.activSub:before, .box .box-content ul li:hover > a.activSub:before{color:#fdb913; content:none;}
.box .box-content ul li ul li:hover > a.activSub, .box .box-content ul li:hover > a.activSub {
    background: rgba(0, 0, 0, 0) url("../image/megnor/menu-hover-arrow.jpg") no-repeat scroll 209px 1px;
    margin-right: -12px;
}

.box .box-content ul ul li ul {display:none; margin-left:21px;}

.box .box-content ul ul li:hover ul {
	display: block;
	 top: -1px;
    left: 225px;
}
.product-block-inner a img{vertical-align:middle;}
.box .box-category-heading {
    background: url("../image/megnor/category.jpg") no-repeat scroll 0 0 #000000;
	color: #ffffff;
	font-family: "Archivo Narrow",sans-serif;
	font-size: 16px;
	padding: 10px 0;
	text-transform: uppercase;
	font-weight: 600;
}
.heading-img {
    margin-right: 16px;
    padding: 10px 24px;
    color: #fdb913;
}
#column-left div.list-group-item {
	padding: 0px 5px 10px;
}

/* content */
/*header-bottom*/
.content-top #content {
	/*min-height:495px;*/
	margin-bottom:25px;
}
.single-banner {
   
}

#banner1 {
	float:left;
}
#banner0{float:left;}
#banner2{float:right;}
.inner-cms {
    height: 81px;
    margin: 15px auto;
    position: relative;
}
.first-content {
    float: left;
    padding: 18px 0;
    position: relative;
    width: 32%;
}
.second-content {
    float: left;
    padding: 18px 0;
    position: relative;
    width: 35%;
}
.third-content {
    float: left;
    padding: 18px 0;
    position: relative;
    width:33%;
}
.forth-content {
    float: left;
    padding: 18px 0;
    position: relative;
    width:33%;
}
.icon-left1 {
    background: url("../image/megnor/sprite.png") no-repeat scroll 0 -279px transparent;
    float: left;
    padding: 10px;
}
.first-content .service-content{ border-right: 1px solid #dcdcdc;}
.second-content .service-content {
    border-right: 1px solid #dcdcdc;
    padding: 0 0 0 30px;
    width: auto;
}
.third-content .service-content {
   
    padding: 0 0 0 35px;
    width: auto;
}


.icon-left2 {
    background: url("../image/megnor/sprite.png") no-repeat scroll -3px -335px transparent;
    float: left;
    padding: 10px;
}
.icon-left3 {
    background: url("../image/megnor/sprite.png") no-repeat scroll 0 -392px transparent;
    float: left;
    padding: 12px;
}
.service-right{overflow:hidden;padding-left:8px;text-align:left;}
.service-right .title {  color: #4e4e4e;   font-size: 15px; font-weight: bold;font-family:"Archivo Narrow",sans-serif;}
.service-right .sub-title { color: #a5a5a5;}

/*footer-right*/
.content-top2 #content2 {
	min-height:495px;margin-bottom:25px;
}
.single-banner2 {
   
}

#banner1r {
	float:left;
}
#banner0r{float:left;}
#banner2r{float:right;}
.inner-cms2 {
    height: 267px;
    /*vertical-align: middle;*/
    display: table-cell;
    justify-content: center;
    width: 250px;
}
.first-content2 {
    float: left;
    position: relative;
    width: 100%;
}
.second-content2 {
    float: left;
    position: relative;
    width: 100%;
}
.icon-left-fr1 {
    /*background: url("../image/megnor/sprite.png") no-repeat scroll 0 -279px transparent;*/
    float: left;
    margin-top: -7px;
    padding: 10px
}
.first-content2 .service-content2{ border-right:none;}
.second-content2 .service-content2 {
    border-right: none;
    width: auto;
}
.third-content2 .service-content2 {
   
    padding: 0 0 0 35px;
    width: auto;
}

.icon-left-fr3 {
    background: url("../image/megnor/sprite.png") no-repeat scroll 0 -392px transparent;
    float: left;
    padding: 12px;
}
.icon-left-fr2 {
    background: url("../image/megnor/sprite.png") no-repeat scroll -3px -335px transparent;
    float: left;
    padding: 10px;
}

.service-right2{overflow:hidden;padding-left:8px;text-align:left;}
.service-right2 .title2 {  color: #4e4e4e;   font-size: 15px; font-weight: bold;font-family:"Archivo Narrow",sans-serif;}
.service-right2 .sub-title2 { color: #a5a5a5;}

/*footer-icon*/
/* content */
.content-top1 #content1 {
	min-height:495px;margin-bottom:25px;
}
.single-banner1 {
   
}
#banner1i {
	float:left;
}
#banner0i{float:left;}
#banner2i{float:right;}
.inner-cms1 {
    background-color: #ffffff ;
    height: 81px;
    border-top: 2px solid #dcdcdc;
    margin-right:30px;
    margin-left:30px;
    position: relative;
}
.first-content1 {
    float: left;
    padding: 18px 0;
    position: relative;
    width: 25%;
}
@media (max-width: 979px){
.first-content1 {
    float: left;
    padding: 18px 0;
    position: relative;
    width: 50%;
}
}
@media (max-width: 414px){
.first-content1 {
    float: left;
    padding: 18px 0;
    position: relative;
    width: 100%;
}
}
.second-content1 {
    float: left;
    padding: 18px 0;
    position: relative;
    width: 25%;
}
@media (max-width: 979px){
.second-content1 {
    float: left;
    padding: 18px 0;
    position: relative;
    width: 50%;
}
}
@media (max-width: 414px){
.second-content1 {
    float: left;
    padding: 18px 0;
    position: relative;
    width: 100%;
}
}
.third-content1 {
    float: left;
    padding: 18px 0;
    position: relative;
    width:25%;
}
@media (max-width: 979px){
.third-content1 {
    float: left;
    padding: 18px 0;
    position: relative;
    width:50%;
}
}
@media (max-width: 414px){
.third-content1 {
    float: left;
    padding: 18px 0;
    position: relative;
    width:100%;
}
}
.forth-content1 {
    float: left;
    padding: 18px 0;
    position: relative;
    width:25%;
}
@media (max-width: 414px){
.forth-content1 {
    float: left;
    padding: 18px 0;
    position: relative;
    width:100%;
}
}
.icon-left-f1 {
   /* background: url("../image/megnor/sprite.png") no-repeat scroll 0 -279px transparent;*/
    float: left;
    padding: 10px 0px 10px 90px;
    margin-top: -10px;
    width: 50%;
}
.first-content .service-content{ border-right: 1px solid #dcdcdc;}
.second-content .service-content {
    width: auto;
}
.third-content .service-content {
   
    padding: 0 0 0 35px;
    width: auto;
}

.icon-left-f3 {
    /*background: url("../image/megnor/sprite.png") no-repeat scroll 0 -392px transparent;*/
    float: left;
    padding: 12px;
}
.icon-left-f2 {
    /*background: url("../image/megnor/sprite.png") no-repeat scroll -3px -335px transparent;*/
    float: left;
    padding: 10px;
}
.icon-left-f4 {
    background: url("../image/megnor/sprite.png") no-repeat scroll -3px -335px transparent;
    float: left;
    padding: 10px;
}
.service-right1{overflow:hidden;padding-left:8px;text-align:left;}
.service-right1 .title1 {  color: #4e4e4e;   font-size: 15px; font-weight: bold;font-family:"Archivo Narrow",sans-serif;}
.service-right1 .sub-title1 { color: #a5a5a5;}

/* Content Bottom*/

.tabfeatured_default_width{ width:185px;}
.tabbestseller_default_width{ width:220px;}
.tablatest_default_width{ width:220px;}
.tabspecial_default_width{ width:220px;}


.htabs {
	height: 48px;
	line-height: 16px;
	border-bottom: 1px solid #e4e4e4;
}
.etabs {
    display: inline-block;
    float: none;
    margin: 0;
    padding: 0;
    text-align: center;
}
.htabs .etabs li {
   display: inline-block;
    float: left;
    line-height: 17px;
    list-style: outside none none;
    position: relative;
    text-align: center;
}
.htabs a {
    background-color: #ffffff;
    color: #313131;
    float: left;
    font-family: "Archivo Narrow",sans-serif;
    font-size:18px;
    margin-right: 3px;
    padding:15px 20px;
    text-align: center;
    text-transform: uppercase;
	text-decoration:none;
}
.htabs a.selected, .htabs a:hover{
	background:#fdb913;
    color: #ffffff;
}

.hometab .tab-content {
	position:relative;
	padding:0;
	z-index: 0;
	overflow: visible;
	margin-bottom:0px;
}
.tab-content .tab {
    display: none;
}
.hometab {
    clear: both;
	padding-top:25px;
	margin-bottom:25px;
}

.box.featured{clear:both;padding-top:25px;}

.cms-banner-left {
    float: left;
}
.cms-banner-right{
	 float: left;
}
.cms-banner2 ,.cms-banner3 {
    float: left;
}
.cms-subbanner2 {
    margin-top: 25px;
}
.cms-banner2 {margin:0 15px;}

.post-content-top {
    padding:15px 0 10px;
	overflow:hidden;
	color:#b3b3b3;
	font-size:13px;
	font-style:italic;
	font-weight:500;
}
.post_comment{float:right; }
.post_comment a{color:#b3b3b3;}
.byadmin{float:left;}
.post-title {
   margin-bottom:5px;
    text-transform:uppercase;
	color:#313131;
	font-size:17px;
}
.post-title a{ color: #1b1b1b;font-family:"Archivo Narrow",sans-serif;}
.post-description{color:#838383;}

.post-image {
  height: 198px;overflow: hidden;position: relative;  width: 353px;
    
}

.post-date {
    position: absolute;
    right:4.5%;
    top: 0;
	background-color:#42cfa6;
	height:85px;
	min-width:55px;
	padding:12px;
	text-align:center;
}

.post-image-hover {
    height: 100%;
    position: absolute;
    top: 0;
    transition: all 0.2s ease-out 0s;
	-webkit-transition:  all 0.2s ease-out 0s;
	-moz-transition:  all 0.2s ease-out 0s;
	-ms-transition: all 0.2s ease-out 0s;
	-o-transition: all 0.2s ease-out 0s;
    width: 100%;
}
.post-date .date{font-size:25px;color:#fff;font-weight:bold;}
.post-date .month{font-size:12px;color:#fff; display: block;}

#testimonialblog {
    margin-top: 25px;
}
#testimonial-blog .single-post {
    margin: 0 23px;
    overflow: hidden;
    position: relative;
}
#testimonial-blog .single-post:hover .post-image-hover{opacity:0.35;-khtml-opacity: 0.35;-webkit-opacity: 0.35;-moz-opacity:0.35; background-color:#313131;}

.post-image img{  
	transition: all 1s ease 0s;
	-webkit-transition:   all 1s ease 0s;
	-moz-transition:  all 1s ease 0s;
	-ms-transition:  all 1s ease 0s;
	-o-transition:  all 1s ease 0s;   
	max-width: 100%;}
#testimonial-blog .single-post:hover .post-image img {
    transform: scale(1.08);-webkit-transform: scale(1.08);-ms-transform: scale(1.08);-o-transform: scale(1.08);-moz-transform: scale(1.08);
}
#testimonial-blog .single-post:hover .zoom{opacity:1;-khtml-opacity:1;-webkit-opacity:1;-moz-opacity:1;}
.single-post .zoom {
    background: url("../image/megnor/blog-link.png") no-repeat scroll 0 0 transparent;
    display: inline-block;
    height: 50px;
    left: 0;
	right:0;
	margin:auto;
    opacity: 0;
	-khtml-opacity: 0;-webkit-opacity: 0;-moz-opacity:0;
    padding: 18px 25px;
    position: absolute;
    top:0px;
	bottom:0;
    transition: all 0.9s ease 0s;
	-webkit-transition: all 0.9s ease 0s;
	-moz-transition: all 0.9s ease 0s;
	-ms-transition: all 0.9s ease 0s;
	-o-transition: all 0.9s ease 0s;
    width: 52px;
    z-index: 10;
}
#testimonial-blog .single-post p{margin:0;}



/*#testimonial-blog .slider-item.first_item_tm .single-post {
    margin: 0 45px 0 0;
}
#testimonial-blog .slider-item.last_item_tm .single-post {
    margin: 0 0 0 45px;
}*/

#testimonial-blog.products{margin:50px 0;}
.single-banner div ,.cms-banner2 ,.cms-banner3{overflow:hidden;}
.single-banner div img ,.cms-banner-right .single-banner  img {
	transition: all 1s ease 0s;
	-webkit-transition: all 1s ease 0s;
	-moz-transition: all 1s ease 0s;
	-ms-transition:all 1s ease 0s;
	-o-transition: all 1s ease 0s;
	vertical-align: middle;
}

.single-banner div:hover img ,.cms-banner-right .single-banner:hover img {transform: scale(1.08);-webkit-transform: scale(1.08);-ms-transform: scale(1.08);-o-transform: scale(1.08);-moz-transform: scale(1.08);}
.content-bottom #content .swiper-viewport {
  border: medium none;
  box-shadow: none;
  margin: 0;
}

.content-bottom .swiper-pagination-bullet.swiper-pagination-bullet-active {
  display: none;
}


/* footer */

.content_footer_top{
    background-color: #ffffff;
    height: none;
    margin-bottom: 0px;
    
}

footer {color: #00000;width: 100%;float: left;background-color: #000;}
.content_footer_top .container {
	padding: 0;
	box-shadow: none;
	background-color: #ffffff;
}
/*footer {color: #00000;width: 100%;float: left;background-color: #000;}
.home-about-me.container{padding:0;}
.social {
    float: left;
    height: 80px;
    text-align: center;
    width:25%;
}
.social {
    background-color: #313131;
    float: left;
    height: 80px;
    text-align: center;
    width:25%;
}*/
.social > ul {
    display: inline-block;
    list-style: outside none none;
    margin: 0 auto;
    padding: 32px 10px;
    width: auto;
}
.social ul li {
    display: inline-block;
}
.social ul li{display:inline-block;}

.twitter a {
    background: url("../image/megnor/social_sprite.png") no-repeat scroll 2px -46px transparent;
    float: left;
    padding: 0 9px;
}

.twitter a:hover {
    background-position: 2px -235px;
}

.rss a {
    background: url("../image/megnor/social_sprite.png") no-repeat scroll 0 -140px transparent;
    float: left;
    padding: 0 7px;
}
.rss a:hover {
    background-position: 0 -329px;
}
.google-plus a {
    background: url("../image/megnor/social_sprite.png") no-repeat scroll 0 -93px transparent;
    float: left;
    padding: 0 8px;
}
.google-plus a:hover {
    background-position: 0 -281px;
}
.facebook a {
    background: url("../image/megnor/social_sprite.png") no-repeat scroll -4px 0 transparent;
    float: left;
    padding: 0 5px;
}

.facebook a:hover {
    background-position: -4px -189px;
}
.rss a, .google-plus a, .facebook a { margin: 0 12px;}
.twitter a{margin:0 10px}

.footer-top-right {
    background-color: #000000;
    float: right;
    height: 90px;
    width: 75%;
}
.tm-about-text:before{
	content:"\f087";
	font-family:'FontAwesome';
	font-size:45px;
	color:#fff;
	float:left;
	margin-top: 10px;
}
.tm-about-text {
    float: left;
    margin: 23px 0;
    padding: 0 0 0 40px;
    width: 76%;
}
.content-wrap {
    float: left;
    margin-left: 30px;
}
.footer-top .home-about-me .footer-top-right .tm-about-text h2 {
   margin:0 0 5px;
}
.footer-top-right .tm-about-description {
    color: #ffffff;
    background-color: #000000;
}
.tm-about-description {
    font-weight: 500;clear:both;
}
.tm-about-description p{margin:0;}
.aboutme-read-more {
	float: right;
	position: relative;

}
.aboutme-read-more {
	
    margin: 37px 25px 0 0;
    
    position: relative;
    text-align: center;
    text-transform: uppercase;
    width: 150px;;
}
.aboutme-read-more a{color: #ffffff; font-weight:bold;background-color: #313131;padding: 12px;
	color: #ffffff;
	 height: 44px;}
.aboutme-read-more a:hover {
    background-color: #000000;
    color: #fdb913;
    transition-duration: 500ms;
	-webkit-transition-duration: 500ms;
	-moz-transition-duration: 500ms;
	-ms-transition-duration: 500ms;
	-o-transition-duration: 500ms;
}

.footer-top-right .title1 {
    color: #ffffff;
    font-family: "Archivo Narrow",sans-serif;
    font-size: 22px;
    font-weight: bold;
    text-transform: uppercase;
	letter-spacing: 1px;
}


#footer{clear: both;
    line-height: 27px;
    min-height: 100px;
    overflow: hidden;
    padding:70px 0;
    background-color: #000000;
    border-top: 5px solid #fdb913;
}
#footer .column {
    float: left;
    padding-left:40px;
	width:25%;
	color: #9999;
}
#footer .col-sm-3.column.first {
    margin: 0 !important;
    padding: 0 10px 0 0;
    /*display: flex;*/
    justify-content: center;
    align-items: center;
    height: 267px;
    border-right: 0px solid gray;
   
}

#footer #footer_cms_block {
    float: left;
    line-height: 23px;
    margin-left: 12px;
    padding-right: 20px;
   
}
.col-sm-3.column.second, .col-sm-3.column.third {
    /*border-left: 1px solid #d9d9d9;
    padding: 0;
	width:21%;*/
  
}
.col-sm-3.column.third {border-right: 0px solid gray; border-left: 0px solid gray;}
#footer .col-sm-3.column.fourth {
    padding: 0px 0 0 40px;

}
.tm-about-logo {
    margin-bottom: 15px;
}

.tm-about-logo a img {}

footer a{color:#696969;}
footer a:hover, #footer .column li:hover a:before, #footer .column li:hover a{color:#fdb913;}
footer hr {
	border-top: none;
	border-bottom: 1px solid #666;
}

#footer .column li a:before {
   font-family:'FontAwesome';
   content:'\f0da';
   font-size:14px;
   padding-right:8px;
   color:#ababab;
}
#contact1 li:before {
    font-family: 'FontAwesome';
    content: '\f0da';
    font-size: 14px;
    padding-right: 8px;
    color: #ababab;
    line-height: none;
}
#footer #contact1 li:hover {
  color: #fdb913;
}
#footer .column li.email a::before{content:none;}
#footer .column li a:hover {
  background-position:0 -30px;
}


#footer .column ul {
    list-style: outside none none;
    margin: 0;
    padding-left: 0;
}
.tap{
    tab-size: 12;
}
#footer #contact .address::before {
   content: "\f041";
    font-family: "FontAwesome";
    font-size: 14px;
    padding: 0 7px 0 0;
    vertical-align: top;
	padding:5px 8px;
	border-radius:20px;
	border:1px solid #919191;
	margin-right: 10px;
	margin-top:5px;
	color:#919191;

}
#footer #contact .ph-no::before {
   content: "\f10b";
    font-family: "FontAwesome";
    font-size: 17px;
    padding: 0 11px 0 0;
    vertical-align: top;
	padding:4px 9px;
	border-radius:20px;
	border:1px solid #919191;
	margin-right: 10px;
	color:#919191;
}
#footer #contact .email::before {
    content: "\f0da";
    font-family: "FontAwesome";
    font-size: 11px;
    padding: 0 7px 0 0;
    vertical-align: top;
	padding:7px 8px;
	border-radius:20px;
	border:1px solid #919191;
	margin-right: 10px;
	color:#919191;
}

#footer #contact .address, #footer #contact .ph-no, #footer #contact .email{padding:0}
#footer #contact ul li {
    padding: 0 0 0 35px;
}
#footer #contact .email ,#footer #contact .ph-no{ line-height: 32px;}

.footer h5 {
	font-size: 18px;
	text-transform: uppercase;
	line-height: 26px;
	background: none;
	padding: 0;
	color: #ffffff;
	border: none;
	font-family: "Archivo Narrow",sans-serif;
	font-weight: 600;
	position: relative;
}

/*@media (min-width: 1200px)*/
.container1 {
    background: #000000;
    padding-right: 70px;
    padding-left: 70px;
    border-top: 5px solid #fdb913;
}


/*@media (min-width: 1200px){*/
.container2 {
    padding: 0 30px;
    background-color: #ffffff;
    box-shadow: none;
}
 
.copyright-container.container {
  background-color: #2a2a2a;
	padding: 0;
	box-shadow: none;
	width: 100%! important;
}
.content_footer_bottom {
    float: right;
}
.footer-container {
    float: left;
    margin-top: 20px;
}
.footer-payment {
    margin: 0 auto;
    padding: 10px 0;
    text-align: center;
}
.payment-block > ul {
    list-style: outside none none;
    margin: 0;
    padding: 0;
}
.payment-block > ul > li {
    display: inline;
}
.visa a {
    background: url("../image/megnor/payment1.png") no-repeat scroll center;
    padding: 2px 18px;
}
.paypal a {
    background: url("../image/megnor/payment2.png") no-repeat scroll center;
    margin-left: 10px;
    padding: 2px 18px;
}
.discover a {
    background: url("../image/megnor/payment3.png") no-repeat scroll center;
    margin-left: 10px;
    padding: 2px 18px;
}
.mastercard a {
    background: url("../image/megnor/payment4.png") no-repeat scroll center;
    margin-left: 10px;
    padding: 2px 18px;
}

#bottomfooter {
    clear: both;
    float: left;
    margin: 0px 0 3px;
    text-align: left;
    width: 100%;
}
#bottomfooter > ul {
    list-style: outside none none;
    margin: 0;
    padding: 0;
}
#bottomfooter > ul > li {
    background: url("../image/megnor/header_top_links_pipe.jpg") no-repeat scroll right 13px transparent;
    display: inline;
    font-size: 13px;
    padding: 10px 8px 3px 1px;
}
#bottomfooter > ul > li a{color:#696969;}
#bottomfooter > ul > li a:hover{color:#fdb913;}
#bottomfooter > ul .last {
    background: none repeat scroll 0 0 transparent;
}
.powered {
    clear: both;
    font-size: 13px;
    text-align:left;
}


/* Category PAge */

.category_description {margin-top: 5px;}

.category_img .img-thumbnail { border: medium none; border: medium none;
    border-radius: 0;
    padding: 0;}

.refine-search{ font-size: 14px;font-weight: 600;margin-bottom: 10px;}
.copy-right {
    border-top: 1px solid #444;
    padding: 10px 0;
	text-align:center;
}
#content .category_list {
    margin-bottom: 8px;
}
#content .category_list ul {
  list-style: outside none none;
    margin: 0;
    padding: 0;
    position: relative;
    width: 100%;
}
#content .category_list ul li a:hover {
	border-color: #fdb913;
}


@media (max-width: 979px) {
#footer .column ul {
    display: block;
}
#footer .column {
    background-color: #00000;
    width: 100%;
}
}
/* alert */
.alert {
	padding: 8px 14px 8px 14px;
}
/* breadcrumb */
.breadcrumb {
	margin: 0 0 20px 0;
	padding: 8px 0;
	border: 1px solid #e4e4e4;
}
.breadcrumb i {
	font-size: 15px;
	color: #000;
}

.breadcrumb > li {
	position: relative;
	white-space: nowrap;
}
.breadcrumb > li + li:before {
	content: '';
	padding: 0;
}
.breadcrumb > li:after {}

.pagination {
	margin: 0;
}
/* buttons */
.buttons {
	margin: 1em 0; display: block;
    margin: 10px 0 0;
    width: 100%;
}
.btn {
	padding: 6px 12px;
	font-size: 14px;
	border: 1px solid #cccccc;
	border-radius:0px;
	-webkit-border-radius:0px;
	-khtml-border-radius:0px;
	-moz-border-radius:0px; 	
}
.btn-xs {
	font-size: 9px;
}
.btn-sm {
	font-size: 10.2px;
}
.btn-lg {
	padding: 10px 16px;
	font-size: 15px;
}
.btn-group > .btn, .btn-group > .dropdown-menu, .btn-group > .popover, .dropdown-menu.myaccount-menu, #form-currency .dropdown-menu .btn-link{
	font-size:14px;
}
.btn-group > .btn-xs {
	font-size: 9px;
}
.btn-group > .btn-sm {
	font-size: 10.2px;
}
.btn-group > .btn-lg {
	font-size: 15px;
}

.btn-primary,#cart .text-right .addtocart,#cart .text-right .checkout ,.btn-default,#button-cart ,.button.aboutus,.btn-info
{
	background: none repeat scroll 0 0 #fdb913;
	border: medium none;
	color: #ffffff;
	display: inline-block;
	font-size: 14px;
	font-weight: normal;
	padding:10px 12px;
	text-transform: uppercase;
	width: auto;
	height:auto;
	border-radius:0;
	line-height: normal;
}
.btn-primary:hover ,#cart .text-right .addtocart:hover,#cart .text-right .checkout:hover ,.btn-default:hover ,#button-cart:hover,.button.aboutus:hover ,.btn-info:hover{
	background-color: #313131;
	color: #ffffff !important;
	transition-duration: 500ms;
	-webkit-transition-duration: 500ms;
	-moz-transition-duration: 500ms;
	-ms-transition-duration: 500ms;
	-o-transition-duration: 500ms;
}
.btn-danger{
	font-size: 14px;
	font-weight: normal;
	padding:10px 12px;
	border:none;
	text-transform: uppercase;
}


#cart .text-right .addtocart strong, #cart .text-right .checkout strong{font-weight:normal;}

.btn-warning {
	color: #ffffff;
	background-color: #faa732;
	background-image: linear-gradient(to bottom, #fbb450, #f89406);
	background-repeat: repeat-x;
	border-color: #f89406 #f89406 #ad6704;
}
.btn-warning:hover, .btn-warning:active, .btn-warning.active, .btn-warning.disabled, .btn-warning[disabled] {
	box-shadow: inset 0 1000px 0 rgba(0, 0, 0, 0.1);
}

.btn-success {
	color: #ffffff;
	background-color: #5bb75b;
	background-image: linear-gradient(to bottom, #62c462, #51a351);
	background-repeat: repeat-x;
	border-color: #51a351 #51a351 #387038;
}
.btn-success:hover, .btn-success:active, .btn-success.active, .btn-success.disabled, .btn-success[disabled] {
	box-shadow: inset 0 1000px 0 rgba(0, 0, 0, 0.1);
	-webkit-box-shadow: inset 0 1000px 0 rgba(0, 0, 0, 0.1);
	-moz-box-shadow: inset 0 1000px 0 rgba(0, 0, 0, 0.1);
}

.btn-link {
	border-color: transparent;
	cursor: pointer;
	color: #23A1D1;
	border-radius: 0;
}
.btn-link, .btn-link:active, .btn-link[disabled] {
	background-color: rgba(0,0,0,0);
	background-image: none;
	box-shadow: none;
}
.btn-inverse {
	color: #ffffff;	
	background: #363636;
	border:none;		
}
.btn-inverse:hover, .btn-inverse:active, .btn-inverse.active, .btn-inverse.disabled, .btn-inverse[disabled] {
	background-color: #222222;
	background-image: linear-gradient(to bottom, #333333, #111111);
}
@media (max-width: 767px) { 

 }

/* list group */

.box .filterbox { 
  
}

.filterbox .list-group a {
    display: block;
    font-weight: bold;
    padding: 0;
	border:0 none;
	background:none;
}
.filterbox .list-group-item {
    padding: 0 5px;
}
.filterbox .list-group-item .checkbox {
    line-height: 22px;
}

#column-left .list-group, #column-right .list-group {
    background: none repeat scroll 0 0 #ffffff;
    border-bottom: 1px solid #e4e4e4;
    border-left: 1px solid #e4e4e4;
    border-radius: 0;
	-webkit-border-radius: 0px;
	-moz-border-radius: 0px;
	-khtml-border-radius: 0px;
    border-right: 1px solid #e4e4e4;
    margin-bottom: 25px;
    padding: 10px;
}
#column-left .list-group a, #column-right .list-group a{
	border-color: #f5f5f5 currentcolor #000080;
    border-style: solid none none;
    border-width: 1px medium medium;
}
#column-left .list-group a:first-child,#column-right .list-group a:first-child, #column-left .filterbox .list-group a, #column-right .filterbox .list-group a {
    border-top: medium none;
}
.list-group a {
	border-top: 1px solid #f5f5f5;
	color: #888888;
	padding: 8px 5px;
	background: none repeat scroll 0 0 #fff;
}
.list-group a.active, .list-group a.active:hover, .list-group a:hover {
	
	
}
.list-group a:hover{color:#fdb913;}
.filterbox .list-group a:hover{color:#555555;}
/* carousel */
.carousel-caption {
	color: #FFFFFF;
}
.carousel-control .icon-prev:before {
	content: '\f053';
	font-family: FontAwesome;
}
.carousel-control .icon-next:before {
	content: '\f054';
	font-family: FontAwesome;
}
/* product list */
.product-thumb {
	
	/*margin-bottom: 20px;*/
	overflow: hidden;;
}
.product-thumb .image {
	text-align: center;
	position:relative;
	overflow: hidden;
}
.product-thumb .image a {
	display: block;
}
.product-thumb .image a:hover {
	
}
.product-thumb .image img {
	margin-left: auto;
	margin-right: auto;
}
.product-grid .product-thumb .image {
	float: none;
}
@media (min-width: 767px) {
.product-list .product-thumb .image {
	float: left;
	padding: 20px;
	border-right: 1px solid #e4e4e4;
	width: 28%;
}
}
.product-thumb h4 {
	color: #696969;
    font-family: "Istok Web",sans-serif;
    font-weight: normal;
    margin: 5px 0 7px;
    text-overflow: ellipsis;
/*white-space: nowrap;*/
white-space: normal;
overflow: hidden;
width: auto;
}
.product-thumb h4  a{
	color: #696969;
	
}
.product-thumb .caption {
	padding: 8px 0 0;
}

.caption1 {
	padding: 8px 0 0;
	overflow: hidden;
}
@media (max-width: 979px){
.caption1 {
	padding: 8px 0 0;
	overflow: inherit;
}
}
@media (max-width: 767px) {
.product-list .product-thumb .caption {
	min-height: 0;
	margin-left: 0;
	padding: 0 10px;
}
.product-grid .product-thumb .caption {
	min-height: 0;
}
}

.product-thumb .rating {
	padding-bottom:0px;
	clear:both;
}
.write-review .fa.fa-pencil {
  margin-right: 6px;
}
.rating .fa-stack,#review .fa-stack{
	font-size: 8px;
}
.rating-wrapper .fa-star-o, #review .fa-star-o, .rating .fa-star-o, #review .fa-star-o {
	color: #cccccc;
	font-size: 13px;
}
.rating .fa-star, #review .fa-star {
	color: #f9a90c;
	font-size: 13px;
}
.fa-star-o::before {
	content: "\f005";
}
.rating-wrapper .fa-star + .fa-star-o, .rating .fa-star + .fa-star-o, #review .fa-star + .fa-star-o{
	color: #f9a90c;
}
h2.price {
	margin: 0;
}
.product-thumb .price {
	color: #313131;
	font-family: "Archivo Narrow",sans-serif;
	font-size: 20px;
	font-weight: 600;
	float: left;
	margin-bottom: 5px;
	font-style: normal;
}
.product-thumb .price-new {}
.product-thumb .price-old {
	color: #acacac;
	text-decoration: line-through;
	margin-right:3px;
	font-size:20px;
	font-weight:600;
}
.product-thumb .price-tax {
	color: #999;
    display: inline-block;
    font-size: 12px;
    width: 100%;
}
.product-thumb .button-group {
	
	overflow: hidden;
}
.product-list .product-thumb .button-group{overflow:visible;}
.product-block .button-group{
	opacity:0;
	-khtml-opacity: 0;
	-webkit-opacity: 0;
	-moz-opacity:0;
	margin: 5px 10px 0;
	clear: both;
	width: 100%;
	float: left;
	transform: translateX(-230px);
-webkit-transform: translateX(-230px);
-ms-transform: translateX(-230px);
-o-transform: translateX(-230px);
-moz-transform: translateX(-230px);
transition: all 0.4s ease;
-webkit-transition: all 0.4s ease;
-moz-transition: all 0.4s ease;
-ms-transition: all 0.4s ease;
-o-transition: all 0.4s ease;
}
.box-product .product-block:hover .button-group, .product-grid .product-thumb:hover .button-group,  .product-list .product-thumb:hover .button-group{opacity:1;-khtml-opacity: 1;-webkit-opacity: 1;-moz-opacity:1;
	transform: translateX(0);
	-webkit-transform: translateX(0);
	-ms-transform: translateX(0);
	-o-transform: translateX(0);
	-moz-transform: translateX(0);
	transition: all 0.4s ease;
	-webkit-transition: all 0.4s ease;
	-moz-transition: all 0.4s ease;
	-ms-transition: all 0.4s ease;
	-o-transition: all 0.4s ease;
}
.product-grid .btn-wish-compare, .product-grid .list-right, .product-list .btn-list-grid{display:none;}

@media (max-width: 768px) {
.product-list .product-thumb .button-group {
	border-left: none;
}
}

.product-thumb .button-group .addtocart{
	background:#f2f0f1;
	border:0 none;
	float:left;
	height:35px;
	width:35px;
	transition-duration:0ms;
	-webkit-transition-duration: 0ms;
	-moz-transition-duration: 0ms;
	-ms-transition-duration: 0ms;
	-o-transition-duration: 0ms;
	/*font-size:0;*/
	margin: 0 6px 0 0;
	color: #000;
}

.product-thumb .button-group .wishlist{
	background:#f2f0f1;
	border:0 none;
	float:left;
	margin-top:0;
	height:35px;
	width:35px;
	transition-duration:0ms;
	-webkit-transition-duration: 0ms;
	-moz-transition-duration: 0ms;
	-ms-transition-duration:0ms;
	-o-transition-duration: 0ms;
	font-size:0;
	margin: 0 6px 0 0;
	line-height: 3px !important;
	color: #000;


}
.product-thumb .button-group .wishlist:hover{}
.product-thumb .button-group .compare{
	background:#f2f0f1;
	border:0 none;
	float:left;
	margin-top:0;
	height:35px;
	width:35px;
	transition-duration:0ms;
	-webkit-transition-duration: 0ms;
-moz-transition-duration: 0ms;
-ms-transition-duration: 0ms;
-o-transition-duration: 0ms;
	font-size:0;
	line-height: 3px !important;
	color: #000;
	
}
.quickview-button {
    background:#f2f0f1;
	border:0 none;
	float:left;
    height:35px;
	width:35px;
    margin: 0 5px 0 0;
    text-align: center;
	line-height: 35px;
	color: #000;
}
.product-thumb .button-group .compare:hover{}
.product-thumb .button-group button:hover {
    color: #fff;
	background: #fdb812;
    text-decoration: none;
    cursor: pointer;
}
.quickview-button a {
	    float: left;
    height: 35px;
    width: 35px;
    color: #000;

}
.product-thumb .quickview-button:hover a {
    color: #fff !important;
}
.quickview-button:hover {
    background: #fdb913;
    color: #fff;
}
#cart .dropdown-menu .img-thumbnail{width:auto; max-width:none;border-radius: 0;}
#cart .text-right .addtocart{margin:0 -10px 0 0;}
.product-thumb .button-group button + button {
	width: 20%;
	border-left: 1px solid #e4e4e4;
	
}

.product-list .caption {
   margin: 20px 0;
	padding: 0 15px;
	width: auto;
	float: left;
}
.product-list .caption .desc {
   margin: 11px 0;
}
.product-list .price {
    margin: 0 0 6px;
    text-align: center;
}
.product-list .product-thumb .rating {
    margin-bottom: 9px;
    padding: 0;
}
.product-list .btn-wish-compare {
    margin-top: 5px;
}
#content .product-list .product-details .caption .button-group {
    opacity: 1;
	-khtml-opacity: 1;
	-webkit-opacity:1;
	-moz-opacity:1;
	transform: none;
	display: block;
	margin: 5px 0;
}
#content .product-grid .product-details .caption .button-group {
display: none;
}
#content .product-list .button-group {
	
	display: none;
}
.product-list .product-thumb .sale {
    left: 0;
    opacity: 1;-khtml-opacity: 1;-webkit-opacity:1;-moz-opacity:1;
    right: auto;
    top: 0;
}
.product-list .list-right {
    border-left: 1px solid #e4e4e4;
    float: left;
    margin: 38px 0;
    padding: 0 10px 0 30px;
	width:27%;
}
.product-list .price {
    margin: 0 0 13px;
    text-align: left;
}
.product-list .product-thumb .price-tax {
    color: #999999;display: none;
}
.list-buttoncart {
    padding-left: 0;
}
.blog-left .blog-image img {
    border: none;
    padding: 0;
    position: relative;
    border-radius: 0;
    -webkit-border-radius: 0;
    -khtml-border-radius: 0;
    -moz-border-radius: 0;
    transition: all 0.3s ease 0s;
    -moz-transition: all 0.3s ease 0s;
    -webkit-transition: all 0.3s ease 0s;
    -ms-transition: all 0.3s ease 0s;
    -o-transition: all 0.3s ease 0s;
}
.blog-item .blog-left .blog-image .post_hover ,.blog-left-content .blog-image .post_hover {
    bottom: 0;
    display: inline-block;
    height: 44px;
    left: 0;
    margin: auto;
    opacity: 0;
    -khtml-opacity: 0;
    -webkit-opacity: 0;
    -moz-opacity: 0;
    position: absolute;
    right: 0;
    text-align: center;
    top: 0;
    width: 100px;
}
.blog-item:hover .product-block .blog-left .post_hover , .blog-left-content:hover .blog-image .post_hover{
	opacity: 1;
	-webkit-opacity: 1;
	-moz-opacity: 1;
	-kkhtml-opacity: 1;
	transition: all 0.1s ease 0s;
	-moz-transition: all 0.1s ease 0s;
	-webkit-transition: all 0.1s ease 0s;
	-ms-transition: all 0.1s ease 0s;
	-o-transition: all 0.1s ease 0s;
}
.blog-item .blog-left .blog-image .zoom , .blog-left-content .blog-image .zoom {
	background:rgba(0, 0, 0, 0.3);
	border: 2px solid #FFFFFF;
	border-radius: 50%;
	color: #fff;
	display: inline-block;
	margin-right: 10px;
	opacity: 0;
	-khtml-opacity: 0;
	-moz-opacity: 0;
	-webkit-opacity: 0;
	padding: 8px 12px;
	transition: all 0.5s ease 0s;
	-moz-transition: all 0.5s ease 0s;
	-webkit-transition: all 0.5s ease 0s;
	-ms-transition: all 0.5s ease 0s;
	-o-transition: all 0.5s ease 0s;
	z-index: 10;
	position: absolute;
	left: 30px;
}
.blog-item .blog-left .blog-image .readmore_link  , .blog-left-content .blog-image .readmore_link{
	background: rgba(0, 0, 0, 0.3);
	border: 2px solid #FFFFFF;
	border-radius: 50%;
	color: #fff;
	display: inline-block;
	opacity: 0;
	-khtml-opacity: 0;
	-moz-opacity: 0;
	-webkit-opacity: 0;
	padding: 8px 12px;
	transition: all 0.5s ease 0s;
	-moz-transition: all 0.5s ease 0s;
	-webkit-transition: all 0.5s ease 0s;
	-ms-transition: all 0.5s ease 0s;
	-o-transition: all 0.5s ease 0s;
	z-index: 10;
	position: absolute;
	right: 27px;
}
.blog-item:hover .product-block .blog-left .readmore_link , .blog-left-content:hover .blog-image .readmore_link {
	opacity: 1;
	-webkit-opacity: 1;
	-moz-opacity: 1;
	-kkhtml-opacity: 1;
	transition: all 0.5s ease 0s;
	-moz-transition: all 0.5s ease 0s;
	-webkit-transition: all 0.5s ease 0s;
	-ms-transition: all 0.5s ease 0s;
	-o-transition: all 0.5s ease 0s;
	right: 0;
}
.blog-item:hover .product-block .blog-left .zoom , .blog-left-content:hover .blog-image .zoom{
	opacity: 1;
	-webkit-opacity: 1;
	-moz-opacity: 1;
	-kkhtml-opacity: 1;
	transition: all 0.5s ease 0s;
	-moz-transition: all 0.5s ease 0s;
	-webkit-transition: all 0.5s ease 0s;
	-ms-transition: all 0.5s ease 0s;
	-o-transition: all 0.5s ease 0s;
	left: 0;
}
.blog-item .blog-left .blog-image .zoom:hover, .blog-item .blog-left .blog-image .readmore_link:hover ,
.blog-left-content .blog-image .zoom:hover , .blog-left-content .blog-image .readmore_link:hover{
   	background:rgba(0, 0, 0, 0.8);
}
.blog-left .blog-image {
	position: relative;
	overflow: hidden;
}
.box.Blog .box-content {
	padding: 0;
}
#content .box.Blog .blog-item .product-block {border: none;padding: 0 5px;}
#content #blog-carousel .owl-pagination {text-align: center;display: none;}
.owl-carousel .owl-buttons div i {
	font-size: 20px !important;
	line-height: 30px;
	width: 30px;
	height: 30px;
	position: absolute;
	margin: 0 !important;
	background: #ebebeb !important;	
	
}
#content .box.Blog .box-content {
    margin: 0 -15px;
}
.old-price {
	color: #acacac;
	font-size: 18px;
	font-weight: 600;
}
.quickview-model #content h2.product-title {
	color: #000;
}
.owl-prev i{background: #ebebeb !important;color: #898989; }
.owl-next i{background: #ebebeb !important;color: #898989;}
.owl-carousel .owl-buttons div.owl-prev:hover i{background: #fdb913 !important;color: #fff; }
.owl-carousel .owl-buttons div.owl-next:hover i{background: #fdb913 !important;color: #fff;}
.owl-carousel .owl-buttons div i {
	font-size: 20px !important;
	line-height: 30px;
}
.owl-carousel .owl-buttons div i {
	display: block !important;
}
@media (max-width: 979px){
    .owl-carousel .owl-buttons div i {
	display: none !important;
}
}
.Blog .owl-buttons{display: block;}
.Blog .box-content .owl-carousel .owl-buttons div {
	opacity: 1;
	-khtml-opacity: 1;
	-webkit-opacity: 1;
	-moz-opacity: 1;
}
#content .Blog .box-product{overflow: visible;}
.blog-right h4 {
	font-size: 17px;
	margin: 20px 0 0;
	clear: both;
	font-family: "Archivo Narrow",sans-serif;
	text-transform: uppercase;
	color: #1b1b1b;
}
.blog-right h4 a{color: #1b1b1b;}
.single-blog .blog-desc {
    float: left;
    width: 100%;
    margin: 20px 0;
    line-height: 24px;
}
.blog-desc {
    width: 100%;
    float: left;
    margin: 10px 0 0;
    line-height: 24px;
    color: #999;
}
.owl-controls.clickable {
	text-align: center;
}
.owl-controls .owl-page span {background-color: #E1E0E0 !important;border: none !important;}
.owl-controls .owl-page.active span, .owl-controls .owl-page:hover span {
	background-color: #fdb913 !important;
	border-color: transparent !important;
}
.owl-carousel .owl-buttons .owl-prev ,.owl-carousel .owl-buttons .owl-next {top: -13.5% !important;}

.owl-carousel .owl-buttons .owl-prev ,.owl-carousel:hover .owl-buttons .owl-prev {right: 85px !important;left: auto !important;}
.owl-carousel .owl-buttons .owl-next,.owl-carousel:hover .owl-buttons .owl-next{right: 45px !important;}
.Blog .owl-carousel .owl-buttons div {
	font-size: 20px;
	color: #a8a8a8;
	text-align: center;
	line-height: 30px;
}
#content .special-price {
	color: #313131;
	font-family: "Archivo Narrow",sans-serif;
	font-size: 28px;
	font-weight: 600;
}
.date-time , .blog-left-content .blog-image .date-time {
	color: #fff;
	font-size: 16px;
	text-transform: uppercase;
	position: absolute;
	right: 5%;
	top: 0;
	text-align: center;
	background: #fdb913;
	width: 55px;
	height: 70px;
	padding: 4px 0 0;
}
.date-time {
	width: 122px;
	height: auto;
	left: 0;
	right: auto;
	padding: 8px 0 5px;
	font-size: 13px;
	font-style: italic;
	text-transform: capitalize;
	top: auto;
	bottom: 0;
}
.blog-left-content .blog-image .date-time {right: 5%;top: 0;left: auto;}
.panel-default .blog-right-content h5 {
	text-overflow: ellipsis;
	white-space: nowrap;
	overflow: hidden;
	margin: 0 0 10px;
	padding-top: 15px;
	padding-left: 20px;
}
.all-blog .blog-right-content h5 a {
	text-transform: capitalize;
	text-align: left;
	font-size: 16px;
	font-weight: 500;
	color: #000;
	letter-spacing: 0.4px;
	line-height: normal;
	margin: 0;
}
.all-blog .read-more {
	float: left;
	padding: 11px 20px;
}
.read-more a {
	background-color: #fdb913;
	color: #fff;
	text-transform: uppercase;
	white-space: normal;
	padding: 10px 17px;
	font-weight: 400;
	letter-spacing: 0.6px;
	line-height: 20px;
	font-size: 14px;
}
.all-blog .blog-desc {
	margin-top: 0;
	float: left;
	width: 70%;
	font-size: 14px;
	font-weight: 400;
	line-height: 24px;
	margin-bottom: 0px;
	padding-left: 20px;
}
@media (max-width: 979px){
    .all-blog .blog-desc {
        width:100%;
    }
}
.read-more a:hover, .read-more a:focus {
	background: #333;
	color: #fff;
}
.newsletter .box-heading {
	font-size: 24px;
	font-weight: 600;
	color: #fff;
	background: url("../image/megnor/msg.png") no-repeat scroll 0 3px transparent;
    line-height: 30px;
	padding: 0 0 0 45px;
	text-transform: uppercase;
	font-family: "Archivo Narrow",sans-serif;
}
.newsletter {
	background: #fdb913;width: 75%;float: left;padding: 15px 20px;
}
.newsletter .subtitle {
	color: #ffffff;
	font-size: 14px;
}
.newsletter1 {width: 100%;float: left;}
.newsletter .box-left {float: left;}
.newsletter .box-right{width: 50%;float: right;padding: 2px 0 0;}
.newsletter .input-news {
	float: right;
	width: 76.1%;
	border-radius: 0;
}
.newsletter .input-lg{border-radius: 0;}
.subscribe-btn .btn-default {
	float: right;
	background: #313131;
	border-radius: 0;
	font-size: 14px;
	padding: 13px;
}
.newsletter .text-danger {
	color: #a94442;
	position: absolute;
}
#content h3 {
   letter-spacing: 0;
line-height: 24px;
margin-bottom: 0px;
color: #696969;
font-family: "Archivo Narrow";
font-size: 20px;
text-transform: uppercase;
padding: 0 0 10px;
}
.content-top-breadcum .container {
	box-shadow: none;
}
#content h3.product-title {
	/*padding: 0 0;*/
}
.quickview-model #content ul.list-unstyled {
    border: none;
    padding: 0;
    margin-bottom: 0;
}
#content ul.list-unstyled li {
    line-height: 22px;
    padding: 4px 0;
}
.productpage-quickview ul li a {
    color: #575757;
}
.product-right h4 {
    color: #313131;
	font-family: "Archivo Narrow",sans-serif;
	font-size: 18px;
	font-weight: 600;
}
.productpage-quickview #product2 h3 {
	background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
	font-size: 14px;
	font-weight: 600;
	margin: 0 0 10px;
	padding: 0;
	text-transform: none;
	color: #333333;
}
hr {
	margin-top: 20px;
	margin-bottom: 20px;
	border: 0;
	border-top: 1px solid #eee;
}
#content.productpage h3 {
	margin-top: 0;
	color: #313131;
	font-family: "Archivo Narrow",sans-serif;
	font-size: 24px;
	font-weight: 600;
}
#product .form-group #input-quantity, .quickview-model #input-quantity {
	width: 60px;
	height: 38px;
	display: inline;
	padding: 8px;
	margin: 0 3px;
	text-align: center;
	margin-right: 10px;
	margin-top: 20px;
}
.quickview-model .btn-group.wish-comp .btn.btn-default.wishlist, .quickview-model .btn-group.wish-comp .btn.btn-default.compare {
	margin: 7px 0 7px 7px;
}
.quickview-model .product-right .btn-group .wishlist .fa, .quickview-model .product-right .btn-group .compare .fa {
    margin: 0 auto;
}

.left.product-image.thumbnails {
	overflow: visible;
}
.productpage-quickview .product-info .image {
	width: 100%;
}
.productpage-quickview .image .thumbnail {
	padding: 0;
	border: none;
	border-radius: 0;
}
body[class^="product-quick_view"] .footer-container {
	display: none;
}
.quickview-model .col-sm-6.product-right {
	padding: 20px 20px 0 0;
}
.quickview-model #button-upload222 {
	margin: 10px 0 0;
}
.product-block .product-block-inner .image .hover-image, #column-right .bx-viewport .image .hover-image, #column-left .bx-viewport .image .hover-image {
	position: absolute;
	right: 0;
	text-align: left;
	top: 0;
	transition: all 0.5s ease 0s;
	-webkit-transition: all 0.5s ease 0s;
	-moz-transition: all 0.5s ease 0s;
	-ms-transition: all 0.5s ease 0s;
	-o-transition: all 0.5s ease 0s;
	-webkit-transform: translateX(-110%);
	-moz-transform: translateX(-110%);
	-ms-transform: translateX(-110%);
	-o-transform: translateX(-110%);
	transform: translateX(-110%);
	visibility: hidden;
	text-align: center;
	left: 0;
}
.product-block .product-block-inner .image:hover .hover-image, #column-right .bx-viewport .image:hover .hover-image, #column-left .bx-viewport .image:hover .hover-image {
	opacity: 1;
	-webkit-opacity: 1;
	-moz-opacity: 1;
	-o-opacity: 1;
	overflow: hidden;
	transition: all 0.5s ease 0s;
	-webkit-transition: all 0.5s ease 0s;
	-moz-transition: all 0.5s ease 0s;
	-ms-transition: all 0.5s ease 0s;
	-o-transition: all 0.5s ease 0s;
	-webkit-transform: translate(0, 0);
	-moz-transform: translate(0, 0);
	-ms-transform: translate(0, 0);
	-o-transform: translate(0, 0);
	transform: translate(0, 0);
	visibility: visible;
}
.status_stock {
	position: absolute;
	top: 40%;
	width: 100%;
	left: 0;
	background: #fff;
	padding: 10px 0;
	font-size: 16px;
	box-shadow: 0px 0px 0px #bbb;
	text-transform: uppercase;
	font-weight: 500;
	color: #010101;
	text-align: center;
	z-index: 10;
	display: none;
}
.status_stock .wishlist_button {
	background: none;
	border: none;
	position: absolute;
	left: auto;
	right: 0;
	top: 10px;
}
.content-top-breadcum {
    display: inline-block;
    width: 100%;
    height: 24px;
}
.content-top-breadcum .row {
	padding: 0 15px;
}
.content-top-breadcum .breadcrumb {
	float: right;
	padding: 0;
}
.content-top-breadcum .page-title , #title-content h1 {
	float: left;
	font-size: 15px;
	margin: 0;
	font-weight: normal;
	display: inline-block;
	text-transform: uppercase;
	font-family: 'Istok Web', Arial, Helvetica, sans-serif;
	color: #000;
}
#title-content {
    display: none;
	width: 100%;
	float: left;
	padding: 30px 0;
}
.breadcrumb i:hover{color: #fdb913;}
.breadcrumb a {
	color: #000;
}
.breadcrumb a:hover {color: #fdb913;}
#column-left .status_stock , #column-right .status_stock {
	font-size: 9px;
	letter-spacing: 0;
	line-height: 14px;
	padding: 3px 0;
	top: 30%;
}

#column-left .status_stock .wishlist_button , #column-right .status_stock .wishlist_button{display: none;}
.contact-form-design .left {
	float: left;
	width: 28%;
	margin-right: 30px;
	background: #292929;
	padding: 34px 20px;
	color: #fff;
	position: relative;
	z-index: 9;
}
.contact-form {
	padding: 20px 30px 35px 0;
}
.breadcrumb.product-page {
    float: left;
}
.contact-form-design {
	width: 100%;
	float: left;
	background: #f5f5f5;
	margin: 0 0 50px;
}
.information-contact .panel.panel-default {
	border-radius: 0;
	box-shadow: none;
	border: none;
	margin: 0 0 30px;
}
.contact-form-design .address-detail {
	padding: 0 0 15px;
	border-bottom: none;
}
.contact-form-design .address-detail, .contact-form-design .address-detail1, .contact-form-design .telephone, .contact-form-design .fax, .contact-form-design .time {
	float: left;
	width: 100%;
	padding: 4px 0 10px;
	border-bottom: 1px solid #434343;
}
.contact-form-design .left .image {
	width: 45px;
	height: 45px;
	float: left;
	background: url("../image/megnor/cms-sprite.png") no-repeat scroll -3px -240px transparent;
	margin: 15px 10px 0 0px;
	border: 1px solid #fff;
	border-radius: 50%;
	-webkit-border-radius: 50%;
	-moz-border-radius: 50%;
	-ms-border-radius: 50%;
	-o-border-radius: 50%;
}
.contact-form-design .address-detail1 strong {
	padding: 5px 0 0 0;
	height: 28px;
	margin: 10px 0;
	float: left;
	font-weight: 600;
}
.contact-form-design .address-detail1 address {
	margin: -15px 0 20px 55px;
}
.contact-form-design .left .btn.btn-info {
	float: left;
	clear: both;
	display: block;
	padding: 25px 0 0;
	width: 100%;
	text-align: left;
	background: transparent;
	border: none;
	border-top: 1px solid #434343;
	font-weight: 600;
	font-size: 14px;
	text-transform: capitalize;
}
.contact-form-design .left .fa.fa-map-marker {
	font-size: 32px;
	width: 45px;
	height: 45px;
	float: left;
	margin: -10px 10px 0px -1px;
	border: 1px solid #fff;
	border-radius: 50%;
	-webkit-border-radius: 50%;
	-moz-border-radius: 50%;
	-ms-border-radius: 50%;
	-o-border-radius: 50%;
	line-height: 43px;
	text-align: center;
}
.contact-form-design .left .telephone .image {
	width: 45px;
	height: 45px;
	float: left;
	background: url("../image/megnor/cms-sprite.png") no-repeat scroll -4px -368px transparent;
	margin: 10px 10px 0 0px;
	border: 1px solid #fff;
	border-radius: 50%;
	-webkit-border-radius: 50%;
	-moz-border-radius: 50%;
	-ms-border-radius: 50%;
	-o-border-radius: 50%;
}
.contact-form-design .telephone strong {
	padding: 0;
	margin: 10px 0 0;
	height: 28px;
	float: left;
	font-weight: 600;
}
.contact-form-design address {
	display: inline-block;
	margin: -15px 0 6px 55px;
	float: left;
	clear: both;
	width: auto;
}
.contact-form-design .left .fax .image {
	width: 45px;
	height: 45px;
	float: left;
	background: url("../image/megnor/cms-sprite.png") no-repeat scroll -4px -302px transparent;
	margin: 10px 10px 0 0px;
	border: 1px solid #fff;
	border-radius: 50%;
	-webkit-border-radius: 50%;
	-moz-border-radius: 50%;
	-ms-border-radius: 50%;
	-o-border-radius: 50%;
}
.contact-form-design .fax strong {
	padding: 0;
	margin: 10px 0 0;
	height: 28px;
	float: left;
	font-weight: 600;
}
.contact-form-design .left .time .image {
	width: 45px;
	height: 45px;
	float: left;
	background: url("../image/megnor/cms-sprite.png") no-repeat scroll -3px -433px transparent;
	margin: 10px 10px 0 0px;
	border: 1px solid #fff;
	border-radius: 50%;
	-webkit-border-radius: 50%;
	-moz-border-radius: 50%;
	-ms-border-radius: 50%;
	-o-border-radius: 50%;
}
.contact-form-design .time strong {
	padding: 0;
	margin: 10px 0 0;
	height: 28px;
	float: left;
	font-weight: 600;
}
.contact-form-design .left .comment .image {
	width: 45px;
	height: 45px;
	float: left;
	background: url("../image/megnor/cms-sprite.png") no-repeat scroll -3px -498px transparent;
	margin: 10px 10px 0 0px;
	border: 1px solid #fff;
	border-radius: 50%;
	-webkit-border-radius: 50%;
	-moz-border-radius: 50%;
	-ms-border-radius: 50%;
	-o-border-radius: 50%;
}
.contact-form-design .comment strong {
	padding: 0;
	margin: 10px 0 0;
	height: 28px;
	float: left;
	font-weight: 600;
}
.contact-form .buttons {
	margin: 0 0 0;
	display: inline-block;
	width: 100%;
	position: absolute;
	right: 0;
	background: #f5f5f5;
	padding: 0 30px;
}
.btn.btn-primary.captcha-btn {
	position: absolute;
	right: 30px;
	bottom: -20px;
}
.contact-form fieldset > fieldset legend {
	display: none;
}
.common-home .content-top-breadcum{display: none;}
#cart .table-striped > tbody > tr:nth-of-type(2n+1){background-color: transparent;}
.serch-txt {
	font-weight: 600;
	font-size: 20px;
	line-height: 40px;
	margin: 0 0 30px;
}
.newsletter .form-group {
	margin: 0;
}
.input-group-btn .btn.btn-default {
	padding: 7px 12px;
}
.all-blog .blog-left-content {
    float: left;
    text-align: center;
    position: relative;
    margin-bottom: 20px;
    margin-right: auto;
    width: 30%;
    overflow: hidden;
}
@media (max-width: 979px){
    .all-blog .blog-left-content {
        width: 100%;
    }
}
.all-blog .panel .blog-left-content .blog-image img {
    -webkit-filter: grayscale(50%);
    -o-filter: grayscale(50%);
    filter: grayscale(50%);
}
.blog-left-content:hover .post-image-hover {
    background: rgba(0, 0, 0, 0.4) none repeat scroll 0 0;
    transition: all 0.5s ease-out 0s;
    bottom: 0;
}
.post-image-hover {
	height: 100%;
	position: absolute;
	bottom: 0;
	transition: all 0.3s ease-out 0s;
	-webkit-transition: all 0.3s ease-out 0s;
	-moz-transition: all 0.3s ease-out 0s;
	-ms-transition: all 0.3s ease-out 0s;
	-o-transition: all 0.3s ease-out 0s;
	width: 100%;
	top: auto;
}
.product-thumb .image.outstock {
	-webkit-filter: grayscale(100%);
	filter: grayscale(100%);
	opacity: 0.7;
}
.product-right .desc {
	min-width: 180px;
	width: 180px;
	float: left;
}
.blog-right {
	width: 100%;
	float: left;
	position: relative;
	z-index: 9;
	padding: 0 20px;
}
.quickview-model .product-rightinfo {
	border-top: 1px solid #e4e4e4;
}
.quickview-model #content ul.list-unstyled li.price-tax{padding: 0 0 15px;}
.checkout-cart .alert-danger{position: relative;}
#content .product-carousel .product-block .img-border,
#content .box-product .product-block .img-border , .product-layout.product-grid .product-block .img-border{ 
	border-right: 1px solid #e4e4e4;
	width: 100%;
	float: left;
	padding: 10px;
}
#content .box-product .slider-item.last_item_tm .product-block .img-border ,
.product-layout.product-grid .product-block:last-child .img-border{border-right: none;}
#content .box-product .product-items:last-child .product-block .img-border {
	border: none;
}
body[class^="product-quick_view"] .copyright-container.container {
	display: none;
}
#cart .dropdown-menu li:first-child {
	max-height: 300px;
	overflow-y: auto;
	overflow-x: hidden;
}

@media (max-width: 1200px) {
.product-thumb .button-group button, .product-thumb .button-group button + button {
	width: 33.33%;
}
}
@media (max-width: 767px) {
.product-thumb .button-group button, .product-thumb .button-group button + button {
	width: 33.33%;
}
}
.thumbnails {
	overflow: hidden;
	clear: both;
	list-style: none;
	padding: 0;
	margin: 0;
}
.thumbnails > li {	
}
.thumbnails {	
}
.thumbnails > img {
	width: 100%;
}
.image-additional a {
	margin-bottom:0px;
	padding: 5px;
	display: block;
	border: 1px solid #e4e4e4;
}
.image-additional {
}
.thumbnails .image-additional {
	float: left;
}

 @media (min-width: 1200px) {
    
	#content .col-lg-2:nth-child(6n+1),
	#content .col-lg-2:nth-child(6n+1),
	#content .col-lg-3:nth-child(4n+1),
	#content .col-lg-4:nth-child(3n+1),
	#content .col-lg-6:nth-child(2n+1) {
		clear:left;
	}
}

@media (min-width: 992px) and (max-width: 1199px) {
	#content .col-md-2:nth-child(6n+1),
	#content .col-md-2:nth-child(6n+1),
	#content .col-md-3:nth-child(4n+1),
	#content .col-md-4:nth-child(3n+1),
	#content .col-md-6:nth-child(2n+1) {
		clear:left;
	}
}
@media (min-width: 768px) and (max-width: 991px) {
	#content .col-sm-2:nth-child(6n+1),
	#content .col-sm-2:nth-child(6n+1),
	#content .col-sm-3:nth-child(4n+1),
	#content .col-sm-4:nth-child(3n+1),
	#content .col-sm-6:nth-child(2n+1) {
		clear:left;
	}
}
@media (max-width: 414px) {
	#content .col-sm-2:nth-child(6n+1),
	#content .col-sm-2:nth-child(6n+1),
	#content .col-sm-3:nth-child(4n+1),
	#content .col-sm-4:nth-child(3n+1),
	#content .col-sm-6:nth-child(2n+1) {
		clear:left;
	}
}

#input-captcha, #input-payment-captcha {
    margin-bottom: 10px;
}



/* Megnor www.templatemela.com - Start */

/* box */  
.box {
	margin-bottom:12px;clear: both;
}
.box .box-heading , .side-box-heading{
	color: #1b1b1b;
	font-size: 16px;
	font-weight: 600;
	margin: 0;
	padding: 10px 15px;
	font-family: "Archivo Narrow",sans-serif;
	border-left: 5px solid #fdb913;
	background: #efefef;
	text-transform: uppercase;
	cursor: pointer;
}
.box .box-content {
	 background: none repeat scroll 0 0 #ffffff;
    border-bottom: 1px solid #e4e4e4;
    border-left: 1px solid #e4e4e4;
    border-radius: 0;
	-webkit-border-radius: 0px;
	-moz-border-radius: 0px;
	-khtml-border-radius: 0px;
    border-right: 1px solid #e4e4e4;
    padding: 10px 0 10px 10px;
	 
}
.sidebar-category  .box-content {background-color:#efefef; border:none;min-height: 456px;}

#content .box .box-heading,.box-heading.side-box-heading {
	background: #fff;
    border-bottom: 1px solid #e4e4e4;
    border-left: medium none;
    color: #313131;
    font-family: "Archivo Narrow",sans-serif;
    font-size:20px;
    padding:25px 0 15px;
    text-transform: uppercase;
}
#content .box .box-content {
	background: none;
	-webkit-border-radius: 0px;
	-moz-border-radius: 0px;
	-khtml-border-radius: 0px;
	border-radius: 0px;
	border:none;
	padding:10px 0;
 
}

.box .box-content ul , #content .content ul { 
	padding:0px;
	margin:0px;
	list-style:none;
}
.box .box-content ul li , #content .content ul li {
	 line-height: 20px;
    padding: 0;
}

.box .box-content ul li a + a , .box .box-content ul li a + a:hover{ background:none; padding-left:0; }
.box .box-content ul li a:hover , #content .content ul li a:hover{
}
.swiper-viewport{box-shadow: none !important;border-radius: 0 !important;margin: 0 0 25px !important;float: left;}

#testimonialblock {
	margin: 0 0 25px;
}
#column-left #testimonialblock .customNavigation{display: block;}
#testimonialblock .customNavigation a {
    top: -35px;background: transparent;
}
#testimonialblock .customNavigation a.prev:hover, #testimonialblock .customNavigation a.next:hover {
	color: #000;
	background: transparent;
}
#testimonial-block {
	border: 1px solid #e4e4e4;
	border-top: none;
	padding: 20px 30px;
}
#testimonialblock .image-block {
	float: left;
	position: relative;
	margin-bottom: 20px;
}
#testimonialblock .image-block img {
	border-radius: 50%;
}
.testi-image {
	width: auto;
	float: left;
}
.testi-name {
	color: #fdb913;
}
.box-right {
	float: left;
	padding: 22px 0px 22px 20px;
	position: relative;
}
.testi-country {
	font-size: 12px;
	font-style: italic;
}
.box-content p {
	font-size: 14px;
	font-weight: normal;
	margin: 4px 0 0 0;
	font-style: italic;
	color: #7c7c7c;
}

/* Product Grid Start */
/*.product-grid-list { }*/
#content .box-product/*,
.product-grid-list ul*/{ 
	list-style-type: none;
	position:relative;
	width: 100%;
	padding:0px;
	margin:0px;
	list-style: none;
	overflow: hidden;
}

/*.product-grid-list ul li,*/
#content .box-product .product-items { 
	margin-bottom: 14px;
	padding: 0;
	margin:0;
	position:relative;
	overflow: hidden;
}

.product-grid li,
#content .box-product .product-items,
#content .product-carousel .slider-item {
	width: 240px;
	float:left;
	display: inline-block;
}
 
.ie7 .product-grid li{ width:192px !important; }
#content .image-additional .slider-item{	
	display: inline-block;
    float: left;
}


.product-block-inner {position: relative;}

.grid_default_width { width:250px;}
.featured_default_width{ width:220px;}
.module_default_width{ width:210px;}
.latest_default_width{ width:220px;}
.special_default_width{ width:220px;}
.related_default_width{ width:220px;}
.bestseller_default_width{ width:220px;}
.additional_default_width{ width:120px;}
.testimonial_default_width{width:350px;}
.banners-slider-carousel .product-block-inner{text-align:center;}

#content .product-carousel .product-block,
#content .box-product .product-block{ 
	background: none repeat scroll 0 0 #ffffff;
	/*margin:0;*/
	clear: both;
	/*padding:0 5px;*/
	overflow: hidden;
}

.product-layout.product-grid .product-block{}
.product-layout.product-grid.last-item {border-right:0 none;}
.product-layout.product-grid .product-block-inner{padding:0px;border-right: 1px solid #e4e4e4;width: 100%;float: left;padding: 10px;}
.product-layout.product-grid {/*border-right:1px solid #e4e4e4;*/margin:10px 0;padding: 0;}
.product-listgrid .product-grid:last-child {border-right:0 none;}
.product-layout.product-grid.last-item .product-block-inner {
	border: none;
}
.product-layout.product-list .product-block {
	border-top: 1px solid #e4e4e4;
	margin-bottom: 30px;
	border-bottom: 1px solid #e4e4e4;
}
#content .banners-slider-carousel .product-carousel .product-block{border-right:0 none; margin:0;padding:0;}


#content .box-product .last_item_tm .product-block{border-right:0 none;}
#content .product-carousel .product-block:hover,
#content .box-product .product-block:hover {
  
	overflow:hidden;
	clear:both;
}
#content .product-carousel .product-block:hover h4 a, #content .box-product .product-block:hover h4 a ,#content .product-layout .product-block:hover h4 a{ color:#fdb913;}
.ie7 #content .product-carousel .product-block,
/*.ie7 #content .product-grid-list .product-block,*/
.ie7 #content .box-product .product-block {border:1px solid #e4e4e4;}

.ie7 #content .product-carousel .product-block:hover,
/*.ie7 #content .product-grid-list .product-block:hover,*/
.ie7 #content .box-product .product-block:hover {border:1px solid #e4e4e4;}


.product-grid .product-thumb .desc,.product-grid .product-thumb .price-tax,.product-carousel .product-thumb .price-tax ,.box-product .product-thumb .price-tax{display:none;}
.product-list .product-details{overflow:hidden;}
.product-list .product-thumb .caption a { }
#content .product-carousel .product-block-inner,
#content .box-product .product-block-inner{ /*padding:10px;*/ overflow:hidden; position:relative; margin:0;}
body[class^="product-quick_view"] .nav-header .container {display: none;}

.banners-slider-carousel {
    margin-bottom:0px;
    position: relative;
    width: 100%;
    float: left;
	margin: 0 0 40px;
}

.sale {
	background: url("../image/megnor/sale.png") no-repeat scroll 0 0 transparent;
	font-size: 0;
	height: 64px;
	opacity: 0;
	-khtml-opacity: 0;
	-webkit-opacity: 0;
	-moz-opacity: 0;
	position: absolute;
	right: -30px;
	top: 0px;
	width: 24px;
	transition: all 0.4s ease;
	-webkit-transition: all 0.4s ease;
	-moz-transition: all 0.4s ease;
	-ms-transition: all 0.4s ease;
	-o-transition: all 0.4s ease;
}

#content .box-product .product-block .sale,#content .product-list .product-thumb .sale , #content .product-grid .product-thumb .sale{
	opacity: 1;
	-khtml-opacity: 1;
	-webkit-opacity:1;
	-moz-opacity:1;
	right: 0px;
	transition: all 0.4s ease;
	-webkit-transition: all 0.4s ease;
	-moz-transition: all 0.4s ease;
	-ms-transition: all 0.4s ease;
	-o-transition: all 0.4s ease;
}
#content .box-product.productbox-grid .product-block .sale {top: 0;}
#content .box-product.productbox-grid .product-block:hover .sale{right: 0;	}
#content .product-grid .product-thumb:hover .sale{right: 0;top: 0;}	
/* box products for Left Column and Right Column */
#column-left .box-product,
#column-right .box-product {
	width: 100%;
	overflow: hidden;
}
#column-left .box-product > div,
#column-right .box-product > div  {
	display:block;
	vertical-align: top;
	margin-right:0px;
	margin-bottom:15px;	
	width:100%;
}

#column-left .box .box-content div.product-items:last-child > div, #column-right .box .box-content div.product-items:last-child > div,
#column-left .box .box-content div.slider-item:last-child > div, #column-right .box .box-content div.slider-item:last-child > div {
    border: 0 none;
}
#column-left .product-thumb h4 a:hover{color:#fdb913;}
#column-left .box-product .image,
#column-right .box-product .image {
	display: block;
	margin-bottom: 0px;
	float:left;
	margin-right:10px;
	border:1px solid #e4e4e4;padding:0;
}
#column-left .product-items .product-details,
#column-right .product-items .product-details{
	float:left;
	width:65%; /* specify width as per your requirement */
	
}
#column-left .product-thumb .caption,
#column-right .product-thumb .caption{
	padding:0;overflow: hidden;
}
#column-left .box-product .price, #column-right .box-product .price {
    color: #313131;
    font-size: 16px;
    font-weight: 600;
}
#column-left .product-thumb .price-new,#column-right .product-thumb .price-new {
    color: #313131;
    font-weight: 600;
	margin-right:0px;
}
#column-left .product-thumb .price-old,#column-right .product-thumb .price-old{font-size:16px;}
#column-left .box-product .product-thumb h4, #column-right .box-product .product-thumb h4 {font-weight:normal; font-size:14px; margin: 0px;}
#column-left .box-product .name,
#column-right .box-product .name {
	display: block;
}
#column-left .box-product .cart,
#column-right .box-product .cart {
	display: block;
}
#column-left .box-product .cart .button,
#column-right .box-product .cart .button{
	padding:0; 
	background:none;
	box-shadow:none; 
	-webkit-box-shadow: none;
	-moz-box-shadow:none;
	height:auto;
	font-weight:normal;
	border-radius:0;
	-webkit-border-radius: 0px;
	-moz-border-radius: 0px;
	-khtml-border-radius: 0px;
	color:#555;
	display:block;
	text-align:left;
}
#column-left .box-product .cart .button:hover,
#column-right .box-product .cart .button:hover {text-decoration:underline;}
#column-left .box-product .image img,
#column-right .box-product .image img { }

#column-left .box-product .rating,
#column-right .box-product .rating,
#column-left .box-product .name,
#column-right .box-product .name,
#column-left .box-product .price,
#column-right .box-product .price,
#column-left .box-product .cart,
#column-right .box-product .cart {margin-bottom:4px; }

#column-left .box .box-content, #column-right .box .box-content,
#column-left .box .filterbox, #column-right .box .filterbox
{margin-bottom:25px;}

#column-left .box-product .rating,
#column-right .box-product .rating {
	display: block;
	margin-bottom:4px;
}
#column-left .product-thumb, #column-right .product-thumb {
    margin-bottom: 5px;
}
#column-left .sale, #column-left .price-tax, #column-left .wishlist , #column-left .compare,
#column-right .sale, #column-right .price-tax, #column-right .wishlist , #column-right .compare {display:none !important;}
#column-left .product-thumb .button-group button, #column-right .product-thumb .button-group button  {   
	background: none repeat scroll 0 0 transparent;
    padding: 0;
    width: auto;
	line-height: 28px;
}	
#column-left .product-thumb .button-group button, #column-right .product-thumb .button-group button {
    background: none repeat scroll 0 0 transparent;
    font-size: 14px;
    line-height: 20px;
    padding: 0;
    width: auto;
	height:auto;
	text-transform:uppercase;
	text-align:left;
	margin-right:0;
}
#column-left .product-thumb .button-group button:hover, #column-right .product-thumb .button-group button:hover{}
#column-left .product-block .button-group,#column-right .product-block .button-group{display: none;}
.top_button {
	background: url("../image/megnor/top_arrow.png") no-repeat scroll 0 0 transparent;
	height: 34px;
	width:34px;
	right: 14px;
	bottom: 11px;
	display: none;
	position: fixed;
	z-index: 95;
	font-size:0;
   
}


.manufacturer-list {
    border: 1px solid #dbdee1;
    margin-bottom: 20px;
    padding: 5px;
}
.manufacturer-heading {
    background: none repeat scroll 0 0 #f8f8f8;
    font-size: 15px;
    font-weight: bold;
    margin-bottom: 6px;
    padding: 5px 8px;
}
.manufacturer-content {
    padding: 8px;
}
.manufacturer-list ul {
    float: left;
    list-style: outside none none;
    margin: 0 0 10px;
    padding: 0;
    width: 25%;
}

.category_filter .sort .form-control {cursor:pointer;}
.productpage .box {margin-top:20px;}
.tab-content {
   
    padding: 10px;
	overflow:auto;
}
.col-sm-4.total_amount { margin-top: 70px;}
.product-tag{margin:5px 0;}
#content .aboutus {
    clear: both;margin: 0 0 15px;
}
.aboutus .content{margin-bottom:15px;overflow:hidden;}
.image1 {
    background: url("../image/megnor/cms-sprite.png") no-repeat scroll 7px -165px;
    float: left;
    height: 50px;
    width: 60px;
}

.image2 {
    background: url("../image/megnor/cms-sprite.png") no-repeat scroll 7px -116px;
    float: left;
    height: 50px;
    width: 60px;
}

.image3 {
    background: url("../image/megnor/cms-sprite.png") no-repeat scroll 7px -52px;
    float: left;
    height: 50px;
    width: 60px;
}
.image4 {
    background: url("../image/megnor/cms-sprite.png") no-repeat scroll 7px 6px;
    float: left;
    height: 50px;
    width: 60px;
}
.aboutus h2{clear:both;font-size:20px;}
.about-content{overflow:hidden;}
.information-information .right{float:right;}


.category_filter .btn-list-grid .btn-group .grid:hover, .category_filter .btn-list-grid .btn-group .grid.active{
background: url("../image/megnor/sprite.png") no-repeat scroll 0 -138px transparent;
}
.category_filter .btn-list-grid .btn-group .list{
 background: url("../image/megnor/sprite.png") no-repeat scroll -35px -173px transparent;
    border: medium none;
   box-shadow:none; 
	-webkit-box-shadow: none;
	-moz-box-shadow:none;
    display: block;
    float: left;
    height: 27px;
    text-decoration: none;
    text-indent: -9999px;
    width: 27px;

}

.category_filter .btn-list-grid .btn-group .list:hover, .category_filter .btn-list-grid .btn-group .list.active{

 background: url("../image/megnor/sprite.png") no-repeat scroll -35px -138px transparent;
}

.category_filter .btn-list-grid .btn-group .grid{

 background: url("../image/megnor/sprite.png") no-repeat scroll 0 -173px transparent;
    border: medium none;
    box-shadow:none; 
	-webkit-box-shadow: none;
	-moz-box-shadow:none;
    display: block;
    float: left;
    height: 27px;
    text-decoration: none;
    text-indent: -9999px;
    width: 31px;

}

.category_filter .btn-list-grid {float: left;  margin: 2px 0 0; padding: 0; width: auto;}
.compare-total {float: left; margin:4px 0 0 15px;}
.pagination-right { float: right;margin:0; width: auto;}
.category_filter .sort-by {float: left;margin:5px 10px 0 0; width: auto;padding:0;}
.category_filter .sort-by label,.category_filter .show label{font-weight:normal;font-size:14px;}
.category_filter .show { float: left;
    margin: 5px 5px 0 0px;
    padding: 0;}
.sort-by-wrapper {
    margin-right: 10px;
}
.category_filter .sort {  float: left;
    height: 24px;
    margin: 1px 0 0;
    padding: 0;
    width: 180px;}
.category_filter .limit { float: right;
    height: 24px;
    margin: 1px 0 0;
    padding: 0;
    width: 80px;}
.sort-by-wrapper,.show-wrapper{
    float: left;
}
.category_filter .form-control {
    padding: 3px 7px !important;
}

.category_thumb .category_img, .category_thumb .category_description {
    float: left;
    width: 100%;
}

.refine-search ul{padding:0;}
.refine-search ul li{list-style:none;}
#content .category_list ul li a {
	border: 1px solid #e4e4e4;
	display: block;
	padding: 5px 8px;
}
.category_list li a:hover {

}
#content .category_list li {
    float: left;
    margin: 0 7px 7px 0;
    overflow: auto;
    padding: 0;
    position: relative;
}
.category_filter {
    border-radius: 0;
	color: #666666;
	display: inline-block;
	margin-bottom: 10px;
	width: 100%;
}

.pagination-wrapper{clear: both; float: left;  margin: 8px 0 0;  width: 100%;}
.pagination-wrapper .page-link {
    float: right;
    padding: 0;
    width: auto;
}
.pagination-wrapper .page-result
 {
    float: left;
    padding: 0;
    width: auto;
	margin: 2px 0 0;
}
/* Product Page*/

.productpage .product-left{ width: 43%;}
.productpage .product-right{
    padding: 0 15px 0 10px;
    width: 57%;
}
.product-info .image {
	 display: block;
    margin-bottom: 15px;
    text-align: center;
}
#tabs_info.product-tab.col-sm-12 {
  padding-top: 50px;
}
.productpage h3 {margin-top:0;}
.product-info .zoomContainer{ z-index:9; } /* It need for ie7 */
.product-info .additional-carousel{ position:relative;}
.product-info .image-additional {
	clear: both;
	float: none;
	margin: 0 auto;
	overflow: hidden;
	padding-left: 25px;
	padding-right: 25px;
	width: 376px;
}
.product-info .image-additional img {
	display: block;
    height: auto;
    margin-left: auto;
    margin-right: auto;
    max-width: 100%;
    position: relative;}
.product-info .image-additional a {
	display: block;	
}

.product-right .btn-group .wishlist .fa,.product-right .btn-group .compare .fa{margin-right:5px;}

#content .image-additional .slider-item .product-block{	
	background: none repeat scroll 0 0 #ffffff;
	clear: both;
	margin: 4px 3px;
	overflow: hidden;
	padding:0;
	border-right:0 none;
}

#content .image-additional .slider-item .product-block:hover {   box-shadow: none !important; -webkit-box-shadow: none !important; -moz-box-shadow: none !important; }	

.product-info .product-image .additional-carousel:hover .customNavigation span.prev, .product-info .product-image .additional-carousel:hover .customNavigation span.next {
    display: block;
}
#product #button-upload222.btn-default, #content.return .input-group.date .btn-default {
	padding: 10px 12px;
}
#content ul.list-unstyled {  
    line-height: 22px;
    margin-bottom: 0;
    padding: 5px 0;
}
#content ul.list-unstyled li {
    color: #696969;
    line-height: 22px;
    padding: 2px 6px 2px 0;
}
#content ul.list-unstyled.price li {
    display: inline-block;
}

#content ul.list-unstyled li span.price-old {
    color: #acacac;
	text-decoration: line-through;
	margin-right: 3px;
	font-size: 18px;
	font-weight: 600;
	font-family: "Archivo Narrow",sans-serif;
}

#content ul.list-unstyled li span.special-price{
  color: #313131;
    font-family: "Ubuntu",sans-serif;
    font-weight: 500;
    margin-bottom: 0;

}
#content .list-unstyled.price li.price-tax {
    color: #acacac;
    display: inline-block;
    font-size: 12px;
}
#content ul.list-unstyled.price li.points, #content ul.list-unstyled.price li.discount {
    display: block;
	font-size: 14px;
	font-weight: 400;
	padding: 0;
	font-family: "Istok Web",sans-serif;
	letter-spacing: 0;
}

#product h3.product-option {
    padding-top: 10px;
}
#content ul.list-unstyled.price {
	border-bottom: 1px solid #e4e4e4;
}

#product .form-group.cart {
   /* border-bottom: 1px solid #e4e4e4;*/
   /* border-top: 1px solid #e4e4e4;*/
    margin-bottom: 10px;
   /* padding: 10px 9px;*/
}

#product .form-group.cart .form-control {
    display: inline-block;
    text-align: center;
   width: auto;
}
#product #input-quantity{padding:6px 10px;}

#product .btn-group .wishlist, #product .btn-group .compare {
    background: none repeat scroll 0 0 transparent;
    border: medium none;
    display: block !important;
    padding: 0;
	text-transform:none;
	color:#000;
	margin: 15px 15px 0 0;
}
#product .btn-group .wishlist:hover, #product .btn-group .compare:hover {
    color: #fdb913 !important;
}
#product .cart span {
    color: #999999;
}
#product .alert {
    margin-bottom: 10px;
}
.productpage .rating-star {
    border-bottom: 1px solid #e4e4e4;
    padding: 0 0 10px;
}

.productpage .rating-wrapper .addthis_toolbox.addthis_default_style {
    padding: 15px 0 10px;
}
#content.productpage .list-unstyled.price li h2 {
    margin-bottom: 0;
}
.button.aboutus{float:right;}

/* Contact us PAge*/


.row.contact-info {
    padding: 0 15px;
}
.information-contact .panel-body{padding:0;}
.contact-info{color:#666;}
.contact-info .address-detail strong {
    background: url("../image/megnor/cms-sprite.png") no-repeat scroll -6px -235px transparent;
   	padding: 5px 0 0 35px;
	height:28px;
	margin:10px 0;
	float:left;
	clear:both;
}
.contact-info .address-detail,.contact-info .telephone,.contact-info .fax{float:left;width:100%;}
.contact-info .telephone strong{
    background: url("../image/megnor/cms-sprite.png") no-repeat scroll -5px -314px transparent;
    padding: 5px 0 0 35px;
	margin:10px 0;
	height:28px;
	float:left;
	clear:both;
}
.contact-info .fax strong{
    background: url("../image/megnor/cms-sprite.png") no-repeat scroll -5px -272px transparent;
    padding: 5px 0 0 35px;
	height:28px;
	margin:10px 0;
	float:left;
	clear:both;
}
.contact-info address {
    display: inline-block;
    margin: 0 0 0 36px;
	float:left;
	clear:both;
}
#spinner {
	position: absolute;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9;
	background: url("../image/megnor/ajax-loader.gif") 50% 50% no-repeat #fff;
}
.main-slider {
    position: relative;
}
.main-slider .swiper-pager {
  display: none;
}
.main-slider .swiper-pagination {
  bottom: 10px;
}
.main-slider .swiper-viewport {
  border: medium none;
  box-shadow: none;
  margin-bottom: 0 !important;
}
.main-slider .swiper-slide.text-center {
    margin-right: 0 !important;
}
.information-sitemap .sitge-map ul{padding:0 0 0 20px;}
.forget-password {margin: 5px 0 0;}
.product-compare .btn-primary{margin:5px 0 5px;}
.productpage .write-review,.productpage .review-count{margin: 0 10px;}
.productpage .rating-wrapper , .quickview-model .rating{ 
	padding: 0 0 10px;
	border-bottom: 1px solid #e4e4e4;
	margin: 0 0 10px;
}
.checkout-cart .hasCustomSelect{width: 95% !important;}

.page-title{}
.page-title,.product-title,.product-option ,.aboutus h1 ,.affiliate-success h1{
	 font-family: "Archivo Narrow",sans-serif;
    font-size: 18px;
    font-weight: normal;
    margin-bottom: 15px;
    margin-top: 0;
    text-shadow: 0 0 1px rgba(0, 0, 0, 0.01);
    text-transform: uppercase;
}
.affiliate-account h2{font-size:16px;}
.affiliate-account .btn-primary .list-group-item,.affiliate-account .btn-primary .list-group-item:hover{padding:0; background:none; color:#fff;}
#content .affiliate-logout {}

.shopping-cart .img-thumbnail{max-width:none;}
#accordion label.col-sm-2.control-label{margin:7px 0 0; padding:0 15px 0 0;width:20%;}
#accordion #collapse-shipping label.col-sm-2.control-label{padding:0 15px;}
.checkout-cart .input-group-btn:last-child > .btn, .checkout-cart .input-group-btn:last-child > .btn-group{margin-left:5px; font-size:14px;}

.col-sm-3.search_subcategory {width: auto; margin-top:7px;}

#button-search{float:right;}
.product-search h2{clear:both;}

.checkout-cart .input-group.btn-block .form-control {
    padding: 6px 5px;
    text-align: center;
    width: 40px;height: 40px;
}
.table.table-bordered .input-group-btn {
    float: left;
}

#accordion .panel-title > a {
    color: inherit;
    display: inline-block;
    width: 100%;	
}
#accordion .panel-title{ padding: 10px;}
#accordion .panel-heading .fa.fa-caret-down {float: right; margin-top:3px;}
#accordion .col-sm-10 {width: 75%;}
#accordion .form-horizontal .control-label {text-align:left;}

#content .well h2 {
    font-family: "Istok Web",sans-serif;
    font-size: 14px;
    font-weight: 700;
    text-transform: uppercase;
}

#collapse-checkout-option .panel-body h2, #collapse-checkout-option .form-group label,.account-account #content h2 ,.account-download h2,.account-address h2,.affiliate-account h2{
    color: #696969;
    font-family: "Istok Web",sans-serif;
    font-size: 14px;
    font-weight: 700;
    margin: 5px 0;
    text-transform: capitalize;
}
.product-search h2
{
	font-family: "Archivo Narrow",sans-serif;
    font-size:16px;
    font-weight: normal;
    margin-bottom: 15px;
    margin-top: 0;
    text-shadow: 0 0 1px rgba(0, 0, 0, 0.01);
    text-transform: uppercase;
}

.form-horizontal .control-label { width: 20%;}
.form-horizontal .col-sm-10 { width: 80%;}
.account-address .table-hover > tbody > tr > td {vertical-align: middle;}
#input-country, #input-zone {padding: 13px 0;}
.checkout-cart .hasCustomSelect {  width: 95% !important;}
#accordion .panel-body { padding: 15px 10px;}
#collapse-payment-address label{margin:5px 0;}
.checkout-checkout #accordion label.col-sm-2.control-label{padding:0 15px;}
.row.site-map { margin: 0;  padding: 10px 0;}
.account-wishlist .btn-primary,.account-wishlist .btn-danger {
    margin-bottom: 2px;
}
.account-wishlist .table-bordered .btn.btn-danger {}
.slider-item.first_item_tm{margin-right:0;}
#tab-review .form-horizontal .control-label {  font-weight: bold; width: auto;}
.productpage .prod-desc { margin-top:30px;}
.product-search .search-checkbox { margin: 10px 0 0;}
.product-search .subcategory { width: auto;}
.product-search .sortcat { width: 35%;}
.bootstrap-datetimepicker-widget td.active, .bootstrap-datetimepicker-widget td.active:hover ,.bootstrap-datetimepicker-widget td span.active {
    background-color: #fdb913 !important;
    color: #ffffff !important;
}
.bootstrap-datetimepicker-widget td.day:hover, .bootstrap-datetimepicker-widget td.hour:hover, .bootstrap-datetimepicker-widget td.minute:hover, .bootstrap-datetimepicker-widget td.second:hover,.bootstrap-datetimepicker-widget td span:hover  {
    background-color: #313131 !important;
    color: #ffffff !important;
}
.account-transaction table td.text-right, .affiliate-transaction table td.text-right {
    border-right: 1px solid #e4e4e4;
}
.account-wishlist .text-center img {
    border: 1px solid #e4e4e4;
}
.product-compare .table-bordered tbody tr td + td {
    border-left: 1px solid #e4e4e4;
    text-align: center;
}
.product-compare .table-bordered tr td:first-child {
    font-weight: bold;
    text-align: right;
}
.product-compare .table-bordered thead tr td:first-child {
    background-color: #f7f7f7;
    text-align: left;
}


@media (max-width: 1350px) {
	.container {width: 1170px !important;}
	.single-banner {width: 48.5%;}
	.bottom-banner .single-banner {width: 48.5%;}
	#banner1.single-banner {float: left;width: 100%;margin: 0 auto;}
	#column-left #banner0.single-banner {float: left;width: 100%;}
	.newsletter .input-news {width: 74.1%;}
	.blog-right h4 {font-size: 15px;}
	.tabbestseller_default_width{ width:200px;}
	.tablatest_default_width{ width:200px;}
	.tabspecial_default_width{ width:200px;}
	.featured_default_width{ width:200px;}
	.latest_default_width{ width:200px;}
	.special_default_width{ width:200px;}
	.related_default_width{ width:200px;}
	.bestseller_default_width{ width:200px;}

}
@media (max-width: 1250px) {
.product-info .image-additional { width: 100%;}
#column-left .fa-shopping-cart:before, #column-right .fa-shopping-cart:before  {display:none;}
#column-left .hidden-xs, #column-left .hidden-sm, #column-left .hidden-md {display:block !important; text-transform: capitalize; font-weight:normal;   margin-top: -25px;}
.col-sm-4.total_amount { margin-top: 88px;}
.container {width: 1100px !important;}
.cms-banner-left{width: 27%;}
.cms-banner-right{width:73%;}
.cms-banner img{max-width:100%;}
.cms-banner .cms-banner-left .single-banner{width:100%;}
.cms-banner-right .cms-banner2.single-banner{width:56%;}
.cms-banner-right .cms-banner3.single-banner{width:37.1%;}
.box .box-content ul ul{  margin-left: 37px;}
.box .box-content ul li ul li:hover > a.activSub, .box .box-content ul li:hover > a.activSub {
	background-position:178px 1px;
	margin-right: -12px;
}
.box .box-content ul ul li ul{  margin-left:13px;}
.post-image{width:100%;height:100%;}
.main-menu.container{width:1170px;padding:0;}
.second-content .service-content{padding:0 20px 0 45px;}

.box.Blog {
	width: 100%;
	float: left;
	position: relative;
	overflow: hidden;
}
.blog-right {padding: 0 15px;}
.newsletter .input-news {width: 72.4%;}
.newsletter .box-heading {font-size: 20px;}
#footer .column {padding-left: 15px;}
#testimonial-block {
    padding: 12px 15px;
}

}

@media (max-width:1199px) {
.container {width: 900px !important;background-color: #0000000;box-shadow:none;}
.header-search{left:0;right:10px;margin:0 auto;top:40px;}
.text1{font-size:15px;}
#footer .container{padding:0}
.single-banner{width:48%;}
.cms-banner-right .cms-banner2.single-banner{ width: 55%;}
.main-menu.container{width:940px;}
.bottom-banner .single-banner {width: 48.1%;}
#footer .column{width:24%;padding-left:30px;}
.box .box-content ul ul { margin-left: -3px;}
.box .box-content ul ul li ul{ margin-left: -41px;}
.product-list .list-right{  width: 37%;}
#product .form-group.cart .btn-group { clear: both;padding: 10px 0 0 !important;}
.title1 {font-size: 18px;}
.tm-about-text { width: 76%;}
.aboutme-read-more{width:149px;}
.slider-banner .slide { width: 50%;}
#column-left .box .box-content, #column-right .box .box-content{padding:10px;}
#column-left .sidebar-category .box-content{padding:10px 0 10px 10px;}
#column-left .product-items .product-details, #column-right .product-items .product-details{width:64%;}
.cms-banner-left {  width: 26.5%;}
.cms-banner-right{width:73.5%;}
.cms-banner-right .cms-banner2.single-banner{width:55.6%;}
.footer-top-right .title1{font-size:19px;}
.header-search{width:346px;}
#footer .col-sm-3.column.fourth{width:27%;}
#footer .column { width: 24%;}
.col-sm-3.search_subcategory { padding: 0 18px;}
.box .box-content ul li ul li:hover > a.activSub, .box .box-content ul li:hover > a.activSub {background-position:140px 1px;}

#footer .column.first, #footer .column.forth {    width: 30%;}
#footer .column.third, #footer .column.second {  width: 20%;}
.myaccount .dropdown-menu {left: -60px;}
#logo {margin: 32px 0 0 0;}
.sidebar-category .box-content {min-height: 440px;}
.tabfeatured_default_width{ width:185px;}
.tabbestseller_default_width{ width:220px;}
.tablatest_default_width{ width:220px;}
.tabspecial_default_width{ width:220px;}
.featured_default_width {width: 220px;}
.owl-carousel .owl-buttons .owl-next, .owl-carousel:hover .owl-buttons .owl-next {right: 60px !important;}
.owl-carousel .owl-buttons .owl-prev, .owl-carousel:hover .owl-buttons .owl-prev {right: 100px !important;left: auto !important;}
.newsletter .input-news {width: 65.9%;}
.newsletter .box-heading {font-size: 20px;line-height: 28px;padding: 0 0 0 38px;}
.newsletter {padding: 16px 20px;}
#footer .column {padding-left: 15px;}
.box-right {padding: 0;width: 100%;}
.blog-right {padding: 15px;}
#top-links .dropdown.myaccount {float: left;}
.contact-form {
	padding: 20px 15px;
	width: 100%;
	float: left;
}
.contact-form-design .left {
float: left;
width: 100%;
margin-right: auto;
}
.btn.btn-primary.captcha-btn {
	position: relative;
	right: 0;
	bottom: 0;
}
.contact-form .buttons {position: relative;padding: 0;}


}

@media only screen and (min-width: 768px) and (max-width: 980px){
	.layout-2.left-col #column-left,.layout-2.right-col #column-right{width:25%;}
	.layout-2 #content{width:75%;}

}
@media (min-width: 1200px){
    .static-menu {
	color: #fff;
    background-color: #000;
}
}
@media (max-width: 1199px){
    .static-menu {
	color: #fff;
	
}
}
@media (max-width: 979px) {

		/* css for responsive menu */	
.container {width: 700px !important;}
.static-menu {
	
	display: block;
	color: #fff;
}

.responsive-menu .main-navigation ul {
	padding: 10px 10px 0;
	width: 100%;
	float: left;
}
#res-menu {
    display: block;
}
#menu .responsive-menu .main-navigation {
	position: absolute;
	z-index: 999;
	display: none;
	margin-top: 0px;
	width: 100%;
	list-style: none;
	border-radius: 0 0 5px 5px;
	top: 61px;
	max-height: 320px;
	overflow-y: auto;
	background: #000;
}
#static-menu {
    display: block;
}
#menu .static-menu .main-navigation {
	position: absolute;
	z-index: 999;
	display: block;
	margin-top: 0px;
	width: 100%;
	list-style: none;
	border-radius: 0 0 5px 5px;
	max-height: 320px;
	overflow-y: auto;
	background: #000;
}
.main-menu .responsive-menu .main-navigation {
	position: absolute;
	z-index: 999;
	display: block;
	margin-top: 0px;
	width: 100%;
	list-style: none;
	border-radius: 0 0 5px 5px;
	top: 61px;
	max-height: 320px;
	overflow-y: auto;
	background: #000;
}
.main-menu ul > li:hover, .hiden_menu li:hover {background-color: transparent;}
.main-menu ul > li {
	display: inline-block;
	width: 100%;
}
#nav-one li ul > li > a, .responsive-menu .main-navigation li a {
	float: left;
	min-width: 200px;
	font-size: 14px;
	font-weight: 500;
	color: #fff;
	text-transform: capitalize;
	font-family: "Raleway",verdana,Helvetica,sans-serif;
}
.main-menu ul > li {
	display: inline-block;
	width: 100%;
}
	.responsive-menu .top_level {padding-top: 10px;width: 100%;}
	.nav.navbar-nav{display:none;}
	.nav-inner {
	display: block;
	background-color: #999;
	margin-bottom: 15px;
}
	.responsive-menu .nav.navbar-nav {height:300px;overflow-y:scroll; border-top: 1px solid #787878; padding: 12px 25px;  background: #000 none repeat scroll 0 0;  position: absolute;  width: 100%;  z-index: 999;box-shadow: none;left:0;right:0;margin:0 auto;}
	#menu.responsive-menu ul li a.mobile_togglemenu { right:0;background:none;margin-top:0;float: right;    width: 33px;height:33px;}
	.responsive-menu li.toggle {  box-shadow:none;padding:0;float:left;width:100%; margin:5px 0;}
	.top_level.home.home_first {    display: none;}
	#menu.responsive-menu ul.nav li .megamenu ul.list-unstyled li > a {  float: left;}
	#menu.responsive-menu .dropdown:hover .dropdown-menu {  display: none;}
	#menu.responsive-menu .dropdown .dropdown-menu {background:none;border: medium none;  box-shadow: none;  padding: 0;  position: relative;  width: 100%; margin-left:0 !important;}
	#menu.responsive-menu ul li a:hover, #menu.responsive-menu ul.nav li .megamenu ul.list-unstyled li > a:hover {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;  color: #fdb913;}
	#menu.responsive-menu ul li a , #menu.responsive-menu ul.nav li .megamenu ul.list-unstyled li > a{  color: #ffffff;
    display: block;
    font-family: "Raleway",verdana,Helvetica,sans-serif;
    font-size: 14px;
    font-weight: 500;
    letter-spacing: 1px;
    line-height: 24px;
    padding: 5px 0;
    text-transform: capitalize;float:left;width:100%;border:none;}
	#menu.responsive-menu ul li a.mobile_togglemenu , #menu.responsive-menu ul.nav li .megamenu ul.list-unstyled li > a.mobile_togglemenu { right:0;background:none;margin-top:0;float: right;    width: 33px;height:33px;}
	#menu.responsive-menu .top_level.dropdown.toggle {  margin: 0;}
	#menu.responsive-menu ul.nav li .megamenu.column1 ul.childs_1 {  padding: 0 15px 20px; float:left;width:100%;}
	.responsive-menu ul li .mobile_togglemenu:hover {  background-color: rgba(0, 0, 0, 0);}
	#menu.responsive-menu ul.nav li .megamenu.column1 ul.list-unstyled > li.dropdown:hover > .dropdown-menu {  display: none;}
	#menu.responsive-menu ul.nav li .megamenu ul.list-unstyled > li.dropdown .dropdown-menu {width:100%;float:left;border: medium none;    left: 0;    position: relative;    top: 0;}
	#menu.responsive-menu ul.nav li .megamenu ul.list-unstyled li .dropdown-menu ul.list-unstyled li > a{  color: #fff;}
	.top_level.home {    display: none;}
	#menu.responsive-menu .toggle .mobile_togglemenu:before, #menu.responsive-menu ul.nav li .megamenu.column1 ul.list-unstyled li.toggle > a.mobile_togglemenu:before , #menu.responsive-menu ul.nav li .megamenu ul.list-unstyled li.toggle > a.mobile_togglemenu:before {   
	 color: #ffffff;
    content: "\f067";
    font-family: "FontAwesome";
    font-size: 12px;
    left: auto;
    line-height: 33px;
    position: absolute;
    right: 0;
	}
	#menu.responsive-menu .toggle.active .mobile_togglemenu:before, #menu.responsive-menu ul.nav li .megamenu.column1 ul.list-unstyled li.toggle.active > a.mobile_togglemenu:before , #menu.responsive-menu ul.nav li .megamenu ul.list-unstyled li.toggle.active > a.mobile_togglemenu:before { 
	color: #fff;
    content: "\f068";
    font-family: "FontAwesome";
    font-size: 12px;
    left: auto;
    line-height: 33px;
    position: absolute;
    right: 0;
	}
	#menu ul.nav li .megamenu.column1 ul.list-unstyled li.dropdown > a::after{content:"";}
	#menu ul.nav li .megamenu.column1 ul.list-unstyled > li.dropdown .dropdown-menu { padding: 10px 0 3px 20px;}
	#menu.responsive-menu ul.nav li .megamenu ul.childs_1 {  display: block;
    float: left;
    padding: 0;
    width: 100%;}
	#menu.responsive-menu .list-unstyled.childs_1 > li{padding:0;}
	/* end css for responsive menu */
	.navbar-nav > li.level0 {  width: 100%;}
	.dropdown.myaccount {    float: right;}
	.myaccount .dropdown-menu{left:-64px;}
	.content-top #column-left .sidebar-category{display:none;}
	.layout-2 .content-top #content{width:100%;min-height:0;padding:0 15px;}
	.layout-2 #content{width: 70%;}
	.layout-2.left-col #column-left, .layout-2.right-col #column-right{ width: 30%;}
	.box .box-content ul ul { margin-left: -12px;}
	.box .box-content ul ul li ul { margin-left: -56px;}
	.nav-inner {display: block;background-color:#999;margin-bottom:15px;}
	.main-menu.container { display: block;}
	.responsive-menu { background-color: #fdb913; height: 44px;border-radius:0;-webkit-border-radius: 0px;
	-moz-border-radius: 0px;
	-khtml-border-radius: 0px;}
	.responsive-menu .main-navigation { background: none repeat scroll 0 0 #646464;}
	#column-left .box-product .image,
	#column-right .box-product .image {margin-right:7px;padding:0;}
	#column-left .swiper-viewport {display: none;}
	.col-md-4.btn-list-grid {margin-bottom: 10px;}	
	.pagination-right {
		clear: both;
		float: left;
		margin: 5px 0;   
	}
	.product-list .product-thumb .image{border:none !important;}
	.product-compare .table-bordered{
		width:100%;
		float:left;
		overflow:auto;
		display:inline;
	}
	.testimonial_default_width {width: 100%;}
	.box-content {margin: 0 0 15px;}
	.layout-2 #content{width:100%;}
	.layout-2.left-col #column-left, .layout-2.right-col #column-right{width:100%;padding: 0 15px;}
	.layout-2.left-col #column-left .toggle .mobile_togglemenu , .layout-2.right-col #column-right .toggle .mobile_togglemenu{left:-25px;margin-top:-22px;}
	#column-left .box .box-content, #column-right .box .box-content , #column-left .list-group, #column-right .list-group{display:block;}
	#footer .col-sm-3.column {padding:0 10px 30px 30px;  width: 100%;}
	.box.sidebar-category {    display: none;}
	.slider-banner .slide { width: 25%;}
	#accordion .form-horizontal .control-label{width:100%;}
	.header-search{top:95px;right:16px;left:auto;}
	.header.container{height:150px;padding: none;}
	.content_headercms_bottom{display:none;}
	.single-banner {width: 48.2%;}
	.cms-banner-right .cms-banner2.single-banner{width: 56.7%;margin:0 05px;}
	.cms-banner-right .cms-banner3.single-banner{width:37.3%;}
	.cms-subbanner2 { margin-top: 15px;}
	#logo{margin: 40px 0 0;}

	#footer .column ,#footer .col-sm-3.column.fourth{ padding-left: 0; width: 100%;}
	.col-sm-3.column.second, .col-sm-3.column.third,#footer .col-sm-3.column.fourth {border-left:0 none;}
	.col-sm-3.column.third{border-right:0 none;}
	#footer #footer_cms_block{padding:0;margin:0 0 10px 0;color:#fff}
	.product-list .product-details{float:left;}
	.product-list .list-right{  width: 37%;  padding: 0 10px 0 20px;}
	.product-block .button-group {  opacity:1;-khtml-opacity: 1;-webkit-opacity:1;-moz-opacity:1;}
	.productpage .product-info .product-image .customNavigation span.prev,.productpage .product-info .product-image .customNavigation span.next{display:block;}
	.productpage .product-right{ width: 50%;}
	.productpage .product-left {width:50%;}
	.checkout-cart .table.table-bordered .input-group-btn {clear: both; margin: 5px 0 0; float: left;}
	#accordion label.col-sm-2.control-label{width:100%;}
	.checkout-cart .input-group-btn:last-child > .btn, .checkout-cart .input-group-btn:last-child > .btn-group { margin-left: 0 !important;margin-right: 3px !important;}
	.checkout-cart #accordion .input-group-btn:last-child > .btn, .checkout-cart #accordion .input-group-btn:last-child > .btn-group {margin-left: 3px !important;}
	#accordion .col-sm-10 {width: 100%;}
	.form-horizontal .control-label {  width: 22%;}
	.form-horizontal .col-sm-10 { width: 78%;	}
	 .product-list .product-thumb .caption{ margin: 10px 0;padding:0 10px 0 0;}
	 #footer .col-sm-3.column.first{padding:0 ; border-right: none; height: 150px; display:flex;}
	 .social,.footer-top-right { width: 100%;height:auto;}
	 .footer-top{height:auto;}
	 #column-left .product-items .product-details, #column-right .product-items .product-details{width:63%;}
	 #column-left .product-thumb .price-new, #column-right .product-thumb .price-new {display:block;margin-top:2px;}
	 .product-search .sortcat { width: 60%;}
	 .cms-banner-right{width:73%;}
	 .cms-banner-left{width:27%;}
	 .cms-title {padding: 11px;}
	#footer{padding:70px 0 58px;}
	.productpage .product-info .product-image .customNavigation span.next,.productpage .product-info .product-image .customNavigation span.prev{top:38px;}
	.productpage .write-review{margin:0;clear:both;}
	.productpage .rating-star{display:inline-block;width:100%;}
	
	#content.return .input-group.date .form-control{width:auto;}
	.tm-about-text{padding:0 0 0 15px;}
	.aboutme-read-more{margin:37px 15px 0 0;}
	.contact-info .left,.contact-info .right{width:100%;}
	.contact-info .right{float:left;text-align:left;clear:both;}
	.hometab{margin: 0 auto;}	
	.blog-item .blog-left .blog-image .post_hover, .blog-left-content .blog-image .post_hover {top: -120px;}
	.post-image-hover {left: 0;right: 0;margin: 0 auto;text-align: center;}
	.content_footer_top {width: 100%;height: auto;}
	.social > ul {padding: 13px 10px;}
	.newsletter {width: 100%;padding: 20px 15px;}
	#bottomfooter , .powered {text-align: center;}
	.footer-container , .content_footer_bottom {float: left;width: 100%;}
	.footer-container {padding: 0 10px 10px; margin-left: 0;}
	#testimonialblock {display: none;}
	#column-left .box.Blog {position: unset;}

}
@media (max-width: 767px) { 
	.container {width: auto !important;padding: 0 15px;}
	.nav-responsive span, .main-menu > ul > li > a {padding: 15px 0;}
	.nav-responsive1 span, .main-menu > ul > li > a {padding: 21px 0;}
	.nav-responsive div, .responsive-menu .hitarea {margin-right: 0 !important;}
	.layout-2.left-col #column-left, .layout-2.right-col #column-right{display:block !important;padding:0 15px;float: left;}
	.layout-2 #content,.layout-3 #content{width:100%;}
	.product-info .image-additional {width: 100%;} 
	.product-info .image-additional a {padding: 1px;} 
	.header-logo,.header-search{display:inline-block;float:none;width:100%;}
	.productpage .rating-wrapper, .quickview-model .rating {
	    width: 100%;
	    float: left;
	}
	#product .alert {
		margin-bottom: 10px;
		width: 100%;
		float: left;
	}
	#product .form-group.cart .btn-group {
		clear: both;
		padding: 0 0 10px 0 !important;
		display: block;
		width: 100%;
		float: left;
	}
	.header-logo{text-align:center;}
	.layout-2 #content{padding:0 15px;}
	.header-logo > div{display:inline-block;}
	.btn-info {margin-bottom:3px;} 
	#input-search {margin-bottom: 8px;}
	#logo .img-responsive { margin: 0 auto 15px;}
	.col-sm-4.total_amount {margin-top: 20px;}
	#cart{float:none;}	
	#cart .dropdown-menu {right: -75px;width: 350px;}
	.checkout-cart .btn.btn-danger { margin-top: -2px !important;}
	.button_class {clear:both;}
	.show-wrapper{clear:both;margin:10px 0 0;}
	.category_filter .show {float: left; margin: 8px 10px 0 0;}
	.product-compare .table-bordered{float:left;width:100%;overflow:auto;display:inline;}
	.product-info .image, .product-info .additional-carousel { margin: 0 auto; width: 300px;}
	.addthis_toolbox.addthis_default_style{margin: 10px 0;}
	#content .category_list .filterbox{border:1px solid #e4e4e4;margin:10px 0;}
	#content .category_list .filterbox .list-group a{border:none;}	
	#logo{  margin: 25px 0 0;}
	.header-search{padding:0 0px;right:0;top:174px;}
	#search .input-lg{width:100%;padding: 8.6px 10px;}
	.header.container {  height: 230px;}
	.header-right { display: inline-block;  float: none;  text-align: center;  width: 100%;}
	.content_headercms_top{float:none;margin-top:10px;display:inline-block;}
	.header-cart{float:none;display:inline-block;}
	#cart{margin-top:-27px;}
	.content-top #content{min-height:0;}
	.container.content-bottom{margin-top:0;}
	#footer{padding:30px 0;}
	.social,.footer-top-right { width: 100%;height:auto;}
	
	.post-image {width: 100%;}
	.text2{font-size:12px;}
	.text1{font-size:10px;}
	#banner1{ display: inline-block;margin: 0 2.3%;}
	.cms-title{padding:15px 5px;}
	.post-image img{width:100%;}
	#testimonial-blog .slider-item.last_item_tm .single-post,#testimonial-blog .slider-item.first_item_tm .single-post{margin: 0 20px !important}
	.cms-banner-right .cms-banner2.single-banner{width: 55%}
	.cms-banner-left { width: 100%;}
	.cms-banner-right .cms-banner3.single-banner { width: 36.1%;}
	.cms-banner-right .cms-banner2.single-banner {  width: 54.8%;}
	.footer-container ,.content_footer_bottom{ float: block;}
	#bottomfooter,.powered{text-align:center;}
	#content .category_list .filterbox{clear:both;}
	.filterbox .list-group{padding:10px;}.product-list .list-right{  padding: 0 10px 0 18px;}
	.pagination-wrapper{margin-bottom:25px;}
	.productpage .product-left{width:100%;}
	.productpage .product-right{width:100%;padding:35px 15px;}
	.form-horizontal .col-sm-10,.form-horizontal .control-label{width:100%;}
	#form-language .btn span, #form-currency .btn span{display:none;}
	.tm-about-text{background:none;padding:0 15px 0 30px;}
	
	.header.container,#top .container{padding: none;}
	.cms-banner-right{width:73.5%;}
	.sale{opacity:1;-khtml-opacity: 1;-webkit-opacity:1;-moz-opacity:1;}
	.banners-slider-carousel .product-block-inner > img{max-width:100%;}
	.product-list .product-thumb .image{float:left;border: none;}
	.product-search .sortcat {  width: 100%;}
	.productpage .write-review{margin:5px 0 0;}
	.account-address .table-bordered .text-right .btn-info ,.account-order-info .table-bordered .text-right .btn-primary{margin-bottom:0;}
	#content.return .input-group.date .form-control{width:100%;}
	#column-left .box-heading.toggle , #column-right .box-heading.toggle {width: 100%;float: left;margin: 0 0 15px;}
	#column-left .box-heading.toggle.active , #column-right .box-heading.toggle.active{margin: 0 auto;}
	.layout-2.left-col #column-left .toggle .mobile_togglemenu, 
	.layout-2.right-col #column-right .toggle .mobile_togglemenu {left: -25px;}
	#column-left .box .box-content, #column-right .box .box-content, #column-left .list-group, #column-right .list-group {width: 100%;float: left;}
	.tm-about-text::before { content: none;}
	.content-wrap{margin-left:0;}
	.tm-about-text{width:65%;padding-left:15px;}
	.productpage .rating-wrapper .addthis_toolbox.addthis_default_style{float:left;}
	.cms-banner-right{text-align:center;}
	.owl-carousel .owl-buttons .owl-next, .owl-carousel:hover .owl-buttons .owl-next {right: 45px !important;}
	.owl-carousel .owl-buttons .owl-prev, .owl-carousel:hover .owl-buttons .owl-prev {right: 85px !important;}
	.newsletter .box-left {float: left;width: 100%;margin: 0 0 15px;}
	.newsletter .box-right {width: 100%;float: right;padding: 0;}
	.newsletter .input-news {width: 75.9%;float: left;}
	#content .list-unstyled.price li.price-tax {display: block;}
	.product-block .button-group{transform: none;}
	.single-banner {width: 47.3%;}
	.bottom-banner .single-banner {width: 47.3%;}
	.static-menu {
    display: block;
}

}
@media only screen and (max-width: 479px) {
	.product-info .image-additional a{float:none; text-align:center; padding: 1px;}
	.table{	
		float: left;
		margin-bottom: 20px;
		overflow: scroll;
		width: 100%;
	}
	.subbanner1.single-banner, .bottom-banner .subbanner1.single-banner {margin: 0 0 15px 0;}
	.bottom-banner .single-banner {width: 100%;}
	.newsletter .box-heading {font-size: 18px;}
	.subscribe-btn .btn-default {padding: 13px 8px;}
	.newsletter .input-news {width: 66%;}
	.newsletter .input-lg {padding: 10px;}
	.customNavigation {display: none !important;}
	#top-links .list-inline{margin-top:12px;}
	.product-layout.product-grid{width:50%!important; height: 420px;}
	.shopping-cart .input-group .form-control{width:100%;padding:0;text-align:center;}
	.account-wishlist .table-bordered{float:left;width:100%;overflow:auto;display:inline;}
	#cart .dropdown-menu table {display: inline-block;}
	.flex-direction-nav a:before {font-size:27px !important;}
	#cart .dropdown-menu {right: -68px;  width: 290px;}
	.dropdown-menu.pull-right {width: 100%;}
	#cart .dropdown-menu li > div {min-width:100%;}	
	.category_filter .limit {float: left;}
	.contact-info .left,.contact-info .right{width:100%;}
	.product-info .image, .product-info .additional-carousel {width: 100%;}
	.nav-tabs > li{width:100%;}	
	.nav-tabs > li > a{margin:0 0 2px;}
	
	.pagination-wrapper .page-link{float:left;}
	.pagination-wrapper .page-result{float:left;clear:both;}
	.checkout-cart .buttons .pull-right {clear: both;float: left; margin: 10px 0;}
	.bootstrap-datetimepicker-widget.dropdown-menu{width:auto;}
	.checkout-cart #accordion .input-group-btn {float: left; margin: 5px 0 0;}
	.single-banner { width: 100%; text-align: center;}
	.single-banner div ,.cms-banner-right .single-banner{}
	#banner1
	.cms-banner-left ,.cms-banner-right{ width: 100%;}
	.cms-subbanner1 ,.cms-banner .cms-banner-left .cms-subbanner2.single-banner{width:100%;margin:10px 0;}

	.cms-banner-right .cms-banner2.single-banner { width:100%;margin:10px 0 6px;}
	.cms-banner-right .cms-banner3.single-banner { width: 100%;margin:10px 0;}
	.single-banner div img, .cms-banner-right .single-banner img{transition:none;
	-webkit-transition: none;
	-moz-transition: none;
	-ms-transition:none;
	-o-transition:none;
	display:inline;}
	.single-banner div:hover img, .cms-banner-right .single-banner:hover img{transform:none; -webkit-transform:none;-ms-transform:none;-o-transform:none;-moz-transform:none;}
	.slider-banner{display:none;}
	.container.content-bottom { margin-top: 0;}
	.content-top #content{margin-bottom:15px;}
	.htabs .etabs li { display: block;    float: none;    margin-top: 3px;    width: 100%;}
	.etabs, .nav-tabs > li {  width: 100%;}
	.htabs { height: auto;}
	.htabs a { display: block !important;  float: none; margin: 3px 0 0;  width: auto; background-color: #eeeeee; border-bottom: 2px solid #eeeeee;}
	.hometab .customNavigation a{  top: -25px;}
	#content .hometab .box .box-content{padding:28px 0 0;}
	.owl-pagination { display: none;}
	.product-list .caption{width:100%;}
	.product-list .list-right { clear: both; width: 100%;padding:0 10px;}
	.product-list .list-right{margin:0 0 10px;border-left:0 none; padding:0;}
	.product-list .caption{  margin: 15px 0;}
	.productpage .nav-tabs > li > a { background-color: #eeeeee; border-bottom: 2px solid #ffffff;  display: block !important; float: none;  margin: 3px 0 0; width: auto;}
	.etabs, .nav-tabs > li {  width: 100%;}
	.nav .pull-left { display: inline-block; float: left; }
	.nav.pull-right { float: none;}
	.nav.pull-left { float: none;}
	#top .container{text-align:center;}
	#form-currency .dropdown-menu, #form-language .dropdown-menu{left:0px;}
	#cart{margin-top:10px; display: none;}
	.content_headercms_top ,.header-cart{display:block;}
	.cms-data{border-right:0 none;}
	.header.container {height: 220px;}
	.header-search{top:180px;}
	.content_headercms_top{margin-top:0;}
	.header-tele-cms{right:0;}
	.cms-data{padding-right:0;}
	#cart > .btn{margin-right:0;margin-left:0;}
	#cart .dropdown-menu{right:-119px;}
	.checkout-cart #accordion .input-group-btn:last-child > .btn, .checkout-cart #accordion .input-group-btn:last-child > .btn-group { margin: 0 !important;}
	.list-buttoncart{clear:both;}
	.tm-about-text { width: 100%;padding:0 15px 15px;margin-bottom:0;text-align:center;}
	.aboutme-read-more{ margin:10px 0 25px 0; width:100%;text-align:center;}
	.product-search .sortcat{width: 100%;}
	#cart > .btn{margin-left:0;}
	#top-links{padding-top:0;padding-bottom:6px}
	.myaccount .dropdown-menu{ margin: 6px 0 0;}
	.row.site-map{overflow:auto;}
	.contact-info .right{text-align:center;}
	#tabs_info.product-tab.col-sm-12 {padding-top: 20px;}
	#content .product-carousel .product-block .img-border, 
	#content .box-product .product-block .img-border, .product-layout.product-grid .product-block .img-border {border: none;}

}

@media (max-width: 419px)
{
.static-menu {
    display: none;
    height:0;
}
#search .input-lg {
    width: 100%;
    padding: 8.8px 10px;
}
#search .btn-lg {
    border-bottom: 1px solid #fdb913;
}
}
@media only screen and (max-width: 319px){
	.product-info .product-image .customNavigation{ width:196px; margin:0 auto; position: relative; } 
	.product-info .additional-carousel {width:196px; margin:0 auto;}
	.header-logo .img-responsive { width: 100%;}
	.btn-primary {margin-bottom:2px;}
	.compare-total {clear: both; margin: 8px 10px 10px 0;}
	#cart .dropdown-menu { right: -79px;width: 210px;}
	#cart .dropdown-menu{width:210px;}
	#cart .text-right .addtocart{margin:0 0 5px;}
	#cart .text-right .checkout{margin:0;}
	.tm-about-text{background:none;padding:0 15px}
	.aboutme-read-more{ margin:25px 0;}
	#footer .column #contact ul{   overflow: auto; width: 100%;}
	.post-date{min-width:45px;}
	.compare-total{margin-left:5px;}
	#product #input-quantity{margin-bottom:5px;}
	.account-address .table-bordered .text-right .btn-danger,account-order-info .table-bordered .text-right .btn-danger{float:left;clear:both;margin-top:2px;}
	.account-address .table-bordered .text-right .btn-info, .account-order-info .table-bordered .text-right .btn-primary{float:left;}
}

/* Megnor www.templatemela.com - End */
.alert.alert-success.animated.fadeInDown{width:100%;text-align:center;margin:0 -5px;}
.product-compare .btn-block + .btn-block {  margin-top: 0;}

/*category icon*/
#Network{
    background: url('https://www.goldonecomputer.com/image/catalog/WIfi-20x20.png') center left no-repeat;
}
#Accessories{
    background: url('https://www.goldonecomputer.com/image/catalog/Accessories-20x20.png')center left no-repeat no-repeat;
}
#UPS{
    background: url('https://www.goldonecomputer.com/image/catalog/Battery-20x20.png')center left no-repeat no-repeat;
}
#GamingGear{
    background: url('https://www.goldonecomputer.com/image/catalog/Gaming-20x20.png')center left no-repeat no-repeat;
}
#PCComponents{
    background: url('https://www.goldonecomputer.com/image/catalog/Components-20x20.png')center left no-repeat no-repeat;
}
#SmartPhoneandTablets{
    background: url('https://www.goldonecomputer.com/image/catalog/Smartphone-20x20.png')center left no-repeat no-repeat;
}
#DigitalStorage{
    background: url('https://www.goldonecomputer.com/image/catalog/SDCard-20x20.png')center left no-repeat no-repeat;
}
#Monitor{
    background: url('https://www.goldonecomputer.com/image/catalog/Monitors-20x20.png')center left no-repeat no-repeat;
}
#Desktop{
    background: url('https://www.goldonecomputer.com/image/catalog/Desktop_1-20x20.png')center left no-repeat no-repeat;
}
#LaptopSqareParts{
    background: url('https://www.goldonecomputer.com/image/catalog/SparePar-20x20.png')center left no-repeat no-repeat;
}
#Laptop{
    background: url('https://www.goldonecomputer.com/image/catalog/Laptop-20x20.png')center left no-repeat no-repeat;
}
#AudioDevice{
    background: url('https://www.goldonecomputer.com/image/catalog/Headset-20x20.png')center left no-repeat no-repeat;
}
#PrinterandScanner{
    background: url('https://www.goldonecomputer.com/image/catalog/Printer-20x20.png')center left no-repeat no-repeat;
}
#SecuritySafety{
    background: url('https://www.goldonecomputer.com/image/catalog/Fingerprint-20x20.png')center left no-repeat no-repeat;
}
#Projector{
    background: url('https://www.goldonecomputer.com/image/catalog/icons8-projector-20.png')center left no-repeat no-repeat;
}
#Software{
    background: url('https://www.goldonecomputer.com/image/catalog/icons8-software-20.png')center left no-repeat no-repeat;
}

/*menu icon*/
.laptop a:before {
    content: '\f109';
    font-family: FontAwesome;
    font-size: 20px;
    display: inline-block;
    margin-right: 10px;
}
.view-all a {
    float: right;
	background-color: #fdb913;
	color: #fff;
	text-transform: uppercase;
	white-space: normal;
	padding: 10px 17px;
	font-weight: 400;
	letter-spacing: 0.6px;
	line-height: 20px;
	font-size: 14px;
}
.view-all1 a {
    float: right;
	background-color: #fdb913;
	color: #fff;
	text-transform: uppercase;
	white-space: normal;
	padding: 10px 17px;
	font-weight: 400;
	letter-spacing: 0.6px;
	line-height: 20px;
	font-size: 14px;
	margin-block: -25px;
    margin-right: 85px;
}
.view-all a:hover {
    color: black;
    margin-right: 85px;
}
.view-all1 a:hover {
    color: white;
    margin-right: 85px;
    background-color: #000;
}
@media (max-width: 979px){
 .view-all1 a{
    margin-right: 0px;
    color: black;
    background-color: #fff;
}
.view-all1 a:hover {
    color: white;
    margin-right: 0px;
    background-color: #000;
}
#content.productpage h4 {
	margin-top: 0;
	color: #313131;
	/*font-family: "Archivo Narrow",sans-serif;
	font-size: 28px;
	font-weight: 600;*/
}
.footercms {
    height: 267px;
    vertical-align: middle;
    display: table-cell;
    justify-content: center;
    width: 250px;
}
}
@media (max-width: 979px){
    .inner-cms2 {
    height: 81px;
    margin: 15px 30px auto;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
}
}
.saleo {
	background: url("../image/megnor/order.png") no-repeat scroll 0 0 transparent;
	font-size: 0;
	height: 24px;
	opacity: 0;
	-khtml-opacity: 0;
	-webkit-opacity: 0;
	-moz-opacity: 0;
	position: absolute;
	right: -30px;
	top: 0px;
	width: 64px;
	transition: all 0.4s ease;
	-webkit-transition: all 0.4s ease;
	-moz-transition: all 0.4s ease;
	-ms-transition: all 0.4s ease;
	-o-transition: all 0.4s ease;
}
#content .box-product .product-block .saleo,#content .product-list .product-thumb .saleo , #content .product-grid .product-thumb .saleo{
	opacity: 1;
	-khtml-opacity: 1;
	-webkit-opacity:1;
	-moz-opacity:1;
	right: 0px;
	transition: all 0.4s ease;
	-webkit-transition: all 0.4s ease;
	-moz-transition: all 0.4s ease;
	-ms-transition: all 0.4s ease;
	-o-transition: all 0.4s ease;
}
@media (max-width: 979px){
.nav-header .container {
    background-color: #fdb913;
    height:45px;
    margin: 0 auto;
  	box-shadow: none;
}
}
.container-f {
    background: transparent;
	padding-top: 20px;
	background-color: #3a3737;
	box-shadow: none;
    
}
.div_outstock_arrow {
    width: 30px;
    height: 25px;
    background-color: #999;
    background-size: cover;
    clip-path: polygon(0% 0%, 40% 100%, 100% 0%);
    position: absolute;
    top: 0;
}
.div_outstock
{
    background-color: #999;
    height: 25px;
    position: absolute;
    width: 79px;
    top: 0;
    margin-left: 12px;
    text-align: center;
    padding-top: 4px;
    font-size: 11px;
    color: #fff;
}
.outsticky{
    margin-right: 0;
    width: 55%;
    text-align: right;
    position: absolute;
    top: 0;
    right: 0;
    
}
@media (max-width: 979px){
.menu-res{
    color: #fdb913;
    display: block;
    font-family: "Archivo Narrow",sans-serif;
    font-size: 18px;
    font-weight: 400;
    margin-bottom: 0;
    position: relative;
    text-transform: uppercase;
    z-index: 6;
     background-color: #3f3f3f;
     margin: 0 -20px;
}
}
.menu-item :hover{
    background-color:#3f3f3f;
}
.imageL {
	text-align: center;
	position:relative;
	overflow: hidden;
	width: 100px;
	float: left;
	#Laptop
}
.img-border1{
    /*border-right: 1px solid #e4e4e4;*/
    height: 110px;}
 @media (max-width: 979px){
    .img-border1{height: 0px;}
 }
 .tab-content.tab-content-product {
    border: 1px solid #ddd;
    padding: 15px 20px;
    margin: 30px 0;
    max-height: 300px;
    overflow: auto;
}
.information-home_laptop .buttons,.information-home_desktop .buttons,.information-home_gaming .buttons,.information-home_peripheral .buttons
{
    display:none;
}