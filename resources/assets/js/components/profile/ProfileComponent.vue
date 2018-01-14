<template>
	<div class="hb-profile">

		<div class="card card-user">
			<div class="image">

			</div>
			<div class="content">
				<div class="author">
					<img 
						class="avatar border-gray"
						:src="'/uploads/images/users/'+user.image"
					/>
					<h4 class="title">
						{{ user.name }}<br>
						<small>{{ user.email }}</small>
						
					</h4>

				</div>
			</div>
		</div>
	</div>
</template>

<script type="text/javascript">
	export default {
		data () {
			return {
				
			}
		},
		props: ['user', 'image']
	}
</script>