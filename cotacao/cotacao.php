<?php
	
	session_start();
	if ( isset ($_POST["enviar"])) {
		$nome     = $_POST['nome'];
        $cpf      = $_POST['cpf'];
        $placa    = $_POST['placa'];
		$ano      = $_POST['ano'];
		$whats    = $_POST['whats'];
		
		
			$msg = "Nome:       $nome <br> 
                    CPF:        $cpf<br>
                    Placa:      $placa <br>
                    Ano:        $ano <br>
					Whats:      $whats <br>";
			
			//Configurações do email, ajustar conforme necessidade
			//==================================================== 
			$email_destinatario = "contato@naveseguros.com.br"; // pode ser qualquer email que receberá as mensagens
			$email_reply = "$email"; 
			$email_assunto = "Solicitação de Cotação"; // Este será o assunto da mensagem
			//====================================================
			 
			//Seta os Headers (Alterar somente caso necessario) 
			//==================================================== 
			$email_headers = implode ( "\n",array ( "From: $email", "Reply-To: $email", "Subject: $email_assunto","Return-Path: $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
			//====================================================
			 
			//Enviando o email 
			mail ($email_destinatario, $email_assunto, $msg, $email_headers);

			echo "<script> alert('Solicitação enviada com sucesso, em breve retornaremos!') </script>";
			$nome = "";
			$email = "";
			$telefone = "";
			$mensagem = "";
			
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

    <title>Corretora Virtual - Cotação</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   

    <!-- Theme CSS -->
     <link href="../css/estilo.css" rel="stylesheet">
	 <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	 <script type="text/javascript" src="js/bootstrap.min.js"></script>
	 <script type="text/javascript" src="js/jquery.mask.min.js"></script>


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
			
			$("#placa").mask("aaa-0000", options);
			$("#ano").mask("9999/9999");
			$("#whats").mask("(99) 99999-9999");			
        });     
</script>
</head>

<body>
	<div class="container">
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
							<input type="text" class="form-control" name="nome" maxlength="50" required>
						</div>
					</div>
					<div class='col-md-2'>	
						<div class="form-group">
							<label>CPF</label>
							<input type="text" class="form-control" name="cpf" id="cpf" required>
						</div>
					</div>
				</div>
				<div class='row'>
					<div class='col-md-offset-3 col-md-2'>	
						<div class="form-group">
							<label>Placa do Veiculo</label>
							<input type="text" class="form-control" name="placa" id="placa" required>
						</div>
					</div>
					<div class='col-md-2'>	
						<div class="form-group">
							<label>Ano/Modelo Fab.</label>
							<input type="text" class="form-control" placeholder="Exemplo 2017/2018" name="ano" id="ano" required>
						</div>
					</div>
					<div class='col-md-3'>	
						<div class="form-group">
							<label>WhatsApp para Contato</label>
							<input type="text" class="form-control" name="whats" id="whats" required>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-offset-5">
						<input type="submit" name="enviar" value="Enviar" class="btn btn-success">
					</div>
				</div>
			</div>
		</form>
		</div>
		
	</div>
</body>
</html>