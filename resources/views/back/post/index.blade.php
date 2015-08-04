@extends('back.layouts.base')

@section('title', '基本設定')

@section('content')
<!-- BEGIN TABLE HOVER -->
<div class="row">
	<div class="col-lg-12">
		<article class="margin-bottom-xxl">
			<button type="button" class="btn btn-primary ink-reaction btn-raised" data-original-title="新增" onclick="create();">新增</button>
			<p class="lead">
			</p>
		</article>
	</div>
	<div class="col-lg-12">
				<div class="card">
				    <div class="card-head card-head-xs style-primary">
                        <header>文章列表</header>
                    </div>
					<div class="card-body floating-label">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>
					                    <div class="checkbox checkbox-styled">
					                    	<label>
					                    		<input type="checkbox" name="ids_all">
					                    	</label>
					                    </div>
				                    </th>
									<th>標題</th>
									<th>發佈日期</th>
									<th>狀態</th>
									<th class="text-right">動作</th>
								</tr>
							</thead>
							<tbody>
							@foreach ($posts as $post)
								<tr>
									<td>
										<div class="checkbox checkbox-styled">
					                    	<label>
					                    		<input type="checkbox" nam="ids[]" value="{{ $post->id }}">
					                    	</label>
					                    </div>
									</td>
									<td>{{ $post->name }}</td>
									<td>{{ $post->release_date }}</td>
									<td><input type="checkbox" class="status" {{ $post->status == true? 'checked="checked"' : '' }}></td>
									<td class="text-right">
										<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="編輯" onclick="edit('{{ $post->id }}');"><i class="fa fa-pencil"></i></button>
										<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="複製"><i class="fa fa-copy"></i></button>
										<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="刪除"><i class="fa fa-trash-o"></i></button>
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
						@if (count($posts) == 0)
						<div class="text-center">
							目前系統尚無任何資訊.
						</div>
						@endif
					</div><!--end .section-body -->
					<div class="card-actionbar text-center">
					    {!! $links !!}
					</div>
				</div>
			</div>
		</div>
				<!-- END TABLE HOVER -->
@endsection

@section('script')
<script>
$(function() {
	$(".status").bootstrapSwitch({
		size: 'mini'
	});
});

var create = function() {
	location.href = "{{ route('admin::post.create') }}";
}

var edit = function(id) {
	location.href = "{{ route('admin::post.index') }}/" + id + "/edit";
}


</script>
@endsection
