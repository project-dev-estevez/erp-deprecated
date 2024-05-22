
<section>
	<div class="container-fluid">
		
			<div class="card">
        		<div class="card-header d-flex align-items-center">
        		  <h3 class="h4">Carga de lista de asistencias desde archivo .CSV</h3>
        		</div>
        		<div class="card-body">
					<div id="inputs" class="ocultarOnSuccess clearfix">
					  <input type="file" id="files" name="files"/>
					</div>
					<hr class="ocultarOnSuccess">
					<output id="list" class="ocultarOnSuccess">
					</output>
					<hr class="ocultarOnSuccess">
					<button type="button" onclick="printTable()" id="procesar" class="btn btn-success ladda ocultarOnSuccess" style="display: none">Procesar Archivo</button>
					<div class="clearfix"></div>
				<br>
					<table id="contents" style="width:100%;" class="table table-hover">
					</table>
					<br>
					<a id="refrescar" href="<?= base_url() ?>asistencias/cagar-csv" class="btn btn-success" style="display: none">Cargar Nuevo Archivo</a>
				</div>
			</div>
		
	</div>
	
</section>

  <script src="<?= base_url(); ?>js/jquery.csv.js"></script>
  <script>
    $(document).ready(function() {
      if(isAPIAvailable()) {
        $('#files').bind('change', handleFileSelect);
      }
    });

    function isAPIAvailable() {
      // Check for the various File API support.
      if (window.File && window.FileReader && window.FileList && window.Blob) {
        // Great success! All the File APIs are supported.
        return true;
      } else {
        // source: File API availability - http://caniuse.com/#feat=fileapi
        // source: <output> availability - http://html5doctor.com/the-output-element/
        document.writeln('The HTML5 APIs used in this form are only available in the following browsers:<br />');
        // 6.0 File API & 13.0 <output>
        document.writeln(' - Google Chrome: 13.0 or later<br />');
        // 3.6 File API & 6.0 <output>
        document.writeln(' - Mozilla Firefox: 6.0 or later<br />');
        // 10.0 File API & 10.0 <output>
        document.writeln(' - Internet Explorer: Not supported (partial support expected in 10.0)<br />');
        // ? File API & 5.1 <output>
        document.writeln(' - Safari: Not supported<br />');
        // ? File API & 9.2 <output>
        document.writeln(' - Opera: Not supported');
        return false;
      }
    }

    var files;
      var file;

    function handleFileSelect(evt) {
      files = evt.target.files; // FileList object
      file = files[0];

      // read the file metadata
      var output = ''
          output += '<span style="font-weight:bold;">' + (file.name) + '</span><br />\n';
          output += ' - Tipo de archivo: ' + (file.type || 'n/a') + '<br />\n';
          output += ' - Tamaño de archivo: ' + file.size + ' bytes<br />\n';
          output += ' - Última modificación: ' + (file.lastModifiedDate ? file.lastModifiedDate.toLocaleDateString() : 'n/a') + '<br />\n';

      	$('#list').append(output);
      	$('#procesar').show();
     	
     
    }

    function printTable() {
    	var reader = new FileReader();
    	reader.readAsText(file);
    	reader.onload = function(event){
    		var csv = event.target.result;
    		try {
    			$('#inputs').hide();
    			var data = $.csv.toArrays(csv);
    			var html = '';
    			
    			for(var row in data) {
    					var html = '';
    					html += '<tr id="row-'+row+'">\r\n';
    					for(var item in data[row]) {
    						html += '<td>' + data[row][item] + '</td>\r\n';
    					}
    					html += '<td class="estatus"></td></tr>\r\n';
    					$('#contents').append(html);
    			}
    			

    			procesar_csv(data);
    			
    		}
    		catch(e) {
    			$('#inputs').hide();
    			Ladda.stopAll();
    			$('#list').html('');
    			$('#procesar').hide();
    			$('#files').val('');
    			Messenger().post({
    				message: e.message,
    				type: 'error',
    				showCloseButton: true
    			});
    		}


    	};


    	reader.onerror = function(){ 
    		Messenger().post({
    			message: 'Unable to read ' + file.fileName,
    			type: 'error',
    			showCloseButton: true
    		}); 
    	};
    }

    function procesar_csv(data) {
    	var promises = [];
    	var total_filas=0;
    	var total_inserts=0;
    	var total_errores_no_existe=0;
    	var total_errores=0;
    	var total_filas_sin_info=0;
    	for(var row in data) {
    		total_filas++;
    		console.log(row);
    		var request = $.ajax({
    			url: '<?= base_url() ?>asistencias/procesar-csv',
    			type: 'POST',
    			async:true,
    			dataType: 'json',
    			data: {numero_empleado: data[row][0], fecha_hora: data[row][2], row:row, token: '<?= $token ?>'},
    		})
    		.done(function(data) {
    			console.log(data)
    			if(data.error===true){
    				if(data.texto=='no_existe'){
    					total_errores_no_existe++;
    					$('#row-'+data.row).addClass('table-warning').find('.estatus').html('<strong>No existe número de usuario</stong>');
    				}
    				else if(data.texto=='no_numerico'){
    					total_filas_sin_info++;
    					$('#row-'+data.row).addClass('table-active').find('.estatus').html('');
    				}
    				else{
    					total_errores++;
    					$('#row-'+data.row).addClass('table-danger').find('.estatus').html('<strong>Error</stong>');
    				}
    			}else if(data.error===false){
    				total_inserts++;
    				$('#row-'+data.row).addClass('table-success').find('.estatus').html('<strong>Carga exitosa</stong>');
    			}
    			else{
    				total_errores++;
    				$('#row-'+data.row).addClass('table-danger').find('.estatus').html('<strong>Error</stong>');
    			}
    			
    			
    			
    	
    		})
    		.fail(function(jqXHR, textStatus) {
    			Messenger().post({
    				message: "Request failed: " + textStatus + ", intente nuevamente.",
    				type: 'error',
    				showCloseButton: true
    			});
    		})
    		.always(function() {
    	
    		});
    		promises.push( request);
    	}


    	$.when.apply(null, promises).done(function(){

		   	$('.ocultarOnSuccess').hide();
    		Ladda.stopAll();

    		$('#list').show().html('');

    		var output = ''
	        output += '<span style="font-weight:bold;" class="text-success">Carga finalizada</span><br />\n';
	        output += ' - Total de filas insertadas: ' + total_inserts + '<br />\n';
	        output += ' - Total numeros de empleado inexistentes: ' + total_errores_no_existe + '<br />\n';
	        output += ' - Total de errores: ' + total_errores + '<br />\n';
	        output += ' - Total de filas sin información: ' + total_filas_sin_info + '<br />\n';
	        output += ' - Total de filas leidas: ' + total_filas + '<br />\n';

	        $('#refrescar').show();

	    	$('#list').append(output);
		})

    	
    	
    }
  </script>