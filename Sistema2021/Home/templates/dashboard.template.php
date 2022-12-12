<?php

    if($_SESSION['tipo-rol'] == "Administrador"){

        ?>

            <!-- Heading -->

            <div class="sidebar-heading">

                <!--Solo de administrador-->

                Alumnos y trámites

            </div>



            <!-- Nav Item - Pages Collapse Menu -->

            <li class="nav-item">

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"

                    aria-expanded="true" aria-controls="collapseTwo">

                    <i class="fas fa-fingerprint"></i>

                    <span>Asistencias</span>

                </a>

                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

                    <div class="bg-white py-2 collapse-inner rounded">

                        <h6 class="collapse-header">Asistencias</h6>

                        <a class="collapse-item" href="../../Sistema_Asistencias/" target="_blank">Sistema de Asistencias</a>

                    </div>

                </div>

            </li>



            <!-- Nav Item - Utilities Collapse Menu -->

            <li class="nav-item">

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"

                    aria-expanded="true" aria-controls="collapseUtilities">

                    <i class="fas fa-file-alt"></i>

                    <span>Trámites</span>

                </a>

                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"

                    data-parent="#accordionSidebar">

                    <div class="bg-white py-2 collapse-inner rounded">

                        <h6 class="collapse-header">Registros pendientes:</h6>

                        <a class="collapse-item" href="Pre-Servicio">Servicio Social</a>

                        <a class="collapse-item" href="Pre-registros">Taller Cultural <br>y Clubs deportivos</a>

                    </div>

                </div>

            </li>

            <li class="nav-item">

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"

                    aria-expanded="true" aria-controls="collapseThree">

                    <i class="fas fa-archive"></i>

                    <span>Grupos</span>

                </a>

                <div id="collapseThree" class="collapse" aria-labelledby="headingUtilities"

                    data-parent="#accordionSidebar">

                    <div class="bg-white py-2 collapse-inner rounded">

                        <h6 class="collapse-header">Mis grupos:</h6>

                        <a class="collapse-item" href="Listas?user=alumno">Listas de alumnos</a>

                        <a class="collapse-item" href="Listas?user=servicio">Listas de encargados</a>

                    </div>

                </div>

            </li>

            <li class="nav-item">

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"

                    aria-expanded="true" aria-controls="collapseFour">

                    <i class="fas fa-newspaper"></i>

                    <span>Página</span>

                </a>

                <div id="collapseFour" class="collapse" aria-labelledby="headingUtilities"

                    data-parent="#accordionSidebar">

                    <div class="bg-white py-2 collapse-inner rounded">

                        <h6 class="collapse-header">Noticias y FAQ´s</h6>

                        <a class="collapse-item" href="NewPost">Publicar noticia</a>

                        <a class="collapse-item" href="Comentarios">Leer FAQ´s</a>

                        <a class="collapse-item" href="ManagePosts">Administrar Noticias</a>

                        <a class="collapse-item" href="ListEvidences">Evidencias</a>

                    </div>

                </div>

            </li>



        <?php

    }else{

        if($_SESSION['tipo-rol']=="Encargado"){

            ?>

            <li class="nav-item">

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"

                    aria-expanded="true" aria-controls="collapseThree">

                    <i class="fas fa-archive"></i>

                    <span>Mi salon de clase</span>

                </a>

                <div id="collapseThree" class="collapse" aria-labelledby="headingUtilities"

                    data-parent="#accordionSidebar">

                    <div class="bg-white py-2 collapse-inner rounded">

                        <h6 class="collapse-header">Salón de clase:</h6>

                        <a class="collapse-item" href="../../Sistema_Asistencias/" target="_blank">Sistema de Asistencias</a>

                        <a class="collapse-item" href="MiSalon">Imprimir Listas</a>
						
						 <a class="collapse-item" href="Evidencias">Subir evidencias</a>

                         <a class="collapse-item" href="MisEvidencias">Listado de evidencias</a>
						
						

                    </div>

                </div>

            </li>

            <li class="nav-item">

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProfile"

                    aria-expanded="true" aria-controls="collapseProfile">

                    <i class="fas fa-archive"></i>

                    <span>Mis avances</span>

                </a>

                <div id="collapseProfile" class="collapse" aria-labelledby="headingUtilities"

                    data-parent="#accordionSidebar">

                    <div class="bg-white py-2 collapse-inner rounded">

                        <h6 class="collapse-header">Mi avance:</h6>

                        <a class="collapse-item" href="Asistencia?view-data=<?php echo $_SESSION['tipo-rol']?>&id=<?php echo $_SESSION['id'];?>">Resumen de asistencias</a>

                    </div>

                </div>

            </li>

            <?php

        }else{

            if($_SESSION['tipo-rol'] == "Alumno"){

                ?>

             <li class="nav-item">

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"

                    aria-expanded="true" aria-controls="collapseThree">

                    <i class="fas fa-archive"></i>

                    <span>Mi salon de clase</span>

                </a>

                <div id="collapseThree" class="collapse" aria-labelledby="headingUtilities"

                    data-parent="#accordionSidebar">

                    <div class="bg-white py-2 collapse-inner rounded">

                        <h6 class="collapse-header">Mis compañeros de clase:</h6>

                        <a class="collapse-item" href="MiSalon">Mis compañeros</a>

                    </div>

                </div>

            </li>  

            <li class="nav-item">

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProfile"

                    aria-expanded="true" aria-controls="collapseProfile">

                    <i class="fas fa-archive"></i>

                    <span>Mis avances</span>

                </a>

                <div id="collapseProfile" class="collapse" aria-labelledby="headingUtilities"

                    data-parent="#accordionSidebar">

                    <div class="bg-white py-2 collapse-inner rounded">

                        <h6 class="collapse-header">Mi avance:</h6>

                        <a class="collapse-item" href="Asistencia?view-data=<?php echo $_SESSION['tipo-rol']?>&id=<?php echo $_SESSION['id'];?>">Resumen de asistencias</a>

                    </div>

                </div>

            </li>

                <?php

            }

        }

    }?>

        <!-- Sidebar Toggler (Sidebar) -->

        <div class="text-center d-none d-md-inline">

                <button class="rounded-circle border-0" id="sidebarToggle"></button>

            </div>

    <?php

    

?>