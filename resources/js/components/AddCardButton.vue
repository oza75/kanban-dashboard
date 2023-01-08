<template>
    <div class="add-card">
        <button type="button" class="add-card__btn" v-show="!showForm" @click="showForm = !showForm">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path
                    d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z"
                    clip-rule="evenodd" fill-rule="evenodd"/>
            </svg>

            <span>Add a new card</span>
        </button>

        <form @submit.prevent="createCard" class="form add-card__form" v-show="showForm">
            <div class="form-group">
                <label for="card_title" class="sr-only">Card title</label>
                <textarea v-model="title" rows="3" class="form__control" @keydown.enter="createCard" name="card_title" id="card_title"
                          placeholder="Enter a title for the new card"/>
            </div>

            <div class="form__footer flex flex--align-center">
                <button type="submit" class="btn btn--primary" @click="createCard">Add a new card</button>
                <button class="btn btn--icon" @click="showForm = !showForm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </form>
    </div>
</template>

<script>

export default {
    name: "AddCardButton",
    data: () => ({
        showForm: false,
        title: null,
    }),
    props: {
        column: {type: Object, required: true}
    },
    computed: {
        isValid() {
            return !!this.title;
        }
    },
    methods: {
        createCard() {
            if (!this.isValid) return;

            this.$emit('created', {title: this.title, description: '', column_id: this.column.id})
            this.title = null
            this.showForm = false
        }
    },
}
</script>

<style scoped>

</style>
