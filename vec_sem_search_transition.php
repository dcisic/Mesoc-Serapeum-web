
<?php
 include ('header.php');
 include('db.php');
 mysqli_set_charset($db,"utf8");
 include ('links.php');

?>
<?php header('Access-Control-Allow-Origin: *'); ?>
<html>
<head>
<meta charset="utf-8">
<script src="js/jquery.js"></script>

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
<style>
table {
  table-layout: fixed;
  width: 100%;
  border-collapse: collapse;
  border: 1px solid black;
}
thead{
    background-color: #dbd9db
}

tbody tr:nth-child(odd) {
  background-color: #ffffff;
  border: 1px solid black;
}

tbody tr:nth-child(even) {
  background-color: ""e6e3e5;
  border: 1px solid black;
}
</style>
<title>MESOC Serapeum  | Where culture meets AI </title>
 <link rel="shortcut icon" href="images/favicon.ico">
 <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

 </head>
<body>
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
                            
                        </div>    <br>       <br>   <br>   <br>   <br> 
 <h1 class="counter_value mt-12" data-target="370"> SEMATIC SEARCH ON  TRANSITION VARIABLES</h1>
                        <p class="mb-0 mt-2 text-uppercase">Find sentences that  best represent the query
</p>
                    </div>
                </div>
	        </div>
        </div>
</section>	


<br>
<br>
<br>
<br>
<br>
<center>
<div style="padding-left:10% ">
<center>  <form id="botun">
      <div class="row"><p>
           Search  query: <input id="Quest" name="quest" size="80">
        <button id='Search' type="button" onclick="fetch()">
         <center>   Search  </button>
          <button id='Refresh' type="button" hidden="hidden" onclick="refresh()">
         <center>   Refresh  </button>
      </div>
    </form>
<center><B><p id="show"> </p> </center> </b>

<H2> 
 <br>

<H2> <center> Result</H2></center>

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





$.ajax({
					type: 'GET',
					url: <?php echo $link ; ?>vecsrch3?quest='+'"'+document.getElementById("Quest").value+'"',
                    success: function(response) {
                       var tr_str=' ';
                             for(var i = 0; i < response.length; i++) {

                                tr_str = tr_str+
                                "<tr ><td style='width:20%'> <a href='article.php?id="+response[i].ID_Doc+"'><img src='images/view.png'  >"+response[i].ID_Doc+"</a> </td><td style='width:80%'><i></i> <p style='color:blue'>"+ response[i].Title +"</i></td></tr>" +
                                "<tr><td>Answer:</td><td> <b>" + response[i].Answer + "</B></td></tr>" +
                                "<tr><td>Confidence:</td><td> " + response[i].Distance.toFixed(2) + "</td></tr>" +
                                "<tr><td>Context:</td><td> "+ response[i].Context + "</td></tr>";
                                                              }

                             $("#Answer tbody").append(tr_str);


                    document.getElementById("show").innerHTML ="";
                    document.getElementById("Search").setAttribute("hidden", "hidden");
                    document.getElementById("Refresh").removeAttribute("hidden");
	},
					timeout: 500000,
					error: function(request,status, error) {
                        document.getElementById("show").innerHTML ="The server is down. Please try again in a few minutes";

}

				});
                event.preventDefault();
        	} );
          }



 </script>
<div class="container">
 <table id="Answer" style="border-size: 1px;">
     <tbody> </tbody>

 </table>  <p id="Answer"  > </p>

   <br>
   <p id='test'> </p>


</div>
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
