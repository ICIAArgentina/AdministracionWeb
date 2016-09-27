$(document).on("click", ".btn-edit-section", function () {
	//me guardo el section_id (que manda el button en el atributo "data-id")
    var section_id = $(this).data('id');   

    //#sectionId es un input de tipo hidden en el edit.blade.php de sections
	$("#section_id").val(section_id);

	//consulto para obtener los datos del section correspondiente en BD
    $.ajax({
		url:  'getSection',
        type: 'GET',
        data: 'id=' + section_id,

		success:  function (section)
		{
			//section es un arreglo con un sólo elemento (accedemos con [0])
			$("#formEdit").attr("action", "sections/"+section_id);
			$("#title_e").val( section[0].title );
			$("#title_e").focus();
		}
	});
});