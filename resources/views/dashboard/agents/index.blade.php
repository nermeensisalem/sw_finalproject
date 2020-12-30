@extends('dashboard.layout.master')

@section('dashboard-title')
    Agents
@endsection

@section("content")

    <section class="content">
        @include('dashboard.layout.messages')
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Agents</h3>

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
                            Agent Name
                        </th>
                        <th style="">
                            Image
                        </th>
                        <th style="">
                            Phone
                        </th>

                        <th style="">
                            Email
                        </th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($agents as $agent)
                        <tr>
                            <td>
                                {{$loop->iteration}}
                            </td>
                            <td>
                                <a>
                                    {{$agent->name}}
                                </a>
                                <br/>
                                <small>
                                    Created at {{$agent->created_at}}
                                </small>
                            </td>
                            <td>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <img alt="Avatar" class="table-avatar" width="55" height="60"
                                             src="@if($agent->agent_image != null)
                                             {{asset('agent_images/'.$agent->agent_image->path)}}
                                                 @endif">



                                    </li>

                                </ul>
                            </td>


                            <td>

                                {{$agent->phone}}
                            </td>
                            <td>
                                {{$agent->email}}
                            </td>
                            <td>


                            </td>

                            <td class="project-actions text-right">
                                <form method="post" action="{{route('Dashboard.agents.destroy',$agent)}}">
                                    @method("DELETE")
                                    @csrf
                                    <a class="btn btn-primary btn-sm" href="{{route('Dashboard.agents.show',$agent)}}">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </a>
                                    <a class="btn btn-info btn-sm" href="{{route('Dashboard.agents.edit',$agent)}}">
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
        {{ $agents->links() }}
    </section>

@endsection
