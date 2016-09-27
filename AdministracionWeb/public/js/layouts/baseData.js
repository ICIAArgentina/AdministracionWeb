$(function() {
	//consulto para obtener los datos de los sectores correspondiente en BD
    $.ajax({
		url:  'getSections',
        type: 'GET',

		success:  function (sectores)
		{
			var opciones = "";
			$.each(sectores, function(key,value) {
				opciones = opciones + ("<li><a href=section/" + value.id + ">" + value.title + "</a></li>");
			});

			$("#navbar-ul").append(opciones);
		}
	});
});