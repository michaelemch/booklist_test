<template>
<div>
    <form @submit.prevent="add_book">
    <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" v-model="book.title" />
    </div>
    <div class="form-group">
        <label>Author</label>
        <input type="text" class="form-control" v-model="book.author" />
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
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
        methods: {
            add_book() {
                this.book.order = 0,
                this.axios
                    .post('http://54.174.111.201/api/add_book', this.book)
                    .then(response => (
                        this.$router.push( { name: 'booklist' } )
                    ))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
            }
        }
    }

</script>
