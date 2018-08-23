<?php
	
	include "../naveadministracao/include/conexao.php";
	
	
	
	if ( isset ($_POST["enviar"])) {
		session_start();
		$nome     = $_POST['nome'];
        $cpf      = $_POST['cpf'];
        $modelo   = $_POST['modelo'];
		$ano      = $_POST['ano'];
		$whats    = $_POST['whats'];
		$email_contato    = $_POST['email'];
		

			if((strlen(trim($whats)) == 0) and (strlen(trim($email_contato))== 0)) {
				$erro .= "Email ou Whatsapp devem ser preenchidos. <br>";
			}
			
			if(strlen(trim($erro)) == 0){
				$msg = "Nome:       $nome <br> 
						CPF:        $cpf<br>
						Modelo:     $modelo <br>
						Ano:        $ano <br>
						Whats:      $whats <br>
						Email:      $email_contato <br>";
						
				
				//Configurações do email, ajustar conforme necessidade
				//==================================================== 
				$email_destinatario = "contato@naveseguros.com.br"; // pode ser qualquer email que receberá as mensagens
				$email_reply = "$email_contato"; 
				$email_assunto = "Solicitação de Cotação"; // Este será o assunto da mensagem
				//====================================================
				 
				//Seta os Headers (Alterar somente caso necessario) 
				//==================================================== 
				$email_headers = implode ( "\n",array ( "From: $email_contato", "Reply-To: $email_contato", "Subject: $email_assunto","Return-Path: $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
				//====================================================
				 
				//Enviando o email 
				mail ($email_destinatario, $email_assunto, $msg, $email_headers);
				
				$retirar = array(".", "-","(", ")", " ");
				
				$cpf = str_replace($retirar, "", $cpf);
				$whats = str_replace($retirar, "", $whats);
				
				$sql = "INSERT INTO tbl_solicitacoes(nome, cpf, modelo, ano, email, whats, fechado)
				VALUES('$nome', '$cpf', '$modelo', '$ano', '$email', '$whats', '')";
				$res = mysqli_query($con, $sql);
				

				echo "<script> alert('Solicitação enviada com sucesso, em breve retornaremos!') </script>";
				$nome = "";
				$cpf = "";
				$modelo = "";
				$ano = "";
			}
			
	}

?>



<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Nave Seguros - Cotação</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   

    <!-- Theme CSS -->
     <link href="../css/estilo.css" rel="stylesheet">
	 <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	 <script type="text/javascript" src="js/bootstrap.min.js"></script>
	 <script type="text/javascript" src="js/jquery.mask.min.js"></script>
	 <link href="../img/nave.ico" rel="icon"/>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script>        
		   $(document).ready(function(){
				$("#cpf").mask("999.999.999-99");
				var options = {
					translation: {
						'A': {pattern: /[A-Z]/},
						'a': {pattern: /[a-zA-Z]/},
						'S': {pattern: /[a-zA-Z0-9]/},
						'L': {pattern: /[a-z]/},
					}
				}
				
				//$("#placa").mask("aaa-0000", options);
				$("#ano").mask("9999/9999");
				$("#whats").mask("(99) 99999-9999");			
			});     
	</script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-124155406-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-124155406-1');
	</script>
</head>

<body>
	<div class="container">
		<?php if (strlen(trim($erro)) > 0): ?>
             <div class="alert alert-danger">
                <i class="icon-remove-sign"></i>
                     <?php echo $erro ?>
             </div>
        <?php endif; ?>
		<div class="row" id="tipo">
			<div class="col-xs-12">
				<div>Digite as informações e entraremos em contato com você</div>
			</div>
		</div>
		<br><br>
		<div class="row">
			<form method="POST" enctype="multipart/form-data" action="">
			<div class="centro">
				<div class='row'>
					<div class='col-md-offset-3 col-md-3'>	
						<div class="form-group">
							<label>Nome</label>
							<input type="text" class="form-control" name="nome" maxlength="50" value="<?=$nome?>" required>
						</div>
					</div>
					<div class='col-md-2'>	
						<div class="form-group">
							<label>CPF</label>
							<input type="text" class="form-control" name="cpf" id="cpf" value="<?=$cpf?>" required>
						</div>
					</div>
				</div>
				<div class='row'>
					<div class='col-md-offset-3 col-md-3'>	
						<div class="form-group">
								<label>Modelo do Carro</label>
								<input type="text" class="form-control" name="modelo" maxlength="40" value="<?=$modelo?>" required>
						</div>
					</div>
					<div class='col-md-2'>	
						<div class="form-group">
							<label>Ano/Modelo Fab.</label>
							<input type="text" class="form-control" placeholder="Exemplo 2017/2018" name="ano" id="ano" value="<?=$ano?>" required>
						</div>
					</div>
				</div>
				<div class="row" id="frasecontato">
					<div class="col-md-offset-3">
						Digite Email ou WhatsApp que entraremos em contato!
					</div>
				</div>
				<div class='row'>
					<div class='col-md-offset-3 col-md-3'>
						<div class="form-group">
							<input type="email" class="form-control" name="email" maxlength="50" placeholder="Email">
						</div>
					</div>	
					<div class='col-md-2'>					
						<div class="form-group">
							<input type="text" class="form-control" name="whats" id="whats" placeholder="WhatsApp">
						</div>
					</div>
				</div>
			</div>
				<br>
				<div class="row">
					<div class="col-xs-12 col-md-offset-5">
						<input type="submit" name="enviar" value="Enviar" class="btn btn-success">
					</div>
				</div>
		</div>
		
		</form>
		</div>
		
	</div>
</body>
</html>