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
    
      v-on:click="toggleInfoWindow(item,index)"
      /> 
      
   <gmap-info-window
        :options="infoOptions"
        :position="infoWindowPos"
        :opened="infoWinOpen"
        @closeclick="infoWinOpen=false"
      >
        <div v-html="infoContent"></div>
     
      
    </gmap-info-window>
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
  
       infoContent: '',
        infoWindowPos: {
          lat: 0,
          lng: 0
        },
        infoWinOpen: false,
        currentMidx: null,
         //optional: offset infowindow so it visually sits nicely on top of our marker
        infoOptions: {
          pixelOffset: {
            width: 0,
            height: -35
          }
        }
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
           console.log(this.poem);
            
          });
          
            
        },
        toggleInfoWindow: function (item, idx) {
        this.infoWindowPos = { lat: +item.lat, lng: +item.lng};
        this.infoContent = this.getInfoWindowContent(item);
        

        //check if its the same marker that was selected if yes toggle
        if (this.currentMidx == idx) {
          this.infoWinOpen = !this.infoWinOpen;
        }
        //if different marker set infowindow to open and reset current marker index
        else {
          this.infoWinOpen = true;
          this.currentMidx = idx;
        }
      },

           
               getInfoWindowContent: function (marker) {
        return (`<div class="map-card">
  
    <div class="map-level">
            <img src="${ marker.creator.avatar_path }"
                 alt="${ marker.creator.name }"
                 width="50"
                 height="50"
                 class="mr-1 rounded-circle">

            <span class="flex" >
                <a href="/profile/">${ marker.creator.name }</a> posted: <span></span>
            </span>
  </div>
  <div class="card-content">
    <div class="media">
      <div class="media-content">
         <a href="/poems/${marker.channel.slug}/${marker.slug}"><h5>${marker.title}</h5></a>
      </div>
    </div>
    <div class="content">
      ${marker.body}
      <br>
      <time datetime="${marker.created_at}"></time> 
      <p>translates: ${marker.translates_count} </p>
    </div>
  </div>
</div>`);
      },
    }
};
</script>

<style lang="scss" scoped>
.vue-map-container {
  height: 450px;
  max-width: 992px;
  width: 100%;
}
</style>
