@extends('back.layouts.base')

@section('title', '張貼文章')

@section('content')
@if (count($errors) > 0)
<div class="alert alert-success">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<!-- BEGIN HORIZONTAL FORM -->
<div class="row">
    <!--end .col -->
    <div class="col-lg-12">
        <article class="margin-bottom-xxl">
            <p class="lead">
            </p>
        </article>
    </div>
    <!--end .col -->
    <div class="col-lg-12">
        @if (empty($post))
        <form method="post" action="{{ route('admin::post.store') }}" >
        @else
        <form method="post" action="{{ route('admin::post.update', [$post->id]) }}" >
            {!! method_field('put') !!}
        @endif
            {!! csrf_field() !!}
            <div class="card">
                <div class="card-head card-head-xs style-primary">
                    <header>基本設定</header>
                    <div class="tools">
                        <div class="btn-group">
                            <a class="btn btn-icon-toggle btn-collapse">
                                <i class="fa fa-angle-down"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body form-horizontal">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">標題</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name" value="{{ (empty($post))? null : old('name', $post->name) }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="release_date" class="col-sm-2 control-label">發佈日期</label>
                        <div class="col-sm-10">
                            <div class="input-group date" id="demo-date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <div class="input-group-content">
                                    <input type="text" class="form-control" name="release_date" id="release_date" value="{{ (empty($post))? date('Y-m-d') : old('release_date', $post->release_date) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-sm-2 control-label">列表圖片</label>
                        <div class="col-sm-10">
                            <img src="{{ (!is_null($post->img))? $post->img : asset('images/noImg.jpg') }}" id="imgBox" width="80" />
                            <input type="hidden" name="img" id="img">
                            <button type="button" class="btn btn-primary ink-reaction" id="browser">選擇圖片</button>
                            <button type="button" class="btn btn-warning ink-reaction" id="browserCancel">取消</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-sm-2 control-label">內容</label>
                        <div class="col-sm-10">
                            <textarea name="content" id="content" class="form-control ckeditor" rows="3" placeholder="">{{ (empty($post))? null : old('content', $post->content) }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-sm-2 control-label">狀態</label>
                        <div class="col-sm-10">
                            <input type="checkbox" class="status" value="1" {{ (empty($post))? 'checked' : (old('status', $post->status) == true? 'checked' : null) }}>
                            <input type="hidden" name="status" value="{{ (empty($post))? 1 : old('status', $post->status) }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sort" class="col-sm-2 control-label">排序</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="sort" id="sort" value="{{ (empty($post))? 1 : old('sort', $post->sort) }}">
                        </div>
                    </div>
                </div>
                <!--end .card-body -->
            </div>
            <!--end .card -->

            <div class="card">
                <div class="card-head card-head-xs style-primary">
                    <header>SEO設定</header>
                    <div class="tools">
                        <div class="btn-group">
                            <a class="btn btn-icon-toggle btn-collapse">
                                <i class="fa fa-angle-down"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body form-horizontal">
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">標題</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" id="title" value="{{ (empty($post))? null : old('title', $post->title) }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="keywords" class="col-sm-2 control-label">關鍵字</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="keywords" id="keywords" value="{{ (empty($post))? null : old('keywords', $post->keywords) }}">
                            <p class="help-block">關鍵字請以逗號(,)分隔</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">簡介</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="description" id="description" rows="3" >{{ (empty($post))? null : old('description', $post->description) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-actionbar">
                    <div class="card-actionbar-row">
                        <button type="submit" class="btn btn-primary ink-reaction">儲存</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <!--end .col -->
</div>
<!--end .row -->
<!-- END HORIZONTAL FORM -->
<!--end .row -->
@endsection

@section('script')
<script src="{{ asset('assets/js/libs/ckeditor/ckeditor.js') }}?"></script>
<script src="{{ asset('assets/js/libs/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
<script>
$(function() {
	$(".status").bootstrapSwitch({
		size: 'mini'
	});

    $('.status').on('switchChange.bootstrapSwitch', function(event, state) {
        var bool = state? 1 : 0;
        $('input[name="status"]').val(bool);
    });

    $('#browser').click(function() {
        selectFileWithCKFinder('img', 'imgBox');
    });

    $('#browserCancel').click(function() {
        cancelCKFinder('img', 'imgBox');
    });
});
@if (Session::has('state'))
	toastr.options.closeButton = true;
	toastr.options.progressBar = false;
	toastr.options.debug = false;
	toastr.options.positionClass = 'toast-top-full-width';
	toastr.options.showDuration = 333;
	toastr.options.hideDuration = 333;
	toastr.options.timeOut = 4000;
	toastr.options.extendedTimeOut = 4000;
	toastr.options.showEasing = 'swing';
	toastr.options.hideEasing = 'swing';
	toastr.options.showMethod = 'slideDown';
	toastr.options.hideMethod = 'slideUp';
	toastr.{{ Session::get('state') }}('{{ Session::get('message') }}');
@endif

$.ajaxSetup({
       headers: { 'X-CSRF-Token' : '{{ csrf_token() }}' }
    });

$('.date').datepicker({
    format: 'yyyy-mm-dd'
})

function selectFileWithCKFinder( elementId , elementBox ) {
	CKFinder.modal( {
		chooseFiles: true,
		width: 800,
		height: 600,
		onInit: function( finder ) {
			finder.on( 'files:choose', function( evt ) {
				var file = evt.data.files.first();
				var output = document.getElementById( elementId );
                var outBox = document.getElementById( elementBox );
				output.value = file.getUrl();
                outBox.src   = file.getUrl();
			} );

			finder.on( 'file:choose:resizedImage', function( evt ) {
				var output = document.getElementById( elementId );
                var outBox = document.getElementById( elementBox );
				output.value = evt.data.resizedUrl;
                outBox.src   = evt.data.resizedUrl;
			} );
		}
	} );
}

function cancelCKFinder( elementId , elementBox ) {
    var output = document.getElementById( elementId );
    var outBox = document.getElementById( elementBox );
    output.value = '';
    outBox.src   = '{{ asset('images/noImg.jpg') }}';

}
</script>
@endsection
