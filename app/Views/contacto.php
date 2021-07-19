<?=$this->extend('layouts/template')?>

<?=$this->section('titulo')?>
    Contacto
<?=$this->endsection()?>

<?=$this->section('content')?>

<h3 class="text-center mt-5 mb-3">Contactanos</h3>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-xl-4 bg-light p-5">
                <?php 
                    if(session('msg')){?>
                        <div class="alert alert-<?=session('msg.type')?>" role="alert">
                            <?php   
                                echo session('msg.body');
                            ?>
                        </div>
                <?php
                    }
                ?>
        
                <form action="<?=base_url(route_to('contacto_validar'))?>" method="POST">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="correo" class="form-control" value="<?=old('correo')?>" maxlength="100">
                        <span class="text-danger"><?=session('errors.correo')?></span>  
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="<?=old('nombre')?>" maxlength="30">
                        <span class="text-danger"><?=session('errors.nombre')?></span>  
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mensaje</label>
                        <textarea name="mensaje" class="form-control"  rows="10"><?=old('mensaje')?></textarea>
                        <span class="text-danger"><?=session('errors.mensaje')?></span>  
                    </div>
                    <button type="submit" class="btn btn-secondary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
<?=$this->endsection()?>