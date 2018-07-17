@extends('layout.admins')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title','关于我们')
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
           			<a href="/admin/about/create" class="btn btn-primary">添加关于</a>
                </label>
            </div>
			<form action="/admin/about" method='get'>
	            <div class="dataTables_filter" id="DataTables_Table_1_filter">
	                <label>
	                    标记:
	                    <input type="text" name='sign' aria-controls="DataTables_Table_1" value="{{$request->sign}}">
	                </label>
	                <button class='btn btn-info'>搜索</button>
	            </div>
	        </form>



	        <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
	        aria-describedby="DataTables_Table_1_info">
	            <thead>
	                <tr role="row">
	                    <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
	                    rowspan="1" colspan="1" style="width: 30px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
	                        ID
	                    </th>
	                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
	                    rowspan="1" colspan="1" style="width: 180px;" aria-label="Browser: activate to sort column ascending">
	                        标记
	                    </th>
	                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
	                    rowspan="1" colspan="1" style="width: 100px;" aria-label="CSS grade: activate to sort column ascending">
	                    	状态
	                    </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="CSS grade: activate to sort column ascending">
                           操作
                        </th>
	                </tr>
	            </thead>
	            <tbody role="alert" aria-live="polite" aria-relevant="all">
	            @foreach($arr as $k => $v)
	                <tr class="@if($k % 2 == 1)  odd   @else even  @endif">
	                    <td class="">
	                        {{$v->id}}
	                    </td>
	                    <td class=" ">
	                        {{$v->sign}}
	                    </td>
	                    <td class=" ">
	                        @if($v->status==1)
	                            <button class="btn btn-success status" id="<?php echo $v->id ?>" onclick="stu({{$v->id}})" value="1">启动</button>
	                        @else
	                            <button class='btn btn-primary status' id="<?php echo $v->id ?>" onclick="stu({{$v->id}})" value="2">禁止</button>
	                        @endif
	                    </td>
                        <td class=" ">
                            <span class="btn-group">
                                <a href="/admin/about/{{$v->id}}/edit" class="btn btn-small" title="点击修改商品"><i class="icon-pencil"></i></a>
                                @if(session('auth')==1)
                                <form action="/admin/about/{{$v->id}}" method='post' style='display:inline'>
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class='btn btn-small' onclick="return confirm('确定要删除吗?');" title="点击删除关于"><i class="icon-trash"></i></button>
                                </form>
                                @endif
                            </span>
                        </td>
	                </tr>
	                @endforeach
	            </tbody>
	        </table>
	        <link rel="stylesheet" type="text/css" href="/css/page.css" media="screen">
	        <div class="dataTables_paginate paging_full_numbers" id="paginate">
	            {{ $arr->appends($request->all())->links() }}
	        </div>
	    </div>
	</div>
</div>
@if(count($data) != 0)
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-pictures"></i>企业简介</span>
    </div>
    <div class="mws-panel-body">
		{!!$data->about!!}
    </div>
</div>
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-pictures"></i>企业地址</span>
    </div>
    <div class="mws-panel-body">
		{{$data->address}}
    </div>
</div>
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-pictures"></i>企业文化</span>
    </div>
    <div class="mws-panel-body">
		<img src="{{$data->culture}}" alt="">
    </div>
</div>
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-pictures"></i>企业大事件&nbsp;&nbsp;<a href="javascript:void(0)" onclick="insertEvent({{$data->id}})" id="" title="添加企业事件"><i class="icol-add"></a></i></span>
    </div>
    <div class="mws-panel-body">
		<ul class="mws-gallery" id="events">
			@foreach($data->abouts as $k => $v)
			<li>
            	<span  id="edit_<?php echo $v->id ?>">{{$v->event}}</span>
                <span class="mws-gallery-overlay">
                    <a href="javascript:void(0)" onclick="edits({{$v->id}});" class="mws-gallery-btn"><i class="icon-pencil"></i></a>
                    <a href="javascript:void(0)" id="del_<?php echo $v->id ?>" onclick="del({{$v->id}});"  class="mws-gallery-btn del"><i class="icon-trash"></i></a>
                </span>
			</li>
			@endforeach
		</ul>
    </div>
</div>
@endif
@endsection
@section('js')
<script>
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
	function stu($e)
	{
		var id = $e;
        var status = $('.status'+'#'+id).val();
        if(status == '1'){
            var pro = "你确定禁止吗??";
        } else {
            var pro = "你确定启动吗??";
        }
        var sta = confirm(pro);
        if(sta){
            $.post('/admin/aboutstatus',{status:status,id:id},function(data){
                if(data == '02'){
                    $('.status'+'#'+id).attr('class','status btn btn-primary').text('禁止');
                    $('.status'+'#'+id).val('2');
                    location.reload(true);
                } else if(data=='01') {
                    $('.status'+'#'+id).attr('class','status btn btn-success').text('启动');
                    $('.status'+'#'+id).val('1');
                    location.reload(true);
                } else if (data == '00') {
                	alert('关于我们只能启动一个,请把已启动的禁止后再启动');
                }
            });
        };
    };
    function del($id)
    {
    	var id = $id;
    	var lis = $('#del_'+id).parents('li');
    	var pro = "你确定删除吗?";
    	var mpt = confirm(pro);
    	if(mpt){
    		$.post('/admin/aboutdel',{id:id},function(data){
    			if(data == '01'){
    				lis.remove();
    				alert('删除成功');
    			} else {
    				alert('删除失败');
    			}
    		});
    	}
    };
    function edits($ids)
    {
    	// 获取id
    	var id = $ids;
    	var $this = $('#edit_'+id);
    	// 获取内容
    	var comment = $this.text();
    	var inp = $("<input type='text' maxlength='50' placeholder='请输入最多50字符的事件' />");
    	$this.empty();
    	$this.append(inp);
    	inp.val(comment);
        inp.focus();
        inp.select();
        inp.blur(function(){
            var tvs = $(this).val();
            //发送ajax
            $.post('/admin/aboutedit',{tvs:tvs,id:id},function(data){
                if(data == '01'){
                    $this.text(tvs);
                    alert('修改成功');
                } else {
                    $this.text(comment);
                    alert('修改失败');
                };

            });
        });

    }
    function insertEvent($e){
		var id = $e;
		var msg=prompt("请输入事件","事件字数不超过50字");
		if (msg !=null && msg !=""){
		    var num = msg.length;
		    if(num > 50){
		    	alert('字数超过限制');
		    } else {
		    	$.post('/admin/aboutinsert',{msg:msg,id:id},function(data){
                if(data == '01'){
                    alert('添加成功');
                    location.reload(true);
                } else {
                    alert('添加失败');
                    location.reload(true);
                };

            });
		    }
		}
	}
</script>
@endsection
