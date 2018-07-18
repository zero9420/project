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
                        <input type="number" name='min_price' value="{{$request->min_price}}" aria-controls="DataTables_Table_3">
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
                        rowspan="1" colspan="1" style="width: 60px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            序号
                        </th>
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 30px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            ID
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 180px;" aria-label="Browser: activate to sort column ascending">
                            名称
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="Platform(s): activate to sort column ascending">
                            类别
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 50px;" aria-label="Engine version: activate to sort column ascending">
                            价格
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">
                            优惠
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="CSS grade: activate to sort column ascending">
                           库存@if($stock!=0)<a href="javascript:void(0)" id="stock" title="将库存小于20的一键全部加100"><i class="icon-truck"></i></a>
                           @endif
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
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="CSS grade: activate to sort column ascending">状态&nbsp;&nbsp;@if($status != '0')<span id="status" title="一键全部上架"><i class="icon-rocket"></i></span>@endif
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="CSS grade: activate to sort column ascending">
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
                        <td class="">
                            {{$v->goods_id}}
                        </td>
                        <td class=" ">
                            {{$v->goods_name}}
                        </td>
                        <td class=" ">
                            {{$v->cate->cate_name}}
                        </td>
                        <td class=" " id="price_{{$v->goods_id}}">
                            {{$v->goods_price}}
                        </td>
                        <style>
                            .preferential{
                                font-size:24px;
                                margin: 5px;
                            }
                        </style>
                        <td class=" ">
                            <span id="pre_{{$v->goods_id}}" style="color:red;">{{$v->goods_preferential}}</span><a onclick="uct({{$v->goods_id}})" class="preferential" href="javascript:void(0)" title="降价10%"><i class="icon-arrow-down-3"></i></a>
                        </td>
                        <td class=" ">
                            <span id="stock_{{$v->goods_id}}">{{$v->goods_stock}}</span>@if($v->goods_stock <= '20')<a href="javascript:void(0)" onclick="add({{$v->goods_id}})" title="点击添加库存"><i class="icol-add"></i></a>@endif
                        </td>
                        <td class=" ">
                            {{$v->goods_sales}}
                        </td>
                        <td class=" ">
                            @if($v->goods_hot==1)<button class="btn btn-info" id="hot_<?php echo $v->goods_id ?>" onclick="hot({{$v->goods_id}})" value="1">普通</button>
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
                            <span class="btn-group">
                                <a href="/admin/goods/{{$v->goods_id}}" class="btn btn-small" title="查看商品详情"><i class="icon-search"></i></a>
                                <a href="/admin/goods/{{$v->goods_id}}/edit" class="btn btn-small" title="点击修改商品"><i class="icon-pencil"></i></a>
                                <form action="/admin/goods/{{$v->goods_id}}" method='post' style='display:inline'>
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class='btn btn-small' onclick="return confirm('确定要删除吗?');" title="点击删除商品"><i class="icon-trash"></i></button>

                                </form>
                            </span>
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

    // 优惠商品 减价
    function uct($e){
        var id = $e;
        // 优惠力度
        var jian = 0.9;
        // 获取原价
        var old_price = parseInt($('#price_'+id).text().trim());
        // 获取原优惠
        var o_pres = parseInt($('#pre_'+id).text().trim());
        var msg = "你确定在原优惠的基础再次优惠10%吗??";
        var con = confirm(msg);
        function accMul(arg1, arg2)
        {

            var m = 0, s1 = arg1.toString(), s2 = arg2.toString();

            try { m += s1.split(".")[1].length } catch (e) { }

            try { m += s2.split(".")[1].length } catch (e) { }

            return Number(s1.replace(".", "")) * Number(s2.replace(".", "")) / Math.pow(10, m)
        }
        var n_pres = accMul(o_pres,jian);
        if(con){
            if(n_pres <= 0){
                var n_pres = o_pres;
                alert('亲,商品不能白送啊!');
            } else if (n_pres >= old_price) {
                var n_pres = old_price;
                alert('亲,优惠价不能大于原价!');
            }
            $.get('/admin/ajaxuct',{n_pres:n_pres,id:id},function(data){
                    // console.log(data);
                    if(data=='01'){
                        $('#pre_'+id).text(n_pres);
                    } else {
                        alert('优惠失败!');
                    }
                })
        }
    }
    function add($ids)
    {
        var id = $ids;
        var old = parseInt($('#stock_'+id).text());
        function accMul(arg1, arg2)
        {
            var m = 0, s1 = arg1.toString(), s2 = arg2.toString();

            try { m += s1.split(".")[1].length } catch (e) { }

            try { m += s2.split(".")[1].length } catch (e) { }

            return Number(s1.replace(".", "")) + Number(s2.replace(".", "")) / Math.pow(10, m)
        }
        var msg=prompt("请输入库存","库存请输入整数");
        if (msg !=null && msg !=""){
            var num = parseInt(msg);
            var reg=/^[0-9]{1,9}$/;
            if(!reg.test(num)){
                alert('请输入正确格式');
                return false;
            } else {
                $.get('/admin/addstock',{num:num,id:id},function(data){
                    if(data == '01'){
                        alert('添加成功');
                        $('#stock_'+id).text(accMul(num, old));
                        $('#stock_'+id).parents('td').find('.icol-add').eq(0).remove();
                    } else {
                        alert('添加失败');
                    };
                });
            }
        } else {
            alert('请输入正确格式');
        }
    }
</script>
@endsection