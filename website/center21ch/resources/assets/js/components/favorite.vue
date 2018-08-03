<template>
    <button type="submit"  :class="classes" @click="taggel">
<font-awesome-icon icon="heart" />


                        <span v-text="favoritesCount"></span>        
                       
        </button>
</template>

<script>
export default {
    props:['reply'], 

    data(){
        return{
            favoritesCount:this.reply.FavoritesCount,
            isfavorited:this.reply.isFavorited,
        }
    
       },
       computed:{
        classes() {
            return['btn',this.isfavorited ? 'btn-primary' : 'btn-defult'];
        },
        rout(){
           return '/replies/'+this.reply.id+'/favorites'

        }

    },
   methods:{

            taggel(){
                return this.isfavorited ? this.favorite(): this.unfavorite();
                
                 
            },
            favorite(){
                axios.delete(this.rout);
                    this.isfavorited =false;
                    this.favoritesCount --;

            },
            unfavorite(){
                  axios.post(this.rout);
                    this.isfavorited =true;
                    this.favoritesCount ++;
            }


    }
    
}
</script>

