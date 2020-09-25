<template>
    <div>

        <div class="card-columns">

            <div class="card p-3 m-3" v-for="category in categories">
                <div class="card-body">
                    <img class="card-img-top" v-bind:src=" '/images/img_categories/customer-care.svg' " alt="Card image cap">
                    <h5 class="card-title">{{category.title}}</h5>
                    <router-link class="btn btn-primary" :to="{name: 'post.category', params: {'id': category.id}}">Ver todos los posts</router-link>
                </div>
            </div>
        </div>   

        
    </div>

</template>    


<script>

export default {

    created() {

        fetch('/api/category')
            .then(response => response.json())
            .then(json => {
                    this.categories = json.data.data;
                });
    },

    data() {
        return {
            categories: []
        }
    },
    
}
</script>