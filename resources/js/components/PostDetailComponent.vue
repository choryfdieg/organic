<template>
    <div>
        <div v-if="post">
            <div class="card-group">
                <div class="card p-3 m-3" style="width: 18rem;">
                    <div class="card-header">
                        <img class="card-img-top" v-bind:src=" '/images/' + post.image.image" alt="Card image cap">
                    </div>
                    <div class="card-body">
                    <h1 class="card-title">{{post.title}}</h1>
                    <router-link class="btn btn-primary" :to="{name: 'post.category', params: {'id': post.category.id}}">{{post.category.title}}</router-link>
                    <p class="card-text">{{post.content}}</p>
                    </div>
                </div>
            </div>                    
        </div>
        <div v-else="post">
            <h1>El post no existe</h1>  
        </div>
    </div>
    
</template>    

<script>
export default {

    created(){
        this.getPost();
    },

    methods: {
        getPost: function(){

            fetch('/api/post/'+this.$route.params.id)
            .then(response => response.json())
            .then(json => this.post = json.data);

        },
        
    },

    data: function(){
        return {
            post: null
        }
    },
}
</script>