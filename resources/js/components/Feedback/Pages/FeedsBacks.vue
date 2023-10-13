<template>
    <!-- Begin Page Content -->
    <loader v-if="loading" class="loading-box"></loader>
    <header class="py-4">
        <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <h1 class="text-3xl font-bold text-theme-5"></h1>
                <router-link
                    :to="{name:'user.dashboard'}"
                    class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"

                >
                    <i class="fas fa-plus fa-sm text-white-50"></i> Add Feedback
                </router-link>
            </div>
        </div>
    </header>

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        <i class="fab fa-telegram-plane"></i>Feedbacks List
                    </h3>
                    <div
                        class="
              flex
              items-center
              justify-between
              max-w-full
              mx-auto
              px-4
              py-4
              sm:px-6
              lg:px-8
            "
                    >
                        <div>
                            show
                            <select @change="updateLimit($event.target.value)">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            entries
                        </div>

                        <div>
                            <input
                                placeholder="Search..."
                                type="text"
                                class="
                  block
                  w-full
                  bg-white
                  py-2
                  pl-3
                  pr-3
                  border border-transparent
                  rounded-md
                  leading-5
                  text-gray-900
                  placeholder-gray-500
                  focus:outline-none
                  focus:ring-2
                  focus:ring-offset-2
                  focus:ring-offset-blue-600
                  focus:ring-white
                  focus:border-white
                  sm:text-sm
                "
                                @keyup="updateSearchParameter($event.target.value)"
                            />
                        </div>


                    </div>

                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="listcustomerdatatable">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table
                                                :class="loading == true ? 'animate-pulse' : ''"
                                                class="table table-hover table-bordered"
                                                id="listTable"
                                            >
                                                <thead class="bg-white z-50 sticky top-[43px] overflow-scroll">
                                                <tr>
                                                    <th>Id</th>
                                                    <!-- <th>Vehicle</th> -->
                                                    <th>Title</th>
                                                    <th>Category</th>
                                                    <th>Vote Count</th>
                                                </tr>

                                                </thead>
                                                <tbody>
                                                <tr v-if="feedbacks == 0 || feedbacks == null">
                                                    <td colspan="4" class="text-center justify-between">
                                                        No Result Found.
                                                    </td>
                                                </tr>
                                                <tr
                                                    v-for="(feedback,index) in feedbacks"
                                                    v-bind:key="index"
                                                >
                                                    <td>{{ feedback?.id }}</td>
                                                    <td>{{ feedback?.title }}</td>
                                                    <td>{{ feedback?.category }}</td>
                                                    <td>4</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <div
                                                class="
                                bg-white
                                px-4
                                py-3
                                flex
                                items-center
                                justify-between
                                border-t border-gray-200
                                sm:px-6
                              "
                                            >
                                                <div
                                                    class="
                                  hidden
                                  sm:flex-1
                                  sm:flex
                                  sm:items-center
                                  sm:justify-between
                                "
                                                >
                                                    <div>
                                                        <p
                                                            class="text-sm text-gray-700"
                                                            v-if="pagination.current_page"
                                                        >
                                                            Page {{ pagination.current_page }} of
                                                            {{ pagination.last_page }}
                                                        </p>
                                                    </div>
                                                    <div>
                                                        <nav
                                                            class="
                                      relative
                                      z-0
                                      inline-flex
                                      rounded-md
                                      shadow-sm
                                      -space-x-px
                                    "
                                                            aria-label="Pagination"
                                                            v-if="
                                      pagination.next_page_url ||
                                      pagination.prev_page_url
                                    "
                                                        >
                                                            <a
                                                                href="#"
                                                                class="
                                        relative
                                        inline-flex
                                        items-center
                                        px-2
                                        py-2
                                        rounded-l-md
                                        border border-gray-300
                                        bg-white
                                        text-sm
                                        font-medium
                                        text-gray-500
                                        hover:bg-gray-50
                                      "
                                                                v-bind:class="[
                                        { disabled: !pagination.prev_page_url },
                                      ]"
                                                                @click="
                                        fetchUsers(pagination.prev_page_url)
                                      "
                                                            >
                                                                <span class="sr-only">Previous</span>
                                                                <svg
                                                                    class="h-5 w-5"
                                                                    x-description="Heroicon name: solid/chevron-left"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 20 20"
                                                                    fill="currentColor"
                                                                    aria-hidden="true"
                                                                >
                                                                    <path
                                                                        fill-rule="evenodd"
                                                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                                        clip-rule="evenodd"
                                                                    ></path>
                                                                </svg>
                                                            </a>

                                                            <a
                                                                href="#"
                                                                class="
                                        relative
                                        inline-flex
                                        items-center
                                        px-2
                                        py-2
                                        rounded-r-md
                                        border border-gray-300
                                        bg-white
                                        text-sm
                                        font-medium
                                        text-gray-500
                                        hover:bg-gray-50
                                      "
                                                                v-bind:class="[
                                        { disabled: !pagination.next_page_url },
                                      ]"
                                                                @click.prevent="
                                        fetchFeedbacks(pagination.next_page_url)
                                      "
                                                            >
                                                                <span class="sr-only">Next</span>
                                                                <svg
                                                                    class="h-5 w-5"
                                                                    x-description="Heroicon name: solid/chevron-right"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 20 20"
                                                                    fill="currentColor"
                                                                    aria-hidden="true"
                                                                >
                                                                    <path
                                                                        fill-rule="evenodd"
                                                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                                        clip-rule="evenodd"
                                                                    ></path>
                                                                </svg>
                                                            </a>
                                                        </nav>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <WarningModal
        v-if="displayDeleteModal"
        :show="displayDeleteModal"
        @close="hideDeleteModal"
    >
        <template v-slot:modal-header> Delete Confirmation</template>
        <template v-slot:modal-text>
            Are you sure to do this because this action can not be undo?
        </template>
        <template v-slot:modal-footer>
            <button
                type="button"
                class="
          w-full
          inline-flex
          justify-center
          rounded-md
          border border-transparent
          shadow-sm
          px-4
          py-2
          bg-red-600
          text-base
          font-medium
          text-white
          hover:bg-red-700
          focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500
          sm:ml-3 sm:w-auto sm:text-sm
        "
                @click="deleteCoas()"
            >
                Yes, Delete it
            </button>
        </template>
    </WarningModal>
