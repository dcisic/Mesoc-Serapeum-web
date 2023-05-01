<?php
 include ('header1.php');
 include('db.php');
 mysqli_set_charset($db,"utf8");
 session_start();
global $XOVER;
if (isset($_POST["XOVER"])) {
			$XOVER=$_POST["XOVER"];
			$_SESSION["XOVER"]=$XOVER;
			}

if ( !isset($XOVER)) {  $XOVER=53;}

?>
<html>
<head>
 <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js "></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js "></script>

<style> <?php include "https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"; ?> </style>
<style> <?php include "https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css "; ?> </style>
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
        <div class="color-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="counter-box text-center mt-4 mt-lg-0 text-white">
                        <div class="mt-12">
                            
                        </div>      <br>       <br>   <br>   <br>   <br> 
 <h1 class="counter_value mt-12" data-target="370">CULTURAL DOMAIN SEARCH</h1>
                        <p class="mb-0 mt-2 text-uppercase">Search the documents and data on cultural domain</p>
                    </div>
                </div>
	        </div>
        </div>
</section>	           
<br>

 	<form action = "<?PHP echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<p   align="center">    <b> Domain:</b>
			<select  name="XOVER" onchange="this.form.submit();" >
				<?php

				$query1="select * from culturaldomain";
                $ressx = mysqli_query($db,$query1);
                foreach ( $ressx as $row ){


					unset($idx, $name);
					$idx = $row['ID_CultDomain'];
					$name = $row['CultDomainName'];
					if ($idx == $XOVER) {
				?>
				<option   value="<?php echo $idx ; ?>"  selected ><?php echo $name ?> </option>

				<?php  } else {
				?>
				<option value="<?php echo $idx ; ?>" ><?php echo $name ?> </option>

				<?php          }
		}
				?>


			</select>


          </p>

		</form><b>




<br>

<?php
$sql="SELECT Id_Doc, Author,Title,Keywords,Links FROM `document` where ID_doc in ( select Id_Doc from documentculturaldomain where documentculturaldomain.ID_CultDomain = ". (int)$XOVER .")";
$results = mysqli_query($db,$sql);
?>
<div style="padding-left:5%;  padding-right:5%;"> 

<table id="Article" class="display" >
 <thead>
 <tr>
 <th>Id</th>
   <th> View</th>
 <th>Author</th>
  <th>Title</th>
  <th>Keywords </th>
  <th>Link </th>
 </tr>
 </thead>
 <tbody>
 <tr>
 <?php  foreach ( $results as $result){
	 
 ?>
  <td><?php echo $result['Id_Doc'] ?></td>
   
  <td><a href="article.php?id=<?php echo $result['Id_Doc'] ?>" target="_self"><img src="images/view.png"  style="border: 0" alt="View"></a> </td>
  <td><?php echo $result['Author'] ?></td>
  <td><?php echo $result['Title'] ?></td>
  <td><?php echo $result['Keywords'] ?></td>
  <td><a href="<?php echo $result['Links'] ?>" target="_self" ">Article</a></td>
 </tr>
<?php } ?>
 </tbody>
</table>

<script type="text/javascript">
$(document).ready(function() {
    $('#Article').DataTable();
} );
</script>
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
