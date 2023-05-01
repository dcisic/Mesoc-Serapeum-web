<?php
 include ('header1.php');
 include('db.php');
  mysqli_set_charset($db,"utf8");

$ID = $_GET['id'];

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


<title>MESOC Serapeum  | Where culture meets AI </title>
 <link rel="shortcut icon" href="images/favicon.ico">
 <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">



<?php
$sql="SELECT Id_Doc, Author,Title,Biblioref, Keywords,Links , DOI,Searchdatabase, Technique,Methodology , Summary,file    FROM `document` where ID_Doc =" . (int)$ID;
$resxs = mysqli_query($db,$sql);

?>
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
 <h1 class="counter_value mt-12" data-target="370"> ARTICLE WORDCLOUD</h1>
                        <p class="mb-0 mt-2 text-uppercase"> Create wordcloud for article
</p>
                    </div>
                </div>
	        </div>
        </div>
</section>





<br>
<?php  foreach ( $resxs as $resx){  ?>
<?php  if  ($resx <> "" ):

     ?>
<div style="padding-left:5%;  padding-right:5%">
<table>

 <tr>
 <td> Id <td>
<td><?php echo $resx['Id_Doc'] ?></td>
</tr>
<tr>
<td> Author <td>
 <td><b><?php echo $resx['Author']; ?></td> </b>
</tr>
<tr>
<td> Title <td>
 <td><b><?php echo $resx['Title']; ?></b></td>
</tr>
<tr>
<td> Reference <td>
 <td><br><?php echo $resx['Biblioref']; ?><br><br></td>
</tr>
<tr>
<td> Link to article <td>
 <td> <a href="<?php echo $resx['Links'];?>" target="_self"</a> <?php echo $resx['Links'];?><br></td>
</tr>
<tr>
<td> Abstract <td>
 <td><?php echo $resx['Summary']; ?><br><br></td>
</tr>
<tr>
<td> Keywords <td>
 <td><?php echo $resx['Keywords']; ?><br><br></td>
</tr>	
	
 <?php   else:   echo  " Error: Id not found" ;
endif;  }?>
</table>
<hr>
<div style="padding:20px ">   <center>
    <br>

<br>
  <H2> Wordcloud: </H2>
<br>
 <img src="wordcloud/wc_<?php echo $ID ?>.png" alt="wordcloud"

</div>
</center>
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
</body>
</html>
