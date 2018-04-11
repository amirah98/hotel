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
                                <th data-field="room_number" class="text-center">Room No.</th>
                                <th data-field="room_type" class="text-center">Type</th>
                                <th data-field="booked_by" class="text-center">Booked By</th>
                                <th data-field="status" data-sortable="true">Status</th>
                                <th data-field="payment" data-sortable="true">Payment</th>
                                <th data-field="actions" class="td-actions text-right">Actions
                                </th>
                                </thead>
                                <tbody>
                                @unless($room_bookings->count())
                                    @else
                                        @foreach($room_bookings as $index => $room_booking)
                                            <tr>
                                                <td>{{$index+1}}</td>
                                                <td>{{ $room_booking->room->room_number }}</td>
                                                <td>{{ $room_booking->room->room_type->name }}</td>
                                                <td>{{ $room_booking->user->first_name." ".$room_booking->user->last_name }}<br>
                                                    <strong>Email: </strong>{{ $room_booking->user->email }}
                                                </td>
                                                <td>
                                                    @if($room_booking->status == "pending")
                                                        <button class="btn btn-success btn-xs btn-fill">Pending</button>
                                                    @elseif($room_booking->status == "checked_in")
                                                        <button class="btn btn-info btn-xs btn-fill">Checked In
                                                        </button>
                                                    @elseif($room_booking->status == "checked_out")
                                                        <button class="btn btn-primary btn-xs btn-fill">Checked Out
                                                        </button>
                                                    @elseif($room_booking->status == "canceled")
                                                        <button class="btn btn-danger btn-xs btn-fill">Canceled
                                                        </button>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($room_booking->payment == 1)
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
                                                           href="{{url('admin/room_booking/'.$room_booking->id.'/edit')}}">
                                                            <i class="ti-pencil-alt"></i>
                                                        </a>
                                                        <div class="collapse">
                                                            {!! Form::open(array('id' => 'delete-room-booking', 'url' => 'admin/room_booking/'.$room_booking->id)) !!}
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
                text: "After you delete the room booking.",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn btn-info btn-fill",
                confirmButtonText: "Yes, delete it!",
                cancelButtonClass: "btn btn-danger btn-fill",
                closeOnConfirm: false,
            },function(){
                $('form#delete-room-booking').submit();
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

