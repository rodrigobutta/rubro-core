<footer class="main-footer">
    <div class="container">
        <div class="main-footer__col main-footer__col--logo">
            <img src="../images/footer-logo.svg" alt="">
            <img src="../images/data-fiscal.jpg" class="main-footer__data-fiscal hidden-md" alt="Data Fiscal">
            <img src="../images/defensa-al-consumidor.jpg" class="main-footer__defensa-consumidor hidden-md" alt="Defensa al consumidor">
        </div>

        <div class="main-footer__col main-footer__col--contact">
            <h5 class="main-footer__text bold">Contacto</h5>

            <div class="main-footer__text">
                {!! $footer_contacto !!}
            </div>
        </div>

        <div class="main-footer__col main-footer__col--links">
            <a href="{{$footer_item1_link}}" class="main-footer__text bold">{{$footer_item1_text}}</a>
            <a href="{{$footer_item2_link}}" class="main-footer__text bold">{{$footer_item2_text}}</a>
            <a href="{{$footer_item3_link}}" class="main-footer__text bold">{{$footer_item3_text}}</a>
        </div>

        <div class="main-footer__col main-footer__col--community visible-md">

            <div class="main-footer__column">
                <div class="main-footer__social">
                    <p><strong class="bold small">Seguinos en</strong></p>
                    <a href="https://www.facebook.com/pages/Consejo-Profesional-de-Ciencias-Econ%C3%B3micas-CABA/120113161403761" target="_blank"><i class="icon icon-facebook"></i></a>
                    <a href="https://twitter.com/#!/ConsejoCABA" target="_blank"><i class="icon icon-twitter"></i></a>
                    <a href="https://www.youtube.com/channel/UClxcBE0D2idSr0Nzxp96MSw/playlists?view=1&flow=grid&sort=la" target="_blank"><i class="icon icon-youtube"></i></a>
                    <a href="https://www.linkedin.com/company/consejo-profesional-de-ciencias-econ-micas-de-la-ciudad-aut-noma-de-buenos-aires/" target="_blank"><i class="icon icon-linkedin"></i></i></a>
                </div>
                <a href="http://defensadelconsumidor.buenosaires.gov.ar/" target="_blank">
                    <img src="../images/defensa-al-consumidor.jpg" class="main-footer__defensa-consumidor" alt="Defensa al consumidor">
                </a>
            </div>

            <a href="http://qr.afip.gob.ar/?qr=vYsE3JgIO4iAMmZf7uX1jg,," target="_F960AFIPInfo">
                <img src="../images/data-fiscal.jpg" class="main-footer__data-fiscal" alt="Data Fiscal">
            </a>

            <small class="main-footer__copy small">
                <strong class="bold">Copyright © 2018. Todos los derechos reservados.</strong> Prohibida su reproducción parcial o total sin la autorización del CPCECABA.
            </small>
        </div>
    </div>

    <div class="main-footer__community hidden-md">
        <div class="container">
            <small class="main-footer__copy small">
                <strong class="bold">Copyright © 2018. <span class="visible-md">Todos los derechos reservados.</span></strong> Prohibida su reproducción parcial o total sin la autorización del CPCECABA.
            </small>

            <div class="main-footer__social">
                <p><strong class="bold small">Seguinos en</strong></p>
                <a href="https://www.facebook.com/pages/Consejo-Profesional-de-Ciencias-Econ%C3%B3micas-CABA/120113161403761" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://twitter.com/#!/ConsejoCABA" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="https://www.youtube.com/channel/UClxcBE0D2idSr0Nzxp96MSw/playlists?view=1&flow=grid&sort=la" target="_blank"><i class="fab fa-youtube"></i></a>
                <a href="https://www.linkedin.com/company/consejo-profesional-de-ciencias-econ-micas-de-la-ciudad-aut-noma-de-buenos-aires/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>

</footer>
