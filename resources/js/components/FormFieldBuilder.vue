<template>
  <div>
      <input type="hidden" name="template" v-model="jsonData">
      <div v-for="(person, index) in fieldData.fields" v-bind:key="index" class="form-group">
          <label :for="`builder_field_${index}`">{{person.label}}</label>
          <input :id="`builder_field_${index}`" type="text" class="form-control" v-model="person.value" required>
      </div>
      <button class="btn btn-primary w-100" @click="addField">Add field</button>
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
        this.fieldData = this.template === ''
            ? {fields:[]}
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
        addField(e) {
            e.preventDefault()
            this.fieldData.fields.push({
                label: `Field ${this.fieldData.fields.length}`,
                value: ''
            })
        }
    }
}
</script>
