<?=$this->extend('layouts/template')?>

<?=$this->section('titulo')?>
    Login
<?=$this->endsection()?>

<?=$this->section('content')  ?>
    <h3 class="text-center mt-5 mb-3">Usuario</h3>
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
                <form action="<?=base_url(route_to('usuarios/validar_login'))?>" method="POST">
                    <?= csrf_field(); ?>
                    <?php  if(!empty(session()->getFlashdata('fail'))) :    ?>
                        <div class="alert alert-danger" role="alert"><?= session()->getFlashdata('fail');  ?></div>
                    <?php endif ?>
                    <div class="mb-3">
                        <label class="form-label">Usuario</label>
                        <input type="text" name="usuario" class="form-control" placeholder="usuario o email" maxlength="12" value="<?=set_value('usuario')?>">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'usuario'): '' ?></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="clave">Clave</label>
                        <input type="password" name="clave" class="form-control" maxlength="10" placeholder="contraseña">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'clave'): '' ?></span>
                    </div>
                    <button type="submit" class="btn btn-secondary form-control">Entrar</button>
                </form>
                <a href="<?=base_url().route_to('usuarios/registrarse')?>" class="btn btn-secondary form-control my-3">Registrarse</a>
                <a href="" class="btn btn-secondary form-control">Restablecer Contraseña</a>
            </div>
        </div>
    </div>
<?=$this->endSection() ?>