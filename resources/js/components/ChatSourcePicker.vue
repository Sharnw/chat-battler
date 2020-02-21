<template>
    <div>
        <div class="form-group row">
            <label for="chat_source" class="col-md-4 col-form-label text-md-right">Chat Source</label>

            <div class="col-md-6">
                <select v-model="selectedIdentifier" id="chat_source" name="identifier" class="form-control" required @change="identifierSelected">
                    <option></option>
                    <option v-for="source in chatSources" :value="source.identifier">{{ source.label }}</option>
                </select>
                <span class="invalid-feedback" role="alert" v-if="errors && errors.identifier">
                    <strong>{{ $errors.identifier }}</strong>
                </span>
            </div>
        </div>
        <div class="form-group row" v-for="(value, index) in settingsList">
            <label class="col-md-4 col-form-label text-md-right" :for="'settings.'+index">Setting: <em>{{ index }}</em></label>

            <div class="col-md-6">
                <input :id="'settings.'+index" type="text" class="form-control" :name="'settings['+index+']'" :value="value">
            </div>
        </div>
    </div>
</template>

<script>
    import CharacterCheckbox from './partials/CharacterCheckbox.vue';
    export default {
        components: {'character-checkbox' : CharacterCheckbox},
        props: ['identifier', 'chatSources', 'settings', 'old', 'errors'],
        data() {
            return {
                selectedIdentifier: this.identifier ?? null,
                settingsList: this.settings ?? null,
            };
        },
        methods: {
            identifierSelected() {
                let chat_source = this.chatSources.find(s => s.identifier === this.selectedIdentifier);
                this.settingsList = chat_source.settings;
            }
        }
    }
</script>
