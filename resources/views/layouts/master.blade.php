<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8"/>
  <title>Indiancitymarket: One Shop Stop Solution</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Facebook and Twitter integration -->

  <meta property="og:title" content="" />

  <meta property="og:image" content="" />

  <meta property="og:url" content="" />

  <meta property="og:site_name" content="" />

  <meta property="og:description" content="" />

  <meta name="twitter:title" content="" />

  <meta name="twitter:image" content="" />

  <meta name="twitter:url" content="" />

  <meta name="twitter:card" content="" />

  <link rel="canonical" href="" />

<meta name="language" content="english">

<meta name="robots" content="index, follow">



  <!-- Bootstrap CSS -->

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

  <!-- my added css -->



  <link rel="stylesheet" href="{{ URL::asset('public/assets/css/mystyle.css') }}">



  <script src="https://code.jquery.com/jquery-3.3.1.slim.js" integrity="sha256-fNXJFIlca05BIO2Y5zh1xrShK3ME+/lYZ0j+ChxX2DA=" crossorigin="anonymous"></script>

  <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Merienda+One|Julius+Sans+One|Pompiere|Raleway" rel="stylesheet">

  <!-- <script src="{{ URL::asset('public/assets/js/mystyle.js') }}"></script> -->



  <link rel="stylesheet" href="{{ URL::asset('public/assets/css/font-awesome.css') }}">



  <link href="https://fonts.googleapis.com/css?family=Lobster+Two|Oregano" rel="stylesheet">



  <link rel="icon" type="image/png" href="img/" />



  <!-- Wow css -->

  <link rel="stylesheet" href="{{ URL::asset('public/assets/WOW-master/css/libs/animate.css') }}">

  <script src="{{ URL::asset('public/assets/WOW-master/dist/wow.min.js') }}"></script>
  <link rel="stylesheet" href="{{ URL::asset('public/assets/css/richtext.min.css') }}">
    <script type="text/javascript" src="{{ URL::asset('public/assets/js/jquery.richtext.js') }}"></script>

  <script type="text/javascript" src="{{ URL::asset('public/assets/js/jsapi.js') }}"></script>

  <script>
    new WOW().init();
  </script>
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<style>
div#google_translate_element {
position: fixed;
    top: 84px;
    right: 10px;
    z-index: 99999999;
    color: white !important;
}

div#demo {
    display: none;
}
.row.course-set.courses__row {
    margin-top: 20px;
}
</style>

<style>
  ::-webkit-scrollbar {
    width: 0px;
    background: transparent;
}
.outer-container{
  width: 100vw;
  max-width: 100%;
  margin-left: auto;
  margin-right: auto;
  -webkit-transition: width 1s;
  -o-transition: width 1s;
  transition: width 1s;
}
/*#change-button {
  background: #a4cb61;
  color: #fff;
  position: fixed;
  bottom: 20px;
  right: 20px;
  margin-left: auto;
  margin-right: auto;
  letter-spacing: 2px;
  border: 0px;
  border-radius: 20px;
  padding: 10px 20px;
  cursor: pointer;
}
#change-button:hover {
  box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
}*/
.outer-container.active {
  width: 500px !important;
  -webkit-transition: width 1s;
  -o-transition: width 1s;
  transition: width 1s;
}
.tour-details-section {
  height: 100vh;
}
.center {
  height: 100vh;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
}

.center p {
  font-size: 20px;
  font-weight: 600;
  text-align: center;
}

/*#itinerary,
#dates,
#map,
#book {
  background: #c4da9e;
}
#accommodation,
#includes-excludes,
#gallery {
  background: #e4e4e4;
}*/


/* Sticky nav */ 
#eight-day-sticky-section .tour-details-section-active {
  color: #0156fb !important;
  background: transparent !important;
}


.sticky-section {
  z-index: 19 !important;
}

