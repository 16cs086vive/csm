@include('admin/header-sidenav')

<div id="layoutSidenav_content">
    <main style="padding:5% 20%">
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
        <form action="posts/submit" method="post">
            @csrf
            <div class="form-outline container">
                <textarea class="form-control" name="message" id="my-editor" rows="6"></textarea>
                <label class="form-label" for="textAreaExample">Message</label>
                <span class="text-danger">@error('message') {{$message}} @enderror</span>
            </div>
            <div class="form-outline container">
                <input type="text" class="form-control" name="title">
                <label class="form-label" for="textAreaExample">Title of the Post</label>
                <span class="text-danger">@error('title') {{$message}} @enderror</span>
            </div>
            <div class="form-outline container">
                <input type="submit" class="btn btn-primary" value="Post Now" name="post">
            </div>
        </form>
        <hr>
        <h4>Recent Posts-</h4>
        @foreach($postinfo as $info)

        <h5>Writer</h5>
        <p class="text-muted">
            {{ucwords($info->writer)}}<br>
            {{$info->created_at}}
        </p>
        <p class="text-primary">
            {{$info->title}}
        </p>
        <p style="width:100%">
            <?php
            $data = str_replace('/\s&nbsp;\s/ig', ' ', $info->post);
            echo $data;
            ?>
        </p>
        @endforeach
    </main>
</div>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('my-editor');
</script>
@include('admin/footer-sidenav')