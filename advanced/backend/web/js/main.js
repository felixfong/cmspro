var relate={};
relate.openPage=function(obj,oType,oW,oH){
	var relateUrl="/"+oType+"/";
    obj.click(function(){
        var oWidth,oHight;
        if (oType=="uploadfile") {
            var relateId=$(this).attr("data-inp");
        }else{
            var relateId=$(this).attr("id");
        }
        var relateId=$(this).attr("id");
        var tit=$(this).parent().parent().find("label").text();
        typeof(oW)=="undefined" ? oWidth="1000px" : oWidth=oW;
        typeof(oH)=="undefined" ? oHight="800px" : oHight=oH;
        tit=="" ? tit=$(this).parent().parent().find("span").text() : tit=tit;
        var relateInp=$(this).attr("data-inp");
        $('input[name='+relateInp+']').attr("data-flag","true");
        layer.open({
            type: 2,
            title: tit,
            skin:"layui-layer-lan",
            fix: false,
            shadeClose: true,
            maxmin: true,
            area: [oWidth,oHight],
            content: relateUrl+relateId,
            end:function(){
                $('input[name='+relateInp+']').attr("data-flag","");
            }
        });
   })
   
}
//relate.openPage($("#relatefilm"),"relate");
//relate.openPage($("#relatestar"),"relate");
//relate.openPage($("#relatevideo"),"relate");
//relate.openPage($("#relatepic"),"relate");
//relate.openPage($("#setroles"),"relate");
relate.openPage($(".editThumb"),"uploadfile","600px","500px");