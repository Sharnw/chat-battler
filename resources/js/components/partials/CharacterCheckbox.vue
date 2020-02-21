<template>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" :name="'characters['+character.id+']'" v-model="toggle" :value="character.id" :id="'character'+character.id">
        <label class="form-check-label" :for="'character'+character.id">
            {{ character.name }}
        </label>
    </div>
</template>

<script>
    export default {
        props: ['character', 'isParticipating'],
        data() {
            return {
                toggle: this.isParticipating ?? false
            };
        }
    }
</script>
