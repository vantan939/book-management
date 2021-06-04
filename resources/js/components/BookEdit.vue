<template>
    <div class="form-creation">
        <form action="post" class="mt-30" autocomplete="off" v-on:submit.prevent="onSubmit">
            <div class="alert alert-danger" role="alert" v-if="errors.length">
                <b>Please correct the following error(s):</b>
                <ul>
                    <li v-for="(error, index) in errors" :key="index">{{ error }}</li>
                </ul>
            </div>
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" v-model="title" class="form-control" />
            </div>
            <div class="form-group">
                <label>Author</label>
                <input type="text" name="author" v-model="author" class="form-control" />
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" id="" v-model="description" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label>Enabled</label>
                <input type="radio" name="enabled" value="1" v-model="enabled">
                <span class="mr-20">Yes</span>
                <input type="radio" name="enabled" value="0" v-model="enabled">
                <span>No</span>
            </div>

            <div class="alert alert-success alert-dismissible" role="alert" v-if="success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                Updated a Book!
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</template>

<script>
export default {
		data() {
			return {
				errors: [],
                success: 0,
                title: this.propsTitle,
                author: this.propsAuthor,
                description: this.propsDescription,
                enabled: this.propsEnabled
			}
		},
        props: ['propsId', 'propsTitle', 'propsAuthor', 'propsDescription', 'propsEnabled'],
        methods: {
            onSubmit() {
                this.validate()
            },
            validate() {
                this.errors = []
                this.success = 0

                if(!this.title) {
                    this.errors.push('Title is required!')
                }
                if(!this.author) {
                    this.errors.push('Author is required!')
                }

                if (this.errors.length) {
                    window.scrollTo(0,0)
                }else {
                    this.updateBook()
                }
            },
            updateBook() {
                const data = this.getData()

                axios.request(
                {
                    url: '/api/book/edit/' + this.propsId,
                    method: 'PATCH',
                    headers: { 				   
				        'X-Authorization': process.env.MIX_API_KEY
			  	    },
                    data: data
                })
                .then(resp => {
                    this.success = 1
                })
                .catch(error => {
                    console.log(error);
                })
            },
            getData() {
                const formData = new URLSearchParams();
                formData.append("title", this.title);
                formData.append("author", this.author);                
                formData.append("enabled", this.enabled);
                if (this.description != null) formData.append("description", this.description)

                return formData;
            }
        }
    }
</script>

<style scoped lang="scss">
    .form-creation {
        margin-bottom: 30px;

        form {
            max-width: 700px;
            margin: 0 auto;
            margin-top: 30px;

            label {
                font-weight: bold;
                display: block;
            }

            .mr-20 {
                margin-right: 20px;
            }

            button[type="submit"] {
                margin-top: 30px;
            }

            .alert ul {
                margin-bottom: 0;
            }

            .success {
                margin-top: 35px;
            }
        }
    }
    
</style>