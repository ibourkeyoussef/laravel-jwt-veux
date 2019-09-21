<template>
<div>
    <h1>Edit</h1>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="form-group">
                <label for="title">title</label>
                <input type="text" name="title" v-model="post.title" v-validate="'required|min:2'" autocomplete="off" class="form-control" :class="{'is-invalid':errors.has('title') , 'is-valid':!errors.count()   }" />
                <p class="invalid-feedback" v-if="errors.has('title')">{{ errors.first('title')}}</p>
            </div>
            <div class="form-group">
                <label for="body">body</label>
                <input type="text" name="body" v-validate="'required|min:4'" v-model="post.body" class="form-control" :class="{'is-invalid':errors.has('body') , 'is-valid':!errors.count()   }" />
                <div v-if="errors.has('body')" class="invalid-feedback">{{errors.first('body')}}</div>
            </div>

            <div class="form-group">
                <label for="image">image</label>
                <input type="file" name="image" v-validate="'image'" @change="UImage($event)" class="form-control" :class="{'is-invalid':errors.has('image') , 'is-valid':!errors.count()   }" />
                <div v-if="errors.has('image')" class="invalid-feedback">{{errors.first('image')}}</div>
            </div>
            <button @click.prevent="UpdatePost" class="btn btn-block btn-warning">Update</button>
            <router-link class="btn btn-block btn-dark mt-2" :to="{name:'post-index'}">Back</router-link>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            post: {
                title: '',
                body: '',
                image:''
            }
        }
    },
    mounted() {
        const url = `http://localhost:8000/api/post/${this.$route.params.id}`;
        axios.get(url)
            .then(({
                data
            }) => {
                this.post = data.data;

            })
            .catch(errors => {
                console.log(errors)
            })

    },
    methods: {
        UpdatePost() {
            this.$validator.validate().then(valid => {
                    if (valid) {
                         let formdata = new FormData();
          Object.keys(this.post).forEach(key =>
            formdata.append(key, this.post[key])
          );
          console.log(formdata);

                         const url = `http://localhost:8000/api/post/${this.$route.params.id}`;
                       axios.put(url,this.post)
                       .then(res =>{
                        //   this.$route.push({name:'post-index'})

                       })
                    }
                })
            },
            UImage(event){

                //    this.post.image=event.target.files[0];
                 let file = event.target.files[0];
                let reader = new FileReader();


                reader.onloadend = (file) => {
                    this.post.image = reader.result;
                }
                reader.readAsDataURL(file);
                console.log( reader);


            }
        },

    }
</script>

<style lang="scss" scoped>
</style>
