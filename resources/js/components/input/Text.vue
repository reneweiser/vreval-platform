 <!--
 Optional Attributes:
    readonly: Boolean
    required: Boolean
    min: Number
    max: Number
    step: Number
    type: String
    placeholder: String
 -->
<template>
    <div class="form-group">
        <label :for="name">{{label}}</label>
        <input class="form-control"
            :id="name"
            v-model="proxyValue"
            :readonly="options.readonly"
            :required="options.required"
            :min="options.min"
            :max="options.max"
            :step="options.step"
            :type="options.type"
            :placeholder="options.placeholder"
        >
    </div>
</template>

<script>
export default {
    props: {
        name: String,
        label: { type: String, default: 'Text Field Label' },
        value: [String, Number],
        options: Object,
    },
    computed: {
        proxyValue: {
            get() { return this.value },
            set(newValue) { this.$emit('input', newValue) }
        }
    }
}
</script>