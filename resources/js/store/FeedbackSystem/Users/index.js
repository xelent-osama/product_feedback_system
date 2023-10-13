import ErrorHandling from "../../../ErrorHandling";


const users = {
    namespaced: true,
    state: {
        users: [],
        limit: 10,
        searchParameter: '',
        loading: 0,
        pagination: {},
        displayDeleteModal: 0,
        errors: new ErrorHandling(),
        user: {
            'id': '',
            'name': '',
            'email': '',
            'image':'',
            'password': '',
        },
        edit: 0,
        userId: ''
    },
    mutations: {

        setUsers(state, payload) {
            state.users = payload;
        },
        setPagination(state, pagination) {
            if (pagination.meta) {
                state.pagination = {
                    current_page: pagination.meta.current_page,
                    last_page: pagination.meta.last_page,
                    next_page_url: pagination.links.next,
                    prev_page_url: pagination.links.prev
                };
            }
        },
        setLoading(state, payload) {
            state.loading = payload;
        },
        setLimit(state, payload) {
            state.limit = payload;
        },
        setSearchParameter(state, payload) {
            state.searchParameter = payload.searchParameter;
        },
        displayDeleteModal(state, payload) {
            state.displayDeleteModal = payload;
        },
        setEmptyError(state, payload) {
            state.errors = new ErrorHandling();
        },
        setErrors(state, payload) {
            state.errors.record(payload);
        },
        updateUser: function(state, payload) {
            Object.assign(state.user, payload);
        },
        setUser(state, payload) {
            state.user.id = payload.id;
            state.user.name = payload.name;
            state.user.email = payload.email;
            state.user.password = payload.password;
        },
        setEdit(state, payload) {
            state.edit = payload;
        },
        setUserId(state, payload) {
            state.userId = payload;
        }
    },
};

export default users;
