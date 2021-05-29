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
		/>

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
			setNewData(data) {
				data.forEach(function(value, index) {
					data[index].title = '<a title="'+value.title+'" href="/book/'+ value.id +'">'+ value.title +'</a>'
					data[index].description = value.description.replace(/(.{60})..+/, "$1…")
					data[index].num = index + 1
				})
				this.items = data
			}
		}
    }
</script>
