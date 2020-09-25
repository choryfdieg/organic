<!-- Modal -->
<template>
    <div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="postModalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="postModalTitle">{{post.title}}</h5>
                    <button type="button" @click="clean" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{post.content}}
                </div>            
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['post'],
    data: function(){
        return {
        }
    },
    mounted() {
    },
    watch: {
        post: function(newValue, oldValue){
            if(typeof(newValue) == 'object'){
                $("#postModal").modal('show');
            }
        }
    },
    methods: {
        clean: function(){
            this.$emit('closeModalPost');
        }
    },


}
</script>
    