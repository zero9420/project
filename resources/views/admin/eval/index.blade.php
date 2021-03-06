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





                <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
                       aria-describedby="DataTables_Table_1_info">
                    <thead>
                    <tr role="row">
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 198px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            ID
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 266px;" aria-label="Browser: activate to sort column ascending">
                            用户名
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 247px;" aria-label="Platform(s): activate to sort column ascending">
                            邮箱
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 247px;" aria-label="Platform(s): activate to sort column ascending">
                          评论内容
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 247px;" aria-label="Platform(s): activate to sort column ascending">
                            评论图片
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 247px;" aria-label="Platform(s): activate to sort column ascending">
                            评论等级
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 247px;" aria-label="Platform(s): activate to sort column ascending">
                            添加时间
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 247px;" aria-label="Platform(s): activate to sort column ascending">
                            更新时间
                        </th>

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 150px;" aria-label="CSS grade: activate to sort column ascending">
                            操作
                        </th>
                    </tr>
                    </thead>
                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                    @if(count($Users)!=0)
                    @foreach($Evaluas as $k => $v)

                        {{--<tr class="@if($k % 2 == 1)  odd   @else even  @endif">--}}
                            <td class="">
                                {{$v->eid}}
                            </td>
                            <td class=" ">
                                {{$Users->username}}
                            </td>
                            <td class=" ">
                                {{$Users->email}}
                            </td>
                            <td class=" ">
                                {{$v->comments}}
                            </td>
                            <td class=" ">
                                <img src="{{$Image->eval_pic}}" alt="" width='100'>
                            </td>
                             <td class=" ">

                                 @if($v->goods_grade==10.0)
                                 ⭐⭐⭐⭐⭐
                                 @endif
                                     @if($v->goods_grade==8.0)
                                     ⭐⭐⭐⭐
                                     @endif
                                         @if($v->goods_grade==6.0)
                                             ⭐⭐⭐
                                     @endif
                                             @if($v->goods_grade==4.0)
                                                 ⭐⭐
                                     @endif
                                                 @if($v->goods_grade==2.0)
                                                     ⭐
                                     @endif


                            </td>
                             <td class=" ">
                                 {{$v->created_at}}

                             </td>
                            <td class=" ">
                                {{$v->updated_at}}
                            </td>


                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            </td>
                            <td class=" ">
                                <a href="/admin/eavl/{{$v->eid}}/edit" class='btn btn-info'>回帖</a>
                                <form action="/admin/eavl/{{$v->eid}}" method="post" style='display:inline'>
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class='btn btn-warning'>删除</button>
                                </form>

                            </td>
                        </tr>

                    @endforeach
                    @else
                    <tr>
                        <th colspan="9">暂无评论</th>
                    </tr>
                    @endif

                    </tbody>
                </table>

                <div class="dataTables_info" id="DataTables_Table_1_info">
                    Showing 1 to 10 of 57 entries
                </div>

                <style>
                    .pagination li{
                        float: left;
                        height: 20px;
                        padding: 0 10px;
                        display: block;
                        font-size: 12px;
                        line-height: 20px;
                        text-align: center;
                        cursor: pointer;
                        outline: none;
                        background-color: #444444;



                        text-decoration: none;
                        border-right: 1px solid #232323;
                        border-left: 1px solid #666666;
                        border-right: 1px solid rgba(0, 0, 0, 0.5);
                        border-left: 1px solid rgba(255, 255, 255, 0.15);
                        -webkit-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
                        -moz-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
                        box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
                    }

                    .pagination li a{
                        color: #fff;
                    }


                    .pagination .active{
                        background-color: #88a9eb;
                        color: #323232;
                        border: none;
                        background-image: none;
                        box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.25);
                    }

                    .pagination .disabled{
                        color: #666666;
                        cursor: default;
                    }

                    #paginate ul{

                        margin:0px;
                    }
                </style>


                <div class="dataTables_paginate paging_full_numbers" id="paginate">

                {{--<!-- {{$res->links()}} -->--}}

                    <!-- $arr  ====> ['num'=20,'search'=>'zz'] -->

                    {{--{{ $res->links() }}--}}


                </div>
            </div>
        </div>
    </div>
@endsection