<template>
<div>
    <form @submit.prevent="update_book">
    <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" v-model="book.title" />
    </div>
    <div class="form-group">
        <label>Author</label>
        <input type="text" class="form-control" v-model="book.author" />
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</template>

<script>
    export default {
        data() {
            return {
                book: {}
            }
        },
        created() {
            this.axios
                .get(`http://54.174.111.201/api/edit_book/${this.$route.params.id}`)
                .then((response) => {
                    this.book = response.data;
                });
        },
        methods: {
            update_book() {
                this.axios
                    .post(`http://54.172.242.15/api/update_book/${this.$route.params.id}`, this.book)
                    .then(response => (
                        this.$router.push( { name: 'booklist' } )
                    ))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
            }
        }
    }

</script>
