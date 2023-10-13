<template>
    <!-- Begin Page Content -->
    <div class="container-fluid mt-10">
        <loader v-if="loading" class="loading-box"></loader>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <div class="box rounded">


                        <div class="grid grid-cols-12 gap-4 p-4 rounded bg-gray-50 shadow">

                            <section class="col-span-12 md:col-span-6">
                                <div class="rounded">
                                    <h3 class="text-center">
                                        Product Details
                                    </h3>
                                </div>
                                <div class="">
                                    <div class="card text-black">
                                        <i class="fab fa-apple fa-lg pt-3 pb-1 px-3"></i>
                                        <img
                                            src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/3.webp"
                                            class="card-img-top" alt="Apple Computer"/>
                                        <div class="card-body">
                                            <div class="text-center">
                                                <h5 class="card-title">Believing is seeing</h5>
                                                <p class="text-muted mb-4">Apple pro display XDR</p>
                                            </div>
                                            <div>
                                                <div class="d-flex justify-content-between">
                                                    <span>Pro Display XDR</span><span>$5,999</span>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <span>Pro stand</span><span>$999</span>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <span>Vesa Mount Adapter</span><span>$199</span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between total font-weight-bold mt-4">
                                                <span>Total</span><span>$7,197.00</span>
                                            </div>

                                            <button class="btn btn-success justify-center" @click="addFeedBack"
                                                    type="button">
                                                <i class="fa fa-fw fa-lg fa-comment"></i> Feedback
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </section>


                            <section class="col-span-12 md:col-span-6">
                                <div class="rounded">
                                    <h3 class="text-center">
                                        Feedbacks
                                    </h3>
                                </div>
                                <div class="">
                                    <tempalte v-for="(feedback,index) in feedbacks"
                                              v-bind:key="feedback.id">
                                        <div class="card shadow-0 border rounded-3">
                                            <div class="card-body">
                                                <div class="flex gap-4 items-start">
                                                    <div class="w-[20%]">
                                                        <div
                                                            class="bg-image hover-zoom ripple rounded ripple-surface rounded-circle ">
                                                            <img
                                                                src="https://images.unsplash.com/photo-1604072366595-e75dc92d6bdc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8ZmFrZSUyMHdvbWFufGVufDB8fDB8fHww&w=1000&q=80"
                                                                class="w-20 h-20 object-cover rounded-circle"/>
                                                            <a href="#!">
                                                                <div class="hover-overlay">
                                                                    <div class="mask"
                                                                         style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="w-[80%]">
                                                        <div class="flex justify-between w-full items-center">
                                                            <h5>{{ feedback ? feedback.title : '' }}</h5>
                                                            <div class="d-flex flex-row">
                                                                <div class="text-danger mb-1 me-2">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mt-1 mb-0 text-muted small">
                                                            <span>{{ feedback ? feedback.description : '' }}</span>
                                                        </div>
                                                        <div class="flex justify-between w-full items-center">
                                                            <div class="mb-2 text-muted small">
                                                                <span>{{ feedback ? feedback.created_at : '' }}</span>

                                                            </div>
                                                            <div>
                                                                <button @click="showDiv(index)"
                                                                        class="btn btn-primary form-control">
                                                                    Reply
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2 text-muted small">
                                                            <button type="button" @click="addLike(feedback.id,'like')">
                                                                <i class="fa text-success fa-thumbs-up text-xl "></i>
                                                            </button>
                                                            <span class="text-xl mr-2">
                                                                {{
                                                                    feedback?.votes.reduce((total, item) => item.like == 1 ? total + 1 : 0, 0)
                                                                }}
                                                            </span>

                                                            <button type="button"
                                                                    @click="addLike(feedback.id,'dislike')">
                                                                <i class="fa text-danger fa-thumbs-down text-xl"></i>

                                                            </button>
                                                            <span class="text-xl">
                                                          {{
                                                                    feedback?.votes.reduce((total, item) => item.dislike == 1 ? total + 1 : 0, 0)
                                                                }}
                                                            </span>


                                                        </div>


                                                        <div>
                                                            <span class="text-xl text-black">Comments</span>
                                                        </div>
                                                        <div v-for="comment in feedback.comments" :key="comment.id">

                                                        <span>

                                                              <i class="fa fa-star"></i>
                                                                 {{ comment ? comment.content : '' }}
                                                            </span>


                                                        </div>


                                                        <div v-show="hideDiv[index]"
                                                             class="flex justify-between w-full items-center">
                                                            <div>
                                                                <input type="text" name="comment" id="comment"
                                                                       v-model="comment">
                                                            </div>
                                                            <div>
                                                                <button class="btn btn-success"
                                                                        @click="submitComment(feedback.id, index)">
                                                                    Send
                                                                </button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tempalte>

                                </div>
                            </section>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</template>

