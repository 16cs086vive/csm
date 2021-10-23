@include('admin/header-sidenav')
<div id="layoutSidenav_content">
    <main>
        <div class="row" style="width: 100%;padding-top:5%">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    @if(Session::has('postSubmitted'))
                    <div class="alert alert-success">
                        {{Session::get('postSubmitted')}}
                    </div>
                    @endif
                    @if(Session::has('postFailed'))
                    <div class="alert alert-danger">
                        {{Session::get('postFailed')}}
                    </div>
                    @endif
                    <form action="{{URL::asset('admin/update')}}" method="POST">
                        @csrf
                        <div class="form-outline container">
                            <input type="text" class="form-control" name="name" value="{{$data['name']}}" id="name">
                            <label class="form-label" for="textAreaExample">Name</label>
                            <span class="text-danger">@error('name') {{$message}} @enderror</span>
                        </div>
                        <div class="form-outline container">
                            <input type="text" class="form-control" value="{{$data['email']}}" name="email" id="password">
                            <label class="form-label" for="textAreaExample">email</label>
                            <span class="text-danger">@error('email') {{$message}} @enderror</span>
                        </div>
                        <div class="form-outline container">
                            <input type="gender" class="form-control" value="{{$data['gender']}}" name="gender" id="password">
                            <label class="form-label" for="textAreaExample">gender</label>
                            <span class="text-danger">@error('gender') {{$message}} @enderror</span>
                        </div>
                        <div class="form-outline container">
                            <input type="tel" class="form-control" value="{{$data['mobileno']}}" name="mobileno" id="password">
                            <label class="form-label" for="textAreaExample">mobile no</label>
                            <span class="text-danger">@error('mobileno') {{$message}} @enderror</span>
                        </div>

                        <div class="form-outline container">
                            <input type="submit" class="form-control btn-warning" value="UPDATE DETAILS">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            </div>
        </div>
    </main>
</div>
@include('admin/footer-sidenav')