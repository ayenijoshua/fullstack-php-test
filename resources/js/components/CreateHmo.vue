<template>
    <div class="container">
        <div class="row ">
            <div class="col-md-8 offset-2">
                <div class="card">
                    <div class="card-header">Create HMO</div>
                    <div class="card-body">
                        <form @submit.prevent="submit()">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input required v-model="form.name" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Code</label>
                                <input required v-model="form.code" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input required v-model="form.email" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Batch type</label>
                                <select required v-model="form.batch_type" class="form-control">
                                    <option :value="null">Select batch type</option>
                                    <option v-for="type,i in batch_types" :key="i" :value="type.value">{{type.name}}</option>
                                </select>
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
                code:'',
                email:'',
                batch_type:null
            },

            batch_types:[
                {name:'encounter date', value:'encounter_date'},
                {name:'sent date', value:'created_at'}
                ]
        }
    },

    methods:{
        submit(){
            axios.post('/api/hmos',this.form).then(res=>{
                if(res.status == 200){
                    toastr.success("Hmo created successully")
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