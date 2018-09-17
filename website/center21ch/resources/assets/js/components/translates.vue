<template>
<div>
    <div v-for=" (transalte, index) in items" :key="transalte.id">
        <transalte :transalte="transalte" @deleted="remove(index)"></transalte>


    </div >

 
        <!-- <new-translate @created="add" ></new-translate> -->

  
</div>
    
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

