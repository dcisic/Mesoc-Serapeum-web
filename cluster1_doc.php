<?php
 include ('header.php');


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


 </head>
<body>
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
                            
                        </div>               <br>       <br>   <br>   <br>   <br> 
 <h1 class="counter_value mt-12" data-target="370">DOCUMENT CLUSTER</h1>
                        <p class="mb-0 mt-2 text-uppercase">Cluster analysis of full text documents</p>
                    </div>
                </div>
	        </div>
        </div>
</section>	           

<br>
 <br>
<center>

  <section class="section bg-white"  >
       <div class="bg-white">
       <div class="row mt-5 pt-3">
                 <div class="col-lg-4" style="padding-left:10%">

                   <img src="images/kmeans-centroids.png" >
                        </div>

               <div class="col-lg-6">

                         <p class="text-muted mt-4 mb-0">
                            <h3> Text Clustering </h3>
                            <p allign = "justify">Text clustering is the task of grouping a set of unlabelled texts in such a way that texts in the same cluster are more similar to each other than to those in other clusters. Text clustering algorithms process text and determine if natural clusters (groups) exist in the data.
<br>As part of unsupervised learning, clustering is used to group similar data points without knowing which cluster the data belong to. So in a sense, document clustering is about how similar documents (or sentences) are grouped together.
<br>Computers only calculate numbers, so we translate our texts into numbers!

Essentially, what word embedding do is represent words as vectors in a space where similar words are mapped near each other. We transform each word in 4096-dimensional vector. Then K-means is used as unsupervised learning algorithm
that allows us to identify similar documents. It is based on distance between text and cluster center point ( named centroid). Algorithm calculates optimal position of centroid and documents assigned to it as nearest centroid.

</p>  </p>

                        </div>
 <div class="col-lg-3">

                </div>
  <div class="row mt-5 pt-3">
                 <div class="col-lg-4" style="padding-left:10%">
                 <p allign = "justify">

  <br>
  <br>
    Initial analyisis has shown that optimum number of clusters is 22, and they are shown on following image. Each point represents one document, and clusters are represented by different colour.

                        </div>

               <div class="col-lg-6">

               <img src="images/cluster/2d.png" class="img-fluid">


                        </div>
  <div class="col-lg-3">

                </div>
  <div class="row mt-5 pt-3">
                 <div class="col-lg-6" style="padding-left:10%">


   <img src="images/cluster/3d.png" class="img-fluid"" >
                 </div>

               <div class="col-lg-4">

 <p allign = "justify">
                <br>
  <br>
This can be better  viewed in 3 dimensions on following picture.<br>
Please not that calculation has been done on 4096 dimensions.  </p>

                        </div>
	  </div>
 <div class="col-lg-3">

                </div>
                    </div>
       </div>
     </div>
       </div>
</section>
 <section class="section bg-white"  >
       <div class="bg-white">
       <div class="row mt-5 pt-3">
                 <div class="col-lg-4" style="padding-left:10%">

                 <p allign = "justify">

 <p > Number of documents per cluster is visible on following picture:
</div>


<br>
<div style="padding-left:5%;  padding-right:5%;">
<div class="col-lg-6">
 <img src="images/cluster/document.png" class="img-fluid">
	  </div>
</div> 

  <div class="row mt-5 pt-4">
               
                 <div class="col-lg-6" style="padding-left:10%">
      <img src="images/cluster/f1.png">
                </div>
                <div class="col-lg-6" style="padding-right:10%">
 <img src="images/cluster/f2.png" class="img-fluid">
               </div>
 </div>
					 </div>
  <div class="row mt-5 pt-4">

                 <div class="col-lg-6" style="padding-left:10%">
      <img src="images/cluster/f3.png" >
                </div>
                <div class="col-lg-6" style="padding-right:10%">
 <img src="images/cluster/f4.png" class="img-fluid">
               </div>
 </div>
					 </div>
   <div class="row mt-5 pt-4">

                 <div class="col-lg-6" style="padding-left:10%">
      <img src="images/cluster/f5.png" >
                </div>
                <div class="col-lg-6" style="padding-right:10%">
 <img src="images/cluster/f6.png" class="img-fluid">
               </div>
 </div>
					 </div>
   <div class="row mt-5 pt-4">

                 <div class="col-lg-6" style="padding-left:10%">
      <img src="images/cluster/f7.png" class="img-fluid">
                </div>
                <div class="col-lg-6" style="padding-right:10%">
 <img src="images/cluster/f8.png" class="img-fluid">
               </div>
 </div>
					 </div>
   <div class="row mt-5 pt-4">

                 <div class="col-lg-6" style="padding-left:10%">
      <img src="images/cluster/f9.png" class="img-fluid">
                </div>
                <div class="col-lg-6" style="padding-right:10%">
      <img src="images/cluster/f10.png" class="img-fluid">
               </div>
 </div>
					 </div>
   <div class="row mt-5 pt-4">

                 <div class="col-lg-6" style="padding-left:10%">
      <img src="images/cluster/f11.png" class="img-fluid">
                </div>
                <div class="col-lg-6" style="padding-right:10%">
      <img src="images/cluster/f12.png" class="img-fluid">
               </div>
 </div>
					 </div>


   <div class="row mt-5 pt-4">

                 <div class="col-lg-6" style="padding-left:10%">
      <img src="images/cluster/f13.png" class="img-fluid">
                </div>
                <div class="col-lg-6" style="padding-right:10%">
 <img src="images/cluster/f14.png" class="img-fluid">
               </div>
 </div>
					 </div>
   <div class="row mt-5 pt-4">

                 <div class="col-lg-6" style="padding-left:10%">
      <img src="images/cluster/f15.png" class="img-fluid">
                </div>
                <div class="col-lg-6" style="padding-right:10%">
 <img src="images/cluster/f16.png" class="img-fluid">
               </div>
 </div>
					 </div>
   <div class="row mt-5 pt-4">

                 <div class="col-lg-6" style="padding-left:10%">
      <img src="images/cluster/f17.png" class="img-fluid">
                </div>
                <div class="col-lg-6" style="padding-right:10%">
 <img src="images/cluster/f18.png" class="img-fluid">
               </div>
 </div>
													  <div class="row mt-5 pt-4">

                 <div class="col-lg-6" style="padding-left:10%">
      <img src="images/cluster/f19.png" class="img-fluid">
                </div>
                <div class="col-lg-6" style="padding-right:10%">
 <img src="images/cluster/f20.png" class="img-fluid">
               </div>
 </div>
													  <div class="row mt-5 pt-4">

                 <div class="col-lg-6" style="padding-left:10%">
      <img src="images/cluster/f21.png" class="img-fluid">
                </div>
                <div class="col-lg-6" style="padding-right:10%">
 <img src="images/cluster/f22.png" class="img-fluid">
               </div>
 </div>
													
													
													
													
													
					 </div>
  
 </div>
					 </div>



  </section>



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

</body>
</html>
