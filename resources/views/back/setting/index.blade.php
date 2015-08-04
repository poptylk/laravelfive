@extends('back.layouts.base')

@section('title', '基本設定')

@section('content')
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
        <form class="form" method="post" action="{{ route('admin::setting') }}" >
            {!! csrf_field() !!}
            {!! method_field('put') !!}
            <div class="card">
                <div class="card-head card-head-xs style-primary">
                    <header>基本設定</header>
                </div>
                <div class="card-body floating-label">
                    <div>
                        <label class="radio-inline radio-styled">
                            <input type="radio" name="website_switch" value="1" {{ ((bool) $setting['website_switch'] === true)? 'checked' : '' }} >
                            <span>開啟網站</span>
                        </label>
                        <label class="radio-inline radio-styled">
                            <input type="radio" name="website_switch" value="0" {{ ((bool) $setting['website_switch'] === false)? 'checked' : '' }} >
                            <span>關閉網站</span>
                        </label>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="websiteName" name="website_name" value="{{ $setting['website_name'] }}">
                                <label for="websiteName">網站名稱</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="website_email" name="website_email" value="{{ $setting['website_email'] }}">
                                <label for="website_email">服務信箱</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="websiteTel" name="website_tel" value="{{ $setting['website_tel'] }}">
                                <label for="websiteTel">公司電話</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="websiteFax" name="website_fax" value="{{ $setting['website_fax'] }}">
                                <label for="websiteFax">公司傳真</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="websiteAddr" name="website_addr" value="{{ $setting['website_addr'] }}">
                        <label for="websiteAddr">公司地址</label>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="auther" name="website_addr" value="{{ $setting['auther'] }}">
                        <label for="auther">Auther</label>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <textarea name="keywords" id="keywords" class="form-control" rows="5">{!! e($setting['keywords']) !!}</textarea>
                    	        <label for="keywords">Keywords</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <textarea name="description" id="description" class="form-control" rows="5">{!! e($setting['description']) !!}</textarea>
                    	        <label for="description">Description</label>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end .card-body -->
                <div class="card-actionbar">
                    <div class="card-actionbar-row">
                        <button type="submit" class="btn btn-primary ink-reaction">更新</button>
                    </div>
                </div>
            </div>
            <!--end .card -->
        </form>

    </div>
    <!--end .col -->
</div>
<!--end .row -->
<!-- END HORIZONTAL FORM -->
<!--end .row -->

<!-- BEGIN FILE UPLOAD -->
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="card">
                                    <div class="card-head card-head-xs style-primary">
                                        <header>網站Logo</header>
                                    </div>
                                    <div class="card-body text-center">
                                       
                                            <img src="{{ asset('uploads/'. $setting['website_logo']) }}" class="img-responsive" id="favicon" />
                                        
                                    </div><!--end .card-body -->
                                    <div class="card-actionbar text-center">
                                        <div class="col-md-12">
                                            <button type="button" class="btn btn-primary ink-reaction fileinput-button" id="upload_icon_btn">
                                                <div id="loader">
                                                    <span class="md-file-upload"></span> 
                                                    上載圖片 <input class="fileupload" type="file" name="files[]" id="website_logo" >
                                                </div>
                                                <div id="loading" class="hide">
                                                    <div style="width:73px">
                                                        <img src="{{ asset('images/loader.gif') }}" width="25">
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="small-padding text-sm">圖片 200 x 200 pixel (JPG或PNG)</div>
                                </div><!--end .card -->
                            </div><!--end .col -->
                            <div class="col-lg-4 col-md-4">
                                <div class="card">
                                    <div class="card-head card-head-xs style-primary">
                                        <header>網址小圖示</header>
                                    </div>
                                    <div class="card-body text-center">
                                       
                                            <img src="{{ asset('uploads/'. $setting['website_icon']) }}" class="img-responsive" id="favicon" />
                                        
                                    </div><!--end .card-body -->
                                    <div class="card-actionbar text-center">
                                        <div class="col-md-12">
                                            <button type="button" class="btn btn-primary ink-reaction fileinput-button" id="upload_icon_btn">
                                                <div id="loader">
                                                    <span class="md-file-upload"></span> 
                                                    上載圖片 <input class="fileupload" type="file" name="files[]" id="website_icon" >
                                                </div>
                                                <div id="loading" class="hide">
                                                    <div style="width:73px">
                                                        <img src="{{ asset('images/loader.gif') }}" width="25">
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="small-padding text-sm">網址小圖標會顯示在瀏覽器網址列上和在書籤的網站名旁邊。圖片 200 x 200 pixel (JPG或PNG)</div>
                                </div><!--end .card -->
                            </div><!--end .col -->
                        </div><!--end .row -->
                        <!-- END FILE UPLOAD -->
@endsection

@section('script')
<script>
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
$('.fileupload').change(function() {
    var formData = new FormData();
    formData.append('field', $(this).attr('id'));
    formData.append('file', $(this)[0].files[0]);

    $.ajax({
        type: 'post',
        url: '{{ route('admin::file.setting') }}',
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        data: formData,
        dateType: 'josn',
        beforeSend: function() {
            $('#loader').attr('class', 'hide');
            $('#loading').attr('class', '');
            $('#upload_icon_btn').addClass('disabled');
        },
        success: function(data) {
            if (data.state == 'success') {
                $('#favicon').attr('src', data.img);
                $('#loader').attr('class', '');
                $('#loading').attr('class', 'hide');
                $('#upload_icon_btn').removeClass('disabled');
            }
        },
        error: function(e) {

        }
    })
});
</script>
@endsection
