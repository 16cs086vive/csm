@include('admin/header-sidenav')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="row">
                <h5>
                    Templates
                </h5>
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
                <br>
                @foreach($templates as $temp)
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            {{$temp->templateName}}
                        </div>
                        <div class="card-body">
                            <img src="{{ asset('img').'/'.$temp->templateImg }}" style="width: 100%;">
                        </div>

                        <?php
                        if ($temp->status === 1) { ?>
                            <div class="card-footer">
                                <h5>Activated</h5>
                            </div>
                        <?php } else { ?>
                            <a href="{{URL::asset('admin/template/activates/id=')}}{{$temp->id}}" style="text-decoration: none;">
                                <div class="card-footer">
                                    <h5>Activate Now</h5>
                                </div>
                            </a>
                        <?php }
                        ?>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>
</div>
@include('admin/footer-sidenav')