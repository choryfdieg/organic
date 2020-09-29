<template>

    <div class="col-8 offset-2">
        <div class="card">
            <img class="card-img-top logo_200 m-md-auto d-block" v-bind:src=" '/images/img_categories/customer-care.svg'" alt="Card image cap">
            <div class="card-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="Email" v-model="contact.email">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Nombre</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="Señor Pepito Perez" v-model="contact.nombre">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">Telefono</label>
                            <input type="text" class="form-control" id="inputCity" v-model="contact.telefono">
                        </div>                
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="content">Contenido</label>
                            <textarea name="content" id="content" cols="50" class="form-control" v-model="contact.comentarios"></textarea>
                        </div>
                    </div>
                    <button @click="saveContact" type="submit" class="btn btn-primary">Send</button>
                </form>

            </div>
        </div>
    </div>

        
</template>

<script>
export default {

    methods: {
        saveContact: function(){
            console.log(this.contact);
        }
    },

    data: function(){
        return {
            contact: {}
        }
    },

    
}
</script>
