<template>
    <div class="app-board">
        <template v-if="!fetching">
            <draggable v-model="columns" draggable=".kanban-column" @change="onOrderChange">
                <transition-group class="kanban">
                    <template v-for="(column, index) in columns">
                        <Column :column="column" :key="`column-${column.id}`" @delete="removeColumn(index)"/>
                    </template>
                </transition-group>
            </draggable>

            <AddColumn @add="addNewColumn"/>
        </template>

        <FullPageLoading v-else/>

    </div>
</template>

<script>
import draggable from 'vuedraggable'
import Column from "./Column.vue";
import AddColumn from "./AddColumn.vue";
import FullPageLoading from "./FullPageLoading.vue";

export default {
    name: "App",
    data: () => ({
        columns: [],
        fetching: false,
    }),
    components: {FullPageLoading, AddColumn, draggable, Column},
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
        },
        fetchColumns() {
            this.fetching = true;

            this.$axios.get('/board/columns').then(res => {
                this.columns = res.data.data;
            }).finally(() => {
                this.fetching = false;
            })
        },
        onOrderChange({moved}) {
            const newPositions = this.columns.map((el, index) => ({id: el.id, position: index}))

            this.$axios.put('/board/columns/re-order', newPositions)
        }
    },
    created() {
        this.fetchColumns();
    }
}
</script>

<style scoped>

</style>
