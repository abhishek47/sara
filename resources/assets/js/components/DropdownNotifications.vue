<template>

       <li class="nav-item dropdown">

                    <a class="nav-link px-3" data-toggle="dropdown"><i class="fa fa-bell text-white"></i> 

                    <span class="badge badge-pill up danger" v-if="newNotis>0" v-text="newNotis"></span></a>

                    <div class="dropdown-menu" style="width: 300px;
    white-space: normal;">

                        <a  style="width: 300px;
    white-space: normal;" v-for="notification in notifications" :href="notification.data.link" class="dropdown-item" >New Notification <br> <span style="color: grey;" v-text="notification.data.message"></span></a>

                       
                         <a href="/timeline" class="dropdown-item"><i v-text="notifications.length"></i> Notifications - View All</a>
                           
                    </div>       

                            

                           
                       

                   </div>

                </li>
                
</template>

<script>
    export default {

        props: ['user'],

      

        mounted() {
            console.log('Component mounted.');
        },

        data() {
           return { notifications : [], newNotis : 0 }
        },

        created() {
            axios.get('/notifications/8').then(response => this.notifications = response.data);

             Echo.private('App.User.'+this.user.id).notification((notification) => {
                     
                     console.log(notification);

                     var notificationElement = {};

                     notificationElement['data'] = notification;
                     notificationElement['created_at'] = moment().format();
                     notificationElement['new'] = 1;

                     this.newNotis += 1;


                     playAlert();

                     //window.notie.alert({ type: 'success', text: notification.message, time: 7 , position: 'top'});

                     this.notifications.unshift(notificationElement);

                     this.flashy(notification.message, notification.link);


                });
        },

          flashy(message, link) {
                var template = $($("#flashy-template").html());
                $(".flashy").remove();
                template.find(".flashy__body").html(message).attr("href", link || "#").end()
                 .appendTo("body").hide().fadeIn(300).delay(2800).animate({
                    marginRight: "-100%"
                }, 300, "swing", function() {
                    $(this).remove();
                });
            }
    }
</script>
