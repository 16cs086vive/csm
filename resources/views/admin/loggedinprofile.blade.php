@include('admin/header-sidenav')
<div id="layoutSidenav_content" style="padding-top:30px">
    <div style="width: 40%;margin:auto">
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        @endif
        @if(Session::has('fail'))
        <div class="alert alert-danger">
            {{Session::get('fail')}}
        </div>
        @endif
        <form action="{{url('')}}/admin/addnewprofile" method="post">
            @csrf
            <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="ENTER NAME">
            <span class="text-danger">@error('name') {{$message}} @enderror</span>
            <br>
            <input type="text" name="gender" value="{{old('gender')}}" placeholder="enter M or F" class="form-control">
            <span class="text-danger">@error('gender') {{$message}} @enderror</span>
            <br>
            <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="ENTER YOUR EMAIL ID">
            <span class="text-danger">@error('email') {{$message}} @enderror</span><br>
            <input type="password" name="password" class="form-control" placeholder="ENTER PASSWORD">
            <span class="text-danger">@error('password') {{$message}} @enderror</span><br>
            <input type="tel" name="mobileno" value="{{old('mobileno')}}" class="form-control" placeholder="ENTER MOBILE NO ">
            <span class="text-danger">@error('mobileno') {{$message}} @enderror</span><br>
            <input type="submit" name="saverecord" class="form-control btn-primary">
        </form>
    </div>
</div>
@include('admin/footer-sidenav')