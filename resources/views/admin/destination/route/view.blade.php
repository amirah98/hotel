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
                                <a href="{{url('admin/destination/'.$destination->id.'/route/create')}}" rel="tooltip" title="Add New Route"
                                   class="btn btn-danger" style="margin-right: 20px">
                                    <i class="ti-plus"></i>
                                </a>
                                <!--Here you can write extra buttons/actions for the toolbar-->
                            </div>
                            <table id="bootstrap-table" class="table">
                                <thead>
                                <th data-field="sn" class="text-center">Route Number</th>
                                <th data-field="from" class="text-center">From</th>
                                <th data-field="to" data-sortable="true">To</th>
                                <th data-field="travel_options" data-sortable="true">Travel Options</th>
                                <th data-field="hotels" data-sortable="true">Hotels</th>
                                <th data-field="status" data-sortable="true">Status</th>
                                <th data-field="actions" class="td-actions text-right">Actions</th>
                                </thead>
                                <tbody>
                                @unless($routes->count())
                                    @else
                                        @foreach($routes as $index => $route)
                                            <tr>
                                                <td>{{ $route->step_no }}</td>
                                                <td>{{ $route->from_name }}</td>
                                                <td>{{ $route->to_name }}</td>
                                                <td>
                                                    @forelse($route->travel_mediums as $travel_medium)
                                                        <a href="{{url('/admin/travel_medium/'.$travel_medium->id.'/edit')}}" class="btn btn-xs btn-fill">
                                                        {{$travel_medium->name}}, {{$travel_medium->pivot->est_travel_time." Hours"}}, {{"Rs. ".$travel_medium->pivot->est_travel_cost}}
                                                        </a>
                                                        @if(!$loop->last)
                                                            <br><br>
                                                            @endif
                                                    @empty
                                                    @endforelse
                                                </td>
                                                <td>
                                                    @forelse($route->hotels as $hotel)
                                                        <a href="{{url('/admin/hotel/'.$hotel->id.'/edit')}}" class="btn btn-xs btn-fill">
                                                            {{$hotel->name}}, {{"Rs. ".$hotel->cost_per_day}}
                                                        </a>
                                                        @if(!$loop->last)
                                                            <br><br>
                                                        @endif
                                                    @empty
                                                    @endforelse
                                                </td>
                                                <td>
                                                    @if($route->status == 1)
                                                        <button class="btn btn-success btn-xs btn-fill">Active</button>
                                                    @else
                                                        <button class="btn btn-default btn-xs btn-fill">Inactive
                                                        </button>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="table-icons">
                                                        {!! Form::open(array('url' => 'admin/destination/'.$destination->id.'/route/'.$route->id)) !!}
                                                        {{ Form::hidden('_method', 'DELETE') }}
                                                        <a rel="tooltip" title="View"
                                                           class="btn btn-simple btn-info btn-icon table-action view"
                                                           href="javascript:void(0)">
                                                            <i class="ti-image"></i>
                                                        </a>
                                                        <a rel="tooltip" title="Edit"
                                                           class="btn btn-simple btn-warning btn-icon table-action edit"
                                                           href="{{url('admin/destination/'.$destination->id.'/route/'.$route->id.'/edit')}}">
                                                            <i class="ti-pencil-alt"></i>
                                                        </a>
                                                        <button rel="tooltip" title="Remove"
                                                                class="btn btn-simple btn-danger btn-icon table-action"
                                                                type="submit" value="submit">
                                                            <i class="ti-close"></i>
                                                        </button>
                                                        {!! Form::close() !!}

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

