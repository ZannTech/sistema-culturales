<style>
    .not-decoration {
        color: #ffffff;
    }
</style>
<footer class="bg-dark text-white py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ul class="list-inline"> <a href="https://www.instagram.com/gonedustx/" target="_blank" class="not-decoration">
                        <li class="list-inline-item lead mx-2"><i class="icon ion-logo-instagram"></i></li>
                    </a> <a href="https://twitter.com/CodeRandell" target="_blank" class="not-decoration">
                        <li class="list-inline-item lead mx-2"><i class="icon ion-logo-twitter"></i></li>
                    </a> <a href="https://www.facebook.com/gonedustx" target="_blank" class="not-decoration">
                        <li class="list-inline-item lead mx-2"><i class="icon ion-logo-facebook"></i></li>
                    </a> </ul>
            </div>
            <div class="col md-6 text-sm-right"> <small>Diseñado y programado por &copy;RC Advance</small> </div>
        </div>
    </div>
</footer>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.min.js"></script>
<script src="Assets/javascript/app.js"></script>
<script src="Assets/javascript/antcopy.js"></script>
<script src="Assets/javascript/logers.js"></script>
<script type="text/javascript">
    $("#gotocontact").on("click", function() {
        $('html, body').animate({
            scrollTop: $("#contact").offset().top
        }, 1000);
    });
    window.onload = function() {
        var contendedor = document.getElementById('contenedor_carga');
        contendedor.style.visibility = 'hidden';
        contendedor.style.opacity = '0';
    }
    const gotocontact = () => {
        $("#gotocontact").on("click", function() {
            $('html, body').animate({
                scrollTop: $("#contact").offset().top
            }, 1000);
        });
    }
</script>
<script src="../Assets/javascript/app.global.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>

</html>