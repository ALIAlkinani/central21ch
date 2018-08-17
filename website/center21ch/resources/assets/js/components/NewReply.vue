<template>
     <div>

     <div v-if="signedIn">
          <div class="form-group">
                <textarea name="body" id="body" class="form-control" 
                placeholder="write someting here" rows="5" required v-model="body">

                </textarea>

     </div>

        <button type="submit" @click="addReply" class="btn btn-primary">Publish</button>
     </div>



        
       <p class="text-center" v-else > 
          Please <a href="/login">SignIn</a> to 
          participate in the discussion</p> 


                         
 </div>             

</template>

<script>
export default {
   
    data(){
        return{
            body:'',
            
        };

    },
    computed:{

         signedIn(){
                return window.App.signedIn;
            },

    },
    methods:{
        addReply(){
            axios.post(location.pathname + '/replies',{ body : this.body })
            .catch(error=> {
                    flash(error.response.data,'danger');
            })
            .then(({data}) =>{
                this.body='';
                flash('you reply has been posted');
                this.$emit('created',data);

            });

        }

    }
    
}
</script>



