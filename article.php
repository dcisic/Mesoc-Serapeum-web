<?php
include('db.php');
include ('header1.php');

 mysqli_set_charset($db,"utf8");
$ID = $_GET['id'];
?>
<html>
    <head>


<?php
$sql="SELECT Id_Doc, Author,Title,Biblioref, Keywords,Links , DOI,Searchdatabase, Technique,Methodology , Summary,file    FROM `document` where ID_Doc =" . (int)$ID;

$results = mysqli_query($db,$sql);


?>
 <meta charset="utf-8">
 <link rel="shortcut icon" href="images/favicon.ico">


    <!--Material Icon -->
    <link rel="stylesheet" type="text/css" href="css/materialdesignicons.min.css" />

  
    <!-- Custom  Css -->
    <link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

 </head>
<body>
 <?php
 include ('navbar.php');
?>
    <!-- END NAVBAR -->
  <section class="section-sm "  >
        <div class="color-overlay" ></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="counter-box text-center mt-4 mt-lg-0 text-white">
                        <div class="mt-12">
                            
                        </div>
                         <br>       <br>   <br>   <br>   <br> 
 <h1 class="counter_value mt-12" data-target="370">ARTICLE</h1>
                        <p class="mb-0 mt-2 text-uppercase">Details on article</p>
                    </div>
                </div>
	        </div>
        </div>
</section>	
<br>
 <?php
 if ($results) : {
  foreach ( $results as $result){  ?>
<br>
<?php  if  ($result <> "" ): 
 
	 ?>


<div style="padding-left:5%;  padding-right:5%;"> 

<table>
<tbody>

 <tr>
  <td> Id <td>
 <td><?php echo $result['Id_Doc'] ?></td>
</tr>
<tr>
<td> Author <td>
 <td><?php echo $result['Author']; ?><br></td>
</tr>
<tr>
<td> Title <td>
 <td><b><?php echo $result['Title']; ?></b></td>
</tr>
<tr>
<td> Reference <td>
 <td><br><br><?php echo $result['Biblioref']; ?><br><br></td>
</tr>
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


<tr>
<td> DOI <td>
 <td><?php echo $result['DOI']; ?></td>
</tr>
<tr>
<td> Search Database <td>
 <td><?php echo $result['Searchdatabase']; ?><br></td>
</tr>
<tr>
<td> Technique <td>
 <td><?php echo $result['Technique'] ;?></td>
</tr>

<tr>
 <td> </td>
<td></td>
 </td>
</tr>




</table>

 <?php   else:   echo  " Error: Id not found" ;
endif; } }
endif;?>
</div>

<div class="tooltipx"> <center>
<a href="article_anal.php?id=<?php echo $ID?>"><img src="images/201.png" width="64" height="64" style="border: 0" alt="Similar articles"></a>
  <span class="tooltiptext"><a href="article_anal.php?id=<?php echo $ID?>"> Analyze the document</span> </center>

</div>
<div style="padding-left:0%">
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
</html>
