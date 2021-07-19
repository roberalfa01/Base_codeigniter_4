<?=$this->extend('layouts/template')?>

<?=$this->section('titulo')?>
    Registrarse
<?=$this->endsection()?>

<?=$this->section('content')?>

<h3 class="text-center mt-5 mb-3">Registrarse</h3>
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
        
                <form action="<?=base_url(route_to('usuarios/grabar_usuario'))?>" method="POST">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label class="form-label">Usuario</label>
                        <input type="text" name="usuario" class="form-control" value="<?=old('usuario')?>" maxlength="12"> 
                        <span class="text-danger"><?=session('errors.usuario')?></span>  
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="correo" class="form-control" value="<?=old('correo')?>" maxlength="100">
                        <span class="text-danger"><?=session('errors.correo')?></span>  
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="clave" class="form-control" value="<?=old('clave')?>" maxlength="10">
                        <span class="text-danger"><?=session('errors.clave')?></span>  
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirme Password</label>
                        <input type="password" name="clave1" class="form-control" value="<?=old('clave1')?>" maxlength="10">
                        <span class="text-danger"><?=session('errors.clave1')?></span>  
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="<?=old('nombre')?>">
                        <span class="text-danger"><?=session('errors.nombre')?></span>  
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Teléfono</label>
                        <input type="text" name="telefono" class="form-control" value="<?=old('telefono')?>">
                        <span class="text-danger"><?=session('errors.telefono')?></span>  
                    </div>
                    <button type="submit" class="btn btn-secondary">Grabar</button>
                </form>
            </div>
        </div>
    </div>
<?=$this->endsection()?>