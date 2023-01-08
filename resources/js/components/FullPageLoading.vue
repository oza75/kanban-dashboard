<template>
    <div class="full-page-loading">
        <SvgLoading width="40" height="40" color="black"/>
    </div>
</template>

<script>
import SvgLoading from "./SvgLoading.vue";

export default {
    name: "FullPageLoading",
    components: {SvgLoading},
}
</script>

<style scoped>

</style>
