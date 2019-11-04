<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/vue.min.js"></script>
	<script src=""https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axio.min.js></script>
</head>
<body>
	<div class="countainer">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">Ejercicio simple validacion de vue</div>

						<div class="panel-body" id="app">
							<form method="post" action="/vuejs/form" class="form-horizontal" @submit.prevent="onSubmit">
								{{csrf_field()}}
								<div class="['form-group',allerros.name? 'has-error':]">
									<label for="name" class="col-sm-4 control-label">Name</label>
									<div class="col-sm-6">
										<input id="name" name="name" value="" autofocus="autofocus" class="form-coontrol" type="text" v-model="form-name">
										<span v-if="allerros.name" :class="['label label-danger']">@{{'El valor de name es requerido'}}></span>
										<div class="['form-group', allerros.commets ? 'has-error':]">
											<label for="commets" class="col-sm-4 control-label">Message</label>
											<div class="col-sm-6">
												<input id="commets" name="commets" class="form-coontrol" type="commets" v-model="form.commets">
												<span v-if="allerros.commets" :class="['label label-danger']">@{{"El valor de commet es requerido"}}</span>
											</div>
										</div>

									</div>
								</div>
								<span v-if="siccess" :class="['label label-succes']">Registro enviado correctamente</span>
								<button type="submit" class="btn btn-primary">Send</button>
							</form>
							
						</div>
					
				</div>
				
			</div>
			
		</div>
	</div>
</body>
</html>