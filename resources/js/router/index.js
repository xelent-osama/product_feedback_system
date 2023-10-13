import { createRouter, createWebHistory } from "vue-router";


import account_dashboard from '../components/Feedback/Dashboard.vue';
import UserProfile from '../components/Feedback/Pages/UserProfile.vue';
import ProductList from '../components/Feedback/Pages/ProductList.vue';
import FeedbackForm from '../components/Feedback/Pages/FeedbackForm.vue';
import FeedsBacks from '../components/Feedback/Pages/FeedsBacks';

const routes = [
  {
    path: '/admin/dashboard',
    name: 'accounts.dashboard',
    component: account_dashboard,
  },
  {
    path: '/user/dashboard',
    name: 'user.dashboard',
    component: FeedbackForm,
  },
  {
    path: '/user-profile',
    name: 'users.profile',
    component: UserProfile,
  },
  {
    path: '/',
    name: 'products.list',
    component: ProductList,
  },
  {
    path: '/feedbacks',
    name: 'feedbacks.list',
    component: FeedsBacks,
  },
//   {
//     path: '/:pathMatch(.*)*',
//     name: 'PageNotFound',
//     component: notfound,
//   },
];

export default createRouter({
  history: createWebHistory(),
  routes,
});
