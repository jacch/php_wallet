<template>
<table class="table table-striped table-bordered">
  <tr><td >id</td><td >Comment</td><td class="w100">pay price</td><td class="w100">type</td><td class="w100" >pay date</td><td class="w100" >C</td></tr>
  <tr v-for="pay in t" v-bind:key="pay.id" v-if="pay.pay_checked=='false'" class="{pay.pay_checked=='false'?'':'text-danger'}">
    <td>{{pay.id}}</td>
    <td ><input v-model="pay.comment" @blur="resendtext(pay.id,pay.comment)" placeholder="edit me"></td>
    <td ><input v-model="pay.price" @blur="resendprice(pay.id,pay.price)" placeholder="edit me"> </td>
    <td ><input v-model="pay.paytype" @blur="resendtype(pay.id,pay.paytype)" placeholder="edit me"></td>
    <td><input v-model="pay.paydate" @blur="resenddate(pay.id,pay.paydate)" placeholder="edit me"></td>
    <td class="w100" ></td></tr>

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
         resendprice(id,text){
           axios.get(`/update?id=${id}&item=price&value=${text}`)
           .catch(err=>console.log(err));
         },
         resendtype(id,text){
           axios.get(`/update?id=${id}&item=paytype&value=${text}`)
           .catch(err=>console.log(err));
         }
          ,
         resenddate(id,text){
           axios.get(`/update?id=${id}&item=paydate&value=${text}`)
           .catch(err=>console.log(err));
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
