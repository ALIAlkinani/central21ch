<template>
    <div>
        <div class="col-lg-5">
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object dp img-circle" :src="avatar" style="width: 100px;height:100px;">
            </a>
            <div class="media-body">
               <h1 v-text="poet.last_name"></h1>
               
        <form method="POST" enctype="multipart/form-data">
        <div v-if="signedIn">
            <image-upload name="avatar" class="mr-1" @loaded="onLoad"></image-upload>

            </div>
        </form>
            </div>
        </div>

    </div>

    </div>
</template>
<script>
    import ImageUpload from './ImageUpload.vue';
    export default {
        props: ['poet'],
        components: { ImageUpload },
        data() {
            return {
                avatar: this.poet.avatar_path
            };
        },
        
    
        methods: {
            onLoad(avatar) {
                this.avatar = avatar.src;
                this.persist(avatar.file);
            },
            persist(avatar) {
                let data = new FormData();
                data.append('avatar', avatar);
                axios.post(`/api/poets/${this.poet.id}/avatar`, data)
                    .then(() => flash('Avatar uploaded!'));
            }
        }
    }
</script>
<style>
.media
    {
        /*box-shadow:0px 0px 4px -2px #000;*/
        margin: 20px 0;
        padding:30px;
    }
    .dp
    {
        border:10px solid #eee;
        transition: all 0.2s ease-in-out;
    }
    .dp:hover
    {
        border:2px solid #eee;
        transform:rotate(360deg);
        -ms-transform:rotate(360deg);  
        -webkit-transform:rotate(360deg);  
        /*-webkit-font-smoothing:antialiased;*/
    }
</style>
