<template>
    <div>
        <h1 class="pl-5">Reading List </h1>
        <p class="pl-5"><br/>This is a simple book list created to demonstrate CRUD operations in Laravel.  It uses VueJS and Bootstrap on the front-end.<br/><br/>
        <p class="pl-5">
            <router-link :to="{ name: 'booklist' }">Home</router-link> 
            <span class="pl-5"><router-link :to="{ name: 'add' }">Add Book</router-link></span>
        </p>

        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>
<script>
    export default {}
</script>
