<template>
<div>
  
   <h3>please select your location via clicking on the map</h3>

  <gmap-map
    v-bind:center="center"
    v-bind:zoom="3"
    v-bind:map-type-id="mapTypeId"
    v-on:click="location"
                        >
    <gmap-marker
      v-for="(item, index) in markers"
      v-bind:key="index"
      v-bind:position="center=item.position"
     
      v-on:click="center=item.position"
      />
  </gmap-map>
  <br>
<div class="form-group">
 <input type="text" name="lat" id="lat" :value="lat" required >
  <br>
<input type="text" name="lng" id="lng" :value="lng" required >
</div>
</div>
</template>

<script>
export default {
   
  data() {
      
    return {
      center: { lat: -33.865143, lng: 151.209900 },
      mapTypeId: "terrain",
       lat:-33.865143,
       lng:151.209900,
  
      markers: [
        { position: { lat: -33.865143, lng: 151.209900} }
       
      ],
      
    };
    
  },
   methods:{
            location(event){
              
            this.lat =  event.latLng.lat();
            this.lng =  event.latLng.lng()
                        
                         
                   this.markers =[
        { position: { lat:this.lat, lng: this.lng } },
        
      ];
      
                      

                     
        
    
                          
       
            }
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
