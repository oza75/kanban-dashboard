<template>
    <modal :name="modalName" class="card-modal form">
        <form class="card-modal__content">
            <div class="card-modal__header form__group">
                <label for="title" class="sr-only">Title of the card</label>
                <input type="text" name="title" @click="setEditing" id="title"
                       class="form__control card-modal__title"
                       placeholder="Title" v-model="cardData.title" :readonly="!editing">
            </div>
            <div class="card-modal__body">
                <div class="form-group">
                    <label for="description" class="card-modal__description-label">Description</label>
                    <textarea rows="3" v-model="cardData.description" :readonly="!editing" @keydown.enter="saveEdit"
                              @click="setEditing" class="form__control card-modal__description-textarea"
                              placeholder="Add a description here..."/>
                </div>

                <div class="flex flex--align-center form__footer" v-if="editing">
                    <button type="submit" class="btn btn--primary" @click="saveEdit">Save</button>
                    <button type="button" class="btn btn--secondary" @click="cancelEdit">
                        Cancel
                    </button>
                </div>
            </div>
        </form>
        <button class="btn btn--icon card-modal__close-btn" @click="closeModal">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </modal>
</template>

<script>
export default {
    name: "CardModal",
    data: () => ({
        editing: false,
        cardData: null,
    }),
    props: {
        card: {type: Object, required: true},
    },
    computed: {
        modalName() {
            return this.card.title
        }
    },
    watch: {
        card: {
            handler(value) {
                this.cardData = Object.assign({}, value)
            },
            deep: true,
            immediate: true,
        }
    },
    methods: {
        openModal() {
            this.$modal.show(this.modalName)
        },
        closeModal() {
            this.$modal.hide(this.modalName)
        },
        setEditing() {
            if (this.editing) return;
            this.editing = true;
        },
        cancelEdit() {
            this.cardData = Object.assign({}, this.card)
            this.editing = false
        },
        saveEdit() {
            this.$emit('update', Object.assign({}, this.cardData))
            this.editing = false;
        }
    },
    mounted() {
        const title = this.$el.parentElement.querySelector('.card__title:first-child')
        title.addEventListener('click', this.openModal)
    },
    beforeDestroy() {
        const title = this.$el.parentElement.querySelector('.card__title:first-child')
        title.removeEventListener('click', this.openModal)
    }
}
</script>

<style scoped>

</style>
