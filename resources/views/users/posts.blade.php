@include('users/header')
<div class="container">
    <div class="row pt-5">
        <h4>Recent Posts-</h4>
        @foreach($postinfo as $info)
        <div class="col-lg-4 mb-2">
            <div class="card">
                <div class="card-header bg-primary text-light">
                    {{$info->title}}

                </div>
                <div class="card-body">

                    <?php
                    $completedata = str_replace('/\s&nbsp;\s/ig', ' ', $info->post);
                    $data = substr($completedata, 0, 400);
                    echo $data . '...<a href="">See More</a>';
                    ?>
                </div>
                <div class="card-footer">
                    <span class="pull-right">
                        {{$info->created_at}}
                    </span>
                    <span>
                        {{ucwords($info->writer)}}
                    </span>
                </div>
            </div>


        </div>
        @endforeach
    </div>
</div>
@include('users/footer')