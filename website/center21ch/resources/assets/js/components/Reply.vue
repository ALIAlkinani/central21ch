<template>
 <div >
  
            
     <div v-if="editing">
    <div class="form-group">
        <textarea class="form-control" v-model="body"></textarea>
         <button class="btn btn-xs mr-1" @click="update"> Save</button>
        <button class="btn btn-primary btn-xs " @click="editing = false"> Cancel</button>
    </div>
                                 
    </div>
                 <div v-else >
                 {{ body }}
                </div>


              
                    
            <div class="panel-footer">
                
                    <button  class="btn btn-xs mr-1" @click="editing = true">Edit</button>
                    <button   class="btn btn-danger btn-xs"  @click="destroy">Delete</button>
               
            </div>
 </div>

                
</template>

<script>
   export default {
        props: ['attributes'],


        data() {
            return {
                editing: false,
                body: this.attributes.body,
                created_at: this.attributes.created_at,

            
            };
        },
        methods:{
            update(){
                axios.patch('/replies/'+this.attributes.id,{

                body: this.body
                    });
                    this.editing =false;

                   flash('Updated!');
             },

             destroy(){

                 axios.delete('/replies/'+this.attributes.id);

                 $(this.$el).fadeOut(300,()=>{
                     flash('The reply has been deleted');

                 });

                 
             }
           

           

        }

       
    }
</script>
