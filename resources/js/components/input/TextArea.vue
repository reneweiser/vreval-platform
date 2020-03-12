 <!--
 Optional Attributes:
    readonly: Boolean
    required: Boolean
    rows: Number
    placeholder: String
 -->

<template>
    <div class="form-group">
        <label :for="name">{{label}}</label>
        <textarea class="form-control"
            :id="name"
            v-model="proxyValue"
            :readonly="options.readonly"
            :required="options.required"
            :rows="options.rows"
            :placeholder="options.placeholder"
        ></textarea>
    </div>
</template>

<script>
export default {
    props: {
        name: String,
        label: { type: String, default: 'Text Area Label' },
        value: [String, Number],
        options: Object
    },
    computed: {
        proxyValue: {
            get() { return this.value },
            set(newValue) { this.$emit('input', newValue) }
        }
    }
}
</script>