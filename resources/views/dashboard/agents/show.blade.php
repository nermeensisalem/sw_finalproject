@extends('dashboard.layout.master')

@section('dashboard-title')
    Agent Details
@endsection

@section("content")


    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{$agent->name}} Details</h3>

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
                        <h3 class="text-primary">{{$agent->name}}</h3>
                        <p class="text-muted">{{$agent->description}}</p>
                        <img src="@if($agent->agent_image != null)
                        {{asset('agent_images/'.$agent->agent_image->path)}}
                        @endif" width="150px" height="150px">
                        <br>
                        <div class="text-muted">
                            <p>
                                <b>Property ID: </b>
                                {{$agent->id}}
                            </p>

                            <p>
                                <b>Phone: </b>
                                {{$agent->phone}}
                            </p>
                            <p>
                                <b>Email: </b>
                                {{$agent->email}}
                            </p>
                            <p>
                                <b>Facebook: </b>
                                {{$agent->facebookLink}}
                            </p>
                            <p>
                                <b>Instagram: </b>
                                {{$agent->instagramLink}}

                            </p>
                            <p>
                                <b>Twitter: </b>
                                {{$agent->twitterLink}}

                            </p>
                            <p>
                                <b>Pintrest: </b>
                                {{$agent->pintrestLink}}

                            </p>

                            <p>
                                <b>Dribble: </b>
                                {{$agent->dribbleLink}}
                            </p>
                            <p>
                                <b>Properties: ( {{$count}} ) </b>
                                @foreach($agent->properties as $agent_prop)
                                    @if ($agent_prop->agent_id == $agent->id)

                                        - {{$agent_prop->name}}
                                    @endif
                                @endforeach
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
