
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

    <!-- Javascript -->
    <script src="js/tablesort.js"></script>
</head>

<body>
<!--     <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Project name</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Settings</a></li>
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Help</a></li>
                </ul>
            </div>
        </div>
    </nav> -->
    <!--/navigation-->

    <!--/container-->
    <div class="container-fluid">
        <div class="row">

            <!-- SIDE MENU -->
            <section id="side-menu" class="col-md-2 no-padding side-menu blue-bg">
                
                <div id="logo">
                    <span class="no-padding no-margin">geoCoder</span>
                </div>

                <ul class="list-new">
                    <li class="list-header">My Account</li>
                    <li><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>Overview</li>
                    <li><span class="glyphicon glyphicon-hdd" aria-hidden="true"></span>History</li>
                    <li><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>Resolution Center</li>
                    <li><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Profile</li>
                </ul>
            </section>
            <!-- SIDE MENU -->

            <!-- MAIN -->
            <section id="main" class="col-md-10 no-padding bg-grey">
                
                <div id="page-header">
                    <h1>Customer Explorer</h1>
                </div>

                <div id="page-content">

                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure lor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non   proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->

                    <!-- <h2 class="sub-header">Section title</h2> -->

                    <div class="">
                        <table id="dataTable" class="table table-condensed">
                            <thead>
                                <tr>
                                    <th class="sorting">Some Title</th>
                                    <th class="sorting">Some Title</th>
                                    <th class="sorting">Some Title</th>
                                    <th class="sorting">Some Title</th>
                                    <th class="sorting">Some Title</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1,001</td>
                                    <td>b</td>
                                    <td>ipsum</td>
                                    <td>dolor</td>
                                    <td>sit</td>
                                </tr>
                                <tr>
                                    <td>1,002</td>
                                    <td>c</td>
                                    <td>consectetur</td>
                                    <td>adipiscing</td>
                                    <td>elit</td>
                                </tr>
                                <tr>
                                    <td>1,003</td>
                                    <td>a</td>
                                    <td>nec</td>
                                    <td>odio</td>
                                    <td>Praesent</td>
                                </tr>
                                <tr>
                                    <td>1,003</td>
                                    <td>d</td>
                                    <td>Sed</td>
                                    <td>cursus</td>
                                    <td>ante</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--/table-responsive-->
                    <br>
                    <button id="clear-table" class="btn btn-primary" type="submit">Empty Table</button>
                </div>
                <!--/page-content-->
            </section>
            <!-- MAIN -->
            

        </div>
        <!--/row -->
    </div>
    <!--/container-->
</body>
</html>
