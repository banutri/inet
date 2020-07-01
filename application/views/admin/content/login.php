<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo ucwords($title) ?></title>

  <!-- Custom fonts for this template-->
	<link href="<?php echo base_url('sbadmin/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet"
		type="text/css">


	<!-- Custom styles for this template-->
	<link href="<?php echo base_url('sbadmin/css/sb-admin-2.min.css') ?>" rel="stylesheet">

</head>

<body class="bg-info">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              
              <div class="col-sm">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">i<span class="text-info">Net</span> Shop Admin</h1>
                  </div>
                  <form class="user" action="<?php echo base_url('admin/login') ?>" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="kol_username"  placeholder="Username" name="username" value="admin">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="kol_password" placeholder="Password" name="password" value="admin123">
                    </div>
                    
                    <button type="submit" class="btn btn-info btn-user btn-block">
                      Login
                    </button>
                    <hr>
                  </form>
                  <?php if($this->session->flashdata('pesan_gagal')!=NULL){ ?>
                    <p class="text-danger text-center font-weight-bold"><?=$this->session->flashdata('pesan_gagal')?></p>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>


</body>

</html>
