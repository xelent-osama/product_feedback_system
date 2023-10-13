<template>
    <nav class="bg-primary shadow-md">
        <div class="w-full px-4">
            <div class="flex justify-between items-center">
                <div class="flex space-x-7 items-center">
                    <div class="flex items-center">
                        <!-- Mobile menu button -->
                        <div class="md:hidden items-center">
                            <button class="outline-none mobile-menu-button">
                                <svg
                                    class="w-6 h-6 text-gray-400 hover:text-gray-500"
                                    x-show="!showMenu"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                            </button>
                        </div>
                        <!-- Website Logo -->
                        <span class="hidden md:block items-center">
                            <div class="xs-brand mr-12 ml-32">
                                <router-link
                                    class="flex text-white space-x-2"
                                    to="/user/dashboard">
                                    <div class="sidebar-brand-text font-bold">FEEDBACK SYSTEM</div>
                                </router-link>
                            </div>
                        </span>
                    </div>
                    <!-- Navbar linkks -->
                    <div class="hidden md:flex items-center space-x-1 ">
                        <ul class="flex text-white space-x-2 mt-3">
                            <li class="dropdown">
                                <router-link style="text-decoration: none; color: white" class="py-2 px-2 block font-medium"
                                  to="/feedbacks"
                                >Feedback
                                </router-link>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Profile  -->
                <div class=" ">
                    <div class="relative w-fit"
                    >
                        <button
                            @click="toggle"
                            id="toggle"
                            class="py-1 px-4 rounded-md bg-primarygray flex items-center toggle"
                              >
                            <span class="mr-2 d-none d-lg-inline text-white small">{{
                                    loggedin_user['data']?.name
                                }}</span>
                            <img class="img-profile rounded-circle w-9 h-9" :src="'/img/profile.png'"/>
                        </button>
                        <div
                            v-if="toggle_div == true"
                            id="toggle-div"
                            class="z-[50] bg-white rounded-lg drop-shadow-lg mt-3 text-sm font-medium absolute right-0 w-52"
                        >
                            <!-- <hr class="border-t-2" /> -->
                            <router-link to="/user-profile"
                                class="rounded-xl w-full px-2 py-2 hover:bg-gray-400 text-black hover:text-black whitespace-nowrap cursor-pointer flex duration-150 border-t-2"
                            >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-5 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                              </svg>
                                User Profile
                            </router-link>
                            <button
                                @click.prevent="getLogout()"
                                class="rounded-b-xl w-full px-2 py-2 hover:bg-gray-400 text-black hover:text-black whitespace-nowrap cursor-pointer flex duration-150 border-t-2"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="w-6 h-5 mr-1"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"
                                    />
                                </svg>
                                Log out
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile view navbar -->
        <div class="block md:hidden">
            <div
                class="hidden mobile-menu bg-gray-400 transition-all duration-500"
            >
                <ul class="">
                    <li class="active">
                        <a
                            href=""
                            class="block text-sm px-2 py-4 hover:text-black hover:bg-gray-300 transition duration-150"
                        >Home</a
                        >
                    </li>
                    <li>
                        <a
                            href=""
                            class="block text-sm px-2 py-4 hover:text-black hover:bg-gray-300 transition duration-150"
                        >Services
                        </a>
                    </li>
                    <li>
                        <a
                            href=""
                            class="block text-sm px-2 py-4 hover:text-black hover:bg-gray-300 transition duration-150"
                        >About
                        </a>
                    </li>
                    <li>
                        <a
                            href=""
                            class="block text-sm px-2 py-4 hover:text-black hover:bg-gray-300 transition duration-150"
                        >Contact Us
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
import axios from 'axios';
export default {
    data() {
        return {
            toggle_div: false,
            loggedin_user:'',
        }
    },
    methods: {
        toggle(val) {
            if (!this.toggle_div) {
                this.toggle_div = true;
            } else {
                this.toggle_div = false;
            }
        },
        getLogout() {
            axios.post("/logout").then((res) => {
                window.location.reload();
            });
        },
        getCurrentUser(){
                let url = process.env.MIX_ADMIN_APP_URL + '/user';
                axios.get(url).then((res) => {
                    this.loggedin_user = {...res};
                    localStorage.setItem('userId',this.loggedin_user?.data?.id);
                });
        }
    },
    created(){
        this.getCurrentUser();
    }
}
</script>
