<template >
    <div class="container-fluid ">
        <loader v-if="loading" class="loading-box"></loader>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
<!--         <h1 class="h1 mb-0 text-gray-800">Vehicles Dashboard</h1>-->
        </div>
    </div>

    <div class="text-center text-black">
        <h1>
            IKONIC FEEDBACK SYSTEM
        </h1>
    </div>




<!--    <div class="col-span-12 mt-6">-->
<!--            <h1 class="text-3xl font-bold mb-6">Accounts Management Dashboard</h1>-->
<!--            <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-1 gap-2">-->
<!--                <div style="background-color: #ff5252;" class="p-6 rounded-lg shadow-lg">-->
<!--                    <h2 class="text-white text-xl font-bold mb-2">Today Notifications</h2>-->
<!--                    <p class="text-white">Today Notifications:</p>-->
<!--                    <span class="text-white text-xl"></span>-->
<!--                </div>-->
<!--                <div style="background-color: #FFD700;" class="p-6 rounded-lg shadow-lg">-->
<!--                    <h2 class="text-white text-xl font-bold mb-2">Total Vehicles</h2>-->
<!--                    <p class="text-white">Total Vehicles: </p>-->
<!--                    <span class="text-white text-xl"></span>-->
<!--                </div>-->
<!--                <div style="background-color: #4CAF50;" class="p-6 rounded-lg shadow-lg">-->
<!--                    <h2 class="text-white text-xl font-bold mb-2">Total Sale Items</h2>-->
<!--                    <p class="text-white">Total Sale Items: </p>-->
<!--                    <span class="text-white text-xl"></span>-->
<!--                </div>-->
<!--                <div style="background-color: #00BFFF;" class="p-6 rounded-lg shadow-lg">-->
<!--                    <h2 class="text-white text-xl font-bold mb-2">Total Purchase Items</h2>-->
<!--                    <p class="text-white">Total Purchase Items:</p>-->
<!--                    <span class="text-white text-xl"></span>-->
<!--                </div>-->

<!--            </div>-->
<!--           </div>-->

    </template>

    <script>
    import axios from "axios";
    import Navigation from "../Layouts/Navigation.vue";
    export default {
        data() {
            return {
                currentUser:"",
            };
        },
        components(){
            Navigation
        },
        methods: {

        },
        created() {
            // this.getCurrentUser();
        },

    };
    </script>
