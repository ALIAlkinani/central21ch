<template>
<aside class="Translates">
                        <h2>Translates</h2>
                        <p>There is many tranlates and poem please.
                        Make sure you check out the <a href="#"> others translates</a> for more information</p>
<div>
    <div v-for=" (transalte, index) in items" :key="transalte.id">
        <transalte :transalte="transalte" @deleted="remove(index)"></transalte>


    </div >

 
        <!-- <new-translate @created="add" ></new-translate> -->

  
</div>
        </aside>
</template>
<script>
import Transalte from './translate.vue';
import NewTranslate from './newTranslate.vue';
import collections from '../mixins/collections';
export default {
    props:['data'],
 
     components: {Transalte,NewTranslate},
     mixins : [collections],

    data(){
        return{
           
            items:this.data,
            
        }
    },
   
}
</script>

