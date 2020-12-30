@extends('dashboard.layout.master')

@section('dashboard-title')
    Properties - Add property
@endsection

@section("content")
    <!-- Main content -->
    <section class="content">
        <form method="post" action="{{route('Dashboard.properties.store')}}" enctype="multipart/form-data">
            @include('dashboard.layout.messages')
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
                                <label for="inputName">Property Name</label>
                                <input type="text" id="property_name" name="property_name" class="form-control"
                                       value="{{old('property_name')}}">
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Description</label>
                                <textarea id="property_desc" class="form-control" rows="4" name="property_desc" >
                                    {{old('property_desc')}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="property_img[]"  multiple>
                                    <label class="custom-file-label" for="customFile" >Choose file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Type</label>
                                <select class="form-control custom-select" name="type_id">
                                    <option selected disabled>Select one</option>
                                    @foreach($type as $type)
                                    <option value="{{$type->id}}"
                                    @if (old('type_id') == $type->id) {{ 'selected' }} @endif>{{$type->type}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Area</label>
                                <input type="text" id="property_area" name="property_area" class="form-control" value="{{old('property_area')}}">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Beds</label>
                                <input type="text" id="property_beds" name="property_beds" class="form-control" value="{{old('property_beds')}}">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Baths</label>
                                <input type="text" id="property_baths" name="property_baths" class="form-control" value="{{old('property_baths')}}">
                            </div><div class="form-group">
                                <label for="inputName">Garage</label>
                                <input type="text" id="property_garage" name="property_garage" class="form-control" value="{{old('property_garage')}}">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Location</label>
                                <input type="text" id="property_location" name="property_location" class="form-control" value="{{old('property_location')}}">
                            </div>
                            <div class="form-group">
                                <label for="inputName">status</label>
                                <input type="text" id="property_status" name="property_status" class="form-control" value="{{old('property_status')}}">
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputStatus">Amenities</label>
                                        @foreach($amenities as $amenity)
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="amenity_id" name="amenity_id[]" value="{{$amenity->id}}"

                                                {{ (is_array(old('amenity_id')) && in_array($amenity->id, old('amenity_id'))) ? ' checked' : '' }}>
                                            <label class="form-check-label" >{{$amenity->name}}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="text" id="property_price" name="property_price" class="form-control" value="{{old('property_price')}}">
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Agent</label>
                                <select class="form-control custom-select" name="agent_id">
                                    <option selected disabled>Select one</option>
                                    @foreach($agent as $agent)
                                        <option value="{{$agent->id}}"
                                        @if (old('agent_id') == $agent->id) {{ 'selected' }} @endif>{{$agent->name}}</option>
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
                <a href="{{route('Dashboard.properties.index')}}" class="btn btn-secondary">Cancel</a>
            </div>
            <div class="col-md-6">
                <input type="submit" value="Add new property" class="btn btn-success float-right">

            </div>
        </div>

        </form>
    </section>
    <!-- /.content -->

@endsection
