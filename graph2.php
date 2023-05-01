<?php
 include ('header1.php');
 #include('db.php');
  $db=mysqli_connect ("localhost","root","","serapeum")
 

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
    <style type="text/css">
      #mynetwork {
        width: 1600px;
        height: 1400px;
        border: 1px solid lightgray;
      }
    </style>


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
 <h1 class="counter_value mt-12" data-target="370">MESOC Taxonomy graph</h1>
                        <p class="mb-0 mt-2 text-uppercase">Graph depicting all structured resources  and links that can be used to improve information for MESOC terms. 
</p>
                    </div>
                </div>
	        </div>
        </div>
</section>	           

 <br>

     
<div style="padding-left:5%;  padding-right:5%;">   
<center> Result is slow due to computing power. Please wait </center>


  <div id="mynetwork"><div class="vis-network" tabindex="0" style="position: relative; overflow: hidden; touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); width: 100%; height: 100%;"><canvas width="600" style="position: relative; touch-action: none; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); width: 100%; height: 100%;" height="400"></canvas></div></div>



<script type="text/javascript">
 var network;
      var allNodes;
      var highlightActive = false;
var nodes = new vis.DataSet([
<?php
$sql = "SELECT * FROM `node` WHERE id  in( select od from edge where  label is not NULL) or id  in( select do from edge where  label is not NULL)";
$results = mysqli_query($db,$sql);
 foreach ( $results as $result){
	 ?>
	 { id:  <?php  echo( $result['id'])?> , label: "<?php  echo($result['label'])?>",  group:<?php  echo($result['grupa']) ?>, shape:"elipse", size: 20, title :"<?php  echo($result['label'])?>", } ,

<?php  } ?>
]);

     

    

var edges =  new vis.DataSet([ 
<?php
$sql1="SELECT * FROM `edge` where label is not NULL ";
$results1 = mysqli_query($db,$sql1);

 foreach ( $results1 as $resultx){
 if (is_null($resultx['label'])) {
 ?>
{ from: <?php  echo($resultx['od'])?>,  to:<?php echo($resultx['do'])?> },
<?php 
 }
else{ ?>
{ from: <?php  echo($resultx['od'])?>,  to:<?php echo($resultx['do'])?> , label:  "<?php  echo($resultx['label'])?>" },
<?php
 } } 
?>
 ]);
  // create a network
var options = {
	nodes: {
            shape:"circle",
           size: 30,
            font: {
              size: 20,
              face: "Tahoma",
            },
          },
  edges:{

    font: '12px arial #ff0000',
    scaling:{
      label: true,
    },
 
    smooth: true,
  }
}

  var container =  document.getElementById('mynetwork');
  var data =  {
    nodes: nodes,
    edges: edges
  };
var options = {
  physics:{
    enabled: true,
     repulsion: {
      centralGravity: 0.2,
      springLength: 200,
      springConstant: 0.05,
      nodeDistance: 200,
      damping: 0.09
    },
	  timestep: 0.5,
    adaptiveTimestep: true,
    wind: { x: 0, y: 0 }
  }
}
	
	
	
  var network =  new vis.Network(container, data, options);
    var network =  new vis.Network(container, data, options);
  network.on( 'click', function(properties) {
  // window.alert('clicked node ' + properties.nodes);
 if (properties.nodes >1 ) {
 window.location.href = "topic.php?id=" + properties.nodes;}
});
  
</script> 
</body>
</html>
 
    
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
