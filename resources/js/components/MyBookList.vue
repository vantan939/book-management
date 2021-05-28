<template>
	<div>
		<table class="table mt-30" v-if="items != null">
		  	<thead class="thead-light">
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Title</th>
			      <th scope="col">Author</th>
			      <th scope="col">Edit</th>
			      <th scope="col">Delete</th>
			    </tr>
		  	</thead>
		  	<tbody>
		  		<tr v-for="(item, index) in items" v-bind:key="index">
		  			<th scope="row">{{ index + 1 }}</th>
		  			<td><a :href="'/book/' + item.id">{{ item.title }}</a></td>
		  			<td>{{ item.author }}</td>
		  			<td>
						<a :href="'/book/edit/' + item.id">Edit</a>
					</td>
		  			<td>
					    <a :href="'/book/del/' + item.id"
					   		v-on:click.prevent="deleteBook(item.id, index)"
						>
							Delete
						</a>
					</td>
		  		</tr>	    
		  	</tbody>
		</table>
        <div class="mt-30 no-result" v-if="items == null">
            <p>{{ msg }}</p>
        </div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				items: null,
				msg: ''
			}
		},
		props: ['propsUserid'],
        mounted() {
            axios
	      	.get('/api/my-book-list/'+ this.propsUserid,
	      	{
		      	headers: { 				   
				    'X-Authorization': process.env.MIX_API_KEY
			  	}
	      	})
	      	.then(res => {
				if(Array.isArray(res.data)) {
					this.items = res.data
				}else {
					this.msg = res.data
				}
			})
        },
		methods: {
			deleteBook(id, index) {
				if(confirm('Do you want delete this book?')) {
					axios.delete('/api/book/del/'+ id,
					{
						headers: { 				   
							'X-Authorization': process.env.MIX_API_KEY
						}
					})
					.then(resp => {
						this.items.splice(index, 1);
					})
					.catch(error => {
						console.log(error);
					})
				}				
			}
		}
    }
</script>

