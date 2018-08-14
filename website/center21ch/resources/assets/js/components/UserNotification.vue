<template>
<li class="dropdown" v-if="notifications.length" >
    <a  class="nav-link dropdown" href="#" data-toggle="dropdown" >

<font-awesome-icon icon="bell" />
    </a>
    <ul class="dropdown-menu dropdown-menu-right">
        <li v-for="notification in notifications" :key="notification.id">
            <a :href="notification.data.link" v-text="notification.data.message" @click="markAsRead(notification)"> </a>
        </li>


    </ul>

    
    
 </li>  
</template>
<script>
export default {

    data(){
        return{
        notifications :false,
    }
    },
    created(){
        axios.get("/profile/"+ window.App.user.name+"/notifications")
        .then(response => this.notifications = response.data);
    },
    methods:{
        markAsRead(notification){
            axios.delete("/profile/"+ window.App.user.name+"/notifications/" + notification.id);
                
        }
    }
}
</script>

<style>
ul.dropdown-menu{
    width:max-content;

}
</style>



