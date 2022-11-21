<template>
    <div :class="$attrs.class">
        <label v-if="label" class="form-label" :for="id">{{ label }}:</label>
        <select :id="id" ref="input" v-model="selected" :class="{ error: error }" v-bind="{ ...$attrs, class: null }" class="form-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
            <slot />
        </select>
        <div class="flex items-center mb-4">
            <input checked :id="id" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" >
            <label v-if="label" :for="id" class="mr-2 text-sm font-medium text-gray-900 dark:text-gray-300">&nbsp;{{ label }}</label>
        </div>
        <div v-if="error" class="form-error">{{ error }}</div>
    </div>
</template>

<script>
    import { v4 as uuid } from 'uuid'
    export default {
        inheritAttrs: false,
        props: {
            id: {
                type: String,
                default() {
                    return `checkbox-input-${uuid()}`
                },
            },
            error: String,
            label: String,
            modelValue: [String, Number, Boolean],
        },
        emits: ['update:modelValue'],
        data() {
            return {
                selected: this.modelValue,
            }
        },
        watch: {
            selected(selected) {
                this.$emit('update:modelValue', selected)
            },
        },
        methods: {

            select() {
                this.$refs.input.select()
            },
        },
    }
</script>
