<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title> Drip Limited </title>

	   <link href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">    
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo base_url()?>assets/asie/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()?>assets/custom.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/jquery/jquery-ui.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo base_url()?>assets/asie/js/ie-emulation-modes-warning.js"></script>

    <script src="<?php echo base_url('assets/')?>jquery.min.js"></script>

    <script src="<?php echo base_url('assets/')?>popper.min.js"></script>

    <style type="text/css">
 .alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
  opacity: 1;
  transition: opacity 0.6s;
  margin-bottom: 15px;
}

.alert.success {background-color: #4CAF50;}
.alert.info {background-color: #2196F3;}
.alert.warning {background-color: #ff9800;}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
    </style>

  </head>

  <body>
    <?php echo $this->session->flashdata('message');?>
    <!-- Fixed navbar -->

    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="<?php echo base_url()?>assets/logo.jpg" alt="logo"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">

          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url()?>"> <i class="glyphicon glyphicon-home"></i> Home</a></li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i>
                <?php if($this->session->userdata('nama') == '') 
                    { echo "Login/Register</a>" ;
                ?>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                   <a data-toggle="modal" data-target="#myModal_login" class="list-group-item" button> Login </a>
                   <a data-toggle="modal" data-target="#myModal_register" class="list-group-item" button> Register </a>
                  </div>

                <?php
                    }
                    else  
                    {
                      echo $this->session->userdata('nama')  ;
                      echo "</a>";
                    ?>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <a href="<?php echo base_url()?>shopping/index/" class="list-group-item"> Profile </a>

                     <a href="<?php echo base_url()?>Page/Logout/" class="list-group-item"> Logout </a>
                    </div>
                <?php
                    }
                ?>
              
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-th-list"></i>
                Kategory
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a href="<?php echo base_url()?>shopping/index/" class="list-group-item">Semua</a>
                      <?php
                          foreach ($kategori as $row) 
                      {
                ?>
                      <a href="<?php echo base_url()?>shopping/index/<?php echo $row['id'];?>" class="list-group-item"><?php echo $row['nama_kategori'];?></a>
                      <?php
                      }
                ?>
              </div>
            </li>
            <li><a href="<?php echo base_url()?>shopping/tampil_cart"><i class="glyphicon glyphicon-shopping-cart"></i>  Keranjang Belanja</a></li>
          </ul>

        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="modal fade" id="myModal_login" role="dialog">
    <div class="modal-dialog modal-md">
      <!-- Modal content-->
      <div class="modal-content">
        <form method="post" action="<?php echo base_url()?>Page/login">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Login</h4>
        </div>
        <div class="modal-body">
          <?php echo $this->session->flashdata('info_register');?>
          <div class="form-label-group">
            <label for="inputEmail">Email</label>
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
          </div>

          <div class="form-label-group">
            <label for="inputPassword"> Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"> Batal</button>
          <button type="submit" class="btn btn-sm btn-primary">Login</button>
        </div>
        
        </form>
      </div>
      
    </div>
    </div>

    <div class="modal fade" id="myModal_register" role="dialog">
    <div class="modal-dialog modal-md">
      <!-- Modal content-->
      <div class="modal-content">
        <form method="post" action="<?php echo base_url()?>Page/register">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Register</h4>
        </div>
        <div class="modal-body">
          <?php echo $this->session->flashdata('info_register');?>
          <div class="form-label-group">
            <label >Nama</label>
            <input type="text" name="nama" id="required-input" required maxlength="50" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" class="form-control" placeholder="Eg : Novri Wanda" required autofocus>
          </div>

          <div class="form-label-group">
            <label >Birthday</label>
            <input type="date" name="birthday" id="required-input" required maxlength="50" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" class="form-control" placeholder="12/03/1998" required autofocus>
          </div>

          <div class="form-label-group">
            <label for="inputEmail">Email</label>
            <input type="email" id="inputEmail" id="required-input" required maxlength="50" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" name="email" class="form-control" placeholder="Email address" required autofocus>
          </div>

          <div class="form-label-group">
            <label for="inputPassword"> Password</label>
            <input type="password" id="required-input" required maxlength="50" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" name="password1" class="form-control" placeholder="Password" required>
          </div>

          <div class="form-label-group">
            <label for="inputPassword"> Retype Password</label>
            <input type="password" id="required-input" required maxlength="50" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" name="password2" class="form-control" placeholder="Password" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"> Batal</button>
          <button type="submit" class="btn btn-sm btn-primary">Login</button>
        </div>
        
        </form>
      </div>
      
    </div>
    </div>

    <!-- Begin page content -->
<div class="container">
   <?php echo $this->session->flashdata('message_login');?>
<div class="row">     
<div class="row">

