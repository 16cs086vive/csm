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
                                @foreach($categories as $cat)
                                <li><a href="{{URL::asset('admin/addNewTaxonomy')}}">{{$cat->title}}</a></li>
                                @endforeach
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
        <div id="layoutSidenav_content">
            <section id="main">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="card-header">
                                    <p> Add New Category</p>
                                </div>
                                <div class="card-body">
                                    @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        {{Session::get('success')}}
                                    </div>
                                    @endif
                                    @if(Session::has('failed'))
                                    <div class="alert alert-danger">
                                        {{Session::get('failed')}}
                                    </div>
                                    @endif
                                    <form action="{{URL::asset('admin/categories/insert')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="categoryTitle" id="" placeholder="Enter Category title">
                                            <span class="text-danger">@error('categoryTitle') {{$message}} @enderror</span>
                                        </div><br>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="category" id="" placeholder="Enter  Category ">
                                            <span class="text-danger">@error('category') {{$message}} @enderror</span>
                                        </div><br>

                                        <div class="form-group">
                                            <input type="text" class="form-control" name="categoryFields" id="" placeholder="Enter category Fields">
                                            <span class="text-danger">@error('categoryFields') {{$message}} @enderror</span>
                                        </div><br>
                                        <div class="form-group">
                                            <textarea class="form-control" name="categoryDiscriptions" id="">Something about category...</textarea>
                                            <span class="text-danger">@error('categoryDiscriptions') {{$message}} @enderror</span>
                                        </div><br>
                                        <input type="submit" class="btn btn-primary" value="add Category">
                                    </form>
                                </div>
                                <div class="card-footer">

                                </div>
                            </div>



                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <table class="table table-bordered">
                                <tr class="bg-primary text-light">
                                    <th>
                                        Id
                                    </th>
                                    <th>
                                        Author
                                    </th>
                                    <th>
                                        Name
                                    </th>

                                    <th>
                                        discription
                                    </th>
                                    <th>
                                        Created at
                                    </th>

                                </tr>
                                @if(Session::has('successToDelete'))
                                <div class="alert alert-success">
                                    {{Session::get('successToDelete')}}
                                </div>
                                @endif
                                @if(Session::has('failToDelete'))
                                <div class="alert alert-danger">
                                    {{Session::get('failToDelete')}}
                                </div>
                                @endif
                                @foreach($categories as $cat)
                                <tr>
                                    <td>
                                        {{$cat->id}}
                                    </td>
                                    <td>
                                        {{$cat->author}}
                                    </td>
                                    <td>
                                        {{$cat->title}}<br>
                                        <a href="{{URL::asset('admin/categories/edit?id='.$cat->id)}}"><i class="text-warning">Edit</i></a>
                                        <a href="{{URL::asset('admin/deletecategories/'.$cat->id)}}"><i class="text-danger pull-right">Delete</i></a>
                                    </td>

                                    <td>
                                        ---
                                    </td>
                                    <td>
                                        {{$cat->created_at}}
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>

                    </div>
                </div>
            </section>
        </div>
        @include('admin/footer-sidenav')