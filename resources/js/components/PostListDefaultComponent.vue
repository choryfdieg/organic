<template>
    <div>

        <div class="card-columns">

            <div class="card p-3 m-3" v-for="post in posts">
                <img class="card-img-top" v-bind:src=" '/images/' + post.image " alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{post.title}}</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <button class="btn btn-primary" v-on:click="postClick(post)">Ver resumen</button>
                    <router-link class="btn btn-primary" :to="{name: 'detail', params: {'id': post.id}}">Detalle del post</router-link>
                </div>
            </div>
        </div>   

        <post-modal :post="postSelected" @closeModalPost="closeModalPost"></post-modal>

        <div v-if="totalPages > 0">
            <p>Current page: {{ currentPage }}</p>
            <v-pagination class="mt-3" v-model="currentPage"
                    :page-count="totalPages"
                    :classes="bootstrapPaginationClasses"
                    :labels="paginationAnchorTexts"></v-pagination>
        </div>
  </div>

    </div>
    
</template>    


<script>

import vPagination from 'vue-plain-pagination';

export default {

    components: { vPagination },

    props:['posts', 'totalPages', 'pCurrentPage'],

    created(){
        this.currentPage = this.pCurrentPage;
    },

    methods: {
         postClick: function(post){
            this.postSelected = post;
        },
        closeModalPost: function() {
            this.postSelected = "";
        }
    },

    data: function(){
        return {
            postSelected: {},
            currentPage: 1,
            bootstrapPaginationClasses: {
                ul: 'pagination',
                li: 'page-item',
                liActive: 'active',
                liDisable: 'disabled',
                button: 'page-link'  
            },
            paginationAnchorTexts: {
                first: 'First',
                prev: 'Previous',
                next: 'Next',
                last: 'Last'
            }
        }
    },

    watch: {
        currentPage: function(newValue, oldValue){
            this.$emit('getCurrentPage', newValue);
        }
    },
}
</script>