@extends('dashboard.layout.master')

@section('dashboard-title')
    Category - Add category
@endsection

@section("content")
    <!-- Main content -->
    <section class="content">
        @include('dashboard.layout.messages')
        <form method="post" action="{{route('Dashboard.categories.store')}}">
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
                                <label for="inputName">Category name</label>
                                <input type="text" id="category_name" name="category_name" class="form-control">
                            </div>


                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <a href="{{route('Dashboard.categories.index')}}" class="btn btn-secondary">Cancel</a>
                </div>
                <div class="col-md-6">
                    <input type="submit" value="Add new category" class="btn btn-success float-right">

                </div>
            </div>

        </form>
    </section>
    <!-- /.content -->

@endsection
