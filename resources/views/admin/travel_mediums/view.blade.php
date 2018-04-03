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
                                <a href="{{url('admin/travel_medium/create')}}" rel="tooltip" title="Add New Travel Medium"
                                   class="btn btn-danger" style="margin-right: 20px">
                                    <i class="ti-plus"></i>
                                </a>
                                <!--Here you can write extra buttons/actions for the toolbar-->
                            </div>
                            <table id="bootstrap-table" class="table">
                                <thead>
                                <th data-field="sn" class="text-center">S.N.</th>
                                <th data-field="name" class="text-center">Name</th>
                                <th data-field="travel_mode">Travel Mode</th>
                                <th data-field="description" data-sortable="true">Description</th>
                                <th data-field="actions" class="td-actions text-right">Actions
                                </th>
                                </thead>
                                <tbody>
                                @unless($travel_mediums->count())
                                    @else
                                        @foreach($travel_mediums as $index => $travel_medium)
                                            <tr>
                                                <td>{{$index+1}}</td>
                                                <td>{{ $travel_medium->name }}</td>
                                                <td><span class="badge">{{ $travel_medium->travel_mode }}</span></td>
                                                <td>{{ $travel_medium->description }}</td>
                                                <td>
                                                    <div class="table-icons">
                                                        <a rel="tooltip" title="Edit"
                                                           class="btn btn-simple btn-warning btn-icon table-action edit"
                                                           href="{{url('admin/travel_medium/'.$travel_medium->id.'/edit')}}">
                                                            <i class="ti-pencil-alt"></i>
                                                        </a>
                                                        <button rel="tooltip" title="Remove"
                                                                class="btn btn-simple btn-danger btn-icon table-action"
                                                                onclick="delete_button()">
                                                            <i class="ti-close"></i>
                                                        </button>
                                                        <div class="collapse">
                                                            {!! Form::open(array('id' => 'delete-travel_medium', 'url' => 'admin/travel_medium/'.$travel_medium->id)) !!}
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
                text: "You want to delete the travel medium.",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn btn-info btn-fill",
                confirmButtonText: "Yes, delete it!",
                cancelButtonClass: "btn btn-danger btn-fill",
                closeOnConfirm: false,
            },function(){
                $('form#delete-travel_medium').submit();
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

