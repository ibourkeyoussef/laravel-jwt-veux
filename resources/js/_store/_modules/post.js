export const post = {
state: {
    posts: [],

  },
  getters:{
    posts:(state)=> state.posts,

  },
  mutations:{
    Set_post(state,payload){
        state.posts=payload
    }
  },
  actions:{
      get_post(context){
    axios.get('http://localhost:8000/api/post')
    .then(({data}) =>{
         context.commit('Set_post',data.data)
    })
    .catch(erro =>
        console.log(erro)
        )
      }
  }

}
