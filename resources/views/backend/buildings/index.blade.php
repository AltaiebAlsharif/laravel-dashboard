@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.buildings.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.buildings.management') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.buildings.management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.buildings.partials.buildings-header-buttons')
            </div>
        </div><!--box-header with-border-->

        <div class="box-body">
            <div class="table-responsive data-table-wrapper">
                <table id="buildings-table" class="table table-condensed table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.buildings.table.id') }}</th>
                            <th>{{ trans('labels.backend.buildings.table.name') }}</th>
                            <th>{{ trans('labels.backend.buildings.table.city') }}</th>
                            <th>{{ trans('labels.backend.buildings.table.neighborhood') }}</th>
                            <th>{{ trans('labels.backend.buildings.table.owner_id') }}</th>
                            <th>{{ trans('labels.backend.buildings.table.building_type_id') }}</th>
                            <th>{{ trans('labels.backend.buildings.table.note') }}</th>
                            <th>{{ trans('labels.backend.buildings.table.createdat') }}</th>
                            <th>{{ trans('labels.general.actions') }}</th>
                        </tr>
                    </thead>
                    <thead class="transparent-bg">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->
@endsection

@section('after-scripts')
    {{-- For DataTables --}}
    {{ Html::script(mix('js/dataTable.js')) }}

    <script>
        //Below written line is short form of writing $(document).ready(function() { })
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            var dataTable = $('#buildings-table').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.buildings.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: '{{config('module.buildings.table')}}.id'},
                    {data: 'name', name: '{{config('module.buildings.table')}}.name'},
                    {data: 'city', name: '{{config('module.buildings.table')}}.city'},
                    {data: 'neighborhood', name: '{{config('module.buildings.table')}}.neighborhood'},
                    {data: 'owner_id', name: '{{config('module.buildings.table')}}.owner_id'},
                    {data: 'building_type_id', name: '{{config('module.buildings.table')}}.building_type_id'},
                    {data: 'note', name: '{{config('module.buildings.table')}}.note'},
                    {data: 'created_at', name: '{{config('module.buildings.table')}}.created_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500,
                dom: 'lBfrtip',
                buttons: {
                    buttons: [
                        { extend: 'copy', className: 'copyButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'csv', className: 'csvButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'excel', className: 'excelButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'pdf', className: 'pdfButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'print', className: 'printButton',  exportOptions: {columns: [ 0, 1 ]  }}
                    ]
                }
            });

            Backend.DataTableSearch.init(dataTable);
        });
    </script>
@endsection
