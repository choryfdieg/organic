<template>
    <div>

        <post-list-default @getCurrentPage="getCurrentPage" 
            :posts="posts" 
            :totalPages="totalPages"         
            :pCurrentPage="currentPage"
            :key="currentPage"></post-list-default>
    </div>
    
</template>    

<script>
export default {

    created(){
        this.getPosts(1);
    },

    methods: {

        getPosts(){

            fetch('/api/post/?page='+this.currentPage)
                .then(response => response.json())
                .then(json => {
                    this.posts = json.data.data;
                    this.totalPages = json.data.last_page;
                    });
        },

        getCurrentPage:function(currentPage){
            this.currentPage = currentPage;
            this.getPosts(currentPage);
        }


    },

    data: function(){
        return {
            postSelected: { 'id': 1, 'title': 'post1', 'url_clean': 'post1', 'content': 'post1', 'image': '1599602683.jpeg' },
            posts: [],
            totalPages: 0,
            currentPage: 1,
        }
    },
}
</script>