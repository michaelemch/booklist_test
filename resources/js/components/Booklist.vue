<template>
    <div>
        <draggable v-model="book">
            <div v-for="book in booklist" :key="book.id">{{ book.title }} by {{ book.author }}</div>
        </draggable>
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
        }
    }
</script>


