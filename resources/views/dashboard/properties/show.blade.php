@extends('dashboard.layout.master')

@section('dashboard-title')
    Property Details
@endsection

@section("content")


<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{$property->name}} Details</h3>

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
                    <h3 class="text-primary">{{$property->name}}</h3>
                    <p class="text-muted">{{$property->description}}</p>
                    @foreach($path as $img_path)
                        <img src="{{asset('property_images/'.$img_path)}}" width="150px" height="150px">
                        <br>
                        @endforeach
                    <div class="text-muted">
                        <p>
                            <b>Property ID: </b>
                            {{$property->id}}
                        </p>
                        <p>
                            <b>Property Type: </b>

                                @foreach($type as $typeO)
                                    @if ($property->type_id == $typeO->id)
                                        {{$typeO->type}}
                                    @endif
                                @endforeach
                        </p>
                        <p>
                            <b>Area: </b>
                            {{$property->area}}
                        </p>
                        <p>
                            <b>Beds: </b>
                            {{$property->beds}}
                        </p>
                        <p>
                            <b>Baths: </b>
                            {{$property->baths}}
                        </p>
                        <p>
                            <b>Garage: </b>
                            {{$property->garage}}
                        </p>
                        <p>
                            <b>Location: </b>
                            {{$property->location}}
                        </p>
                        <p>
                            <b>Staus: </b>
                            {{$property->status}}
                        </p>
                        <p>
                            <b>Amenities: <br> </b>

{{--                            @foreach($amenities as $amenity)--}}
{{--                                @if ($property->amenities_id == $amenity->id)--}}
{{--                                    - {{$amenity->name}}--}}
{{--                                @endif--}}
{{--                            @endforeach--}}

                            @foreach($property->amenities as $am)
                                {{$am->name}},
                                @endforeach
                        </p>
                        <p>
                            <b>Price: </b>
                            {{$property->price}}
                        </p>
                        <p>
                            <b>Agent: <br> </b>

                            @foreach($agent as $agent)
                                @if ($property->agent_id == $agent->id)
                                     {{$agent->name}}
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
