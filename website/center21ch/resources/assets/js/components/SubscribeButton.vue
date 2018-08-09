<template>
    <button :class="classes" @click="subscribe">Subscribe</button>
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
        }

    },
    methods:{
        subscribe(){
            axios[this.active1 ? 'delete' : 'post'](location.pathname + '/subscriptions');

            this.active1 = !this.active1;
            
        }
    }
    
}
</script>
