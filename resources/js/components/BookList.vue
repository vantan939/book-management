<template>
	<div>
		<data-table
			title="List"
			:columns="tableColumns"
			:rows="items"
			:printable="false"
			:exportable="false"
			:perPage="[10, 20, 50]"
			v-if="items.length > 0"
		>
			<th slot="thead-tr" v-if="propsUsertype == 'admin'">
				Delete
			</th>
			<template slot="tbody-tr" slot-scope="props" v-if="propsUsertype == 'admin'">
				<td>
					<a :href="'/book/del/' + props.row.id"
						v-on:click.prevent="deleteBook(props.row.id, props.row.num)"
					>
						Delete
					</a>
				</td>
			</template>
		</data-table>

		<div class="no-result mt-30" v-if="result != ''">
			<p>{{ result }}. Please go to <a href="/book-creation">Book Creation</a> to create a new Book.</p>
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				items: [],
				result: '',
				tableColumns: [
					{
						label: "Title",
						field: "title",
						numeric: false,
						html: true
					},
					{
						label: "Description",
						field: "description",
						numeric: false,
						html: true
					},
					{
						label: "Author",
						field: "author",
						numeric: false,
						html: false
					}
				]
			}
		},
		props: ['propsUsertype', 'propsUserid'],
		created() {
			if(this.propsUsertype == 'admin') {
				this.tableColumns.splice(
					2,
					0,
					{
						label: "Status",
						field: "enabled",
						numeric: false,
						html: true
					}
				)
				this.tableColumns.splice(
					4,
					0,
					{
						label: "Edit",
						field: "edit",
						numeric: false,
						html: true
					}
				)
			}
		},
        mounted() {
            axios
	      	.get('/api/book-list?type=' + this.propsUsertype + '&user=' + this.propsUserid,
	      	{
		      	headers: { 				   
				    'X-Authorization': process.env.MIX_API_KEY
			  	}
	      	})
	      	.then(res => {
				if(Array.isArray(res.data)) {					
					this.setNewData(res.data)
				}else {
					this.result = res.data					
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
						this.items.splice(index - 1, 1);
					})
					.catch(error => {
						console.log(error);
					})
				}				
			},
			setNewData(data) {
				data.forEach(function(value, index) {
					data[index].title = '<a title="'+value.title+'" href="/book/'+ value.id +'">'+ value.title +'</a>'
					data[index].description = value.description.replace(/(.{60})..+/, "$1…")
					data[index].enabled = (value.enabled == 1) ? '<span>Enabled</span>' : '<span class="color-red">Disabled</span>'
					data[index].edit = '<a href="/book/edit/'+ value.id +'">Edit</a>'
					data[index].num = index + 1
				})
				this.items = data
			}
		}
    }
</script>
