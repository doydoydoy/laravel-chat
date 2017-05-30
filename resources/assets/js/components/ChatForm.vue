<template>
	<div class="input-group">
		<input class="form-control sm" id="btn-input" type="text" name="message" placeholder="Type your message here..." v-model="newMessage" @keyup.enter='sendMessage'>
		<span class="input-group-btn">
			<button class="btn btn-primary btn-sm" id="btn-chat" @click='sendMessage'>Send</button>
		</span>
	</div>
</template>

<script type="text/javascript">
	export default {
		props: {
			user: {
				type: Object,
				required: true,
			},
		},

		data() {
			return {
				newMessage: '',
			}
		},

		methods: {
			sendMessage() {
				this.$emit('messagesent', {
					user: this.user,
					message: this.newMessage,
				});

				this.newMessage = '';
			}
		},
	}
</script>