@include('admin/header-sidenav')
<div id="layoutSidenav_content">
    <main>
        <div class="container">
            <div class="row" style="display: flex;">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 2%;">
                    <div class="card" style="height:100%">
                        <div class="card-header">
                            Upload Image
                        </div>
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

                        <div class="card-body">
                            <form action="{{URL::asset('admin/media/upload')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-outline">
                                    <input type="file" class="form-control" name="image" id="">
                                    <label class="form-label" for="textAreaExample">upload image</label>
                                    <span class="text-danger">@error('image') {{$message}} @enderror</span>
                                </div>
                                <div class=" form-outline">
                                    <input type="text" class="form-control" name="title" id="">
                                    <label class="form-label" for="textAreaExample">Title</label>
                                    <span class="text-danger">@error('title') {{$message}} @enderror</span>
                                </div>
                                <div class="form-outline">
                                    <input type="submit" class="btn-primary form-control" name="submit">

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6" style="margin-top: 2%;">
                    <div class="card" style="height:100%">
                        <div class="card-header">
                            Set Image Settings
                        </div>
                        @if(Session::has('updatesucceed'))
                        <div class="alert alert-success">
                            {{Session::get('updatesucceed')}}
                        </div>
                        @endif
                        @if(Session::has('updatefailed'))
                        <div class="alert alert-danger">
                            {{Session::get('updatefailed')}}
                        </div>
                        @endif
                        <div class="card-body">
                            <form action="{{URL::asset('admin/media/options')}}" method="post">
                                @csrf



                                @foreach($settings as $settings)
                                {{$settings->size}}
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control" type="tel" value="{{$settings->height}}" name="{{$settings->size.'ScreenHeight'}}" id="">
                                        <span class="text-danger">@error($settings->size.'ScreenHeight') {{$message}} @enderror</span>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control" type="tel" value="{{$settings->width}}" name="{{$settings->size.'ScreenWidth'}}" id="">
                                        <span class="text-danger">@error($settings->size.'ScreenWidth') {{$message}} @enderror</span>
                                    </div>
                                </div>
                                @endforeach
                                <div style="margin-top:15px">
                                    <input type="submit" class="btn btn-primary" value="Save changes" name="save changes">
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div><br>
            <div class="row">
                <h4>Uploaded Media</h4>
                @foreach($images as $img)
                <?php
                $img = explode('.', $img->imgName);
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <img src="{{ asset('img').'/'.$img[0].'_150_100.'.$img[1] }}" style="width: 100%;margin-bottom:2px">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>
</div>
@include('admin/footer-sidenav')