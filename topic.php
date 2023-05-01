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

<style>
table {
    width:100%;
    border: 1px solid gray;
}

 th, td {
  border: 1px solid gray;
}
</style>

<?php
$sql="SELECT id, label, Description, Wiki_ID, AAT_ID   FROM `node` where id =" . (int)$ID;

$results = mysqli_query($db,$sql);

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
                    <div class="counter-box text-center mt-4 mt-lg-0 text-gray">
                        <div class="mt-12">
                            
                        </div>       <br>       <br>   <br>   <br>   <br> 
 <h1 class="counter_value mt-12" data-target="370">MESOC Thesaurus topic</h1>
                        <p class="mb-0 mt-2 text-uppercase"> Data representing  MESOC thesaurus topic 
</p>
                    </div>
                </div>
	        </div>
        </div>
</section>	           

 <br>
<?php  foreach ( $results as $result){
  if  ($result <> "" ): 
 
	 ?>
     
<div style="padding-left:5%;  padding-right:5%;">   

<table>
<tbody>
<tr >
  <td ><b> Id <td>
 <td><?php echo $result['id'] ?></td>
</tr>
<tr >
<td ><b> Topic <td>
 <td><H3><center><?php echo $result['label']; ?></H3></center></td>
</tr>
<tr>
<td ><b> Description <td>
 <td><i><?php echo $result['Description']; ?></i></td>
</tr>
<tr >
<td ><img src="images/Wikidata.png"  style="border: 0"><b> Wikidata Reference  <td>
 <td><a href="https://www.wikidata.org/wiki/Q<?php echo $result['Wiki_ID']; ?>" target="_self"  alt="View">  www.wikidata.org/wiki/Q<?php echo $result['Wiki_ID'];?> </a> 
</tr >
<tr >
<td > <img src="images/AAT.png"  style="border: 0"><b> Semantic view <td>
<td><a href="http://vocab.getty.edu/aat/<?php echo $result['AAT_ID']; ?>" target="_self"  alt="View">  http://vocab.getty.edu/aat/<?php echo $result['AAT_ID'];?> 
</td>
</tr>
<tr  >
<td ><img src="images/getty.png"  style="border: 0"><b> Art & Architecture Reference<td>
 <td><a href="https://www.getty.edu/vow/AATFullDisplay?find=&logic=AND&note=&subjectid=<?php echo $result['AAT_ID']; ?>" target="_self"  alt="View">  http://www.getty.edu/aat/<?php echo $result['AAT_ID'];?> 
</tr>


</table>

 <?php   else:   echo  " Error: Id not found" ;
endif;  }?>
</div>
<div style="padding-left:10%;  padding-right:10%;">
<br><center>   
<H3> Superclass :  <H3> </center>
<br>
<table style="width:100%">
<thead style=>
<tr style="background-color:#DCDCDC">
  <td style="width:10%"><b> Id </td>
   <td style="width:10%"><b> view </td>
  <td style="width:30%"><b> Topic  </td>
  <td style="width:30%"><b> Relation  </td>
  <td style="width:30%"><b>  Topic1  </td>
  </tr>
  </thead>
 <tbody>
<?php
$sql1="SELECT edge.idx, edge.od, edge.do ,node.label topic    FROM `edge`  INNER JOIN  node on edge.do =node.Id  where edge.label is null and  od =" . (int)$ID;

$results1 = mysqli_query($db,$sql1);



 foreach ( $results1 as $result1){
  if  (is_null($result1) ) {
  echo ("<td></td><td></td><td></td><td></td>")    ; }
  else   {
 
 

 ?>


<tr >

 <td><?php echo $result1['do'] ?></td>
  <td><a href="topic.php?id=<?php echo $result1['do'] ?>" target="_self"><img src="images/view1.png"  style="border: 0" alt="View"></a> </td>
 <td><?php echo $result1['topic'];?></td>

 <td>is Subclass Of  </td>
   <td>
<?php echo $result['label']; } } ?>

   </td>

</tbody>
</table>
 <br>
<center> <h3> Subclass :</h3> <center>
<table style="width:100%">
<thead style=>
<tr style="background-color:#DCDCDC">
  <td style="width:10%"><b> Id </td>
   <td style="width:10%"><b> view </td>
  <td style="width:30%"><b> Topic  </td>
  <td style="width:30%"><b> Relation  </td>
  <td style="width:30%"><b>  Topic1  </td>
  </tr>
  </thead>
 <tbody>
 <?php
