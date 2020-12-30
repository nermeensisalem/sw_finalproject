@extends('dashboard.layout.master')

@section('dashboard-title')
    Blogs
@endsection

@section("content")

    <section class="content">
    @include('dashboard.layout.messages')

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Blogs</h3>

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
                            Blog title
                        </th>
                        <th style="">
                            Author
                        </th>
                        <th style="">
                            Category
                        </th>
                        <th style="">
                            Date
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($blogs as $blog)
                        <tr>
                            <td>
                                {{$loop->iteration}}
                            </td>
                            <td>
                                <a>
                                    {{$blog->title}}
                                </a>
                                <br/>
                                <small>
                                    Created at {{$blog->created_at}}
                                </small>
                            </td>
                            <td>
                                @foreach($author as $blog_author)
                                    @if($blog_author->id  == $blog->author_id)
                                        {{$blog_author->authorName}}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach($category as $category_single)
                                    @if($category_single->id == $blog->category_id)
                                        {{$category_single->name}}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                {{$blog->date}}

                            </td>

                            <td class="project-actions text-right">
                                <form method="post" action="{{route('Dashboard.blogs.destroy',$blog)}}">
                                    @method("DELETE")
                                    @csrf
                                    <a class="btn btn-primary btn-sm" href="{{route('Dashboard.blogs.show',$blog)}}">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </a>
                                    <a class="btn btn-info btn-sm" href="{{route('Dashboard.blogs.edit',$blog)}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
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
        {{ $blogs->links() }}
    </section>

@endsection
