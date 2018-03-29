@extends('guests.layout')

@section('title', 'Mumias Law Courts')

@section('content')

    <div class="row">
    </div>

    <!-- /.row -->
    <div class="row">

    </div>
    <!-- /.row -->
    <div class="row">

        <!-- /.col-lg-8 -->
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-bell fa-fw"></i> Notifications Panel
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="list-group">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#calendar">
                            <i class="fa fa-calendar "></i> Court Calendar
                        </button>

                        <span class="pull-right text-muted small">
                                    </span>
                        </a>



                        <!-- Modal -->
                        <div class="modal fade" id="calendar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="calendar">Court Calendar</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>





                    </div>
                    <!-- /.list-group -->
                    <!--  <a href="#" class="btn btn-default btn-block">View All Alerts</a> -->
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
        <!-- /.col-lg-4 -->
    </div>
    <!-- /.row -->

@stop
