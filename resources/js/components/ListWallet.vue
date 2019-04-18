<template>
<table boder="1" width="100%">
  <tr><td  >Comment</td><td class="w100">pay price</td><td class="w100">type</td><td class="w100" >pay date</td></tr>
  <tr v-for="pay in t" v-bind:key="pay.id">
    <td >{{pay.comment}}</td><td >{{pay.price}}</td><td>{{pay.paytype}}</td><td>{{pay.paydate}}</td></tr>

</table>
</template>

<script>
    import axiso from 'axios';
    export default {

        data(){
          return {
          t:[]
         }
       },methods:{
         resendtext(id,text){
           axios.get(`http://localhost:8000/update?id=${id}`).
           then(res=> this.t = res.data)
           .catch(err=>console.log(err)).then(() => {
             reloadpage();
           });
         },
         sendchecked(id){
           axios.get(`http://localhost:8000/checked?id=${id}`).
           then(res=> this.t = res.data)
           .catch(err=>console.log(err)).then(() => {
             reloadpage();
           });
         }
          ,reloadpage(){
            axios.get('http://localhost:8000/loadjson').
            then(res=> this.t = res.data)
            .catch(err=>console.log(err))
          }
       },
        mounted() {
            axios.get('http://localhost:8000/loadjson').
            then(res=> this.t = res.data)
            .catch(err=>console.log(err))
        }
    }
</script>Hello Today IS: 2019-04-18 15:22:49
Comment	price	type	pydate
s1--

<style scope>
  .w150 {
     width: 150px;
  }
  .w100 {
     width: 100px;
  }

</style>
