<?php
use App\SintechsAlerts;
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="apple-touch-icon" href="/favicon.ico">
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="stylesheet" href="/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    
    <link rel="stylesheet" href="/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="/images/StufaAdmin.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="/images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="/dashboard"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Relatórios</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Climatização</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="/reports/humidity_temperature">Humidade & Temperatura</a></li>
                            <li><i class="fa fa-table"></i><a href="/reports/actuators">Atuadores</a></li>
                            <li><i class="fa fa-table"></i><a href="/reports/resources">Uso de Recursos</a></li>
                        </ul>
                    </li>

                    <h3 class="menu-title">Configurações</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon ti-settings"></i>Variáveis do Sistema</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon ti-hummer"></i><a href="/settings/actuators">Valores de Atuação</a></li>
                            <li><i class="menu-icon ti-alarm-clock"></i><a href="/settings/sample_rate">Tempo de Amostragem</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="widgets.html"> <i class="menu-icon ti-email"></i>Alertas</a>
                    </li>
                    
                    
                    
                    @role('sintechsadmin')
                    <h3 class="menu-title">Extras</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon ti-save"></i>Backup</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon ti-upload"></i><a href="/users_admin/">Importar Dados</a></li>
                            <li><i class="menu-icon ti-download"></i><a href="/users_admin/">Exportar Dados</a></li>
                        </ul>
                    </li>
                    
                    
                    <h3 class="menu-title">Sintechs Admin</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Admin Usuários</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon ti-settings"></i><a href="/users_admin/client_data">Dados do Cliente</a></li>
                            <li><i class="menu-icon ti-settings"></i><a href="/users_admin/roles">Papeis de Usuários</a></li>
                            <li><i class="menu-icon ti-settings"></i><a href="/users_admin/permissions">Permissões de Usuários</a></li>
                             <li><i class="menu-icon fa fa-male"></i><a href="/users_admin/create">Criar Usuários</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-sitemap"></i>Admin Modulos</a>
                        <ul class="sub-menu children dropdown-menu">
                        	<li><i class="menu-icon ti-settings"></i><a href="/modules_admin/modules_type">Tipos de Modulos</a></li>
                            <li><i class="menu-icon ti-settings"></i><a href="/modules_admin/modules">Modulos</a></li>
                            <li><i class="menu-icon ti-settings"></i><a href="/modules_admin/sensors">Sensores</a></li>
                            <li><i class="menu-icon ti-settings"></i><a href="/modules_admin/actuators">Atuadores</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-gears"></i>Sistema Especialista</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon ti-settings"></i><a href="/expert_system_admin/rules">Gerenciar Regras</a></li>
                        </ul>
                    </li>                                           
                    <li>
                        <a href="/sampling_admin/sampling"> <i class="menu-icon ti-alarm-clock"></i>Dados de Amostragem</a>
                    </li>
		            <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon ti-email"></i>Alertas</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon ti-settings"></i><a href="/alerts_admin/types">Tipo de Alertas</a></li>
                            <li><i class="menu-icon ti-settings"></i><a href="/alerts_admin/config">Configuração de Alertas</a></li>
                        </ul>
                    </li>  
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-archive"></i>Logs</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon ti-settings"></i><a href="/logs_admin/audit">Registros Auditoria</a></li>
                            <li><i class="menu-icon ti-settings"></i><a href="/logs_admin/support">Registros de Suporte</a></li>
                            <li><i class="menu-icon ti-settings"></i><a href="/logs_admin/errors">Registros de Erros</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-exchange"></i>Comunicação</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon ti-settings"></i><a href="/communications_admin/messagesQueue">Fila de Mensagens</a></li>
                            <li><i class="menu-icon ti-settings"></i><a href="/communications_admin/commandsQueue">Fila de Comandos</a></li>
                            <li><i class="menu-icon ti-settings"></i><a href="/communications_admin/commands_types">Tipo Comandos</a></li>
                            <li><i class="menu-icon ti-settings"></i><a href="/communications_admin/commands_args">Argumentoss</a></li>
                            <li><i class="menu-icon ti-settings"></i><a href="/communications_admin/commands">Comandos</a></li>
                            <li><i class="menu-icon ti-settings"></i><a href="/communications_admin/realtime">Tempo Real</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa  fa-wrench"></i>Configuração Server</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon ti-settings"></i><a href="/server_admin/dns">DNS</a></li>
                            <li><i class="menu-icon ti-settings"></i><a href="/server_admin/crontab">Crontab</a></li>
                            <li><i class="menu-icon ti-settings"></i><a href="/server_admin/disk_usage">Espaço em Disco</a></li>
                            <li><i class="menu-icon ti-settings"></i><a href="/server_admin/log_rest_api">Log REST_API</a></li>
                            <li><i class="menu-icon ti-settings"></i><a href="/server_admin/log_web_app">Log WEB_APP</a></li>
                            <li><i class="menu-icon ti-settings"></i><a href="/server_admin/log_serial_comm">Log JavaCommSerial</a></li>
                            <li><i class="menu-icon ti-settings"></i><a href="/server_admin/log_rotate">Log Rotate</a></li>
                        </ul>
                    </li>       
                    @endrole
                    
                                 
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
    
		@section('header')
		<!-- Header-->
        <header id="header" class="header">
            <div class="header-menu">
                <div class="col-sm-7">
                    <div class="header-left">
                        
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger" id="total-alerts"><?php echo SintechsAlerts::hasAlert()?></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification" id="dropdown-alerts">
                            <p class="red">Você tem <span id="dropdown-total-alerts"><?php echo SintechsAlerts::hasAlert()?></span> notificações</p>
                            <?php foreach(SintechsAlerts::getAllUnreaded() as $alert){?>
                                <a class="dropdown-item media bg-flat-color-3" href="#" onclick="closeAlert(<?php echo $alert->id;?>);" id="alert-<?php echo $alert->id;?>">
                                <i class="fa fa-check"></i>
                                <p><?php echo $alert->message;?></p>
                            	</a>
                            <?php }?>
                            </div>
                        </div>

                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                id="message"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ti-email"></i>
                                <span class="count bg-primary">9</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message">
                                <p class="red">You have 4 Mails</p>
                                <a class="dropdown-item media bg-flat-color-1" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jonathan Smith</span>
                                    <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                                <a class="dropdown-item media bg-flat-color-4" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/2.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jack Sanders</span>
                                    <span class="time float-right">5 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                                <a class="dropdown-item media bg-flat-color-5" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/3.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Cheryl Wheeler</span>
                                    <span class="time float-right">10 minutes ago</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                                <a class="dropdown-item media bg-flat-color-3" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Rachel Santos</span>
                                    <span class="time float-right">15 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="/images/house-avatar.png" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i> Meus Dados</a>

                            <a class="nav-link" href="#"><i class="fa fa-user"></i> Alertas<span class="count">13</span></a>

                            <a class="nav-link" href="#"><i class="fa fa-cog"></i> Conta</a>

                            <a class="nav-link" href="/logout"><i class="fa fa-power-off"></i> Sair</a>
                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                            <i class="flag-icon flag-icon-br"></i>
                    </div>

                </div>
            </div>

        </header>
        @show
        <!-- Header-->

		<div class="breadcrumbs">
            <div class="col-sm-4">
           		<div class="page-header float-left">
           			<div class="page-title">
               		@yield('page_name')
               		</div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                        	@yield('breadcrumbs')
                        </ol>
                    </div>
                </div>
            </div>
 	    </div>
		@yield('alert-message')
           
		<!-- .content -->
        <div class="content mt-3">
			@yield('content')
        </div> <!-- .content -->
    </div><!-- /#right-panel -->
	
    <!-- Right Panel -->
	<script>
	   function closeAlert(id){
		   jQuery.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
		        }

		    });
		   jQuery.post("/alerts/mark-as-readed/"+id, function( data ) {
			   jQuery( "#total-alerts" ).html( data );
			   jQuery( "#dropdown-total-alerts" ).html( data );
			   
		   });
		   jQuery( "#alert-"+id ).remove();
		   if(jQuery( "#alert-div-"+id ).length > 0)
		   		jQuery( "#alert-div-"+id ).remove();
	   }
	</script>
	@yield('final-includes')
</body>

</html>
