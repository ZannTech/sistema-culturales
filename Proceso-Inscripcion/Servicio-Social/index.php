<?php
header("Refresh: 610; URL='./'");
require_once('../Templates/header.registros.php');
require_once('../../config/core/const/talleres-fetch.php');
?>
<title>Servicio social ODC CBTis 65</title>
<div class="row no-gutters">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">Registro al servicio social</h4>
                <form method="post" id="frm-servicio" enctype="multipart/form-data">
                    <h3 class="text-center">Pre-registro a la convocatoria de servicio social</h3>
                    <div class="row jumbotron">
                    <div class="col-sm-12 form-group">
                                        <label for="icontrol">Numero de control</label>
                                        <input type="number" class="form-control" name="icontrol" id="icontrol"
                                            placeholder="Introduce tu numero de control" >
                                    </div>
                                    
                                    <div class="col-sm-4 form-group">
                                        <label for="icontraseña">Contraseña</label>
                                        <input type="password" class="form-control" name="icontraseña" id="icontraseña"
                                            placeholder="Introduce tu contraseña."  autocomplete="off">
                                    </div>

                                    <div class="col-sm-4 form-group">
                                        <label for="inombre">Nombre</label>
                                        <input type="text" class="form-control" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" name="inombre" id="inombre"
                                            placeholder="Introduce tu nombre.">
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label for="iap">Apellido Paterno</label>
                                        <input type="text" class="form-control"  pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,64}" name="iap" id="iap" 
                                            placeholder="Introduce tu apellido paterno." >
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label for="iam">Apellido Materno</label>
                                        <input type="text" class="form-control"  pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,64}" name="iam" id="iam"
                                            placeholder="Introduce tu apellido materno.">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="icurp">Curp</label>
                                        <input type="text" class="form-control"  name="icurp" id="icurp"
                                            placeholder="Ingrese su curp." >
                                        
                                      
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="igrado">Grado</label>
                                        <select class="form-control custom-select browser-default" id="igrado"
                                            name="igrado">
                                            <option value="">Selecciona tu grado</option>
                                            <option value="3">3ro</option>
                                            <option value="4">4to</option>
                                            <option value="5">5to</option>
                                            <option value="6">6to</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="igrupo">Grupo</label>
                                        <select class="form-control custom-select browser-default" name="igrupo"
                                            id="igrupo">
                                            <option value="">Selecciona tu grupo</option>
                                            <option value="ARAM">ARAM</option>
                                            <option value="ARBM">ARBM</option>
                                            <option value="ARAV">ARAV</option>
                                            <option value="ARBV">ARBV</option>
                                            <option value="COAM">COAM</option> 
                                            <option value="COBM">COBM</option>
                                            <option value="COAV">COAV</option>
                                            <option value="LCAM">LCAM</option>
                                            <option value="LCBM">LCBM</option>
                                            <option value="LCAV">LCAV</option>
                                            <option value="LCBV">LCBV</option>
                                            <option value="MIAM">MIAM</option>
                                            <option value="MIBM">MIBM</option>
                                            <option value="MIAV">MIAV</option>
                                            <option value="MIBV">MIBV</option>
                                            <option value="PRAM">PRAM</option>
                                            <option value="PRBM">PRBM</option>
                                            <option value="PRAV">PRAV</option>
                                            <option value="PRBV">PRBV</option>
                                            <option value="PRCV">PRCV</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="italler">Taller</label>
                                        <select class="form-control custom-select browser-default" name="italler"
                                            id="italler">
                                            <?php
                                    foreach (TALLERES as $taller){
                                        echo '<option value='.$taller.'>'.$taller.'</option>';
                                    }
                                ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="igen">Género</label>
                                        <select id="igen" class="form-control browser-default custom-select"
                                            placeholder="Género" name="igen">
                                            <option value="">Selecciona tu género</option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="ifecha">Fecha de nacimiento</label>
                                        <input type="Date" name="ifecha" class="form-control" id="ifecha" placeholder="Ingresa tu fecha de nacimiento">
                                    </div>
                                    <div class="col-sm-4 form-group" style="display: none;">
                                    <label for="country">País</label>
                                        <select id="country" name="country" class="form-control" type="hidden">
                                            <option value="MX">Mexico</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label for="postcode">Codigo Postal</label>
                                        <input type="number" id="postcode" onblur="postalCodeLookup();" name="postcode"
                                            class="form-control" placeholder="Introduce tu código postal." pattern="^[0-9]+$">
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label for="icalle">Direccion (Calle)</label>
                                        <input type="address" class="form-control" id="icalle"
                                            name="icalle"  pattern="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$" placeholder="Introduce la calle en donde vives."
                                            >
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label for="inumcasa">Direccion (Número)</label>
                                        <input type="number" class="form-control" id="inumcasa"
                                            name="inumcasa" placeholder="Introduce el N.Int de tu domicilio."
                                            >
                                    </div>
                                    <!--Separator-->
                                    <div class="col-sm-4 form-group">
                                        <label for="city">Colonia</label>
                                        <input type="text" id="city" onblur="closeSuggestBox();"
                                            onfocus="postalCodeLookup();" name="city" class="form-control" placeholder="Seleccione su colonia." readonly>
                                        <div id="suggestBoxElement"
                                            style="position: absolute; width: 300px; top: 68px; left: 20px; z-index:25; visibility: hidden;">
                                        </div>
                                    </div>
                                <div class="col-sm-4 form-group">
                                    <label for="itel">Número de contacto <b>(Con lada)</b></label>
                                    <input type="number" name="itel" class="form-control" id="itel"
                                        placeholder="Introduce un número de contacto." >
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="iemail">Email</label>
                                    <input type="email" name="iemail" class="form-control" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" id="iemail"
                                        placeholder="Introduce tu email." >
                                </div>   
                                <div class="col-sm-4 form-group">
                                    <label for="ifotografia">Fotografía formal en tamaño infantil (Fondo Blanco,
                                        Camisa Blanca)</label>
                                    <input type="file" name="ifotografia" class="form-control" id="ifotografia"
                                    accept="image/jpeg, image/jpg">
                                </div>
                                <div class="col-sm-12 form-group mb-0">
                                    <button class="btn btn-primary float-right" id="verificar"
                                        name="verificar">Registrarme!</button>
                                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<?php
require_once('../Templates/footer.registros.php');
?>