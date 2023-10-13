import { createStore } from "vuex";

import Users from './FeedbackSystem/Users/index';
import SystemForms from './SystemForms/index';
import feedbackForm from './FeedbackSystem/Feedback/index';
export default new createStore({
    strict: true,
    modules: {
        Users,
        SystemForms,
        feedbackForm,
    },

    state() {
        return {
            showLoading: false,
        };
    },
});
