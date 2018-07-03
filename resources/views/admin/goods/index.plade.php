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

			<form action="/admin/user" method='get'>
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
	                    <input type="text" name='search' value="{{$arr['search']}}" aria-controls="DataTables_Table_1">
	                </label>

	                <button class='btn btn-info'>搜索</button>
	            </div>
            </form>



            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 198px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            ID编号
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 266px;" aria-label="Browser: activate to sort column ascending">
                            商品名称
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 247px;" aria-label="Platform(s): activate to sort column ascending">
                            商品类别
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 170px;" aria-label="Engine version: activate to sort column ascending">
                            商品价格
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 126px;" aria-label="CSS grade: activate to sort column ascending">
                           商品库存
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 126px;" aria-label="CSS grade: activate to sort column ascending">
                           商品销量
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 126px;" aria-label="CSS grade: activate to sort column ascending">
                           热卖商品
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 126px;" aria-label="CSS grade: activate to sort column ascending">
                           商品图片
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 126px;" aria-label="CSS grade: activate to sort column ascending">
                           商品描述
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 126px;" aria-label="CSS grade: activate to sort column ascending">
                           商品颜色
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 126px;" aria-label="CSS grade: activate to sort column ascending">
                           商品型号
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 126px;" aria-label="CSS grade: activate to sort column ascending">
                           商品状态
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 140px;" aria-label="CSS grade: activate to sort column ascending">
                           操作
                        </th>
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">

                    <tr class="@if($k % 2 == 1)  odd   @else even  @endif">
                        <td class="">
                            ID编号
                        </td>
                        <td class=" ">
                            商品名称
                        </td>
                        <td class=" ">
                            商品类别
                        </td>
                        <td class=" ">
                            商品价格
                        </td>
                        <td class=" ">
                            商品库存
                        </td>
                        <td class=" ">
                            商品销量
                        </td>
                        <td class=" ">
                            热卖商品
                        </td>
                        <td class=" ">
                            <img src="" alt="商品图片" width='100'>
                        </td>
                        <td class=" ">
                            商品描述
                        </td>
                        <td class=" ">
                            商品颜色
                        </td>
                        <td class=" ">
                            商品型号
                        </td>
                         <td class=" ">
                            {{--checkfun($v->status)--}}
                        </td>
                         <td class=" ">
                            <a href="/admin/user/{{$v->id}}/edit" class='btn btn-info'>修改</a>

                            <form action="/admin/user/{{$v->id}}" method='post' style='display:inline'>
                                {{csrf_field()}}

                                {{method_field('DELETE')}}
                                <button href="" class='btn btn-warning'>删除</button>

                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="dataTables_info" id="DataTables_Table_1_info">
                Showing 1 to 10 of 57 entries
            </div>


            <div class="dataTables_paginate paging_full_numbers" id="paginate">

				<!-- {{$res->links()}} -->

                <!-- $arr  ====> ['num'=20,'search'=>'zz'] -->

                {{--$res->links()--}}
            </div>
        </div>
    </div>
</div>

@endsection