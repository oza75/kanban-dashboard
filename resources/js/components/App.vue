<template>
    <div class="app-board">
        <draggable v-model="columns" draggable=".kanban-column">
            <transition-group class="kanban">
                <template v-for="(column, index) in columns">
                    <Column :column="column" :key="`column-${column.id}`" @delete="removeColumn(index)"/>
                </template>
            </transition-group>
        </draggable>

        <AddColumn @add="addNewColumn"/>
    </div>
</template>

<script>
import draggable from 'vuedraggable'
import Column from "./Column.vue";
import AddColumn from "./AddColumn.vue";

export default {
    name: "App",
    data: () => ({
        columns: [
            {title: 'Column 1', id: 1, cards: [{title: 'test card', description: '', column_id: 1}, {title: 'test card 2', description: '', column_id: 1}]},
            {title: 'Column 2', id: 2, cards: []},
            {title: 'Column 3', id: 3, cards: []}
        ],
    }),
    components: {AddColumn, draggable, Column},
    watch: {
        columns: {
            handler(value, old) {
                // console.log(value)
            },
            deep: true,
        }
    },
    methods: {
        removeColumn(index) {
            this.columns.splice(index, 1)
        },
        addNewColumn(column) {
            this.columns.push(column)
        }
    }
}
</script>

<style scoped>

</style>
