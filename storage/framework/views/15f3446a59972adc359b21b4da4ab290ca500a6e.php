<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Validação de Formulários</title>
	<link rel="stylesheet" href="<?php echo e(asset('/css/app.css')); ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.3/validationEngine.jquery.min.css">
</head>
<body>
	<div class="container">	
		<div class="col-md-6 col-md-offset-3">	
			<h3>Registro de Cliente</h3>
			<div id="register">
				<form>
					<div class="form-group">
						<label for="">Nome</label>
						<input type="text" id="nome" class="validate[required,custom[url]text-input form-control">
					</div>

					<div class="form-group">
						<label for="">CPF</label>
						<input type="text" id="cpf" class="validate[required,custom[date]text-input form-control">
					</div>

					<div class="form-group">
						<label for="">RG</label>
						<input type="text" id="rg" class="form-control">
					</div>

					<div class="form-group">
						<label for="">CEP</label>
						<input type="text" id="cep" class="form-control">
					</div>

					<button>Registrar</button>
				</form>
			</div>
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1-rc1/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.3/jquery.validationEngine.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.3/languages/jquery.validationEngine-pt_BR.min.js"></script>
	<script>
		$(document).ready(function(){
			$('#register').validationEngine();
		});
	</script>
</body>
</html>