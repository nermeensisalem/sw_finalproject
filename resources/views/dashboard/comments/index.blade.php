@extends('dashboard.layout.master')

@section('dashboard-title')
    Comments
@endsection

@section("content")

    @include('dashboard.layout.messages')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Comments</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped properties">
                    <thead>
                    <tr>
                        <th style="width: 1%">
                            ID
                        </th>
                        <th style="width: 20%">
                            Author
                        </th>
                        <th style="">
                            Message
                        </th>
                        <th style="">
                            In respond to
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comments as $comment)
                        <tr>
                            <td>
                                {{$loop->iteration}}
                            </td>
                            <td>
                                <a>
                                    {{$comment->name}}
                                </a>
                                <br/>
                                <small>
                                    Created at {{$comment->created_at}}
                                </small>
                            </td>
                            <td>
                                {{$comment->message}}
                            </td>
                            <td>
                                @foreach($blogs as $blog)
                                    @if($blog->id  == $comment->blog_id)
                                        {{$blog->title}}
                                    @endif
                                @endforeach
                            </td>


                            <td class="project-actions text-right">
                                <form method="post" action="{{route('Dashboard.comments.destroy',$comment)}}">
                                    @method("DELETE")
                                    @csrf
                                    <a class="btn btn-primary btn-sm" href="{{route('Dashboard.comments.show',$comment)}}">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </a>
                                    <button class="btn btn-danger btn-sm" >
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        {{ $comments->links() }}
    </section>

@endsection