$sql2="SELECT edge.idx, edge.od, edge.do ,node.label topic    FROM `edge`  INNER JOIN  node on edge.od =node.Id  where edge.label is null and  do =" . (int)$ID;

$results2 = mysqli_query($db,$sql2);



 foreach ( $results2 as $result2){
if  (is_null($result2) ) {
  echo ("<td></td><td></td><td></td><td></td>")    ; }
  else   {
 

 ?>
<tr >

 <td><?php echo $result2['od'] ?></td>
  <td><a href="topic.php?id=<?php echo $result2['od'] ?>" target="_self"><img src="images/view1.png"  style="border: 0" alt="View"></a> </td>
 <td><?php echo $result2['topic'];  ?></td>

 <td>is  Superclass Of  </td>
   <td>
 <?php echo $result['label'];}} ?>

   </td>


</tbody>
</table>

<br><center>   
<H3> Links :  <H3> </center>
<br>
<table style="width:100%">
<thead style=>
<tr style="background-color:#DCDCDC">
  <td style="width:5%"><b> Id </td>
   <td style="width:5%"><b> view </td>
  <td style="width:10%"><b> Topic  </td>
  <td style="width:20%"><b> Relation  </td>
  <td style="width:10%"><b>  Topic1  </td>
    <td style="width:50%"><b>  Document  </td>
  </tr>
  </thead>
 <tbody>
 <?php
$sql3="SELECT edge.idx, edge.od, edge.do ,node.label topic , lower(edge.label) label, edge.ID_Doc  IDx  FROM `edge`  INNER JOIN  node on edge.od =node.Id  where edge.label is not null and  do =" . (int)$ID;

$results3 = mysqli_query($db,$sql3);



 foreach ( $results3 as $result3){
if  (is_null($result3) ) {
  echo ("<td></td><td></td><td></td><td></td>")    ; }
  else   {   
 
 $ID_DOC= $result3['IDx']; ?>
 <tr >

 <td><?php echo $result3['od'] ?></td>
  <td><a href="topic.php?id=<?php echo $result3['od'] ?>" target="_self"><img src="images/view1.png"  style="border: 0" alt="View"></a> </td>
 <td><?php echo $result3['topic'];  ?></td>

 <td><?php echo $result3['label'];  ?> </td>
   <td>
 <?php echo $result['label'];} ?>
</td>
<td>
<?php 


$sql4="SELECT ID_Doc, Title  FROM `document` where ID_Doc  in (" . $ID_DOC ." )";

   $results4 = mysqli_query($db,$sql4);

 foreach ( $results4 as $result4){
     if  (!is_null( $result4['Title']) )    {
          ?>
          <a href="article.php?id=<?php echo $result4['ID_Doc'] ?>" target="_self"><img src="images/view.png"  style="border: 0" alt="View"></a>
          <?php echo  $result4['Title'] ?>  <br>
 <?php  }} }?>
</td>


<?php
$sql5="SELECT edge.idx, edge.od, edge.do ,node.label topic,lower(edge.label) label, edge.ID_Doc IDx    FROM `edge`  INNER JOIN  node on edge.do =node.Id  where edge.label is not null and  od =" . (int)$ID;

$results5 = mysqli_query($db,$sql5);



 foreach ( $results5 as $result5){
  if  (is_null($result5) ) {
  echo ("<td></td><td></td><td></td><td></td>")    ; }
  else   {
 
  $ID_DOC1= $result5['IDx'];

 ?>


<tr >



 <td><?php echo $result5['do'] ?></td>
  <td><a href="topic.php?id=<?php echo $result5['do'] ?>" target="_self"><img src="images/view1.png"  style="border: 0" alt="View"></a> </td>
 <td><?php echo $result['label'];  ?></td>

 <td><?php echo $result5['label'];  ?> </td>
   <td>
 <?php echo  $result5['topic']; ?>
</td>
<td>
<?php 


$sql6="SELECT ID_Doc, Title  FROM `document` where ID_Doc  in (" . $ID_DOC1 ." )";

   $results6 = mysqli_query($db,$sql6);

 foreach ( $results6 as $result6){
     if  (!is_null( $result6['Title']) )    {
          ?>
          <a href="article.php?id=<?php echo $result6['ID_Doc'] ?>" target="_self"><img src="images/view.png"  style="border: 0" alt="View"></a>
          <?php echo  $result6['Title'] ?>  <br>
  <?php  }}} }?>
</td>












 </td>

</tbody>
</table>

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


</html>
