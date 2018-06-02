<template>

      
                        <div class="card card-shadow">
                            <div class="card-body">
                            <span class="badge success float-right" v-text="notifications.length"></span>

                            <h3 class="m-b-20 card-title font-bold">Recent Activity</h3>

                            <div v-if="notifications.length" class="streamline">
                                <div class="sl-item b-info" style="margin-bottom: 10px;border-bottom: 1px solid #ccc;" v-for="notification in notifications">
                                    
                                    <div class="sl-content"><span class="sl-date text-muted" v-text="notification.created_at"></span>
                                        <div>
                                            <a :href="notification.data.link" class="" v-text="notification.data.message"></a> 
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div v-else>
                                <p>You have no recent activities.</p>
                            </div>

                            
                           </div>
                        </div>
                  
                
</template>

<script>
    export default {

        props: ['user', 'count'],

      

        mounted() {
            console.log('Component mounted.');
        },

        data() {
           return { notifications : [] }
        },

        created() {
            axios.get('/notifications/'+this.count).then(response => this.notifications = response.data);

             Echo.private('App.User.'+this.user.id).notification((notification) => {
                     
                     console.log(notification);

                     var notificationElement = {};

                     notificationElement['data'] = notification;
                     notificationElement['created_at'] = moment().format();
                     notificationElement['new'] = 1;

                     this.notifications.pop();

                     this.notifications.unshift(notificationElement);




                });
        },


       
    }
</script>
