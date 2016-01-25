<!DOCTYPE html>
<html>    
    <head>     
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            
        <title>wEstoque</title>
        
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    
        <!-- Morris -->
        <link href="<?php echo base_url(); ?>assets/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    
        <!-- Gritter -->
        <link href="<?php echo base_url(); ?>assets/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">    
        <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
        
        <!-- kendoui -->        
        <link href="<?php echo base_url(); ?>assets/styles/kendo.dataviz.default.min.css" rel="stylesheet">      
        <link href="<?php echo base_url(); ?>assets/styles/kendo.dataviz.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/styles/kendo.default.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/styles/kendo.common.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/styles/kendo.common-material.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/styles/kendo.dataviz.material.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/styles/kendo.material.min.css" rel="stylesheet"> 
                
    </head>

    <body>
        <div id="wrapper">
            <nav class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="nav-header">
                            <div class="dropdown profile-element"> <span>
                                <!-- <img alt="image" class="img-circle" src="img/profile_small.jpg" /> -->
                                 </span>
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"></strong>                             
                                </span> <span class="text-muted text-xs block"> <?php echo $this->session->userdata('logged_in')['usuario']; ?><b class="caret"></b></span> </span> </a>
                                <ul class="dropdown-menu animated fadeInRight m-t-xs"> 
                                    <li><a href="profile.html">Editar</a></li>                                   
                                    <li class="divider"></li>
                                    <li><a href="<?php echo base_url(); ?>home/logout">Logout</a></li>
                                </ul>
                            </div>
                            <div class="logo-element">
                                W+
                            </div>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>home"><i class="fa fa-th-large"></i> <span class="nav-label">Painel</span></a>                        
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Usuário</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="<?php echo base_url(); ?>usuario/adicionar">Adicionar</a></li>                                                              
                                <li><a href="<?php echo base_url(); ?>usuario/listar">Listar</a></li>                           
                            </ul>
                        </li>
                        <li>                 
                            <a href="#"><i class="fa fa-truck"></i> <span class="nav-label">Fornecedor</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="<?php echo base_url(); ?>fornecedor/adicionar">Adicionar</a></li>
                                <li><a href="<?php echo base_url(); ?>fornecedor/listar">Listar</a></li>                           
                            </ul>                     
                        </li>                  
                        
                        <li>
                            <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Produtos </span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#"><i class="fa fa-car"></i>Categoria <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="<?php echo base_url(); ?>categoria/adicionar">Adicionar</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>categoria/listar">Listar</a>
                                        </li>  
                                    </ul>
                                </li>                         
                                
                                <li>
                                    <a href="#"><i class="fa fa-shopping-cart"></i>Produto <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                       <li>
                                            <a href="<?php echo base_url(); ?>produto/adicionar">Adicionar</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>produto/listar">Listar</a>
                                        </li> 
                                    </ul>
                                </li>                            
                            </ul>
                        </li>  
                        
                        <li>                 
                            <a href="#"><i class="fa fa-sign-in"></i> <span class="nav-label">Entrada</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="graph_flot.html">Adicionar</a></li>
                                <li><a href="graph_morris.html">Listar</a></li>                           
                            </ul>                     
                        </li>
                        <li>                 
                            <a href="#"><i class="fa fa-sign-out"></i> <span class="nav-label">Saida</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="graph_flot.html">Adicionar</a></li>
                                <li><a href="graph_morris.html">Listar</a></li>                           
                            </ul>                     
                        </li>                                          
                        <li>                 
                            <a href="#"><i class="fa fa-cubes"></i> <span class="nav-label">Estoque</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">                                
                                <li><a href="graph_morris.html">Listar</a></li>                           
                            </ul>                     
                        </li>                       
                    </ul>
                </div>
            </nav>
    
            <div id="page-wrapper" class="gray-bg dashbard-1">
                <div class="row border-bottom">
                    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                         <div class="navbar-header">
                            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                            <form role="search" class="navbar-form-custom" method="post" action="search_results.html">
                                <div class="form-group">
                                    <input type="text" placeholder="Pesquisar" class="form-control" name="top-search" id="top-search">
                                </div>
                            </form>
                         </div>
                        <ul class="nav navbar-top-links navbar-right">
                            <li>
                                <a href="<?php echo base_url(); ?>home" class="m-r-sm text-muted welcome-message">wEstoque</a>
                            </li>                          
                            <li>
                                <a href="<?php echo base_url(); ?>home/logout">
                                    <i class="fa fa-sign-out"></i> Sair
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                
                <div class="row">
                    <div class="col-lg-12">
                        <?php                       
                            $controller = $this->uri->segment(1);
                            $view = $this->uri->segment(2);
        
                            if($controller == 'home'){
                                $this->load->view('painel/painel'); 
                            }else{
                                $this->load->view($controller.'/'.$view);                                 
                            }                            
                          ?>                                     
                    </div>                    
                    <div class="footer">
                        <div class="pull-right">
                          <strong>wEstoque</strong>
                        </div>
                        <div>
                            <a href="http://wfuturo.com/">wfuturo.com</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Mainly scripts -->
        <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script> 
    
        <!-- Flot -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.spline.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.resize.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.pie.js"></script>
    
        <!-- Peity -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/peity/jquery.peity.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/demo/peity-demo.js"></script>
    
        <!-- Custom and plugin javascript -->
        <script src="<?php echo base_url(); ?>assets/js/inspinia.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/pace/pace.min.js"></script>
    
        <!-- jQuery UI -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/jquery-ui/jquery-ui.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/jquery-ui/jquery-ui.css"></script>
    
        <!-- GITTER -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/gritter/jquery.gritter.min.js"></script>
    
        <!-- EayPIE -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/easypiechart/jquery.easypiechart.js"></script>
    
        <!-- Sparkline -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/sparkline/jquery.sparkline.min.js"></script>
    
        <!-- Sparkline demo data  -->
        <script src="<?php echo base_url(); ?>assets/js/demo/sparkline-demo.js"></script>
    
        <!-- ChartJS-->
        <script src="<?php echo base_url(); ?>assets/js/plugins/chartJs/Chart.min.js"></script>    

        <!-- CNPJ -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.maskedinput.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/fornecedor.js"></script>
        
        <!-- DATAPICKER -->
        <script src="<?php echo base_url(); ?>assets/js/produto.js"></script>
        
        <!-- kendoui -->
        <script src="<?php echo base_url(); ?>assets/js/kendoui/kendo.all.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/kendoui/cultures/kendo.culture.pt-BR.min.js"></script>       
        <script src="<?php echo base_url(); ?>assets/js/kendoui/kendo.datepicker.min.js"></script>  
        
    </body>
</html>
