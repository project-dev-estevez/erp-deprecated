

$(document).ready(function() {
	$('.selectpicker').selectpicker();
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
          Toast.fire({
            type: 'error',
            title: 'Complete todos los campos obligatorios(*).'
          })
        } 
        form.classList.add('was-validated');      
      }, false);
    });
});

$(document).on('change', '#estado', function(event) {
	var _this=$(this);
	$('#municipio').find('option').remove().end().append('<option value="" disabled="disabled" selected="selected">Seleccione...</option>');
	event.preventDefault();
	$.ajax({
		url: base_url+'estados/obtener_municipios',
		type: 'POST',
		dataType: 'json',
		data: {estado: _this.val()},
		beforeSend: function() {
  		  _this.closest('.card-body').addClass('load');
  		},
        success : function(data) {
        	if(data.error)
        		Toast.fire({
          		  type: 'error',
          		  title: data.error
          		});
            $.each(data[0], function (i, item) {
			    $('#municipio').append($('<option>', { 
			        value: item.id,
			        text : item.municipio 
			    }));
			});
        },
        error : function(data) {
            console.log(data);
        }
	})
	.done(function() {
		console.log("success");
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		_this.closest('.card-body').removeClass('load');
	});
});

$(document).on('change', '#racks', function(event) {
	var _this=$(this);
	$('#niveles').find('option').remove().end().append('<option value="" disabled="disabled" selected="selected">Seleccionar...</option>');
	$("#niveles option[value='"+ racks +"']").attr("selected",true);
	event.preventDefault();
	$.ajax({
		url: base_url+'racks/obtener_niveles',
		type: 'POST',
		dataType: 'json',
		data: {racks: _this.val()},
		beforeSend: function() {
			_this.closest('.card-body').addClass('load');
		},
        success : function(data) {
			if(data.error)
				Toast.fire({
					type: 'error',
					title: data.error
				});
			$.each(data[0], function (i, item) {
				$('#niveles').append($('<option>', { 
					value: item.nivel,
					text : item.nivel
				}));
			});
        },
        error : function(data) {
            console.log(data);
        }
	})
	.done(function() {
		console.log("success");
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		_this.closest('.card-body').removeClass('load');
	});
});

$(document).on('change', '#patron', function(event) {
	var _this=$(this);
	$('#tipo_contrato').find('option').remove().end().append('<option value="" disabled="disabled" selected="selected">Seleccione...</option>');
	event.preventDefault();
	$.ajax({
		url: base_url+'personal/obtener_contratos',
		type: 'POST',
		dataType: 'json',
		data: {patron: _this.val()},
		beforeSend: function() {
  		  _this.closest('.card-body').addClass('load');
  		},
        success : function(data) {
        	if(data.error)
        		Toast.fire({
          		  type: 'error',
          		  title: data.error
          		});
            $.each(data[0], function (i, item) {
			    $('#tipo_contrato').append($('<option>', { 
			        value: item.id,
			        text : item.contrato
			    }));
			});
        },
        error : function(data) {
            console.log(data);
        }
	})
	.done(function() {
		console.log("success");
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		_this.closest('.card-body').removeClass('load');
	});
});

$(document).on('change', '#departamentos', function(event) {
	var _this=$(this);
	$('#perfil').find('option').remove().end().append('<option value="" disabled="disabled" selected="selected">Seleccione...</option>');
	event.preventDefault();
	$.ajax({
		url: base_url+'departamentos/obtener-perfiles',
		type: 'POST',
		dataType: 'json',
		data: {departamento: _this.val()},
		beforeSend: function() {
  		  _this.closest('.card-body').addClass('load');
  		},
        success : function(data) {
        	if(data.error)
        		Toast.fire({
          		  type: 'error',
          		  title: data.error
          		});
            $.each(data[0], function (i, item) {
			    $('#perfil').append($('<option>', { 
			        value: item.id,
			        text : item.perfil 
			    }));
			});
        },
        error : function(data) {
            console.log(data);
        }
	})
	.done(function() {
		console.log("success");
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		_this.closest('.card-body').removeClass('load');
	});
	
});

$(document).on('change', '#establecimiento', function(event) {
	var _this=$(this);
	$('#departamentos').find('option').remove().end().append('<option value="" disabled="disabled" selected="selected">Seleccione...</option>');
	event.preventDefault();
	$.ajax({
		url: base_url+'empresas/obtener-direcciones',
		type: 'POST',
		dataType: 'json',
		data: {establecimiento: _this.val()},
		beforeSend: function() {
  		  _this.closest('.card-body').addClass('load');
  		},
        success : function(data) {
        	if(data.error)
        		Toast.fire({
          		  type: 'error',
          		  title: data.error
          		});
            $.each(data[0], function (i, item) {
			    $('#direcciones').append($('<option>', { 
			        value: item.id,
			        text : item.direccion
			    }));
			});
        },
        error : function(data) {
            console.log(data);
        }
	})
	.done(function() {
		console.log("success");
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		_this.closest('.card-body').removeClass('load');
	});
	
});

$(document).on('change', '#direcciones', function(event) {
	var _this=$(this);
	$('#areas').find('option').remove().end().append('<option value="" disabled="disabled" selected="selected">Seleccione...</option>');
	event.preventDefault();
	$.ajax({
		url: base_url+'empresas/obtener-areas',
		type: 'POST',
		dataType: 'json',
		data: {establecimiento: _this.val()},
		beforeSend: function() {
  		  _this.closest('.card-body').addClass('load');
  		},
        success : function(data) {
        	if(data.error)
        		Toast.fire({
          		  type: 'error',
          		  title: data.error
          		});
            $.each(data[0], function (i, item) {
			    $('#areas').append($('<option>', { 
			        value: item.id,
			        text : item.area
			    }));
			});
        },
        error : function(data) {
            console.log(data);
        }
	})
	.done(function() {
		console.log("success");
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		_this.closest('.card-body').removeClass('load');
	});
	
});

$(document).on('change', '#areas', function(event) {
	var _this=$(this);
	$('#departamentos').find('option').remove().end().append('<option value="" disabled="disabled" selected="selected">Seleccione...</option>');
	event.preventDefault();
	$.ajax({
		url: base_url+'empresas/obtener-departamentos',
		type: 'POST',
		dataType: 'json',
		data: {establecimiento: _this.val()},
		beforeSend: function() {
  		  _this.closest('.card-body').addClass('load');
  		},
        success : function(data) {
        	if(data.error)
        		Toast.fire({
          		  type: 'error',
          		  title: data.error
          		});
            $.each(data[0], function (i, item) {
			    $('#departamentos').append($('<option>', { 
			        value: item.id,
			        text : item.departamento
			    }));
			});
        },
        error : function(data) {
            console.log(data);
        }
	})
	.done(function() {
		console.log("success");
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		_this.closest('.card-body').removeClass('load');
	});
	
});