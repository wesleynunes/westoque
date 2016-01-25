<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Westoque</title>
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    </head> 
    
    <body class="gray-bg">
        <div class="middle-box text-center loginscreen  animated fadeInDown">        
            <div>
                <div>
                    <h1 class="logo-name">wEstoque</h1>
                </div>
                
                <h3>Bem vindo</h3>           
                <p>Entre com seu usuario e senha</p>     
                            
                    <?php echo validation_errors(); ?> <!-- se a senha ou usuario errado seta mensagen de erro -->
                    <?php echo form_open('verificarlogin'); ?> <!-- encaminha para verificar senha e usuario -->    
                            
                <form class="m-t" role="form">      
                    <div class="form-group">
                        <input id="usuario" name="usuario" type="text" class="form-control" placeholder="Usuario" required>
                    </div>
                    <div class="form-group">
                        <input id="senhausuario" name="senhausuario" type="password" class="form-control" placeholder="Senha" required>
                    </div>
                    <button type="submit"  class="btn btn-primary block full-width m-b">Conectar</button>
                    <a href="#"><small>Esqueceu sua senha</small></a>                    
                </form>
                
                <p class="m-t"> <small>wfuturo.com</small> </p>
            </div>
        </div>
        <!-- Mainly scripts -->
        <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    </body>
</html>