<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{URL::asset('js/fonts.js')}}"></script>
    <link rel="stylesheet" href="{{ URL::asset('css/admin-dashboard.css') }}" />
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

    <title>User-Panel</title>
</head>

<body class="sb-nav-fixed">

    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-light">
        <div class="container-fluid">
            <!-- Navbar Brand-->
            <h3 class="text-warning">
                <a class="text-warning navbar-brand" href="/admin">Company_name</a>
            </h3>


            <!-- Sidebar Toggle-->

            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fa fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-warning" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a href="{{URL::asset('admin/loggedin/profile')}}" class="dropdown-item">Profile</a></li>
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>

                        <li class=" bg-warning " style="padding-top: 7px;margin:0"><a class="dropdown-item bg-warning" href="{{ url('/logout') }}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action bg-warning"> <i>POSTS</i></a>
                        <a href="{{URL::asset('admin/posts')}}" class="list-group-item list-group-item-action">Posts</a>
                        <a href="{{URL::asset('admin/media')}}" class="list-group-item list-group-item-action">Media</a>
                        <a href="{{URL::asset('admin/pages')}}" class="list-group-item list-group-item-action">Pages</a>

                        <div class="dropdown">
                            <a class="list-group-item list-group-item-action" href="{{URL::asset('admin/categories')}}"> <span>Categories <i class="fa fa-caret-right pull-right"></i></span></a>
                            <ul class="dropdown-content">
                                <li><a href="{{URL::asset('admin/categories')}}"> All Categories</a></li>

                                <li><a href="{{URL::asset('admin/addNewTaxonomy')}}">Add New</a></li>
                            </ul>
                        </div>






                    </div>
                    <div class="list-group">
                        <a href="" class="list-group-item list-group-item-action bg-warning"> <i>Manage Users</i></a>
                        <a href="{{URL::asset('admin/profile')}}" class="list-group-item list-group-item-action">User details</a>
                        <a href="#" class="list-group-item list-group-item-action">Group chat</a>
                        <a href="#" class="list-group-item list-group-item-action">Group chat</a>
                        <a href="#" class="list-group-item list-group-item-action">Group chat</a>
                    </div>
                    <div class="list-group">
                        <a href="" class="list-group-item list-group-item-action bg-warning"> <i class="fa fa-cogs"> </i> Settings</a>
                        <a href="{{URL::asset('admin/general/update')}}" class="list-group-item list-group-item-action">General</a>
                        <a href="{{URL::asset('admin/templates')}}" class="list-group-item list-group-item-action">Templates</a>
                        <a href="#" class="list-group-item list-group-item-action">Reading</a>
                        <a href="#" class="list-group-item list-group-item-action">Writing</a>
                        <a href="#" class="list-group-item list-group-item-action">Decision</a>
                        <a href="#" class="list-group-item list-group-item-action">Permalinks</a>
                        <a href="{{URL::asset('admin/media')}}" class="list-group-item list-group-item-action">Media</a>
                        <a href="#" class="list-group-item list-group-item-action">Privacy</a>
                    </div>

                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    {{session('admin-name')}}
                </div>
            </nav>
        </div>