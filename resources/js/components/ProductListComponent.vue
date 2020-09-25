<template>
    <div class="row featured__filter">
        <div v-bind:class="'col-lg-3 col-md-4 col-sm-6 mix oranges category_' + product.category_product_id" v-for="product in products">
            <div class="featured__item">
                <div class="featured__item__pic set-bg" data-setbg="images/img/featured/feature-1.jpg">
                    <ul class="featured__item__pic__hover">
                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                </div>
                <div class="featured__item__text">
                    <h6><a href="#">{{product.title}}</a></h6>
                    <h5>${{product.price}}</h5>
                </div>
            </div>
        </div>        
    </div>
    
</template>
<script>
export default {

    created(){
        this.getProducts();        
    },

    methods: {

        getProducts(){

            fetch('/api/product/')
                .then(response => response.json())
                .then(json => this.products = json.data.data).then(ele => console.log(ele));
        },

    },

    data: function(){
        return {
            products: []
        }
    },
}
</script>