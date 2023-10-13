<template>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <loader v-if="loading" class="loading-box"></loader>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header bg-primary text-white text-center">
                        <h3 class="box-title">
                            <i class="fab fa-telegram-plane"></i>
                            Update User Profile
                        </h3>
                    </div>
                    <div class="box-body bg-primary">
                        <div class="row">
                            <div class="col-lg-8">
                                <form class="UserForm" id="UserForm">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label text-primary">Name </label>
                                                        <input type="text"
                                                               @input="updateField('name', $event.target.value)"
                                                               :value="edit == 1 ? user.name : accountCode"
                                                               class="form-control" id="txtCityName"
                                                               name="name" placeholder="Enter Name"/>
                                                    </div>
                                                    <small class="text-red-400" v-if="errors.has('name')"
                                                           v-text="errors.get('name')"></small>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label text-primary">Email </label>
                                                        <input type="text"
                                                               @input="updateField('email', $event.target.value)"
                                                               :value="user.email" class="form-control" id="txtCityName"
                                                               name="email" placeholder="Enter Email"/>
                                                    </div>
                                                    <small class="text-red-400" v-if="errors.has('email')"
                                                           v-text="errors.get('email')"></small>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label text-primary">Password </label>
                                                        <input type="text"
                                                               @input="updateField('password', $event.target.value)"
                                                               class="form-control" id="txtCityName"
                                                               name="password" placeholder="Enter Password"/>
                                                    </div>
                                                    <small class="text-red-400" v-if="errors.has('password')"
                                                           v-text="errors.get('password')"></small>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group text-right">
                                                        <button @click="addUpdateUser()" :disabled="loading"
                                                                id="BtnSave" class="btn btn-primary" type="button"
                                                                name="btn">
                                                            <i class="fa fa-fw fa-lg fa-check-circle"></i>Save
                                                        </button>
                                                        &nbsp;&nbsp;&nbsp;
                                                        <button type="button" class="btn btn-danger"
                                                                @click="clearpartner(partner.id)"><i
                                                            class="fa fa-fw fa-lg fa-times-circle"></i>Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-header">
                                        User Profile
                                    </div>
                                    <div class="card-body text-center">
                                        <img
                                            src="https://cdn.imgbin.com/15/6/2/imgbin-conservatorio-santa-cecilia-maulana-malik-ibrahim-state-islamic-university-malang-gold-lorem-ipsum-is-simply-dummy-text-of-the-printing-system-gold-XTSLRnGHMa7CkaXnCwtAq4e8e.jpg"
                                            class="user-avatar" alt="User Avatar" width="300" height="300"
                                            v-if="user.image == ''">
                                        <img :src="user.image" class="user-avatar" alt="User Avatar" width="250"
                                             height="250" v-if="user.image != ''">
                                    </div>
                                    <div class="card-footer">
                                        <input type="file" @change="uploadImage($event)">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
        document.title = "user-profile";
    },
    components: {
        loader, WarningModal
    },
    computed: mapState({
        users: (state) => state.Users.users,
        user: (state) => state.Users.user,
        edit: (state) => state.Users.edit,
        loading: (state) => state.Users.loading,
        errors: (state) => state.Users.errors,
        pagination: (state) => state.Users.pagination,
        displayDeleteModal: (state) => state.Users.displayDeleteModal,
    }),
    methods: {
        updateField(field, value) {
            this.$store.commit("Users/updateUser", {
                [field]: value,
            });
        },
        uploadImage(event) {
            alert('ok');
            const formData = new FormData();
            formData.append('file', event.target.files[0]);
            const url = process.env.MIX_ADMIN_APP_URL + "/upload-image";

            axios.post(url, formData)
                .then((res) => {
                    const value = res.data.image_url;
                    this.$store.commit("Users/updateUser", {
                        image: value,
                    });
                })
                .catch((error) => {
                    this.$swal(error);
                });
        },
        addUpdateUser() {
            var url = process.env.MIX_ADMIN_APP_URL + "/users";
            if (this.edit) {
                var url = process.env.MIX_ADMIN_APP_URL + "/users/" + this.user.id;
            }
            this.$store
                .dispatch("SystemForms/addUpdateSupportingForm", {
                    url: url,
                    data: this.user,
                    stateName: "Users",
                })
                .then((res) => {
                    this.$store.commit("Users/setUser", {
                        name: "",
                        email: "",
                        password: "",
                        image: "",
                    });
                    if (res.data.status == "Success") {
                        this.meta = res.meta;
                        if (this.edit == 1) {
                            this.$swal({
                                position: "center",
                                icon: "success",
                                title: "Add Update SuccessFully ",
                                showConfimButton: false,
                                toast: true,
                                timer: 2500,
                            });
                        } else {
                            this.$swal({
                                position: "center",
                                icon: "success",
                                title: "Add add SuccessFully ",
                                showConfimButton: false,
                                toast: true,
                                timer: 2500,
                            });
                        }
                        this.$store.commit("Users/setEdit", 0);
                        this.$router.push('/user-profile');
                    } else {
                        this.$swal({
                            position: "center",
                            icon: "error",
                            title: "wrong",
                            showConfimButton: false,
                            toast: true,
                            timer: 2500,
                        });
                    }
                });
        },
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
