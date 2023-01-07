<template>
    <div class="kanban-column">
        <form @submit.prevent="add" class="kanban-column__content kanban-column--add-column__form form"
              :class="{active: showForm}">
            <div class="kanban-column--add-column__placeholder" @click="showForm = !showForm" v-show="!showForm">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path fill-rule="evenodd"
                          d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z"
                          clip-rule="evenodd"/>
                </svg>
                <span>Add a new column</span>
            </div>
            <div v-show="showForm">
                <div class="form__group">
                    <label for="column_name" class="sr-only">Column name</label>
                    <input type="text" name="column_name" id="column_name" class="form__control" required
                           placeholder="Enter the title of the column" v-model="title" autocomplete="off">
                </div>

                <div class="flex flex--align-center form__footer">
                    <button type="submit" class="btn btn--primary" :disabled="!valid">
                        Add
                    </button>
                    <button type="button" class="btn btn--icon" @click="showForm = !showForm">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z"
                                fill-rule="evenodd" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: "AddColumn",
    data: () => ({
        showForm: false,
        title: null,
    }),
    computed: {
        valid() {
            return !!this.title;
        }
    },
    methods: {
        add() {
            if (!this.valid) return;

            this.$emit('add', {title: this.title, id: this.title.length, cards: []})
            this.title = null;
            this.showForm = false;
        }
    }
}
</script>

<style scoped>

</style>
