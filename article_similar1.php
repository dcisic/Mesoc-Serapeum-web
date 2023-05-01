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
<style>
table.dataTable.stripe tbody tr.odd, table.dataTable.display tbody tr.odd {
  background-color: #d2d2d2;
</style>
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
$sql="SELECT document.Id_Doc, document.Author,document.Title,document.Biblioref,document.Summary, document.Links,body_topic.Topic,body_topic.Percent    FROM `document` INNER JOIN body_topic on document.ID_Doc = body_topic.ID_Doc where document.Id_Doc =" . (int)$ID . " order by body_topic.Percent asc";

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
 <h1 class="counter_value mt-12" data-target="370"> FIND SIMILAR ARTICLES </h1>
                        <p class="mb-0 mt-2 text-uppercase"> Find similar articles based on semantic search 
</p>
                    </div>
                </div>
	        </div>
        </div>
</section>	

<div style="padding:20px ">
<br>
 <?php  foreach ( $results as $result){   if  ($result <> "" ): 	 ?>
<div style="padding-left:5%;  padding-right:5%">
<table id='tqb'>
</tr>

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
<td> Link to article <td>
 <td> <a href="<?php echo $result['Links'];?>" target="_self"</a> <?php echo $result['Links'];?><br></td>
</tr>
<tr>
<td> Abstract <td>
 <td><?php echo $result['Summary']; ?><br><br></td>
</tr>
<tr>

<br><br></td>
</tr>
	

 <?php 
$TOPIC= (string)$result['Topic'];
 else:   echo  " Error: Id not found" ;
endif;  }?>
</table>
	
<?php
 	

$sqlx="select paper_similar.doc2 ID ,document.Title Titl,document.Author Author,paper_similar.Distance Distance From paper_similar INNER JOIN document on paper_similar.Doc2 =document.ID_Doc where paper_similar.Doc1 = ".(string)$ID	; 
 

$resultx = mysqli_query($db,$sqlx);
 
	 ?>
	 


<hr>
<center> <H2> Results: </H2><br>
Smaller Distance better similarity

</center>
<br>
<div style="padding-left:5%;  padding-right:5%">
<table id="Article" class="display" >
 <thead>

<th>Id</th>
<th>View</th>
<th>Author</th>
<th>Title</th>
<th> Distance</th>
 </thead>
 <tbody>
<?php foreach ( $resultx as $resx){ ?>
 <tr>
 

  <td><?php echo $resx['ID'] ?></td>
  <td><a href="article_anal.php?id=<?php echo $resx['ID'] ?>" target="_self"><img src="images/b_report.png" width="16" height="16" style="border: 0" alt="View"></a>  </td>
  <td><?php echo $resx['Author'] ?></td>
  <td><?php echo $resx['Titl'] ?></td>
<td><?php echo $resx['Distance']?></td>
  </tr>
<?php } ?>
 </tbody>
</table>

<script type="text/javascript">
$(document).ready(function() {
    $('#Article').DataTable();
} );
</script>


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
