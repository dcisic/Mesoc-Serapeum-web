
<?php
 include ('header.php');
 include('db.php');
 mysqli_set_charset($db,"utf8");
 include ('links.php');

?>
<?php header('Access-Control-Allow-Origin: *'); ?>
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
  background-color: #e6e3e5;
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
 <h1 class="counter_value mt-12" data-target="370"> SEMATIC SEARCH ON  ARTICLES BY ABSTRACT </h1>
                        <p class="mb-0 mt-2 text-uppercase">Find files that are similar as  abstract of other paper</p>
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
        <center><H2>  <b> Insert abstract of paper: </B></H2>
        <button id='Search' type="button" onclick="fetch()">
         <center>   Search  </button>
          <button id='Refresh' type="button" hidden="hidden" onclick="refresh()">
         <center>   Refresh  </button>
      </div>
    </form>
	<textarea form ="botun" name="quest" id="Quest" cols="80" rows= "10" wrap="soft"></textarea>
<center><B><p id="show"> </p> </center> </b>

<H2> 
Articles:</H2></center>
 <br>
<script language="javascript">
 function refresh(){
    window.location.reload();
     document.getElementById("Search").removeAttribute("hidden");
     document.getElementById("Refresh").setAttribute("hidden", "hidden");
	  document.getElementById("Article").setAttribute("hidden", "hidden");
}
 </script>

 <script language="javascript">

function fetch(){

document.getElementById("show").innerHTML ="Your data is being processed. It generally takes 2-3 minutes to get answers. So kindly be patient. <br> <center><img src='images/preloader.gif' style='width: 64px; height: 64px;'></center>";
$(document).ready(function(){




$.ajax({            datatype:'json',
					type: 'GET',
					url: <?php echo $link ; ?>vecsrch1?quest='+document.getElementById("Quest").value,
                    success: function(response) {

               for(var i=0; i<10; i++){

                var tr_str =
                    "<tr ><td align='center'><a href='article.php?id="+response[i].ID_Doc + "' ><img src='images/view.png'  style='border: 0' alt='View'></a></td>" +
                    "<td align='center'>" + response[i].ID_Doc + "</td>" +
                    "<td align='center'>" + response[i].Distance.toFixed(2) + "</td>" +
                    "<td align='center'><b>" + response[i].Title + "</B></td> </tr>";

                $("#Article tbody").append(tr_str);
				
            }
							 document.getElementById("show").innerHTML = "";
                             document.getElementById("Search").setAttribute("hidden", "hidden");
                             document.getElementById("Refresh").removeAttribute("hidden");
							document.getElementById("Article").removeAttribute("hidden");

                    
	},
					timeout: 500000,
					error: function(request,status, error) {
                        document.getElementById("show").innerHTML ="The server is down. Please try again in a few minutes";
				    }
				});
                e.preventDefault();
        	} );
          }



 </script>

  <div class="container">
   <table id="Article" border=1px  hidden="hidden">
     <thead> <th width='10%'><center>   </th>
           <th width='10%'><center> ID </th>
     <th width='20%'><center>Distance</th>
     <th width='60%'><center>Document  title</th> </tr>
     </thead>
      <tbody></tbody>
   </table>


</div>
</div>
 <div>
<p id="display1"> </p>
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
