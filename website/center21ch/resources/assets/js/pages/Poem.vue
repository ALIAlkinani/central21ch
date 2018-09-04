<script>
import Replies from '../components/Replies.vue';
import SubscribeButton from '../components/SubscribeButton.vue';

export default { 
    props:['poem'],

     components: {Replies,SubscribeButton},
    data(){
        return{
                repliesCount: this.poem.replies_count,
                locked: this.poem.locked
            };
        },
        methods: {
            toggleLock () {
                axios[
                    this.locked ? 'delete' : 'post'
                ]('/locked-poems/' + this.poem.slug);
                this.locked = ! this.locked;
            }
    }
}
</script>
