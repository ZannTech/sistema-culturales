<?php
session_start();
require_once('../../config/core/controller/controller.sesions.method.php');
require_once('../../config/core/libraries/getDate.php');
require_once('templates/header.php');
?>
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Configuración de perfil</h1>
    </div>
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Configurar perfil</h5>
                <p class="card-text">Aqui puedes modificar la contraseña y usuario de tu cuenta</p>

                <?php
                if ($_SESSION['tipo-rol'] == "Administrador") {
                ?>
                    <form method="post" id="frm-update-user">
                        <div class="form-group">
                            <input type="hidden" id="tipo-user" value="<?php echo $_SESSION['tipo-rol']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="user" placeholder="Ingrese el nuevo usuario">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" placeholder="Ingrese la contraseña">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="confirm-password" placeholder="Confirme la contraseña">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-block">Aceptar</button>
                        </div>

                    </form>
                <?php
                } else {
                ?>
                     <form method="post" id="frm-update-user">
                        <div class="form-group">
                            <input type="hidden" id="tipo-user" value="<?php echo $_SESSION['tipo-rol']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" placeholder="Ingrese la contraseña">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="confirm-password" placeholder="Confirme la contraseña">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-block">Aceptar</button>
                        </div>

                    </form>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
require_once('templates/footer.php');
?>
<script src="../../config/core/ajax.controller/ajax.controller.profile.js"></script>