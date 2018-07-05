@extends('layout.admins')
@section('title',$title)

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

			<form action="/admin/goods" method='get'>
	            <div id="DataTables_Table_1_length" class="dataTables_length">
	                <label>
	                    显示
	                    <select name="num" size="1" aria-controls="DataTables_Table_1">

	                        <option value="10">
	                            10
	                        </option>
	                        <option value="20">
	                            20
	                        </option>
	                        <option value="30">
	                            30
	                        </option>
	                    </select>
	                    条数据
	                </label>
	            </div>
	            <div class="dataTables_filter" id="DataTables_Table_1_filter">
	                <label>
	                    关键字:
	                    <input type="text" name='search' value="" aria-controls="DataTables_Table_1">
	                </label>

	                <button class='btn btn-info'>搜索</button>
	            </div>
            </form>



            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 50px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            编号
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">
                            名称
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="Platform(s): activate to sort column ascending">
                            类别
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 120px;" aria-label="Engine version: activate to sort column ascending">
                            价格
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 120px;" aria-label="CSS grade: activate to sort column ascending">
                           库存
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 80px;" aria-label="CSS grade: activate to sort column ascending">
                           销量
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 80px;" aria-label="CSS grade: activate to sort column ascending">
                           热销
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="CSS grade: activate to sort column ascending">
                           状态
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 360px;" aria-label="CSS grade: activate to sort column ascending">
                           操作
                        </th>
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">
                @foreach($goods as $k => $v)
                    <tr class="@if($k % 2 == 1)  odd   @else even  @endif">
                        <td class="">
                            {{$num++}}
                        </td>
                        <td class=" ">
                            {{$v->goods_name}}
                        </td>
                        <td class=" ">
                            {{$v->cate->cate_name}}
                        </td>
                        <td class=" ">
                            {{$v->goods_price}}
                        </td>
                        <td class=" ">
                            {{$v->goods_stock}}
                        </td>
                        <td class=" ">
                            {{$v->goods_sales}}
                        </td>
                        <td class=" ">
                            @if($v->goods_hot==1)
                                普通商品
                            @else
                                热销商品
                            @endif
                        </td>
                         <td class=" " id="status">
                            @if($v->goods_status==1)
                                上架&nbsp;&nbsp;&nbsp;
                                <a href="/admin/goods/up/{{$v->goods_id}}">下架</a>
                            @else
                                下架&nbsp;&nbsp;&nbsp;
                                <a href="/admin/goods/down/{{$v->goods_id}}">上架</a>
                            @endif
                        </td>
                         <td class=" ">
                            <a href="/admin/goods/{{$v->goods_id}}" class='btn btn-info'>商品详情</a>
                            <a href="/admin/goods/{{$v->goods_id}}/edit" class='btn btn-warning'>修改</a>

                            <form action="/admin/goods/{{$v->goods_id}}" method='post' style='display:inline'>
                                {{csrf_field()}}

                                {{method_field('DELETE')}}
                                <button href="" class='btn btn-danger'>删除</button>

                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="dataTables_info" id="DataTables_Table_1_info">
                共 {{$goods->total()}} 数据, 每页显示 {{$goods->count()}} 数据!
            </div>
            <link rel="stylesheet" type="text/css" href="/css/page.css" media="screen">
            <div class="dataTables_paginate paging_full_numbers" id="paginate">
                {{ $goods->links() }}
            </div>
        </div>
    </div>
</div>

@endsection