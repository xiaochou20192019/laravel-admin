@extends('web.layouts.mall_main') 
@section('title')
供应
@endsection
@section('res')
<link rel="stylesheet" href="/web/mall/NewIndex/css/reset.css" type="text/css" />
<link rel="stylesheet" href="/web/mall/NewIndex/css/common.css" type="text/css" />
<link rel="stylesheet" href="/web/mall/NewIndex/css/flash.css" type="text/css" />
<link rel="stylesheet" href="/web/mall/NewIndex/css/companied.css" type="text/css" />
<link href="/web/mall/NewIndex/css/GraphicsAndText.css" rel="stylesheet" type="text/css" />
<link href="/web/mall/NewIndex/css/product_List.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
        $(document).ready(function () {
            $(".showArea").click(function () {
                var hideItem = $(".hideItem");
                var areaItem = $(".areaItem");
                if (areaItem.height() == 0) {
                    hideItem.stop().animate({ height: "80px" });
                    areaItem.stop().animate({ height: "80px" });
                } else {
                    hideItem.stop().animate({ height: "0px" });
                    areaItem.stop().animate({ height: "0px" });
                }
            });
        });
    </script>

@endsection
@section('content')
<div class="index-content-wrap">
	@include('web.sell.cate')
	<!--内容开始-->
	<div class="center">
		<div id="nrleft">
		@forelse($list as $v)
			<div class="nrleft">
				<div class="nrlogo">
					<a href="{{\Pcommon::surl($v->id)}}" target="_blank" title="{{$v->title}}">
						<img src="{{config('app.upload')}}{{$v->litpic}}" style="width: 160px; height: 153px;" />
					</a>
				</div>
				<div class="nrcenter">
					<h3>
						<a href="{{\Pcommon::surl($v->id)}}" target="_blank" title="{{$v->title}}"> {{$v->title}}</a>
					</h3>
					电话： {{$v->telephone}} &nbsp;公司： {{$v->company}} &nbsp;
					<br />
					<br /> 产品介绍：{!! str_limit($v->introduce,50) !!}
					<a href="{{\Pcommon::surl($v->id)}}" target="_blank" title="{{$v->title}}">【详情】</a>
				</div>
				<div class="nrright">
					<h4>
						<a href="{{\Pcommon::surl($v->id)}}" target="_blank"> {{$v->brand}} </a>
					</h4>
					<p>供应类型：{{$v->typeids($v->typeid)}}</p>
					<a href="{{\Pcommon::surl($v->id)}}" target="_blank">
						<h5> 我要代理</h5>
					</a>
				</div>
			</div>
		@empty
		@endforelse
		</div>
		@include('web.sell.right')
		<div class="page" style="">
			<div class="pageLt pageLeft">【共
				<font color="#CC0000">{{$list->total()}}</font>条记录】
				<font color="#CC00000">
					<strong>{{$list->currentPage()}}</strong>
				</font>页/{{$list->lastPage()}}页</div>
			<div class="pageRt pageRight">
				{!! $links !!}
			</div>
		</div>
		<div class="clearfloat"> </div>
	</div>
</div>
@endsection