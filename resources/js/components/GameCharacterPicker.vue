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
            <label class="col-md-4 col-form-label text-md-right" v-if="characterList.length > 0">Characters</label>

            <div class="col-md-6" v-if="characterList.length > 0">
                <character-checkbox v-for="character in characterList" :character="character" :is-participating="getIsParticipating(character)" :key="character.id"></character-checkbox>
            </div>
        </div>
    </div>
</template>

<script>
    import CharacterCheckbox from './partials/CharacterCheckbox.vue';
    export default {
        components: {'character-checkbox' : CharacterCheckbox},
        props: ['game_id', 'games', 'participants', 'old', 'errors'],
        data() {
            return {
                selectedGameId: this.game_id ?? null,
                characterList: [],
                participantList: this.old.characters ?? (this.participants ?? [])
            };
        },
        methods: {

            getIsParticipating(character) {
                return (this.participantList && this.participantList.length > 0 && this.participantList.includes(character.id));
            },

            gameSelected() {
                axios.get('/api/games/'+this.selectedGameId+'/characters').then(response => {
                    if(response.data.characters){
                        this.characterList = response.data.characters;
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
