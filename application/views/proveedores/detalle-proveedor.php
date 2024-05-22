<section class="dashboard-counts no-padding-bottom">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3>Detalle Proveedor</h3>
            </div>
            <div class="card-body">
            <?= validation_errors('<span class="error text-danger pb-2">', '</span>'); ?>
            <form class="needs-validation" novalidate action="<?= base_url()?>proveedores/actualizar" method="post">
                <div class="form-row">
                    <div class="col">
                        <label for="">Nombre Fiscal</label>
                        <input type="text" class="form-control" name="nombre_fiscal" value="<?= $detalle->nombre_fiscal?>" >
                    </div> 
                    <div class="col">
                        <label for="">Nombre Comercial*</label>
                        <input type="text" class="form-control" name="nombre_comercial" required value="<?= $detalle->nombre_comercial?>" >
                    </div>
                    <div class="col">
                        <label for="">RFC*</label>
                        <input type="text" class="form-control" name="rfc" required value="<?= $detalle->rfc?>" >
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="col-12">
                        <label for="">Persona de contacto</label>
                        <input type="text" class="form-control" name="persona_contacto" maxlength="150" value="<?= $detalle->persona_contacto?>" >
                    </div>
                    <div class="col-12 pt-3">
                        <label for="">Teléfonos</label> 
                        <input type="text" class="form-control" name="telefonos" value="<?= $detalle->telefonos?>" > 
                    </div>
                    
                    <div class="col-7 pt-3">
                        <label for="">Dirección</label>
                        <input type="text" class="form-control" name="direccion" value="<?= $detalle->direccion?>" >
                    </div>
                    <div class="col-5 pt-3">
                        <label for="">Colonia</label>
                        <input type="text" class="form-control" name="colonia" value="<?= $detalle->colonia?>" >
                    </div>

                    <div class="col-3 pt-3">
                        <label for="">C.P.</label>
                        <input type="text" class="form-control" name="cp" value="<?= $detalle->cp?>" >
                    </div>
                    <div class="col-4 pt-3">
                        <label for="">Ciudad</label>
                        <input type="text" class="form-control" name="ciudad" value="<?= $detalle->ciudad?>" >
                    </div>
                    <div class="col-5 pt-3">
                        <label for="">Condiciones de Pago</label>
                        <input type="text" class="form-control" name="condiciones_pago" value="<?= $detalle->condiciones_pago?>" >
                    </div>                    
                    

                    <div class="col-4 pt-3">
                        <label for="">Datos Bancarios</label>
                        <input type="text"class="form-control" name="datos_bancarios" value="<?= $detalle->datos_bancarios?>" > 
                    </div>
                    <div class="col-4 pt-3">
                        <label for="">Cuenta Bancaria</label>
                        <input type="text"class="form-control" name="cuenta_bancaria" value="<?= $detalle->cuenta_bancaria?>" > 
                    </div>  
                    <div class="col-4 pt-3">
                        <label for="">Clabe Interbancaria</label>
                        <input type="text"class="form-control" name="clabe_inter" value="<?= $detalle->clabe_inter?>" > 
                    </div>   

                    <div class="col-6 pt-3">
                        <label for="">Refencia Bancaria</label>
                        <input type="text"class="form-control" name="refencia_bancaria" value="<?= $detalle->refencia_bancaria?>" > 
                    </div> 
                    
                    <div class="col-6 pt-3">
                        <label for="">Tipo de Moneda*</label>
                        <select name="moneda" class="form-control" required>
                            <option value="" disabled selected>Seleccione...</option>
                            <option value="p" <?php echo ( $detalle->moneda == 'p' ) ? 'selected' : '' ?> >Pesos</option>
                            <option value="d" <?php echo ( $detalle->moneda == 'd' ) ? 'selected' : '' ?>>Dolares</option>
                        </select> 
                    </div>

                    <div class="col-8 pt-3">
                        <label for="">Observaciones</label>

                        <textarea class="form-control" name="observaciones" rows="5" ><?= $detalle->observaciones?></textarea>
                    </div>

                </div>
                <br>
                <?= form_hidden('token',$token) ?>
                <?= form_hidden('id',$detalle->idtbl_proveedores) ?>
                    <button class="btn btn-primary" type="submit">Actualizar Proveedor</button>
            </div>
        </div>
    </div>
</section>