<template>
    <div class="card">
        <div class="card__title" @click="modal = true">
        {{ card.title }}
        </div>

        <CardModal :card="card" @update="$emit('update', $event)"/>
    </div>
</template>

<script>
import CardModal from "./CardModal.vue";

export default {
    name: "Card",
    data: () => ({modal: false}),
    components: {CardModal},
    props: {card: {type: Object, required: true}}
}
</script>

<style scoped>

</style>
