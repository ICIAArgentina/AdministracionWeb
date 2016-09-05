$(document).on("click", ".btn-edit-paragraph", function () {
	//me guardo el paragraph_id (que manda el button en el atributo "data-id")
    var paragraph_id = $(this).data('id');   

    //#paragraphId es un input de tipo hidden en el edit.blade.php de paragraphs
	$("#paragraph_id").val(paragraph_id);

	//consulto para obtener los datos del paragraph correspondiente en BD
    $.ajax({
		url:  'getParagraph',
        type: 'GET',
        data: 'id=' + paragraph_id,

		success:  function (paragraph)
		{
			//paragraph es un arreglo con un sólo elemento (accedemos con [0])
			$("#formEdit").attr("action", "paragraphs/"+paragraph_id);
			$("#order_e").val( paragraph[0].order );
			$("#content_e").val( paragraph[0].content );
			$("#order_e").focus();
		}
	});
});