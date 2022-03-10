<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Projects
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow p-6 space-y-8 sm:rounded-lg">
                    <div class="flex justify-between items-center pb-3 border-b">
                        <h2 class="font-medium text-lg font-semibold">{{ project.name }}</h2>
                        <button @click.prevent="[open = true, newTask = true]" class="jf-btn-default">
                            New Task
                        </button>
                    </div>

                    <div class="py-2">
                        <h3 class="font-semibold font-medium">
                            Project Details
                        </h3>
                        <p>{{ project.details }}</p>
                    </div>
                    <div v-if="tasks.length" class="space-y-3 max-w-4xl pb-6 mx-auto">
                        <h2 class="font-semibold font-medium">Task List</h2>
                        <draggable
                            v-model="tasks"
                            item-key="id"
                            v-bind="taskDragOptions"
                            @end="reOrderTask"
                            :component-data="{
                                   name: !drag ? 'flip-list' : null,
                                    type: 'transition'
                                }"
                            @start="isDragging = true"
                        >
                            <template #item="{element, index}">
                                <div
                                    class="py-2 flex justify-between mt-3 border px-4 rounded-md hover:bg-gray-50 items-center">
                                    <div>
                                        <p>{{ element.name }}</p>
                                    </div>
                                    <div class="flex space-x-4">
                                        <span class="px-6">{{ element.priority }}</span>
                                        <button @click.prevent="editTask(element)">
                                            Edit
                                        </button>
                                        <button @click.prevent="deleteTask(element)" class="hover:text-red-600">
                                            Delete
                                        </button>
                                    </div>

                                </div>
                            </template>
                        </draggable>
                    </div>


                    <div v-else class="text-center py-10">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" aria-hidden="true">
                            <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No Task</h3>
                        <p class="mt-1 text-sm text-gray-500">
                            Add first task for this project.
                        </p>
                        <div class="mt-6">
                            <button @click.prevent="[open = true, newTask = true]" class="jf-btn-default">
                                Add Task
                            </button>
                        </div>
                    </div>

                </div>
            </div>

            <TransitionRoot as="template" :show="open">
                <Dialog as="div" class="fixed z-10 inset-0 overflow-y-auto" @close="open = false">
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0"
                                         enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100"
                                         leave-to="opacity-0">
                            <DialogOverlay class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"/>
                        </TransitionChild>


                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                              aria-hidden="true">&#8203;</span>
                        <TransitionChild as="template" enter="ease-out duration-300"
                                         enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                         enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200"
                                         leave-from="opacity-100 translate-y-0 sm:scale-100"
                                         leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                            <task-modal
                                :task="task"
                                :project-id="project.hash_id"
                                :new-task="newTask"
                                @close-modal="closeModal"
                                @cancel="open = false"
                            />
                        </TransitionChild>
                    </div>
                </Dialog>
            </TransitionRoot>

        </div>
    </app-layout>
</template>

<script>
import {defineComponent, ref, reactive} from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import {Link} from '@inertiajs/inertia-vue3'
import {Dialog, DialogOverlay, DialogTitle, TransitionChild, TransitionRoot} from '@headlessui/vue'
import draggable from 'vuedraggable'
import TaskModal from "../Tasks/TaskModal";

export default defineComponent({
    components: {
        TaskModal,
        AppLayout,
        Link,
        Dialog,
        DialogOverlay,
        DialogTitle,
        TransitionChild,
        TransitionRoot,
        draggable
    },

    props: {
        data: Object
    },

    computed: {
        taskDragOptions() {
            return {
                animation: 500,
                group: "task-list",
                dragClass: "status-drag",
                ghostClass: "ghost"
            };
        }
    },

    data() {
        return {
            task: {},
            open: false,
            newTask: true,
            project: this.data.project,
            tasks: this.data.tasks
        }
    },

    mounted() {
        this.project = this.data.project
        this.tasks = this.data.tasks
    },



    methods: {
        editTask(item) {
            this.open = true;
            this.newTask = false
            this.task = item
        },

        getTasks() {
            axios.get(route('projects.tasks', this.project.hash_id)).then((response) => {
                this.tasks = response.data
            })
        },

        reOrderTask() {
            console.log(this.tasks)
            this.tasks.map((task, index) => {
                task.priority = index + 1;
            })
            axios.post(route('tasks.sync'), {tasks: this.tasks})
        },

        closeModal() {
            this.getTasks();
            this.open = false
        },

        deleteTask(task) {
            this.$inertia.delete(route('tasks.delete', task.id), {
                onSuccess: () => this.getTasks()
            })
        }
    }
})
</script>

<style scoped>


.status-drag {
    transition: transform 0.5s;
    transition-property: all;
}

.moving-card {
    opacity: 0.5;
    background: #F7FAFC;
    border: 1px solid #4299e1;
}

.flip-list-move {
    transition: transform 0.5s;
}

.no-move {
    transition: transform 0s;
}

.ghost {
    opacity: 0.5;
    background: #c8ebfb;
}
</style>

