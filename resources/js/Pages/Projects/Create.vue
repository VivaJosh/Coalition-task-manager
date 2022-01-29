<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                New Project
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto shadow sm:rounded-lg bg-white ">
                <form class="overflow-hidden max-w-5xl pt-12 pb-24 sm:px-6 lg:px-8 space-y-8 mx-auto "
                      @submit.prevent="submit">

                    <h2 class="font-medium font-semibold text-lg px-4">
                    <span v-if="route().current('projects.edit')">
                        Edit - {{ project.name }}
                    </span>
                        <span v-else>
                        Create new project
                    </span>
                    </h2>

                    <div class="px-4">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                               for="name">Name</label>
                        <input
                            id="name"
                            v-model="form.name"
                            :class="form.errors.name ? 'placeholder-red-300 border-red-300 text-red-900': 'border-gray-300 '"
                            class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Project Name" required="" type="text">
                    </div>

                    <div class="px-4">

                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400" for="details">Description</label>
                        <textarea id="details"
                                  v-model="form.details"
                                  :class="form.errors.description ? 'border-red-300 text-red-900': ''"
                                  class="block p-2 w-full text-sm text-gray-900  rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                  placeholder="Project Details" rows="8"></textarea>
                        <p v-if="form.errors.details" id="email-error" class="mt-2 text-sm text-red-600">
                            {{ form.errors.details }}</p>
                    </div>

                    <div class="flex flex-row-reverse px-4">
                        <button :class="form.processing ? 'cursor-wait' : ''" :disabled="form.processing"
                                class="jf-btn-default text-center" type="submit">
                            <template v-if="route().current('projects.edit')">
                                <span v-if="form.processing">
                                     Updating...
                                </span>
                                <span v-else>
                                    Update
                                </span>
                            </template>
                            <template v-else>
                                 <span v-if="form.processing">
                                     Creating...
                                </span>
                                <span v-else>
                                    Create
                                </span>
                            </template>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </app-layout>
</template>

<script>
import {defineComponent} from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import {useForm} from '@inertiajs/inertia-vue3'

export default defineComponent({
    components: {
        AppLayout,
    },

    props: {
        project: Object,
        editing: Boolean
    },

    setup(props) {
        const form = useForm({
            name: props.project.name,
            details: props.project.details
        })

        function submit() {
            if (route().current('projects.create')) {
                form.post(route('projects.store'))
            } else {
                form.post(route('projects.update', project.hash_id))
            }
        }

        return {form, submit}
    }
})
</script>
