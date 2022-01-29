<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                New Task
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto shadow sm:rounded-lg bg-white ">
                <form v-if="projects.length" class="overflow-hidden max-w-3xl pt-12 pb-24 sm:px-6 lg:px-8 space-y-8 mx-auto "
                      @submit.prevent="submit">

                    <h2 class="font-medium font-semibold text-lg px-4">
                        Create new Task
                    </h2>

                    <div class="px-4">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                               for="name">Name</label>
                        <input
                            id="name"
                            v-model="form.name"
                            :class="form.errors.name ? 'placeholder-red-300 border-red-300 text-red-900': 'border-gray-300 '"
                            class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Task Name" required="" type="text">
                    </div>

                    <div class="px-4">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                               for="priority">Priority</label>
                        <input
                            id="priority"
                            v-model="form.priority"
                            :class="form.errors.priority ? 'placeholder-red-300 border-red-300 text-red-900': 'border-gray-300 '"
                            class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Priority Level" required="" type="number">
                    </div>


                    <div class="px-4">

                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400" for="project">Select
                            Project</label>

                        <select v-model="form.project_id" required id="project" name="location"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 space-y-2 focus:border-indigo-500 sm:text-sm rounded-md">
                            <option v-for="project in projects" :value="project.id">{{ project.name }}</option>
                        </select>
                        <p v-if="form.errors.project_id" id="email-error" class="mt-2 text-sm text-red-600">
                            {{ form.errors.project_id }}</p>
                    </div>

                    <div class="flex flex-row-reverse px-4">
                        <button :class="form.processing ? 'cursor-wait' : ''" :disabled="form.processing"
                                class="jf-btn-default text-center" type="submit">
                               <span v-if="form.processing">
                                     Creating...
                                </span>
                            <span v-else>
                                    Create
                                </span>
                        </button>
                    </div>
                </form>
                <div v-else class="text-center py-10">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" aria-hidden="true">
                        <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2"
                              d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">You don't have any project</h3>
                    <p class="mt-1 text-sm text-gray-500">
                        Add a project first, then you can assign task to the project
                    </p>
                    <div class="mt-6">
                        <Link :href="route('projects.create')" class="jf-btn-default">
                            Create Project
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import {defineComponent} from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import {useForm, Link} from '@inertiajs/inertia-vue3'

export default defineComponent({
    components: {
        AppLayout, Link
    },

    props: {
        projects: Object
    },

    setup() {
        const form = useForm({
            name: '',
            project_id: '',
            priority: null
        })

        function submit() {
            form.post(route('tasks.store'))
        }

        return {form, submit}
    }
})
</script>
