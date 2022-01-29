<template>
    <div
        class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
        <div>
            <div class="mt-3 sm:mt-5">
                <DialogTitle as="h3" class="text-lg leading-6 font-medium text-gray-900">
                    <span v-if="newTask">
                        Create new Task
                    </span>
                    <span v-else>
                        Editing - {{ task.name }}
                    </span>
                </DialogTitle>
                <form @submit.prevent="submit" class="mt-2 py-6 space-y-8">
                    <div class="px-4">
                        <label for="name"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>
                        <input
                            v-model="form.name"
                            :class="form.errors.name ? 'placeholder-red-300 border-red-300 text-red-900': 'border-gray-300 '"
                            type="text" id="name"
                            class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Task Name" required="">
                    </div>

                    <div class="px-4">
                        <label for="priority" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Priority</label>
                        <input
                            v-model="form.priority"
                            :class="form.errors.priority ? 'placeholder-red-300 border-red-300 text-red-900': 'border-gray-300 '"
                            type="number" id="priority"
                            class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Set Priority" required="">
                    </div>

                    <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense px-4">
                        <button @click.prevent="$emit('cancel')" type="button" class="jf-btn-danger text-center">
                            Cancel
                        </button>
                        <button :disabled="form.processing" :class="form.processing ? 'cursor-wait' : ''" type="submit"
                                class="jf-btn-default text-center">
                            <template v-if="newTask">
                                <span v-if="form.processing">
                                     Creating..
                                </span>
                                <span v-else>
                                    Create
                                </span>
                            </template>
                            <template v-else>
                                 <span v-if="form.processing">
                                     Updating...
                                </span>
                                <span v-else>
                                    Update
                                </span>
                            </template>
                        </button>

                    </div>
                </form>
            </div>
        </div>

    </div>
</template>

<script>
import {DialogTitle} from '@headlessui/vue'
import {useForm} from "@inertiajs/inertia-vue3";

export default {
    components: {
        DialogTitle
    },

    props: {
        newTask: {
            type: Boolean,
            required: true
        },
        task: Object,
        projectId: String

    },

    emits: ['close-modal'],

    setup(props, context) {

        const form = useForm({
            //checking if it is new task, set task name or null
            name: !props.newTask ? props.task.name : '',
            priority: !props.newTask ? props.task.priority : '',
        })

        function submit() {
            if (!props.newTask) {
                form.post(route('tasks.update', props.task.id), {
                    onSuccess: () => context.emit('close-modal')
                })
            } else {
                form.post(route('project_task.store', props.projectId), {
                    onSuccess: () => context.emit('close-modal')
                })
            }
        }

        return {
            submit,
            form
        }
    }
}
</script>
