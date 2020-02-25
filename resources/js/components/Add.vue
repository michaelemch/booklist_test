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
                book: {},
                booklist: []
            }
        },
        created() {
            this.axios
            .get(this.$http_api + 'books')
            .then( response => {
                this.booklist = response.data;
            });
        },
        methods: {
            add_book() {
                if (this.booklist.length == 0) {
                    this.book.order = 1;
                }
                else {
                    this.book.order = Math.max.apply(Math, this.booklist.map(function(o) { return o.id; })) + 1;
                }
                this.axios
                    .post(this.$http_api + 'add_book', this.book)
                    .then(response => (
                        this.$router.push( { name: 'booklist' } )
                    ))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
            }
        }
    }

</script>
