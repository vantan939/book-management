<template>
	<div>
		<table class="table mt-30" v-if="items !== null">
		  	<thead class="thead-light">
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Title</th>
			      <th scope="col">Author</th>
			    </tr>
		  	</thead>
		  	<tbody>
		  		<tr v-for="(item, index) in items">
		  			<th scope="row">{{ index + 1 }}</th>
		  			<td>{{ item.title }}</td>
		  			<td>{{ item.author }}</td>
		  		</tr>	    
		  	</tbody>
		</table>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				items: null
			}
		},
        mounted() {
            axios
	      	.get('/api/book-list',
	      	{
		      	headers: { 				   
				    'X-Authorization': process.env.MIX_API_KEY
			  	}
	      	})
	      	.then(res => (this.items = res.data))
        }
    }
</script>