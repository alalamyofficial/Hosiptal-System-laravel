<template>
    
    <div class="app">

        <p>Counter is {{ counter }}</p>
        <button @click="counter++">click</button>

    </div>

</template>

<script>
    export default {
        mounted() {
            
            console.log('Counter mounted.')

        },

        data(){

            counter:0

        }
    }
</script>
