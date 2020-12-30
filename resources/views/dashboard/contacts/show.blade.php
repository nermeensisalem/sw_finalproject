@extends('dashboard.layout.master')

@section('dashboard-title')
    Contact Details
@endsection

@section("content")


    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><b>{{$contact->name}} Details</b></h3>

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
                        <h3 class="text-primary">{{$contact->name}}</h3>
                        <p class="text-muted"><b>Subject-></b> {{$contact->subject}}</p>
                        <br>
                        <div class="text-muted">

                            <p>
                                <b>Email: </b>
                                {{$contact->email}}
                            </p>
                            <p>
                                <b>Message: </b>
                                {{$contact->message}}
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
