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

$results = mysqli_query($db,$sql);

?>
 </head>
<body>
    <?php
 include ('navbar.php');
?>
  <section class="section-sm "  >
        <div class="color-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="counter-box text-center mt-4 mt-lg-0 text-white">
                        <div class="mt-12">
                            
                        </div>
						         <br>       <br>   <br>   <br>   <br> 
 <h1 class="counter_value mt-12" data-target="370"> FIND CATEGORY  FOR ARTICLE </h1>
                        <p class="mb-0 mt-2 text-uppercase"> Analyze article and determine cultural category 
                    </div>
                </div>
	        </div>
        </div>
</section>	

<div style="padding:20px ">

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
 <td > <?php echo $result['Summary']; ?> </label>
   </td>
</tr>
 <?php   else:   echo  " Error: Id not found" ;
endif;  }?>
 </table>
	<br>
<br>
	


<br>
<center> <H2> Results: </H2>
<br>
<style> table.e-table, .e-table td { border: 1px solid grey;   } </style>

<table class="e-table" border="2" cellspacing="3"  >
<thead>

<?php
$sql1="SELECT Category  FROM `docx`where Id_Doc =" . (int)$ID;
$result1 = mysqli_query($db,$sql1);

foreach ( $result1 as $resulta){

if  ($result1 <> "" ):
$all =  str_replace ( "'","",implode(" ",$resulta));
$words=explode(",",$all) ;
?>
<td <td style="background-color:  #D3D3D3;"> <B><p>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;   Category&nbsp&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
</td>
<td style="background-color: #D3D3D3;">
<B>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;  Certainity&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;   </B>
</td>
</thead>	
<tbody>
<tr><td><b> <?php  echo $words[0] ?>  </b> </td>
<td><b> <?php echo number_format($words[1],4)  ?> </b> </td> </tr>

<tr><td><b> <?php echo $words[2] ?>  </b> </td>
<td><b><?php echo number_format($words[3],4) ?>   </b> </td> </tr>

<tr><td><b><?php echo $words[4] ?>  </b> </td>
<td><b>  <?php echo number_format($words[5],4)  ?>  </b> </td> </tr>

 <tr><td><b> <?php echo $words[6] ?>   </b> </td>
<td><b><?php echo number_format($words[7],4)  ?>    </b> </td> </tr>

<tr><td><b> <?php echo $words[8] ?>  </b> </td>
<td><b> <?php echo number_format($words[9],4)  ?>   </b> </td> </tr>

<tr><td><b> <?php echo $words[10] ?>   </b> </td>
<td><b> <?php echo number_format($words[11],4)  ?>   </b> </td> </tr>

<tr><td><b> <?php echo $words[12] ?>  </b> </td>
<td><b> <?php echo number_format($words[13],4)  ?>   </b> </td> </tr>

<tr><td><b><?php echo $words[14] ?>  </b> </td>
<td><b>  <?php echo number_format($words[15],4)  ?>  </b> </td> </tr>

<tr><td><b><?php echo $words[16] ?> </b> </td>
<td><b>   <?php echo number_format($words[17],4)  ?> </b> </td> </tr>

<tr><td><b> <?php echo $words[18] ?> </b> </td>
<td><b>  <?php echo number_format($words[19],4)  ?>   </b> </td> </tr>

<tr><td><b> <?php echo $words[20] ?>   </b> </td>
<td><b> <?php echo number_format($words[21],4)  ?>    </b> </td> </tr>

<?php
else:   echo  " Error: Data not found" ;
endif;  }?>

	</table>

</center>
<span style="font-size: xx-small"> Note: Due to lack of computing power, results have been previously created and saved in database
</span>

</div>



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
