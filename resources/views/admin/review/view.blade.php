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
                            <table id="bootstrap-table" class="table">
                                <thead>
                                <th data-field="sn" class="text-center">S.N.</th>
                                <th data-field="user" class="text-center">User</th>
                                <th data-field="room_type" class="text-center">Room Type</th>
                                <th data-field="room_number" data-visible="false" class="text-center">Room Number</th>
                                <th data-field="review">Review</th>
                                <th data-field="rating">Rating</th>
                                <th data-field="approval_status" data-sortable="true">Status</th>
                                <th data-field="actions" class="td-actions text-right">Actions
                                </th>
                                </thead>
                                <tbody>
                                @unless($reviews->count())
                                    @else
                                        @foreach($reviews as $index => $review)
                                            <tr>
                                                <td>{{$index+1}}</td>
                                                <td>{{ $review->room_booking->user->first_name." ".$review->room_booking->user->last_name }}</td>
                                                <td>{{ $review->room_booking->room->room_type->name }}</td>
                                                <td>{{ $review->room_booking->room->room_type->name }}</td>
                                                <td>{{ $review->review }}</td>
                                                <td>{{ $review->rating }}</td>
                                                <td>
                                                    @if($review->approval_status == "pending")
                                                        <button class="btn btn-default btn-xs btn-fill">Pending</button>
                                                    @elseif($review->approval_status == "approved")
                                                        <button class="btn btn-success btn-xs btn-fill">Approved
                                                        </button>
                                                    @else
                                                        <button class="btn btn-danger btn-xs btn-fill">Rejected
                                                        </button>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="table-icons">
                                                        <a rel="tooltip" title="Approve"
                                                           class="btn btn-simple btn-success btn-icon table-action approve"
                                                           href="{{url('admin/review/'.$review->id.'/approve')}}">
                                                            <i class="ti-check-box"></i>
                                                        </a>
                                                        <a rel="tooltip" title="Reject"
                                                           class="btn btn-simple btn-danger btn-icon table-action reject"
                                                           href="{{url('admin/review/'.$review->id.'/reject')}}">
                                                            <i class="ti-close"></i>
                                                        </a>
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
        $('a.toggle-vis').on( 'click', function (e) {
            e.preventDefault();

            // Get the column API object
            var column = table.column( $(this).attr('data-column') );

            // Toggle the visibility
            column.visible( ! column.visible() );
        } );

        var delete_button = function(){
            swal({  title: "Are you sure?",
                text: "You want to delete the food.",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn btn-info btn-fill",
                confirmButtonText: "Yes, delete it!",
                cancelButtonClass: "btn btn-danger btn-fill",
                closeOnConfirm: false,
            },function(){
                $('form#delete-food').submit();
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