</template>

<script>
import "sweetalert2/dist/sweetalert2.min.css";
import {mapState} from "vuex";
import WarningModal from "../../Layouts/WarningModal.vue";
import loader from "../../loader.vue";

export default {
    mounted() {
        document.title = "Feedbacks";
    },
    data() {

    },
    components: {
        WarningModal, loader
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
    created() {
        this.fetchFeedbacks("");
    },
    methods: {
        fetchFeedbacks(url) {
            if (url == "") {
                url = process.env.MIX_ADMIN_APP_URL + "/feedbacks?q=1";
            }
            this.$store.dispatch("SystemForms/fetchSystemForms", {
                url: url,
                stateName: "feedbackForm",
                pagination: 1,
            }).then((res) => {

            });
        },
        updateLimit(limit) {
            this.$store.commit("feedbackForm/setLimit", limit);
            this.fetchFeedbacks("");
        },
        updateSearchParameter(search) {
            this.$store.commit("feedbackForm/setSearchParameter", {
                searchParameter: search,
            });
            this.fetchFeedbacks("");
        },
        editCoas(coas) {
            this.$store.commit("fetchFeedbacks/setCoas", coas);
            this.$store.commit("fetchFeedbacks/setEdit", 1);
            this.$router.push({name: "accounts.coas.create", params: {id: coas.acc_code}});
        },
        showDeleteModal(coasId) {
            this.$store.commit("Coass/displayDeleteModal", 1);
            this.$store.commit("Coass/setCoasId", coasId);
        },
        hideDeleteModal() {
            this.$store.commit("Coass/displayDeleteModal", 0);
            this.$store.commit("Coass/setVehicleId", "");
        },

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

template {
    -webkit-filter: blur(8px);
    -moz-filter: blur(8px);
    -ms-filter: blur(8px);
    -o-filter: blur(8px);
    filter: blur(8px);
}
</style>
