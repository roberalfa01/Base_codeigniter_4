<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?=$this->renderSection('titulo')?></title>
        <link rel="stylesheet" href="<?=base_url('/public/css/bootstrap.min.css')?>">
    </head>
    <body>
        <!-- cuerpo variable de otras vistas -->
        <?= $this->include('layouts/menu')  ?>
        <?= $this->renderSection('content') ?>
        <?= $this->include('layouts/footer')  ?>

        <script src="<?=base_url('/public/js/bootstrap.min.js')?>"></script>
    </body>
</html>