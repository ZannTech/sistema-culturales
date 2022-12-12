<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="SERVICIO SOCIAL Y TALLERES CULTURALES CBTIS 65  IRAPUATO, GTO." />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&family=Roboto+Condensed:wght@300;400&display=swap"
        rel="stylesheet">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../../Assets/images/cb.png">
    <link rel="stylesheet" href="../../Assets/css/app.css">
    <script type="text/javascript" src="../../config/core/api/city_ajax.js"></script>
    <script type="text/javascript" src="../../config/core/api/geonamesData.js"></script>
    <script type="text/javascript" src="../../config/core/api/jsr_class.js"></script>
</head>
<style>
    #suggestBoxElement {
        border: 1px solid #1E90FF;
        visibility: hidden;
        text-align: left;
        white-space: nowrap;
        background-color: #ffffff;
    }
    input:read-only { background: #ffffff !important; }

    .suggestions {
        font-size: 14;
        background-color: #ffffff;
    }

    .suggestionMouseOver {
        font-size: 14;
        background: #1E90FF;
        color: white;
    }
    .ip-file {
        height: 60px;
    }
    </style>
<div id="loader">
		<div class="spinner">
			<div class="rect1"></div>
			<div class="rect2"></div>
			<div class="rect3"></div>
			<div class="rect4"></div>
			<div class="rect5"></div>
		</div>
</div>
<body>
    <!--Pantalla de carga-->
    <div id="contenedor_carga">
        <div id="carga">
        </div>
    </div>
    <nav class="navbar navbar-expand-lg bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="../../"">DIFUSION CULTURAL Y DEPORTIVO</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="icon ion-md-funnel color-white"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                    <h3><span class="badge badge-secondary bg-dark text-white mb-2">El registro expira en:</span><span id="count" class="badge badge-secondary bg-dark text-white mb-2">10:00</span>
                    </li>
                  
                </ul>
            </div>
        </div>
    </nav>