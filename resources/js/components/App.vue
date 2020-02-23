<template>
    <div>
        <h1 class="pl-5">Reading List </h1>

        <p class="pl-5">
            <router-link :to="{ name: 'booklist' }">Home</router-link> |
            <router-link :to="{ name: 'add' }">Add Book</router-link>
        </p>

        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>
<script>
    export default {}
</script>
