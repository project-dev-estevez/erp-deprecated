<section class="dashboard-counts no-padding-bottom">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3>Nuevo Proveedor</h3>
            </div>
            <div class="card-body">
            <?= validation_errors('<span class="error text-danger pb-2">', '</span>'); ?>
            <form class="needs-validation" novalidate action="<?= base_url()?>proveedores/guardar" method="post">
                    <div class="form-row">
                        <div class="col">
                            <label for="">Nombre Fiscal*</label>
                            <input type="text" class="form-control" name="nombre_fiscal" required value="<?= set_value('nombre_fiscal')?>">
                        </div>
                        <div class="col">
                            <label for="">Nombre Comercial*</label>
                            <input type="text" class="form-control" name="nombre_comercial" required value="<?= set_value('nombre_comercial')?>">
                        </div>
                        <div class="col">
                            <label for="">RFC*</label>
                            <input type="text" class="form-control" name="rfc" required value="<?= set_value('rfc')?>">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col-12">
                            <label for="">Persona de contacto</label>
                            <input type="text" class="form-control" name="persona_contacto" maxlength="150" value="<?= set_value('persona_contacto')?>">
                        </div>
                        <br>
 
                        <div class="col-12 pt-3">
                            <label for="">Teléfonos</label> 
                            <input type="text" class="form-control" name="telefonos" value="<?= set_value('telefonos')?>" > 
                        </div>


                    <div class="col-7 pt-3">
                        <label for="">Dirección</label>
                        <input type="text" class="form-control" name="direccion" value="<?= set_value('direccion')?>" >
                    </div>
                    <div class="col-5 pt-3">
                        <label for="">Colonia</label>
                        <input type="text" class="form-control" name="colonia" value="<?= set_value('colonia')?>" >
                    </div>


                    <div class="col-3 pt-3">
                        <label for="">C.P.</label>
                        <input type="text" class="form-control" name="cp" value="<?= set_value('cp')?>" >
                    </div>
                    <div class="col-4 pt-3">
                        <label for="">Ciudad</label>
                        <input type="text" class="form-control" name="ciudad" value="<?= set_value('ciudad')?>" >
                    </div>
                    <div class="col-5 pt-3">
                        <label for="">Condiciones de Pago</label>
                        <input type="text" class="form-control" name="condiciones_pago" value="<?= set_value('condiciones_pago')?>" >
                    </div> 
 
                    <div class="col-4 pt-3">
                        <label for="">Datos Bancarios*</label>
                        <input type="text"class="form-control" name="datos_bancarios" required value="<?= set_value('datos_bancarios')?>" > 
                    </div>
                    <div class="col-4 pt-3">
                        <label for="">Cuenta Bancaria*</label>
                        <input type="text"class="form-control" name="cuenta_bancaria" required value="<?= set_value('cuenta_bancaria')?>" > 
                    </div>  
                    <div class="col-4 pt-3">
                        <label for="">Clabe Interbancaria*</label>
                        <input type="text"class="form-control" name="clabe_inter" required value="<?= set_value('clabe_inter')?>" > 
                    </div>   

                    <div class="col-6 pt-3">
                        <label for="">Refencia Bancaria*</label>
                        <input type="text"class="form-control" name="refencia_bancaria" required value="<?= set_value('refencia_bancaria')?>" > 
                    </div> 
                    
                    <div class="col-6 pt-3">
                        <label for="">Tipo de Moneda*</label>
                        <select name="moneda" class="form-control" required>
                            <option value="" disabled selected>Seleccione...</option>
                            <option value="p" >Pesos</option>
                            <option value="d" >Dolares</option>
                        </select> 
                    </div>

                    <div class="col-12 pt-3">
                        <label for="">Observaciones</label> 
                        <textarea class="form-control" name="observaciones" rows="5" ><?= set_value('observaciones')?></textarea>
                    </div>

 
                    <?= form_hidden('token',$token) ?>
                    <button class="btn btn-primary" type="submit">Guardar Proveedor</button>
                </form>
            </div>
        </div>
    </div>
</section>