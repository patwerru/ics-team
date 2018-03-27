@extends('magistrate.layout')

@section('title', 'View Users ')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tables</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Users List
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>ID number</th>
                            <th>Contacts</th>
                            <th>User type</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($users)>0)
                            @foreach($users as $user)
                                <tr class="gradeC">
                                    <td>{{ $user->first_name }}{{$user->last_name}}</td>
                                    <td>{{$user->phone_number}}</td>
                                    <td>{{$user->id_number}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <a href=""><i class="fa fa-trash fa-2x pull-right"></i></a>&nbsp;
                                        <a href=""><i class="fa fa-edit fa-2x pull-right"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                    </table>

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

@stop
