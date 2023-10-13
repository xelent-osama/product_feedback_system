<template>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <loader v-if="loading" class="loading-box"></loader>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-2"></div>
        </div>

        <section class=""
        >
            <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="card" style="border-radius: 15px;">
                                <div class="card-body p-5">
                                    <h2 class="text-uppercase text-center mb-5">Product Feedback Form</h2>

                                    <form>
                                        <div>
                                            <small class="text-red-400" v-if="errors.has('title')"
                                                   v-text="errors.get('title')"></small>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="text" id="title"
                                                   @input="updateField('title', $event.target.value)"
                                                   name="title"
                                                   :value="feedback.title" placeholder="Enter Title"
                                                   class="form-control form-control-lg"/>
                                            <label class="form-label" for="form3Example1cg">Your Title</label>
                                        </div>

                                        <div>
                                            <small class="text-red-400" v-if="errors.has('description')"
                                                   v-text="errors.get('description')"></small>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="text" id="description"
                                                   @input="updateField('description', $event.target.value)"
                                                   name="description" placeholder="Enter Description"
                                                   :value="feedback.description" class="form-control form-control-lg"/>
                                            <label class="form-label" for="form3Example3cg">Description</label>
                                        </div>

                                        <div>
                                            <small class="text-red-400" v-if="errors.has('category')"
                                                   v-text="errors.get('category')"></small>
                                        </div>
                                        <div class="form-outline mb-4">

                                            <select class="form-control form-control-lg"
                                                    @input="updateField('category', $event.target.value)"
                                                    id="category"
                                                    name="category">
                                                <option value="">Select Category</option>
                                                <option value="bug_report">Bug Report</option>
                                                <option value="feature_request">Feature Request</option>
                                                <option value="improvement">improvement</option>
                                                <option value="etc">etc</option>
                                            </select>
                                            <label class="form-label" for="category">Category</label>


                                        </div>


                                        <div class="form-outline mb-4">
                                            <input type="file" @input="uploadImage($event)" id="image"
                                                   name="image"
                                                   class="form-control form-control-lg"/>
                                            <label class="form-label" for="form3Example4cdg">Image Upload</label>

                                        </div>


                                        <div class="d-flex justify-content-center">

                                            <button type="button"
                                                    @click="addUpdateFeedback()" :disabled="loading"
                                                    class="btn btn-primary btn-block btn-lg  text-white">
                                                Submit
                                            </button>
                                        </div>

                                        <div class="d-flex justify-content-center mt-2">
                                            <button type="button"
                                                    @click="clearpartner(partner.id)"
                                                    class="btn btn-danger btn-block btn-lg  text-white">
                                                Cancel
                                            </button>
                                        </div>

                                        <div class="d-flex justify-content-center mt-2">
                                            <router-link type="button"
                                                         to="/"
                                                    class="btn btn-info btn-block btn-lg  text-white">
                                                Back
                                            </router-link>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</template>

<script>
import "sweetalert2/dist/sweetalert2.min.css";
import {mapState} from "vuex";
import axios from 'axios';
import loader from "../../loader.vue";
import WarningModal from "../../Layouts/WarningModal.vue";

export default {
    mounted() {
        document.title = "Feedback-form";
        this.websocketsCall();
    },
    components: {
        loader,
        WarningModal
    },
    computed: mapState({
        feedbacks: (state) => state.feedbackForm.feedback,
        feedback: (state) => state.feedbackForm.feedbackItem,
        edit: (state) => state.feedbackForm.edit,
        loading: (state) => state.feedbackForm.loading,
        errors: (state) => state.feedbackForm.errors,
        pagination: (state) => state.feedbackForm.pagination,
        displayDeleteModal: (state) => state.feedbackForm.displayDeleteModal,
    }),
    methods: {
        updateField(field, value) {
            this.$store.commit("feedbackForm/updateFeedbackItem", {
                [field]: value,
            });
        },
        uploadImage(event) {
            const formData = new FormData();
            formData.append('file', event.target.files[0]);
            const url = process.env.MIX_ADMIN_APP_URL + "/upload-image";

            axios.post(url, formData)
                .then((res) => {
                    const value = res.data.image_url;
                    this.$store.commit("feedbackForm/updateFeedbackItem", {
                        attachment: value,
                    });
                })
                .catch((error) => {
                    this.$swal(error);
                });
        },
        websocketsCall() {
            const channel = window.Echo.channel('notifications');
            channel.listen('FeedbackNotification', (event) => {
                if (event.data != null && event.data.message != null) {
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
        addUpdateFeedback() {
            let url = process.env.MIX_ADMIN_APP_URL + "/feedbacks";

            this.$store
                .dispatch("SystemForms/addUpdateSupportingForm", {
                    url: url,
                    data: this.feedback,
                    stateName: "feedbackForm",
                })
                .then((res) => {
                    this.$store.commit("feedbackForm/setFeedbackItem", {
                        title: "",
                        description: "",
                        category: "",
                        attachment: "",
                    });
                    if (res.data.status === "Success") {

                    } else {
                        this.$swal({
                            position: "center",
                            icon: "error",
                            title: "Error",
                            showConfirmButton: false,
                            toast: true,
                            timer: 2500,
                        });

                    }
                });
        },
        created() {
            const userId = localStorage.getItem('userId');
            this.$store.commit("Users/setEdit", 1);
            var url =
                process.env.MIX_ADMIN_APP_URL +
                "/users/" +
                userId +
                "?q=1";
            this.$store.dispatch("SystemForms/fetchSystemForms", {
                url: url,
                stateName: "Users",
                mutationName: "setUser",
            });
        },
    }
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


</style>
