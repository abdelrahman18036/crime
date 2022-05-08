<?php

require_once('include/config.php');
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>
<!doctype html>

<html lang="en-US">

    <head>

        <meta charset="UTF-8">

        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Crime Investigation MANAGEMENT SYSTEM Dashboard</title>

        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
            integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
            crossorigin="anonymous">

        <link
            rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
            integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
            crossorigin="anonymous">

        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

        <link
            rel="stylesheet"
            href="bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link
            rel="stylesheet"
            href="bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
        <link
            rel="stylesheet"
            href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
        <link
            rel="stylesheet"
            href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">

        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    </head>

    <body class="hold-transition skin-blue sidebar-mini">

        <?php

		$condition	=	'';
		if(isset($_REQUEST['name']) and $_REQUEST['name']!=""){
			$condition	.=	' AND name LIKE "%'.$_REQUEST['name'].'%" ';
		}
		if(isset($_REQUEST['governorate']) and $_REQUEST['governorate']!=""){
			$condition	.=	' AND governorate LIKE "%'.$_REQUEST['governorate'].'%" ';
		}
		if(isset($_REQUEST['center']) and $_REQUEST['center']!=""){
			$condition	.=	' AND center LIKE "%'.$_REQUEST['center'].'%" ';
		}
        if(isset($_REQUEST['village']) and $_REQUEST['village']!=""){
			$condition	.=	' AND village LIKE "%'.$_REQUEST['village'].'%" ';
		}
        if(isset($_REQUEST['age']) and $_REQUEST['age']!=""){
			$condition	.=	' AND age LIKE "%'.$_REQUEST['age'].'%" ';
		}
        if(isset($_REQUEST['stability']) and $_REQUEST['stability']!=""){
			$condition	.=	' AND stability LIKE "%'.$_REQUEST['stability'].'%" ';
		}
        if(isset($_REQUEST['referral']) and $_REQUEST['referral']!=""){
			$condition	.=	' AND referral LIKE "%'.$_REQUEST['referral'].'%" ';
		}
        if(isset($_REQUEST['ques']) and $_REQUEST['ques']!=""){
			$condition	.=	' AND ques LIKE "%'.$_REQUEST['ques'].'%" ';
		}
       
		//Main queries
		$pages->default_ipp	=	10;
		$sql 	= $db->getRecFrmQry("SELECT * FROM students WHERE 1 ".$condition."");
		$pages->items_total	=	count($sql);
		$pages->mid_range	=	9;
		$pages->paginate(); 
		 
		$userData	=   $db->getRecFrmQry("SELECT * FROM students WHERE 1 ".$condition." ORDER BY id ASC ".$pages->limit."");
	
	?>

        <header class="main-header">
            <a href="contact.php" class="logo">
                <span class="logo-mini">
                    <b>Misr</b></span>
                <span class="logo-lg">
                    <b>Crime System</b>
                </span>
            </a>

            <nav class="navbar navbar-static-top" role="navigation" style="display:revert;">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <li class="dropdown user user-menu">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="hidden-xs">Admin</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <p>
                                        Admin
                                        <small>Crime Investigation MANAGEMENT SYSTEM</small>
                                    </p>
                                </li>

                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a style="color:red;"
                                            href="logout.php"
                                            class="btn btn-default btn-flat"
                                            onclick="window.location.href = 'logout.php'">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->

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
                        <img src="asd" alt="">
                    </div>
                    <div class="pull-left info">
                        <p style="display: inline;">Admin</p>
                        <!-- Status -->
                        <a href="">
                            <i class="fa fa-circle text-success"></i>
                            Online</a>
                        <br>
                        <br>

                    </div>
                </div>
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">Menu</li>
                    <!-- Optionally, you can add icons to the links -->
                    <li class="treeview active" id="1">
                        <a href="contact.php" onclick="window.location.href = 'contact.php'">
                            <i class="fa fa-envelope"></i>
                            <span>Panel</span>
                        </a>

                    </li>
                    
                    <li class="treeview" id="2">
                        <a href="contact.php" onclick="window.location.href = 'add-users.php'">
                            <i class="fa fa-plus-square"></i>
                            <span>Add</span>
                        </a>

                    </li>
                    <li class="treeview" id="2">
                        <a href="" id="printEmployeeModal">
                            <i class="fa fa-print"></i>
                            <span>Print</span>
                        </a>

                    </li>

                    <li class="treeview" id="2">
                        <a href="" id="exportEmployeeModal">
                            <i class="fa fa-table"></i>
                            <span>Export</span>
                        </a>

                    </li>

                    <li class="treeview" id="2" >
                        <a href="news.php" onclick="window.location.href = 'logout.php'" style="color:red;">
                            <i class="fa fa-sign-out"></i>
                            <span>Logout</span>
                        </a>

                    </li>

                </ul>

                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>

        <div class="content-wrapper">

            <div>

                <div class="content-header"></div>

                <div class="card-body">

                <?php

				if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rds"){

					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record deleted successfully!</div>';

				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rus"){

					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record updated successfully!</div>';

				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rnu"){

					echo	'<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> You did not change any thing!</div>';

				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){

					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';

				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){

					echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';

				}

				?>

                    <div class="col-sm-12">

                        <h5 class="card-title">
                            <i class="fa fa-fw fa-search"></i>
                            Find User</h5>

                        <form method="get">

                            <div class="row" style="display:flex;">

                                <div class="col-sm-2">

                                    <div class="form-group">

                                        <label>court</label>

                                        <input
                                            type="text"
                                            name="name"
                                            id="name"
                                            class="form-control"
                                            value="<?php echo isset($_REQUEST['name'])?$_REQUEST['name']:''?>"
                                            placeholder="court">

                                    </div>

                                </div>

                                <div class="col-sm-2">

                                    <div class="form-group">

                                        <label>
                                            Name
                                        </label>

                                        <input
                                            type="governorate"
                                            name="governorate"
                                            id="governorate"
                                            class="form-control"
                                            value="<?php echo isset($_REQUEST['governorate'])?$_REQUEST['governorate']:''?>"
                                            placeholder="Name">

                                    </div>

                                </div>

                                <div class="col-sm-2">

                                    <div class="form-group">

                                        <label>gender</label>

                                        <input
                                            type="text"
                                            class="tel form-control"
                                            name="center"
                                            id="center"
                                            x-autocompletetype="tel"
                                            value="<?php echo isset($_REQUEST['center'])?$_REQUEST['center']:''?>"
                                            placeholder="gender">

                                    </div>

                                </div>
                                <div class="col-sm-2">

                                    <div class="form-group">

                                        <label>address</label>

                                        <input
                                            type="text"
                                            class="tel form-control"
                                            name="village"
                                            id="village"
                                            x-autocompletetype="tel"
                                            value="<?php echo isset($_REQUEST['village'])?$_REQUEST['village']:''?>"
                                            placeholder="address">

                                    </div>

                                </div>
                                <div class="col-sm-2">

                                    <div class="form-group">

                                        <label>state</label>

                                        <input
                                            type="text"
                                            class="tel form-control"
                                            name="age"
                                            id="age"
                                            x-autocompletetype="tel"
                                            value="<?php echo isset($_REQUEST['age'])?$_REQUEST['age']:''?>"
                                            placeholder="state">

                                    </div>

                                </div>
                                <div class="col-sm-2">

                                    <div class="form-group">

                                        <label>skin</label>

                                        <input
                                            type="text"
                                            class="tel form-control"
                                            name="stability"
                                            id="stability"
                                            x-autocompletetype="tel"
                                            value="<?php echo isset($_REQUEST['stability'])?$_REQUEST['stability']:''?>"
                                            placeholder="skin">

                                    </div>

                                </div>

                              
                                <div class="col-sm-4">

                                    <div class="form-group">

                                        <label>&nbsp;</label>

                                        <div>

                                            <button
                                                type="submit"
                                                name="submit"
                                                value="search"
                                                id="submit"
                                                class="btn btn-primary">
                                                <i class="fa fa-fw fa-search"></i>
                                                Search</button>

                                            <a href="<?php echo $_SERVER['PHP_SELF'];?>" class="btn btn-danger">
                                                <i class="fa fa-fw fa-sync"></i>
                                                Clear</a>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

            <hr>
            <div class="content container-fluid">

                <div class="clearfix"></div>

                <div class="row marginTop" style="display:inline">
                    <div class="col-sm-12 paddingLeft pagerfwt">
                        <?php if($pages->items_total > 0) { ?>
                        <?php echo $pages->display_pages();?>
                        <?php echo $pages->display_items_per_page();?>
                        <?php echo $pages->display_jump_menu(); ?>
                        <?php }?>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <style>
                    .table-wrapper {
                        max-height: 540px;

                        overflow: auto;
                        display: inline-block;
                    }
                    tbody td,
                    thead th {
                        min-width: 150px;
                    }
                </style>
                <div class="clearfix"></div>
                <div>

                    <table class="table table-striped table-bordered table-wrapper" id="printTable">
                        <thead>
                            <tr class="bg-primary text-white">
                                <th>ID#</th>
                                <th>Name</th>
                                <th>gender</th>
                                <th>address</th>
                                <th>age</th>
                                <th>court</th>
                                <th>state</th>
                                <th>crime
                                </th>
                                <th>act</th>
                                <th>skin
                                </th>
                                <th>face discprtion
                                </th>
                                <th>identfication mark
                                </th>
                                <th>eye color
                                </th>
                                <th>height
                                </th>
                               
                                <th>policename
                                </th>
                                <th>fir of The case
                                </th>
                                <th>Date Of Arrest
                                </th>
                                
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
					if(count($userData)>0){
						$s	=	'';
						foreach($userData as $val){
							$s++;
					?>
                            <tr>
                                <td><?php echo $val['id'];?></td>
                                <td><?php echo $val['governorate'];?></td>
                                <td><?php echo $val['center'];?></td>
                                <td><?php echo $val['village'];?></td>
                                <td><?php echo $val['school'];?></td>
                                <td><?php echo $val['name'];?></td>
                                <td><?php echo $val['age'];?></td>
                                <td><?php echo $val['fatheredu'];?></td>
                                <td><?php echo $val['motheredu'];?></td>
                                <td><?php echo $val['stability'];?></td>
                                <td><?php echo $val['examination'];?></td>
                                <td><?php echo $val['reasult'];?></td>
                                <td><?php echo $val['child'];?></td>
                                <td><?php echo $val['oprea'];?></td>
                                
                                <td><?php echo $val['eye'];?></td>
                                <td><?php echo $val['anmya'];?></td>
                                <td><?php echo $val['defferent'];?></td>
                                
                                <td align="center">
                                    <a href="edit-users.php?editId=<?php echo $val['id'];?>" class="text-primary">
                                        <i class="fa fa-fw fa-edit"></i>
                                        Edit</a>
                                    |
                                    <a
                                        href="delete.php?delId=<?php echo $val['id'];?>"
                                        class="text-danger"
                                        onclick="return confirm('Are you sure to delete this user?');">
                                        <i class="fa fa-fw fa-trash"></i>
                                        Delete</a>
                                </td>

                            </tr>
                        <?php 
						}
					}else{
					?>
                            <tr>
                                <td colspan="5" align="center">No Record(s) Found!</td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!--/.col-sm-12-->

                <div class="clearfix"></div>

                <div class="row marginTop">
                    <div class="col-sm-12 paddingLeft pagerfwt">
                        <?php if($pages->items_total > 0) { ?>
                        <?php echo $pages->display_pages();?>
                        <?php echo $pages->display_items_per_page();?>
                        <?php echo $pages->display_jump_menu(); ?>
                        <?php }?>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="clearfix"></div>

            </div>
        </div>
    </div>
    <style>
        tr th {
            background: #78bc27 !important;
        }

        .text-danger {
            color: #78bc27 !important;
        }

        .pagination > .active > a,
        .pagination > .active > a:focus,
        .pagination > .active > a:hover,
        .pagination > .active > span,
        .pagination > .active > span:focus,
        .pagination > .active > span:hover {
            background: #78bc27 !important;
            border-color: #78bc27 !important;
        }

        select {

            outline: 0;
            border: 0;
            box-shadow: none;
            /* Personalize */
            flex: 1;
            padding: 0 1em;
            color: #fff;
            background-color: #78bc27;
            background-image: none;
            cursor: pointer;
        }
        /* Remove IE arrow */
        select::-ms-expand {
            display: none;
        }
        /* Custom Select wrapper */
        .select {
            width: 70px !important;
            height: 30px !important;
            position: relative;
            display: inline;
            width: 20em;
            height: 3em;
            border-radius: 0.25em;
            overflow: hidden;
        }

        .select::after {
            content: '\25BC' !important;
            position: absolute;
            top: 0;
            right: 0;
            padding: 1em;
            background-color: #34495e !important;
            transition: 0.25s all ease;
            pointer-events: none;
        }
        /* Transition */
        .select:hover::after {
            color: #f39c12;
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>

    <script
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script
        src="bower_components/datatables.net/js/jquery.dataTables.min.js"
        defer="defer"></script>
    <script
        src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"
        defer="defer"></script>
    <script
        src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"
        defer="defer"></script>
    <script src="dist/js/table.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>

</body>

</html>