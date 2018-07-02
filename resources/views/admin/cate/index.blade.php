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
    <div class="mws-panel-body no-padding">
        <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">
            <div id="DataTables_Table_1_length" class="dataTables_length">
                <label>
                    <a href="/admin/cate/create" class="btn btn-primary">添加类别</a>
                </label>
            </div>
            <form action="/admin/cate" method='get'>
                <div id="DataTables_Table_1_length" class="dataTables_length">
                    <label>
                        显示
                        <select name="pages" size="1" aria-controls="DataTables_Table_1">
                            <option value="5" @if($arr['pages'] == 5)   selected="selected" @endif>
                                5
                            </option>
                            <option value="10" @if($arr['pages'] == 10)   selected="selected" @endif>
                                10
                            </option>
                            <option value="15" @if($arr['pages'] == 15)   selected="selected" @endif>
                                15
                            </option>
                        </select>
                        条数据
                    </label>
                </div>
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
                        rowspan="1" colspan="1" style="width: 80px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            编号
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 180px;" aria-label="Browser: activate to sort column ascending">
                            类别名称
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="Platform(s): activate to sort column ascending">
                            CATE_PID
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">
                            CATE_PATH
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="CSS grade: activate to sort column ascending">
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
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="/admin/cate/{{$v->cate_id}}/edit" class='btn btn-warning'>修改</a>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <form action="/admin/cate/{{$v->cate_id}}" method='post' style="display: inline;">
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
            <link rel="stylesheet" type="text/css" href="/css/page.css" media="screen">
            <div class="dataTables_paginate paging_full_numbers" id="paginate">
                {{ $res->appends($arr)->links() }}
            </div>
        </div>
    </div>
</div>

@endsection