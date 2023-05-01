<?php
 include ('header1.php');
 include('db.php');
 mysqli_set_charset($db,"utf8");
 session_start();

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
                            
                        </div>   <br>       <br>   <br>   <br>   <br> 
 <h1 class="counter_value mt-12" data-target="370"> CANDIDATE TRANSITION VARIABLES</h1>
                        <p class="mb-0 mt-2 text-uppercase">Candidate transition variables 
</p>
                    </div>
                </div>
	        </div>
        </div>
</section>		
<br>

 

<?php
$sql="SELECT * FROM `function`  " ;

$results = mysqli_query($db,$sql);
?>
<div style="padding-left:5%;  padding-right:5%;">
<table id="Article" class="display" >
 <thead>
 <tr>
 <th>Article</th>
 <th>Authors </th>
 <th>Title </th>
 <th>Candidate transition variable </th>
 </tr>
 </thead>

 <tbody>
 <?php  foreach ( $results as $result)
 {

  $sql1="SELECT Title, Author FROM `document` where ID_doc = " . $result['ID_Doc'] ;
  $docum =  mysqli_query($db,$sql1);
  ?>

  <tr>
  <td><a href="article.php?id=<?php echo $result['ID_Doc'] ?>"" target="_self"><img src="images/view.png"  style="border: 0" alt="View"></a>  </td>
  <?php  foreach ( $docum as $doc) {     ?>
  <td><?php echo $doc['Author'] ?></td>
  <td><?php echo $doc['Title']  ?></td>
   <?php } ?>
  <td><b><?php echo $result['sentence'] ?></td></b>
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

