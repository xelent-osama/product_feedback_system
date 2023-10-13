<template>
<div class="loader"></div>
</template>
<script>
export default {
    props: {
        text: {
            required: false,
            type: String,
            default: 'Loading',
        },
    },
};
</script>

<style scoped>
.loader {
  border: 9px solid #f3f3f3;
  border-radius: 50%;
  border-top: 9px solid #2f5168;
  width: 90px;
  height: 90px;
  -webkit-animation: spin 1s linear infinite; /* Safari */
  animation: spin 1s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

</style>