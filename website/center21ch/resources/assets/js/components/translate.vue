<template>

<div>  
  <br>
        <div :id="'transalte-'+id" >  
            
        <p>
        <a  data-toggle="collapse" :href="'#'+transalte.language" role="button" aria-expanded="false" aria-controls="collapseExample" v-text="transalte.language">

                  
        </a>
       
       
        <div class="collapse" :id="transalte.language">
        <div class="card card-body">
                            
        <div v-if="editing">
        <div class="form-group">

            <textarea name="" id="" cols="30" rows="10" v-model="body"></textarea>
        
            
            <button class="btn btn-xs mr-1" @click="update"> Save</button>
            <button class="btn btn-primary btn-xs " @click="editing = false"> Cancel</button>
        </div>
                                 
    </div>
                 <div v-else v-html="body">
                
                </div>
                
                <div v-if="this.authorize('owns', transalte) || this.authorize('owns', transalte.poem)">
               
                   <div v-if="this.authorize('owns', transalte)" >
                     <button  class="btn btn-xs btn-outline-primary mr-1" @click="editing = true">Edit</button>
                    <button   class="btn btn-outline-danger btn-xs"  @click="destroy">Delete</button>
                   </div>
                
            </div>

        </div>
        </div>
           
            
            
               
            </div>
         
           
              

    

              
                    

           
          </div>
               
     
     
        
    
      
   

                
</template>

<script>
 import moment from 'moment-timezone';
   export default {
        props: ['transalte'],
       


        data() {
            return {
                editing: false,
                body: this.transalte.body,
                id: this.transalte.id,
                created_at: this.transalte.created_at,
                isBest : this.transalte.isBest,
                

            
            };
        },
        computed:{
                 
            },
             created () {
            window.events.$on('best-reply-selected', id => {
                this.isBest = (id === this.id);
            });
        },
        methods:{
            update(){
                axios.patch('/translates/'+this.id,{

                body: this.body
                    })
                    .catch(error => {

                        flash(error.response.data, 'danger');

                    }).then(({ data })=>{
                         this.editing =false;

                         flash('Updated!,you text was updated successfully..');

                    })
                   
             },

             destroy(){

                 axios.delete('/translates/'+this.id);

                 this.$emit('deleted',this.id);


                         flash('Deleted!, your commit was deleted successfully.', 'warning');
                         
             },

             markBestReply(){

                 axios.post('/translates/' + this.id + '/best');

                window.events.$emit('best-reply-selected', this.id);             

             }
           
 
           

        }

       
    }
</script>
