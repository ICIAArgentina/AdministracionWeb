$(document).on("click", ".btn-delete-img", function () {
	//me guardo el path (que manda el button en el atributo "data-path")
    var path = $(this).data('path');
    $('#path').val(path);
    //$("#formDelete").attr("action", "delete_img_portada&"+path);
});