<template>
  <div>
        <input type="hidden" name="template" v-model="jsonData">
        <div class="d-flex align-items-center" v-for="(field, index) in fieldData.fields" v-bind:key="index">
            <component :is="field.type" class="w-100"
                :name="`builder_field_${index}`"
                :label="field.label"
                v-model="field.value"
                :options="field.options"
            ></component>
            <button @click="removeField(index)" type="button" class="close ml-3" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <button class="btn btn-primary w-100" @click="addField" type="button">Add field</button>
  </div>
</template>

<script>
export default {
    props: {
        template: {
            type: String,
            default: ''
        }
    },
    created() {
        this.fieldData = true //this.template === ''
            ? {fields:[
                {
                    type: 'text-input',
                    label: 'Label',
                    value: 'something',
                    options: {
                        required: true
                    }
                },
                {
                    type: 'text-area',
                    label: 'Label',
                    value: 'something',
                    options: {
                        rows: 10
                    }
                },
                {
                    type: 'selection',
                    label: 'Label',
                    value: 2,
                    options: {
                        options: [
                            'sample 1',
                            'sample 2',
                            'sample 3',
                        ]
                    }
                },
            ]}
            : JSON.parse(this.template)
    },
    data() {
        return {
            fieldData: {}
        }
    },
    computed: {
        jsonData() {
            return JSON.stringify(this.fieldData)
        }
    },
    methods: {
        addField() {
            this.fieldData.fields.push({
                label: `Field ${this.fieldData.fields.length}`,
                value: ''
            })
        },
        removeField(index) {
            this.fieldData.fields.splice(index, 1)
        }
    }
}
</script>
