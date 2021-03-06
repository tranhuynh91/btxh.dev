<div id="tab1" class="tab-pane active" >
    <div class="form-horizontal">
        <div class="row">
            <div class="col-md-6" {{!(session('admin')->level == 'T') ? 'style=display:none;' : '' }} >
                <div class="form-group">
                    <label class="col-sm-4 control-label">Quận huyện<span class="require">*</span></label>
                    <div class="col-sm-8 controls">
                        <select name="mahuyen" class="form-control required" autofocus>
                            @foreach($huyens as $huyen)
                                <option value="{{$huyen->mahuyen}}" {{ $huyen->mahuyen == $mahuyen ? 'selected' : ''}}>{{$huyen->tenhuyen}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group" style="display:none;">
                    <label class="col-sm-4 control-label">Xã phường<span class="require">*</span></label>
                    <div class="col-sm-8 controls">
                        @if(session('admin')->level == 'H' && session('admin')->name == 'Phòng tư Pháp huyện Yên Minh')
                            <select name="maxa" class="form-control required">
                                    <option value="tpym"></option>
                            </select>
                        @elseif(session('admin')->level == 'H' && session('admin')->name == 'Phòng tư Pháp huyện Đồng Văn')
                            <select name="maxa" class="form-control required">
                                <option value="tpdv"></option>
                            </select>
                        @else
                            <select name="maxa" class="form-control required">
                                @foreach($xas as $xa)
                                    <option value="{{$xa->maxa}}" {{$xa->maxa == $maxa ? 'selected' : ''}}>{{$xa->tenxa}}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Ngày đăng ký<span class="require">*</span></label>

                    <div class="col-sm-8 controls">
                        {!!Form::text('ngaydangky',isset($model->ngaydangky) ? date('d/m/Y',strtotime($model->ngaydangky)) : date('d/m/Y',strtotime(date('Y-m-d'))), array('id' => 'ngaydangky','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Đăng ký khai sinh<span class="require">*</span></label>
                    <div class="col-sm-8 controls">
                        {!! Form::select(
                        'dunghanquahan',
                        array(
                        'Đúng hạn' => 'Đăng ký đúng hạn',
                        'Quá hạn' => 'Đăng ký quá hạn',
                        'Quá hạn dưới 5 tuổi' => 'Đăng ký quá hạn trẻ dưới 5 tuổi'
                        ),null,
                        array('id' => 'dunghanquahan', 'class' => 'form-control'))
                        !!}
                    </div>
                </div>

            </div>
        </div>
        @if($action == 'edit')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Quyển<span class="require">*</span></label>
                        <div class="col-sm-8 controls">
                            <span style="color: blue">{{$model->quyen}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Số</label>
                        <div class="col-sm-8 controls">
                            <span style="color: blue">{{$model->so}}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Loại khai sinh<span class="require">*</span></label>
                    <div class="col-sm-8 controls">
                        {!! Form::select(
                        'plkhaisinh',
                        array(
                        'Khai sinh thông thường' => 'Khai sinh thông thường',
                        'Khai sinh trẻ bị bỏ rơi' => 'Khai sinh trẻ bị bỏ rơi',
                        'Khai sinh trẻ chưa xác định cha mẹ' => 'Khai sinh trẻ chưa xác định cha mẹ',
                        'Khai sinh trẻ bằng phương pháp mang thai hộ' => 'Khai sinh trẻ bằng phương pháp mang thai hộ'
                        ),null,
                        array('id' => 'plkhaisinh', 'class' => 'form-control'))
                        !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Loại đăng ký</label>
                    <div class="col-sm-8 controls">
                        {!! Form::select(
                        'pldangky',
                        array(
                        'Đăng ký mới' => 'Đăng ký mới',
                        'Đăng ký lại' => 'Đăng ký lại',
                        'Ghi sổ việc sinh con ở nước ngoài' => 'Ghi sổ việc sinh con ở nước ngoài',
                        ),null,
                        array('id' => 'pldangky', 'class' => 'form-control'))
                        !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Người ký<span class="require">*</span></label>
                    <div class="col-sm-8 controls">
                        {!!Form::text('nguoiky', null, array('id' => 'nguoiky','class' => 'form-control'))!!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Chức vụ người ký</label>
                    <div class="col-sm-8 controls">
                        {!!Form::text('chucvu', null, array('id' => 'chucvu','class' => 'form-control'))!!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Người thực hiện<span class="require">*</span></label>
                    <div class="col-sm-8 controls">
                        {!!Form::text('nguoithuchien', null, array('id' => 'nguoithuchien','class' => 'form-control'))!!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Ghi chú<span class="require">*</span></label>
                    <div class="col-sm-8 controls">
                        {!!Form::text('ghichu', null, array('id' => 'ghichu','class' => 'form-control'))!!}
                    </div>
                </div>
            </div>
            <!--div class="col-md-6">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Số bản sao<span class="require">*</span></label>
                    <div class="col-sm-8 controls">
                        {!!Form::number('sobansao',isset($model->sobansao) ? $model->sobansao : 0, array('id' => 'sobansao','class' => 'form-control','data-mask'=>'fdecimal'))!!}
                    </div>
                </div>
            </div-->
        </div>

        <!--div class="row">

            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nơi ĐK khám chữa bệnh</label>
                    <div class="col-sm-10 controls">
                        {!!Form::text('noikcbbd', null, array('id' => 'noikcbbd','class' => 'form-control'))!!}
                    </div>
                </div>
            </div>
        </div-->

    </div>
</div>
<script>
    jQuery(function($){
        $('select[name="mahuyen"]').change(function(){

            if($(this).val() != 'all'){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '/getXas',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        mahuyen: $(this).val()
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        if(data.status == 'success')
                            $('select[name="maxa"]').replaceWith(data.message);
                        else
                            $('select[name="maxa"]').val();

                    }
                });
            } else {
                $('select[name="maxa"]').val('all');
            }
        });
    });
</script>
<script>
    $(document).ready(function(){
        $(":input").inputmask();
    });
</script>