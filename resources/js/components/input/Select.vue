 <!--
 Optional Attributes:
    options: Array
 -->

<template>
    <div class="form-group">
        <label :for="name">{{label}}</label>
        <select class="form-control"
            :id="name"
            v-model="proxyValue"
        >
            <option v-for="(option, index) in options.options" v-bind:key="index"
                :value="index"
            >
                {{option}}
            </option>
        </select>
    </div>
</template>

<script>
export default {
    props: {
        name: String,
        label: { type: String, default: 'Select Field Label' },
        value: Number,
        options: { type: Object, default: function () {
                return { options: [ 'List empty' ] }
            }
        }
    },
    computed: {
        proxyValue: {
            get() { return this.value },
            set(newValue) { this.$emit('input', newValue) }
        }
    }
}
</script>