<template>
	<div>
		<!-- if some boards are retrieved with created(), boards variable will be set to true -->
		<div v-if="boards">
			<h2>Available boards :</h2>
			<b-tabs>
				<b-tab v-for="board in boards_list" :key="board.id" :title="board.name"></b-tab>
			</b-tabs>
		</div>
		<!-- else, it means that no boards were retrieved from the database -->
		<div v-else>
			<h2>No board available yet</h2>
		</div>
	</div>
</template>


<script>
	export default {
		name: 'Boardslist',
		props: {

		},
		data() {
			return {
				boards: false,
				boards_list: {}
			}
		},
		methods: {
			log() {
				console.log(this.boards_list);
			}
		},
		// fetch existing boards with ajax
		created() {
			window.axios.get('api/boards/index')
			.then( (response) => {
				// when a response is handled, set boards variable to true to display them and push all results in boards_list
				this.boards = true;
				this.boards_list = response.data;
			});


				// fetch('api/boards/index', {
			// 	method: "GET"
			// })			
			// .then(res => res.json())
			// .then( (json) => {
			// 	console.log(json);
			// 	this.boards = true;
			// })
		}
	}
</script>