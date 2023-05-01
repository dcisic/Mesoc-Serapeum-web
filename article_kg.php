<?php
 include ('header1.php');
 include('db.php');
   mysqli_set_charset($db,"utf8");
$ID = $_GET['id'];

?>
<html>
<head>


 <style>
* {box-sizing: border-box;}

.img-magnifier-container {
  position: relative;
}

.img-magnifier-glass {
  position: absolute;
  border: 3px solid #000;
  border-radius: 50%;
  cursor: none;
  /*Set the size of the magnifier glass:*/
  width: 300px;
  height: 300px;
}
</style>
<script>
function magnify(imgID, zoom) {
  var img, glass, w, h, bw;
  img = document.getElementById(imgID);

  /* Create magnifier glass: */
  glass = document.createElement("DIV");
  glass.setAttribute("class", "img-magnifier-glass");

  /* Insert magnifier glass: */
  img.parentElement.insertBefore(glass, img);

  /* Set background properties for the magnifier glass: */
  glass.style.backgroundImage = "url('" + img.src + "')";
  glass.style.backgroundRepeat = "no-repeat";
  glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
  bw = 3;
  w = glass.offsetWidth / 2;
  h = glass.offsetHeight / 2;

  /* Execute a function when someone moves the magnifier glass over the image: */
  glass.addEventListener("mousemove", moveMagnifier);
  img.addEventListener("mousemove", moveMagnifier);

  /*and also for touch screens:*/
  glass.addEventListener("touchmove", moveMagnifier);
  img.addEventListener("touchmove", moveMagnifier);
  function moveMagnifier(e) {
    var pos, x, y;
    /* Prevent any other actions that may occur when moving over the image */
    e.preventDefault();
    /* Get the cursor's x and y positions: */
    pos = getCursorPos(e);
    x = pos.x;
    y = pos.y;
    /* Prevent the magnifier glass from being positioned outside the image: */
    if (x > img.width - (w / zoom)) {x = img.width - (w / zoom);}
    if (x < w / zoom) {x = w / zoom;}
    if (y > img.height - (h / zoom)) {y = img.height - (h / zoom);}
    if (y < h / zoom) {y = h / zoom;}
    /* Set the position of the magnifier glass: */
    glass.style.left = (x - w) + "px";
    glass.style.top = (y - h) + "px";
    /* Display what the magnifier glass "sees": */
    glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
  }

  function getCursorPos(e) {
    var a, x = 0, y = 0;
    e = e || window.event;
    /* Get the x and y positions of the image: */
    a = img.getBoundingClientRect();
    /* Calculate the cursor's x and y coordinates, relative to the image: */
    x = e.pageX - a.left;
    y = e.pageY - a.top;
    /* Consider any page scrolling: */
    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return {x : x, y : y};
  }
}
</script>

<?php
$sql="SELECT Id_Doc, Author,Title,Biblioref, Keywords,Links , DOI,Searchdatabase, Technique,Methodology , Summary,file    FROM `document` where ID_Doc =" . (int)$ID;
$results = mysqli_query($db,$sql);

?>

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


<title>MESOC Serapeum  | Where culture meets AI </title>
 <link rel="shortcut icon" href="images/favicon.ico">
 <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

 </head>
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
                            
                        </div>
						     <br>       <br>   <br>   <br>   <br> 
 <h1 class="counter_value mt-12" data-target="370"> ARTICLE KNOWLEDGE GRAPH</h1>
                        <p class="mb-0 mt-2 text-uppercase"> Analysis of interlinked descriptions of entities - objects, events, situations or abstract concepts – while also encoding the semantics
</p>
                    </div>
                </div>
	        </div>
        </div>
</section>	

<div style="padding-left:10% ">

<br>


<br>
 <?php  foreach ( $results as $result){  ?>
<br>
<?php  if  ($result <> "" ): 
 
	 ?>
     <br>
	 <div style="padding-left:5%;  padding-right:5%">
<table>
<tbody>
 <tr>
  <td> Id <td>
 <td><?php echo $result['Id_Doc'] ?></td>
</tr>
<tr>
<td> Author <td>
 <td><?php echo $result['Author']; ?></td>
</tr>
<tr>
<td> Title <td>
 <td><b><?php echo $result['Title']; ?></b></td>
</tr>
<tr>
<td> Reference <td>
 <td><br><br><?php echo $result['Biblioref']; ?><br><br></td>
</tr>
<tr>
<td> Keywords <td>
 <td><?php echo $result['Keywords']; ?><br></td>
</tr>
<tr>
<td> Link to article <td>
 <td> <a href="<?php echo $result['Links'];?>" target="_self"</a> <?php echo $result['Links'];?><br></td>
</tr>
<tr>
<td> Abstract <td>
 <td><?php echo $result['Summary']; ?><br><br></td>
</tr>
<tr>
<td> Metodology <td>
 <td><?php echo $result['Methodology']; ?><br><br></td>
</tr>
<td> Technique <td>
 <td><?php echo $result['Technique'] ;?></td>
</tr>

<?php endif;}  ?>
</table>
  <script>
function showText(text){
    document.getElementById("text").innerHTML=text;
}
function hide(){
    document.getElementById("text").innerHTML="";
}
</script>
<br>


</div>


 <br>
<div class="img-magnifier-container" >
  <img id="myimage" src="kgraph/gr<?php echo $ID ?>.png"  width="1000" height="1000"  alt="knowledge graph"> 
</div>

<script>
/* Execute the magnify function: */
magnify("myimage", 5);
/* Specify the id of the image, and the strength of the magnifier glass: */
</script>

      <br>
  <span style="font-size: xx-small"> Note: Due to lack of computing power, results have been previously created and saved in database
</span>

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
</div>
</body>
</html>
