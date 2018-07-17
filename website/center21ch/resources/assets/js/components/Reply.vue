<template>

<div>  
  <br>
        <div :id="'reply-'+id" class="card">  
            
               
            <div class="card-header">
            
                <h5 class="flex"><a :href="'/profile/'+data.owner.name" v-text="data.owner.name"></a> said at
                    {{ data.created_at }}</h5>
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
                 <div v-else >
                 {{ body }}
                </div>


              
                    
          <div v-if="canUpdate">
                <div class="panel-footer">
               
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
                    });
                    this.editing =false;

                   flash('Updated!');
             },

             destroy(){

                 axios.delete('/replies/'+this.data.id);

                 this.$emit('deleted',this.data.id);



        

                 
             }
           
 
           

        }

       
    }
</script>