.scrollmenu-fade {
  position: relative;
}
.scrollmenu-fade:after {
  content: "";
  position: absolute;
  z-index: 1;
  top: 0;
  right: 0;
  bottom: 15px;
  pointer-events: none;
  background-image: linear-gradient(to right,rgba(255,255,255,0),#333333 85%);
  width: 15%;
  height: 46px;
    }
div#google_translate_element {
position: fixed;
    top: 84px;
    right: 10px;
    z-index: 99999999;
    color: white !important;
}
div.scrollmenu {
	/*position: fixed;
    top: 80px;*/
    width: 100%;
    z-index: 99999;
    background-color: #e9edff;
    overflow: auto;
    white-space: nowrap;
    text-align: center;
}

div.scrollmenu a {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px;
  text-decoration: none;
}
.scrollmenu a:hover {
  background-color: yellow;
}

div.scrollmenu p {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px;
  text-decoration: none;
}
/* Media queries */

@media only screen and (min-width : 650px) {
  div.scrollmenu p.scroll-display-arrow {
    display: none;
}
}

@media only screen and (max-width : 650px) {
  .scrollmenu-fade:after {
    height: 82px !important;
}
  #change-button {
    display: none;
}
  .hide-mobile {
    display: none;
}
}





.bg-prime{
background-color: #0101f9;
color: white !important;
border-right: solid 1px white;
}
.text-c1{
	color: #0101f9;
}
.text-c2{
	color: #00fb00;
}
.bg-prime:hover{
	background-color: #00fb00;
	color: brown !important;
}
.bg-prime.active{
	background-color: #00fb00 !important;
	color: brown !important;
}
.products div p{
	margin: 3px 0;
	font-size: 13px;
}
@media only screen and (min-width: 600px) {
.products div p{
	margin: 6px 0;
}
}

.navbar-toggler:not(:disabled):not(.disabled) {
    cursor: pointer;
    font-size: 10px;
    color: white !important;
    background-color: ;
}
.text-sm{
	font-size: 12px;
}
.bg-navbar{
	background-color: #e9edff;
}


</style>
<script>
jQuery(function ($) {
    $(document).ready(function() {
      //$('.richcontent').richText();
        function becomeSticky(el, padding) {
            if (el.length) {
                el.sticky({
                    topSpacing: padding
                });
            }
        }
        becomeSticky($("#eight-day-sticky-section"), 0);
    });
});

jQuery(function ($) {
    $(window).scroll(function () {
        var scrollPos = $(window).scrollTop();
        $('.tour-details-section').each(function (i) {
            var topPos = $(this).offset().top;
            if ((topPos - scrollPos) <= 80) {
                $('.tour-details-section-active').removeClass('tour-details-section-active')
                $('#eight-day-sticky-section .active-highlight').eq(i).addClass('tour-details-section-active')
            }
        })
    });
});

$("#change-button").click(function() {
  $(".outer-container").toggleClass( "active" );
});
</script>

<script type="text/javascript">
// Load the Google Transliterate API
google.load("elements", "1", {
packages: "transliteration"
});
function onLoad() {
var options = {
sourceLanguage:
google.elements.transliteration.LanguageCode.ENGLISH,
destinationLanguage:
[google.elements.transliteration.LanguageCode.HINDI],
shortcutKey: 'ctrl+g',
transliterationEnabled: true
};
// Create an instance on TransliterationControl with the required
// options.
var control =
new google.elements.transliteration.TransliterationControl(options);
// Enable transliteration in the textbox with id
// 'transliterateTextarea'.
control.makeTransliteratable(['title']);
control.makeTransliteratable(['tp']);
}

google.setOnLoadCallback(onLoad);

</script>
    <!--[if lt IE 9]>

      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>

    <![endif]-->
  </head> 

<body>
<div id="google_translate_element" style="display:none;"></div>
@include('layouts.navigation')
  @yield('content')
@include('layouts.footer')



<!-- Optional JavaScript -->

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>

  <!-- <script src="{{ URL::asset('public/assets/js/bootbox.min.js') }}"></script> -->

  <script src="{{ URL::asset('public/assets/js/mystyle.js') }}"></script>

  </body>

</html>