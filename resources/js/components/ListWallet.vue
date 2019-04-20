<template>
<table boder="1" width="100%">
  <tr><td >id</td><td >Comment</td><td class="w100">pay price</td><td class="w100">type</td><td class="w100" >pay date</td><td class="w100" >C</td></tr>
  <tr v-for="pay in t" v-bind:key="pay.id">
    <td>{{pay.id}}</td>
    <td>{{pay.comment}}</td>
    <td>{{pay.price}}</td>
    <td>{{pay.paytype}}

    </td>
    <td>{{pay.paydate}}</td>
    <td class="w100" >
    <input type="checkbox"  @change="sendchecked(pay.id,checked)"  v-model="checked" v-if="pay.pay_checked==='false'" /></td></tr>

    <tr><td colspan="2" class=""></td><td colspan="4">total:{{totals}}</td></tr>

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
         sendchecked(id,v){
           alert(v)
           axios.get(`/checked?id=${id}&item=pay_checked&value=${v}`).
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
        },
  computed : {
    totals: function() {
      let sum = 0;
      return this.t.reduce((sum, item) => sum + parseInt(item.price), 0);
    }
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


  .locked {
     background-color: #CCC
  }

  .normal {
      background-color:#fff
  }

</style>
