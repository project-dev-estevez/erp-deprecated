<br>
<div class="container-fluid">
    <div class="row" style="display: block !important;">
        <div class="card">            
            <!-- Si el checklistTecnico ya existe -->
                            <?php if(isset($checklistTecnico)){ ?>
                                <div class="container-fluid">
                                <div class="table">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col" colspan="4" style="text-align: center;">
                                                    <h2>Usuario</h2>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php if($checklistTecnico->rt0 == "mantemiento_preventivo"){ ?>
                                                    <th scope="row" style="text-align: center;">Mantenimiento Preventivo: </th>
                                                    <th scope="row"><input type="radio" name="r0" style="width: 13px;" class="form-control" <?= $checklistTecnico->rt0 == "mantemiento_preventivo" ? "checked" : "" ?> required></th>
                                                    <th></th>
                                                    <th></th>
                                                <?php }else{ ?>
                                                    <th scope="row" style="text-align: center;">Mantenimiento Preventivo Menor: </th>
                                                    <th scope="row"><input type="radio" name="r0" style="width: 13px;" class="form-control" <?= $checklistTecnico->rt0 == "mantemiento_preventivo_menor" ? "checked" : "" ?> required></th>
                                                    <th scope="row" style="text-align: center;">Mantenimiento Preventivo Mayor: </th>
                                                    <th scope="row"><input type="radio" name="r0" style="width: 13px;" class="form-control" <?= $checklistTecnico->rt0 == "mantemiento_preventivo_mayor" ? "checked" : "" ?> required></th>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="text-align: center;">Mantenimiento Correctivo: </th>
                                                <th scope="row"><input type="radio" name="r0" style="width: 13px;" class="form-control" <?= $checklistTecnico->rt0 == "mantemiento_correctivo" ? "checked" : "" ?> required></th>
                                                <th scope="row" style="text-align: center;">Predictivo: </th>
                                                <th scope="row"><input type="radio" name="r0" style="width: 13px;" class="form-control" <?= $checklistTecnico->rt0 == "predictivo" ? "checked" : "" ?> required></th>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="text-align: center;">Defecto de Fabrica: </th>
                                                <th scope="row"><input type="radio" name="r0" style="width: 13px;" class="form-control" <?= $checklistTecnico->rt0 == "defecto_de_fabrica" ? "checked" : "" ?> required></th>
                                                <th scope="row" style="text-align: center;">Desgaste: </th>
                                                <th scope="row"><input type="radio" name="r0" style="width: 13px;" class="form-control" <?= $checklistTecnico->rt0 == "desgaste" ? "checked" : "" ?> required></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div style="text-align: center;">
                                            <div class="table-responsive">
                                                <table class="table table-sm table-striped">
                                                    <tr>
                                                        <th scope="col" colspan="3" style="text-align: center;">
                                                            <h2>LUBRICACIÓN</h2>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>SI</th>
                                                        <th>NO</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt1" value="<?= $checklistTecnico->tt1 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt1 == "si" ? "checked" : "" ?> required type="radio" name="rt1"></td>
                                                        <td><input <?= $checklistTecnico->rt1 == "no" ? "checked" : "" ?> required type="radio" name="rt1"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt2" value="<?= $checklistTecnico->tt2 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt2 == "si" ? "checked" : "" ?> required type="radio" name="rt2"></td>
                                                        <td><input <?= $checklistTecnico->rt2 == "no" ? "checked" : "" ?> required type="radio" name="rt2"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt3" value="<?= $checklistTecnico->tt3 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt3 == "si" ? "checked" : "" ?> required type="radio" name="rt3"></td>
                                                        <td><input <?= $checklistTecnico->rt3 == "no" ? "checked" : "" ?>  required type="radio" name="rt3"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt4" value="<?= $checklistTecnico->tt4 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt4 == "si" ? "checked" : "" ?> required type="radio" name="rt4"></td>
                                                        <td><input <?= $checklistTecnico->rt4 == "no" ? "checked" : "" ?> required type="radio" name="rt4"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt5" value="<?= $checklistTecnico->tt5 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt5 == "si" ? "checked" : "" ?> required type="radio" name="rt5"></td>
                                                        <td><input <?= $checklistTecnico->rt5 == "no" ? "checked" : "" ?> required type="radio" name="rt5"></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div style="text-align: center;">
                                            <div class="table-responsive">
                                                <table class="table table-sm table-striped">
                                                    <tr>
                                                        <th scope="col" colspan="3" style="text-align: center;">
                                                            <h2>DIRECCIÓN</h2>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>SI</th>
                                                        <th>NO</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt6" value="<?= $checklistTecnico->tt6 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt6 == "si" ? "checked" : "" ?> required type="radio" name="rt6"></td>
                                                        <td><input <?= $checklistTecnico->rt6 == "no" ? "checked" : "" ?> required type="radio" name="rt6"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt7" value="<?= $checklistTecnico->tt7 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt7 == "si" ? "checked" : "" ?> required type="radio" name="rt7"></td>
                                                        <td><input <?= $checklistTecnico->rt7 == "no" ? "checked" : "" ?> required type="radio" name="rt7"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt8" value="<?= $checklistTecnico->tt8 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt8 == "si" ? "checked" : "" ?> required type="radio" name="rt8"></td>
                                                        <td><input <?= $checklistTecnico->rt8 == "no" ? "checked" : "" ?> required type="radio" name="rt8"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt9" value="<?= $checklistTecnico->tt9 ?>" class="form-control"></td>
                                                        <td colspan="2"><input class="form-control" value="<?= $checklistTecnico->rt9 ?>" type="input" name="rt9"></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div style="text-align: center;">
                                            <div class="table-responsive">
                                                <table class="table table-sm table-striped">
                                                    <tr>
                                                        <th scope="col" colspan="3" style="text-align: center;">
                                                            <h2>MOTOR</h2>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>SI</th>
                                                        <th>NO</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt10" value="<?= $checklistTecnico->tt10 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt10 == "si" ? "checked" : "" ?> required type="radio" name="rt10"></td>
                                                        <td><input <?= $checklistTecnico->rt10 == "no" ? "checked" : "" ?> required type="radio" name="rt10"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt11" value="<?= $checklistTecnico->tt11 ?>"
                                                                class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt11 == "si" ? "checked" : "" ?> required type="radio" name="rt11"></td>
                                                        <td><input <?= $checklistTecnico->rt11 == "no" ? "checked" : "" ?> required type="radio" name="rt11"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt12" value="<?= $checklistTecnico->tt12 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt12 == "si" ? "checked" : "" ?> required type="radio" name="rt12"></td>
                                                        <td><input <?= $checklistTecnico->rt12 == "no" ? "checked" : "" ?> required type="radio" name="rt12"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt13" value="<?= $checklistTecnico->tt13 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt13 == "si" ? "checked" : "" ?> required type="radio" name="rt13"></td>
                                                        <td><input <?= $checklistTecnico->rt13 == "no" ? "checked" : "" ?> required type="radio" name="rt13"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt14" value="<?= $checklistTecnico->tt14 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt14 == "si" ? "checked" : "" ?> required type="radio" name="rt14"></td>
                                                        <td><input <?= $checklistTecnico->rt14 == "no" ? "checked" : "" ?> required type="radio" name="rt14"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt15" value="<?= $checklistTecnico->tt15 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt16 == "si" ? "checked" : "" ?> required type="radio" name="rt16"></td>
                                                        <td><input <?= $checklistTecnico->rt16 == "no" ? "checked" : "" ?> required type="radio" name="rt16"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt17" value="<?= $checklistTecnico->tt17 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt17 == "si" ? "checked" : "" ?> required type="radio" name="rt17"></td>
                                                        <td><input <?= $checklistTecnico->rt17 == "no" ? "checked" : "" ?> required type="radio" name="rt17"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt18" value="<?= $checklistTecnico->tt18 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt18 == "si" ? "checked" : "" ?> required type="radio" name="rt18"></td>
                                                        <td><input <?= $checklistTecnico->rt18 == "no" ? "checked" : "" ?> required type="radio" name="rt18"></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div style="text-align: center;">
                                            <div class="table-responsive">
                                                <table class="table table-sm table-striped">
                                                    <tr>
                                                        <th scope="col" colspan="3" style="text-align: center;">
                                                            <h2>EMBRAGUE</h2>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>SI</th>
                                                        <th>NO</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt19" value="<?= $checklistTecnico->tt19 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt19 == "si" ? "checked" : "" ?> required type="radio" name="rt19"></td>
                                                        <td><input <?= $checklistTecnico->rt19 == "no" ? "checked" : "" ?> required type="radio" name="rt19"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt20" value="<?= $checklistTecnico->tt20 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt20 == "si" ? "checked" : "" ?> required type="radio" name="rt20"></td>
                                                        <td><input <?= $checklistTecnico->rt20 == "no" ? "checked" : "" ?> required type="radio" name="rt20"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt21" value="<?= $checklistTecnico->tt21 ?>"class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt21 == "si" ? "checked" : "" ?> required type="radio" name="rt21"></td>
                                                        <td><input <?= $checklistTecnico->rt21 == "no" ? "checked" : "" ?> required type="radio" name="rt21"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt22" value="<?= $checklistTecnico->tt22 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt22 == "si" ? "checked" : "" ?> required type="radio" name="rt22"></td>
                                                        <td><input <?= $checklistTecnico->rt22 == "no" ? "checked" : "" ?> required type="radio" name="rt22"></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div style="text-align: center;">
                                            <div class="table-responsive">
                                                <table class="table table-sm table-striped">
                                                    <tr>
                                                        <th scope="col" colspan="3" style="text-align: center;">
                                                            <h2>SISTEMA ELÉCTRICO</h2>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>SI</th>
                                                        <th>NO</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt23" value="<?= $checklistTecnico->tt23 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt23 == "si" ? "checked" : "" ?> required type="radio" name="rt23"></td>
                                                        <td><input <?= $checklistTecnico->rt23 == "no" ? "checked" : "" ?> required type="radio" name="rt23"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt24" value="<?= $checklistTecnico->tt24 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt24 == "si" ? "checked" : "" ?> required type="radio" name="rt24"></td>
                                                        <td><input <?= $checklistTecnico->rt24 == "no" ? "checked" : "" ?> required type="radio" name="rt24"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt25" value="<?= $checklistTecnico->tt25 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt25 == "si" ? "checked" : "" ?> required type="radio" name="rt25"></td>
                                                        <td><input <?= $checklistTecnico->rt25 == "no" ? "checked" : "" ?> required type="radio" name="rt25"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt26" value="<?= $checklistTecnico->tt26 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt26 == "si" ? "checked" : "" ?> required type="radio" name="rt26"></td>
                                                        <td><input <?= $checklistTecnico->rt26 == "no" ? "checked" : "" ?> required type="radio" name="rt26"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt27" value="<?= $checklistTecnico->tt27 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt27 == "si" ? "checked" : "" ?> required type="radio" name="rt27"></td>
                                                        <td><input <?= $checklistTecnico->rt27 == "no" ? "checked" : "" ?> required type="radio" name="rt27"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt28" value="<?= $checklistTecnico->tt28 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt28 == "si" ? "checked" : "" ?> required type="radio" name="rt28"></td>
                                                        <td><input <?= $checklistTecnico->rt28 == "no" ? "checked" : "" ?> required type="radio" name="rt28"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt29" value="<?= $checklistTecnico->tt29 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt29 == "si" ? "checked" : "" ?> required type="radio" name="rt29"></td>
                                                        <td><input <?= $checklistTecnico->rt29 == "no" ? "checked" : "" ?> required type="radio" name="rt29"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt30" value="<?= $checklistTecnico->tt30 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt30 == "si" ? "checked" : "" ?> required type="radio" name="rt30"></td>
                                                        <td><input <?= $checklistTecnico->rt30 == "no" ? "checked" : "" ?> required type="radio" name="rt30"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt31" value="<?= $checklistTecnico->tt31 ?>"
                                                                class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt31 == "si" ? "checked" : "" ?> required type="radio" name="rt31"></td>
                                                        <td><input <?= $checklistTecnico->rt31 == "no" ? "checked" : "" ?> required type="radio" name="rt31"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt32" value="<?= $checklistTecnico->tt32 ?>" class="form-control"></td>
                                                        <td colspan="2"><input class="form-control" value="<?= $checklistTecnico->rt32 ?>" type="text" name="rt32"></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div style="text-align: center;">
                                            <div class="table-responsive">
                                                <table class="table table-sm table-striped">
                                                    <tr>
                                                        <th scope="col" colspan="3" style="text-align: center;">
                                                            <h2>SISTEMA DE ENFRIAMENTO</h2>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>SI</th>
                                                        <th>NO</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt33" value="<?= $checklistTecnico->tt33 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt33 == "si" ? "checked" : "" ?> required type="radio" name="rt33"></td>
                                                        <td><input <?= $checklistTecnico->rt33 == "no" ? "checked" : "" ?> required type="radio" name="rt33"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt34" value="<?= $checklistTecnico->tt34 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt34 == "si" ? "checked" : "" ?>  required type="radio" name="rt34"></td>
                                                        <td><input <?= $checklistTecnico->rt34 == "no" ? "checked" : "" ?> required type="radio" name="rt34"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt35" value="<?= $checklistTecnico->tt35 ?>"
                                                                class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt35 == "si" ? "checked" : "" ?>  required type="radio" name="rt35"></td>
                                                        <td><input <?= $checklistTecnico->rt35 == "no" ? "checked" : "" ?> required type="radio" name="r35"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt36" value="<?= $checklistTecnico->tt36 ?>"
                                                                class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt36 == "si" ? "checked" : "" ?>  required type="radio" name="rt36"></td>
                                                        <td><input <?= $checklistTecnico->rt36 == "no" ? "checked" : "" ?> required type="radio" name="rt36"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt37" value="<?= $checklistTecnico->tt37 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt37 == "si" ? "checked" : "" ?>  required type="radio" name="rt37"></td>
                                                        <td><input <?= $checklistTecnico->rt37 == "no" ? "checked" : "" ?> required type="radio" name="rt37"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt38" value="<?= $checklistTecnico->tt38 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt38 == "si" ? "checked" : "" ?>  required type="radio" name="rt38"></td>
                                                        <td><input <?= $checklistTecnico->rt38 == "no" ? "checked" : "" ?> required type="radio" name="rt38"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt39" value="<?= $checklistTecnico->tt39 ?>" class="form-control"></td>
                                                        <td colspan="2"><input class="form-control" value="<?= $checklistTecnico->rt39 ?>" type="text" name="rt39"></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div style="text-align: center;">
                                            <div class="table-responsive">
                                                <table class="table table-sm table-striped">
                                                    <tr>
                                                        <th scope="col" colspan="3" style="text-align: center;">
                                                            <h2>SUSPENSIÓN</h2>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>SI</th>
                                                        <th>NO</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt40" value="<?= $checklistTecnico->tt40 ?>"
                                                                class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt40 == "si" ? "checked" : "" ?> required type="radio" name="rt40"></td>
                                                        <td><input <?= $checklistTecnico->rt40 == "no" ? "checked" : "" ?> required type="radio" name="rt40"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt41" value="<?= $checklistTecnico->tt41 ?>"
                                                                class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt41 == "si" ? "checked" : "" ?> required type="radio" name="rt41"></td>
                                                        <td><input <?= $checklistTecnico->rt41 == "no" ? "checked" : "" ?> required type="radio" name="rt41"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt42" value="<?= $checklistTecnico->tt42 ?>"
                                                                class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt42 == "si" ? "checked" : "" ?> required type="radio" name="rt42"></td>
                                                        <td><input <?= $checklistTecnico->rt42 == "no" ? "checked" : "" ?> required type="radio" name="rt42"></td>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>DELANTEROS</th>
                                                        <th>TRASCEROS</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt43" value="<?= $checklistTecnico->tt43 ?>" class="form-control"></td>
                                                        <td><input <?= isset($checklistTecnico->rt43_1) && $checklistTecnico->rt43_1 == "si" ? "checked" : "" ?> type="checkbox" name="rt43_1"></td>
                                                        <td><input <?= isset($checklistTecnico->rt43_2) && $checklistTecnico->rt43_2 == "si" ? "checked" : "" ?> type="checkbox" name="rt43_2"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt44" value="<?= $checklistTecnico->tt44 ?>" class="form-control"></td>
                                                        <td><input <?= isset($checklistTecnico->rt44_1) && $checklistTecnico->rt44_1 == "si" ? "checked" : "" ?> type="checkbox" name="rt44_1"></td>
                                                        <td><input <?= isset($checklistTecnico->rt44_2) && $checklistTecnico->rt44_2 == "si" ? "checked" : "" ?> type="checkbox" name="rt44_2"></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div style="text-align: center;">
                                            <div class="table-responsive">
                                                <table class="table table-sm table-striped">
                                                    <tr>
                                                        <th scope="col" colspan="3" style="text-align: center;">
                                                            <h2>FRENOS</h2>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>SI</th>
                                                        <th>NO</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt45" value="<?= $checklistTecnico->tt45 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt45 == "si" ? "checked" : "" ?> required type="radio" name="rt45"></td>
                                                        <td><input <?= $checklistTecnico->rt45 == "no" ? "checked" : "" ?> required type="radio" name="rt45"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt46" value="<?= $checklistTecnico->tt46 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt46 == "si" ? "checked" : "" ?> required type="radio" name="rt46"></td>
                                                        <td><input <?= $checklistTecnico->rt46 == "no" ? "checked" : "" ?> required type="radio" name="rt46"></td>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>Tambores</th>
                                                        <th>Rotores</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt47" value="<?= $checklistTecnico->tt47 ?>" class="form-control"></td>
                                                        <td><input <?= isset($checklistTecnico->rt47_1) && $checklistTecnico->rt47_1 == "si" ? "checked" : "" ?> type="checkbox" name="rt47_1"></td>
                                                        <td><input <?= isset($checklistTecnico->rt47_2) && $checklistTecnico->rt47_2 == "si" ? "checked" : "" ?> type="checkbox" name="rt47_2"></td>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>DELANTEROS</th>
                                                        <th>TRASCEROS</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt48" value="<?= $checklistTecnico->tt48 ?>" class="form-control"><select class="form-control" name="rt48_1"><option value="alta" <?= $checklistTecnico->rt48_1 == "alta" ? "selected" : "" ?>>Tiempo de vida alto</option><option value="media" <?= $checklistTecnico->rt48_1 == "media" ? "selected" : "" ?>>Tiempo de vida medio</option><option value="baja" <?= $checklistTecnico->rt48_1 == "baja" ? "selected" : "" ?>>Tiempo de vida bajo</option></select></td>
                                                        <td><input <?= isset($checklistTecnico->rt48_2) && $checklistTecnico->rt48_2 == "si" ? "checked" : "" ?>  type="checkbox" name="rt48_2"></td>
                                                        <td><input <?= isset($checklistTecnico->rt48_3) && $checklistTecnico->rt48_3 == "si" ? "checked" : "" ?>  type="checkbox" name="rt48_3"></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div style="text-align: center;">
                                            <div class="table-responsive">
                                                <table class="table table-sm table-striped">
                                                    <tr>
                                                        <th scope="col" colspan="2" style="text-align: center;">
                                                            <h2>LLANTAS</h2>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>ESTADO</th>
                                                        <th>TIEMPO DE VIDA</th>
                                                    </tr>
                                                    <tr>
                                                        <?php if(isset($checklistTecnico->rt49_3) && isset($checklistTecnico->rt49_5) && isset($checklistTecnico->rt49_7)){ 
                                                        ?>
                                                        <td>Llanta delantera izquierda</td>
                                                        <?php } ?>
                                                        <td><select class="form-control" name="rt49_1"><option value="normal" <?= $checklistTecnico->rt49_1 == "normal" ? "selected" : "" ?>>Normal</option><option value="desgaste" <?= $checklistTecnico->rt49_1 == "desgaste" ? "selected" : "" ?>>Desgaste</option><option value="superinflado" <?= $checklistTecnico->rt49_1 == "superinflado" ? "selected" : "" ?>>Superinflado</option><option value="baja precion" <?= $checklistTecnico->rt49_1 == "baja_precion" ? "selected" : "" ?>>Baja preción</option><option value="desgaste regular" <?= $checklistTecnico->rt49_1 == "desgaste regular" ? "selected" : "" ?>>Desgaste Regular</option></select></td>
                                                        <td><select name="r49_2" class="form-control"><option value="alta" <?= $checklistTecnico->rt49_2 == "alta" ? "selected" : "" ?>>Alta</option><option value="media" <?= $checklistTecnico->rt49_2 == "media" ? "selected" : "" ?>>Media</option><option value="baja" <?= $checklistTecnico->rt49_2 == "baja" ? "selected" : "" ?>>Baja</option></select></td>
                                                    </tr>
                                                    <?php if(isset($checklistTecnico->rt49_3)){ ?>
                                                    <tr>
                                                        <td>Llanta delantera derecha</td>
                                                        <td><select class="form-control" name="rt49_3"><option value="normal" <?= $checklistTecnico->rt49_3 == "normal" ? "selected" : "" ?>>Normal</option><option value="desgaste" <?= $checklistTecnico->rt49_3 == "desgaste" ? "selected" : "" ?>>Desgaste</option><option value="superinflado" <?= $checklistTecnico->rt49_3 == "superinflado" ? "selected" : "" ?>>Superinflado</option><option value="baja precion" <?= $checklistTecnico->rt49_3 == "baja_precion" ? "selected" : "" ?>>Baja preción</option><option value="desgaste regular" <?= $checklistTecnico->rt49_3 == "desgaste regular" ? "selected" : "" ?>>Desgaste Regular</option></select></td>
                                                        <td><select name="r49_4" class="form-control"><option value="alta" <?= $checklistTecnico->rt49_4 == "alta" ? "selected" : "" ?>>Alta</option><option value="media" <?= $checklistTecnico->rt49_4 == "media" ? "selected" : "" ?>>Media</option><option value="baja" <?= $checklistTecnico->rt49_4 == "baja" ? "selected" : "" ?>>Baja</option></select></td>
                                                    </tr>
                                                    <?php } if(isset($checklistTecnico->rt49_5)){ ?>
                                                    <tr>
                                                        <td>Llanta trasera izquierda</td>
                                                        <td><select class="form-control" name="rt49_5"><option value="normal" <?= $checklistTecnico->rt49_5 == "normal" ? "selected" : "" ?>>Normal</option><option value="desgaste" <?= $checklistTecnico->rt49_5 == "desgaste" ? "selected" : "" ?>>Desgaste</option><option value="superinflado" <?= $checklistTecnico->rt49_5 == "superinflado" ? "selected" : "" ?>>Superinflado</option><option value="baja precion" <?= $checklistTecnico->rt49_5 == "baja_precion" ? "selected" : "" ?>>Baja preción</option><option value="desgaste regular" <?= $checklistTecnico->rt49_5 == "desgaste regular" ? "selected" : "" ?>>Desgaste Regular</option></select></td>
                                                        <td><select name="r49_6" class="form-control"><option value="alta" <?= $checklistTecnico->rt49_6 == "alta" ? "selected" : "" ?>>Alta</option><option value="media" <?= $checklistTecnico->rt49_6 == "media" ? "selected" : "" ?>>Media</option><option value="baja" <?= $checklistTecnico->rt49_6 == "baja" ? "selected" : "" ?>>Baja</option></select></td>
                                                    </tr>
                                                    <?php } if(isset($checklistTecnico->rt49_7)){ ?>
                                                    <tr>
                                                        <td>Llanta trasera derecha</td>
                                                        <td><select class="form-control" name="rt49_7"><option value="normal" <?= $checklistTecnico->rt49_7 == "normal" ? "selected" : "" ?>>Normal</option><option value="desgaste" <?= $checklistTecnico->rt49_7 == "desgaste" ? "selected" : "" ?>>Desgaste</option><option value="superinflado" <?= $checklistTecnico->rt49_7 == "superinflado" ? "selected" : "" ?>>Superinflado</option><option value="baja precion" <?= $checklistTecnico->rt49_7 == "baja precion" ? "selected" : "" ?>>Baja presión</option><option value="desgaste regular" <?= $checklistTecnico->rt49_7 == "desgaste regular" ? "selected" : "" ?>>Desgaste Regular</option></select></td>
                                                        <td><select name="r49_8" class="form-control"><option value="alta" <?= $checklistTecnico->rt49_8 == "alta" ? "selected" : "" ?>>Alta</option><option value="media" <?= $checklistTecnico->rt49_8 == "media" ? "selected" : "" ?>>Media</option><option value="baja" <?= $checklistTecnico->rt49_8 == "baja" ? "selected" : "" ?>>Baja</option></select></td>
                                                    </tr>
                                                    <?php } ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th>KM. SALIDA</th>
                                                <th>KM. Proximo Servicio</th>
                                            </tr>
                                            <tr>
                                                <td><input type="number" class="form-control" name="kmsalida" value="<?= $detalleChecklist[0]['km_salida'] ?>" placeholder="KM Salida"></td>
                                                <td><input type="number" class="form-control" name="kmservicio" placeholder="KM Proximo Servicio" value="<?= $detalle[0]->km_servicio ?>" readonly></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="text-align: center;">REVISA/REALIZA TECNICO</th>
                                                <th scope="row" style="text-align: center;">SERVICIO DE TALLER EXTERNO</th>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;"><textarea rows="5" name="revisa_tecnico" class="form-control" placeholder="Revisa/Realiza Tecnico"><?= $detalleChecklist[0]['revisa_realiza_tecnico'] ?></textarea></td>
                                                <td style="text-align: center;"><textarea rows="5" name="servicio_solicitado" class="form-control" placeholder="Servicio Solicitado"><?= $detalleChecklist[0]['servicio_solicitado'] ?></textarea></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="text-align: center;">REFACCIONES UTILIZADAS</th>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="text-align: center;"><textarea rows="4" cols="7" name="r50" class="form-control" placeholder="REFACIONES UTILIZADAS"><?= $checklistTecnico->rt50 ?></textarea></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="text-align: center;">PENDIENTES A REALIZAR (PROGRAMACIÓN)</th>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="text-align: center;"><textarea rows="4" cols="7" name="r51" class="form-control" placeholder="PENDIENTES A REALIZAR"><?= $checklistTecnico->rt51 ?></textarea></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table table-sm" width="100%">
                                                <tr>
                                                    <td>
                                                        <center>
                                                            <div id="auto_comparacion7">
                                                                <img id='img_comp7' src="<?= base_url().$imagenesChecklistTecnico->imagen7 ?>">
                                                            </div>
                                                        </center>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="text-align: center;">FIRMA TÉCNICO</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <center>
                                                            <div id="auto_comparacion8">
                                                                <img id='img_comp8' src="<?= base_url().$imagenesChecklistTecnico->imagen8 ?>">
                                                            </div>
                                                        </center>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="text-align: center;">VO.BO. CONTROL VEHICULAR</th>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <input type="hidden" name="uid_servicio" id="uid_servicio" value="<?php echo $detalle[0]->uid ?>">
                                    <input type="hidden" name="uid_usuario"
                                        value="<?php echo $detalle[0]->uid_operador ?>">
                                    <input type="hidden" name="kilometraje" value="<?= $detalle[0]->kilometraje ?>">
                                    <input type="hidden" name="idtbl_catalogo" value="<?= $detalle[0]->idtbl_catalogo ?>">
                                    <input type="hidden" id="iddtl_almacen" name="iddtl_almacen"
                                        value="<?php echo $detalle[0]->iddtl_almacen ?>">
                                    <input type="hidden" name="servicio" id="servicio" value="<?= $detalle[0]->iddtl_servicio ?>">
                                    <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <?php if($detalle[0]->estatus != 'FINALIZADO'){ ?>
                                    <input type="submit" class="btn btn-primary" value="Guardar">-->
                                    <?php } ?>
                                </div>
                                <?=form_close()?>

                            </div>
                            <?php } ?>
                            <!-- /Si el checklistTecnico ya existe -->
        </div>
    </div>
</div>