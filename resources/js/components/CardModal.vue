<template>
    <div>
        <div @click="openModal">
            <slot name="activator"></slot>
        </div>

        <modal :name="modalName" class="card-modal form">
            <form class="card-modal__content">
                <div class="card-modal__header form__group">
                    <label for="title" class="sr-only">Title of the card</label>
                    <input type="text" name="title" @click="setEditing" id="title"
                           class="form__control card-modal__title"
                           placeholder="Title" v-model="card.title" :readonly="!editing">
                </div>
                <div class="card-modal__body">
                    <div class="form-group">
                        <label for="description" class="card-modal__description-label">Description</label>
                        <textarea rows="3" v-model="card.description" :readonly="!editing" @click="setEditing"
                                  class="form__control card-modal__description-textarea"
                                  placeholder="Add a description here..."/>
                    </div>

                    <div class="flex flex--align-center form__footer" v-if="editing">
                        <button type="submit" class="btn btn--primary">Save</button>
                        <button type="button" class="btn btn--secondary">
                           Cancel
                        </button>
                    </div>
                </div>
            </form>
        </modal>
    </div>
</template>

<script>
export default {
    name: "CardModal",
    data: () => ({editing: false}),
    props: {
        card: {type: Object, required: true},
    },
    computed: {
        modalName() {
            return this.card.title
        }
    },
    methods: {
        openModal() {
            this.$modal.show(this.modalName)
        },
        setEditing() {
            if (this.editing) return;
            this.editing = true;
        }
    }
}
</script>

<style scoped>

</style>
