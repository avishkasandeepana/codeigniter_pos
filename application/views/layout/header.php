<!doctype html>
<html lang="en">
  <head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url('application/assets/css/style.css');?>">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   
  </head>
  <body>
  <div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-3">
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.jpg);"></a>
	        <ul class="list-unstyled components mb-5">
            <li>
              <a href="<?php echo base_url('homepage') ?>" >HOME</a>
           
            </li>
	          <li class="active">
	            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Product</a>
	            
              <ul class="collapse list-unstyled" id="homeSubmenu">
               
                <li>
                    <a href="<?php echo base_url('addProduct') ?>">Add Product</a>
                </li>
                <li>
                    <a href="<?php echo base_url('viewProduct') ?>">View PRoduct</a>
                </li>
                
	            </ul>
	          </li>
	       
	          <li>
              <a href="<?php echo base_url('pos') ?>" >POS</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
           
              </ul>
	          </li>
	          <li>
              <a href="<?php echo base_url('invoice') ?>">INVOICE</a>
	          </li>
	         
	        </ul>

	        

	      </div>
    	</nav>
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 ">
        <nav class="navbar navbar-expand-lg navbar-light bg-light ">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url('homepage') ?>">HOME</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url('addProduct') ?>">ADD PRODUCT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('pos') ?>">POS</a>
                </li> 
              </ul>
            </div>
          </div>
        </nav>