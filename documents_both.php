<?php
session_start();
 include ('header1.php');
 include('db.php');
  mysqli_set_charset($db,"utf8");


if (isset($_POST["DOMAIN"])) {
			$DOMAIN=$_POST["DOMAIN"];
}
if ( !isset($DOMAIN)) {  $DOMAIN=53;}
if (isset($_POST["IMPACT"])) {
			$IMPACT=$_POST["IMPACT"];

			}
if ( !isset($IMPACT)) {  $IMPACT=1;}



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
                            
                        </div>     <br>       <br>   <br>   <br>   <br> 
 <h1 class="counter_value mt-12" data-target="370">COMBINED  SEARCH</h1>
                        <p class="mb-0 mt-2 text-uppercase">Search the documents and data by social impact and   cultural domain</p>
                    </div>
                </div>
	        </div>
        </div>
</section>	           
<br>

 	<form id="K1" name="DOMAIN" action = "<?PHP echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<p   align="center">
			<select id="D" name="DOMAIN" onchange="GetValues();" >
				<?php

				$query1="select * from culturaldomain";
                $ressx = mysqli_query($db,$query1);
                foreach ( $ressx as $row ){


					unset($id, $name);
					$id = $row['ID_CultDomain'];
					$name = $row['CultDomainName'];
					if ($id == $DOMAIN) {
				?>
				<option   value="<?php echo $id ; ?>"  selected ><?php echo $name ?> </option>

				<?php  } else {
				?>
				<option value="<?php echo $id ; ?>" ><?php echo $name ?> </option>

				<?php          }
		}
				?>


			</select>

              	<select id="I" name="IMPACT" onchange="GetValues();" >
				<?php

				$query1="select * from socialimpact";
                $ressx = mysqli_query($db,$query1);
                foreach ( $ressx as $row ){


					unset($id, $name);
					$id = $row['ID_SocImpact'];
					$name = $row['SocImpactName'];
					if ($id == $IMPACT) {
				?>
				<option   value="<?php echo $id ; ?>"  selected ><?php echo $name ?> </option>

				<?php  } else {
				?>
				<option value="<?php echo $id ; ?>" ><?php echo $name ?> </option>

				<?php          }
		}
				?>


			</select>
            <input id="DOMAIN" name="DOMAIN" type="hidden" value=" ">

            <input id="IMPACT"  name="IMPACT" type="hidden" value=" ">
          </p>

		</form>

<script>
function GetValues(){
document.getElementById("DOMAIN").value = document.getElementById("D").options[document.getElementById("D").selectedIndex].value;
document.getElementById("IMPACT").value = document.getElementById("I").options[document.getElementById("I").selectedIndex].value;
document.getElementById('K1').submit();
}
</script>
<br>
<div style="padding:20px ">
<?php

$sql="SELECT Id_Doc, Author,Title,Keywords,Links FROM document where ID_Doc in ( select documentsocialimpact.Id_Doc from documentculturaldomain INNER JOIN  documentsocialimpact  where documentsocialimpact.ID_Doc = documentculturaldomain.ID_Doc  and  documentculturaldomain.ID_CultDomain = ". (int)$DOMAIN ." and documentsocialimpact.ID_SocImpact=". (int)$IMPACT .")";

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
  <td><a href="<?php echo $result['Links'] ?>" target="_self" >Article</a></td>
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
