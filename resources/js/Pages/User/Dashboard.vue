<script setup>
import AuthenticatedLayout from "@/Layouts/UserAuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import FlashMessage from "@/Components/FlashMessage.vue";

defineProps({
    scenarios: Array,
    users: Array,
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                User Dashboard
            </h2>
        </template>
        <!-- <FlashMessage /> -->
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-24 mx-auto">
                            <div class="flex flex-col text-center w-full">
                                <h1
                                    class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900"
                                >
                                    新着順
                                </h1>
                            </div>
                            <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                                <table
                                    class="table-auto w-full text-left whitespace-no-wrap"
                                >
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl"
                                            >
                                                タイトル
                                            </th>
                                            <th
                                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100"
                                            >
                                                ネタ内容
                                            </th>
                                            <th
                                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100"
                                            >
                                                ユーザー名
                                            </th>
                                            <th
                                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100"
                                            ></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="scenario in scenarios"
                                            :key="scenario.id"
                                        >
                                            <td class="px-4 py-3">
                                                {{ scenario.title }}
                                            </td>
                                            <td class="px-4 py-3">
                                                <template
                                                    v-if="
                                                        scenario.content
                                                            .length >= 10
                                                    "
                                                >
                                                    {{
                                                        scenario.content.slice(
                                                            0,
                                                            10
                                                        ) + "..."
                                                    }}
                                                </template>
                                                <template v-else>
                                                    {{ scenario.content }}
                                                </template>
                                            </td>
                                            <td class="px-4 py-3">
                                                <template v-for="user in users">
                                                    <template
                                                        v-if="
                                                            scenario.user_id ==
                                                            user.id
                                                        "
                                                        >{{ user.name }}
                                                    </template>
                                                </template>
                                            </td>
                                            <td
                                                class="px-4 py-3 text-lg text-gray-900"
                                            >
                                                <Link
                                                    :href="
                                                        route(
                                                            'user.scenario.show',
                                                            {
                                                                scenario:
                                                                    scenario.id,
                                                            }
                                                        )
                                                    "
                                                    class="inline-block text-center mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                                                >
                                                    詳細
                                                </Link>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
