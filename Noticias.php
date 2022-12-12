<?php require_once('Templates/header.php');?>
<style>
a:hover {
  color: orange;
}
</style>
<style>*{padding:0;margin:0;}body{font-size:18px;background-color:#CCC;}.float{position:fixed;width:60px;height:60px;bottom:40px;right:40px; background-color: rgb(0, 204, 255);color:#FFF;border-radius:50px;text-align:center;}.my-float{margin-top: 15px;}.hr-custom{color: red;height: 3px;}img{max-width: 100%;}</style> <title>Nuevas noticias ODC CBTis 65</title><section class="bg-dark"> <h2 class="card-title text-center text-white">NOTICIAS DE LA PÁGINA ODCS</h2> <div class="row no-gutters justify-content-center" id="container"> </div></section> <?php require_once('Templates/footer.php'); ?> <button class="float" id="actualiza"> <i class="fas fa-sync my-float"></i></button> <script src="config/core/ajax.controller/ajax.controller.notices.js"></script>