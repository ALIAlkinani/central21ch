<template>
<div v-if="signedIn">
        <button :class="classes" @click="subscribe">Subscribe</button>

</div>
</template>
<script>
export default {
    props:['active'],
    data(){
        return{

            active1 :this.active,

        }

    },
    computed:{
        classes(){
            return ['btn', this.active1 ? 'btn-primary' : 'btn-default'];
        },
        signedIn(){
                return window.App.signedIn;
            },

    },
    methods:{
        subscribe(){
            axios[this.active1 ? 'delete' : 'post'](location.pathname + '/subscriptions');

            this.active1 = !this.active1;
            
        }
    }
    
}
</script>



