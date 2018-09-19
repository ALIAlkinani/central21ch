<template>
<div>
 


  <gmap-map
    v-bind:center="center"
    v-bind:zoom="2"
    v-bind:map-type-id="mapTypeId"
   >
    

    <gmap-marker
      v-for="(item, index) in poem"
      v-bind:key="index"
      v-bind:position="{ lat: +item.lat, lng: +item.lng}"
     
      v-on:click="center={ lat: +item.lat, lng: +item.lng}"
      />
      
  </gmap-map>

     
</div>
</template>

<script>
  

export default {
   
  data() {
    return {
      poem: [],
     
      center: { lat: -33.865143, lng: 151.209900 },
      mapTypeId: "terrain",
       lat:'',
       lng:'',
  
      
    };
    
  },
  created(){

        this.fetch();

    },
       
   methods:{

      fetch(page){
        axios.get('/maps')        
          .then(data =>{
            this.poem = data.data;
           
            
          });
          
            
        },
           
             },
};
</script>

<style lang="scss" scoped>
.vue-map-container {
  height: 450px;
  max-width: 992px;
  width: 100%;
}
</style>
