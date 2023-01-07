<template>
    <CardModal :card="card">
        <template v-slot:activator>
            <div class="card">
                {{ card.title }}
            </div>
        </template>
    </CardModal>

</template>

<script>
import CardModal from "./CardModal.vue";

export default {
    name: "Card",
    components: {CardModal},
    props: {card: {type: Object, required: true}}
}
</script>

<style scoped>

</style>
