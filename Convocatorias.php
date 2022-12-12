<?php
    require_once('Templates/header.php');
?>
<title>Convocatorias ODC CBTis 65</title>

<!--Body-->
<section class="bg-light">
    <div class="row no-gutters">
        <div class="col-lg-12">
            <h2 class="text-center">
                ¡Registrate a la convocatoria de talleres culturales!
            </h2>
            <p class="text-center lead">
                (Convocatorias abiertas desde el 21/08/2021 Hasta el 01/10/2021)
            </p>
        </div>
    </div>
</section>
<!--Start the card-->
<section class="bg-light-grey">
    <div class="container">
        <h2>Requisitos para el registro</h2>
        <p class="text-muted lead">
            Para poder hacer tu registro a la convocatoria de talleres, es necesario que tengas a la mano los
            siguientes papeles en PDF:
        </p>
        <div class="row">
            <div class="col-md-6">
                <div class="card border-0 mb-4 bg-dark">
                    <div class="card-body p-5">
                        <h3><span class="badge badge-secondary bg-gold text-dark mb-2">REQUISITOS</span></h3>
                        <p class="text-white">Independientemente el taller debes tener los siguientes documentos<br>
                        </p>
                        <h3 class="text-white">Documentos escaneados en <b>PDF</b></h3>
                        <ul class="list-unstyled mb-5 text-white">
                            <li><i class="icon ion-md-checkmark-circle"></i> Acta de nacimiento
                            </li>
                            <li><i class="icon ion-md-checkmark-circle"></i> Certificado médico</li>
                            <li><i class="icon ion-md-checkmark-circle"></i> Carta compromiso</li>

                            <li><i class="icon ion-md-checkmark-circle"></i> Ademas se necesita: <br> Una foto
                                tuya en formato <b>jpg o jpeg (NO PNG)</b></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border-0 mb-4">
                    <img class="card-img-top"
                        src="https://www.mexicoescultura.com/galerias/actividades/principal/talleres_900.png"
                        alt="Card image cap">
                    <div class="card-body p-5">
                        <h3><span class="badge badge-secondary bg-dark text-white mb-2">TALLERES CULTURALES</span>
                        </h3>
                        <p>Los Talleres Culturales son una opción para el aprovechamiento del
                            tiempo libre de los(as) estudiantes y de la comunidad en
                            general, los cuales incursionan en el arte, el deporte y el desarrollo humano por medio
                            de diversas disciplinas.
                        </p>
                        <h3>¿Comenzar tu registro ahora?</h3>
                        <button class="btn btn-secondary" id="btnTaller">Registrarme!</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 mb-4">
                    <img class="card-img-top"
                        src="https://reflexion24informativo.com.mx/wp-content/uploads/2020/10/02-Acondicionamiento-mundet-1-768x512.jpg"
                        alt="Card image cap">


                    <div class="card-body p-5">
                        <h3><span class="badge badge-secondary bg-dark text-white mb-2">CLUBS DEPORTIVOS</span></h3>
                        <p>
                            En la institución contamos con grupos femeniles y varoniles de clubs deportivos, puedes
                            ingresar a ellos si te gustan los deportes!
                        </p>
                        <p class=""><b>Importante: Se exige que no tienes que tener una enfermedad crónica para
                                entrar a estos clubs.</b></p>
                        <button class="btn btn-secondary" id="btnCLub">Registrarme</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 mb-4">
                    <img class="card-img-top" src="https://www.gob.mx/cms/uploads/document/main_image/79814/SS.jpg"
                        alt="Card image cap">
                    <div class="card-body p-5 bg-dark">
                        <h3><span class="badge badge-secondary bg-gold text-dark mb-2">SERVICIO SOCIAL</span></h3>
                        <p class="text-white">El Servicio Social es la actividad profesional a través de cuya
                            práctica, el universitario participa en la sociedad, identificando problemáticas y
                            coadyuvando a su solución.
                        </p>
                        <h3 class="text-white">¿Quieres comenzar tu registro?</h3>
                        <button class="btn btn-primary" id="btnServ">Registrarme</button>
                    </div>
                </div>
            </div>
            <!--end of the card-->
</section>
<section class="bg-white">
    <div class="row no-gutters">
        <div class="col-lg-6 offset-3">
            <h2 class="text-center">
                Reglas generales
            </h2>
            <p class="text-center">
            <ul class="list-unstyled mb-5 offset-2">
                <li><i class="icon ion-md-checkmark-circle"></i> Debes cumplir x Horas, y por cada asistencia se te
                    suman 4 hrs.
                <li><i class="icon ion-md-checkmark-circle"></i> Subir tu evidencia
                <li><i class="icon ion-md-checkmark-circle"></i> NO perder ni prestar tu cuenta
            </ul>
            </p>
        </div>
    </div>
</section>
<!--End Body-->


<?php
    require_once('Templates/footer.php');
 ?>
 
 <script type="text/javascript">
$("#btnServ").on("click", function() {
   alerta("Cargando...","Abriendo la página por favor espere....");
   setTimeout(function (){
    window.location.replace("Proceso-Inscripcion/Servicio-Social/");
   }, 2000);
});
$("#btnCLub").on("click", function() {
   alerta("Cargando...","Abriendo la página por favor espere....");
   setTimeout(function (){
    window.location.replace("Proceso-Inscripcion/Culturales/");
   }, 2000);
});
$("#btnTaller").on("click", function() {
   alerta("Cargando...","Abriendo la página por favor espere....");
   setTimeout(function (){
    window.location.replace("Proceso-Inscripcion/Culturales/");
   }, 2000);
});
function alerta(Title ,Message) {
    let timerInterval
    Swal.fire({
        title: Title,
        html: Message,
        timer: 1500,
        timerProgressBar: true,
        allowEscapeKey : false,
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading()
            timerInterval = setInterval(() => {
                const content = Swal.getContent()
                if (content) {
                    const b = content.querySelector('b')
                    if (b) {
                        b.textContent = Swal.getTimerLeft()
                    }
                }
            }, 100)
        },
        willClose: () => {
            clearInterval(timerInterval)
        }
    })
}
    </script>