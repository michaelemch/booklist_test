<template>
    <div>
        <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Book</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <draggable v-model="book" :element="'tbody'">
        <tr v-for="book in booklist" :key="book.id">
            <td><b>{{ book.title }}</b> <i>by</i> {{ book.author }}</td>
            <td><router-link :to="{name: 'edit', params: { id: book.id }}"><a href="#" @click="">edit</a></router-link></td>
            <td><a href="#" @click="delete_book(book.id)">delete</a></td>
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
            .get('http://54.174.111.201/api/books')
            .then( response => { 
                this.booklist = response.data; 
            });
    },   
    methods: {
        delete_book(id) {
            this.axios
                .delete(`http://54.174.111.201/api/delete_book/${id}`)
                .then( response => {
                    let i = this.booklist.map(item => item.id).indexOf(id);
                    console.log("i is " + i);
                    this.booklist.splice(i, 1)
                });
        }
	}
}

</script>


