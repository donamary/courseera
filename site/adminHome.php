<?php
session_start();

if(empty($_SESSION['sid'])) {
   echo "<script>window.location.href='login1.php';alert('Your Session Has Expired ,Please Login Again ');</script>";
}

?>

<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>School Management System</title>
  <link rel="shortcut icon" href="dist/img/schools.ico" type="image/png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">



  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="starter.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SMS</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><small>School Management System</small></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
	 <?php 
$con=mysqli_connect("localhost","dona","dona","school");
$yaa="select syear,eyear from tbl_academicyear where status='Active'";
									$suk=mysqli_query($con,$yaa);
									$sk=mysqli_fetch_array($suk);
									$sy=$sk[0];
									$ey=$sk[1];
									$acyr=$sy.'-'.$ey;
									?>
	<h2 class="nav navbar-nav" ><span class="btn bg-navy1 btn-flat margins">Academic Year:<?php echo $acyr;?></span></h2>
	  
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
	 
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
           <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
               <?php
			   $con=mysqli_connect("localhost","dona","dona","school");
				$sq="SELECT * from tbl_staff where email='".$_SESSION['username']."'";
				$res=mysqli_query($con,$sq);
				$pic=mysqli_fetch_assoc($res);
				echo "<img src='uploads/".$pic['pict']."' class='user-image' alt='User Image'>
				  <span  class='hidden-xs'>";
				echo $pic['name'];
				echo" </span>";
                
			?>
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
             
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
			  <?php
			  $con=mysqli_connect("localhost","dona","dona","school");
				$sq="SELECT * from tbl_staff where email='".$_SESSION['username']."'";
				$res=mysqli_query($con,$sq);
				$pic=mysqli_fetch_assoc($res);
				echo "<img src='uploads/".$pic['pict']."' class='img-circle' alt='User Image'> </br>
                <p class='hidden-xs'>";
				echo $pic['name'];
				echo" </p>";
			?>
              </li>
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="sprofile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
         <?php
		 $con=mysqli_connect("localhost","dona","dona","school");
				$sq="SELECT * from tbl_staff where email='".$_SESSION['username']."'";
				$res=mysqli_query($con,$sq);
				$pic=mysqli_fetch_assoc($res);
				echo "<img src='uploads/".$pic['pict']."' class='img-circle' alt='User Image'>
		</div>
				<div class='pull-left info'>
					<p>";echo $pic['name'];echo"</p>";?> <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>


      <!-- search form (Optional) -->
     <!--  <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form> -->
      <!-- /.search form -->

      <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header"></li>
        <!-- Optionally, you can add icons to the links -->
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>ACADEMICS</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="classStuds.php">Students</a></li>
			<li><a href="acyear.php">Manage Academic Year</a></li>
            <li><a href="class.php">Manage Classes</a></li>
            <li><a href="division.php">Manage Divisions</a></li>
			<li><a href="subject.php">Manage Subjects</a></li>
			<li><a href="exam.php">Manage Exams</a></li>
			<li><a href="session.php">Manage Sessions</a></li>
			<li><a href="addAttendance.php">Attendance</a></li>
			<li><a href="viewAttendance.php">View Attendance</a></li>
			<li class="treeview">
                  <a> Timetable
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="timetable.php"><i class="fa fa-circle-o"></i>Set Timetable</a></li>
                    <li><a href="Edittimetable.php"><i class="fa fa-circle-o"></i>Edit Timetable</a></li>
                  </ul>
                </li>
			<li class="treeview">
                  <a> Mark Entry
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="mark.php"><i class="fa fa-circle-o"></i>Subject Wise</a></li>
                    <li><a href="markExmWise.php"><i class="fa fa-circle-o"></i>Exam Wise</a></li>
                  </ul>
                </li>
			<li class="treeview">
                  <a>View Mark
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="viewMark.php"><i class="fa fa-circle-o"></i>Subject Wise</a></li>
                    <li><a href="viewSMark.php"><i class="fa fa-circle-o"></i>Exam Wise</a></li>
                  </ul>
                </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>STAFF</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
           <li><a href="staff.php">Manage Staffs</a></li>
            <li><a href="staffDet.php">Staff Details</a></li>
			  <li><a href="staffAtten.php">Staff Attendance</a></li>
			   <li><a href="viewStaffAtten.php">View Attendance</a></li>
			<li><a href="staffLeaves.php">Apply Leave</a></li>
			 <li><a href="approveSLeave.php">Leave Applications </a></li>
			 <li><a href="viewLeav.php">Leave History</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>ADMISSION</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="admissn.php">New Admission</a></li>
            <li><a href="students.php">Students</a></li>
			<li><a href="addStudDiv.php">Assign Division</a></li>
			<li><a href="classUpgrd.php">Student Promotion</a></li>
			<li class="treeview">
                  <a>TC Details
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="studTc.php"><i class="fa fa-circle-o"></i>Issue TC</a></li>
                    <li><a href="viewStudTc.php"><i class="fa fa-circle-o"></i>View Issued TCs</a></li>
                  </ul>
                </li>
			
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>MIDDAY MEAL</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="regMDM.php">Register</a></li>
            <li><a href="middayMeal.php">Date wise Attendance</a></li>
			<li><a href="mdmdaily.php">View Attendance</a></li>
			<li class="active"><a href="mdmMonthly.php">Reports</a></li>
			<li><a href="inventory.php">Inventory</a></li>
			<li><a href="stock.php">Manage Store</a></li>
          </ul>
        </li>
	
      </ul>
	       <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Admin
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="adminHome.php"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="fa fa-dashboard"> Class</li>
        <li class="active">Manage Class</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" background-color="red">

        <div class="row">
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
			<?php
				$con=mysqli_connect("localhost","dona","dona","school");
				$sq="select * from tbl_student;";
				$res=mysqli_query($con,$sq);
				$rowCount = mysqli_num_rows($res);
				echo "<h3>".$rowCount."</h3>";
			   ?>
			    <p>Students</p>
            </div>
            <div class="icon">
              <i class="fa fa-fw fa-graduation-cap"></i>
            </div>
            <a href="students.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-maroon-active">
            <div class="inner">
              <?php
				$con=mysqli_connect("localhost","dona","dona","school");
				$sq="select * from tbl_division ;";
				$res=mysqli_query($con,$sq);
				$rowCount = mysqli_num_rows($res);
				echo "<h3>".$rowCount."</h3>";
			   ?>
              <p>Batches</p>
            </div>
            <div class="icon">
              <i class="fa fa-fw fa-book"></i>
            </div>
            <a href="division.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-8">
          <!-- small box -->
          <div class="small-box bg-fuchsia-active">
            <div class="inner">
			 <?php
				$con=mysqli_connect("localhost","dona","dona","school");
				$sq="select * from tbl_staff;";
				$res=mysqli_query($con,$sq);
				$rowCount = mysqli_num_rows($res);
				echo "<h3>".$rowCount."</h3>";
			   ?>
                <p>Staffs</p>
            </div>
            <div class="icon">
              <i class="fa fa-fw fa-user"></i>
            </div>
            <a href="staffDet.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-lime-active">
            <div class="inner">
              <?php
				$con=mysqli_connect("localhost","dona","dona","school");
				$oi=date("Y-m-d");
				$sq="select * from tbl_attendance where curdate='$oi';";
				$res=mysqli_query($con,$sq);
				$rowCount = mysqli_num_rows($res);
				echo "<h3>".$rowCount."</h3>";
			   ?>

              <p>Today's Attendance</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="viewAttendance.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
	
        <!-- ./col -->
      </div>
	<div class="box box-default">
	<div class="box-header with-border">
         <h3 class="box-title">Title</h3>
	</div>
     <div class="box-body">  
	  <div class="row">
		<div class="col-md-12">
		
		
		<!-- HERE-->
		
		 
		</div>
	   </div>
	  </div>
	  </div> 
    </section>
	
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>