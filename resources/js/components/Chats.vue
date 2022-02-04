<template>
      <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-md-6">
                    <div class="card card-bordered">
                        <div class="card-header">
                        </div>
                        <div class="ps-container ps-theme-default ps-active-y" id="chat-content"
                            style="overflow-y: scroll !important; height:400px !important;">

                            <form>
                            <!-- <input :value="csrf" type="hidden" name="_token" ></input> -->
                                <div class="form-group" v-for=" item in msg" :key="item.id">
                                    <div v-if="users == item.user_id">
                                        <div class="media media-chat"> <img class="avatar"
                                                src="https://img.icons8.com/color/36/000000/administrator-male.png"
                                                alt="...">
                                            <div class="media-body">
                                                <p>

                                                    {{ item.message }}
                                                </p>
                                                <p class="meta">{{ item.created_at }}</p>
                                            </div>
                                        </div>
                                    </div>

                                   <div v-else>
                                        <div class="media media-chat media-chat-reverse">
                                            <img class="avatar"
                                                src="https://img.icons8.com/color/36/000000/administrator-male.png"
                                                alt="...">
                                            <div class="media-body">
                                                <p> {{ item.message }}</p>

                                                <p class="meta">{{ item.created_at }}</p>
                                            </div>
                                        </div
                                    </div>


                            </div>


                            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                                <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                            </div>
                            <div class="ps-scrollbar-y-rail" style="top: 0px; height: 0px; right: 2px;">
                                <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 2px;"></div>
                            </div>
                        </div>
                        <div class="publisher bt-5 border-light"> <img class="avatar avatar-xs"
                                src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="..."> <input
                                class="publisher-input" v-model="message" type="text" id="text-form" placeholder="Write something">
                                <button class="publisher-btn text-info" type="button" id="send" @click="sends"
                                data-abc="true"><i class="fa fa-paper-plane"></i></button>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</template>
<script>
import axios from 'axios'
 import Echo from "laravel-echo";

export default {
       data() {
        return {
               csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                message:null,
                msg:this.messages
        };

    },
    props:{
         messages: {
          type: Array,
          default: () => []
      },
      entreprises:{
          type: Object,
      },
      users:{
          type: Number,
      }

    },
    methods:{
        sends(){
                // console.log('e')
            axios.post(`/message/${ this.entreprises.id }`, {'message':this.message})
           .then(response => {
                console.log(response.data)
                 this.message=""
                });
         },
  
    },
    mounted(){

  window.Echo.channel('chat')
            .listen('WebsocketDemoEvent', (e) => {
              if(e.message.entreprise_id == this.entreprises.id  ){
 this.msg.push(e.message);
                    //   console.log(e.message);
              }

                    //   console.log(this.messages);
            });
    

    }
}

</script>
