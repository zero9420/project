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
	                    <select name="pages" size="1" aria-controls="DataTables_Table_1">

	                        <option value="10" @if($request->pages== 10)   selected="selected" @endif>
	                            10
	                        </option>
	                        <option value="30" @if($request->pages== 30)   selected="selected" @endif>
	                            30
	                        </option>
	                        <option value="50" @if($request->pages== 50)   selected="selected" @endif>
	                            50
	                        </option>
	                    </select>
	                    条数据
	                </label>
	            </div>
	            <div class="dataTables_filter" id="DataTables_Table_1_filter">
	                <label>
                        商品名字:
                        <input type="text" name='gname' value="{{$request->gname}}" aria-controls="DataTables_Table_1">
                    </label>
                    <label>
                        最小价格:
                        <input type="number" name='min_price' value="{{$request->min_price}}" aria-controls="DataTables_Table_1">
                    </label>
                    <label>
	                    最大价格:
	                    <input type="number" name='max_price' value="{{$request->max_price}}" aria-controls="DataTables_Table_1">
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
                        rowspan="1" colspan="1" style="width: 160px;" aria-label="Browser: activate to sort column ascending">
                            名称
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 160px;" aria-label="Platform(s): activate to sort column ascending">
                            类别
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 80px;" aria-label="Engine version: activate to sort column ascending">
                            价格
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 60px;" aria-label="CSS grade: activate to sort column ascending">
                           销量
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 80px;" aria-label="CSS grade: activate to sort column ascending">
                           热销
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 70px;" aria-label="CSS grade: activate to sort column ascending">
                           状态
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 300px;" aria-label="CSS grade: activate to sort column ascending">
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
                            {{$v->goods_sales}}
                        </td>
                        <td class=" ">
                            @if($v->goods_hot==1)
                                <button class="btn btn-info" id="hot_<?php echo $v->goods_id ?>" onclick="hot({{$v->goods_id}})" value="1">普通</button>
                            @else
                                <button class='btn btn-danger' id="hot_<?php echo $v->goods_id ?>" onclick="hot({{$v->goods_id}})" value="2">热卖</button>
                            @endif
                        </td>
                         <td class=" ">
                            @if($v->goods_status==1)
                                <button class="btn btn-success status" id="<?php echo $v->goods_id ?>" onclick="stu({{$v->goods_id}})" value="1">上架</button>
                            @else
                                <button class='btn btn-primary status' id="<?php echo $v->goods_id ?>" onclick="stu({{$v->goods_id}})" value="2">下架</button>
                            @endif
                        </td>
                         <td class=" ">
                            <a href="/admin/goods/{{$v->goods_id}}" class='btn btn-info'>商品详情</a>
                            <a href="/admin/goods/{{$v->goods_id}}/edit" class='btn btn-warning'>修改</a>

                            <form action="/admin/goods/{{$v->goods_id}}" method='post' style='display:inline'>
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button href="" class='btn btn-danger' onclick="return confirm('确定要删除吗?');">删除</button>

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
                {{ $goods->appends($request->all())->links() }}
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

    <script>
        // 商品状态
        function stu($id){
            var id = $id;
            var status = $('.status'+'#'+id).val();
            if(status == '1'){
                var pro = "你确定下架吗??";
            } else {
                var pro = "你确定上架吗??";
            }
            var sta = confirm(pro);
            if(sta){
                $.get('/admin/ajaxstatus',{status:status,id:id},function(data){
                    if(data == '2'){
                        $('.status'+'#'+id).attr('class','status btn btn-primary').text('下架');
                        $('.status'+'#'+id).val('2');
                    } else if(data=='1') {
                        $('.status'+'#'+id).attr('class','status btn btn-success').text('上架');
                        $('.status'+'#'+id).val('1');
                    } else {
                        alert('修改失败');
                    }
                })
            }
        }

        // 热卖商品
        function hot($e){
            var ids = $e;
            var hots = $('#hot_'+ids).val();
            if(hots == '1'){
                var pro = "你确定将商品定义为热卖吗??";
            } else {
                var pro = "你确定取消热卖商品吗??";
            }
            var prom = confirm(pro);
            if(prom){
                $.get('/admin/ajaxhot',{hots:hots,ids:ids},function(data){
                    if(data == '2'){
                        $('#hot_'+ids).attr('class','btn btn-danger').text('热卖');
                        $('#hot_'+ids).val('2');
                    } else if(data=='1') {
                        $('#hot_'+ids).attr('class','btn btn-info').text('普通');
                        $('#hot_'+ids).val('1');
                    } else {
                        alert('修改失败');
                    }
                })
            }
        }

    </script>

@endsection