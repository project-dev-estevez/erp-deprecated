<br>
<div class="container-fluid">
    
        <div class="card">            

                <?= validation_errors('<span class="error">', '</span>'); ?>
                <?= form_open_multipart('', 'class="needs-validation" novalidate id="form-checklist"'); ?>                

                <!-- Si el checklist ya existe -->
                
                    <br>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-8">
                            <h2 align="center"></h2>
                        </div>
                        <div class="col-4">
                            <h6 style="font-weight: normal" align="right" class="ecocheck">Folio:
                                <strong></strong>
                            </h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9">
                            <h3 align="center">ORDEN DE MANTENIMIENTO PREVENTIVO-CORRECTIVO </h3>
                        </div>
                        <div class="col-3">
                            <h6 style="font-weight: normal" align="right" class="ecocheck">Fecha:
                                <strong><?= $checklist[0]->fecha ?></strong>
                            </h6>
                        </div>
                    </div>
                    <br>
                    <div class="table">
                        <table class="table">                            
                            <tbody>
                                <tr>
                                    <th scope="row" style="text-align: center;">Tipo de mantenimiento</th>                                   
                                </tr>
                                <tr>                                    
                                    <td style="text-align: center;"><label for="preventivo">Preventivo</label> <input value="Preventivo" id="preventivo" required type="radio" name="tipo_mantenimiento" <?= $checklist[0]->tipo_servicio == 'Preventivo' ? 'checked' : '' ?> disabled></td>
                                </tr>
                                <tr>                                    
                                    <td style="text-align: center;"><label for="correctivo">Correctivo</label> <input value="Correctivo" id="correctivo" required type="radio" name="tipo_mantenimiento" <?= $checklist[0]->tipo_servicio == 'Correctivo' ? 'checked' : '' ?> disabled></td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <div class="table">
                        <table style="width: 100%;">
                            <thead>
                                <tr>
                                    <th colspan="4" scope="col" style="text-align: center;">DATOS
                                        DEL EQUIPO</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row" style="text-align: center;">Marca</th>
                                    <th scope="row" style="text-align: center;">Descripción</th>
                                    <th scope="row" style="text-align: center;">Número Serie</th>
                                    <th scope="row" style="text-align: center;">Número Interno</th>
                                                                        
                                </tr>
                               <tr>
                                   <td><input type="text" class="form-control" value="<?= $checklist[0]->marca ?>" readonly></td>
                                   <td><input type="text" class="form-control" value="<?= $checklist[0]->descripcion ?>" readonly></td>
                                   <td><input type="text" class="form-control" value="<?= $checklist[0]->numero_serie ?>" readonly></td>
                                   <td><input type="text" class="form-control" value="<?= $checklist[0]->numero_interno ?>" readonly></td>
                               </tr>
                                
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div style="text-align: center;">
                                <div class="table-responsive">
                                    <table class="table table-sm table-striped">
                                        <tr>
                                            <th scope="col" colspan="3" style="text-align: center;">
                                                <h2>Check List</h2>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <th>SI</th>
                                            <th>NO</th>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t1" value="<?= $detalle->t1 ?>" class="form-control" readonly></td>
                                            <td><input value="si" required type="radio" name="r1" <?= $detalle->r1 == 'si' ? 'checked' : '' ?> disabled></td>
                                            <td><input value="no" required type="radio" name="r1" <?= $detalle->r1 == 'no' ? 'checked' : '' ?> disabled></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t2" value="<?= $detalle->t2 ?>"
                                                    class="form-control" readonly>
                                            </td>
                                            <td><input value="si" required type="radio" name="r2" <?= $detalle->r2 == 'si' ? 'checked' : '' ?> disabled></td>
                                            <td><input value="no" required type="radio" name="r2" <?= $detalle->r2 == 'no' ? 'checked' : '' ?> disabled></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t3" value="<?= $detalle->t3 ?>" class="form-control" readonly>
                                            </td>
                                            <td><input value="si" required type="radio" name="r3" <?= $detalle->r3 == 'si' ? 'checked' : '' ?> disabled></td>
                                            <td><input value="no" required type="radio" name="r3" <?= $detalle->r3 == 'no' ? 'checked' : '' ?> disabled></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t4" value="<?= $detalle->t4 ?>"
                                                    class="form-control" readonly></td>
                                            <td><input value="si" required type="radio" name="r4" <?= $detalle->r4 == 'si' ? 'checked' : '' ?> disabled></td>
                                            <td><input value="no" required type="radio" name="r4" <?= $detalle->r4 == 'no' ? 'checked' : '' ?> disabled></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t5" value="<?= $detalle->t5 ?>" class="form-control" readonly>
                                            </td>
                                            <td><input value="si" required type="radio" name="r5" <?= $detalle->r5 == 'si' ? 'checked' : '' ?> disabled></td>
                                            <td><input value="no" required type="radio" name="r5" <?= $detalle->r5 == 'no' ? 'checked' : '' ?> disabled></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t6" value="<?= $detalle->t6 ?>" class="form-control" readonly>
                                            </td>
                                            <td><input value="si" required type="radio" name="r6" <?= $detalle->r6 == 'si' ? 'checked' : '' ?> disabled></td>
                                            <td><input value="no" required type="radio" name="r6" <?= $detalle->r6 == 'no' ? 'checked' : '' ?> disabled></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t7" value="<?= $detalle->t7 ?>"
                                                    class="form-control" readonly></td>
                                            <td><input value="si" required type="radio" name="r7" <?= $detalle->r7 == 'si' ? 'checked' : '' ?> disabled></td>
                                            <td><input value="no" required type="radio" name="r7" <?= $detalle->r7 == 'no' ? 'checked' : '' ?> disabled></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t8" value="<?= $detalle->t8 ?>"
                                                    class="form-control" readonly>
                                            </td>
                                            <td><input value="si" required type="radio" name="r8" <?= $detalle->r8 == 'si' ? 'checked' : '' ?> disabled></td>
                                            <td><input value="no" required type="radio" name="r8" <?= $detalle->r8 == 'no' ? 'checked' : '' ?> disabled></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t9" value="<?= $detalle->t9 ?>"
                                                    class="form-control" readonly></td>
                                            <td><input value="si" required type="radio" name="r9" <?= $detalle->r9 == 'si' ? 'checked' : '' ?> disabled></td>
                                            <td><input value="no" required type="radio" name="r9" <?= $detalle->r9 == 'no' ? 'checked' : '' ?> disabled></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t10" value="<?= $detalle->t10 ?>"
                                                    class="form-control" readonly>
                                            </td>
                                            <td><input value="si" required type="radio" name="r10" <?= $detalle->r10 == 'si' ? 'checked' : '' ?> disabled></td>
                                            <td><input value="no" required type="radio" name="r10" <?= $detalle->r10 == 'no' ? 'checked' : '' ?> disabled></td>
                                        </tr>                                                                                
                                        
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <br>
                                      
                   
                    <div class="table">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row" style="text-align: center;">OBSERVACIONES</th>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">
                                    <textarea class="form-control" name="observaciones" placeholder="Observaciones" rows="3" readonly><?= $checklist[0]->observaciones ?></textarea>
                                        </td>
                                </tr>                               
                            </tbody>
                        </table>
                    </div>
                    <br>                  

                    
                    <?=form_close()?>
                </div>                
                <!-- /Si el checklist ya existe -->
            
        </div>
    
</div>

<script>
    $("#form-checklist").on("submit", function(event) {    
    var button = $(this).find("input[type='submit']");   
    if (event.isDefaultPrevented()) {
        console.log('Error');
    } else {
        event.preventDefault();
        button.prop("disabled", true);
        var formData = new FormData(document.getElementById("form-checklist"));
        $.ajax({
            url: "<?= base_url()?>sistemas/guardarChecklistServicio",
            type: "post",
            dataType: "json",
            data: formData,
            processData: false,
            contentType: false,
            complete: function(res) {
                var resp = JSON.parse(res.responseText);
                console.log(resp);
                if (resp.status) {
                    Toast.fire({
                        type: 'success',
                        title: resp.message
                    })
                    location.href = "<?= base_url() ?>sistemas/horometros/";
                } else {
                    Toast.fire({
                        type: 'error',
                        title: resp.message
                    });
                    button.prop("disabled", false);
                }
            },
            error: function(){
                button.prop("disabled", false);
            }
        });
    }
});
</script>