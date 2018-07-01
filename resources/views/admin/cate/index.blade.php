@extends('layout.admins')

@section('title','后台首页')

@section('content')

    <div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>
            <i class="icon-table">
            </i>
            {{$title}}
        </span>
    </div>
    @if(Session::has('message'))
        <script>alert({{Session::get('message')}});</script>
    @endif
    <div class="mws-panel-body no-padding">
        <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">
            <div id="DataTables_Table_1_length" class="dataTables_length">
                <label>
                    <a href="/admin/cate/create" class="btn btn-primary">添加类别</a>
                </label>
            </div>
            <form action="/admin/cate" method='get'>
                <div class="dataTables_filter" id="DataTables_Table_1_filter">
                    <label>
                        关键字:
                        <input type="text" name='search' aria-controls="DataTables_Table_1">
                    </label>

                    <button class='btn btn-info'>搜索</button>
                </div>
            </form>
            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 156px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            编号
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 212px;" aria-label="Browser: activate to sort column ascending">
                            类别名称
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 197px;" aria-label="Platform(s): activate to sort column ascending">
                            CATE_PID
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 133px;" aria-label="Engine version: activate to sort column ascending">
                            CATE_PATH
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 97px;" aria-label="CSS grade: activate to sort column ascending">
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">
                @foreach($res as $k => $v)
                    <tr class="@if($k % 2 == 1)  odd   @else even  @endif">
                        <td class=" ">
                            {{$num++}}
                        </td>
                        <td class=" ">
                            {{$v->cate_name}}
                        </td>
                        <td class=" ">
                            {{$v->cate_pid}}
                        </td>
                        <td class=" ">
                            {{$v->cate_path}}
                        </td>
                        <td class=" ">
                            <a href="/admin/cate/{{$v->cate_id}}/edit" class='btn btn-warning'>修改</a>
                            <form action="/admin/cate/{{$v->cate_id}}" method='post'>
								{{method_field('DELETE')}}
								{{csrf_field()}}
								<button class='btn btn-danger' onclick="return confirm('确认要删除吗?');">删除</button>
							</form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="dataTables_info" id="DataTables_Table_1_info">
                共 {{$res->total()}} 数据, 每页显示 {{$res->count()}} 数据!
            </div>
            <style>
            	.pagination{
            		float:right;
            		margin: 8px;
            	}
            	.pagination{
            		list-style: none;
            	}
            	.pagination li{
            		display:inline-block;
            	}
            	.pagination a{margin:0 5px;padding:2px 7px;border:1px solid #c5d52b;}
				.pagination a:hover{background:#CCCC00;border:1px solid #000000;}
            </style>
            <div class="paginations">
            	{{$res->links()}}
            </div>
        </div>
    </div>
</div>

@endsection