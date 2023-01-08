<template>
    <div class="kanban-column">
        <div class="kanban-column__content">
            <div class="kanban-column__title">
                <span>{{ column.title }}</span>
                <button type="button" class="kanban__btn kanban-column__close-btn" @click="deleteColumn">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div class="kanban-column__body">
                <draggable v-model="column.cards" group="column" draggable=".card">
                    <transition-group class="cards">
                        <template v-for="(card, index) in column.cards">
                            <Card :card="card" :key="`card-${index}`" @update="updateCard($event, index)"/>
                        </template>
                    </transition-group>
                </draggable>
            </div>
            <div class="kanban-column__footer">
                <AddCardButton :column="column" @created="addNewCard"/>
            </div>
        </div>
    </div>
</template>

<script>
import AddCardButton from "./AddCardButton.vue";
import Card from "./Card.vue";
import draggable from 'vuedraggable'

export default {
    name: "Column",
    components: {Card, AddCardButton, draggable},
    props: {column: {type: Object, required: true}},
    methods: {
        deleteColumn() {
            this.$emit('delete')
        },
        addNewCard(card) {
            const cards = Object.assign([], this.column.cards)
            cards.push(card)
            this.$set(this.column, 'cards', cards)
            // this.column.cards.push(card)
        },
        updateCard(card, index) {
            const cards = Object.assign([], this.column.cards)
            cards[index] = card
            this.$set(this.column, 'cards', cards)
        }
    }
}
</script>

<style scoped>

</style>
