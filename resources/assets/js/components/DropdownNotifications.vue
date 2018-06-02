<template>

       <li class="nav-item dropdown">

                    <a class="nav-link px-3" data-toggle="dropdown"><i class="fa fa-bell text-white"></i> 

                    <span class="badge badge-pill up danger" v-if="newNotis>0" v-text="newNotis"></span></a>

                    <div class="dropdown-menu dropdown-menu-right w-md animate fadeIn mt-2 p-0">

                        <div class="scrollable hover" style="max-height: 250px">

                            <div class="list">

                                <div class="list-item" v-bind:class="notification.new == 1 ? 'color-light-blue' : ''" data-id="item-11" v-for="notification in notifications">
                                

                                    <div class="list-body">

                                    <a :href="notification.data.link" class="item-title _500" >New Notification</a>

                                    <div class="item-except text-sm text-muted h-1x" v-text="notification.data.message"></div>

                                        <div class="item-tag tag hide"></div>

                                    </div>

                                    <div>
                                        <span class="item-date text-xs text-muted" >16:00</span>
                                    </div>

                                </div>

                            </div>
                        </div>       

                                <div class="d-flex px-3 py-2 b-t">

                                <div class="flex">
                                 <span><i v-text="notifications.length"></i> Notifications</span>
                                </div>

                                <a href="/timeline">See all <i class="fa fa-angle-right text-muted"></i></a>

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
