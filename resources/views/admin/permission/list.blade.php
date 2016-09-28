@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="{{asset('backend/plugin/css/jquery-ui-1.10.3.full.min.css')}}" />
@endsection
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                {{trans('labels.permission.systemManage')}}
                <small>
                    <i class="icon-double-angle-right"></i>
                    {{trans('labels.permission.permissionManage')}}
                </small>
            </h1>
        </div><!-- /.page-header -->
        <div class="row">
            <!-- PAGE CONTENT BEGINS -->
            <div class="col-xs-12">
                @include('flash::message')
                <h3 class="header smaller lighter blue">
                    {{trans('labels.permission.list')}}
                    @permission(config('admin.permissions.permission.create.name'))
                    <a href="{{route('admin.permission.create')}}" class="btn btn-sm btn-primary">{{trans('labels.add')}}</a>
                    @endpermission
                </h3>
                <div class="table-responsive">
                    <div id="sample-table-2_wrapper" class="dataTables_wrapper" role="grid">
                        <table id="permission" class="table table-striped table-bordered table-hover dataTable" aria-describedby="sample-table-2_info">
                            <thead>
                            <tr role="row">
                                <th class="center sorting_disabled" style="width: 56px;">
                                    <label>
                                        <input type="checkbox" class="ace">
                                        <span class="lbl"></span>
                                    </label>
                                </th>
                                <th class="sorting" style="width: 162px;">
                                    {{trans('labels.permission.name')}}
                                </th>
                                <th class="sorting" style="width: 162px;">
                                    {{trans('labels.permission.slug')}}
                                </th>
                                <th class="sorting"  style="width: 112px;">
                                    {{trans('labels.role.description')}}
                                </th>
                                <th class="hidden-480 sorting" style="width: 121px;">
                                    {{trans('labels.role.status')}}
                                </th>
                                <th class="sorting" style="width: 179px;">
                                    {{trans('labels.user.created_at')}}
                                </th>
                                <th class="hidden-480 sorting" style="width: 156px;">
                                    {{trans('labels.user.updated_at')}}
                                </th>
                                <th class="sorting_disabled"  style="width: 155px;">
                                    {{trans('labels.user.action')}}
                                </th>
                            </tr>
                            </thead>
                            <tbody role="alert" aria-live="polite" aria-relevant="all">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->


    <div id="dialog-confirm" class="hide">
        <div class="alert alert-info bigger-110">
            {{trans('alerts.delete.info')}}
        </div>

        <div class="space-6"></div>

        <p class="bigger-110 bolder center grey">
            <i class="icon-hand-right blue bigger-120"></i>
            {{trans('alerts.delete.sure')}}
        </p>
    </div><!-- #dialog-confirm -->


@endsection

@section('js')
    <script  src="{{asset('backend/admin/permission/dataTables.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/plugin/js/jquery-ui-1.10.3.full.min.js')}}"></script>
    <script src="{{asset('backend/plugin/js/jquery.ui.touch-punch.min.js')}}"></script>
    {{--destroy--}}
    <script type="text/javascript">
        $(document).on('click', '#destroy', function () {
            var destroy = $(this);
            $( "#dialog-confirm" ).removeClass('hide').dialog({
                resizable: false,
                modal: true,
                title: "123",
                title_html: false,
                buttons: [
                    {
                        html: "<i class='icon-trash bigger-110'></i>&nbsp; {{trans('alerts.delete.submit')}}",
                        "class" : "btn btn-danger btn-xs",
                        click: function() {
                            $( this ).dialog( "close" );
                            destroy.find('form[name="delete_item"]').submit();
                        }
                    }
                    ,
                    {
                        html: "<i class='icon-remove bigger-110'></i>&nbsp; {{trans('alerts.delete.cancel')}}",
                        "class" : "btn btn-xs",
                        click: function() {
                            $( this ).dialog( "close" );
                        }
                    }
                ]
            });

        });
    </script>
@endsection