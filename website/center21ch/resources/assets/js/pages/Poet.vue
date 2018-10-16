<script>


export default { 
    props:['poet'],

  
    data(){
        return{
              first_name: this.poet.first_name,
              last_name: this.poet.last_name,
              DOB: this.poet.date_of_birth,
              DOD: this.poet.date_of_death,
              nationality: this.poet.nationality,
              M_language: this.poet.mother_language,            
              about: this.poet.about,

                form: {},
                editing: false
            };
        },
         created () {
            this.resetForm();
        },
        methods: {
           
            
            update () {
                let uri = `/poets/${this.poet.id}`;
                axios.patch(uri,{

              
                    first_name : this.form.first_name,
                    last_name : this.form.last_name,
                    nationality : this.form.nationality,
                    DOB : this.form.DOB,
                    DOD : this.form.DOD,
                    about : this.form.about,
                    M_language : this.form.M_language,
                    })
                    .catch(error => {

                        flash(error.response.data, 'danger');

                    }).then(({ data })=>{
                    this.editing = false;
                    this.first_name = this.form.first_name;
                    this.last_name = this.form.last_name;
                    this.nationality = this.form.nationality;
                    this.DOB = this.form.DOB;
                    this.DOD = this.form.DOD;
                    this.about= this.form.about;
                    this.M_language = this.form.M_language;
                  
                    
                    flash('Your poet has been updated.');
                })
            },
            resetForm () {
                this.form = {
                     first_name: this.poet.first_name,
                     last_name: this.poet.last_name,
                     DOB: this.poet.date_of_birth,
                     DOD: this.poet.date_of_death,
                     nationality: this.poet.nationality,
                     M_language: this.poet.mother_language,            
                     about: this.poet.about,

                };
                this.editing = false; 
            }
    }
}
</script>
