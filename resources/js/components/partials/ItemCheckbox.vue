<template>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" :name="'items['+item.id+']'" v-model="toggle" :value="item.id" :id="'item'+item.id">
        <label class="form-check-label" :for="'item'+item.id">
            {{ item.name }}
        </label>
    </div>
</template>

<script>
    export default {
        props: ['item', 'isHeld'],
        data() {
            return {
                toggle: this.isHeld ?? false
            };
        }
    }
</script>
