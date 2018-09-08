<template>
     <div>

     <div v-if="signedIn">
          <div class="form-group">
                <wysiwyg name="body" v-model="body" placeholder="Have something to say?" :shouldClear="completed"></wysiwyg>

     </div>

        <button type="submit" @click="addReply" class="btn btn-primary">Publish</button>
     </div>



        
       <p class="text-center" v-else > 
          Please <a href="/login">SignIn</a> to 
          participate in the discussion</p> 


                         
 </div>             

</template>

<script>
 import 'at.js';
 import 'jquery.caret'; 
export default {
   

   
    data(){
        return{
            body:'',
            completed: false,
        };

    },
    mounted() {
            $('#body').atwho({
                at: "@",
                delay: 750,
                callbacks: {
                     remoteFilter: function(query, callback) {
                        $.getJSON("/api/users", {name: query}, function(usernames) {
                            callback(usernames) 
                            
                         }); 
                       
                    }
                }
            });
        },
    methods:{
        addReply(){
            axios.post(location.pathname + '/replies',{ body : this.body })
            .catch(error=> {
                    flash(error.response.data,'danger');
            })
            .then(({data}) =>{
                this.body='';
                this.completed = true;
                flash('you reply has been posted');
                this.$emit('created',data);

            });

        }

    }
    
}
</script>



