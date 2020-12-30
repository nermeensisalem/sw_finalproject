@extends('dashboard.layout.master')

@section('dashboard-title')
    Blogs - Add blog
@endsection

@section("content")
    @include('dashboard.layout.messages')

    <!-- Main content -->
    <section class="content">
        <form method="post" action="{{route('Dashboard.blogs.store')}}" enctype="multipart/form-data">
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
                                <input type="text" id="blog_title" name="blog_title" class="form-control" value="{{old('blog_title')}}">
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Body</label>
                                <textarea id="blog_body" class="form-control" rows="4" name="blog_body">{{old('blog_body')}}</textarea>
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="blog_image">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                    <input type="date" class="form-control datetimepicker-input" data-target="#reservationdate"
                                           name="blog_date" value="{{old('blog_date')}}"/>


                            </div>

                            <div class="form-group">
                                <label for="inputStatus">Author</label>
                                <select class="form-control custom-select" name="blog_authorid">
                                    <option selected disabled>Select one</option>
                                    @foreach($author as $authors)

                                        <option value="{{$authors->id}}"
                                        @if (old('blog_authorid') == $authors->id) {{ 'selected' }} @endif>{{$authors->authorName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Category</label>
                                <select class="form-control custom-select" name="blog_categoryid">
                                    <option selected disabled>Select one</option>
                                    @foreach($category as $category)
                                        <option value="{{$category->id}}"
                                        @if (old('blog_categoryid') == $category->id) {{ 'selected' }} @endif>{{$category->name}}</option>
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
                    <a href="{{route('Dashboard.blogs.index')}}" class="btn btn-secondary">Cancel</a>
                </div>
                <div class="col-md-6">
                    <input type="submit" value="Add new blog" class="btn btn-success float-right">

                </div>
            </div>

        </form>
    </section>
    <!-- /.content -->

@endsection
