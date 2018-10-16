<template>






<div class="accordion" id="schedule">

	<section class="accordion-group">

		<div class="accordion-heading">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#schedule" :href="'#'+transalte.language+'_'+transalte.id"  aria-expanded="false"  >
			<font-awesome-icon icon="language" />  {{ transalte.language }}</a>
		</div><!-- accordion heading -->

		<div :id="transalte.language+'_'+transalte.id" class="card card-body collapse">
			<section class="accordion-inner">
				<div v-if="editing">
        <div class="form-group">

            <textarea class="form-control" name="" id="" rows="5" v-model="translate_body"></textarea>
        
         </div>
           <div class="form-group">
                <button class="btn btn-xs mr-1" @click="update"> Save</button>
                <button class="btn btn-primary btn-xs " @click="editing = false"> Cancel</button>
           </div>
        
                                 
    </div>
                 <div v-else v-html="translate_body">
                
                </div>
                
                <div v-if="this.authorize('owns', transalte) || this.authorize('owns', transalte.poem)">
               
                   <div v-if="this.authorize('owns', transalte)" >
                     <button  class="btn btn-xs btn-outline-primary mr-1" @click="editing = true">Edit</button>
                    <button   class="btn btn-outline-danger btn-xs"  @click="destroy">Delete</button>
                   </div>
                
            </div>
	    </section><!-- accordion-inner -->
	  </div><!-- accordion-body -->

	</section><!-- accordion-group -->



</div><!-- schedule accordion -->




        
       
       
       
  
                            
        

       
               
     
     
        
    
      
   

                
</template>

<script>
 import moment from 'moment-timezone';
   export default {
        props: ['transalte'],
       


        data() {
            return {
                editing: false,
                translate_body: this.transalte.translate_body,
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

               translate_body: this.translate_body
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
