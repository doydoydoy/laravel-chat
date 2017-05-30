<style scoped>
	.red {
		color: red;
	}
</style>

<template>
	<ul class="chat">
		<li class="left clearfix" v-for='message in messages'>
			<div :class="'chat-body clearfix ' + (message.user.id == user.id ? 'red' : '')">
				<div class="header">
					<strong class="primary-font">
						{{ message.user.name }}
					</strong>
				</div>
				<p>
					{{ message.message }}
				</p>
			</div>
		</li>
	</ul>
</template>

<script type="text/javascript">
	export default {
		props: {
			user: {
				type: Object,
				required: true,
			},

			messages: {
				type: Array,
				required: true,
			},
		}
	};
</script>