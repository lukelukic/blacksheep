function callAjax(ajaxObj) {
    $.ajax({
        url : ajaxObj.url,
        type : ajaxObj.type ? ajaxObj.type : "GET",
        dataType : ajaxObj.dataType ? ajaxObj.dataType : "json",
        data : ajaxObj.data,
        success : function(data) {
            ajaxObj.success(data);
        },
        error : function(xhr, status, error) {
            ajaxObj.error(error);
        }
    })
}
