function formatMask(src, mask){
	var i = src.value.length;
	var saida = mask.substring(0,1);
	var texto = mask.substring(i)
	if (texto.substring(0,1) != saida) {
		src.value += texto.substring(0,1);
	}
}

function regMask()
{	
	//$('#nascimento').mask("99/99/9999");
	$('#telefone').mask("99-9999-9999");
	$('#telefone2').mask("99-9999-9999");
	$('#telefone3').mask("99-9999-9999");
	$('#cep').mask("99999-999");
}

$(regMask);


