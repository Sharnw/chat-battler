<template>
    <div>
        <div class="form-group row">
            <label for="game" class="col-md-4 col-form-label text-md-right">Game</label>

            <div class="col-md-6">
                <select v-model="selectedGameId" name="game_id" class="form-control" required @change="gameSelected">
                    <option></option>
                    <option v-for="(name, id) in games" :value="id">{{ name }}</option>
                </select>
                <span class="invalid-feedback" role="alert" v-if="errors.game_id">
                    <strong>{{ $errors.game_id }}</strong>
                </span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right" v-if="itemList.length > 0">Items</label>

            <div class="col-md-6" v-if="itemList.length > 0">
                <item-checkbox v-for="item in itemList" :item="item" :is-held="getIsHeld(item)" :key="item.id"></item-checkbox>
            </div>
        </div>
    </div>
</template>

<script>
    import ItemCheckbox from './partials/ItemCheckbox.vue';
    export default {
        components: {'item-checkbox' : ItemCheckbox},
        props: ['game_id', 'games', 'inventory', 'old', 'errors'],
        data() {
            return {
                selectedGameId: this.game_id ?? null,
                itemList: [],
                inventoryList: this.old.items ?? (this.inventory ?? [])
            };
        },
        methods: {

            getIsHeld(item) {
                return (this.inventoryList && this.inventoryList.length > 0 && this.inventoryList.includes(item.id));
            },

            gameSelected() {
                axios.get('/api/games/'+this.selectedGameId+'/items').then(response => {
                    if(response.data.items){
                        this.itemList = response.data.items;
                    }
                }).catch(error => {

                });
            }
        },
        mounted() {
            if (this.selectedGameId) {
                var app = this;
                setTimeout(function() {
                    app.gameSelected();
                }, 250);
            }
        }
    }
</script>
