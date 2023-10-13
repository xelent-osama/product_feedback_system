import ErrorHandling from "../../../ErrorHandling";

const feedbackForm = {
    namespaced: true,
    state: {
        feedback: [],
        limit: 10,
        searchParameter: '',
        loading: 0,
        pagination: {},
        displayDeleteModal: 0,
        errors: new ErrorHandling(),
        feedbackItem: {
            'id': '',
            'title': '',
            'description': '',
            'category': '',
            'attachment': '',
        },
        edit: 0,
        feedbackId: ''
    },
    mutations: {
        setfeedbackForm(state, payload) {
            state.feedback = payload;
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
        updateFeedbackItem(state, payload) {
            Object.assign(state.feedbackItem, payload);
        },
        setFeedbackItem(state, payload) {
            state.feedbackItem.id = payload.id;
            state.feedbackItem.title = payload.title;
            state.feedbackItem.description = payload.description;
            state.feedbackItem.category = payload.category;
            state.feedbackItem.attachment = payload.attachment;
        },
        setEdit(state, payload) {
            state.edit = payload;
        },
        setFeedbackId(state, payload) {
            state.feedbackId = payload;
        }
    },
};

export default feedbackForm;
