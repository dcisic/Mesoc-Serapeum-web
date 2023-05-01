<?php
 include ('header.php');
 include('db.php');
  mysqli_set_charset($db,"utf8");
  include ('links.php');
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
 <h1 class="counter_value mt-12" data-target="370"> ARTICLE&nbsp;SEMANTIC&nbsp;SEARCH</h1>
                        <p class="mb-0 mt-2 text-uppercase"> Ask question to get semantically found answer using AI
</p>
                    </div>
                </div>
	        </div>
        </div>
</section>	

<div style="padding:20px ">

<br>


<br>


<?php  foreach ( $resxs as $resx){  ?>
<?php  if  ($resx <> "" ):

     ?>
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
<tr>
<td> Abstract <td>
 <td > <?php echo $resx['Summary']; ?> </label>
   </td>
</tr>
 <?php   else:   echo  " Error: Id not found" ;
endif;  }?>
</table>
<hr>

  <form id="botun">
      <div class="row">
		 <center> <b> Question:</b> <input id="Quest" name="quest" size="80">
        <button id='Search' type="button" onclick="fetch()">
         <center>   Search  </button>
         <button id='Refresh' type="button" hidden="hidden" onclick="refresh()">
         <center>   Refresh  </button>
      </div>
    </form>
 <center><B><p id="show"> </p> </center> </b>
<H2> <center> Answer</H2></center>
 <br>
 <script language="javascript">
 function refresh(){
    window.location.reload();
     document.getElementById("Search").removeAttribute("hidden");
     document.getElementById("Refresh").setAttribute("hidden", "hidden");
}
</script>



 <script language="javascript">

function fetch(){
     document.getElementById("show").innerHTML = "Your data is being processed. It generally takes 5-10 minutes to get answers. So kindly be patient. <br> <center><img src='images/Preloader_10.gif' style='width: 64px; height: 64px;'></center>";
$(document).ready(function(){



            var id=<?php echo $ID ?>;

$.ajax({
					type: 'GET',
					url: <?php echo $link ; ?>questId?id='+id+'&quest="'+document.getElementById("Quest").value+'"',
                    success: function(response) {
                       var tr_str=' ';
                             for(var i = 0; i < response.length; i++) {

                                tr_str = tr_str+

                                "<tr bgcolor='#D7D7D7'><td>Answer:</td><td> <b>" + response[i].Answer + "</B></td></tr>" +
                                 "<tr> <td>Confidence: </td><td><B><center>" + response[i].Distance.toFixed(2) + "</td></tr></center></B>" +
                                 "<tr><td>Context:</td><td><i> "+ response[i].Context + "</i></td></tr>";
                                                              }

                             $("#Answer tbody").append(tr_str);


                    document.getElementById("show").innerHTML ="";
                    document.getElementById("Search").setAttribute("hidden", "hidden");
                    document.getElementById("Refresh").removeAttribute("hidden");
	},
					timeout: 500000,
					error: function(request,status, error) {
                        document.getElementById("show").innerHTML ="";

}

				});
                event.preventDefault();
        	} );
          }



 </script>

  <div class="container">
 <table id="Answer" border="1"  >


     <tbody > </tbody>

 </table>  <p id="Answer"  > </p>

   <hr>
   <p id='test'> </p>


</div>
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
