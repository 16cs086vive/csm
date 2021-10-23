@include('admin/header-sidenav')
<div id="layoutSidenav_content" style="padding-top:30px">
    <div class="container">
        @if(Session::has('fail'))
        <div class="alert alert-danger">
            {{Session::get('fail')}}
        </div>
        @endif
        <table class="table table-hover table-bordered">
            <tr>
                <th>id</th>
                <th>name</th>
                <th>gender</th>
                <th>mobile no</th>
                <th>email</th>
                <th>action</th>
            </tr>
            @foreach($infoarr as $info)
            <tr>
                <td>{{$info->id}}</td>
                <td>{{$info->name}}</td>
                <td>{{$info->gender}}</td>
                <td>{{$info->mobileno}}</td>
                <td>{{$info->email}}</td>
                <td><a class="btn btn-warning" href="{{URL::asset('admin/update')}}">Update</a>
                    &nbsp;<a href="{{URL::asset('admin/deleteprofiles')}}{{'/'.$info->id}}" class="btn btn-danger">delete</a></td>
            </tr>
            @endforeach
        </table>
        <center><a href="{{URL::asset('admin/addnewprofilebtn')}}" class="btn btn-primary">Add New</a>
    </div>
</div>
@include('admin/footer-sidenav')