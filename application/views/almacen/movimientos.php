
<section class="projects">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h4 class="h4">Movimientos de almacen</h4>
            </div>
            <div class="card-body">
                <div class="float-right">
                    <input type="text" class="form-control" placeholder="Buscar" name="busqueda">
                </div>
                <a href="<?php echo base_url() ?>almacen/excel-movimientos" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                <div class="table-responsive">
                    <table class="table table-striped table-sm table-hover" id="tbmovimientos">
                        <thead>
                            <tr>
                                <th>UID</th>
                                <th>Folio</th>
                                <th>Fecha</th>
                                <th>Proyecto</th>
                                <th>Registrado por</th>
                                <th>Realizado por</th>
                                <th>Tipo movimiento</th>
                                <th></th>                            
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>UID</th>
                                <th>Fecha</th>
                                <th>Folio</th>
                                <th>Proyecto</th>
                                <th>Registrado por</th>
                                <th>Realizado por</th>
                                <th>Tipo movimiento</th>
                                <th></th>                            
                            </tr>
                        </tfoot>
                        <tbody>
                            <!--<?php foreach ($movimientos as $key => $value): ?>
                            <tr>
                                <td><?= $value->uid ?></td>
                                <td><?= $value->folio ?></td>
                                <td><?php echo strftime("%d de %b de %Y a las %r",strtotime($value->fecha)) ?></td>
                                <td title="<?= $value->nombre_proyecto ?>"><?= $value->numero_proyecto ?></td>
                                <td><?= $value->nombre ?></td>
                                <td><?= $value->nombre_autorizado ?></td>
                                <td><?= ucwords(str_replace('-almacen', ' ', str_replace('devolucion', 'devolución', $value->tipo) )) /*Elimina la cadena de ""-almacen" y agraga acento a "devolucion"*/ ?></td>
                                <td align="center">
                                    
                                        <a href="<?= base_url() ?>almacen/movimientos/detalle/<?= $value->tipo ?>/<?= $value->uid ?>" onClick="window.open(this.href, this.target, 'width=1000,height=800,left=0,top=0'); return false;"> <i class="fa fa-info-circle"></i> </a>        
                                </td>
                            </tr>
                            <?php endforeach ?>-->
                        </tbody>
                    </table>
                    <br>
                    <div class="paginacion">

                    </div>
                </div>
            </div>
            <div class="card-footer"></div>
        </div>

    </div>
</section>
<script>
$(document).ready(function() {
    mostrarDatos("",1);

    $("input[name='busqueda']").keyup(function() {
        textoBuscar = $("input[name='busqueda']").val();
        mostrarDatos(textoBuscar,1);
    });

    $("body").on("click",".paginacion li a",function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda']").val();
        mostrarDatos(valorBuscar,valorHref); 
    });

});
function mostrarDatos(valorBuscar,pagina) {
    $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarMovimientosAlmacen",
        type: "POST",
        data: {buscar:valorBuscar,nropagina:pagina},
        dataType: "json",
        success:function(response) {
            filas = "";
            var tipo = "";
            var movimiento = "";
            $.each(response.movimientos,function(key,item) {
                if(item.tipo == 'salida-almacen'){
                    tipo = 'salida';
                    movimiento = '/' + item.movimiento_virtual;
                }else if(item.tipo == 'traspaso-almacen'){
                    tipo = 'traspaso';
                    movimiento = "";
                }else if(item.tipo == 'entrada-almacen'){
                    tipo = 'entrada';
                    movimiento = "";
                }else if(item.tipo == 'devolucion-almacen'){
                    tipo = 'devolucion';
                    movimiento = "";
                }
            filas += "<tr><td>" + item.uid + "</td><td>" +  item.folio + "</td><td>" + item.fecha + "</td><td>" + item.numero_proyecto + "</td><td>" + item.nombre + "</td><td>" + item.nombre_autorizado + "</td><td>" + item.tipo + "</td><td><center><a href='" + "<?= base_url() ?>almacen/" + tipo + "/detalle" + "/" + item.idtbl_almacen_movimientos + movimiento + "" + "' onClick=\"" + "window.open(this.href, this.target, 'width=1000,height=800,left=0,top=0'); return false;" + '"' + "><i class='fa fa-eye'></i></a></center>" + "</td></tr>";
            });
            $('#tbmovimientos tbody').html(filas);
            linkSeleccionado = Number(pagina);
            //total registros
            totalRegistros = response.totalRegistros;

            //cantidad de registros por página
            cantidadRegistros = response.cantidad;

            numeroLinks = Math.ceil(totalRegistros/cantidadRegistros);
            paginador = "<ul class='pagination justify-content-center'>";
            /*for(var i = 1; i <= numeroLinks; i++) {
            if(i == linkSeleccionado) 
            paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
            else
            paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
            }
            paginador += "</ul>";*/
            if(linkSeleccionado > 1) {
                paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
                paginador += "<li class='page-item'><a href='" + (linkSeleccionado-1) + "' class='page-link'>&lsaquo;</a></li>";
            }
            else {
                paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
                paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
            }
            cant = 2;
            pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
            if(numeroLinks > cant) {
                pagRestantes = numeroLinks - linkSeleccionado;
                pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
            }
            else {
                pagFin = numeroLinks;
            }
            for(var i = pagInicio; i <= pagFin; i++) {
                if(i == linkSeleccionado) {
                    paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
                }
                else {
                    paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
                }
            }
            if(linkSeleccionado < numeroLinks) {
                paginador += "<li class='page-item'><a href='" + (linkSeleccionado+1) + "' class='page-link'>&rsaquo;</a></li>";
                paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
            }
            else {
                paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
                paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
            }
            paginador += "</ul>";
            $(".paginacion").html(paginador);
        }
    });
}
</script>