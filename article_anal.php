<?php
 include ('header1.php');
 include('db.php');
 mysqli_set_charset($db,"utf8");
$ID = $_GET['id'];

?>
<html>
<head>


<?php
$sql="SELECT Id_Doc, Author,Title,Biblioref, Keywords,Links , DOI,Searchdatabase, Technique,Methodology , Summary,file    FROM `document` where ID_Doc =" . (int)$ID;

$results = mysqli_query($db,$sql);

?>

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
 <style>
.tooltipx {
  position: relative;
  display: inline-block;

}

.tooltipx .tooltiptext {
  visibility: hidden;
  width: 180px;
  background-color: navy;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;

  /* Position the tooltip */
  position: absolute;
  top:70px;
  z-index: 30;
}

.tooltipx:hover .tooltiptext {
  visibility: visible;
}
</style>
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
 <h1 class="counter_value mt-12" data-target="370"> ARTICLE ANALYSIS</h1>
                        <p class="mb-0 mt-2 text-uppercase"> Analysis of article using Artificial Intelligence tools
</p>
                    </div>
                </div>
	        </div>
        </div>
</section>	

<div style="padding-left:5%;  padding-right:5%;">

<br>


<br>
 <?php  foreach ( $results as $result){  ?>
<br>
<?php  if  ($result <> "" ): 
 
	 ?>
     <br>
<table>
<tbody>
 <tr>
  <td> Id <td>
 <td><?php echo $result['Id_Doc'] ?></td>
</tr>
<tr>
<td> Author <td>
 <td><?php echo $result['Author']; ?></td>
</tr>
<tr>
<td> Title <td>
 <td><b><?php echo $result['Title']; ?></b></td>
</tr>
<tr>
<td> Reference <td>
 <td><br><br><?php echo $result['Biblioref']; ?><br><br></td>
</tr>
<tr>
<td> Keywords <td>
 <td><?php echo $result['Keywords']; ?><br></td>
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
<td> Metodology <td>
 <td><?php echo $result['Methodology']; ?><br><br></td>
</tr>
<td> Technique <td>
 <td><?php echo $result['Technique'] ;?></td>
</tr>

<?php endif;}  ?>
</table>
  <script>
function showText(text){
    document.getElementById("text").innerHTML=text;
}
function hide(){
    document.getElementById("text").innerHTML="";
}
</script>
<br>
<center>

<div class="tooltipx">
<a href="article_method.php?id=<?php echo $ID ?>"><img src="images/method.png" width="64" height="64" style="border: 0" alt="Keyword"></a>
 <span class="tooltiptext">Find research methods used</span>
</div>

<div class="tooltipx">
<a href="article_cand_key.php?id=<?php echo $ID ?>"><img src="images/keyt.png" width="64" height="64" style="border: 0" alt="Tentative Keyword"></a>
<span class="tooltiptext">Show Candidate Transition Variables for article (AI method)</span>
</div>
<?php  if ( $result['file'])   { ?>
<div class="tooltipx">
<a href="article_summary.php?id=<?php echo $ID ?>"><img src="images/summary.png" width="64" height="64" style="border: 0" alt="Summary"></a>
<span class="tooltiptext">Summary for article (AI method)</span>
</div>
<?php }  ?>
<div class="tooltipx">
<a href="article_category.php?id=<?php echo $ID ?>"><img src="images/categories.png" width="64" height="64" style="border: 0" alt="Categories"></a>
<span class="tooltiptext">Find category for article (AI method)</span>
</div>

<div class="tooltipx">
<a href="article_crossover.php?id=<?php echo $ID ?>"><img src="images/crosover.png" width="64" height="64" style="border: 0" alt="Crossover theme"></a>
<span class="tooltiptext">Find social impact for article (AI method)</span>
</div>

<div class="tooltipx">
<a href="article_wc.php?id=<?php echo $ID?>"><img src="images/40.png" width="64" height="64" style="border: 0" alt="Wordcloud"></a>
  <span class="tooltiptext">Show WordCloud  from article (AI method)</span>
</div>
<?php  if ( $result['file'])   { ?>
 <div class="tooltipx">
<a href="article_semantic.php?id=<?php echo $ID?>"><img src="images/keyword sem.png" width="64" height="64" style="border: 0" alt="Article semantic search"></a>
 <span class="tooltiptext">Article semantic search (AI method)</span>
</div>
<?php }  ?>

 <div class="tooltipx">
<a href="article_similar1.php?id=<?php echo $ID?>"><img src="images/simil.png" width="64" height="64" style="border: 0" alt="Find semantically similar articles"></a>
 <span class="tooltiptext">Find semantically similar articles (Semantic search)</span>
</div>
<?php  if ( $result['file'])   { ?>
<div class="tooltipx">
<a href="article_kg.php?id=<?php echo $ID?>"><img src="images/88.png" width="64" height="64" style="border: 0" alt="Similar articles"></a>
 <span class="tooltiptext">Knowledge graph for article</span>
</div>
<?php }  ?>

</div>


<div style="padding-left:0px ">
<br>
<br>
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
