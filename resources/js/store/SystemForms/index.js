import axios from "axios";

const systemForms = {
    namespaced: true,
    actions: {
        async fetchSystemForms({ commit, rootState }, payload) {

            var loading = "setLoading";
            if (payload.loadingState) {
                loading = payload.loadingState;
            }
            commit(payload.stateName + "/" + loading, 1, { root: true });

            var limit = "limit";
            if (payload.limit) {
                limit = payload.limit;
            }
            limit = rootState[payload.stateName][limit];

            var searchParameter = "searchParameter";
            if (payload.searchParameter) {
                searchParameter = payload.searchParameter;
            }
            var url = payload.url;
            searchParameter = rootState[payload.stateName][searchParameter];

            url = url + "&limit=" + limit + "&searchParameter=" + searchParameter;

            return new Promise(function(resolve, reject) {
                axios.get(url)
                    .then((res) => {
                        if (payload.pagination && payload.pagination == 1) {
                            var paginationName = "setPagination";
                            if (payload.paginationName) {
                                paginationName = payload.paginationName;
                            }
                            commit(payload.stateName + "/" + paginationName, res.data, { root: true });
                        }
                        var mutationName = "set" + payload.stateName;
                        if (payload.mutationName) {
                            mutationName = payload.mutationName;
                        }
                        commit(payload.stateName + "/" + mutationName, res.data.data, { root: true });

                        resolve(res);
                    })
                    .finally(() => commit(payload.stateName + "/" + loading, 0, { root: true }));
            });
        },

        deleteSystemForm({ commit }, payload) {
            var loading = "setLoading";
            if (payload.loadingState) {
                loading = payload.loadingState;
            }
            commit(payload.stateName + "/" + loading, 1, { root: true });

            var displayModal = "displayDeleteModal";
            if (payload.displayDeleteModal) {
                displayModal = payload.displayDeleteModal;
            }

            commit(payload.stateName + "/" + displayModal, 0, { root: true });

            return new Promise(function(resolve, reject) {
                axios.delete(payload.url)
                    .then((res) => {
                        resolve(res);
                    })
                    .catch((err) => reject(err))
                    .finally(() => commit(payload.stateName + "/" + loading, 0, { root: true }));
            });
        },

        addUpdateSupportingForm({ rootState, commit, state }, payload) {
            return new Promise(function(resolve, reject) {
                var loading = "setLoading";
                if (payload.loadingState) {
                    loading = payload.loadingState;
                }
                commit(payload.stateName + "/" + loading, 1, { root: true });


                var edit = "edit";
                if (payload.edit) {
                    edit = payload.edit;
                }
                edit = rootState[payload.stateName][edit];
                var method = "post";
                if (edit == true) {
                    method = 'put';
                }

                axios[method](payload.url, payload.data)
                    .then(res => {
                        resolve(res);
                    })
                    .catch(error => {
                        commit(payload.stateName + "/setEmptyError", {}, { root: true });
                        if (error.response.status == 422) {
                            if (error.response.data.status == 'Error') {
                                console.log(error.response.data.message);
                            } else {
                                commit(payload.stateName + "/setErrors", error.response.data.errors, { root: true });
                            }
                        }
                        reject(error);
                    }).finally(() => (commit(payload.stateName + "/" + loading, 0, { root: true })));
            });
        },
    },
    getters: {},
};

export default systemForms;
