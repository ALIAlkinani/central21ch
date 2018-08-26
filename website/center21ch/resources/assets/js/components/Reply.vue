<template>

<div>  
  <br>
        <div :id="'reply-'+id" class="card text-white bg-danger mb-3">  
            
               
            <div class="card-header level">
            
                <h5 class="flex"><a :href="'/profile/'+data.owner.name" v-text="data.owner.name"></a> said at
                    <span v-text="ago"></span></h5>
                <div v-if="signedIn">
                  
                    <favorite :reply="data"></favorite>
                   
                    </div>
            </div>
         
            <div  class="card-body">
              

                        
     <div v-if="editing">
    <div class="form-group">
        <textarea class="form-control" v-model="body"></textarea>
         <button class="btn btn-xs mr-1" @click="update"> Save</button>
        <button class="btn btn-primary btn-xs " @click="editing = false"> Cancel</button>
    </div>
                                 
    </div>
                 <div v-else v-html="body">
                
                </div>


              
                    
          <div v-if="canUpdate">
                <div class="card-footer">
               
                    <button  class="btn btn-xs mr-1" @click="editing = true">Edit</button>
                    <button   class="btn btn-danger btn-xs"  @click="destroy">Delete</button>
               
            </div>
          </div>
               
            </div>
               
            
            
          <!--   @can('update', $reply)
    
                
            @endcan -->
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
        props: ['data'],
       


        data() {
            return {
                editing: false,
                body: this.data.body,
                id: this.data.id,
                created_at: this.data.created_at,

            
            };
        },
        computed:{
            ago(){
                return moment.tz(this.data.created_at,"America/Danmarkshavn").fromNow();

            },
            signedIn(){
                return window.App.signedIn;
            },
        canUpdate(){
            return this.authorize(user => this.data.user_id == user.id);
        }

        },
        methods:{
            update(){
                axios.patch('/replies/'+this.data.id,{

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

                 axios.delete('/replies/'+this.data.id);

                 this.$emit('deleted',this.data.id);


                         flash('Deleted!, your commit was deleted successfully.', 'warning');
        

                 
             }
           
 
           

        }

       
    }
</script>
