<template>

    <div v-if="displayModal" class="h-screen overflow-auto fixed top-0 left-0 w-full flex justify-center items-center bg-black backdrop-blur-sm bg-opacity-30">
        <div class="w-1/2 h-3/5 bg-white shadow rounded-md p-6">
            <div class=" w-full flex justify-center mt-2">
                                 
            </div>
            <div class="text-lg text-center font-semibold text-gray-500 mt-2">
            </div>
            <div class="">
            </div>
            <div class="flex gap-x-2 justify-end w-full mt-10">
               
                <button @click="cenel()" class="bg-red-600 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                    Cancel
                </button>
            </div>
        </div>
    </div>


</template>

<script>
export default {
    data(){
      return{
        displayModal : 0,
      }
    },
    created(){
      this.displayModal = 0;
    },

    methods:{
        cenel(){
            this.displayModal = 1;
        },

    },
}
</script>




<style>
.modal {
    transform: translate(-50%, -50%);
}

.closed {
    display: none;
}
</style>