<script>
import "sweetalert2/dist/sweetalert2.min.css";
import {mapState} from "vuex";
import axios from 'axios';
import loader from "../../loader.vue";

export default {
    mounted() {
        document.title = "product-list";
        this.websocketsCall();
    },
    components: {
        loader
    },
    data() {
        return {
            hideDiv: [],
            products: '',
            feedbacks: [],
            comments: [],
            comment: '',
            like: '',
            dislike: '',
            userLoggedIn: false,
        }
    },
    methods: {
        getProduct() {
            const url = process.env.MIX_ADMIN_APP_URL + '/get-product';
            axios.get(url).then((res) => {
                this.products = {...res.data};
            });
        },
        websocketsCall(){
            const channel = window.Echo.channel('notifications');
            channel.listen('FeedbackNotification', (event) => {
                console.log('event',event.data.message);
                if(event.data.message != null){
                    this.$swal({
                        position: "center",
                        title: `${event.data.message}`,
                        showConfirmButton: false,
                        toast: true,
                        timer: 2500,
                        customClass: {
                            background: 'bg-primary'
                        }
                    });
                }
            });
        },
        getVoting() {
            const url = process.env.MIX_ADMIN_APP_URL + '/get-votes';
            axios.get(url).then((res) => {

            })
        },

        getFeedbacks() {
            const url = process.env.MIX_ADMIN_APP_URL + '/feedbacks';
            axios.get(url).then((res) => {
                this.feedbacks = res.data.data;
            })
        },

        showDiv(index) {
            if (this.userLoggedIn == false) {
                window.location.href = '/login';
            } else {
                this.hideDiv[index] = true
            }
        },
        addFeedBack() {
            window.location.href = '/login';
        },

        checkAuth() {
            axios.get('/api/check-login-status')
                .then(response => {
                    this.userLoggedIn = response.data.loggedIn;
                    console.log('osama', this.userLoggedIn)
                });
        },

        addLike(id, val) {

            if (this.userLoggedIn == false) {
                window.location.href = '/login';
            } else {
                const url = process.env.MIX_ADMIN_APP_URL + '/voting';
                axios.post(url, {
                    val: val,
                    feedback_id: id,
                }).then((res) => {
                    if (res.data.status == "Success") {
                        this.getFeedbacks()
                    } else {
                        this.$swal({
                            position: "center",
                            icon: "error",
                            title: "Already vote Added",
                            showConfirmButton: false,
                            toast: true,
                            timer: 2500,
                        });
                    }
                })
            }


        },


        submitComment(id, index) {
            if (this.userLoggedIn == false) {
                window.location.href = '/login';
            } else {
                const url = process.env.MIX_ADMIN_APP_URL + '/comments';
                axios.post(url, {
                    comment: this.comment,
                    feedback_id: id
                }).then((res) => {
                    if (res.data.status == "Success") {
                        this.$swal({
                            position: "center",
                            icon: "success",
                            title: "Comment Add Successful",
                            showConfirmButton: false,
                            toast: true,
                            timer: 2500,
                        });
                        this.hideDiv[index] = false
                        this.getFeedbacks()
                        this.comment = ''
                    }
                })
            }
        }
    },
    created() {
        this.getProduct();
        this.getFeedbacks();
        this.checkAuth();

    },
};
</script>

<style scoped>
.loading-box {
    position: fixed;
    top: 40%;
    margin: auto;
    background: #fff;
    box-shadow: 0px 0px 9px -2px #000;
    z-index: 999;
    left: 0px;
    right: 0px;
    text-align: center;
    padding: 10px;
}
.bg-primary {
    background-color: #007bff; /* Replace with your desired background color */
    color: #fff; /* Optionally, set the text color to make it visible */
}
</style>
