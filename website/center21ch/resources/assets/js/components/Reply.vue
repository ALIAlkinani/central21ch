<template>

<div>  
  <br>
        <div :id="'reply-'+id" class="card text-white mb-3" :class="isBest ? 'bg-success': 'bg-info '">  
            
               
            <div class="card-header level">
            
                <h5 class="flex"><a :href="'/profile/'+reply.owner.name" v-text="reply.owner.name"></a> said at
                    <span v-text="ago"></span></h5>
                <div v-if="signedIn">
                  
                    <favorite :reply="reply"></favorite>
                   
                    </div>
            </div>
         
            <div  class="card-body">
              

                        
     <div v-if="editing">
    <div class="form-group">
        <wysiwyg v-model="body"></wysiwyg>
         <button class="btn btn-xs mr-1" @click="update"> Save</button>
        <button class="btn btn-primary btn-xs " @click="editing = false"> Cancel</button>
    </div>
                                 
    </div>
                 <div v-else v-html="body">
                
                </div>


              
                    

                <div class="card-footer level " v-if="this.authorize('owns', reply) || this.authorize('owns', reply.poem)">
               
                   <div v-if="this.authorize('owns', reply)" >
                     <button  class="btn btn-xs btn-outline-light mr-1" @click="editing = true">Edit</button>
                    <button   class="btn btn-outline-dark btn-xs"  @click="destroy">Delete</button>
                   </div>
                 <button class="btn btn-sx btn-outline-light ml-a"  @click="markBestReply" v-if="this.authorize('owns', reply.poem)" v-show="!isBest">Best Reply?</button>
            </div>
           
          </div>
               
            </div>
     
        
    
      
        
    <div class="format-contoller">
        <br>
       <!--  {{ $replies->links() }} -->
    </div>


</div>

                
</template>

<script>
 import moment from 'moment-timezone';
   export default {
        props: ['reply'],
       


        data() {
            return {
                editing: false,
                body: this.reply.body,
                id: this.reply.id,
                created_at: this.reply.created_at,
                isBest : this.reply.isBest,
                

            
            };
        },
        computed:{
            ago(){
                return moment.tz(this.reply.created_at,"America/Danmarkshavn").fromNow();

            }        
            },
             created () {
            window.events.$on('best-reply-selected', id => {
                this.isBest = (id === this.id);
            });
        },
        methods:{
            update(){
                axios.patch('/replies/'+this.id,{

                body: this.body
                    })
                    .catch(error => {

                        flash(error.response.data, 'danger');

                    }).then(({ data })=>{
                         this.editing =false;

                         flash('Updated!,you commit was updated successfully..');

                    })
                   
             },

             destroy(){

                 axios.delete('/replies/'+this.id);

                 this.$emit('deleted',this.id);


                         flash('Deleted!, your commit was deleted successfully.', 'warning');
                         
             },

             markBestReply(){

                 axios.post('/replies/' + this.id + '/best');

                window.events.$emit('best-reply-selected', this.id);             

             }
           
 
           

        }

       
    }
</script>
