$('.summernote').summernote({
   fontNames: [
   'Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
   'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande',
   'Lucida Sans', 'Tahoma', 'Times', 'Times New Roman', 'Roboto'
   ],
   height: 200,
   onImageUpload: function(file, editor, welEditable) {
    var thisClass = $(this);
    data = new FormData();
    data.append("file", file[0]);
    $.ajax({
        data: data,
        type: "POST",
        url: appUrl('admin/upload-image'),
        cache: false,
        contentType: false,
        processData: false,
        success: function(url) {
            thisClass.summernote('editor.insertImage', url, 'img-summernote');
        }
    });
}
});

$('.datepicker').pickadate({
   format: 'd mmmm yyyy',
   formatSubmit: 'yyyy-m-d',
});

$( document ).ready(function() {
    $('#chooseProvince').on('change', function(){
        var province = $(this).val();
        if(province!=""){
            window.location.href = window.location.href + "&provinceId=" + province;
        }
    });
    $('.remove_branch_city').on('click', function(){
        var removeCityId = $(this).val();
        if(removeCityId!=""){
            window.location.href = window.location.href + "&removeCityId=" + removeCityId;
        }
    });
    $('#buttonAdd').on('click', function(){
      if($('#cityId').val()){
        var cityId = $('#cityId').val();
        var branchId = $('#branchId').val();
        if(branchId!=""){
            window.location.href = window.location.href + "&cityId=" + cityId + "&branchId=" + branchId;
        }
      }
    });
});
