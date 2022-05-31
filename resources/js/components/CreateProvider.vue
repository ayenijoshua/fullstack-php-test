<template>
    <div class="container">
        <div class="row ">
            <div class="col-md-8 offset-2">
                <div class="card">
                    <div class="card-header">Create Provider</div>
                    <div class="card-body">
                        <form @submit.prevent="submit()">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input required v-model="form.name" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input required v-model="form.email" type="text" class="form-control">
                            </div>
                            <button type="submit" class="form-control btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {

    data(){
        return {
            form:{
                name:'',
                email:'',
            },
        }
    },

    methods:{
        submit(){
            axios.post('/api/providers',this.form).then(res=>{
                if(res.status == 200){
                    toastr.success("Provider created successully")
                }
            }).catch(err=>{
                if(err.response.status == 422){
                    toastr.error(err.response.data.message)
                }else{
                    toastr.error("An error occured")
                }
            })
        }
    }
    
}
</script>