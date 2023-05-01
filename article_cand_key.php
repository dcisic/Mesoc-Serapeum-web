<?php
 include ('header1.php');
 include('db.php');
  mysqli_set_charset($db,"utf8");
$ID = $_GET['id'];



?>

<html>
<head>
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js "></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js "></script>

<style> <?php include "https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"; ?> </style>
<style> <?php include "https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css "; ?> </style>
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
$sql="SELECT Id_Doc, Author,Title,Biblioref, Links, Summary   FROM `document`where Id_Doc =" . (int)$ID;

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
 <h1 class="counter_value mt-12" data-target="370"> ARTICLE - CANDIDATE TRANSITION   VARIABLES</h1>
                        <p class="mb-0 mt-2 text-uppercase"> Display candidate transaction variables for article
</p>
                    </div>
                </div>
	        </div>
        </div>
</section>	

<div style="padding:20px " >

<br>

<?php  foreach ( $resxs as $resx){  ?>
<?php  if  ($resx <> "" ):

     ?>
<div style="padding-left:5%;  padding-right:5%;">
<table>
<tbody>
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
<td> Link to article <td>
 <td> <a href="<?php echo $resx['Links'];?>" target="_self"</a> <?php echo $resx['Links'];?><br></td>
</tr>
<tr>
<td> Abstract <td>
 <td><?php echo $resx['Summary']; ?><br><br></td>
</tr>
 <?php   else:   echo  " Error: Id not found" ;
endif;  }?>
</table>
<br>
</div>
<center> <H2> Results: </H2>


<?php
$sql="SELECT * FROM `function` where ID_Doc= ". (int)$ID;

$results = mysqli_query($db,$sql);
?>
<div style="padding-left:5%;  padding-right:5%;">
<table id="Article" class="display" >
 <thead>
 <tr>
  <th>Candidate transition variables </th>
  </tr>
 </thead>


 <tbody>
    <tr>
 <?php  foreach ( $results as $result)
 {  ?>
   <td><b><?php echo $result['sentence'] ?><b></td>
 </tr>
<?php } ?>
 </tbody>
</table>


<script type="text/javascript">
$(document).ready(function() {
    $('#Article').DataTable();
} );
</script>

</article></div>

      <br>
</div>



<div style="padding:0px ">
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
