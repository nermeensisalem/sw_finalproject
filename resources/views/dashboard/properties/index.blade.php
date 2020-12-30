@extends('dashboard.layout.master')

@section('dashboard-title')
    Properties
@endsection

@section("content")

    <section class="content">
    @include('dashboard.layout.messages')

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Properties</h3>

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
                            Property Name
                        </th>
                        <th style="">
                            Type
                        </th>

                        <th style="">
                            Location
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Price
                        </th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($properties as $property)
                    <tr>
                        <td>
                            {{$loop->iteration}}
                        </td>
                        <td>
                            <a>
                                {{$property->name}}
                            </a>
                            <br/>
                            <small>
                                Created at {{$property->created_at}}
                            </small>
                        </td>

                        <td>
                            @foreach($type as $typeO)
                                @if ($property->type_id == $typeO->id)
                                    {{$typeO->type}}
                                @endif
                            @endforeach
                        </td>

                        <td>

                            {{$property->location}}
                        </td>
                        <td>
                            {{$property->status}}
                        </td>
                        <td>
                            {{$property->price}}
                        </td>

                        <td class="project-actions text-right">
                            <form method="post" action="{{route('Dashboard.properties.destroy',$property)}}">
                                @method("DELETE")
                                @csrf
                                <a class="btn btn-primary btn-sm" href="{{route('Dashboard.properties.show',$property)}}">
                                    <i class="fas fa-folder">
                                    </i>
                                    View
                                </a>
                                <a class="btn btn-info btn-sm" href="{{route('Dashboard.properties.edit',$property)}}">
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
        {{ $properties->links() }}
    </section>

@endsection
