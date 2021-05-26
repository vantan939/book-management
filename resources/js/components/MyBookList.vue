<template>
	<div>
		<table class="table mt-30" v-if="items != null">
		  	<thead class="thead-light">
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Title</th>
			      <th scope="col">Author</th>
			    </tr>
		  	</thead>
		  	<tbody>
		  		<tr v-for="(item, index) in items" v-bind:key="index">
		  			<th scope="row">{{ index + 1 }}</th>
		  			<td>{{ item.title }}</td>
		  			<td>{{ item.author }}</td>
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
        }
    }
</script>