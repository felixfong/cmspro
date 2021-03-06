<link href="/assets/ec32e8d2/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="/css/bootstrap.min.css">
<link href="/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
<script src="/js/jquery-2.2.3.min.js"></script>
<script src="/js/fileinput.js" type="text/javascript"></script>
<script src="/js/fr.js" type="text/javascript"></script>
<script src="/js/es.js" type="text/javascript"></script>
<script src="/js/bootstrap.min.js" type="text/javascript"></script>
<style type="text/css">
   .file-thumb-progress {
    position: absolute;
    top: 23px;
    left: 0;
    right: 0;
}
.kv-upload-progress{
    display: none;
}

    samp{
        display: none;
    }
</style>
<section class="content">
    <div class="col-sm-3"><h3 class="box-title">上传图片</h3></div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <div class="col-sm-12">
                 <input class="file" name="thumb" type="file">
            </div>
        </div>
    </form>
</section>
<script>
    function  fileFn(obj) {
        var  parImgSrc=parent.$('input[data-flag=true]').val();
        if (parImgSrc!="") {
            obj.fileinput({
                uploadUrl: "http://www.yii.cc/uploadfile/upfile", //上传的地址
                uploadAsync:true,
                allowedFileExtensions: ['jpg', 'gif', 'png'],//接收的文件后缀
                autoReplace: true,
                overwriteInitial: true,
                showUploadedThumbs: false,
                maxFileCount: 1,
                showUpload: true, //是否显示上传按钮
                showCaption: true,//是否显示标题
                dropZoneEnabled: false,//是否显示拖拽区域
                enctype: 'multipart/form-data',
                initialPreview: ["http://www.yii.cc"+parImgSrc],
                initialPreviewAsData: true,
                initialPreviewConfig: [
                    {caption: parImgSrc, size:0, key: 1, showDelete: false},
                ],
                overwriteInitial: true,
                initialCaption:parImgSrc,
            })
        }else{
            obj.fileinput({
                uploadUrl: "http://www.yii.cc/uploadfile/upfile", //上传的地址
                uploadAsync:true,
                allowedFileExtensions: ['jpg', 'gif', 'png'],//接收的文件后缀
                autoReplace: true,
                overwriteInitial: true,
                showUploadedThumbs: false,
                maxFileCount: 1,
                showUpload: true, //是否显示上传按钮
                showCaption: true,//是否显示标题
                dropZoneEnabled: false,//是否显示拖拽区域
                enctype: 'multipart/form-data',
            })
        }
        obj.on("fileuploaded", function(event, data, previewId, index) {
            var response = data.response;
			//alert(response.thumb);
            imgSrc="http://www.yii.cc"+response.thumb;
            $(".file-caption-name,.file-footer-caption").text(response.thumb);
            $(".kv-file-content img").attr({"src":imgSrc,"title":response.thumb,"alt":response.thumb})
            parent.$('input[data-flag=true]').val(response.thumb)
        })
    }
      fileFn($(".file"))
    </script>