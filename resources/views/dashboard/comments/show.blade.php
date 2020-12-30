@extends('dashboard.layout.master')

@section('dashboard-title')
    Comment Details
@endsection

@section("content")


    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><b>Comment Details</b></h3>

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
                        <h3 class="text-primary">{{$comment->name}}</h3>
                        <p class="text-muted">{{$comment->message}}</p>
                        <img src=" @foreach($blog as $blog_comment)
                        @if($blog_comment->id  == $comment->blog_id)
                        {{$blog_comment->image}}
                        @endif
                        @endforeach"/>
                        <div class="text-muted">
                            <p>
                                <b>Respond to Blog: </b>

                                @foreach($blog as $blog_comment)
                                    @if($blog_comment->id  == $comment->blog_id)
                                        {{$blog_comment->title}}
                                    @endif
                                @endforeach
                            </p>
                            <p>
                                <b>Author email: </b>
                                {{$comment->email}}
                            </p>
                            <p>
                                <b>Date: </b>
                                {{$comment->date}}
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
