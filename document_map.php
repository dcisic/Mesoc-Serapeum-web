<?php
 include ('header1.php');
 include('db.php');
 include ('googlekey.php');
    mysqli_set_charset($db,"utf8");
$string="";

?>

<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="CD" />

    <link rel="shortcut icon" href="images/favicon.ico">


    <!--Material Icon -->
    <link rel="stylesheet" type="text/css" href="css/materialdesignicons.min.css" />

  
    <!-- Custom  Css -->
    <link rel="stylesheet" type="text/css" href="css/style.css" />

<style>
    #map {
        height: 700px;
        /* The height is 400 pixels */
        width: 100%;
        /* The width is the width of the web page */
    }


</style>
   <?php
      $sql="SELECT count(doccity.ID_Doc) as num ,doccity.ID_City,city.CityName ,city.LATITUDE ,city.LONGITUDE FROM doccity LEFT JOIN city ON doccity.ID_City = city.ID_City where city.LATITUDE is not null group by doccity.ID_City, city.CityName,city.LATITUDE,city.LONGITUDE order by city.ID_City ";
                $results = mysqli_query($db,$sql);
    foreach ( $results as $result){
        $stringx='';
        $sql1="Select doccity.ID_Doc,document.Title from doccity INNER JOIN document ON doccity.ID_Doc = document.ID_Doc where doccity.ID_City  =". $result['ID_City'];

        $resultsx = mysqli_query($db,$sql1);
        foreach ( $resultsx as $resultx){
           // $stringx=$stringx.'<a href="article.php?id='.$resultx['ID_Doc'].'">'.$resultx['Title'].'</a><br>'  ;
		   
           $stringx=$stringx.str_replace('"',' ',$resultx['Title']).'    <br> ' ;
                      }
       $string=$string.'["'. $result['CityName'] .'",'. $result['LATITUDE']. ','.$result['LONGITUDE'] .',"'. $result['ID_City'].'","'. $result['num'].'","'. $stringx .'" ], ';


       }
   $c= '['. substr($string, 0, -3).']]' ;
   
    ?>

 <script>
    function initMap() {

      const x = {lat: 55, lng: 10};

      const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 5,
        center: x,
        disableDefaultUI: false,
      });
      setMarkers(map);
    }

      // Array of Markers
      const cities =   <?PHP echo $c;  ?> ;


         function setMarkers(map) {
         for (let i = 0; i < cities.length; i++) {
          const city = cities[i];

          var newmarker=new google.maps.Marker({
            position: {lat: city[1], lng: city[2]},
            map,
            title: city[0]+' '+city[4],
			label: city[0],

            zIndex: city[3],

          });
		   newmarker['infowindow'] = new google.maps.InfoWindow({
		         content: (city[5])

        });
		   newmarker['infowindow1'] = new google.maps.InfoWindow({
            content: ' <a href="city.php?id='+city[3]+'">Articles regarding '+ city[0]+ '</a>'
        });
		  google.maps.event.addListener(newmarker, 'mouseover', function() {
        this['infowindow'].open(map, this);
		 });
          google.maps.event.addListener(newmarker, 'click', function() {
         this['infowindow'].close();
        this['infowindow1'].open(map, this);
    });
         google.maps.event.addListener(newmarker, 'mouseout', function() {
				 this['infowindow'].close();
			});
        }}



    window.initMap = initMap;

  </script>


<title>MESOC Serapeum  | Where culture meets AI </title>
 <link rel="shortcut icon" href="images/favicon.ico">
 <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

 </head>
<body>
   <body>
    <!-- START  NAVBAR -->
    <?php
 include ('navbar.php');
?>
    <!-- END NAVBAR -->
  <section class="section-sm "  >
        <div class="color-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="counter-box text-center mt-4 mt-lg-0 text-white">
                        <div class="mt-12">
                            
                        </div>   <br>       <br>   <br>   <br>   <br> 
 <h1 class="counter_value mt-12" data-target="370"> GEOGRAPHIC&nbsp;SPREAD&nbsp;OF&nbsp;DOCUMENTS</h1>
                        <p class="mb-0 mt-2 text-uppercase">Articles that are connected with place. Only documents that have name of city or country in Title or Abstract
</p>
                    </div>
                </div>
	        </div>
        </div>
</section>	


 <div id="map"></div>


<script
        src="https://maps.googleapis.com/maps/api/js?key=<?php echo $key; ?>&callback=initMap"

></script>



<div style="padding-left:0px ">
	   <!-- START FOOTER -->
    <?php
 include ('footer.php');
?>
    <!-- END FOOTER -->

    <!-- END Transition -->
    <!-- bootstrap -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- JAVASCRIPTS -->
    <script src="js/smooth-scroll.polyfills.min.js"></script>
    <script src="js/gumshoe.polyfills.min.js"></script>
    <script src="js/tiny-slider.js"></script>
    <!-- CUSTOM JS -->
    <script src="js/app.js"></script>
</body>
