@include('admin/header-sidenav')
<div id="layoutSidenav_content">
    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            Edit the category
                        </div>
                        <div class="card-body" style="height: 80vh;overflow:auto">
                            <textarea class="form-control" name="message" id="my-editor" rows="2">
                                <h1>Add Title</h1>
                            </textarea>
                            <label class="form-label" for="textAreaExample">Enter The Title</label>
                            <textarea class="form-control" name="message" rows="2">

                            </textarea>
                            <label class="form-label" for="textAreaExample">Enter The Title</label>
                            <textarea class="form-control" name="message" rows="2">
                                Add Title
                            </textarea>
                            <label class="form-label" for="textAreaExample">Enter The Title</label>
                            <textarea class="form-control" name="message" rows="2">
                               Add Title
                            </textarea>
                            <label class="form-label" for="textAreaExample">Message</label><br>
                            <input type="submit" value="Save Category" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('admin/footer-sidenav')