@extends('dashboard.layout.master')

@section('dashboard-title')
    Contacts
@endsection

@section("content")

    <section class="content">
@include('dashboard.layout.messages')
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Contacts</h3>

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
                            Contact Name
                        </th>
                        <th style="">
                            Email
                        </th>
                        <th style="">
                            Subject
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <td>
                                {{$loop->iteration}}
                            </td>
                            <td>
                                <a>
                                    {{$contact->name}}
                                </a>
                                <br/>
                                <small>
                                    Created at {{$contact->created_at}}
                                </small>
                            </td>
                            <td>
                                {{$contact->email}}
                            </td>
                            <td>
                                {{$contact->subject}}
                            </td>




                            <td class="project-actions text-right">
                                <form method="post" action="{{route('Dashboard.contacts.destroy',$contact)}}">
                                    @method("DELETE")
                                    @csrf
                                    <a class="btn btn-primary btn-sm" href="{{route('Dashboard.contacts.show',$contact)}}">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
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
        {{ $contacts->links() }}
    </section>

@endsection
