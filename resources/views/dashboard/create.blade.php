@extends('layout')


@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Blank Page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Blank Page</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Title</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">

                    <form action="{{url('UserStore')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                       placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                       placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">phone</label>
                                <input type="text" name="phone" class="form-control" id="exampleInputEmail1"
                                       placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">gender</label>

                                <div class="form-check">
                                    <input type="radio" name="gender" value='1'>
                                    <label for="exampleInputEmail1">male</label>
                                    <input type="radio" name="gender" value='0'>
                                    <label for="exampleInputEmail1">female</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">bd</label>
                                <input type="date" name="bd" class="form-control" id="exampleInputEmail1"
                                       placeholder="Enter email">
                            </div>
                            <div class="form-group">

                                <select name="membership">
                                    @foreach($memberships as $membership)
                                        <option value="{{$membership->id}}">{{$membership->membership_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

