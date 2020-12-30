@extends('dashboard.layout.master')

@section('dashboard-title')
    Comments
@endsection

@section("content")

    <section class="content">
        @include('dashboard.layout.messages')
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
                        <th style="">
                            Name
                        </th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>
                                {{$loop->iteration}}
                            </td>
                            <td>
                                <a>
                                    {{$category->name}}
                                </a>
                                <br/>
                                <small>
                                    Created at {{$category->created_at}}
                                </small>
                            </td>
                            <td class="project-actions text-right">
                                <form method="post" action="{{route('Dashboard.categories.destroy',$category)}}">
                                    @method("DELETE")
                                    @csrf
                                    <a class="btn btn-info btn-sm" href="{{route('Dashboard.categories.edit',$category)}}">
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
        {{ $categories->links() }}
    </section>

@endsection
