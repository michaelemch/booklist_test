<template>
    <div>
        <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th @click="sort_booklist()">Book<span style="float: right; font-weight: normal; color: #007bff; cursor: pointer;">sort<span class="glyphicon glyphicon-sort-by-alphabet"></span></span></th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <draggable v-model="book" :element="'tbody'" :move="before_move" @end="after_move">
        <tr v-for="book in booklist" :key="book.id">
            <td><b>{{ book.title }}</b> <i>by</i> {{ book.author }}<span style="float: right" class="glyphicon glyphicon-move"></span> </td>
            <td><router-link :to="{name: 'edit', params: { id: book.id }}"><span class="glyphicon glyphicon-pencil">&nbsp;</span></router-link></td>
            <td><span style="color: red; cursor: pointer;" @click="delete_book(book.id)" class="glyphicon glyphicon-remove">&nbsp;</span></td>
        </tr>
        </draggable>
        </table>
    </div>
</template>

<script>
import draggable from 'vuedraggable';

export default {
    components: {
        draggable
    },
    data() {
        return {
            booklist: []
        }
    },
    created() {
        this.axios
            .get(this.$http_api + 'books')
            .then( response => {
                this.booklist = response.data;
                this.booklist = this.booklist.sort( function(a,b) { return a.order - b.order; });
                console.log(this.booklist);
            });
    },
    methods: {
        before_move: function(evt) {
            console.log("before move...");
        },
        after_move: function(evt) {
            console.log(evt);
            console.log(this.booklist);
            console.log("old index: " + evt.oldIndex + " new index: " + evt.newIndex);
            var b = this.booklist.splice(evt.oldIndex, 1);
            this.booklist.splice(evt.newIndex, 0, b[0]);
            console.log(this.booklist);
            this.update_order();
            console.log(this.booklist);
            this.save_all()

        },
        update_order() {
            this.booklist = this.booklist.map( function (book, index) {
                book.order = index;
                return book;
            });
        },
        delete_book(id) {
            this.axios
                .delete(this.$http_api + `delete_book/${id}`)
                .then( response => {
                    let i = this.booklist.map(item => item.id).indexOf(id);
                    console.log("i is " + i);
                    this.booklist.splice(i, 1)
                });
        },
        sort_booklist() {
            this.booklist = this.booklist.sort(function(a,b) {
                return(a.title.localeCompare(b.title));
            });
            console.log(this.booklist);
            this.update_order();
            console.log(this.booklist);
            this.save_all()
        },
        save_all() {
            const post_data = {
                data: this.booklist
            }
            this.axios.post(this.$http_api + 'update_all', post_data).then( response => {
                console.log("updated booklist");
            })
        }
	}
}

</script>
