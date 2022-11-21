<template>
    <div :class="$attrs.class">
        <label v-if="label" class="form-label" :for="id">{{ label }}:</label>
        <div class="flex" v-if="prefix">
            <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-l-md border border-r-0 border-gray-300 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                 {{ prefix }}
            </span>
            <input :id="id" ref="input" v-bind="{ ...$attrs, class: null }" class=" form-input rounded-none rounded-r-lg bg-gray-50 border border-gray-300
            text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5
            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
            dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :placeholder="placeholder" :class="{ error: error }" :type="type" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)">
        </div>
        <div v-else>
            <input :id="id" ref="input" v-bind="{ ...$attrs, class: null }" class="form-input mt-1 block w-full rounded-lg bg-gray-50 border border-gray-300
            text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5
            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
            dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :placeholder="placeholder" :class="{ error: error }" :type="type" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" />
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
                    return `text-input-${uuid()}`
                },
            },
            type: {
                type: String,
                default: 'text',
            },
            error: String,
            label: String,
            prefix: String,
            placeholder: {
                type: String,
                default: '',
            },
            modelValue: String,
        },
        emits: ['update:modelValue'],
        methods: {
            focus() {
                this.$refs.input.focus()
            },
            select() {
                this.$refs.input.select()
            },
            setSelectionRange(start, end) {
                this.$refs.input.setSelectionRange(start, end)
            },
        },
    }
</script>
