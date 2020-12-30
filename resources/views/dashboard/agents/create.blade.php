@extends('dashboard.layout.master')

@section('dashboard-title')
    Agents - Add agent
@endsection

@section("content")
    <!-- Main content -->
    <section class="content">
        @include('dashboard.layout.messages')
        <form method="post" action="{{route('Dashboard.agents.store')}}" enctype="multipart/form-data">
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
                                <label for="inputName">Agent Name</label>
                                <input type="text" id="agent_name" name="agent_name" class="form-control" value="{{old('agent_name')}}">
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Description</label>
                                <textarea id="agent_desc" class="form-control" rows="4" name="agent_desc">
                                    {{old('agent_desc')}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="agent_image" value="{{old('agent_img')}}">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Phone</label>
                                <input type="text" id="agent_phone" name="agent_phone" class="form-control" value="{{old('agent_phone')}}">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Email</label>
                                <input type="text" id="agent_email" name="agent_email" class="form-control" value="{{old('agent_email')}}">
                            </div>

                            <div class="form-group">
                                <label for="inputName">Facebook link</label>
                                <input type="text" id="agent_fb" name="agent_fb" class="form-control" value="{{old('agent_fb')}}">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Instagram link</label>
                                <input type="text" id="agent_insta" name="agent_insta" class="form-control" value="{{old('agent_insta')}}">
                            </div>
                            <div class="form-group">
                                <label for="">Pintrest link</label>
                                <input type="text" id="agent_pintrest" name="agent_pintrest" class="form-control" value="{{old('agent_pintrest')}}">
                            </div>
                            <div class="form-group">
                                <label for="">Twitter link</label>
                                <input type="text" id="agent_twitter" name="agent_twitter" class="form-control" value="{{old('agent_twitter')}}">
                            </div>
                            <div class="form-group">
                                <label for="">Dribble link</label>
                                <input type="text" id="agent_dribble" name="agent_dribble" class="form-control" value="{{old('agent_dribble')}}">
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <a href="{{route('Dashboard.agents.index')}}" class="btn btn-secondary">Cancel</a>
                </div>
                <div class="col-md-6">
                    <input type="submit" value="Add new agent" class="btn btn-success float-right">

                </div>
            </div>

        </form>
    </section>
    <!-- /.content -->

@endsection
