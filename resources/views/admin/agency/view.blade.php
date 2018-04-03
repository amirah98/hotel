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
                                <th data-field="id" data-sortable="true">S.N.</th>
                                <th data-field="name" data-sortable="true">Name</th>
                                <th data-field="phone" data-sortable="true">Phone</th>
                                <th data-field="alt_phone" data-sortable="true">Alternate Phone</th>
                                <th data-field="email" data-sortable="true">Email</th>
                                <th data-field="address" data-sortable="true">Address</th>
                                <th data-field="status" data-sortable="true">status</th>
                                <th data-field="agent">Agent</th>
                                <th data-field="actions" class="td-actions text-right">Actions</th>
                                </thead>
                                <tbody>
                                    @forelse($agencies as $agency)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $agency->name }}</td>
                                    <td>{{ $agency->phone }}</td>
                                    <td>{{ $agency->alt_phone }}</td>
                                    <td>{{ $agency->email }}</td>
                                    <td>{{ $agency->address }}</td>
                                    <td>
                                        {!! Form::open(array('url' => 'admin/agency/'.$agency->id.'/status')) !!}
                                        {{ Form::hidden('_method', 'POST') }}
                                        @if($agency->status == TRUE)
                                            <button type="submit" class="badge badge-primary">Active</button>
                                            @else
                                            <button type="submit" class="badge badge-danger">Inactive</button>
                                        @endif
                                        {!! Form::close() !!}
                                    </td>
                                    <td>{{ $agency->user->first_name." ".$agency->user->last_name}}</td>
                                    <td>
                                        <div class="table-icons">
                                            {!! Form::open(array('url' => 'admin/agency/'.$agency->id)) !!}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            <button rel="tooltip" title="Remove"
                                                    class="btn btn-simple btn-danger btn-icon table-action"
                                                    type="submit" value="submit">
                                                <i class="ti-close"></i>
                                            </button>
                                            {!! Form::close() !!}

                                        </div>
                                    </td>
                                </tr>
                                @empty
                                    @endforelse
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