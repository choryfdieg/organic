<template>

    <div>

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
                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" v-model="contact.nombre">
            </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputCity">Telefono</label>
                <input type="text" class="form-control" id="inputCity" v-model="contact.telefono">
                </div>                
            </div>
            <div class="form-group">
                <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Check me out
                </label>
                </div>
            </div>
            <button @click="saveContact" type="submit" class="btn btn-primary">Send</button>
        </form>

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
