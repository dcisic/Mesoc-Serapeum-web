<?php
 include ('header1.php');

include('db.php');
 

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





   

<script
      type="text/javascript"
      src="https://unpkg.com/vis-network/standalone/umd/vis-network.min.js"
    ></script>
    

<link rel="stylesheet" href="dist/themes/default/style.min.css" />

 </head>
<body>
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
                            
                        </div>       <br>       <br>   <br>   <br>   <br> 
 <h1 class="counter_value mt-12" data-target="370">MESOC Taxonomy</h1>
                        <p class="mb-0 mt-2 text-uppercase">Mesoc taxonomy - dblclick on topic to open treview. 
</p>
                    </div>
                </div>
	        </div>
        </div>
</section>	           

 <br>
<hr>
     
<div style="padding-left:5%;  padding-right:5%;">   
	
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="dist/jstree.min.js"></script>

						<div id="using_json_2" class="demo jstree jstree-4 jstree-default" role="tree" aria-multiselectable="true" tabindex="0" aria-activedescendant="MESOC" aria-busy="false"><ul class="jstree-container-ul jstree-children" role="group"></div>
	<script>
$(function () {
$('#using_json_2')
.on('changed.jstree', function (e, data) {
			var i, j, r = [];
			for(i = 0, j = data.selected.length; i < j; i++) {
			  r.push(data.instance.get_node(data.selected[i]).data);
			}
			window.open("topic.php?id=" + data.node.id ,"_self");
		  })


.jstree({ 'core' : { 
 'data' : [
{ "id" : 0, "parent" : "#", "text" : "MESOC" ,"state" : { "opened" : true }},
<?php 
$sql = "SELECT  `id`,`label`,`grupa` from node where id in  (3,10,35,48,57,92,110)";							      $results = mysqli_query($db,$sql);
foreach ( $results as $result){ ?>
{ id:  <?php  echo( $result['id'])?> ,"parent" : 0, "text" : "<?php  echo( $result['label'])?>","state" : { "opened" : true } },
<?php   }							    
$sql1 = "SELECT node.id , node.label, node.grupa, edge.od   from node LEFT join edge ON node.id=edge.do where node.id not in "
. "(3,10,35,48,57,92,110) and edge.label IS NULL "
. " order by grupa ,od ";
$results1 = mysqli_query($db,$sql1);		
foreach ( $results1 as $result1){
	 ?>
{ id:  <?php  echo( $result1['id'])?> ,"parent" :  <?php  echo( $result1['od'])?>, "text" : "<?php  echo( $result1['label'])?>" },		
<?php } 
?>	


	
								   
							    ]


		
							} 
							
							
							
							
							});
					
  
    } )	;					
						</script>
						
<hr>	
 </section>
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
