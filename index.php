<?php
	
	session_start();
	if ( isset ($_POST["btnacao"])) {
		$nome     = $_POST['nome'];
        $email    = $_POST["email"];
        $telefone = $_POST['telefone'];
        $mensagem      = $_POST["mensagem"];
		
		include_once 'captcha/securimage.php';
		$securimage = new Securimage();
		
		if ($securimage->check($_POST['captcha_code']) == false) {
			// captcha incorreto
			echo "<script> alert('O codigo digitado está incorreto!') </script>";
			$mensagem = "";
		}else{
			$msg = "Nome:       $nome <br> 
                    E-mail:     $email <br>
                    Telefone:   $telefone <br>
                    Mensagem:   $mensagem <br>";
			
			//Configurações do email, ajustar conforme necessidade
			//==================================================== 
			$email_destinatario = "contato@naveseguros.com.br"; // pode ser qualquer email que receberá as mensagens
			$email_reply = "$email"; 
			$email_assunto = "Contato Site Nave Seguros"; // Este será o assunto da mensagem
			//====================================================
			 
			//Seta os Headers (Alterar somente caso necessario) 
			//==================================================== 
			$email_headers = implode ( "\n",array ( "From: $email", "Reply-To: $email", "Subject: $email_assunto","Return-Path: $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
			//====================================================
			 
			//Enviando o email 
			mail ($email_destinatario, $email_assunto, $msg, $email_headers);

			echo "<script> alert('Mensagem enviada com sucesso, em breve retornaremos!') </script>";
			$nome = "";
			$email = "";
			$telefone = "";
			$mensagem = "";
		}	
		
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="seguro carro">
    <meta name="author" content="">

    <title>Nave Seguros - Corretora Virtual</title>

    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	<link href="img/nave.ico" rel="icon"/>

    <!-- Theme CSS -->
    <link href="css/estilo.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-124155406-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-124155406-1');
	</script>

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                   <img src="img/logonave.png" id="logonave" class="img-responsive">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#cotacao">Quem Somos</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#download">Parceiros</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contato</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <p class="intro-text">
							O seguro do seu carro com rapidez e consultoria especializada
							<br><br>
							
							<a href="cotacao/cotacao.php" target="_blank">
								<button class="btn btn-default btn-lg">Solicite cotação</button>
							</a>
						</p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="cotacao" class="container content-section text-center">
		<div class="cotacao-section">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<h2>Quem Somos</h2>
						<p>A Nave Corretora de Seguros surgiu para fechar o seguro do seu carro
							no menor tempo possível durante o horário comercial, é fácil, simples e rápido. Solicite 
							sua cotação conosco sem compromisso.
						</p>
					<p><a href="cotacao/cotacao.php" target="_blank">INICIAR COTAÇÃO</a></p>
				</div>
			</div>
		</div>
    </section>

    <!-- Download Section -->
    <section id="download" class="content-section-parceiros text-center">
        <div class="download-section">
            <div class="container">
			<h2>Parceiros</h2>
                <div class="row">
					<div class="col-sm-2 col-xs-6 celular">
						<img src="img/allianz.png" class="img-responsive">
					</div>
					
					<div class="col-sm-2 col-xs-6 celular">
						<img src="img/hdi.png" class="img-responsive">
					</div>
					
					<div class="col-sm-2 col-xs-6 celular">
						<img src="img/liberty.png" class="img-responsive">
					</div>
					
					<div class="col-sm-2 col-xs-6 celular">
						<img src="img/porto.png" class="img-responsive">
					</div>
					
					<div class="col-sm-2 col-xs-6 celular">
						<img src="img/sompo.png" class="img-responsive">
					</div>
					<div class="col-sm-2 col-xs-6 celular">
						<img src="img/tokio.png" class="img-responsive">
					</div>
					
                </div>
				
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="content-section-contato container">
		<div class="row">
			<div class="col-xs-12">
				<div class="page-header">
					<h2>Entre em Contato Conosco</h2>
					<h4 id="email">Email: contato@naveseguros.com.br</h4>
					Todos os campos de preenchimento obrigatório.
				</div>
			</div>
		</div>
        <div class="row">
          		<form class="form-horizontal" method="POST" name="frmContato" id="formContato">
					<div class="col-md-7">
						<div class="form-group">
							<label for="nome" class="col-md-2 control-label">Nome:</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome ?>" required placeholder="Nome">
							</div>
						</div>
						
						<div class="form-group">
							<label for="email" class="col-md-2 control-label">E-mail:</label>
							<div class="col-md-10">
								<input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>" required placeholder="E-mail">
							</div>
						</div>
						
						<div class="form-group"> 	
							<label for="telefone" class="col-md-2 control-label">Telefone:</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $telefone ?>" required placeholder="Telefone">
							</div>
						</div>
						<div class="form-group">
							<label for="mensagem" class="col-md-2 control-label">Mensagem:</label>
							<div class="col-md-10">
								<textarea class="form-control" name="mensagem" id="mensagem" required="required" rows="3" placeholder="Mensagem"><?php echo $mensagem ?></textarea>
							</div>
						</div>
						
						<div class="col-md-offset-2 col-md-12">
							<div class="form-group">
								<div class="col-md-3">
									<img id="captcha" src="captcha/securimage_show.php" alt="CAPTCHA Image" />
									<a href="#" onclick="document.getElementById('captcha').src = 'captcha/securimage_show.php?' + Math.random(); return false"> <img src="captcha/images/refresh.png" width="30" data-placement="right" title="Trocar Imagem"> </a>
									<input type="text" name="captcha_code" class="form-control" size="10" maxlength="6" /required>

								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-md-offset-2 col-md-5">
								<button type="submit" class="btn btn-success" name="btnacao">Enviar</button>
							</div>
						</div>
					</div>
				</form>
			
        </div>
    </section>

    <!-- Map Section -->
    <div id="map">
        <div class="row">
          <div class="col-xs-12">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3693.158927835002!2d-49.93848658548507!3d-22.234048019799893!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94bfd0ab3a7bb313%3A0x30c8a25cd05a9199!2sR.+Jorge+Bernardoni%2C+723+-+Jardim+Itaipu%2C+Mar%C3%ADlia+-+SP!5e0!3m2!1spt-BR!2sbr!4v1454080363373" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>
	</div>
			
    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>2018 - Nave Seguros</p>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="jquery/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>   

    <!-- Theme JavaScript -->
    <script src="js/grayscale.min.js"></script>

</body>

</html>
