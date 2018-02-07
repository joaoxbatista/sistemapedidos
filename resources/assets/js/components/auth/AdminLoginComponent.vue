<template>
	<div class="admin-login-component">
		<div class="header">
			<h3><i class="fa fa-dashboard"></i></h3>
			<p>Painel Administratívo</p>
		</div>

		<div class="content">
			<form :method="method" :action="action">

				<div class="form-group">
					<label>E-mail</label>
					<input type="text" name="email" class="form-control">
				</div>

				<input type="hidden" name="_token" :value="token">
				
				<div class="form-group">
					<label>Senha</label>
					<input type="password" name="password" class="form-control">
				</div>

				<button type="submit" class="btn btn-success btn-block">
					<i class="fa fa-lock"></i>
					<span>entrar</span>
				</button>
			</form>
		</div>
	</div>
</template>

<style lang="sass">
	.admin-login-component
		color: #888
		.header
			text-align: center
			color: rgb(139,195,74)
			margin: 50px 0px
			
			
			p
				text-transform: uppercase
				font-size: 14px
		.content

			.form-group
				label
					font-weight: lighter
					float: right
					text-transform: uppercase
					font-size: 10px
				.form-control
					border: 0px
					box-shadow: 0px 1px 4px rgba(0, 0, 0, .15)
					border-radius: 2px
					color: #888
			.btn
				font-size: 16px
				font-weight: lighter
				border-radius: 2px
				border: 0px
				padding: 10px 0px
				margin-top: 30px 
			.btn-success
				background: rgb(139,195,74)

				i
					margin-right: 4px
					font-size: .8em

</style>
<script type="text/javascript">
	export default {
		props: ['method', 'action', 'token']
	}
</script>