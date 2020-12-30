@extends('dashboard.layout.master')

@section('dashboard-title')
    Blog Details
@endsection

@section("content")


    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><b>{{$blog->title}} Details</b></h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-12 col-md-12 col-lg-12 order-1 order-md-2">
                        <h3 class="text-primary">{{$blog->title}}</h3>
                        <p class="text-muted">{{$blog->body}}</p>
                        <img src="{{asset('blog_images/'.$blog->blog_image->path)}}" width="150px" height="150px">
                        <br>
                        <div class="text-muted">
                            <p>
                                <b>Blog ID: </b>
                                {{$blog->id}}
                            </p>

                            <p>
                                <b>Author: </b>
                                @foreach($author as $blog_author)
                                    @if($blog_author->id  == $blog->author_id)
                                        {{$blog_author->authorName}}
                                    @endif
                                @endforeach
                            </p>
                            <p>
                                <b>Category: </b>
                                @foreach($category as $category_single)
                                    @if($category_single->id == $blog->category_id)
                                        {{$category_single->name}}
                                    @endif
                                @endforeach
                            </p>
                            <p>
                                <b>Date: </b>
                                {{$blog->date}}
                            </p>


                        </div>

                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->

@endsection
