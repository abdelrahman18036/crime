<?php include_once('include/config.php');
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){

	extract($_REQUEST);

	if($governorate==""){

		header('location:'.$_SERVER['PHP_SELF'].'?msg=un');

		exit;

	}elseif($center==""){

		header('location:'.$_SERVER['PHP_SELF'].'?msg=ue');

		exit;

	}elseif($village==""){

		header('location:'.$_SERVER['PHP_SELF'].'?msg=up');

		exit;

	}elseif($school==""){

		header('location:'.$_SERVER['PHP_SELF'].'?msg=up');

		exit;

	}elseif($name==""){

		header('location:'.$_SERVER['PHP_SELF'].'?msg=up');

		exit;

	}elseif($age==""){

		header('location:'.$_SERVER['PHP_SELF'].'?msg=up');

		exit;

	}elseif($fatheredu==""){

		header('location:'.$_SERVER['PHP_SELF'].'?msg=up');

		exit;

	}elseif($motheredu==""){

		header('location:'.$_SERVER['PHP_SELF'].'?msg=up');

		exit;

	}elseif($stability==""){

		header('location:'.$_SERVER['PHP_SELF'].'?msg=up');

		exit;

	}elseif($examination==""){

		header('location:'.$_SERVER['PHP_SELF'].'?msg=up');

		exit;

	}elseif($reasult==""){

		header('location:'.$_SERVER['PHP_SELF'].'?msg=up');

		exit;

	}elseif($child==""){

		header('location:'.$_SERVER['PHP_SELF'].'?msg=up');

		exit;

	}elseif($oprea==""){

		header('location:'.$_SERVER['PHP_SELF'].'?msg=up');

		exit;

	}elseif($eye==""){

		header('location:'.$_SERVER['PHP_SELF'].'?msg=up');

		exit;

	}elseif($anmya==""){

		header('location:'.$_SERVER['PHP_SELF'].'?msg=up');

		exit;

	}elseif($defferent==""){

		header('location:'.$_SERVER['PHP_SELF'].'?msg=up');

		exit;

	}else{

		

		$userCount	=	$db->getQueryCount('students','id');

		if($userCount[0]['total']<100){

			$data	=	array(

							'governorate'=>$governorate,
							'center'=>$center,
							'village'=>$village,
							'school'=>$school,
							'name'=>$name,
							'age'=>$age,
							'fatheredu'=>$fatheredu,
							'motheredu'=>$motheredu,
							'stability'=>$stability,
							'examination'=>$examination,
							'reasult'=>$reasult,
							'child'=>$child,
							'oprea'=>$oprea,
							'eye'=>$eye,
							'anmya'=>$anmya,
							'defferent'=>$defferent
						
							
							);

			$insert	=	$db->insert('students',$data);

			if($insert){

				header('location:contact.php?msg=ras');

				exit;

			}else{

				header('location:add-users.php?msg=rna');

				exit;

			}

		}else{

			header('location:'.$_SERVER['PHP_SELF'].'?msg=dsd');

			exit;

		}

	}

}

?>

<!doctype html>
<html lang="en-US">

    <head>

        <meta charset="UTF-8">

        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Crime System Dashboard</title>

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

        <header class="main-header">
            <a href="contact.php" class="logo">
                <span class="logo-mini">
                    <b>Misr</b>
                </span>
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
                                        <small>Crime System Admin Panel</small>
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
                    <li class="treeview" id="1">
                        <a href="contact.php" onclick="window.location.href = 'contact.php'">
                            <i class="fa fa-envelope"></i>
                            <span>Panel</span>
                        </a>

                    </li>
                    
                    <li class="treeview active" id="2">
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

                    <li class="treeview" id="2">
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

        <?php

		if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="un"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User name is mandatory field!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ue"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User email is mandatory field!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="up"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User phone is mandatory field!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){

			echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="dsd"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Please delete a user and then try again <strong>We set limit for security reasons!</strong></div>';

		}

		?>
            <section class="content container-fluid">
                <div class="row">

                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Fields with
                                    <span class="text-danger">*</span>
                                    are mandatory!</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" method="post">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="exampleInputName1">Name</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="governorate"
                                            id="governorate"
                                            placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">gender</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="center"
                                            id="center"
                                            placeholder="gender">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">address</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="village"
                                            id="village"
                                            placeholder="address">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">age</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="school"
                                            id="school"
                                            placeholder="age">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">court</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="name"
                                            id="name"
                                            placeholder="court">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">state</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="age"
                                            id="age"
                                            placeholder="state">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">
                                            crime</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="fatheredu"
                                            id="fatheredu"
                                            placeholder="crime">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">
                                            act</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="motheredu"
                                            id="motheredu"
                                            placeholder="act">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">skin
                                        </label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="stability"
                                            id="stability"
                                            placeholder="skin ">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">face discprtion
                                        </label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="examination"
                                            id="examination"
                                            placeholder="face discprtion ">
                                    </div>
									<div class="form-group">
                                        <label for="exampleInputPassword1">eye color</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="child"
                                            id="child"
                                            placeholder="eye color">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">identfication mark
                                        </label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="reasult"
                                            id="reasult"
                                            placeholder="identfication mark">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">height</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="oprea"
                                            id="oprea"
                                            placeholder="height">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">policename</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="eye"
                                            id="eye"
                                            placeholder="policename ">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">fir of The case</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="anmya"
                                            id="anmya"
                                            placeholder="fir of The case ">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Date Of Arrest</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="defferent"
                                            id="defferent"
                                            placeholder="Date Of Arrest ">
                                    </div>
                                    
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button
                                        type="submit"
                                        name="submit"
                                        value="submit"
                                        id="submit"
                                        class="btn btn-primary">
                                        <i class="fa fa-fw fa-plus-circle"></i>
                                        Add User</button>

                                </div>
                            </form>
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
            </section>
            <div class="container my-4"></div>

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

    </div>
</html>