@extends('layouts.admin')
@section('style')
    @parent
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="content">
                            <div class="toolbar">
                                <!--Here you can write extra buttons/actions for the toolbar-->
                            </div>
                            <table id="bootstrap-table" class="table">
                                <thead>
                                <th data-field="sn" class="text-center">S.N.</th>
                                <th data-field="event" class="text-center">Event</th>
                                <th data-field="event_date" class="text-center">Event Date</th>
                                <th data-field="no_of_tickets" class="text-center">No. of Tickets</th>
                                <th data-field="booked_by" class="text-center">Booked By</th>
                                <th data-field="status" data-sortable="true">Status</th>
                                <th data-field="payment" data-sortable="true">Payment</th>
                                <th data-field="actions" class="td-actions text-right">Actions
                                </th>
                                </thead>
                                <tbody>
                                @unless($event_bookings->count())
                                    @else
                                        @foreach($event_bookings as $index => $event_booking)
                                            <tr>
                                                <td>{{$index+1}}</td>
                                                <td>{{ $event_booking->event->name }}</td>
                                                <td>{{ $event_booking->event->date }}</td>
                                                <td>{{ $event_booking->number_of_tickets }}</td>
                                                <td>{{ $event_booking->user->first_name." ".$event_booking->user->last_name }}<br>
                                                    <strong>Email: </strong>{{ $event_booking->user->email }}
                                                </td>
                                                <td>
                                                    @if($event_booking->status == "1")
                                                        <button class="btn btn-success btn-xs btn-fill">Active</button>
                                                    @else
                                                        <button class="btn btn-danger btn-xs btn-fill">Canceled
                                                        </button>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($event_booking->payment == 1)
                                                        <button class="btn btn-success btn-xs btn-fill">Paid</button>
                                                    @else
                                                        <button class="btn btn-default btn-xs btn-fill">Not Paid
                                                        </button>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="table-icons">

                                                        <a rel="tooltip" title="Edit"
                                                           class="btn btn-simple btn-warning btn-icon table-action edit"
                                                           href="{{url('admin/event_booking/'.$event_booking->id.'/edit')}}">
                                                            <i class="ti-pencil-alt"></i>
                                                        </a>
                                                        <div class="collapse">
                                                            {!! Form::open(array('id' => 'delete-event-booking', 'url' => 'admin/event_booking/'.$event_booking->id)) !!}
                                                            {{ Form::hidden('_method', 'DELETE') }}
                                                            <button type="submit" class="btn btn-danger btn-ok">Delete</button>
                                                            {!! Form::close() !!}
                                                        </div>

                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @endunless
                                </tbody>
                            </table>
                        </div>
                    </div><!--  end card  -->
                </div> <!-- end col-md-12 -->
            </div> <!-- end row -->
        </div>
    </div>
@endsection
@section('scripts')
    @parent

    <!-- Sweet Alert 2 plugin -->
    <script src="{{ asset('backend/js/sweetalert2.js') }}"></script>

    <!--  Bootstrap Table Plugin    -->
    <script src="{{ asset('backend/js/bootstrap-table.js') }}"></script>
    <script type="text/javascript">

        var delete_button = function(){
            swal({  title: "Are you sure?",
                text: "After you delete the event booking.",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn btn-info btn-fill",
                confirmButtonText: "Yes, delete it!",
                cancelButtonClass: "btn btn-danger btn-fill",
                closeOnConfirm: false,
            },function(){
                $('form#delete-event-booking').submit();
            });
        }



        var $table = $('#bootstrap-table');
        $().ready(function () {
            $table.bootstrapTable({
                toolbar: ".toolbar",
                clickToSelect: true,
                showRefresh: true,
                search: true,
                showToggle: true,
                showColumns: true,
                pagination: true,
                searchAlign: 'left',
                pageSize: 8,
                clickToSelect: false,
                pageList: [8, 10, 25, 50, 100],

                formatShowingRows: function (pageFrom, pageTo, totalRows) {
                    //do nothing here, we don't want to show the text "showing x of y from..."
                },
                formatRecordsPerPage: function (pageNumber) {
                    return pageNumber + " rows visible";
                },
                icons: {
                    refresh: 'fa fa-refresh',
                    toggle: 'fa fa-th-list',
                    columns: 'fa fa-columns',
                    detailOpen: 'fa fa-plus-circle',
                    detailClose: 'ti-close'
                }
            });

            //activate the tooltips after the data table is initialized
            $('[rel="tooltip"]').tooltip();

            $(window).resize(function () {
                $table.bootstrapTable('resetView');
            });
        });

    </script>
@endsection

