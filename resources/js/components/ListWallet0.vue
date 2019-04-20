<template>
<table boder="1" width="100%">
  <tr><td >id</td><td >Comment</td><td class="w100">pay price</td><td class="w100">type</td><td class="w100" >pay date</td><td class="w100" >C</td></tr>
  <tr v-for="pay in t" v-bind:key="pay.id">
    <td>{{pay.id}}</td>
    <td ><input v-model="pay.comment" @blur="resendtext(pay.id,pay.comment)" placeholder="edit me"><span v-show="false">{{pay.comment}}</span></td>
    <td >{{pay.price}}</td><td @click="changetype(pay.id,pay.paytype)" >{{pay.paytype}}</td>
    <td>{{pay.paydate}} </td>
    <td class="w100" ><input type="checkbox"  @click="sendchecked(pay.id)" /></td>
  </tr>

    <tr><td colspan="2" class=""></td><td colspan="4">total:{{total}}</td></tr>

</table>
</template>

<script>
    import axiso from 'axios';
    export default {

        data(){

          return {
          t:[],
          status:[],
          total:0

         }
       },methods:{
         resendtext(id,text){
           axios.get(`/update?id=${id}&item=comment&value=${text}`)
           .catch(err=>console.log(err));
         },
         changetype(id,p){
           var ａ=["食","衣","住","行","育","樂","智"];
           axios.get(`/update?id=${id}&item=paytype&value=1`).
           then(res=> this.status = res.data)
           .catch(err=>console.log(err)).then(() => {
             reloadpage();
           });
         }

         ,
         sendchecked(id){
           axios.get(`/update?id=${id}&item=pay_checked&value=1`).
           then(res=> this.status = res.data)
           .catch(err=>console.log(err)).then(() => {
             reloadpage();
           });
         }
          ,reloadpage(){
            axios.get('/loadjson').
            then(res=> this.t = res.data)
            .catch(err=>console.log(err))
          }
       },
        mounted() {
            axios.get('/loadjson').
            then(res=> this.t = res.data)
            .catch(err=>console.log(err));
        }
    }
</script>

<style scope>
  .w150 {
     width: 150px;
  }
  .w100 {
     width: 100px;
  }

</style>
