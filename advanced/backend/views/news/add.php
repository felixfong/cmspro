<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<!--
<link href="/css/datepicker3.css" rel="stylesheet">
<link href="/css/daterangepicker.css" rel="stylesheet">
<link href="/css/dataTables.bootstrap.css" rel="stylesheet">
<script src="/js/bootstrap-datetimepicker.js"></script>
-->
<link href="/css/toastr.css" rel="stylesheet">



<section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-body pad">
                        <form id="myform" action="#" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">标题</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="title" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">关键词</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="keywords" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">作者</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="author" class="form-control" value="yii.feng">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">缩略图</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="thumb" class="form-control" value="">
                                    </div>
                                    <div class="col-sm-1">
                                        <input type="button" value="选择图片" class="btn btn-primary editThumb" id="thumb" data-inp="thumb">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">来源</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="source" class="form-control" value="yii说">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">创作时间</label>
									<?php use kartik\datetime\DateTimePicker; ?>
									<?php  
										echo DateTimePicker::widget([ 
											'name' => 'publish',
											'options' => ['placeholder' => ''], 
											//注意，该方法更新的时候你需要指定value值 
											'value' => '2017-03-16 22:10:10', 
											'pluginOptions' => [
												'autoclose' => true, 
												'format' => 'yyyy-mm-dd HH:ii:ss', 
												'todayHighlight' => true 
											] 
										]); 
									?>
									
                                </div>
								<div class="form-group">
                                    <label class="col-sm-1 control-label">重要推荐</label>
                                    <div class="col-sm-6 control-label">
                                        <div class="pull-left">
                                            是&nbsp;&nbsp;<label class="">
                                                <input type="radio" name="impnotice"  value="99">
                                            </label>
                                        </div>
                                        <div class="col-sm-2 pull-left">
                                            否&nbsp;&nbsp;<label class="">
                                                <input type="radio" name="impnotice"  value="0" checked>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">显示</label>
                                    <div class="col-sm-6 control-label">
                                        <div class="pull-left">
                                            是&nbsp;&nbsp;<label class="">
                                                <input type="radio" name="pstatus" class="flat-red" value="99" checked>
                                            </label>
                                        </div>
                                        <div class="col-sm-2 pull-left">
                                            否&nbsp;&nbsp;<label class="">
                                                <input type="radio" name="pstatus" class="flat-red" value="0" >
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">分类</label>
                                    <div class="col-sm-6">
                                        <div class="col-sm-3 " style="padding:0px;">
                                            生活随笔&nbsp;&nbsp;<label class="">
                                                <input type="radio" name="status" class="flat-red" value="10" checked>
                                            </label>
                                        </div>
                                        <div class="col-sm-3 " style="padding:0px;">
                                            工作笔记&nbsp;&nbsp;<label class="">
                                                <input type="radio" name="status" class="flat-red" value="11" >
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">详细内容</label>
                                    <div class="col-sm-10">
										<?= \yii\redactor\widgets\Redactor::widget([  'attribute' => 'content' ]) ?>
                                    </div>
                                </div>
                            </div>
                            <button type="button" name="dosubmit" value="submit" class="btn btn-primary" onclick="add()">提交</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<script type="text/javascript">
    //提交修改数据JS
    function add(){
        var title = $("input[name='title']").val();
        var keywords = $("input[name='keywords']").val();
        var author = $("input[name='author']").val();
        var thumb = $("input[name='thumb']").val();
        var source = $("input[name='source']").val();
        var publish = $("input[name='publish']").val();
		var impnotice = $("input[name='impnotice']:checked").val();
        var pstatus = $("input[name='pstatus']:checked").val();
        var status = $("input[name='status']:checked").val();
        var content = $(".redactor-editor").text();
        var _csrf = "<?php echo Yii::$app->request->getCsrfToken();?>";
        $.ajax({
            type: "post",
            url: "/news/do-add",
            data: "_csrf="+ _csrf + "&title=" + title + "&keywords=" + keywords + "&author=" + author + "&thumb=" + thumb + "&source=" + source + "&publish=" + publish + "&impnotice=" + impnotice + "&pstatus=" + pstatus + "&status=" + status + "&content=" + content,
			success: function (data) {
                var data = eval('(' + data + ')');
                if (data['status'] == "success") {
                    toastr.success('数据添加成功');
                    var jumpUrl = '/news/index';
                    window.location.href=jumpUrl;
                }else{
                    toastr.error('Error');
                }
            },
            error: function (data) {
                toastr.error('Error');
            },
            complete: function () {

            }

        });

    }

</script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/main.js" type="text/javascript"></script>
<script src="/js/layer.js" type="text/javascript"></script>
<script src="/js/fileinput.js" type="text/javascript"></script>
<script src="/js/toastr.js"></script>

<!--提示弹窗JS开始-->
<script>
    $(function(){
        /*toastr配置项*/
        toastr.options = {
            closeButton: true,
            debug: false,
            progressBar: false,
            positionClass: "toast-top-center",
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            timeOut: "5000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut"
        };
        //var $toast = toastr['error']('123', 'title');
        var isSuccess = "";
        var isError = "";
        if(!!isSuccess){
            var bodyInfo = "";
            alert(bodyInfo);
        }
        if(!!isError){
            var bodyInfo = "";
            alert(bodyInfo);
        }
        /*
         $("#w0").bind('closed.bs.alert', function () {
         alert(bodyInfo);
         });
         */

    });
</script>
<!--提示弹窗JS结束-->