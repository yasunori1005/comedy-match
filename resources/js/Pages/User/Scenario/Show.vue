<script setup>
import AuthenticatedLayout from "@/Layouts/UserAuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import { reactive } from "vue";
import { router } from "@inertiajs/vue3";

defineProps({
    scenario: Object,
    user_id: Number,
});

const deleteScenario = (id) => {
    router.delete(route("user.scenario.destroy", { scenario: id }), {
        onBefore: () => confirm("本当に削除しますか？"),
    });
};


const likeScenario=(id)=>{
    router.post(route('user.scenario.like',{scenario:id}));
}
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                User Scenario Show
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="lg:w-1/2 md:w-2/3 mx-auto">
                            <div class="flex flex-wrap -m-2">
                                <div class="p-2 w-full">
                                    <div class="relative">
                                        <label
                                            for="title"
                                            class="leading-7 text-sm text-gray-600"
                                            >タイトル</label
                                        >
                                        <div
                                            type="text"
                                            id="title"
                                            name="title"
                                            class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                        >
                                            {{ scenario.title }}
                                        </div>
                                    </div>
                                </div>
                                <div class="p-2 w-full">
                                    <div class="relative">
                                        <label
                                            for="content"
                                            class="leading-7 text-sm text-gray-600"
                                            >ネタ内容</label
                                        >
                                        <div
                                            id="content"
                                            name="content"
                                            class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"
                                        >
                                            {{ scenario.content }}
                                        </div>
                                    </div>
                                </div>
                                <div class="p-2 w-full">
                                    <div
                                        v-if="scenario.user_id == user_id"
                                        class="flex justify-between"
                                    >
                                        <Link
                                            :href="
                                                route('user.scenario.edit', {
                                                    scenario: scenario.id,
                                                })
                                            "
                                            class="block text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                                        >
                                            編集する
                                        </Link>
                                        
                                        <button
                                        @click="likeScenario(scenario.id)"
                                            class="block text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                                        >いいね
                                        </button>
                                        <button
                                            @click="deleteScenario(scenario.id)"
                                            class="block text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg"
                                        >
                                            削除する
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
