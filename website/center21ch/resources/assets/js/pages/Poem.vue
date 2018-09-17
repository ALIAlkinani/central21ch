<script>
import Replies from '../components/Replies.vue';
import translates from '../components/translates.vue';
import NewTranslate from '../components/newTranslate.vue';
import SubscribeButton from '../components/SubscribeButton.vue';

export default { 
    props:['poem'],

     components: {Replies,SubscribeButton,translates,NewTranslate},
    data(){
        return{
                repliesCount: this.poem.replies_count,
                locked: this.poem.locked,
                title: this.poem.title,
                body: this.poem.body,
                form: {},
                editing: false
            };
        },
         created () {
            this.resetForm();
        },
        methods: {
            toggleLock () {
                axios[
                    this.locked ? 'delete' : 'post'
                ]('/locked-poems/' + this.poem.slug);
                this.locked = ! this.locked;
            },
            
            update () {
                let uri = `/poems/${this.poem.channel.slug}/${this.poem.slug}`;
                axios.patch(uri, this.form).then(() => {
                    this.editing = false;
                    this.title = this.form.title;
                    this.body = this.form.body;
                    flash('Your poem has been updated.');
                })
            },
            resetForm () {
                this.form = {
                    title: this.poem.title,
                    body: this.poem.body
                };
                this.editing = false; 
            }
    }
}
</script>
