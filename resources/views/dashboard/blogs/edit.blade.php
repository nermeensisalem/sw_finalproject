@extends('dashboard.layout.master')

@section('dashboard-title')
    Blog - Edit blog
@endsection

@section("content")
    @include('dashboard.layout.messages')
    <!-- Main content -->
    <section class="content">
        <form method="post" action="{{route('Dashboard.blogs.update',$blog)}}" enctype="multipart/form-data">
            @method("PUT")
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">General</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Blog title</label>
                                <input type="text" id="blog_title" name="blog_title" class="form-control" value="{{$blog->title}}">
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Body</label>
                                <textarea id="blog_body" class="form-control" rows="4" name="blog_body">
                                    {{$blog->body}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="blog_image" >
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" class="form-control datetimepicker-input" data-target="#reservationdate"
                                       value="{{$blog->date}}" name="blog_date"/>
                            </div>

                            <div class="form-group">
                                <label for="inputStatus">Author</label>
                                <select class="form-control custom-select" name="blog_authorid">
                                    <option selected disabled>Select one</option>
                                    @foreach($author as $author)
                                        <option value="{{$author->id}}"  {{$blog->author_id == $author->id ? "selected" : ""}}>
                                            {{$author->authorName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Category</label>
                                <select class="form-control custom-select" name="blog_categoryid">
                                    <option selected disabled>Select one</option>
                                    @foreach($category as $category)
                                        <option value="{{$category->id}}"  {{$blog->category_id == $category->id ? "selected" : ""}}>
                                            {{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <a href="#" class="btn btn-secondary">Cancel</a>
                    </div>
                    <div class="col-md-6">
                        <input type="submit" value="Update blog" class="btn btn-success float-right">

                    </div>
                </div>

        </form>
    </section>
    <!-- /.content -->

@endsection
