<template>
    <div>

        <h1>{{category.title}}</h1>

        <post-list-default @getCurrentPage="getCurrentPage" 
        :posts="posts" 
        :totalPages="totalPages"         
        :pCurrentPage="currentPage"
        :key="currentPage"
        ></post-list-default>

    </div>
    
</template>    

<script>
export default {

    created(){
        this.getPostsByCategory();
    },

    methods: {
        
        getPostsByCategory(){

            fetch('/api/post/'+this.$route.params.id+'/category?page='+this.currentPage)
                .then(response => response.json())
                .then(json => {
                        this.posts = json.data.posts.data;
                        this.category = json.data.category;
                        this.totalPages = json.data.posts.last_page;
                    });
        },

        getCurrentPage:function(currentPage){
            this.currentPage = currentPage;
            this.getPostsByCategory(currentPage);
        },

        closeModalPost: function() {
            this.postSelected = "";
        }
    },

    data: function(){
        return {
            postSelected: { 'id': 1, 'title': 'post1', 'url_clean': 'post1', 'content': 'post1', 'image': '1599602683.jpeg' },
            posts: [],
            category: {},
            currentPage: 1,
            totalPages: 0,
        }
    },
}
</script>