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
$sql="SELECT Id_Doc, Author,Title,Biblioref, Keywords,Links , DOI,Searchdatabase, Technique,  Summary,file    FROM `document` where ID_Doc =" . (int)$ID;

$results = mysqli_query($db,$sql);

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
 <h1 class="counter_value mt-12" data-target="370"> RESEARCH METHODS</h1>
                        <p class="mb-0 mt-2 text-uppercase"> Analysis of article to determine research methods used
</p>
                    </div>
                </div>
	        </div>
        </div>
</section>	

<div style="padding:20px ">

<br>


<br>
<br>
 <?php  foreach ( $results as $result){  ?>
<br>
<?php  if  ($result <> "" ):

	 ?>
     <Hr>
<table>
<tbody>
 <tr>
  <td> Id : <td>
 <td><?php echo $result['Id_Doc'] ?></td>
</tr>
<tr>
<td><br> Author : <td>
 <td><?php echo $result['Author']; ?></td>
</tr>
<tr>
<td><br> Title <td>
 <td><b><br><br><?php echo $result['Title']; ?></b></td>
</tr>
<tr>
<td> <br>Reference : <td>
 <td><br><br><?php echo $result['Biblioref']; ?><br><br></td>
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

</tr>
 <?php   else:   echo  " Error: Id not found" ;
endif;  }?>
 </table>
<center> <H2> Results:</H2></Center>

<H3>
 <hr>
 <b>Metodology:
 <br>
 <br>
 <center><b>
<p style="color:darkblue;"	><center><B>
<?php
$sql1="SELECT Study  FROM `docx`where Id_Doc =" . (int)$ID;
$result1 = mysqli_query($db,$sql1);

foreach ( $result1 as $resulta){

if  ($result1 <> "" ):
echo $resulta['Study']  ;
else:   echo  " Error: Data not found" ;
endif;  }?>
	</p> </H3>
 <hr>
   </div>
<span style="font-size: xx-small"> Note: Due to lack of computing power, results have been previously created and saved in database
</span>





</div>



<div style="padding-left:0px ">
	   <!-- START FOOTER -->
    <section class="bg-footer bg-yellow">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-6">
                    <div class="text-sm-start mt-3 mt-sm-0">
                        <img src="images/logo-dark.png" alt="" height="25" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-sm-end mt-3 mt-sm-0">
                        <p class="text-muted mb-0">2021 ©  CD</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
