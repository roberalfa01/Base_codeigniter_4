<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="">Company</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto me-auto">
                <a class="nav-link active me-2" href="<?=base_url('')?>">Inicio</a>
                <a class="nav-link active me-2" href="">Galeria</a>
                <a class="nav-link active me-2" href="<?=base_url(route_to('contacto'))?>">Contactanos</a>
                <?php if(session()->is_logged): ?>
                    <a class="nav-link active me-2" href="<?=site_url('usuarios/logout')?>">Salir</a>
                <?php else: ?>
                    <a class="nav-link active me-2" href="<?=base_url(route_to('usuarios/login'))?>">Ingresa</a>
                <?php endif ?>
        </div>
        </div>
    </div>
</nav>
<div class="container text-end p-1">
    <?php
        if(session()->is_logged){
            echo session()->get('username');
        }
    ?>
    
</div>