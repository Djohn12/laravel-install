<template>
	<div>
		<div>
	      <b-button variant="outline-primary" @click="show_board_panel">New Board</b-button>
	    </div>
	    <div v-if="board_panel">
	      <b-input-group class="col-5 mx-auto">
	        <b-form-input @keydown.enter="add_board()" v-model="board_name" type="text" class="form-control" placeholder="Enter your new board name"></b-form-input>
	        <b-input-group-append>
	          <b-button variant="outline-primary" @click="add_board()">Add new board</b-button>
	        </b-input-group-append>
	      </b-input-group>
	    </div>
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
	</div>
</template>


<script>
	export default {
		name: 'Boardslist',
		props: {

		},
		data() {
			return {
				board_panel: false,
      			board_name: '',
				boards: false,
				boards_list: []
			}
		},
		methods: {
			show_board_panel(){
      			return this.board_panel = !this.board_panel
    		},
			add_board() {
      			let name = this.board_name;
      			let data = {
        			'name': name,
        			'user_id': currentUser 
      			}
      			// ajax call to the api route
      			window.axios.post('api/boards/store', {data})
      			.then(response => this.boards_list.push(response.data.new_board));
                this.board_name = ''
                this.board_panel = false
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